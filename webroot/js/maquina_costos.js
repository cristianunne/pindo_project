

function habilitarCoutaMaq(checkbox)
{

    if( $(checkbox).prop('checked') ) {

        $("#cuota_maq_mes").attr('disabled', false);
    } else {

        $("#cuota_maq_mes").attr('disabled', true);
    }

}

function habilitarCoutaImp(checkbox)
{

    if( $(checkbox).prop('checked') ) {

        $("#cuota_mes_imp").attr('disabled', false);
    } else {

        $("#cuota_mes_imp").attr('disabled', true);
    }

}