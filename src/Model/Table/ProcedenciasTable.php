<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Procedencias Model
 *
 * @method \App\Model\Entity\Procedencia get($primaryKey, $options = [])
 * @method \App\Model\Entity\Procedencia newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Procedencia[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Procedencia|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Procedencia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Procedencia[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Procedencia findOrCreate($search, callable $callback = null, $options = [])
 */
class ProcedenciasTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('procedencias');
        $this->displayField('idprocedencias');
        $this->primaryKey('idprocedencias');

        $this->hasMany('Plantaciones', [

                 'foreignKey' => 'procedencias_idprocedencias'
            ]);

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('idprocedencias')
            ->allowEmpty('idprocedencias', 'create');

        $validator
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->allowEmpty('especie');

        $validator
            ->allowEmpty('origen');

        $validator
            ->allowEmpty('mejora');

        $validator
            ->allowEmpty('vivero');

        return $validator;
    }


      /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['nombre'], 'El nombre ingresado ya esta en uso.'));

        return $rules;
    }

}
