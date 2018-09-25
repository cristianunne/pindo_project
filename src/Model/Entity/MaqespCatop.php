<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MaqespCatop Entity
 *
 * @property int $cat_operarios_idcat_operarios
 * @property int $maquina_especifica_idmaquina_especifica
 * @property float $sal_basico_mes
 *
 * @property \App\Model\Entity\CatOperario $cat_operario
 * @property \App\Model\Entity\MaquinaEspecifica $maquina_especifica
 */
class MaqespCatop extends Entity
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
        'sal_basico_mes' => true,
        'cat_operario' => true,
        'maquina_especifica' => true
    ];
}
