<?php
include("conexion.php");
$usuario = $_GET['id'];


if($usuario == ""){
    Header("Location: ../index.html");
}

$totaldolares = 0;
$preciobs = 37.6;

$sql = "SELECT * FROM `productos` WHERE unidades >= 1";

$resultado = mysqli_query($conexion, $sql);


$sql2 = "SELECT * FROM factura WHERE id_usuario = '$usuario'";

$resultado2 = mysqli_query($conexion, $sql2);

$sql3 = "SELECT * FROM factura WHERE id_usuario = '$usuario'";

$resultado3 = mysqli_query($conexion, $sql3);

$sql4 = "SELECT * FROM factura WHERE id_usuario = '$usuario'";

$resultado4 = mysqli_query($conexion, $sql4);

$sql6 = "SELECT * FROM usuarios WHERE id = '$usuario'";

$resultado6= mysqli_query($conexion, $sql6);
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
    <link rel='stylesheet' type='text/css' media='screen' href='../css/factura.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/aside.css'>
    <script src='main.js'></script>

    <!-- Scripts -->
    <script src="js/jquery.js"></script>
</head>
<body>
    <div class="agg-productos-factura hidden">
        <form action="addtofacture.php?id=<?=$usuario?>" method="post" style="height: 400px;">
            <button class="botonx" type="button">X</button>
            <h1>Agregar unidades</h1>
            <select name="producto" class="selec addunid" id="productosselec">
                <option selected disabled>Seleccione el producto</option>
                <?php while ($row = mysqli_fetch_array($resultado)): ?>
                    <option value="<?= $row[0] ?>"><?= $row[1] ?></option>
                <?php endwhile; ?>
            </select>
            <input type="number" placeholder="Ingrese la unidades" name="unidades">
            
            <input type="submit" class="botonaggproducto" class="selec">
            <span style="font-size: 14px; color: #444; position: relative;  bottom: 10px;" class="totalunid">Seleccione el producto para añadir las unidad</span>

            
        </form>
    </div>

    <!-- eliminar -->
    
    <div class="agg-productos-factura hidden">
        <form action="eliminarfactura.php?id=<?=$usuario?>" method="post" style="height: 300px;">
            <button class="botonx" type="button">X</button>
            <h1 style="text-align: center; font-size: 21px;">Eliminar producto de la factura</h1>
            <select name="producto" class="selec">
                <option selected disabled>Seleccione el producto</option>
                <?php while ($row4 = mysqli_fetch_array($resultado4)): ?>
                    <option value="<?= $row4[0] ?>"><?= $row4[2] ?></option>
                <?php endwhile; ?>
            </select>
            <input type="submit" class="botonaggproducto" class="selec">
        </form>
    </div>



    <main class="factura-main">
        <!-- <h1>Factura</h1> -->
        <header class="factura--main-header">
        <?php while ($row3 = mysqli_fetch_array($resultado3)):
            $total = $row3[3] * $row3[4];
            $totaldolares = $totaldolares + $total;
        endwhile; ?>
                <div>
                    <h2 style="font-size: 18px;">Total en ($)</h2>
                    <h3 style="font-size: 23px;"><?= $totaldolares ?>$</h3>
                </div>
                <div>
                    <h2 style="font-size: 18px;">Total en (Bs)</h2>
                    <h3 style="font-size: 23px;"><?= $totaldolares * $preciobs?>Bs</h3>
                </div>
        </header>
        <main class="factura--main-main">
            <table>
                <tr class="tr--header">
                    <th>imagen</th>
                    <th>Nombre Articulo</th>
                    <th>Unidad</th>
                    <th>Precio Unitario</th>
                    <th>Precio Total</th>
                </tr>
                <?php while ($row2 = mysqli_fetch_array($resultado2)): ?>
                    <tr>
                        <th><img src="../recursos/<?= $row2[5] ?>" alt="" height="50px"></th>
                        <th><?= $row2[2] ?></th>
                        <th><?= $row2[3] ?></th>
                        <th><?= $row2[4] ?>$</th>
                        <th><?= $row2[3] * $row2[4]?>$</th>
                    </tr>
                <?php endwhile; ?>
            </table>
        </main>
        <footer class="factura--main-footer">
            <button class="boton-productos">Agregar productos</button>
            <button class="boton-productos">Eliminar</button>
            <button>Finalizar pedido</button>
        </footer>

    </main>


    <!-- aside -->

    <aside class="main-aside">
        <div class="main--aside-div">
            <img src="../recursos/logo.svg" width="140rem">
        </div >
    

        <div class="main--aside-div">
            <button class="aside-button seleccionado">Factura</button>
            <?php if($resul6 = $resultado6 -> fetch_array()){
                if($resul6[8] == "admin"){
                ?>
            <button class="aside-button">Productos</button>
            <?php }}?>
            <button class="aside-button historial">Historial</button>  
        </div>


        <div class="main--aside-div">
            <button class="aside-button botonesalir">Salir</button>
        </div>
    </aside>    
    <script>
        const botones = document.querySelectorAll(".aside-button");
        const botonesalir = document.querySelector(".botonesalir");
        const botonhistoria = document.querySelector(".historial");

        botones[0].addEventListener("click",()=>{
            window.location.href = "./factura.php?id=<?=$usuario?>"
        })
        botones[1].addEventListener("click",()=>{
            window.location.href = "productos.php?id=<?=$usuario?>"
        })
        botonhistoria.addEventListener("click",()=>{
            window.location.href = "./historial.php?id=<?=$usuario?>"
        })
        botonesalir.addEventListener("click",()=>{
            window.location.href = "../index.html"
        })

        const addunidades = document.querySelector(".addunid")
        const totalunid = document.querySelector(".totalunid")
        

        addunidades.addEventListener("change",()=>{
            totalunid.innerHTML = "<?=$usuario?>"
            
        })

    </script>
    <script src="../js/factura.js"></script>
</body>
</html>