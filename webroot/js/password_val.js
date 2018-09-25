
function myFunction() {
    var text_2 = $("#pass_2").val();
    var text_1 = $("#password").val();
    
    if (text_2 == text_1){
        
        $('#boton_submit').prop('disabled', false);
        
    } else {
        $('#boton_submit').prop('disabled', true);
    }
}