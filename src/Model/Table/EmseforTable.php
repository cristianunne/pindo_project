<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Emsefor Model
 *
 * @method \App\Model\Entity\Emsefor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Emsefor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Emsefor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Emsefor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Emsefor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Emsefor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Emsefor findOrCreate($search, callable $callback = null, $options = [])
 */
class EmseforTable extends Table
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

        $this->table('emsefor');
        $this->displayField('idemsefor');
        $this->primaryKey('idemsefor');


        $this->hasMany('Plantaciones', [

                 'foreignKey' => 'emsefor_idemsefor'
        ]);


        $this->belongsToMany('Maquinas', [

            'targetForeignKey' => 'maquinas_idmaquinas',
            'foreignKey' => 'emsefor_idemsefor',
            'joinTable' => 'ems_maq',
            'joinType' => 'INNER'
        ]);

        $this->hasMany('EmsMaq', [

            'foreignKey' => 'emsefor_idemsefor',
            'bindingKey' => 'idemsefor'
        ]);

        $this->belongsToMany('MaquinaEspecifica', [

            'targetForeignKey' => 'maquina_especifica_idmaquina_especifica',
            'foreignKey' => 'emsefor_idemsefor',
            'joinTable' => 'ems_maq',
            'joinType' => 'INNER'
        ]);



        $this->hasOne('VariablesGlobales', [

            'bindingKey' => 'idemsefor',
            'foreignKey' => 'emsefor_idemsefor'
        ]);

        $this->hasMany('Laboral', [

            'foreignKey' => 'emsefor_idemsefor',
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
            ->integer('idemsefor')
            ->allowEmpty('idemsefor', 'create');

        $validator
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->requirePresence('contratista', 'create')
            ->notEmpty('contratista');

        $validator
            ->requirePresence('domicilio', 'create')
            ->notEmpty('domicilio');

        $validator
            ->allowEmpty('telefono');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->allowEmpty('cuit');

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }


    public function findGetAllEmsefor(Query $query, array $options)
    {
        $idemsefor = $options['idemsefor'];

        $query
            ->select(['nombre', 'contratista'])
            ->where(['idemsefor' => $idemsefor]);

        return $query;


    }
}
