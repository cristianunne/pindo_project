<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Arboles Model
 *
 * @method \App\Model\Entity\Arbole get($primaryKey, $options = [])
 * @method \App\Model\Entity\Arbole newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Arbole[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Arbole|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Arbole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Arbole[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Arbole findOrCreate($search, callable $callback = null, $options = [])
 */
class ArbolesTable extends Table
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

        $this->setTable('arboles');
        $this->setDisplayField('idarbol');
        $this->setPrimaryKey('idarbol');

        $this->hasOne('ParcelasRel', [

            'foreignKey' => 'id_parcelas_rel',
            'bindingKey' => 'parcela_idparcela',
            'joinType' => 'INNER'
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
            ->integer('idarbol')
            ->allowEmpty('idarbol', 'create');

        $validator
            ->scalar('marca')
            ->maxLength('marca', 50)
            ->allowEmpty('marca');

        $validator
            ->numeric('dap')
            ->allowEmpty('dap');

        $validator
            ->numeric('altura')
            ->allowEmpty('altura');

        $validator
            ->numeric('altura_poda')
            ->allowEmpty('altura_poda');

        $validator
            ->numeric('dmsm')
            ->allowEmpty('dmsm');

        $validator
            ->scalar('calidad')
            ->maxLength('calidad', 50)
            ->allowEmpty('calidad');

        $validator
            ->boolean('cosechado')
            ->allowEmpty('cosechado');

        $validator
            ->integer('parcela_idparcela')
            ->requirePresence('parcela_idparcela', 'create')
            ->notEmpty('parcela_idparcela');

        $validator
            ->scalar('geom')
            ->allowEmpty('geom');

        $validator
            ->date('fecha_rel')
            ->allowEmpty('fecha_rel');

        return $validator;
    }
}
