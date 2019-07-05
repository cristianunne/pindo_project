<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Plantaciones Model
 *
 * @method \App\Model\Entity\Plantacione get($primaryKey, $options = [])
 * @method \App\Model\Entity\Plantacione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Plantacione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Plantacione|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Plantacione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Plantacione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Plantacione findOrCreate($search, callable $callback = null, $options = [])
 */
class PlantacionesTable extends Table
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

        $this->setTable('plantaciones');
        $this->setDisplayField('nro_plantacion');
        $this->setPrimaryKey('nro_plantacion');

        $this->hasOne('Rodales', [

            'foreignKey' => 'idrodales'
        ]);

        $this->belongsTo('Procedencias', [
            'foreignKey' => 'procedencias_idprocedencias',
            'bindingKey' => 'idprocedencias'
        ]);


        $this->belongsTo('Emsefor');
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
            ->integer('nro_plantacion')
            ->allowEmpty('nro_plantacion', 'create');

        $validator
            ->integer('rodales_idrodales')
            ->requirePresence('rodales_idrodales', 'create')
            ->notEmpty('rodales_idrodales');

        $validator
            ->date('fecha')
            ->allowEmpty('fecha');

        $validator
            ->numeric('superficie')
            ->allowEmpty('superficie');

        $validator
            ->numeric('densidad')
            ->allowEmpty('densidad');

        $validator
            ->numeric('dist_lineas')
            ->allowEmpty('dist_lineas');

        $validator
            ->numeric('dist_plantas')
            ->allowEmpty('dist_plantas');

        $validator
            ->integer('num_arbol_plantado')
            ->allowEmpty('num_arbol_plantado');

        $validator
            ->numeric('sobrevivencia')
            ->allowEmpty('sobrevivencia');

        $validator
            ->integer('emsefor_idemsefor')
            ->requirePresence('emsefor_idemsefor', 'create')
            ->notEmpty('emsefor_idemsefor');

        $validator
            ->integer('procedencias_idprocedencias')
            ->requirePresence('procedencias_idprocedencias', 'create')
            ->notEmpty('procedencias_idprocedencias');

        return $validator;
    }
}
