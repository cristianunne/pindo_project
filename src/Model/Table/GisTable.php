<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Gis Model
 *
 * @method \App\Model\Entity\Gi get($primaryKey, $options = [])
 * @method \App\Model\Entity\Gi newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Gi[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Gi|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Gi patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Gi[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Gi findOrCreate($search, callable $callback = null, $options = [])
 */
class GisTable extends Table
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

        $this->setTable('gis');
        $this->setDisplayField('idgis');
        $this->setPrimaryKey('idgis');
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
            ->integer('idgis')
            ->allowEmpty('idgis', 'create');

        $validator
            ->numeric('superficie')
            ->allowEmpty('superficie');

        $validator
            ->numeric('perimetro')
            ->allowEmpty('perimetro');

        $validator
            ->scalar('departamento')
            ->maxLength('departamento', 10)
            ->allowEmpty('departamento');

        $validator
            ->scalar('municipio')
            ->maxLength('municipio', 10)
            ->allowEmpty('municipio');

        $validator
            ->scalar('seccion')
            ->maxLength('seccion', 10)
            ->allowEmpty('seccion');

        $validator
            ->scalar('chacra')
            ->maxLength('chacra', 10)
            ->allowEmpty('chacra');

        $validator
            ->scalar('manzana')
            ->maxLength('manzana', 10)
            ->allowEmpty('manzana');

        $validator
            ->scalar('parcela')
            ->maxLength('parcela', 10)
            ->allowEmpty('parcela');

        $validator
            ->scalar('sub_parcela')
            ->maxLength('sub_parcela', 10)
            ->allowEmpty('sub_parcela');

        $validator
            ->scalar('partida')
            ->maxLength('partida', 10)
            ->allowEmpty('partida');

        $validator
            ->integer('rodales_idrodales')
            ->requirePresence('rodales_idrodales', 'create')
            ->notEmpty('rodales_idrodales');

        $validator
            ->scalar('geom')
            ->allowEmpty('geom');

        $validator
            ->scalar('geom_geo')
            ->allowEmpty('geom_geo');

        $validator
            ->scalar('geom_point')
            ->allowEmpty('geom_point');

        return $validator;
    }
}
