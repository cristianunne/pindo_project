<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VariablesGlobales Model
 *
 * @method \App\Model\Entity\VariablesGlobale get($primaryKey, $options = [])
 * @method \App\Model\Entity\VariablesGlobale newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VariablesGlobale[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VariablesGlobale|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VariablesGlobale patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VariablesGlobale[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VariablesGlobale findOrCreate($search, callable $callback = null, $options = [])
 */
class VariablesGlobalesTable extends Table
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

        $this->setTable('variables_globales');
        $this->setDisplayField('idvariables_globales');
        $this->setPrimaryKey('idvariables_globales');
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
            ->integer('idvariables_globales')
            ->allowEmpty('idvariables_globales', 'create');

        $validator
            ->numeric('tasa_int_cap_propio')
            ->allowEmpty('tasa_int_cap_propio');

        $validator
            ->numeric('ausentismo')
            ->allowEmpty('ausentismo');

        $validator
            ->numeric('margen_ganancia')
            ->allowEmpty('margen_ganancia');

        $validator
            ->numeric('costo_administrativo')
            ->allowEmpty('costo_administrativo');

        $validator
            ->numeric('contador_publico')
            ->allowEmpty('contador_publico');

        $validator
            ->numeric('impuestos_totales')
            ->allowEmpty('impuestos_totales');

        $validator
            ->numeric('tasa_seguro')
            ->allowEmpty('tasa_seguro');

        $validator
            ->numeric('traslado_personal')
            ->allowEmpty('traslado_personal');

        $validator
            ->numeric('dias_mes')
            ->allowEmpty('dias_mes');

        $validator
            ->integer('emsefor_idemsefor')
            ->allowEmpty('emsefor_idemsefor');

        return $validator;
    }
}
