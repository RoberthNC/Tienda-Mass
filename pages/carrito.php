<?php

    session_start();
    error_reporting(0);

    require "../config/conexion.php";
    require "../config/debuguear.php";

    $conn = conexionBD();

    $id = $_SESSION["id"];
    $nombre = $_SESSION["nombre"];

    $idProducto = $_POST["idProductoNuevo"];

    //Agregar un id nuevo
    $band = false;
    foreach($_SESSION["arregloIdProductos"] as $idActual){
        if($idProducto == $idActual){
            $band = true;
            break;
        }
    }
    if($band === false){
        $_SESSION["arregloIdProductos"][]= $idProducto;
    }
    //Limpiar los null
    $_SESSION["arregloIdProductos"] = array_filter($_SESSION["arregloIdProductos"],fn($id)=>$id!==null);
    //Cantidad de elementos en el carrito
    $_SESSION["cantidadCarrito"] = count($_SESSION["arregloIdProductos"]);
    //Subtotal
    $_SESSION["subtotal"] = 0;
    //IGV
    $_SESSION["igv"] = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
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
                <a href="./index.php">
                    <i class="letra-azul">Mass</i>
                </a>
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

    <main class="main">
        <?php
            if($_SESSION["cantidadCarrito"] == 0){
        ?>
            <div class="seccion-carrito">
                <div class="contenedor-carrito">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="68" height="68" viewBox="0 0 24 24" stroke-width="1.5" stroke="#25318C" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M17 17h-11v-14h-2" />
                        <path d="M6 5l14 1l-1 7h-13" />
                    </svg>
                </div>
                <h2>Tu Carro de Compras está vacío</h2>
                <h3>Agrega productos ahora</h3>
                <a href="./index.php">Seguir comprando</a>
            </div>
        <?php
            }
            else{
        ?>
            <!-- Carrito aquí -->
            <div class="contenedor-seccion">
                <div class="bloque-carrito">
                    <h3>CARRITO</h3>
                    <div class="elementos-carrito">
                        <?php
                        
                            foreach($_SESSION["arregloIdProductos"] as $idProductoActual){
                                $queryProductoActual = "SELECT * FROM producto WHERE id_producto='$idProductoActual'";
                                $resultadosProductoActual = mysqli_query($conn, $queryProductoActual);
                                $datosProductoActual = mysqli_fetch_assoc($resultadosProductoActual);
                                $_SESSION["subtotal"] += (float)$datosProductoActual["precio_venta"];
                        ?>
                            <!-- Este div es el que se va a generar por la bd -->
                            <div class="contenido-producto">
                                <img src="../productos/<?php echo $datosProductoActual['imagen'];?>" alt="Producto" style="height:150px; width:75px;">
                                <div class="descripcion-producto">
                                    <p><?php echo $datosProductoActual['nombre'];?></p>
                                    <p><?php echo $datosProductoActual['nombre'];?></p>
                                    <p>Precio: <?php echo $datosProductoActual['precio_venta'];?></p>
                                    <div style="display:flex; gap:5px; align-items:center;">
                                        <p>Cantidad: </p> 
                                        <input type="number" value="1" min="1" max="<?php echo $datosProductoActual['stock'];?>" style="width:45px;">
                                    </div>
                                    <button style="background-color:rgb(255,0,0,0.7); color:white; border-radius:5px; cursor:pointer;">Eliminar</button>
                                </div>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <div class="bloque-resumen">
                    <h3>RESUMEN DE LA ORDEN</h3>
                    <div class="bloque-resumen_resumen">
                        <p>PRODUCTOS: (<?php echo $_SESSION["cantidadCarrito"];?>)</p>
                        <p>SUBTOTAL: S/. <?php echo $_SESSION["subtotal"];?></p>
                        <?php
                            $_SESSION["igv"] = $_SESSION["subtotal"] * 0.18;
                        ?>
                        <p>IGV: S/. <?php echo $_SESSION["igv"];?></p>
                        <a href="./entrega.php" style="background-color:#bdf76c; padding:5px; border-radius:5px; cursor:pointer; text-align:center; border:1px solid black;">Continuar Compra</a>
                    </div>
                </div>
            </div>
        <?php
            }
        ?>
    </main>

    <footer class="footer">
        <p>Síguenos:</p>
        <div class="redes-ayuda">
            <div class="redes">
                <a href="https://www.facebook.com/TiendasMassPeru" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                    </svg>
                </a>
                <a href="https://www.instagram.com/tiendasmassperu" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                        <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        <path d="M16.5 7.5l0 .01" />
                    </svg>
                </a>
                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-twitter" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z" />
                    </svg>
                </a>
            </div>
            <div class="ayuda">
                <a href="./ayuda.php">
                    <span class="icon-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-help-octagon" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M9.103 2h5.794a3 3 0 0 1 2.122 .879l4.101 4.1a3 3 0 0 1 .88 2.125v5.794a3 3 0 0 1 -.879 2.122l-4.1 4.101a3 3 0 0 1 -2.123 .88h-5.795a3 3 0 0 1 -2.122 -.88l-4.101 -4.1a3 3 0 0 1 -.88 -2.124v-5.794a3 3 0 0 1 .879 -2.122l4.1 -4.101a3 3 0 0 1 2.125 -.88z" />
                            <path d="M12 16v.01" />
                            <path d="M12 13a2 2 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483" />
                        </svg>
                        <p>Ayuda</p>
                    </span>
                </a>
            </div>
        </div>
    </footer>
    <script src="../js/index.js"></script>
</body>
</html>