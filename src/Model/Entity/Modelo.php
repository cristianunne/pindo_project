<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Modelo Entity
 *
 * @property int $idmodelos
 * @property string $cosecha
 * @property string $tipo_maquina
 * @property string $modelo
 * @property string $operacion
 * @property string $tarea
 * @property string $modelo_algoritmo
 * @property bool $estado
 */
class Modelo extends Entity
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
        'cosecha' => true,
        'tipo_maquina' => true,
        'modelo' => true,
        'operacion' => true,
        'tarea' => true,
        'modelo_algoritmo' => true,
        'estado' => true
    ];
}
