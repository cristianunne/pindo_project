<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RodalesInvPlant Entity
 *
 * @property int $idrodales
 * @property string $cod_sap
 * @property string $campo
 * @property string $uso
 * @property bool $finalizado
 * @property int $empresa_idempresa
 * @property int $rod_id
 * @property \Cake\I18n\FrozenDate $fecha_inv
 * @property int $nro_plantacion
 * @property int $rodales_idrodales
 * @property \Cake\I18n\FrozenDate $fecha
 * @property float $superficie
 * @property float $densidad
 * @property float $dist_lineas
 * @property float $dist_plantas
 * @property int $num_arbol_plantado
 * @property float $sobrevivencia
 * @property int $emsefor_idemsefor
 * @property int $procedencias_idprocedencias
 * @property int $idprocedencias
 * @property string $nombre
 * @property string $especie
 * @property string $origen
 * @property string $mejora
 * @property string $vivero
 *
 * @property \App\Model\Entity\Rod $rod
 */
class RodalesInvPlant extends Entity
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
        'rod_id' => true,
        'fecha_inv' => true,
        'nro_plantacion' => true,
        'rodales_idrodales' => true,
        'fecha' => true,
        'superficie' => true,
        'densidad' => true,
        'dist_lineas' => true,
        'dist_plantas' => true,
        'num_arbol_plantado' => true,
        'sobrevivencia' => true,
        'emsefor_idemsefor' => true,
        'procedencias_idprocedencias' => true,
        'idprocedencias' => true,
        'nombre' => true,
        'especie' => true,
        'origen' => true,
        'mejora' => true,
        'vivero' => true,
        'rod' => true
    ];
}
