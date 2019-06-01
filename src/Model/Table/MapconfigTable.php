<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Mapconfig Model
 *
 * @method \App\Model\Entity\Mapconfig get($primaryKey, $options = [])
 * @method \App\Model\Entity\Mapconfig newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Mapconfig[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Mapconfig|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mapconfig patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Mapconfig[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Mapconfig findOrCreate($search, callable $callback = null, $options = [])
 */
class MapconfigTable extends Table
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

        $this->setTable('mapconfig');
        $this->setDisplayField('idmapconfig');
        $this->setPrimaryKey('idmapconfig');
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
            ->integer('idmapconfig')
            ->allowEmpty('idmapconfig', 'create');

        $validator
            ->scalar('crs')
            ->maxLength('crs', 45)
            ->allowEmpty('crs');

        $validator
            ->scalar('center')
            ->requirePresence('center', 'create')
            ->notEmpty('center');

        $validator
            ->integer('zoom')
            ->allowEmpty('zoom');

        $validator
            ->integer('minzoom')
            ->requirePresence('minzoom', 'create')
            ->notEmpty('minzoom');

        $validator
            ->integer('maxzoom')
            ->allowEmpty('maxzoom');

        $validator
            ->scalar('renderer')
            ->maxLength('renderer', 10)
            ->allowEmpty('renderer');

        return $validator;
    }
}
