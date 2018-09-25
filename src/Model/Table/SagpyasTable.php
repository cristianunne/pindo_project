<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sagpyas Model
 *
 * @method \App\Model\Entity\Sagpya get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sagpya newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sagpya[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sagpya|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sagpya patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sagpya[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sagpya findOrCreate($search, callable $callback = null, $options = [])
 */
class SagpyasTable extends Table
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

        $this->table('sagpyas');
        $this->displayField('idsagpya');
        $this->primaryKey('idsagpya');

        $this->belongsToMany('Rodales', [

            'targetForeignKey' => 'rodales_idrodales',
            'foreignKey' => 'sagpya_idsagpya',
            'joinTable' => 'rodal_sagpya',
            'joinType' => 'INNER'
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
            ->integer('idsagpya')
            ->allowEmpty('idsagpya', 'create');


        $validator
            ->allowEmpty('operaciones');

        $validator
            ->date('fecha')
            ->allowEmpty('fecha');


         $validator->add('fecha', 'date', [
            'rule' => 'date',
            'message' => 'Ingrese un formato de fecha válido'
        ]);


        $validator
            ->numeric('sup_aprobada')
            ->allowEmpty('sup_aprobada');

        $validator
            ->allowEmpty('expediente');

        $validator
            ->allowEmpty('turno_minimo');

        return $validator;
    }


}
