<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SimulacionResumen Model
 *
 * @method \App\Model\Entity\SimulacionResumen get($primaryKey, $options = [])
 * @method \App\Model\Entity\SimulacionResumen newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SimulacionResumen[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SimulacionResumen|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SimulacionResumen patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SimulacionResumen[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SimulacionResumen findOrCreate($search, callable $callback = null, $options = [])
 */
class SimulacionResumenTable extends Table
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

        $this->setTable('simulacion_resumen');
        $this->setDisplayField('idsim_res');
        $this->setPrimaryKey('idsim_res');

        $this->hasOne('Simulaciones', [

            'bindingKey' => 'idsimulacion',
            'foreignKey' => 'idsimulaciones'
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
            ->integer('idsimulacion')
            ->requirePresence('idsimulacion', 'create')
            ->notEmpty('idsimulacion');

        $validator
            ->scalar('tarea')
            ->maxLength('tarea', 15)
            ->allowEmpty('tarea');

        $validator
            ->numeric('produccion_mes')
            ->allowEmpty('produccion_mes');

        $validator
            ->scalar('actividad_lim')
            ->maxLength('actividad_lim', 15)
            ->allowEmpty('actividad_lim');

        $validator
            ->numeric('balance')
            ->allowEmpty('balance');

        $validator
            ->numeric('costo_total')
            ->allowEmpty('costo_total');

        $validator
            ->integer('idsim_res')
            ->allowEmpty('idsim_res', 'create');

        return $validator;
    }
}
