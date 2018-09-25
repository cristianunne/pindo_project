<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CatOperarios Model
 *
 * @method \App\Model\Entity\CatOperario get($primaryKey, $options = [])
 * @method \App\Model\Entity\CatOperario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CatOperario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CatOperario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CatOperario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CatOperario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CatOperario findOrCreate($search, callable $callback = null, $options = [])
 */
class CatOperariosTable extends Table
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

        $this->setTable('cat_operarios');
        $this->setDisplayField('idcat_operarios');
        $this->setPrimaryKey('idcat_operarios');

        $this->hasMany('laboral', [
            'foreignKey' => 'catoperarios_idcatoperarios'
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
            ->integer('idcat_operarios')
            ->allowEmpty('idcat_operarios', 'create');

        $validator
            ->scalar('categoria')
            ->maxLength('categoria', 40)
            ->allowEmpty('categoria')
            ->add('categoria', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['categoria']));

        return $rules;
    }
}
