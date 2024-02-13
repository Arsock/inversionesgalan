//Validacion - consulta php
$("#botonEnviarLogin").click(function(){
    $.ajax({
        url: "php/login.php",
        type: "post",
        data: $("#formulario").serialize(),
        success: function(resultado){
            if (resultado == 0){
                $("#resultado").html("Los campos no pueden estar vacios");
            } else if(resultado == 1){
                $("#resultado").html('Usuario o contraseña incorrecta');
            }else{
                window.open("php/main.php","_self");
            } 
            
        }
    });
});