<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Mapconfig Entity
 *
 * @property int $idmapconfig
 * @property string $crs
 * @property string $center
 * @property int $zoom
 * @property int $minzoom
 * @property int $maxzoom
 * @property string $renderer
 */
class Mapconfig extends Entity
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
        'crs' => true,
        'center' => true,
        'zoom' => true,
        'minzoom' => true,
        'maxzoom' => true,
        'renderer' => true
    ];
}
