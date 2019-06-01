<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Capasbase Model
 *
 * @method \App\Model\Entity\Capasbase get($primaryKey, $options = [])
 * @method \App\Model\Entity\Capasbase newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Capasbase[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Capasbase|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Capasbase patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Capasbase[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Capasbase findOrCreate($search, callable $callback = null, $options = [])
 */
class CapasbaseTable extends Table
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

        $this->setTable('capasbase');
        $this->setDisplayField('idcapasbase');
        $this->setPrimaryKey('idcapasbase');
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
            ->integer('idcapasbase')
            ->allowEmpty('idcapasbase', 'create');

        $validator
            ->scalar('urlservice')
            ->requirePresence('urlservice', 'create')
            ->notEmpty('urlservice');

        $validator
            ->scalar('attribution')
            ->requirePresence('attribution', 'create')
            ->notEmpty('attribution');

        $validator
            ->scalar('subdomain')
            ->maxLength('subdomain', 255)
            ->allowEmpty('subdomain');

        $validator
            ->integer('minzoom')
            ->allowEmpty('minzoom');

        $validator
            ->integer('maxzoom')
            ->allowEmpty('maxzoom');

        $validator
            ->scalar('format')
            ->maxLength('format', 50)
            ->allowEmpty('format');

        $validator
            ->scalar('time')
            ->maxLength('time', 100)
            ->allowEmpty('time');

        $validator
            ->scalar('tilematrixset')
            ->maxLength('tilematrixset', 100)
            ->allowEmpty('tilematrixset');

        $validator
            ->decimal('opacity')
            ->allowEmpty('opacity');

        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 100)
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        return $validator;
    }
}
