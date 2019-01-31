<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RodalesInvPlant Model
 *
 * @property \App\Model\Table\RodsTable|\Cake\ORM\Association\BelongsTo $Rods
 *
 * @method \App\Model\Entity\RodalesInvPlant get($primaryKey, $options = [])
 * @method \App\Model\Entity\RodalesInvPlant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RodalesInvPlant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RodalesInvPlant|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RodalesInvPlant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RodalesInvPlant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RodalesInvPlant findOrCreate($search, callable $callback = null, $options = [])
 */
class RodalesInvPlantTable extends Table
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

        $this->setTable('rodales_inv_plant');

        $this->belongsTo('Rods', [
            'foreignKey' => 'rod_id'
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
            ->date('fecha_inv')
            ->allowEmpty('fecha_inv');

        $validator
            ->integer('nro_plantacion')
            ->allowEmpty('nro_plantacion');

        $validator
            ->integer('rodales_idrodales')
            ->allowEmpty('rodales_idrodales');

        $validator
            ->date('fecha')
            ->allowEmpty('fecha');

        $validator
            ->numeric('superficie')
            ->allowEmpty('superficie');

        $validator
            ->numeric('densidad')
            ->allowEmpty('densidad');

        $validator
            ->numeric('dist_lineas')
            ->allowEmpty('dist_lineas');

        $validator
            ->numeric('dist_plantas')
            ->allowEmpty('dist_plantas');

        $validator
            ->integer('num_arbol_plantado')
            ->allowEmpty('num_arbol_plantado');

        $validator
            ->numeric('sobrevivencia')
            ->allowEmpty('sobrevivencia');

        $validator
            ->integer('emsefor_idemsefor')
            ->allowEmpty('emsefor_idemsefor');

        $validator
            ->integer('procedencias_idprocedencias')
            ->allowEmpty('procedencias_idprocedencias');

        $validator
            ->integer('idprocedencias')
            ->allowEmpty('idprocedencias');

        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 100)
            ->allowEmpty('nombre');

        $validator
            ->scalar('especie')
            ->maxLength('especie', 45)
            ->allowEmpty('especie');

        $validator
            ->scalar('origen')
            ->maxLength('origen', 45)
            ->allowEmpty('origen');

        $validator
            ->scalar('mejora')
            ->maxLength('mejora', 45)
            ->allowEmpty('mejora');

        $validator
            ->scalar('vivero')
            ->maxLength('vivero', 45)
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
        $rules->add($rules->existsIn(['rod_id'], 'Rods'));

        return $rules;
    }
}
