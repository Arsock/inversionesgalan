<?php
include("conexion.php");
$usuario = $_GET['id'];
$busqueda = $_GET['search'];



if($usuario == ""){
    Header("Location: ../index.html");
}

$sql = "SELECT * FROM categoria";

$resultado = mysqli_query($conexion, $sql);


if($busqueda == 0){
    $sql2 = "SELECT * FROM productos";

    $resultado2 = mysqli_query($conexion, $sql2);
} else{
    $sql2 = "SELECT * FROM productos WHERE serial LIKE $busqueda";

    $resultado2 = mysqli_query($conexion, $sql2);
}





$sql3 = "SELECT * FROM productos";

$resultado3 = mysqli_query($conexion, $sql3);

$sql4 = "SELECT * FROM categoria";

$resultado4 = mysqli_query($conexion, $sql4);

$sql6 = "SELECT * FROM usuarios WHERE id = '$usuario'";

$resultado6= mysqli_query($conexion, $sql6);

$sql7 = "SELECT * FROM `productos` WHERE unidades < 10";

$resultado7 = mysqli_query($conexion, $sql7);

$sql8 = "SELECT * FROM `productos` WHERE unidades < 10";

$resultado8 = mysqli_query($conexion, $sql8);

$sql9 = "SELECT * FROM `productos`";

$resultado9 = mysqli_query($conexion, $sql9);

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
    <link rel='stylesheet' type='text/css' media='screen' href='../css/productos.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/aside.css'>
    <script src='main.js'></script>

    <!-- Scripts -->
    <script src="../js/jquery.js"></script>
