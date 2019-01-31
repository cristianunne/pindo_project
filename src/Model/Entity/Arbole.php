<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Arbole Entity
 *
 * @property int $idarbol
 * @property string $marca
 * @property float $dap
 * @property float $altura
 * @property float $altura_poda
 * @property float $dmsm
 * @property string $calidad
 * @property bool $cosechado
 * @property int $parcela_idparcela
 * @property string $geom
 * @property \Cake\I18n\FrozenDate $fecha_rel
 */
class Arbole extends Entity
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
        'marca' => true,
        'dap' => true,
        'altura' => true,
        'altura_poda' => true,
        'dmsm' => true,
        'calidad' => true,
        'cosechado' => true,
        'parcela_idparcela' => true,
        'geom' => true,
        'fecha_rel' => true
    ];
}
