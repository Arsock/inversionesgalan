<?php
include("conexion.php");
$producto = $_POST['productoselec'];

$sql2 = "DELETE FROM `productos` WHERE id_producto = '$producto'";

$resultado2 = mysqli_query($conexion, $sql2);


?>



