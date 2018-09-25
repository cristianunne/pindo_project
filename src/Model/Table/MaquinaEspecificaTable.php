<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MaquinaEspecifica Model
 *
 * @method \App\Model\Entity\MaquinaEspecifica get($primaryKey, $options = [])
 * @method \App\Model\Entity\MaquinaEspecifica newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MaquinaEspecifica[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MaquinaEspecifica|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MaquinaEspecifica patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MaquinaEspecifica[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MaquinaEspecifica findOrCreate($search, callable $callback = null, $options = [])
 */
class MaquinaEspecificaTable extends Table
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

        $this->table('maquina_especifica');
        $this->displayField('idmaquina_especifica');
        $this->primaryKey('idmaquina_especifica');

        $this->hasOne('EmsMaq', [
            'foreignKey' => 'maquina_especifica_idmaquina_especifica'
        ]);

        $this->hasOne('MaqespCatop', [
            'bindingKey' => 'idmaquina_especifica',
            'foreignKey' => 'maquina_especifica_idmaquina_especifica',
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
            ->integer('idmaquina_especifica')
            ->allowEmpty('idmaquina_especifica', 'create');

        $validator
            ->allowEmpty('modelo');

        $validator
            ->allowEmpty('nombre');

        $validator
            ->allowEmpty('cosecha');

        $validator
            ->allowEmpty('tarea');

        $validator
            ->date('act_costos')
            ->allowEmpty('act_costos');

        $validator
            ->numeric('eficiencia')
            ->allowEmpty('eficiencia');


        $validator
            ->numeric('valor_maquina')
            ->allowEmpty('valor_maquina');

        $validator
            ->numeric('va_imp')
            ->allowEmpty('va_imp');

        $validator
            ->numeric('va_sis_rod_maq')
            ->allowEmpty('va_sis_rod_maq');

        $validator
            ->numeric('va_sis_rod_imp')
            ->allowEmpty('va_sis_rod_imp');

        $validator
            ->numeric('vida_util_maq')
            ->allowEmpty('vida_util_maq');

        $validator
            ->integer('vida_util_maq_year')
            ->allowEmpty('vida_util_maq_year');

        $validator
            ->numeric('vida_util_imp')
            ->allowEmpty('vida_util_imp');

        $validator
            ->integer('vida_util_imp_year')
            ->allowEmpty('vida_util_imp_year');

        $validator
            ->numeric('vida_util_srod_maq')
            ->allowEmpty('vida_util_srod_maq');

        $validator
            ->integer('vida_util_srod_imp')
            ->allowEmpty('vida_util_srod_imp');

        $validator
            ->numeric('fac_arreglo_mec')
            ->allowEmpty('fac_arreglo_mec');

        $validator
            ->boolean('leasing_credito')
            ->allowEmpty('leasing_credito');

        $validator
            ->numeric('cuota_maq_mes')
            ->allowEmpty('cuota_maq_mes');

        $validator
            ->numeric('cuota_mes_imp')
            ->allowEmpty('cuota_mes_imp');

        $validator
            ->numeric('fac_var_res')
            ->allowEmpty('fac_var_res');

        $validator
            ->numeric('cons_comb')
            ->allowEmpty('cons_comb');

        $validator
            ->numeric('con_aceite_motor')
            ->allowEmpty('con_aceite_motor');

        $validator
            ->numeric('con_aceite_trans')
            ->allowEmpty('con_aceite_trans');

        $validator
            ->numeric('con_aceite_hidra')
            ->allowEmpty('con_aceite_hidra');

        $validator
            ->numeric('con_grasa')
            ->allowEmpty('con_grasa');

        $validator
            ->numeric('costo_hora_filtros')
            ->allowEmpty('costo_hora_filtros');

        $validator
            ->numeric('manten_horugas_horas')
            ->allowEmpty('manten_horugas_horas');

        $validator
            ->numeric('mangueras_horas')
            ->allowEmpty('mangueras_horas');

        $validator
            ->numeric('ant_operario')
            ->allowEmpty('ant_operario');

        $validator
            ->numeric('aceite_cadena_hora')
            ->allowEmpty('aceite_cadena_hora');

        $validator
            ->numeric('espada_hora')
            ->allowEmpty('espada_hora');

        $validator
            ->numeric('cadena_hora')
            ->allowEmpty('cadena_hora');

        $validator
            ->numeric('n_turnos')
            ->allowEmpty('n_turnos');

        $validator
            ->numeric('horas_dia')
            ->allowEmpty('horas_dia');

        $validator
            ->boolean('tiene_costos')
            ->allowEmpty('tiene_costos');

        return $validator;
    }
}
