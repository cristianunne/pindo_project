<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Laboral Entity
 *
 * @property int $idlaboral
 * @property string $convenio
 * @property float $antiguedad
 * @property float $aguinaldo
 * @property float $ant_sup
 * @property float $feriado
 * @property float $vacaciones
 * @property float $presentismo
 * @property float $empleado_jub
 * @property float $empleado_obra_social
 * @property float $empleado_ley_19032
 * @property float $empleado_seguro_vida
 * @property float $empleado_sindicato
 * @property float $empleado_renatea
 * @property float $empleador_jub
 * @property float $empleador_asignacion
 * @property float $empleador_fondo_des
 * @property float $empleador_inssjp
 * @property float $empleador_obra_social
 * @property float $empleador_seguro_vida
 * @property float $empleador_renatea
 * @property float $prev_enfermedad
 * @property float $exam_preocup
 * @property float $seguro_colectivo
 * @property float $prev_despido
 * @property float $art_fijo
 * @property float $art_prop
 */
class Laboral extends Entity
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
        'convenio' => true,
        'antiguedad' => true,
        'aguinaldo' => true,
        'ant_sup' => true,
        'feriado' => true,
        'vacaciones' => true,
        'presentismo' => true,
        'empleado_jub' => true,
        'empleado_obra_social' => true,
        'empleado_ley_19032' => true,
        'empleado_seguro_vida' => true,
        'empleado_sindicato' => true,
        'empleado_renatea' => true,
        'empleador_jub' => true,
        'empleador_asignacion' => true,
        'empleador_fondo_des' => true,
        'empleador_inssjp' => true,
        'empleador_obra_social' => true,
        'empleador_seguro_vida' => true,
        'empleador_renatea' => true,
        'prev_enfermedad' => true,
        'exam_preocup' => true,
        'seguro_colectivo' => true,
        'prev_despido' => true,
        'art_fijo' => true,
        'art_prop' => true
    ];
}
