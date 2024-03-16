<?php
include("conexion.php");
$selec = $_POST['producto'];
$unidades = $_POST['unidades'];
$usuario = $_GET['id'];

$sql = "SELECT * FROM productos WHERE id_producto='$selec'";

$resultado = mysqli_query($conexion, $sql);

if($resul = $resultado -> fetch_array()){
    $sql4 ="SELECT * FROM `factura` WHERE nombre = '$resul[1]' AND id_usuario = '$usuario'";

    $resultado4 = mysqli_query($conexion, $sql4);

    if($resultado4){
        if($resul2 = $resultado4 -> fetch_array()){
            $unitotales = $resul2[3] + $unidades;
            $sql5 = "UPDATE `factura` SET `unid`='$unitotales' WHERE idproducto = '$resul2[0]'";
            $resultado5 = mysqli_query($conexion, $sql5);

            $unidadestotales = $resul[5] - $unidades;
        
            $sql3 = "UPDATE `productos` SET `unidades`='$unidadestotales' WHERE id_producto='$selec'";
            $resultado3 = mysqli_query($conexion, $sql3);

            if($resultado5){
                Header("Location: factura.php?id=$usuario");
            }
    }


    else{
            $sql2 = "INSERT INTO `factura`(`idproducto`, `id_usuario`, `nombre`, `unid`, `precio`, `imagen`) VALUES ('$resul[0]','$usuario','$resul[1]','$unidades','$resul[3]','$resul[4]')";
            $resultado2 = mysqli_query($conexion, $sql2);
        
            $unidadestotales = $resul[5] - $unidades;
        
            $sql3 = "UPDATE `productos` SET `unidades`='$unidadestotales' WHERE id_producto='$selec'";
            $resultado3 = mysqli_query($conexion, $sql3);
        
            if($resultado2){
                Header("Location: factura.php?id=$usuario");
            }
        }

}
}
?>