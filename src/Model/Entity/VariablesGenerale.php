<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VariablesGenerale Entity
 *
 * @property int $idvariablesgenerales
 * @property \Cake\I18n\FrozenDate $fecha_act_costos
 * @property float $tasa_int_cap_propio
 * @property float $pres_comb_siva
 * @property float $pres_aceite_motor
 * @property float $pres_aceite_trans
 * @property float $pres_aceite_hidra
 * @property float $pres_grasa
 * @property float $costo_administrativo
 * @property float $seguridad_social_24241
 * @property float $art
 * @property float $seguridad_social_23660
 * @property float $carga_social_12
 * @property float $vacaciones_enfermedad
 * @property float $inssjp_19032
 * @property float $asignacion_familiar_24714
 * @property float $sac
 * @property float $seguro_vida
 * @property float $uniforme
 * @property float $botin_seguridad
 * @property float $guante
 * @property float $protector_auditivo
 * @property float $casco_chaleco
 * @property float $alojamiento_dia_persona
 * @property float $vianda_dia
 * @property float $ausentismo
 * @property float $precio_aceite_cadena
 * @property int $emsefor_idemsefor
 * @property float $duracion_turnos_hs
 * @property int $turnos_dia
 * @property int $dias_por_semana
 * @property int $dias_por_mes
 * @property float $margen_ganancia
 * @property float $factor_ajuste
 */
class VariablesGenerale extends Entity
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
        'fecha_act_costos' => true,
        'tasa_int_cap_propio' => true,
        'pres_comb_siva' => true,
        'pres_aceite_motor' => true,
        'pres_aceite_trans' => true,
        'pres_aceite_hidra' => true,
        'pres_grasa' => true,
        'costo_administrativo' => true,
        'seguridad_social_24241' => true,
        'art' => true,
        'seguridad_social_23660' => true,
        'carga_social_12' => true,
        'vacaciones_enfermedad' => true,
        'inssjp_19032' => true,
        'asignacion_familiar_24714' => true,
        'sac' => true,
        'seguro_vida' => true,
        'uniforme' => true,
        'botin_seguridad' => true,
        'guante' => true,
        'protector_auditivo' => true,
        'casco_chaleco' => true,
        'alojamiento_dia_persona' => true,
        'vianda_dia' => true,
        'ausentismo' => true,
        'precio_aceite_cadena' => true,
        'emsefor_idemsefor' => true,
        'duracion_turnos_hs' => true,
        'turnos_dia' => true,
        'dias_por_semana' => true,
        'dias_por_mes' => true,
        'margen_ganancia' => true,
        'factor_ajuste' => true
    ];
}
