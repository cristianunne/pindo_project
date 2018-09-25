
function changeDisplayIntervencion(seleccion)
{
    var option = $(seleccion).val();

    if (option === "INTERVENCION"){
        //Remuevo la Clase

        $("#label_intervencion-idintervencion").removeClass('intervencion');
        $("#intervencion-idintervencion").removeClass('intervencion');
    } else {
        $("#label_intervencion-idintervencion").addClass('intervencion');
        $("#intervencion-idintervencion").addClass('intervencion');
    }
}