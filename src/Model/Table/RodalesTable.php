<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rodales Model
 *
 * @method \App\Model\Entity\Rodale get($primaryKey, $options = [])
 * @method \App\Model\Entity\Rodale newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Rodale[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rodale|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rodale patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Rodale[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rodale findOrCreate($search, callable $callback = null, $options = [])
 */
class RodalesTable extends Table
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

        $this->table('rodales');
        $this->displayField('idrodales');
        $this->primaryKey('idrodales');


          $this->belongsTo('Empresa', [
                'foreignKey' => 'empresa_idempresa',
                'joinType' => 'INNER'
            ]);


        $this->belongsToMany('Sagpyas', [

            'targetForeignKey' => 'sagpya_idsagpya',
            'foreignKey' => 'rodales_idrodales',
            'joinTable' => 'rodal_sagpya',
            'joinType' => 'INNER'
        ]);

        $this->hasOne('Plantaciones', [

                'foreignKey' => 'rodales_idrodales',
                'joinType' => 'INNER'
            ]);

         $this->hasMany('Intervenciones', [
                'foreignKey' => 'rodales_idrodales'
            ]);

        $this->hasMany('Inventario', [
                'foreignKey' => 'rodales_idrodales'
            ]);

        $this->hasMany('ParcelasRel', [
            'foreignKey' => 'rodales_idrodales'
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
            ->integer('idrodales')
            ->allowEmpty('idrodales', 'create');

        $validator
            ->allowEmpty('cod_sap');

        $validator
            ->allowEmpty('campo');

        $validator
            ->allowEmpty('uso');

        $validator
            ->boolean('finalizado')
            ->allowEmpty('finalizado');

        $validator
            ->integer('empresa_idempresa')
            ->requirePresence('empresa_idempresa', 'create')
            ->notEmpty('empresa_idempresa');

        return $validator;
    }
}
