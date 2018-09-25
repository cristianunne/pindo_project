<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Inventario Entity
 *
 * @property int $idinventario
 * @property string $cod_sap
 * @property \Cake\I18n\FrozenDate $fecha
 * @property int $num_arbol
 * @property float $dap
 * @property float $altura
 * @property float $vol_medio
 * @property float $vol_total
 * @property float $area_basal
 * @property string $forma
 * @property string $dano
 * @property string $tipo_inventario
 * @property int $rodales_idrodales
 * @property int $emsefor_idemsefor
 * @property int $intervencion_idintervencion
 * @property bool $modifica
 *
 * @property \App\Model\Entity\Rodale $rodale
 * @property \App\Model\Entity\Emsefor $emsefor
 */
class Inventario extends Entity
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
        'cod_sap' => true,
        'fecha' => true,
        'num_arbol' => true,
        'dap' => true,
        'altura' => true,
        'vol_medio' => true,
        'vol_total' => true,
        'area_basal' => true,
        'forma' => true,
        'dano' => true,
        'tipo_inventario' => true,
        'rodales_idrodales' => true,
        'emsefor_idemsefor' => true,
        'intervencion_idintervencion' => true,
        'modifica' => true,
        'rodale' => true,
        'emsefor' => true
    ];
}
