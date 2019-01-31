<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ArbolesByParcelas Model
 *
 * @method \App\Model\Entity\ArbolesByParcela get($primaryKey, $options = [])
 * @method \App\Model\Entity\ArbolesByParcela newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ArbolesByParcela[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ArbolesByParcela|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ArbolesByParcela patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ArbolesByParcela[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ArbolesByParcela findOrCreate($search, callable $callback = null, $options = [])
 */
class ArbolesByParcelasTable extends Table
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

        $this->hasOne('ParcelasRel', [

            'foreignKey' => 'id_parcelas_rel',
            'bindingKey' => 'id_parcelas_rel'
        ]);
        $this->setTable('arboles_by_parcelas');
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
            ->allowEmpty('id_parcelas_rel');

        $validator
            ->allowEmpty('cant_arb');

        return $validator;
    }
}
