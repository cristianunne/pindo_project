<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Empresa Entity
 *
 * @property int $idempresa
 * @property string $nombre
 * @property string $domicilio
 * @property string $telefono
 * @property string $email
 * @property bool $propietario
 */
class Empresa extends Entity
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
        'idempresa' => false
    ];


    protected function _getFullName()
    {
        return $this->_properties['nombre'];
    }
}
