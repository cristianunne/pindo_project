
function select_category() {

    //Selecciono el div y le agrego un texto
    //$("#variables_category").append();
    var option_select = $("#FormSelectCategory option:selected").text();

    //Limpio la tabla filtros
    $("#select_uniques").empty();


    getColumnTableSelct(option_select);


}


function getColumnTableSelct(name_Tabla)
{

    var div_column_content = $("#variables_category");

    $.ajax({

        url: 'administracion/getColumnsTableSelect',
        data: {'tabla': name_Tabla.toString()},
        beforeSend: function (xhr) {
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
        },
        success: function (data) {

            if(data != null){


                costructSelect(data, div_column_content);


            } else {
                console.log('vacio pues');
            }
        }, error:function () {
            console.log("ERRRORRRORORORO");
        }

    });
}



function costructSelect(data, div_column_content)
{
    div_column_content.empty();
    var form_group = '<div class="form-group">';
    var final_group = '</div>';
    var initSelect = '<select id="select_column" class="form-control" size="13">';
    var finalSelect = '</select>';
    var initInput = "<input>";
    var finalInput = '</option>';

    var body_content = "";

    for (var i = 0; i < data.length; i++){

        if(data[i]['descripcion'] == null || data[i]['descripcion'] === ''){

            body_content = body_content + '<option value="' + data[i]['name_column'] + '" ondblclick="buttonColumnPut(this)">' + data[i]['name_column'] + finalInput;

        } else {
            body_content = body_content + '<option value="' + data[i]['name_column'] + '" ondblclick="buttonColumnPut(this)">' + data[i]['descripcion'] + finalInput;
        }

    }

    var input_form = form_group + '<label>Columnas:</label>' + initSelect + body_content + finalSelect + final_group;


    div_column_content.append(input_form);



}


function constructTable(data, div_column_content) {

    div_column_content.empty();


    var initable = '<table id="example2" class="table table-bordered table-hover dataTable">';
    var finalTable = '</table>';
    var inithead = '<thead>';
    var finalthead = '<thead>';
    var initbody = '<tbody>';
    var finaltbody = '</tbody>';
    var initr = '<tr>';
    var finaltr = '<tr>';


    var body_content = "";

    var tr_content = "";


    for (var i = 0; i < data.length; i++){

        var tr = "";
        if(data[i]['descripcion'] == null || data[i]['descripcion'] === ""){
            tr = initr +
                '<td  valign="middle" attr="' + data[i]['name_column'] +'">' + data[i]['name_column'] + '</td>' +

                '<td align="center" valign="middle"> <button attr="' + data[i]['name_column'] + '" class="btn btn-success" onclick="buttonColumnPut(this)"><i class="fa fa-plus"></i></button> </td>'

                + finaltr;
        } else {
            tr = initr +
                '<td valign="middle" attr="' + data[i]['name_column'] + '">' + data[i]['descripcion'] + '</td>' +
                '<td align="center" valign="middle"> <button attr="' + data[i]['name_column'] + '" class="btn btn-success" onclick="buttonColumnPut(this)"><i class="fa fa-plus"></i></button> </td>' +
                 finaltr;
        }

        tr_content = tr_content + tr;


    }

    var thead_complete = inithead + initr + '<th scope="col">Columna</th>' + '<th scope="col"></th>' + finaltr + finalthead;

    body_content = initbody + tr_content + finaltbody;

    var final_tabla = initable + thead_complete + body_content + finalTable;
    div_column_content.append(final_tabla);


}

function buttonColumnPut(option){

    var table_select = $("#FormSelectCategory option:selected").text();
    var col = '';
    var content = $("#text_area_query").val();;
    //Evaluo si las tablas que participan son Plantaciones, Intervenciones o Inventario
    //y que la columna es EMSEFOR
    if (table_select === 'Plantaciones'){

        var column_select = $(option).val().toString();
        if(column_select === 'emsefor'){
            col = 'plan_ems' + '.' + $(option).val();
            $("#text_area_query").val(content + col.toLocaleLowerCase());

        } else {
            col = table_select + '.' + $(option).val();
            $("#text_area_query").val(content + col.toLocaleLowerCase());

        }


    } else if(table_select === 'Intervenciones'){


        var column_select = $(option).val().toString();
        if(column_select === 'emsefor'){
            col = 'inter_ems' + '.' + $(option).val();
            $("#text_area_query").val(content + col.toLocaleLowerCase());

        } else {
            col = table_select + '.' + $(option).val();
            $("#text_area_query").val(content + col.toLocaleLowerCase());

        }


    } else if(table_select === 'Inventario'){


        var column_select = $(option).val().toString();
        if(column_select === 'emsefor'){
            col = 'inv_ems' + '.' + $(option).val();
            $("#text_area_query").val(content + col.toLocaleLowerCase());

        } else {
            col = table_select + '.' + $(option).val();
            $("#text_area_query").val(content + col.toLocaleLowerCase());

        }


    } else {
        //var col = table_select + '.' + $(option).val();
        col = table_select + '.' + $(option).val();
        $("#text_area_query").val(content + col.toLocaleLowerCase());

    }

}

