<?php
include("conexion.php");
$usuario = $_GET['id'];
$idproduc = $_POST['idproduc'];
$nombre = $_POST['nombre'];
$categ = $_POST['categ'];
$precio = $_POST['precio'];

$sql = "UPDATE `productos` SET `nombreproducto`='$nombre',`categ`='$categ',`precio`='$precio' WHERE id_producto = '$idproduc'";

$resultado = mysqli_query($conexion, $sql);
if($resultado){
        Header("Location: productos.php?id=$usuario&search=0");
    }

?>