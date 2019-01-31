<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ParcelasRel Entity
 *
 * @property int $id_parcelas_rel
 * @property int $rodales_idrodales
 * @property string $geom
 * @property string $comentarios
 * @property string $tipo
 * @property \Cake\I18n\FrozenDate $fecha
 */
class ParcelasRel extends Entity
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
        'geom' => true,
        'comentarios' => true,
        'tipo' => true,
        'fecha' => true
    ];
}
