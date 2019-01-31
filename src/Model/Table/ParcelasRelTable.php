<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ParcelasRel Model
 *
 * @method \App\Model\Entity\ParcelasRel get($primaryKey, $options = [])
 * @method \App\Model\Entity\ParcelasRel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ParcelasRel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ParcelasRel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ParcelasRel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ParcelasRel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ParcelasRel findOrCreate($search, callable $callback = null, $options = [])
 */
class ParcelasRelTable extends Table
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

        $this->setTable('parcelas_rel');
        $this->setDisplayField('id_parcelas_rel');
        $this->setPrimaryKey('id_parcelas_rel');

        $this->hasOne('Rodales', [

            'foreignKey' => 'idrodales',
            'bindingKey' => 'rodales_idrodales',
            'joinType' => 'INNER'
        ]);

        $this->hasOne('Arboles', [

            'foreignKey' => 'parcela_idparcela',
            'bindingKey' => 'id_parcelas_rel'
        ]);

        $this->hasOne('arboles_by_parcelas', [

            'foreignKey' => 'id_parcelas_rel',
            'bindingKey' => 'id_parcelas_rel'
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
            ->integer('id_parcelas_rel')
            ->allowEmpty('id_parcelas_rel', 'create');

        $validator
            ->integer('rodales_idrodales')
            ->requirePresence('rodales_idrodales', 'create')
            ->notEmpty('rodales_idrodales');

        $validator
            ->scalar('geom')
            ->allowEmpty('geom');

        $validator
            ->scalar('comentarios')
            ->allowEmpty('comentarios');

        $validator
            ->scalar('tipo')
            ->maxLength('tipo', 40)
            ->allowEmpty('tipo');

        $validator
            ->date('fecha')
            ->allowEmpty('fecha');

        return $validator;
    }
}
