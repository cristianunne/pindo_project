//Contiene todos los estilos relacionados a los mapas y sus metodos de clasificacion
var array_clasificacion_capas = {clases : []};

function styleUnico()
{

    var stylo = {
        fillColor: '#68afff',
        color: '#040176',
        dashArray: '3',
        fillOpacity: 0.5
    };
    return stylo;
}

var  array_clas = {clasi: []};


function styleClasificado(layer)
{
    //Este metodo clasifica por el ID del Rodal

    if(array_clas.clasi.length <= 0){
        var num_r_1 = getRandomInt(0, 255);
        var num_r_2 = getRandomInt(0, 255);
        var num_r_3 = getRandomInt(0, 255);
        var rgb = "rgb(" + num_r_1.toString() + ', ' + num_r_2.toString() + ', ' + num_r_3.toString() + ")";

        var stylo = {
            fillColor: rgb,
            color: rgb,
            dashArray: '3',
            fillOpacity: 0.5
        };

        var elemento = {attr : layer.id, color : rgb};
        array_clas.clasi.push(elemento);
        return stylo;

    } else {
        //Lo que hago es recorrer el array_clas y ver si existe el id para asignar no mas el color
        //Uso el id porque corresponde a IDRODALES
        var existe = false;
        for (var i = 0; i < array_clas.clasi.length; i++){

            if(array_clas.clasi[i].attr === layer.id){
                existe = true;
                return {
                    fillColor: array_clas.clasi[i].color ,
                    color: array_clas.clasi[i].color,
                    dashArray: '3',
                    fillOpacity: 0.5
                };
            }
        }

        if(existe === false){
            num_r_1 = getRandomInt(0, 255);
            num_r_2 = getRandomInt(0, 255);
            num_r_3 = getRandomInt(0, 255);
            rgb = "rgb(" + num_r_1.toString() + ', ' + num_r_2.toString() + ', ' + num_r_3.toString() + ")";
            elemento = {attr : layer.id, color : rgb};
            array_clas.clasi.push(elemento);
            return {
                fillColor: rgb ,
                color: rgb,
                dashArray: '3',
                fillOpacity: 0.5
            };
        }



    }




}

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
}

var paleta_class = null;
var campo_class = null;



function getStyle(layer)
{

    if(array_clas_other.clasi.length <= 0) {

        var num_r_1 = getRandomInt(0, 255);
        var num_r_2 = getRandomInt(0, 255);
        var num_r_3 = getRandomInt(0, 255);
        var rgb = "rgb(" + num_r_1.toString() + ', ' + num_r_2.toString() + ', ' + num_r_3.toString() + ")";

        var elemento = {campo_class: campo_class, attr : layer[campo_class], color: rgb};

        array_clas_other.clasi.push(elemento);
        //console.log(array_clas_other);


        return {
            fillColor: rgb ,
            color: rgb,
            dashArray: '3',
            fillOpacity: 0.5
        };

    } else {

        //Lo que hago es recorrer el array_clas y ver si existe el id para asignar no mas el color
        var existe = false;
        for (var i = 0; i < array_clas_other.clasi.length; i++){

            if(array_clas_other.clasi[i].attr === layer[campo_class]){
                existe = true;
                return {
                    fillColor: array_clas_other.clasi[i].color ,
                    color: array_clas_other.clasi[i].color,
                    dashArray: '3',
                    fillOpacity: 0.5
                };


            }

        }

        if(existe === false){

            num_r_1 = getRandomInt(0, 255);
            num_r_2 = getRandomInt(0, 255);
            num_r_3 = getRandomInt(0, 255);
            rgb = "rgb(" + num_r_1.toString() + ', ' + num_r_2.toString() + ', ' + num_r_3.toString() + ")";

            elemento = {campo_class : campo_class, attr : layer[campo_class], color : rgb};

            array_clas_other.clasi.push(elemento);

            return {
                fillColor: rgb ,
                color: rgb,
                dashArray: '3',
                fillOpacity: 0.5
            };
        }

    }



}