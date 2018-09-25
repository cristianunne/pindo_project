<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rodale Entity
 *
 * @property int $idrodales
 * @property string $cod_sap
 * @property string $campo
 * @property string $uso
 * @property bool $finalizado
 * @property int $empresa_idempresa
 */
class Rodale extends Entity
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
        'idrodales' => false
    ];
}
