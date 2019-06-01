<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Gi Entity
 *
 * @property int $idgis
 * @property float $superficie
 * @property float $perimetro
 * @property string $departamento
 * @property string $municipio
 * @property string $seccion
 * @property string $chacra
 * @property string $manzana
 * @property string $parcela
 * @property string $sub_parcela
 * @property string $partida
 * @property int $rodales_idrodales
 * @property string $geom
 * @property string $geom_geo
 * @property string $geom_point
 */
class Gi extends Entity
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
        'superficie' => true,
        'perimetro' => true,
        'departamento' => true,
        'municipio' => true,
        'seccion' => true,
        'chacra' => true,
        'manzana' => true,
        'parcela' => true,
        'sub_parcela' => true,
        'partida' => true,
        'rodales_idrodales' => true,
        'geom' => true,
        'geom_geo' => true,
        'geom_point' => true
    ];
}
