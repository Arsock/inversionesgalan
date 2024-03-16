<?php
include("conexion.php");
$usuario = $_POST['loginUser'];
$clave = $_POST['loginPass'];

$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND clave='$clave'";

$resultado = mysqli_query($conexion, $sql);


if($usuario == "" OR $clave == ""){
    echo "vacio";
}elseif($resul = $resultado -> fetch_array()){
	if($usuario == $resul[1] AND $clave == $resul[2]){
        echo $resul[0];

	} 

}else{
    echo "error";
}
?>
