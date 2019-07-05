<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Plantacione Entity
 *
 * @property int $nro_plantacion
 * @property int $rodales_idrodales
 * @property \Cake\I18n\FrozenDate $fecha
 * @property float $superficie
 * @property float $densidad
 * @property float $dist_lineas
 * @property float $dist_plantas
 * @property int $num_arbol_plantado
 * @property float $sobrevivencia
 * @property int $emsefor_idemsefor
 * @property int $procedencias_idprocedencias
 */
class Plantacione extends Entity
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
        'rodales_idrodales' => true,
        'fecha' => true,
        'superficie' => true,
        'densidad' => true,
        'dist_lineas' => true,
        'dist_plantas' => true,
        'num_arbol_plantado' => true,
        'sobrevivencia' => true,
        'emsefor_idemsefor' => true,
        'procedencias_idprocedencias' => true
    ];
}
