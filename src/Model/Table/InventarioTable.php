<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Inventario Model
 *
 * @method \App\Model\Entity\Inventario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Inventario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Inventario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Inventario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Inventario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Inventario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Inventario findOrCreate($search, callable $callback = null, $options = [])
 */
class InventarioTable extends Table
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

        $this->setTable('inventario');
        $this->setDisplayField('idinventario');
        $this->setPrimaryKey('idinventario');

        $this->belongsTo('Rodales', [
            'foreignKey' => 'rodales_idrodales'
        ]);

        $this->belongsTo('Emsefor', [

            'foreignKey' => 'emsefor_idemsefor',
            'bindingKey' => 'idemsefor'
        ]);

        $this->hasOne('Intervenciones', [
            'foreignKey' => 'idintervencion',
            'bindingKey' => 'intervencion_idintervencion'
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
            ->integer('idinventario')
            ->allowEmpty('idinventario', 'create');

        $validator
            ->scalar('cod_sap')
            ->maxLength('cod_sap', 45)
            ->allowEmpty('cod_sap');

        $validator
            ->date('fecha')
            ->allowEmpty('fecha');

        $validator
            ->integer('num_arbol')
            ->allowEmpty('num_arbol');

        $validator
            ->numeric('dap')
            ->allowEmpty('dap');

        $validator
            ->numeric('altura')
            ->allowEmpty('altura');

        $validator
            ->numeric('vol_medio')
            ->allowEmpty('vol_medio');

        $validator
            ->numeric('vol_total')
            ->allowEmpty('vol_total');

        $validator
            ->numeric('area_basal')
            ->allowEmpty('area_basal');

        $validator
            ->scalar('forma')
            ->maxLength('forma', 45)
            ->allowEmpty('forma');

        $validator
            ->scalar('dano')
            ->maxLength('dano', 45)
            ->allowEmpty('dano');

        $validator
            ->scalar('tipo_inventario')
            ->requirePresence('tipo_inventario', 'create')
            ->notEmpty('tipo_inventario');

        $validator
            ->integer('rodales_idrodales')
            ->requirePresence('rodales_idrodales', 'create')
            ->notEmpty('rodales_idrodales');

        $validator
            ->integer('emsefor_idemsefor')
            ->requirePresence('emsefor_idemsefor', 'create')
            ->notEmpty('emsefor_idemsefor');

        $validator
            ->integer('intervencion_idintervencion')
            ->allowEmpty('intervencion_idintervencion')
            ->add('intervencion_idintervencion', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => 'Ya existe un inventario con esa Intervención.']);

        $validator
            ->boolean('modifica')
            ->allowEmpty('modifica');

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
        $rules->add($rules->isUnique(['intervencion_idintervencion']));

        return $rules;
    }
}
