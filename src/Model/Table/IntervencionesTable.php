<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Intervenciones Model
 *
 * @method \App\Model\Entity\Intervencione get($primaryKey, $options = [])
 * @method \App\Model\Entity\Intervencione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Intervencione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Intervencione|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Intervencione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Intervencione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Intervencione findOrCreate($search, callable $callback = null, $options = [])
 */
class IntervencionesTable extends Table
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

        $this->table('intervenciones');
        $this->displayField('idintervencion');
        $this->primaryKey('idintervencion');


        $this->belongsTo('Rodales', [
                'foreignKey' => 'rodales_idrodales'
            ]);

        $this->belongsTo('Emsefor', [
            'foreignKey' => 'emsefor_idemsefor'
        ]);

        $this->hasOne('InfoIntervencion');

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
            ->integer('idintervencion')
            ->allowEmpty('idintervencion', 'create');

        $validator
            ->date('fecha')
            ->requirePresence('fecha', 'create')
            ->notEmpty('fecha');

        $validator
            ->integer('nro')
            ->requirePresence('nro', 'create')
            ->notEmpty('nro');

        $validator
            ->requirePresence('tipo_intervencion', 'create')
            ->notEmpty('tipo_intervencion');

        $validator
            ->allowEmpty('levante');

        $validator
            ->allowEmpty('intensidad');

        $validator
            ->allowEmpty('criterio');

        $validator
            ->integer('rodales_idrodales')
            ->requirePresence('rodales_idrodales', 'create')
            ->notEmpty('rodales_idrodales');

        $validator
            ->integer('emsefor_idemsefor')
            ->requirePresence('emsefor_idemsefor', 'create')
            ->notEmpty('emsefor_idemsefor');

        return $validator;
    }
}
