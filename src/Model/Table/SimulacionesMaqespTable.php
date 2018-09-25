<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SimulacionesMaqesp Model
 *
 * @method \App\Model\Entity\SimulacionesMaqesp get($primaryKey, $options = [])
 * @method \App\Model\Entity\SimulacionesMaqesp newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SimulacionesMaqesp[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SimulacionesMaqesp|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SimulacionesMaqesp patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SimulacionesMaqesp[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SimulacionesMaqesp findOrCreate($search, callable $callback = null, $options = [])
 */
class SimulacionesMaqespTable extends Table
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

        $this->setTable('simulaciones_maqesp');
        $this->setDisplayField('simulaciones_idsimulaciones');
        $this->setPrimaryKey(['simulaciones_idsimulaciones', 'idmaquina_especifica']);

        //Agregar las Relaciones

        $this->hasOne('Simulaciones', [

            'bindingKey' => 'simulaciones_idsimulaciones',
            'foreignKey' => 'idsimulaciones'
        ]);

        $this->hasOne('MaquinaEspecifica', [

            'foreignKey' => 'idmaquina_especifica',
            'bindingKey' => 'idmaquina_especifica'
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
            ->integer('simulaciones_idsimulaciones')
            ->allowEmpty('simulaciones_idsimulaciones', 'create');

        $validator
            ->integer('idmaquina_especifica')
            ->allowEmpty('idmaquina_especifica', 'create');

        $validator
            ->scalar('actividad')
            ->maxLength('actividad', 15)
            ->allowEmpty('actividad');

        $validator
            ->numeric('productividad')
            ->allowEmpty('productividad');

        $validator
            ->numeric('productividad_real')
            ->allowEmpty('productividad_real');

        $validator
            ->numeric('produccion_mes')
            ->allowEmpty('produccion_mes');

        $validator
            ->numeric('costo_fijo')
            ->allowEmpty('costo_fijo');

        $validator
            ->numeric('costo_variable')
            ->allowEmpty('costo_variable');

        $validator
            ->numeric('costo_total')
            ->allowEmpty('costo_total');

        return $validator;
    }
}
