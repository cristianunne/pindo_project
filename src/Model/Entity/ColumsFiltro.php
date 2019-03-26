<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ColumsFiltro Entity
 *
 * @property int $id_columns_filtro
 * @property string $name_column
 * @property int $id_table_filtro
 * @property string $descripcion
 */
class ColumsFiltro extends Entity
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
        'name_column' => true,
        'id_table_filtro' => true,
        'descripcion' => true
    ];
}
