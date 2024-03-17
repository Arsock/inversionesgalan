<?php
include("conexion.php");
$usuario = $_GET['id'];

$sql6 = "SELECT * FROM usuarios WHERE id = '$usuario'";

$resultado6= mysqli_query($conexion, $sql6);


$sql9 = "SELECT * FROM `historial` WHERE idusuario = '$usuario'";

$resultado9= mysqli_query($conexion, $sql9);

$num = 0;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <!-- Fuente -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- Importar -->
    <link rel='stylesheet' type='text/css' media='screen' href='../css/historial.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/aside.css'>
    <script src='main.js'></script>

    <!-- Scripts -->
    <script src="js/jquery.js"></script>
</head>
<body>
    <main class="historial-main">
        <h1>Historial</h1>
        <header class="historial--main-header">
            <div class="contenedor-buscador">
                <input type="text" class="buscador" placeholder="Serial del historial"><button>Buscar</button>
            </div>
        </header>
        <main class="historial--main-main">
            <h1 style="font-size: 15px; text-align: center; padding: 20px; background: #C1C1C1;">TODOS LOS MOVIMIENTOS REALIZADOS</h1>
            <table>
                <?php while ($row9 = mysqli_fetch_array($resultado9)): ?>
                <?php $num = $num + 1;?>
                <tr>
                    <th><?= $num ?></th>
                    <th class="baja"><span><?= $row9[2] ?></span><span><?= $row9[3] ?></span></th>
                    <th style="font-size: 13px;"><?= $row9[4] ?></th>
                    <th style="font-size: 13px; display: flex; justify-content: start; align-items: center; position: relative; top: 10px;"><?= $row9[5] ?></th>
                </tr>
                <?php endwhile; ?>
            </table>
        </main>

    </main>


    <!-- aside -->

    <aside class="main-aside">
        <div class="main--aside-div">
            <img src="../recursos/logo.svg" width="140rem">
        </div >
    

        <div class="main--aside-div">
            <button class="aside-button factura">Factura</button>
            <?php if($resul6 = $resultado6 -> fetch_array()){
                if($resul6[8] == "admin"){
                ?>
            <button class="aside-button ">Productos</button>
            <?php }}?>
            <button class="aside-button historial seleccionado">Historial</button>  
        </div>


        <div class="main--aside-div">
            <button class="aside-button botonesalir">Salir</button>
        </div>
    </aside>

    <script>
        const botones = document.querySelectorAll(".aside-button");
        const botonesalir = document.querySelector(".botonesalir");
        const botonhistoria = document.querySelector(".historial");
        const factura = document.querySelector(".factura");

        factura.addEventListener("click",()=>{
            window.location.href = "./factura.php?id=<?=$usuario?>"
        })
        botones[1].addEventListener("click",()=>{
            window.location.href = "productos.php?id=<?=$usuario?>&search=0"
        })
        botonhistoria.addEventListener("click",()=>{
            window.location.href = "./historial.php?id=<?=$usuario?>"
        })
        botonesalir.addEventListener("click",()=>{
            window.location.href = "../index.html"
        })
    </script>
    </script>
</body>
</html>