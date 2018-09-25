<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InfoIntervencion Model
 *
 * @method \App\Model\Entity\InfoIntervencion get($primaryKey, $options = [])
 * @method \App\Model\Entity\InfoIntervencion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InfoIntervencion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InfoIntervencion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InfoIntervencion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InfoIntervencion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InfoIntervencion findOrCreate($search, callable $callback = null, $options = [])
 */
class InfoIntervencionTable extends Table
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

        $this->table('info_intervencion');
        $this->displayField('intervencion_idintervencion');
        $this->primaryKey('intervencion_idintervencion');

        $this->hasOne('Intervenciones');
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
            ->integer('intervencion_idintervencion')
            ->allowEmpty('intervencion_idintervencion', 'create');

        $validator
            ->allowEmpty('cod_sap');

        $validator
            ->date('fecha')
            ->requirePresence('fecha', 'create')
            ->notEmpty('fecha');

        $validator
            ->allowEmpty('arb_ha');

        $validator
            ->integer('arb_podados')
            ->allowEmpty('arb_podados');

        $validator
            ->numeric('arb_alt_deseada')
            ->allowEmpty('arb_alt_deseada');

        $validator
            ->numeric('alt_poda')
            ->allowEmpty('alt_poda');

        $validator
            ->integer('arb_no_podados')
            ->allowEmpty('arb_no_podados');

        $validator
            ->numeric('dap')
            ->allowEmpty('dap');

        $validator
            ->numeric('altura')
            ->allowEmpty('altura');

        $validator
            ->numeric('dmsm')
            ->allowEmpty('dmsm');

        $validator
            ->numeric('porc_removido')
            ->allowEmpty('porc_removido');

        return $validator;
    }
}
