<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Maquinas Model
 *
 * @method \App\Model\Entity\Maquina get($primaryKey, $options = [])
 * @method \App\Model\Entity\Maquina newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Maquina[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Maquina|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Maquina patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Maquina[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Maquina findOrCreate($search, callable $callback = null, $options = [])
 */
class MaquinasTable extends Table
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

        $this->table('maquinas');
        $this->displayField('idmaquinas');
        $this->primaryKey('idmaquinas');


        $this->hasOne('EmsMaq', [
            'foreignKey' => 'maquinas_idmaquinas'
        ]);


        $num = rand(100000 , 10000000);

        $letras = "1234567890abcdefghijklmnopqrstuvwxyz";
        //Recorro y genero las letras aleatorias
        $clave = "";

        for ($i = 0; $i < 5; $i++) {
             $clave .= $letras{rand(0, 35)};
        }

        //$num_2 = rand(100000 , 1000000);

         $this->addBehavior('Josegonzalez/Upload.Upload', [
            'photo' => [

                'path' => 'webroot/files/{model}/{field}/'. $num.$clave,

                'fields' => [
                    // if these fields or their defaults exist
                    // the values will be set.
                    'dir' => 'photo_dir', // defaults to `dir`
                    'size' => 'photo_size', // defaults to `size`
                    'type' => 'photo_type', // defaults to `type`

                ],
                'deleteCallback' => function ($path, $entity, $field, $settings) {
                    // When deleting the entity, both the original and the thumbnail will be removed
                    // when keepFilesOnDelete is set to false
                    return [
                        $path . $entity->{$field},
                    ];
                },
                'keepFilesOnDelete' => true
            ],
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
        $validator->provider('upload', \Josegonzalez\Upload\Validation\DefaultValidation::class);
        $validator
            ->integer('idmaquinas')
            ->allowEmpty('idmaquinas', 'create');

        $validator
            ->requirePresence('marca', 'create')
            ->notEmpty('marca');

        $validator
            ->requirePresence('modelo', 'create')
            ->notEmpty('modelo');

        $validator
            ->allowEmpty('photo');

        $validator
            ->allowEmpty('photo_dir');

        $validator->add('photo', 'fileBelowMaxWidth', [
            'rule' => ['isBelowMaxWidth', 2000],
            'message' => 'This image should not be wider than 2000px',
            'provider' => 'upload'
        ]);
        $validator->add('photo', 'isValidMimeType', [
            'rule' => ['mimeType', ['image/jpeg', 'image/png']],
            'message' => 'Tipo de imagen Invalido'
        ]);


        return $validator;
    }
}
