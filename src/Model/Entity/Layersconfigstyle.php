<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Layersconfigstyle Entity
 *
 * @property int $id
 * @property string|null $paleta
 * @property string|null $nombre
 * @property string|null $campo_clasified
 * @property bool $overlapslayer
 */
class Layersconfigstyle extends Entity
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
        'paleta' => true,
        'nombre' => true,
        'campo_clasified' => true,
        'overlapslayer' => true
    ];
}
