<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TablasFiltros Model
 *
 * @method \App\Model\Entity\TablasFiltro get($primaryKey, $options = [])
 * @method \App\Model\Entity\TablasFiltro newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TablasFiltro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TablasFiltro|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TablasFiltro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TablasFiltro[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TablasFiltro findOrCreate($search, callable $callback = null, $options = [])
 */
class TablasFiltrosTable extends Table
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

        $this->setTable('tablas_filtros');
        $this->setDisplayField('idtablasfiltros');
        $this->setPrimaryKey('idtablasfiltros');

        $this->hasMany('TablasFiltros', [
            'foreignKey' => 'id_table_filtro',
            'bindingKey' => 'idtablasfiltros'
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
            ->scalar('tabla_name')
            ->maxLength('tabla_name', 40)
            ->allowEmpty('tabla_name');

        $validator
            ->integer('idtablasfiltros')
            ->allowEmpty('idtablasfiltros', 'create');

        return $validator;
    }
}
