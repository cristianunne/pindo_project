<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CatItemSueldo Entity
 *
 * @property int $idcat_item_sueldos
 * @property string $categoria
 */
class CatItemSueldo extends Entity
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
        'categoria' => true
    ];
}
