<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SimulacionResumen Entity
 *
 * @property int $idsimulacion
 * @property string $tarea
 * @property float $produccion_mes
 * @property string $actividad_lim
 * @property float $balance
 * @property float $costo_total
 * @property int $idsim_res
 */
class SimulacionResumen extends Entity
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
        'idsimulacion' => true,
        'tarea' => true,
        'produccion_mes' => true,
        'actividad_lim' => true,
        'balance' => true,
        'costo_total' => true
    ];
}
