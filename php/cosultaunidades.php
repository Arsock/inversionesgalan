<?php
include("conexion.php");
echo "xd";
$id = $_POST['producto'],
$sql = "SELECT * FROM `productos` WHERE id_producto = '$id'";

$resultado = mysqli_query($conexion, $sql);

if($resul = $resultado -> fetch_array()){
    echo $resul[5];
}

?>