//Variables usada para cargar los datos

var mapconfig = null;
var capasbase = null;
var layersoverlay = null;
var countcapasbase = null;
var labelsrodales = null;
var layersconfig = null;
var layersAdCount = null;
var layersAdicionalesConfig = null;
var layersAdicionales = null;

//Es la variable que genera el controlador de las capas bases
var layerControl = new L.control.layers();

var capasBaseList = [];
var capasoverlaycurrent = [];
var mymap = null;
var layercontrol;
var overrodales = null;
var rodal_ = null;
var labelsrodal_ = null;
var info = L.control();
var geojsonrodalunico;
var geojsonrodalclasificado;
var geojsonrodalotros;
var geojsonlabelrodal = null;
var geojsonrodalesad = [];
var array_geojson_class = {capas : []};
var name_capa_current = null;

$(function()
{
    $.ajax({
        url: 'http://localhost/pindo_project/Configmap/getConfigMap',
        beforeSend: function(xhr)
        {
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        },
        success:function(data){

            //Consulto que la respuesta no sea null
            if (data != null){
                //Remplazo los corchetes por los parentesis
                data.dataconfig['center'] = transformToArray(data.dataconfig['center'])

                console.log(data);

                mapconfig = data.dataconfig;
                capasbase = data.capasbase;
                layersoverlay = data.overlays;
                labelsrodales = data.capalabels;
                countcapasbase = data.countcapasbase;
                capabasedefault = data.capabasedefault;
                layersconfig = data.layersconfig;
                layersAdCount = data.layerAdCount;
                layersAdicionalesConfig = data.layersAdicionalesConfig;
                layersAdicionales = data.layersAdicionales;

                //Inicializo el Mapa
                initMapIndex();





            }
        }, error:function () {
            //Muestro algun mensaje de error
            console.log("Errorrrrr");
        }
    });


});

function initMapIndex()
{

    if (mapconfig != null){

        if (settingMapParmas()){
            //changeParametersBaseMaps();
            //changeParametersLayerOverlay();
            loadCapasBase();
            loadCapasOverlays();
            showLabelsFromLayersRodales();

            //Metodos que se encargan de crear las Referencias

            mymap.on('overlayadd', function (layer) {
                createLegendByLayer(layer);

            });

            //Agrego el evento del mapa para el cambio de Legend
            mymap.on('overlayremove', function (layer) {

                removeLegendByLayer(layer);

            });


            //Inicializo el Legend
            createLegendLayers();




            //scaleControl();

            //mapMinReferenceManager();


            /*mymap.on('resize', function () {
                var oldSize = this.getSize(),
                    newSize = new L.Point(this._container.clientWidth, this._container.clientHeight);

                if (!newSize.equals(oldSize)) {
                    this.fire('resize', newSize);
                    L.Map.prototype._onResize.call(this)
                }
            });*/

            //removeEscalasSinCapas();

        }

    }

}

//Funcion que setea los parametros iniciales del Mapa
function settingMapParmas()
{
    //Creo las vaibales de la Configuracion inicial del mapa
    var crs = null;
    var center = null;
    var zoom = null;
    var minzoom = null;
    var maxzoom = null;
    var renderer = null;

    //Asigno los valores a las variables
    crs = mapconfig['crs'];
    center = JSON.parse(mapconfig['center']);
    zoom = mapconfig['zoom'];
    minzoom = mapconfig['minzoom'];
    maxzoom = mapconfig['maxzoom'];
    renderer = mapconfig['renderer'];

    if (center == null || minzoom == null){
        //Retorno un cartel informando que se debe configurar o establezco uno por defecto
    } else {
        //Todo ok, asi qeu avanzo

        mymap = L.map('mapid', {minZoom: minzoom})
            .setView(center, zoom);


        var div_map = $("#mapid");
        div_map.attr('width', div_map.width());


        return true;
        //Cargo las capas base como prueba
    }

}

