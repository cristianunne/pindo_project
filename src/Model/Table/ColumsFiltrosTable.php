<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ColumsFiltros Model
 *
 * @method \App\Model\Entity\ColumsFiltro get($primaryKey, $options = [])
 * @method \App\Model\Entity\ColumsFiltro newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ColumsFiltro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ColumsFiltro|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ColumsFiltro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ColumsFiltro[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ColumsFiltro findOrCreate($search, callable $callback = null, $options = [])
 */
class ColumsFiltrosTable extends Table
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

        $this->setTable('colums_filtros');
        $this->setDisplayField('id_columns_filtro');
        $this->setPrimaryKey('id_columns_filtro');

        $this->hasOne('TablasFiltros', [
            'foreignKey' => 'idtablasfiltros',
            'bindingKey' => 'id_table_filtro'
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
            ->integer('id_columns_filtro')
            ->allowEmpty('id_columns_filtro', 'create');

        $validator
            ->scalar('name_column')
            ->maxLength('name_column', 50)
            ->requirePresence('name_column', 'create')
            ->notEmpty('name_column');

        $validator
            ->integer('id_table_filtro')
            ->allowEmpty('id_table_filtro');

        $validator
            ->scalar('descripcion')
            ->maxLength('descripcion', 50)
            ->allowEmpty('descripcion');

        return $validator;
    }
}
