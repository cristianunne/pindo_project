<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SimulacionesMaqesp Entity
 *
 * @property int $simulaciones_idsimulaciones
 * @property int $idmaquina_especifica
 * @property string $actividad
 * @property float $productividad
 * @property float $productividad_real
 * @property float $produccion_mes
 * @property float $costo_fijo
 * @property float $costo_variable
 * @property float $costo_total
 *
 * @property \App\Model\Entity\Simulacione $simulacione
 * @property \App\Model\Entity\MaquinaEspecifica[] $maquina_especifica
 */
class SimulacionesMaqesp extends Entity
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
        'actividad' => true,
        'productividad' => true,
        'productividad_real' => true,
        'produccion_mes' => true,
        'costo_fijo' => true,
        'costo_variable' => true,
        'costo_total' => true,
        'simulacione' => true,
        'maquina_especifica' => true
    ];
}
