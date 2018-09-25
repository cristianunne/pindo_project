<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RodalSagpya Model
 *
 * @method \App\Model\Entity\RodalSagpya get($primaryKey, $options = [])
 * @method \App\Model\Entity\RodalSagpya newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RodalSagpya[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RodalSagpya|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RodalSagpya patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RodalSagpya[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RodalSagpya findOrCreate($search, callable $callback = null, $options = [])
 */
class RodalSagpyaTable extends Table
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

        $this->table('rodal_sagpya');
        $this->displayField('rodales_idrodales');
        $this->primaryKey(['rodales_idrodales', 'sagpya_idsagpya']);
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
            ->integer('rodales_idrodales')
            ->allowEmpty('rodales_idrodales', 'create');

        $validator
            ->integer('sagpya_idsagpya')
            ->allowEmpty('sagpya_idsagpya', 'create');

        return $validator;
    }
}