function loadCapasBase()
{
    if (countcapasbase != null){

        //obtengo el id del div
            //Creo las vaibales de la Configuracion inicial del mapa
            var crs = null;
            var center = null;
            var zoom = null;
            var minzoom = null;
            var maxzoom = null;
            var renderer = null;

            //Asigno los valores a las variables
            crs = mapconfig['crs'];
            center = JSON.parse(mapconfig['center']);
            zoom = mapconfig['zoom'];
            minzoom = mapconfig['minzoom'];
            maxzoom = mapconfig['maxzoom'];
            renderer = mapconfig['renderer'];


            if (center == null || minzoom == null){
                //Retorno un cartel informando que se debe configurar o establezco uno por defecto

            } else {
                //Todo ok, asi qeu avanzo

                var baselayers = {};
                //recorro las capas bases y cargo segun el id
                for (var j = 0; j < countcapasbase; j++){

                    var capa = capasbase[j];
                    var capatomap = L.tileLayer(capasbase[j]['urlservice'], {
                        capa,
                        'className' : capa['nombre']

                    });
                    //mymap.addLayer(capatomap, capa['nombre']);
                    var nombre = capa['nombre']
                    baselayers[nombre] = capatomap;

                    try{

                        if(capasbase[j]['idcapasbase'] === capabasedefault[0].capabase_id){
                            mymap.addLayer(capatomap, capa['nombre']);
                        }
                    } catch(error){

                    }

                }
                layercontrol = L.control.layers(baselayers, null).addTo(mymap);


            }
    }


}


//uso este metodo para setear las configuraciones de los overlays antes de cargarlo.
//Voy a cargar 3 rodales, 1 con colores Unicos, el segundo con colores clasificados y el 3ro con alguna varibale

function loadCapasOverlays()
{
    createVarCapaOverlay();

}



/*function loadCapasOverlays() {

    var seccion = null;
    var clasificacion = null;
    var paleta = null;
    //Recupero la información de arreglo obtenido
    //Si no encuentro configuración alguna para el index u otro elijo una estandar
    var index_conf = false;
    if(layersconfig.length > 0){
        //Verifico que exista una configuracion para el index
        for (i = 0; i < layersconfig.length; i++){

            if(layersconfig[i].seccion === 'index'){
                index_conf = true;
                seccion = layersconfig[i].seccion;
                clasificacion = layersconfig[i].clasificacion;
                paleta = layersconfig[i].paleta;

            }


        }

        if(index_conf === true){

            createVarCapaOverlay(seccion, clasificacion, paleta);

        }


    }

    //createVarCapaOverlay();
}*/

//Este metodo me crea 3 geojson 1 para los rodales unicos, otro para los rodales clasificados y el ultimo para los rodales por atributo
function createVarCapaOverlay()
{
    if(layersoverlay[0] != null){
        var variable = "var rodales = " + layersoverlay[0].row_to_json;
        overrodales = eval(variable);
        //Agrega la capa rodales al Mapa
        geojsonrodalunico = L.geoJson(rodales, {
            style: styleUnico,
            onEachFeature: onEachFeature
        }).addTo(mymap);

        flyToGeoJsonInicial(geojsonrodalunico);

        //Agrega la capa rodales al la tabla de Contenidos
        layercontrol.addOverlay(geojsonrodalunico, "Rodales");

        //Guardo el Geojson en un arreglo para traerlo despues dados que son muchas las capas
        var elemento = {nombre : "Rodales", geojson: geojsonrodalunico, clasified : false};
        array_geojson_class.capas.push(elemento);


        //Agrego la Leyenda individual dado que no esta en un layer.. Se carga por default asiq ue agrego tmb
        //Primero agrego el estilo a la lista
       var style_add = {nombre: "Rodales", clasificacion : [] };
        var clases = {clase: 'unico', style: styleUnico()};
        style_add.clasificacion.push(clases);
        array_clasificacion_capas.clases.push(style_add);


        //Creo el geojson para el rodal clasificado
        var variable_2 = "var rodales_clasi = " + layersoverlay[0].row_to_json;
        overrodales_clasi = eval(variable_2);
        //Agrega la capa rodales al Mapa
        geojsonrodalclasificado = L.geoJson(rodales_clasi, {
            style: styleClasificado,
            onEachFeature: onEachFeatureClasificado
        });
        //Agrega la capa rodales al la tabla de Contenidos
        layercontrol.addOverlay(geojsonrodalclasificado, "Rodales Clasificado");

        //Guardo el Geojson en un arreglo para traerlo despues dados que son muchas las capas
        var elemento_2 = {nombre : "Rodales Clasificado", geojson: geojsonrodalclasificado, clasified : false};
        array_geojson_class.capas.push(elemento_2);


        info.addTo(mymap);

        style_add = null;
        clases = null;

        style_add = {nombre: "Rodales Clasificado", clasificacion : [] , attr_class : "id"};
        clases = {clase: array_clas.clasi, style: null};
        style_add.clasificacion.push(clases);
        array_clasificacion_capas.clases.push(style_add);


        info.addTo(mymap);

        processLayersAd();

    }

}

