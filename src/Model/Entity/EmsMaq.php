<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EmsMaq Entity
 *
 * @property int $emsefor_idemsefor
 * @property int $maquinas_idmaquinas
 * @property int $maquina_especifica_idmaquina_especifica
 */
class EmsMaq extends Entity
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
        'emsefor_idemsefor' => true,
        'maquinas_idmaquinas' => true,
        'maquina_especifica_idmaquina_especifica' => true
    ];
}
