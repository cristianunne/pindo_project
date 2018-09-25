<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Procedencia Entity
 *
 * @property int $idprocedencias
 * @property string $nombre
 * @property string $especie
 * @property string $origen
 * @property string $mejora
 * @property string $vivero
 */
class Procedencia extends Entity
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
        'idprocedencias' => false
    ];

    protected function _getFullName()
    {
        return $this->_properties['idprocedencias'] . ' - ' .
            $this->_properties['nombre']. ': ' . $this->_properties['especie'];
    }
}
