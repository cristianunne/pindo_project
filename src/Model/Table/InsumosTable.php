<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Insumos Model
 *
 * @method \App\Model\Entity\Insumo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Insumo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Insumo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Insumo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Insumo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Insumo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Insumo findOrCreate($search, callable $callback = null, $options = [])
 */
class InsumosTable extends Table
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

        $this->setTable('insumos');
        $this->setDisplayField('idinsumos');
        $this->setPrimaryKey('idinsumos');
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
            ->integer('idinsumos')
            ->allowEmpty('idinsumos', 'create');

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
            ->numeric('precio_aceite_cadena')
            ->allowEmpty('precio_aceite_cadena');

        $validator
            ->numeric('precio_espada')
            ->allowEmpty('precio_espada');

        $validator
            ->numeric('precio_cadena')
            ->allowEmpty('precio_cadena');

        $validator
            ->numeric('pres_grasa')
            ->allowEmpty('pres_grasa');

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
            ->numeric('pantalon_seguridad')
            ->allowEmpty('pantalon_seguridad');

        $validator
            ->numeric('alojamiento_dia_persona')
            ->allowEmpty('alojamiento_dia_persona');

        $validator
            ->numeric('vianda_dia')
            ->allowEmpty('vianda_dia');

        $validator
            ->numeric('movil_traslado_costo')
            ->allowEmpty('movil_traslado_costo');

        return $validator;
    }
}
