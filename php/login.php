<?php
include("conexion.php");
$usuario = $_POST['loginUser'];
$clave = $_POST['loginPass'];

$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND clave='$clave'";

$resultado = mysqli_query($conexion, $sql);


if($usuario == "" OR $clave == ""){
    echo 0;
}elseif($resul = $resultado -> fetch_array()){
	if($usuario == $resul[1] AND $clave == $resul[2]){
        // Header("Location: main.php");
        echo 2;
	} 

}else{
    echo 1;
}
