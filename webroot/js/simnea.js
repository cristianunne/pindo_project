

//variables generales para guardar lso datos
var rodal_select;
var cod_sap;


function avanzarRodales(){

    var res = $('input[name=rodal_select]').is(':checked');
    if (res){

        $("#simnea_seleccion_rodal").fadeToggle(2100, "linear", DisplaySelectionConfigSitio);

        //Guardo la variable Rodal select
        rodal_select = $('input:radio[name=rodal_select]:checked').val();



    } else {
        alert("seleccione un rodal");
    }


}


/***
 * FUNCIONES DE DISPLAY
 */


function DisplaySelectionConfigSitio(){

    //Deberia traer la Ventata que configura el Sitio
    $("#simnea_datos_sitio").fadeToggle(2100, "linear");
}




/***
 * FUNCIONES DE CONSULTA A LA BASE DE DATOS
 */

function getDataForRodales(){
    $.ajax({
        type: 'GET',
        url: '/pindo_project/simnea/getdataforsitio/' + rodal_select,
        async: true,
        beforeSend: function (ve) {
              ve.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        },
        success: function (msg) {
            console.log(msg.toString());
            cod_sap = msg.toString();
            cod_sap.replace('"', '5');
            $("#cod_sap").val(cod_sap);
        },
        error: function (e) {
            console.log(e);
            $("#simnea_datos_sitio").append(e);
        }

    });
}




function calc_vol_cosechar(element){

    var intensidad_v = $(element).val();

    var vol_total = $("#vol_total").val();

    var superficie = $("#Superficie").val();

    var res = vol_total * superficie * intensidad_v;

    //Cambio el valor de volumen a cosechar
    $("#vol_cos").val(res);

}

function calc_vol_total(element){


    var vol_medio = $("#vol_medio").val();

    var num_arboles = $("#num_arboles").val();

    var res = vol_medio * num_arboles;

    //Cambio el valor de volumen a cosechar
    $("#vol_total").val(res);

}



function checkBoxFunction(checkbox){
    checks = 0;
    //alert($(checkbox).attr('name'));
    $("td[id^='columna_']").each( //selecciono las td con id que comience por "columna_"
        function(){
            $(this).find(':checkbox').prop('checked',false);  //por cada una de las columnas busco los checkboxs q tienen dentro

        });

    $(checkbox).prop('checked',true);
    //console.log(checks) // para firebug
    //checks = $(this).find(':checked').length;
    //alert(checks);

}