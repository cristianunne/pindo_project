//Variables usada para cargar los datos

var mapconfig = null;
var capasbase = null;
var layersoverlay = null;
var countcapasbase = null;

//Es la variable que genera el controlador de las capas bases
var layerControl = new L.control.layers();

var capasBaseList = [];
var capasoverlaycurrent = [];
var mymap = null;
var layercontrol;
var overrodales = null;
var rodal_ = null;
var info = L.control();
var geojson;

$(function()
{
    $.ajax({
        url: 'Configmap/getConfigMap',
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

                countcapasbase = data.countcapasbase;
                capabasedefault = data.capabasedefault;

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

                    if(j == 0){
                        mymap.addLayer(capatomap, capa['nombre']);
                    }



                }
                console.log(baselayers);
                layercontrol = L.control.layers(baselayers, null).addTo(mymap);


            }
    }


}


function loadCapasOverlays() {


    createVarCapaOverlay();
}


function createVarCapaOverlay()
{

    if(layersoverlay[0] != null){
        var variable = "var rodales = " + layersoverlay[0].row_to_json;

        overrodales = eval(variable);
        rodal_ = rodales;
        //Agrega la capa rodales al Mapa
        geojson = L.geoJson(rodales, {
            style: style,
            onEachFeature: onEachFeature
        }).addTo(mymap);

        //Agrega la capa rodales al la tabla de Contenidos
        layercontrol.addOverlay(geojson, "Rodales");

        info.addTo(mymap);
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
        this._div.innerHTML = '<h4>Identificación del Rodal</h4>' +  ('<b>Id Rodal: </b>' + props.id + '<br>' + '<b>Código SAP: </b>' + props.cod_sap);

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


function showIdAndSap(layer)
{
    alert(layer.id + " sap: " + layer.cod_sap);

}

function resetHighlight(e) {
    info.update();
    geojson.resetStyle(e.target);
}

function zoomToFeature(e) {
    mymap.fitBounds(e.target.getBounds());
    //showIdAndSap(e.target.feature);
}

function style(feature) {
    return {
        fillColor: '#68afff',
        color: '#040176',
        dashArray: '3',
        fillOpacity: 0.2
    };
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