var FUNCIONES = ['LAST'];


function buttonOperatorPut(button) {
    var oper = $(button).attr('attr').toString();
    var table_select = $("#FormSelectCategory option:selected").text();

    //Consulto si es una funcion esepcial
    var bolean_funcion = false;

    //LA FUNCION LAST SOLO SE APLICA A INTERVENCIONES E INVENTARIO
    //Para ello verifico la tabla seleccionada y devuelvo un mensaje

    if(oper === 'LAST' && table_select !== 'Inventario'){
        alert("El Operador solo puede emplearse con la Tabla Inventario");
    } else {

        for (var i = 0; i < FUNCIONES.length; i++){

            if(FUNCIONES[i] === oper){

                var content = $("#text_area_query").val();

                var operador = oper + '(' + table_select + ')';

                if(content !== ''){
                    $("#text_area_query").val(content + " " + operador + " ");
                } else {
                    $("#text_area_query").val(operador + " ");
                }


                bolean_funcion = true;
            }
        }

        if(bolean_funcion === false){
            var content = $("#text_area_query").val();
            $("#text_area_query").val(content + " " + oper + " ");

        }
    }



}

/*
    Realiza una busqueda de valores unicos segun tabal y columna
 */
function listarUniques()
{
    var div_column_content = $("#variables_category");

    var name_Tabla = $("#FormSelectCategory option:selected").text()
    var column = $("#select_column option:selected").text();

    //Recupero el nombre de la tabla

    $.ajax({

        url: 'administracion/getListValuesUniques',
        data: {'tabla': name_Tabla.toString(), 'column' : column.toString()},
        beforeSend: function (xhr) {
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
        },
        success: function (data) {

            if(data != null){

                console.log(data);
                addOptionToListUnique(data, column);


            } else {
                console.log('vacio pues');
            }
        }, error:function () {
            console.log("ERRRORRRORORORO");
        }

    });


}

function addOptionToListUnique(data, column){

    var select_form = $("#select_uniques");
    select_form.empty();

    for (var i = 0; i < data.length; i++){

        //VERIFICAR QUE ALS ER EMSEFOR NO ES NECESARIO PONER EL ATRIBUTO DE TABLA PORQUE SINO SE AGREGA Y NO SE UTILIZA POSTERIOR
        if(column === 'emsefor'){
            var option = '<option value="' + data[i]['nombre'] + '" ondblclick="addUniqueToQuery(this)">' + data[i]['nombre'] + '</option>';
            select_form.append(option);
        } else {
            var option = '<option value="' + data[i][column.toString()] + '" ondblclick="addUniqueToQuery(this)">' + data[i][column.toString()] + '</option>';
            select_form.append(option);
        }



    }

}

function addUniqueToQuery(option){

    var col = "'" +   $(option).val() + "'";
    var content = $("#text_area_query").val();
    $("#text_area_query").val(content + col);

}

function applyFiltro()
{
    //Busco si se ha agregado emsefor y agrego un attr adicional para indicar
    //Verifico que no se este empleando una funcion

    var val_text_area = $("#text_area_query").val();

    var option_select = $("#FormSelectCategory option:selected").text();
    var div = '';

    //Si es -1 significa que no encontro la cadena como query
    //Pregunto que tabla es la que participa y agreog la query como un attr3 y cambios los atributos alli
    if(val_text_area.toString().indexOf('emsefor') === -1){
        //No se utilia emsefor, verifico que no se use una funcion
        var boolean_function = false;
        var funcion_find = false;
        for (var i = 0; i < FUNCIONES.length; i++){

            //Evaluo si algunas de las funciones esta presente
            if(val_text_area.toString().indexOf(FUNCIONES[i]) !== -1){
                boolean_function = true;
                funcion_find = FUNCIONES[i].toString();
                break;
            }
        }

        if(boolean_function === true){

            div =  '<div attr="' + option_select + '" attr2="false" function="true" name_function="' + funcion_find + '" ' +
                'query="' + val_text_area + '" class="div_etiqueta_query" ondblclick="eliminarFiltro(this)"><p>' + val_text_area + '</p> </div>';

        } else {
            div =  '<div attr="' + option_select + '" attr2="false" function="false" name_function="false" query="' + val_text_area + '" ' +
                'class="div_etiqueta_query" ondblclick="eliminarFiltro(this)"><p>' + val_text_area + '</p> </div>';

        }

    } else {

        //Realizo una modoficacion del query, cambiando emsefor por nombre

        var newquery = val_text_area.toString().replace('emsefor', 'nombre');
        div =  '<div attr="' + option_select + '" attr2="true" function="false" name_function="false" ' +
            'query="' + newquery + '" class="div_etiqueta_query" ondblclick="eliminarFiltro(this)"><p>' + val_text_area + '</p> </div>';
    }





    if ($.trim($("#text_area_query").val())) {
        // textarea is empty or contains only white-space
        $("#panel_filtros").append(div);
        $("#text_area_query").val('');
    }


    $("#example2").remove();


}

