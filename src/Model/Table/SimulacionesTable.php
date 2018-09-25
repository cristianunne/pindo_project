<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Simulaciones Model
 *
 * @method \App\Model\Entity\Simulacione get($primaryKey, $options = [])
 * @method \App\Model\Entity\Simulacione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Simulacione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Simulacione|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Simulacione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Simulacione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Simulacione findOrCreate($search, callable $callback = null, $options = [])
 */
class SimulacionesTable extends Table
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

        $this->setTable('simulaciones');
        $this->setDisplayField('idsimulaciones');
        $this->setPrimaryKey('idsimulaciones');

        $this->hasOne('Rodales', [
            'bindingKey' => 'rodales_idrodales',
            'foreignKey' => 'idrodales',
            'joinType' => 'INNER'
        ]);

        $this->hasMany('SimulacionResumen', [
            'bindingKey' => 'idsimulaciones',
            'foreignKey' => 'idsimulacion'
        ]);

        $this->hasMany('SimulacionesMaqesp', [
            'bindingKey' => 'idsimulaciones',
            'foreignKey' => 'simulaciones_idsimulaciones'
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
            ->integer('idsimulaciones')
            ->allowEmpty('idsimulaciones', 'create');

        $validator
            ->date('fecha')
            ->allowEmpty('fecha');

        $validator
            ->integer('rodales_idrodales')
            ->allowEmpty('rodales_idrodales');

        $validator
            ->scalar('tipo_simulacion')
            ->maxLength('tipo_simulacion', 6)
            ->allowEmpty('tipo_simulacion');

        $validator
            ->scalar('sistema_cosecha')
            ->maxLength('sistema_cosecha', 15)
            ->allowEmpty('sistema_cosecha');

        $validator
            ->numeric('superficie')
            ->allowEmpty('superficie');

        $validator
            ->numeric('vol_medio')
            ->allowEmpty('vol_medio');

        $validator
            ->numeric('dist_extraccion')
            ->allowEmpty('dist_extraccion');

        $validator
            ->numeric('produccion_total')
            ->allowEmpty('produccion_total');

        $validator
            ->numeric('vol_total')
            ->allowEmpty('vol_total');

        $validator
            ->integer('dias_cosecha')
            ->allowEmpty('dias_cosecha');

        $validator
            ->numeric('produccion_equilibrio')
            ->allowEmpty('produccion_equilibrio');

        $validator
            ->numeric('costo_prod_bruta')
            ->allowEmpty('costo_prod_bruta');

        $validator
            ->numeric('costo_prod_admin')
            ->allowEmpty('costo_prod_admin');

        $validator
            ->numeric('margen_ganancia')
            ->allowEmpty('margen_ganancia');

        $validator
            ->numeric('tarifa_sin_imp')
            ->allowEmpty('tarifa_sin_imp');

        $validator
            ->numeric('tarifa_con_imp')
            ->allowEmpty('tarifa_con_imp');

        $validator
            ->numeric('beneficio')
            ->allowEmpty('beneficio');

        return $validator;
    }
}
