<?php

    session_start();
    error_reporting(0);

    require "../config/conexion.php";
    require "../config/debuguear.php";

    $conn = conexionBD();

    $id = $_SESSION["id"];
    //Obtenemos la dirección
    $queryCliente = "SELECT * FROM cliente WHERE id_cliente='$id'";
    $resultadosCliente = mysqli_query($conn, $queryCliente);
    $datosCliente = mysqli_fetch_assoc($resultadosCliente);

    $nombre = $_SESSION["nombre"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrega a Domicilio</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/carrito.css">
</head>
<body>
    <header class="header">
        <div class="logo">
            <h1>
                <i class="letra-azul">Mass</i>
            </h1>
        </div>
        <nav class="navegacion">
            <div class="block">
                <a href="" class="letra-azul">Catálogo</a>
                <a href="./contacto.php" class="letra-azul">Contáctanos</a>
                <a href="./nosotros.php" class="letra-azul">Nosotros</a>
            </div>
            <div class="block">
                <a href="./login.php" class="letra-azul">
                    <span class="icon-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#25318C" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        </svg>
                        <p>
                            <?php
                                echo $nombre;
                            ?>
                        </p>
                    </span>
                </a>
                <a href="./carrito.php" class="letra-azul">
                    <span class="icon-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#25318C" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M17 17h-11v-14h-2" />
                            <path d="M6 5l14 1l-1 7h-13" />
                        </svg>
                        <p>Carrito</p>
                    </span>
                </a>
            </div>
        </nav>
    </header>

    <main style="margin-top: 15rem; padding:2.5rem 30px;">
        <h2 style="text-align:center;">Entrega</h2>
        <div style="display: flex; justify-content: space-around; margin-top:30px;">
            <!-- Lado Izquierdo -->
            <div style="display: flex; flex-direction: column; gap:50px;">
                <div style="display: flex; align-items:center; gap:10px; padding:10px 20px; border:solid 2px black;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#25318C" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M18.364 4.636a9 9 0 0 1 .203 12.519l-.203 .21l-4.243 4.242a3 3 0 0 1 -4.097 .135l-.144 -.135l-4.244 -4.243a9 9 0 0 1 12.728 -12.728zm-6.364 3.364a3 3 0 1 0 0 6a3 3 0 0 0 0 -6z" stroke-width="0" fill="currentColor" />
                    </svg>
                    <p>Dirección: <?php echo $datosCliente["direccion_domicilio"]?></p>
                </div>

                <div>
                    <p style="margin-bottom: 5px;">ELIGE UN TIPO DE ENTREGA</p>
                    <div style="display: flex; flex-direction: column; gap:10px; border:solid 2px black; padding:10px 20px;">
                        <div style="display: flex; align-items:center; gap:5px;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-store" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M3 21l18 0" />
                                <path d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4" />
                                <path d="M5 21l0 -10.15" />
                                <path d="M19 21l0 -10.15" />
                                <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
                            </svg>
                            <a href="./retirotienda.php" style="background-color: white; border-radius:5px; cursor: pointer; border:2px solid black; padding:3px 10px;">Retirar en Tienda</a>
                        </div>
                        <div style="display: flex; align-items:center; gap:5px;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                            </svg>
                            <a href="./entregadomicilio.php" style="background-color:#bdf76c; border-radius:5px; cursor: pointer; border:2px solid black; padding:3px 10px;">Entrega a Domicilio</a>
                        </div>
                    </div>
                </div>

                <div style="display: flex; flex-direction: column; gap:5px;">
                    <p>FECHA DE ENVÍO</p>
                    <input type="date" style="padding:5px; border-radius: 5px;">
                </div>
            </div>
            <!-- Lado Derecho -->
            <div>
                <p>Resumen de la Orden</p>
                <div style="padding:20px; border:2px solid black; margin-top:10px; display:flex; flex-direction: column; gap:1rem;">

                    <?php
                        
                        foreach($_SESSION["arregloIdProductos"] as $idProductoActual){
                            $queryProductoActual = "SELECT * FROM producto WHERE id_producto='$idProductoActual'";
                            $resultadosProductoActual = mysqli_query($conn, $queryProductoActual);
                            $datosProductoActual = mysqli_fetch_assoc($resultadosProductoActual);
                    ?>
                        <!-- Este div es el que se va a generar por la bd -->
                        <div class="contenido-producto">
                            <img src="../productos/<?php echo $datosProductoActual['imagen'];?>" alt="Producto" style="height:150px; width:75px;">
                            <div class="descripcion-producto">
                                <p><?php echo $datosProductoActual['nombre'];?></p>
                                <p><?php echo $datosProductoActual['nombre'];?></p>
                                <p>Precio: <?php echo $datosProductoActual['precio_venta'];?></p>
                            </div>
                        </div>
                    <?php
                        }
                    ?>

                    <a href="./carrito.php" style="margin-bottom: 10px; padding:5px 10px; background-color: #f1c755; border-radius:5px; border:1px solid black; text-align:center;">Volver al Carro</a>
                    <p style="margin-bottom: 15px;">COSTO DE ENVÍO: x</p>
                    <p style="margin-bottom: 15px;">SUBTOTAL(*): <?php echo $_SESSION["subtotal"];?> + x</p>
                    <p style="margin-bottom: 15px;">TOTAL(*): <?php echo $_SESSION["subtotal"];?> + x</p>
                    <a href="./pago.php" style="background-color:#bdf76c; padding:5px; border-radius:5px; cursor:pointer; border:1px solid black; text-align:center;">Ir a Pagar</a>
                </div>
            </div>
        </div>
        <div style="display:flex; align-items:center; gap:10px; margin-top:20px;">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#25318C" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M9 3a1 1 0 0 1 .877 .519l.051 .11l2 5a1 1 0 0 1 -.313 1.16l-.1 .068l-1.674 1.004l.063 .103a10 10 0 0 0 3.132 3.132l.102 .062l1.005 -1.672a1 1 0 0 1 1.113 -.453l.115 .039l5 2a1 1 0 0 1 .622 .807l.007 .121v4c0 1.657 -1.343 3 -3.06 2.998c-8.579 -.521 -15.418 -7.36 -15.94 -15.998a3 3 0 0 1 2.824 -2.995l.176 -.005h4z" stroke-width="0" fill="currentColor" />
            </svg>
            <p>¿Necesitas ayuda? Llámanos al 012037076</p>
        </div>
    </main>


    <script src="../js/index.js"></script>
</body>
</html>