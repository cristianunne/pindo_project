

function estimarCostos()
{
    //obtengo el valor de horas mensuales

    var horas_mensuales = $("#h_mes").val();
    var combustible = $("#combustible").val();
    var aceite_motor = $("#aceite_motor").val()
    var aceite_transmision = $("#aceite_transmision").val()
    var fluido_hidraulico = $("#fluido_hidraulico").val()
    var grasas_mes = $("#grasas_mes").val()
    var filtro_mes = $("#filtro_mes").val()
    var mangueras_mes = $("#mangueras_mes").val()
    var tren_rodante_mes = $("#tren_rodante_mes").val()
    var aceite_cadena_mes = $("#aceite_cadena_mes").val()
    var espadas_mes = $("#espadas_mes").val()
    var cadenas_mes = $("#cadenas_mes").val()



    if (horas_mensuales == ""){
        alert("Complete el campo de Horas Mensuales");
    } else {
        //Calculo los valores

        //combustible
        if (combustible == "")
        {
            combustible = 0;
        }
        var res_com = combustible / horas_mensuales;
        //Asigno al input el valor
        $("#cons_comb").val(res_com)

        //-----------------------------------------------------------------
        //Aceite motor
        if (aceite_motor == "")
        {
            aceite_motor = 0;
        }
        var res_aceite_motor = aceite_motor / horas_mensuales;
        //Asigno al input el valor
        $("#con_aceite_motor").val(res_aceite_motor)

        //-----------------------------------------------------------------
        //Aceite Transmision
        if (aceite_transmision == "")
        {
            aceite_transmision = 0;
        }
        var res_aceite_transmision = aceite_transmision / horas_mensuales;
        //Asigno al input el valor
        $("#con_aceite_trans").val(res_aceite_transmision)

        //-----------------------------------------------------------------
        //Fluido Hidraulico
        if (fluido_hidraulico == "")
        {
            fluido_hidraulico = 0;
        }
        var res_fluido_hidraulico = fluido_hidraulico / horas_mensuales;
        //Asigno al input el valor
        $("#con_aceite_hidra").val(res_fluido_hidraulico)

        //-----------------------------------------------------------------
        //Grasas
        if (grasas_mes == "")
        {
            grasas_mes = 0;
        }
        var res_grasas_mes = grasas_mes / horas_mensuales;
        //Asigno al input el valor
        $("#con_grasa").val(res_grasas_mes)

        //-----------------------------------------------------------------
        //Filtros
        if (filtro_mes == "")
        {
            filtro_mes = 0;
        }
        var res_filtro_mes = filtro_mes / horas_mensuales;
        //Asigno al input el valor
        $("#costo_hora_filtros").val(res_filtro_mes)

        //-----------------------------------------------------------------
        //Mangueras
        if (mangueras_mes == "")
        {
            mangueras_mes = 0;
        }
        var res_mangueras_mes = mangueras_mes / horas_mensuales;
        //Asigno al input el valor
        $("#mangueras_horas").val(res_mangueras_mes)

        //-----------------------------------------------------------------
        //Tren Rodante
        if (tren_rodante_mes == "")
        {
            tren_rodante_mes = 0;
        }
        var res_tren_rodante_mes = tren_rodante_mes / horas_mensuales;
        //Asigno al input el valor
        $("#manten_horugas_horas").val(res_tren_rodante_mes)

        //-----------------------------------------------------------------
        //Aceite Cadena
        if (aceite_cadena_mes == "")
        {
            aceite_cadena_mes = 0;
        }
        var res_aceite_cadena_mes = aceite_cadena_mes / horas_mensuales;
        //Asigno al input el valor
        $("#aceite_cadena_hora").val(res_aceite_cadena_mes)

        //-----------------------------------------------------------------
        //Espadas
        if (espadas_mes == "")
        {
            espadas_mes = 0;
        }
        var res_espadas_mes = espadas_mes / horas_mensuales;
        //Asigno al input el valor
        $("#espada_hora").val(res_espadas_mes)

        //-----------------------------------------------------------------
        //Espadas
        if (cadenas_mes == "")
        {
            cadenas_mes = 0;
        }
        var res_cadenas_mes = cadenas_mes / horas_mensuales;
        //Asigno al input el valor
        $("#cadena_hora").val(res_cadenas_mes)


    }
}