function eliminarFiltro(div) {
    $(div).remove();
}

/*
este metodo se encarga de realizar las consultas finales
 */
function applyFiltroGeneral()
{

    var divParent = $("#panel_filtros > div");

    var divs = divParent.find('div');

    var array = [];


    for (var i = 0; i < divParent.length; i++){
            //Obtengo los query
        var p = $(divParent[i]).find('p');
        //Obtengo la tabla del filtro
        var tabla_filtro = $(divParent[i]).attr('attr').toString();
        var emsefor = $(divParent[i]).attr('attr2').toString();
        var query = $(divParent[i]).attr('query').toString();
        var function_ = $(divParent[i]).attr('function').toString();
        var name_function = $(divParent[i]).attr('name_function').toString();

        //CONSULTO SI LA TABLA EMSEFOR PARTICIPA DE LA QUERY
        var array_ = {'tabla' : tabla_filtro, 'query' : query, 'emsefor' : emsefor, 'function' : function_, 'name_function' : name_function};

        array.push(array_);
    }

    //Aplico el filtro solo si hay filtros que aplicar
    if(jQuery.isEmptyObject(array)){
        alert("Aplique un Filtro");

    } else {
        var jsonString = JSON.stringify(array);
        $.ajax({
            type: "POST",
            url: "administracion/applyFiltro",
            data: {data : jsonString},
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
            },

            success: function(data){

                if(data != null){
                    console.log(data);
                    createTableResult(data);

                }


            },
            error: function (data) {
                alert("error");
            }
        });
    }


}

function createTableResult(data) {

    //Elimino la tabla wrapper
    $('#table_result_wrapper').remove();

    var box_body = $("#box_body");
    box_body.append(' <table id="table_result" class="table table-bordered table-hover dataTable">  </table>');


    var initr = '<tr>';
    var finaltr = '<tr>';
    var initd = '<td>';
    var finaltd = '</td>';


    var body_content = "";

    var tr_content = "";



    var array_data = [];

    for(var i = 0; i < data.length; i++){
        var empresa = '<a href="/pindo_project/empresa/view?Accion=Ver+Empresa&amp;Categoria=Empresa&amp;id='+ data[i].empresa['idempresa'].toString()
            + '" target="_blank">' + data[i].empresa['nombre'].toString() + '</a>';

        var rodales = ' <a href="/pindo_project/rodales/view?Accion=Ver+Rodales&amp;Categoria=Rodales&amp;id=' + data[i]['idrodales'].toString() + '" target="_blank" '
            + 'class="btn btn-success"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a> ';

        var array_current = [
            data[i]['idrodales'].toString(),
            data[i]['cod_sap'].toString(),
            data[i]['campo'].toString(),
            data[i]['uso'].toString(),
            ((data[i]['finalizado'] === false)? 'NO' : 'SI'),
            empresa,
            rodales
        ];

        array_data.push(array_current);
    }


    $(document).ready(function() {

        $('#table_result').DataTable({
            data: array_data,
            columns: [
                {title: "Rodal N°"},
                {title: "Código SAP"},
                {title: "Campo"},
                {title: "Uso"},
                {title: "Finalizado"},
                {title: "Empresa"},
                {title: "Acciones"}
            ],
            'columnDefs': [
                {
                    "targets": 6, // your case first column
                    "className": "text-center",
                    "width": "4%"
                }],
            'language' : {
                'search': "Buscar:",
                'paginate': {
                    'first':      "Primer",
                    'previous':   "Anterior",
                    'next':       "Siguiente",
                    'last':       "Anterior"
                }},
            "pageLength": 50,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true
        });
    });


    /*for(var i = 0; i < data.length; i++){

        var empresa = '<a href="/pindo_project/empresa/view?Accion=Ver+Empresa&amp;Categoria=Empresa&amp;id='+ data[i]['empresa']['idempresa'].toString()
            + '" target="_blank">' + data[i]['empresa']['nombre'].toString() + '</a>';

        var content = initr +  initd + data[i]['idrodales'].toString() + finaltd +
            initd + data[i]['cod_sap'].toString() + finaltd + initd + data[i]['campo'].toString() + finaltd +
            initd + data[i]['uso'].toString() + finaltd +
            initd + ((data[i]['finalizado'] === false)? 'NO' : 'SI') + finaltd +
            initd + empresa + finaltd +
            '<td align="center" valign="middle">' +
            ' <a href="/pindo_project/rodales/view?Accion=Ver+Rodales&amp;Categoria=Rodales&amp;id=' + data[i]['idrodales'].toString() + '" target="_blank" '
            + 'class="btn btn-success"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a> '
            + finaltd;


        body_cont.append(content);
    }*/




}