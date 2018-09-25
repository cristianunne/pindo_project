<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Simulacione Entity
 *
 * @property int $idsimulaciones
 * @property \Cake\I18n\FrozenDate $fecha
 * @property int $rodales_idrodales
 * @property string $tipo_simulacion
 * @property string $sistema_cosecha
 * @property float $superficie
 * @property float $vol_medio
 * @property float $dist_extraccion
 * @property float $produccion_total
 * @property float $vol_total
 * @property int $dias_cosecha
 * @property float $produccion_equilibrio
 * @property float $costo_prod_bruta
 * @property float $costo_prod_admin
 * @property float $margen_ganancia
 * @property float $tarifa_sin_imp
 * @property float $tarifa_con_imp
 * @property float $beneficio
 */
class Simulacione extends Entity
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
        'fecha' => true,
        'rodales_idrodales' => true,
        'tipo_simulacion' => true,
        'sistema_cosecha' => true,
        'superficie' => true,
        'vol_medio' => true,
        'dist_extraccion' => true,
        'produccion_total' => true,
        'vol_total' => true,
        'dias_cosecha' => true,
        'produccion_equilibrio' => true,
        'costo_prod_bruta' => true,
        'costo_prod_admin' => true,
        'margen_ganancia' => true,
        'tarifa_sin_imp' => true,
        'tarifa_con_imp' => true,
        'beneficio' => true
    ];
}
