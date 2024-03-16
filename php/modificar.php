<?php
include("conexion.php");
$serial = $_POST['serial'];

$sql = "SELECT * FROM productos WHERE serial = '$serial'";

$resultado = mysqli_query($conexion, $sql);

$row = mysqli_fetch_array($resultado);

echo $row[0],",",$row[1],",",$row[2],",",$row[3],",",$row[4],",",$row[5],",",$row[6];

?>