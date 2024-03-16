<?php
include("conexion.php");
$usuario = $_GET['id'];
$producto = $_POST['producto'];

$sql2 = "SELECT * FROM `factura` WHERE idproducto = '$producto' AND id_usuario = '$usuario'";

$resultado2 = mysqli_query($conexion, $sql2);

if($resul2 = $resultado2 -> fetch_array()){
    $sql3 = "SELECT * FROM `productos` WHERE id_producto = '$producto'";

    $resultado3 = mysqli_query($conexion, $sql3);
    if($resul3 = $resultado3 -> fetch_array()){
        $unidatotal = $resul2[3] + $resul3[5];
        $sql4 ="UPDATE `productos` SET `unidades` = '$unidatotal' WHERE id_producto = '$producto'";
        $resultado4 = mysqli_query($conexion, $sql4);
        if($resultado4){
            $sql = "DELETE FROM `factura` WHERE idproducto = '$producto' AND id_usuario = '$usuario'";

            $resultado = mysqli_query($conexion, $sql);
            
            if($resultado){
                Header("Location: factura.php?id=$usuario");
                    
            }
        }
    }
}





?>