function flyToGeoJsonInicial(geojson){

    mymap.fitBounds(geojson.getBounds(), {
        'animate' :  true,
        'duration' : 10,
        'easeLinearity' : 0.1

    });
}

var  array_clas_other;
var array_clases_other = {clases : []};



function processLayersAd()
{
    //Voy a recorrer el arreglo y luego hacer las peticiones segun la variable
    if(layersAdCount > 0){

        for(var i = 0; i < layersAdCount; i++){
            //Recorro las capas y consulto cada uno de sus atributos
            paleta_class = layersAdicionalesConfig[i].paleta;

            if(layersAdicionalesConfig[i].campo_clasified === 'sagpya'){
                campo_class = 'idsagpya';

            } else {
                campo_class = layersAdicionalesConfig[i].campo_clasified;
            }

            array_clas_other = null;
            array_clas_other = {clasi: []};

            //Se usa para agrear la attribution a la capa
            name_capa_current = layersAdicionalesConfig[i].nombre;

            var variable = "var rodales = " + layersAdicionales[0].row_to_json;
            overrodales = eval(variable);
            //Agrega la capa rodales al Mapa
            geojsonrodalotros = L.geoJson(rodales, {
                style: getStyle,
                onEachFeature: onEachFeatureOtros,
                attribution : layersAdicionalesConfig[i].nombre
            });

            //guardo los estilos de la capas
            var elem = {capa : name_capa_current, style : array_clas_other.clasi}
            array_clases_other.clases.push(elem);

            //Agrega la capa rodales al la tabla de Contenidos
            layercontrol.addOverlay(geojsonrodalotros, layersAdicionalesConfig[i].nombre);
            //Guardo el Geojson en un arreglo para traerlo despues dados que son muchas las capas
            var elemento = {nombre : layersAdicionalesConfig[i].nombre, geojson: geojsonrodalotros, clasified : true};
            array_geojson_class.capas.push(elemento);

            style_add = null;
            clases = null;

            style_add = {nombre: name_capa_current, clasificacion : [] , attr_class : campo_class};
            clases = {clase: array_clas_other.clasi, style: null};
            style_add.clasificacion.push(clases);
            array_clasificacion_capas.clases.push(style_add);

        }
        console.log(array_geojson_class);

    }
}


/*function createVarCapaOverlay(seccion, clasificacion, paleta)
{

    if(layersoverlay[0] != null){
        var variable = "var rodales = " + layersoverlay[0].row_to_json;

        overrodales = eval(variable);
        rodal_ = rodales;
        //Agrega la capa rodales al Mapa
        geojsonrodalunico = L.geoJson(rodales, {
            style: styleUnico,
            onEachFeature: onEachFeature
        }).addTo(mymap);


        //Agrega la capa rodales al la tabla de Contenidos
        layercontrol.addOverlay(geojsonrodalunico, "Rodales");

        info.addTo(mymap);
    }


    
}*/

function showLabelsFromLayersRodales()
{
    if(labelsrodales[0] != null){

        var varlabels = "var labelsrodales = " + labelsrodales[0].row_to_json;
        var reslabels = eval(varlabels);

        labelsrodal_ = labelsrodales;

        //Agrego la capa labelrodal al Mapa
        geojsonlabelrodal = L.geoJson(null, {

            pointToLayer: function(feature,latlng){
                label = String('<b>Parcela : </b>' + feature.properties.parcela) // .bindTooltip can't use straight 'feature.properties.attribute'
                return new L.CircleMarker(latlng, {
                    radius: 1,
                }).bindTooltip(label, {permanent: true, direction: 'center', opacity: 0.9, className: 'tool-tip-rodal'}).openTooltip();
            }
        });

        geojsonlabelrodal.addData(labelsrodal_);
        //Agrega la capa rodales al la tabla de Contenidos
        layercontrol.addOverlay(geojsonlabelrodal, "Etiquetas Parcelas");

    }


}


