<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Capasbase Entity
 *
 * @property int $idcapasbase
 * @property string $urlservice
 * @property string $attribution
 * @property string $subdomain
 * @property int $minzoom
 * @property int $maxzoom
 * @property string $format
 * @property string $time
 * @property string $tilematrixset
 * @property float $opacity
 * @property string $nombre
 * @property bool $active
 */
class Capasbase extends Entity
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
        'urlservice' => true,
        'attribution' => true,
        'subdomain' => true,
        'minzoom' => true,
        'maxzoom' => true,
        'format' => true,
        'time' => true,
        'tilematrixset' => true,
        'opacity' => true,
        'nombre' => true,
        'active' => true
    ];
}