</head>
<body>

    <!-- añadir un producto -->
    <?php if ($row8 = mysqli_fetch_array($resultado8)){ ?>
    <div class="notificacion">
        <div>
            <h1>Quedan pocas unidades de los siguientes productos:</h1>
            <button class="xnotification">x</button>
        </div>
        <?php while ($row7 = mysqli_fetch_array($resultado7)): ?>
                    <li><?= $row7[1] ?> <?= $row7[5]?> Unid</li>
        <?php endwhile; ?>
        
    </div>
    <?php } ?>

    <div class="agg-productos hidden">
        <form action="registrarproducto.php?id=<?=$usuario?>" method="post" autocomplete="off">
            <button class="botonx" type="button">X</button>
            <h1>Agregar un producto</h1>
            <input type="text" placeholder="Serial" name="serial">
            <input type="text" placeholder="Nombre del producto" name="nombreproducto">
            
            <input type="file" placeholder="Examinar imagen" class="examinar" name="imagenproducto">
            <select name="categoria" id="seleceliminar">
                <option selected disabled>Seleccione una Categoria</option>
                <?php while ($row = mysqli_fetch_array($resultado)): ?>
                    <option><?= $row['nombrecateg'] ?></option>
                <?php endwhile; ?>
            </select>
            <input type="number" placeholder="Precio" name="precio">
            <input type="number" placeholder="Fecha de vencimiento" name="fechavencimiento" onfocus="(this.type='date')">
            <input type="submit" class="botonaggproducto">
        </form>
    </div>

    <!-- añadir unidades -->
    <div class="popup aja hidden" autocomplete="off">
        <form style="height: 35%;" action="changerol.php" method="post">
            <button type="button" class="x xs"><</button>
            <p style="font-weight: bold; text-align: center; width: 100%;">¿Seguro que desea eliminar el producto?</p>
            <button type="button" placeholder="" class="input-register boton-register eliminar" id="eliminar">Eliminar</button>
        </form>
    </div>

    <div class="agg-productos hidden">
        <form action="addunid.php?id=<?=$usuario?>" method="post" autocomplete="off">
            <button class="botonx" type="button">X</button>
            <h1>Agregar unidades</h1>
            <select name="producto">
                <option selected disabled>Seleccione el producto</option>
                <?php while ($row3 = mysqli_fetch_array($resultado3)): ?>
                    <option value="<?= $row3[0] ?>"><?= $row3[1] ?></option>
                <?php endwhile; ?>
            </select>
            <input type="number" placeholder="Agregar cantidad" name="cant">
            <input type="submit" class="botonaggproducto">
        </form>
    </div>

    <div class="agg-productos hidden">
        <form action="addunid.php" method="post" style="height: 350px;" autocomplete="off">
            <button class="botonx" type="button">X</button>
            <h1>Eliminar producto</h1>
            <select name="productoselec" id="productoeliminarselec">
                <option selected disabled>Seleccione el producto</option>
                <?php while ($row9 = mysqli_fetch_array($resultado9)): ?>
                    <option value="<?= $row9[0] ?>"><?= $row9[1] ?></option>
                <?php endwhile; ?>
            </select>
            <input type="button" class="botonaggproducto segido" value="Eliminar">
        </form>
    </div>

    <div class="agg-productos hidden">
        <form action="modificarproducto.php?id=<?=$usuario?>" method="post" autocomplete="off">
            <button type="button" class="botonx">X</button>
            <h2>Modificar un producto</h2>
            <div id="modif"style="display: flex; justify-content: center; align-items: center; height: 8%; flex-direction: row; width: 80%;"><input type="text" style="width: 100%; height: 100%; border-radius: 5px 0 0 5px;" placeholder="Serial del producto a modificar" class="input-modif" id="inputmodif" name="serial"><button style="border-radius: 0 5px 5px 0; height: 100%;" type="button" id="buscadormodificar">Buscar</button></div>
            <span id="res">Modificar un producto</span>
            <h2>Datos a modificar</h2>
            <input type="hidden" class="modifdatos" name="idproduc" narequired>
            <input type="text" placeholder="Nombre de comida" class="modifdatos" name="nombre" required>
            <select class="modifdatos" name="categ">
                <option selected disabled required>Seleccione una Categoria</option>
                <?php while ($row4 = mysqli_fetch_array($resultado4)): ?>
                    <option><?= $row4['nombrecateg'] ?></option>
                <?php endwhile; ?>
            </select>
            <input type="number" placeholder="Precio" class="modifdatos" name="precio"required>
            <input type="submit" class="botonaggproducto">
        </form>
    </div>

    <main class="producto-main">
        <h1>Producto</h1>
        <header class="producto--main-header">
            <div class="contenedor-buscador">
                <input type="text" class="buscador" placeholder="Serial del producto"><button id="buscador">Buscar</button>
            </div>
            <button class="boton-productos">+ Productos</button>
        </header>
        <main class="producto--main-main">
            <table>
                <tr class="tr--header">
                    <th>imagen</th>
                    <th>Serial</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Unid disponible</th>
                    <th>Precio Unitario</th>
                    <th>Fecha vencimiento</th>
                </tr>
                <?php while ($row2 = mysqli_fetch_array($resultado2)): ?>
                    <tr>
                        <th><img src="../recursos/<?= $row2[4] ?>" alt="" height="50px"></th>
                        <th><?= $row2[6] ?></th>
                        <th><?= $row2[1] ?></th>
                        <th><?= $row2[2] ?></th>
                        <th><?= $row2[5] ?></th>
                        <th><?= $row2[3] ?>$</th>
                        <th><?= $row2[7] ?></th>
                    </tr>
                <?php endwhile; ?>

                
            </table>
        </main>
        <footer class="producto--main-footer">
            <button class="boton-productos">+ Unidad</button>
            <button class="boton-productos">- Eliminar</button>
            <button class="boton-productos">Modificar</button>
        </footer>

    </main>


    <!-- asideba -->

    <aside class="main-aside">
        <div class="main--aside-div">
            <img src="../recursos/logo.svg" width="140rem">
        </div >
    

        <div class="main--aside-div">
            <button class="aside-button factura">Factura</button>
            <?php if($resul6 = $resultado6 -> fetch_array()){
                if($resul6[8] == "admin"){
                ?>
            <button class="aside-button productos seleccionado">Productos</button>
            <?php }}?>
            <button class="aside-button historial">Historial</button>  
        </div>


        <div class="main--aside-div">
            <button class="aside-button botonesalir">Salir</button>
        </div>
    </aside>
    <script>
        // const botones = document.querySelectorAll(".aside-button");
        const botones = document.querySelectorAll(".aside-button");
        const botonesalir = document.querySelector(".botonesalir");
        const botonhistoria = document.querySelector(".historial");
        const segido = document.querySelector(".segido");

        const botonbuscar = document.getElementById("buscador");

        botonbuscar.addEventListener("click",()=>{
            var inputbuscador = document.querySelector(".buscador").value
            if (inputbuscador == ""){
                window.location.href = `./productos.php?id=<?=$usuario?>&search=0`
            }else{

                window.location.href = `./productos.php?id=<?=$usuario?>&search=${inputbuscador}`
            }
 
        })

        
        segido.addEventListener("click",()=>{
            no3.classList.toggle("hidden")
            popup[2].classList.toggle("hidden")
        })

        botones[0].addEventListener("click",()=>{
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
       
        const modifiinput = document.querySelectorAll(".input-modif");
        const datoshtml = document.querySelectorAll(".modifdatos");
        //Validacion - consulta php
        $("#buscadormodificar").click(function(){
            $.ajax({
                url: "modificar.php",
                type: "post",
                data: $("#inputmodif").serialize(),
                success: function(resultado){
                    
                    const datos = resultado.split(",")
                    console.log(datos)
                    for(let i = 0;i < 5; i++){
                        datoshtml[i].value = datos[i]
                        console.log(i)
                    }
                    $("#res").html(resultado);
                }
            });
        });

        $("#eliminar").click(function(){
            $.ajax({
                url: "eliminarproducto.php",
                type: "post",
                data: $("#productoeliminarselec").serialize(),
                success: function(resultado){
                    window.location.href = "./productos.php?id=<?=$usuario?>&search=0"
                }
            });
        });
        
        
        const xnotification = document.querySelector(".xnotification");
        const notificacion = document.querySelector(".notificacion");

        xnotification.addEventListener("click",()=>{
            notificacion.classList.add("hidden")
        })



    </script>
    <script src="../js/productos.js"></script>

</body>
</html>