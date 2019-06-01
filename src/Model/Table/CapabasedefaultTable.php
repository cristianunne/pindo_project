<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Capabasedefault Model
 *
 * @property \App\Model\Table\CapasbaseTable|\Cake\ORM\Association\BelongsTo $Capasbase
 *
 * @method \App\Model\Entity\Capabasedefault get($primaryKey, $options = [])
 * @method \App\Model\Entity\Capabasedefault newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Capabasedefault[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Capabasedefault|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Capabasedefault patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Capabasedefault[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Capabasedefault findOrCreate($search, callable $callback = null, $options = [])
 */
class CapabasedefaultTable extends Table
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

        $this->setTable('capabasedefault');
        $this->setDisplayField('idcapabasedefault');
        $this->setPrimaryKey('idcapabasedefault');

        $this->belongsTo('Capasbase', [
            'foreignKey' => 'capabase_id',
            'joinType' => 'INNER'
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
            ->integer('idcapabasedefault')
            ->allowEmpty('idcapabasedefault', 'create');

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
        $rules->add($rules->existsIn(['capabase_id'], 'Capasbase'));

        return $rules;
    }
}
