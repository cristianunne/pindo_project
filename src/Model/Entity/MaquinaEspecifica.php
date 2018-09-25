<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MaquinaEspecifica Entity
 *
 * @property int $idmaquina_especifica
 * @property string $modelo
 * @property string $nombre
 * @property string $cosecha
 * @property string $tarea
 * @property \Cake\I18n\Time $act_costos
 * @property float $eficiencia
 * @property float $tasa_seguro
 * @property float $valor_maquina
 * @property float $va_imp
 * @property float $va_sis_rod_maq
 * @property float $va_sis_rod_imp
 * @property string $vida_util_maq
 * @property int $vida_util_maq_year
 * @property string $vida_util_imp
 * @property int $vida_util_imp_year
 * @property string $vida_util_srod_maq
 * @property int $vida_util_srod_imp
 * @property float $fac_arreglo_mec
 * @property bool $leasing_credito
 * @property float $cuota_maq_mes
 * @property float $cuota_mes_imp
 * @property float $fac_var_res
 * @property float $cons_comb
 * @property float $con_aceite_motor
 * @property float $con_aceite_trans
 * @property float $con_aceite_hidra
 * @property float $con_grasa
 * @property float $costo_hora_filtros
 * @property float $manten_horugas_horas
 * @property float $mangueras_horas
 * @property float $ant_operario
 * @property float $sal_basico_mes
 * @property float $aceite_cadena_hora
 * @property float $espada_hora
 * @property float $cadena_hora
 * @property float $n_turnos
 * @property float $horas_dia
 */
class MaquinaEspecifica extends Entity
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
        'idmaquina_especifica' => false
    ];
}
