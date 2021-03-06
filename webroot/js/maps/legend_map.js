var legend = null;
var div_legend = null;
var legend_adds = {layers : []};

var div_container = null;

//Tengo que crear estilos para que las referencias sean autoajustables
legend = L.control({position: 'bottomleft'});
legend.onAdd = function (mymap) {

    div_legend = L.DomUtil.create('div', 'info legend');

    $(div_legend).attr("id", 'legend_id');

    div_legend.innerHTML = '<h4 style="margin: 0 0 0 0">Referencias</h4>';

    div_container = L.DomUtil.create('div', 'set-display-legend');
    $(div_container).attr("id", 'cont_id');
    $(div_legend).append(div_container);

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



function createLegendByLayer(layer)
{

    var div_container_sub = L.DomUtil.create('div', 'set-display-legend');
    var name = 'cont_id_' + layer.name;
    var leaflet_id = "id_" + layer.layer._leaflet_id;
    $(div_container_sub).attr({"id" : leaflet_id, "attr_div_id": name});

    var name_layer = layer.name.toString();


    for(var i = 0; i < array_clasificacion_capas.clases.length; i++){


        if(name_layer === array_clasificacion_capas.clases[i].nombre.toString()){

            var sub_divs = "";
            var array_ordenado = orderJasonData(array_clasificacion_capas.clases[i].clasificacion[0].clase);
            //var array_ordenado = array_clasificacion_capas.clases[i].clasificacion[0].clase;
            for(var j = 0; j < array_ordenado.length; j++){

                for(var k = 0; k < array_clasificacion_capas.clases[i].clasificacion[0].clase.length; k++){
                    var elem = array_clasificacion_capas.clases[i].clasificacion[0].clase[k];
                    if(elem.attr === array_ordenado[j]){

                        if(elem.attr == null){
                            sub_divs += '<div class="div_leg_item" id_attr="' + elem.attr + '">' +
                                '<i onclick="selectLegend(this)" class="item-legend" ' +
                                'attr="' + elem.attr +'" attr2="' + name_layer + '" attr3="' + array_clasificacion_capas.clases[i].attr_class
                                + '" select="false" style="background:'
                                + elem.color  + ' "></i> ' + "Sin dato" + '</div>';
                        } else {
                            sub_divs += '<div class="div_leg_item" id_attr="' + elem.attr + '">' +
                                '<i onclick="selectLegend(this)" class="item-legend" ' +
                                'attr="' + elem.attr +'" attr2="' + name_layer + '" attr3="' + array_clasificacion_capas.clases[i].attr_class
                                + '" select="false" style="background:'
                                + elem.color  + ' "></i> ' + elem.attr + '</div>';
                        }


                    }

                }
            }

            //Agrego el El Nombre del Atributo que clasifica

            div_container_sub.innerHTML = '<h5>' +  name_layer + '</h5>';
            //div_container.innerHTML = '<h5>' +  name_layer + '</h5>';


            //Agrego el Atributo que clasifica
            var texto_2 = '<h5> Campo: ' +  array_clasificacion_capas.clases[i].attr_class + '</h5>';

            //div_container.innerHTML += texto_2;
            //div_container.innerHTML += sub_divs;

            div_container_sub.innerHTML += texto_2;
            div_container_sub.innerHTML += sub_divs;


            $(div_container).append(div_container_sub);


        }

    }
}

function removeLegendByLayer(layer){


    var div_contenedor = $("#cont_id");
    var id_ = "id_" + layer.layer._leaflet_id;
    $("#" + id_).remove();

    /*div_contenedor.each(function () {
        var id = $("#cont_id div").attr('id');

        if(id === id_){
            alert();
            $("#" + id_).remove();
        }
    });*/

}

function removeLegend(){

    $(div_container).remove();
}

function selectLegend(element) {

    var capa_completa = null;
    var newgeojson = L.geoJSON();
    var value = $(element).attr('attr');
    var capa_name = $(element).attr('attr2');
    var campo = $(element).attr('attr3');
    var select = $(element).attr('select');

    var capa_geojson = null;

    //Recorroeel arreglo que guarda las capas
    for(var i = 0; i < array_geojson_class.capas.length; i++){


        if(array_geojson_class.capas[i].nombre === capa_name){
            capa_completa = array_geojson_class.capas[i];
            capa_geojson = array_geojson_class.capas[i].geojson;
        }
    }
   // console.log(capa_completa);
    //capa_completa.clasified

    //Cambio el estilo al cuadadito de la leyenda
    if(select === 'false'){

        resetItemStyle();

        $(element).attr('select', 'true');
        $(element).css( {'border': 'solid 3px #d2d100'});

        flyToLayer(capa_geojson, campo, value, newgeojson, capa_completa.clasified, capa_completa.nombre);

    } else {
        $(element).attr('select', 'false');
        $(element).css( {'border': 'solid 1px #6B6464'});

        //vuelvo a la vista general de geojson
        flyToGeoJson(capa_geojson);
        //reseteo el estilo de las capas
        resetStyleGeoJson(capa_geojson, capa_geojson.getLayers(), capa_completa.clasified, capa_completa.nombre);
    }
}

function flyToLayer(capa_geojson, campo, value, newgeojson, clasified, name_geojson){

    if(capa_geojson != null){
        var layers = capa_geojson.getLayers();
        if(layers.length > 0){

            resetStyleGeoJson(capa_geojson, layers, clasified, name_geojson);

            for(var i = 0; i < layers.length; i++){


                if(layers[i].feature[campo] == null && value === 'null'){

                    layers[i].setStyle({
                        weight: 5,
                        color: '#ffffff',
                        dashArray: '',
                        fillOpacity: 0.9,
                        fillColor: '#ff4846'
                    });

                    newgeojson.addLayer(layers[i]);

                } else if(layers[i].feature[campo] == value){


                    //encontre el layer
                    //console.log("value: " + layers[i].feature[campo] + ", " + value);
                    layers[i].setStyle({
                        weight: 5,
                        color: '#ffffff',
                        dashArray: '',
                        fillOpacity: 0.9,
                        fillColor: '#ff4846'
                    });

                    newgeojson.addLayer(layers[i]);

                }
            }
        }
    }

    if(newgeojson != null){

        //newgeojson.addTo(mymap);

        //console.log(newgeojson.getLayers());
        mymap.fitBounds(newgeojson.getBounds(), {
            'animate' :  true,
            'duration' : 3,
            'easeLinearity' : 0.1,
            'maxZoom' : 14
        });
    }


}
function flyToGeoJson(geojson) {

    mymap.fitBounds(geojson.getBounds(), {
        'animate' :  true,
        'duration' : 10,
        'easeLinearity' : 0.1

    });
}

function resetStyleGeoJson(capa_geojson, layers, clasified, name_geojson){
    //realizo el reset de stilo
    if(clasified != null){

        if(!clasified){
            for(var j = 0; j < layers.length; j++){
                capa_geojson.resetStyle(layers[j]);
            }
        } else {
            //Tengo que volver a colorear todos

            //console.log(array_clases_other);
            for(var i = 0; i < layers.length; i++){
            //recorro los estilos pa encontrar el que le corresponde a este
                for(var j = 0; j < array_clases_other.clases.length; j++){

                    if(array_clases_other.clases[j].capa === name_geojson){


                        for(var k = 0; k < array_clases_other.clases[j].style.length; k++){

                            var camp_class = array_clases_other.clases[j].style[k].campo_class;

                            if(array_clases_other.clases[j].style[k].attr == null && layers[i].feature[camp_class] == null){
                                layers[i].setStyle({fillColor : array_clases_other.clases[j].style[k].color,
                                    color : array_clases_other.clases[j].style[k].color,
                                    dashArray: '3',
                                    fillOpacity: 0.5});

                            } else if(array_clases_other.clases[j].style[k].attr === layers[i].feature[camp_class]){
                                layers[i].setStyle({fillColor : array_clases_other.clases[j].style[k].color,
                                    color : array_clases_other.clases[j].style[k].color,
                                    dashArray: '3',
                                    fillOpacity: 0.5});
                            }


                            //var camp_class = array_clases_other.clases[j].style[k].campo_class;

                            //console.log(array_clases_other.clases[j].style[k].attr + ", " + layers[i].feature[camp_class]);
                            /*if(array_clases_other.clases[j].style[k].attr === layers[i].feature[camp_class]){
                                console.log(array_clases_other.clases[j].style[k].attr);
                            }*/
                        }

                    }

                }
            }

        }

    }


}

function resetItemStyle(){
    var div_cont_id = $("#cont_id");
    div_cont_id.each(function () {
        $("div i").css({'border': 'solid 1px #6B6464'});
    });
}


function orderJasonData(array_json)
{
    //Recibo el conjunto de datos que quiero ordenar, el campo attr sera el de ordenar
    var array_datos = [];

    for(var i = 0; i < array_json.length; i++){


        array_datos.push(array_json[i].attr);

    }

    return array_datos.sort(funcionDeComparacion);


}

function funcionDeComparacion (elem1, elem2)
{
    var aa  = elem1 - elem2;
    return aa;
}




