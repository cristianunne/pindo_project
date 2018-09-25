<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Insumo Entity
 *
 * @property int $idinsumos
 * @property float $pres_comb_siva
 * @property float $pres_aceite_motor
 * @property float $pres_aceite_trans
 * @property float $pres_aceite_hidra
 * @property float $precio_aceite_cadena
 * @property float $precio_espada
 * @property float $precio_cadena
 * @property float $pres_grasa
 * @property float $uniforme
 * @property float $botin_seguridad
 * @property float $guante
 * @property float $protector_auditivo
 * @property float $casco_chaleco
 * @property float $pantalon_seguridad
 * @property float $alojamiento_dia_persona
 * @property float $vianda_dia
 * @property float $movil_traslado_costo
 */
class Insumo extends Entity
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
        'pres_comb_siva' => true,
        'pres_aceite_motor' => true,
        'pres_aceite_trans' => true,
        'pres_aceite_hidra' => true,
        'precio_aceite_cadena' => true,
        'precio_espada' => true,
        'precio_cadena' => true,
        'pres_grasa' => true,
        'uniforme' => true,
        'botin_seguridad' => true,
        'guante' => true,
        'protector_auditivo' => true,
        'casco_chaleco' => true,
        'pantalon_seguridad' => true,
        'alojamiento_dia_persona' => true,
        'vianda_dia' => true,
        'movil_traslado_costo' => true
    ];
}
