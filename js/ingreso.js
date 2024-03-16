//Validacion - consulta php
$("#botonEnviarLogin").click(function(){
    $.ajax({
        url: "php/login.php",
        type: "post",
        data: $("#formulario").serialize(),
        success: function(resultado){
            if (resultado == "vacio"){
                $("#resultado").html("Los campos no pueden estar vacios");
            } else if(resultado == "error"){
                $("#resultado").html('Usuario o contraseña incorrecta');
            }else{
                window.open(`php/factura.php?id=${resultado}`,"_self");
            } 
            
        }
    });
});