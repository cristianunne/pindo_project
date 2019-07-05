var legend = null;
var div_legend = null;
var legend_adds = {layers : []};

//Tengo que crear estilos para que las referencias sean autoajustables
legend = L.control({position: 'bottomleft'});
legend.onAdd = function (mymap) {

    div_legend = L.DomUtil.create('div', 'info legend');

    $(div_legend).attr("id", 'legend_id');

    div_legend.innerHTML = '<h4 style="margin: 0 0 0 0">Referencias</h4>';

    return div_legend;
};

legend.update = function (props) {
    //Encontro la capa en cuestion proceso su legenda
    div_legend.innerHTML = '<i style="background: #ff0000"></i> ';

};


function createLegendLayers() {

    legend.addTo(mymap);
}

function createLegendLayers2() {

    //Tengo que crear estilos para que las referencias sean autoajustables
    legend = L.control({position: 'bottomleft'});

    legend.onAdd = function (mymap) {

        var div = L.DomUtil.create('div', 'info legend'),
            grades = [0, 10, 20, 50, 100, 200, 500, 1000],
            labels = [];

        // loop through our density intervals and generate a label with a colored square for each interval
        for (var i = 0; i < grades.length; i++) {
            div.innerHTML +=
                '<i style="background: #ff0000"></i> '
        }

        return div;
    };

    legend.addTo(mymap);
}

var div_container = L.DomUtil.create('div');
$(div_container).attr("id", 'cont_id');

function createLegendByLayer(layer)
{

    //Recibo el layer y realizo con el lo que quiero
    var name_layer = layer.name;

    $(div_container).empty();

    for(var i = 0; i < array_clasificacion_capas.clases.length; i++){


        if(name_layer.toString() === array_clasificacion_capas.clases[i].nombre.toString()){



            var sub_divs = "";

            var array_ordenado = orderJasonData(array_clasificacion_capas.clases[i].clasificacion[0].clase);


            for(var j = 0; j < array_ordenado.length; j++){

                for(var k = 0; k < array_clasificacion_capas.clases[i].clasificacion[0].clase.length; k++){
                    var elem = array_clasificacion_capas.clases[i].clasificacion[0].clase[k];
                    if(elem.attr === array_ordenado[j]){


                        sub_divs += '<div class="div_leg_item" id_attr="' + elem.attr + '"><i style="background:' + elem.color  + ' "></i> ' + elem.attr + '</div>';
                    }

                }

            }

            //Agrego el Atributo que clasifica
            div_container.innerHTML = '<h5>' +  array_clasificacion_capas.clases[i].attr_class + '</h5>';
            div_container.innerHTML += sub_divs;

            $(div_legend).append(div_container);
        }

    }




}




function orderJasonData(array_json)
{
    //Recibo el conjunto de datos que quiero ordenar, el campo attr sera el de ordenar
    var array_datos = [];

    for(var i = 0; i < array_json.length; i++){


        array_datos.push(parseInt(array_json[i].attr));

    }

    return array_datos.sort(funcionDeComparacion);


}

function funcionDeComparacion (elem1, elem2)
{
    var aa  = elem1 - elem2;
    return aa;
}




