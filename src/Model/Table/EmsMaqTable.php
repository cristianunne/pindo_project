<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EmsMaq Model
 *
 * @method \App\Model\Entity\EmsMaq get($primaryKey, $options = [])
 * @method \App\Model\Entity\EmsMaq newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EmsMaq[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EmsMaq|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmsMaq patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EmsMaq[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EmsMaq findOrCreate($search, callable $callback = null, $options = [])
 */
class EmsMaqTable extends Table
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

        $this->table('ems_maq');
        $this->displayField('emsefor_idemsefor');
        $this->primaryKey(['emsefor_idemsefor', 'maquinas_idmaquinas', 'maquina_especifica_idmaquina_especifica']);

        $this->hasOne('MaquinaEspecifica', [

            'foreignKey' => 'idmaquina_especifica',
            'bindingKey' => 'maquina_especifica_idmaquina_especifica'
        ]);

        $this->hasMany('Emsefor', [

            'foreignKey' => 'idemsefor',
            'bindingKey' => 'emsefor_idemsefor'
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
            ->integer('emsefor_idemsefor')
            ->allowEmpty('emsefor_idemsefor', 'create');

        $validator
            ->integer('maquinas_idmaquinas')
            ->allowEmpty('maquinas_idmaquinas', 'create');

        $validator
            ->integer('maquina_especifica_idmaquina_especifica')
            ->allowEmpty('maquina_especifica_idmaquina_especifica', 'create');

        return $validator;
    }
}
