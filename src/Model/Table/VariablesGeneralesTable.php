<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VariablesGenerales Model
 *
 * @method \App\Model\Entity\VariablesGenerale get($primaryKey, $options = [])
 * @method \App\Model\Entity\VariablesGenerale newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VariablesGenerale[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VariablesGenerale|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VariablesGenerale patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VariablesGenerale[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VariablesGenerale findOrCreate($search, callable $callback = null, $options = [])
 */
class VariablesGeneralesTable extends Table
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

        $this->setTable('variables_generales');
        $this->setDisplayField('idvariablesgenerales');
        $this->setPrimaryKey('idvariablesgenerales');
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
            ->integer('idvariablesgenerales')
            ->allowEmpty('idvariablesgenerales', 'create');

        $validator
            ->date('fecha_act_costos')
            ->allowEmpty('fecha_act_costos');

        $validator
            ->numeric('tasa_int_cap_propio')
            ->allowEmpty('tasa_int_cap_propio');

        $validator
            ->numeric('pres_comb_siva')
            ->allowEmpty('pres_comb_siva');

        $validator
            ->numeric('pres_aceite_motor')
            ->allowEmpty('pres_aceite_motor');

        $validator
            ->numeric('pres_aceite_trans')
            ->allowEmpty('pres_aceite_trans');

        $validator
            ->numeric('pres_aceite_hidra')
            ->allowEmpty('pres_aceite_hidra');

        $validator
            ->numeric('pres_grasa')
            ->allowEmpty('pres_grasa');

        $validator
            ->numeric('costo_administrativo')
            ->allowEmpty('costo_administrativo');

        $validator
            ->numeric('seguridad_social_24241')
            ->allowEmpty('seguridad_social_24241');

        $validator
            ->numeric('art')
            ->allowEmpty('art');

        $validator
            ->numeric('seguridad_social_23660')
            ->allowEmpty('seguridad_social_23660');

        $validator
            ->numeric('carga_social_12')
            ->allowEmpty('carga_social_12');

        $validator
            ->numeric('vacaciones_enfermedad')
            ->allowEmpty('vacaciones_enfermedad');

        $validator
            ->numeric('inssjp_19032')
            ->allowEmpty('inssjp_19032');

        $validator
            ->numeric('asignacion_familiar_24714')
            ->allowEmpty('asignacion_familiar_24714');

        $validator
            ->numeric('sac')
            ->allowEmpty('sac');

        $validator
            ->numeric('seguro_vida')
            ->allowEmpty('seguro_vida');

        $validator
            ->numeric('uniforme')
            ->allowEmpty('uniforme');

        $validator
            ->numeric('botin_seguridad')
            ->allowEmpty('botin_seguridad');

        $validator
            ->numeric('guante')
            ->allowEmpty('guante');

        $validator
            ->numeric('protector_auditivo')
            ->allowEmpty('protector_auditivo');

        $validator
            ->numeric('casco_chaleco')
            ->allowEmpty('casco_chaleco');

        $validator
            ->numeric('alojamiento_dia_persona')
            ->allowEmpty('alojamiento_dia_persona');

        $validator
            ->numeric('vianda_dia')
            ->allowEmpty('vianda_dia');

        $validator
            ->numeric('ausentismo')
            ->allowEmpty('ausentismo');

        $validator
            ->numeric('precio_aceite_cadena')
            ->allowEmpty('precio_aceite_cadena');

        $validator
            ->integer('emsefor_idemsefor')
            ->requirePresence('emsefor_idemsefor', 'create')
            ->notEmpty('emsefor_idemsefor')
            ->add('emsefor_idemsefor', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->numeric('duracion_turnos_hs')
            ->allowEmpty('duracion_turnos_hs');

        $validator
            ->integer('turnos_dia')
            ->allowEmpty('turnos_dia');

        $validator
            ->integer('dias_por_semana')
            ->allowEmpty('dias_por_semana');

        $validator
            ->integer('dias_por_mes')
            ->allowEmpty('dias_por_mes');

        $validator
            ->numeric('margen_ganancia')
            ->allowEmpty('margen_ganancia');

        $validator
            ->numeric('factor_ajuste')
            ->allowEmpty('factor_ajuste');

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
        $rules->add($rules->isUnique(['emsefor_idemsefor']));

        return $rules;
    }
}
