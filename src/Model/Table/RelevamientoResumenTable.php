<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RelevamientoResumen Model
 *
 * @method \App\Model\Entity\RelevamientoResuman get($primaryKey, $options = [])
 * @method \App\Model\Entity\RelevamientoResuman newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RelevamientoResuman[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RelevamientoResuman|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RelevamientoResuman patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RelevamientoResuman[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RelevamientoResuman findOrCreate($search, callable $callback = null, $options = [])
 */
class RelevamientoResumenTable extends Table
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

        $this->setTable('relevamiento_resumen');
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
            ->integer('idrodales')
            ->allowEmpty('idrodales');

        $validator
            ->scalar('cod_sap')
            ->maxLength('cod_sap', 45)
            ->allowEmpty('cod_sap');

        $validator
            ->scalar('campo')
            ->maxLength('campo', 45)
            ->allowEmpty('campo');

        $validator
            ->scalar('uso')
            ->maxLength('uso', 45)
            ->allowEmpty('uso');

        $validator
            ->boolean('finalizado')
            ->allowEmpty('finalizado');

        $validator
            ->integer('empresa_idempresa')
            ->allowEmpty('empresa_idempresa');

        $validator
            ->integer('idrodales_parc')
            ->allowEmpty('idrodales_parc');

        $validator
            ->allowEmpty('cant_parc');

        $validator
            ->integer('idrodales_arb')
            ->allowEmpty('idrodales_arb');

        $validator
            ->allowEmpty('cant_arb');

        return $validator;
    }
}
