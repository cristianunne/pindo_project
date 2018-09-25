<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VariablesGlobale Entity
 *
 * @property int $idvariables_globales
 * @property float $tasa_int_cap_propio
 * @property float $ausentismo
 * @property float $margen_ganancia
 * @property float $costo_administrativo
 * @property float $contador_publico
 * @property float $impuestos_totales
 * @property float $tasa_seguro
 * @property float $traslado_personal
 * @property float $dias_mes
 * @property int $emsefor_idemsefor
 */
class VariablesGlobale extends Entity
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
        'tasa_int_cap_propio' => true,
        'ausentismo' => true,
        'margen_ganancia' => true,
        'costo_administrativo' => true,
        'contador_publico' => true,
        'impuestos_totales' => true,
        'tasa_seguro' => true,
        'traslado_personal' => true,
        'dias_mes' => true,
        'emsefor_idemsefor' => true
    ];
}
