<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Modelos Model
 *
 * @method \App\Model\Entity\Modelo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Modelo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Modelo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Modelo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Modelo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Modelo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Modelo findOrCreate($search, callable $callback = null, $options = [])
 */
class ModelosTable extends Table
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

        $this->setTable('modelos');
        $this->setDisplayField('idmodelos');
        $this->setPrimaryKey('idmodelos');
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
            ->integer('idmodelos')
            ->allowEmpty('idmodelos', 'create');

        $validator
            ->scalar('cosecha')
            ->allowEmpty('cosecha');

        $validator
            ->scalar('tipo_maquina')
            ->maxLength('tipo_maquina', 50)
            ->allowEmpty('tipo_maquina');

        $validator
            ->scalar('modelo')
            ->maxLength('modelo', 100)
            ->allowEmpty('modelo');

        $validator
            ->scalar('operacion')
            ->maxLength('operacion', 20)
            ->allowEmpty('operacion');

        $validator
            ->scalar('tarea')
            ->allowEmpty('tarea');

        $validator
            ->scalar('modelo_algoritmo')
            ->allowEmpty('modelo_algoritmo');

        $validator
            ->boolean('estado')
            ->allowEmpty('estado');

        return $validator;
    }
}
