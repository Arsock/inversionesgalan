<?php
include("conexion.php");
$usuario = $_GET['id'];
$producto = $_POST['producto'];
$cant = $_POST['cant'];



$sql = "SELECT * FROM `productos` WHERE id_producto = '$producto'";

$resultado = mysqli_query($conexion, $sql);


if($resul = $resultado -> fetch_array()){
    $unidadestotales = $resul[5] + $cant;


    $sql2 = "UPDATE `productos` SET unidades='$unidadestotales' WHERE id_producto='$producto'";

    $resultado2 = mysqli_query($conexion, $sql2);


    Header("Location: productos.php?id=$usuario&search=0");
}

?>
