<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MaqespCatop Model
 *
 * @method \App\Model\Entity\MaqespCatop get($primaryKey, $options = [])
 * @method \App\Model\Entity\MaqespCatop newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MaqespCatop[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MaqespCatop|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MaqespCatop patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MaqespCatop[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MaqespCatop findOrCreate($search, callable $callback = null, $options = [])
 */
class MaqespCatopTable extends Table
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

        $this->setTable('maqesp_catop');
        $this->setDisplayField('cat_operarios_idcat_operarios');
        $this->setPrimaryKey(['cat_operarios_idcat_operarios', 'maquina_especifica_idmaquina_especifica']);

        $this->hasOne('CatOperarios', [
            'bindingKey' => 'cat_operarios_idcat_operarios',
            'foreignKey' => 'idcat_operarios'
        ]);

        $this->hasOne('maquina_especifica', [
            'bindingKey' => 'maquina_especifica_idmaquina_especifica',
            'foreignKey' => 'idmaquina_especifica'
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
            ->integer('cat_operarios_idcat_operarios')
            ->allowEmpty('cat_operarios_idcat_operarios', 'create');

        $validator
            ->integer('maquina_especifica_idmaquina_especifica')
            ->allowEmpty('maquina_especifica_idmaquina_especifica', 'create')
            ->add('maquina_especifica_idmaquina_especifica', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->numeric('sal_basico_mes')
            ->allowEmpty('sal_basico_mes');

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
        $rules->add($rules->isUnique(['maquina_especifica_idmaquina_especifica']));

        return $rules;
    }
}
