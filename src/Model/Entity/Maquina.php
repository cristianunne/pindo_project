<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Maquina Entity
 *
 * @property int $idmaquinas
 * @property string $marca
 * @property string $modelo
 * @property int $photo
 * @property string $photo_dir
 */
class Maquina extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'idmaquinas' => false
    ];
}
