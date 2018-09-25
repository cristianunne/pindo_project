(function($) {  
    $.get = function(key)   {  
        key = key.replace(/[\[]/, '\\[');  
        key = key.replace(/[\]]/, '\\]');  
        var pattern = "[\\?&]" + key + "=([^&#]*)";  
        var regex = new RegExp(pattern);  
        var url = unescape(window.location.href);  
        var results = regex.exec(url);  
        if (results === null) {  
            return null;  
        } else {  
            return results[1];  
        }  
    }  
})(jQuery);


//ESta funcion setea a activo el li

$(function() {
 
    var category = $.get("Categoria");
    var accion = $.get("Accion");
    
    var nombre_li = "li_" + category;
    
    $("#" + nombre_li).addClass("active")
    
 
});