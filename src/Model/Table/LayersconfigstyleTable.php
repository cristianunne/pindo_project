<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Layersconfigstyle Model
 *
 * @method \App\Model\Entity\Layersconfigstyle get($primaryKey, $options = [])
 * @method \App\Model\Entity\Layersconfigstyle newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Layersconfigstyle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Layersconfigstyle|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Layersconfigstyle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Layersconfigstyle[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Layersconfigstyle findOrCreate($search, callable $callback = null, $options = [])
 */
class LayersconfigstyleTable extends Table
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

        $this->setTable('layersconfigstyle');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('paleta')
            ->maxLength('paleta', 40)
            ->allowEmpty('paleta');

        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 15)
            ->allowEmpty('nombre');

        $validator
            ->scalar('campo_clasified')
            ->maxLength('campo_clasified', 30)
            ->allowEmpty('campo_clasified');

        return $validator;
    }
}
