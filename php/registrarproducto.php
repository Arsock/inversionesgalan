<?php
include("conexion.php");
$usuario = $_GET['id'];
$nombreproducto = $_POST['nombreproducto'];
$imagenproducto = $_POST['imagenproducto'];
$categoria = $_POST['categoria'];
$precio = $_POST['precio'];
$serial = $_POST['serial'];
$fechavencimiento = $_POST['fechavencimiento'];


echo $fechavencimiento;

$sql = "INSERT INTO `productos`(`nombreproducto`, `categ`, `precio`, `imagen`, `serial`, `fechavencimiento`) VALUES ('$nombreproducto','$categoria','$precio','$imagenproducto', '$serial', '$fechavencimiento')";

$resultado = mysqli_query($conexion, $sql);

$sql2 = "INSERT INTO `historial`(`idusuario`, `movimiento`, `submovimiento`, `fecha`, `descripcion`) VALUES ('$usuario','Producto','Ingreso de producto','00-00-0000','Se registro el producto $nombreproducto al precio de $precio$ y vence el $fechavencimiento')";

$resultado2 = mysqli_query($conexion, $sql2);

if($resultado){
    Header("Location: productos.php?id=$usuario&search=0");
}

?>
