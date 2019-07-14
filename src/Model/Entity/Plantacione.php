<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Plantacione Entity
 *
 * @property int $nro_plantacion
 * @property int $rodales_idrodales
 * @property \Cake\I18n\FrozenDate|null $fecha
 * @property float|null $superficie
 * @property float|null $densidad
 * @property float|null $dist_lineas
 * @property float|null $dist_plantas
 * @property int|null $num_arbol_plantado
 * @property float|null $sobrevivencia
 * @property int $emsefor_idemsefor
 * @property int $procedencias_idprocedencias
 *
 * @property \App\Model\Entity\Rodale $rodale
 * @property \App\Model\Entity\Procedencia $procedencia
 * @property \App\Model\Entity\Emsefor $emsefor
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
        'procedencias_idprocedencias' => true,
        'rodale' => true,
        'procedencia' => true,
        'emsefor' => true
    ];
}
