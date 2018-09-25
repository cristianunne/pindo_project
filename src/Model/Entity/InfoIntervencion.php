<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InfoIntervencion Entity
 *
 * @property int $intervencion_idintervencion
 * @property string $cod_sap
 * @property \Cake\I18n\Time $fecha
 * @property string $arb_ha
 * @property int $arb_podados
 * @property float $arb_alt_deseada
 * @property float $alt_poda
 * @property int $arb_no_podados
 * @property float $dap
 * @property float $altura
 * @property float $dmsm
 * @property float $porc_removido
 */
class InfoIntervencion extends Entity
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
        '*' => true,
        'intervencion_idintervencion' => true
    ];
}
