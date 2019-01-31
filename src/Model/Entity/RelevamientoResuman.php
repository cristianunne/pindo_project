<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RelevamientoResuman Entity
 *
 * @property int $idrodales
 * @property string $cod_sap
 * @property string $campo
 * @property string $uso
 * @property bool $finalizado
 * @property int $empresa_idempresa
 * @property int $idrodales_parc
 * @property int $cant_parc
 * @property int $idrodales_arb
 * @property int $cant_arb
 */
class RelevamientoResuman extends Entity
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
        'idrodales' => true,
        'cod_sap' => true,
        'campo' => true,
        'uso' => true,
        'finalizado' => true,
        'empresa_idempresa' => true,
        'idrodales_parc' => true,
        'cant_parc' => true,
        'idrodales_arb' => true,
        'cant_arb' => true
    ];
}
