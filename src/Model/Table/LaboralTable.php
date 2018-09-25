<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Laboral Model
 *
 * @method \App\Model\Entity\Laboral get($primaryKey, $options = [])
 * @method \App\Model\Entity\Laboral newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Laboral[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Laboral|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Laboral patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Laboral[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Laboral findOrCreate($search, callable $callback = null, $options = [])
 */
class LaboralTable extends Table
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

        $this->setTable('laboral');
        $this->setDisplayField('idlaboral');
        $this->setPrimaryKey('idlaboral');
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
            ->integer('idlaboral')
            ->allowEmpty('idlaboral', 'create');

        $validator
            ->scalar('convenio')
            ->maxLength('convenio', 45)
            ->allowEmpty('convenio');

        $validator
            ->numeric('antiguedad')
            ->allowEmpty('antiguedad');

        $validator
            ->numeric('aguinaldo')
            ->allowEmpty('aguinaldo');

        $validator
            ->numeric('ant_sup')
            ->allowEmpty('ant_sup');

        $validator
            ->numeric('feriado')
            ->allowEmpty('feriado');

        $validator
            ->numeric('vacaciones')
            ->allowEmpty('vacaciones');

        $validator
            ->numeric('presentismo')
            ->allowEmpty('presentismo');

        $validator
            ->numeric('empleado_jub')
            ->allowEmpty('empleado_jub');

        $validator
            ->numeric('empleado_obra_social')
            ->allowEmpty('empleado_obra_social');

        $validator
            ->numeric('empleado_ley_19032')
            ->allowEmpty('empleado_ley_19032');

        $validator
            ->numeric('empleado_seguro_vida')
            ->allowEmpty('empleado_seguro_vida');

        $validator
            ->numeric('empleado_sindicato')
            ->allowEmpty('empleado_sindicato');

        $validator
            ->numeric('empleado_renatea')
            ->allowEmpty('empleado_renatea');

        $validator
            ->numeric('empleador_jub')
            ->allowEmpty('empleador_jub');

        $validator
            ->numeric('empleador_asignacion')
            ->allowEmpty('empleador_asignacion');

        $validator
            ->numeric('empleador_fondo_des')
            ->allowEmpty('empleador_fondo_des');

        $validator
            ->numeric('empleador_inssjp')
            ->allowEmpty('empleador_inssjp');

        $validator
            ->numeric('empleador_obra_social')
            ->allowEmpty('empleador_obra_social');

        $validator
            ->numeric('empleador_seguro_vida')
            ->allowEmpty('empleador_seguro_vida');

        $validator
            ->numeric('empleador_renatea')
            ->allowEmpty('empleador_renatea');

        $validator
            ->numeric('prev_enfermedad')
            ->allowEmpty('prev_enfermedad');

        $validator
            ->numeric('exam_preocup')
            ->allowEmpty('exam_preocup');

        $validator
            ->numeric('seguro_colectivo')
            ->allowEmpty('seguro_colectivo');

        $validator
            ->numeric('prev_despido')
            ->allowEmpty('prev_despido');

        $validator
            ->numeric('art_fijo')
            ->allowEmpty('art_fijo');

        $validator
            ->numeric('art_prop')
            ->allowEmpty('art_prop');

        return $validator;
    }
}