//L.geoJson(rodales).addTo(mymap);

info.onAdd = function (map) {
    this._div = L.DomUtil.create('div', 'info'); // create a div with a class "info"
    this.update();
    return this._div;
};
// method that we will use to update the control based on feature properties passed
info.update = function (props) {

    if (props == null)
    {
        this._div.innerHTML = '<h4>Identificación del Rodal</h4>' +  ('<b>'  + '</b>');
    } else {
        this._div.innerHTML = '<h4>Identificación del Rodal</h4>' +  ('<b>Id Rodal: </b>' + props.id + '<br>' + '<b>Código SAP: </b>' + props.cod_sap) +
            '<br>' + '<br>' + '<h4>Datos de la Parcela</h4>' +  ('<b>Parcela N°: </b>' + props.id + '<br>' + '<b>Superficie (m2): </b>' + props.superficie);

    }

};



function onEachFeature(feature, layer) {
    layer.on({
        mouseover: highlightFeature,
        mouseout: resetHighlight,
        click: zoomToFeature,
        contextmenu: viewInfoRodal
    });



}

function onEachFeatureClasificado(feature, layer) {
    layer.on({
        mouseover: highlightFeature,
        mouseout: resetHighlightClasificado,
        click: zoomToFeature,
        contextmenu: viewInfoRodal,
    });


}

function onEachFeatureOtros(feature, layer) {
    layer.on({
        mouseover: highlightFeature,
        mouseout: resetHighlightOtro,
        click: zoomToFeature,
        contextmenu: viewInfoRodal
    });

    layer.options.attribution =  name_capa_current;
    //console.log(layer);


}


function viewInfoRodal(e) {

    var layer = e.target;
    var url = "http://localhost/pindo_project/rodales/view?Accion=Ver+Rodales&Categoria=Rodales&id=" + layer.feature.id;
    var win = window.open(url, '_blank');

}

function highlightFeature(e) {

    var layer = e.target;

    layer.setStyle({
        weight: 5,
        color: '#ffffff',
        dashArray: '',
        fillOpacity: 0.7,
        fillColor: '#FFFF00'
    });

    if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
        layer.bringToFront();
    }
    info.update(layer.feature);
}


function resetHighlight(e) {
    info.update();
    geojsonrodalunico.resetStyle(e.target);

}
function resetHighlightClasificado(e) {
    info.update();
    geojsonrodalclasificado.resetStyle(e.target);
}

function resetHighlightOtro(e) {
    info.update();

    var name_geojson = e.target.options.attribution;

    var geojson_Select = null;
    for(var i = 0; i < array_geojson_class.capas.length; i++){

        if(array_geojson_class.capas[i].nombre === name_geojson){

            geojson_Select = array_geojson_class.capas[i].geojson;

        }
    }



    //Tengo que recorrer el estilo inicial
    for (var i = 0; i < array_clases_other.clases.length; i++){

        if(array_clases_other.clases[i].capa === name_geojson){


            for(var j = 0; j < array_clases_other.clases[i].style.length; j++){

                var camp_class = array_clases_other.clases[i].style[j].campo_class;
               // console.log(array_clases_other.clases[i].style[j].attr);
                if(array_clases_other.clases[i].style[j].attr === e.target.feature[camp_class]){

                    //Seteo el stilo
                    e.target.setStyle({fillColor : array_clases_other.clases[i].style[j].color,
                        color : array_clases_other.clases[i].style[j].color,
                        dashArray: '3',
                        fillOpacity: 0.5});

                }

            }

        }

    }


    //e.target.setStyle({fillColor :'blue'});
    //console.log(e.target.feature);
    //console.log(array_clases_other);
    //geojson_Select.resetStyle(e.target);
}

function zoomToFeature(e) {
    mymap.fitBounds(e.target.getBounds());
    //showIdAndSap(e.target.feature);
}


function transformToArray(data) {

    var cadena = data,
        patron = /{/g,
        nuevoValor  = "[",
        nuevaCadena = cadena.replace(patron, nuevoValor);

    var cadena2 = nuevaCadena,
        patron2 = /}/g,
        nuevoValor2  = "]",
        nuevaCadena2 = cadena2.replace(patron2, nuevoValor2);

    return nuevaCadena2;

}