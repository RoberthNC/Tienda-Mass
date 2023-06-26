<?php

    require "../config/conexion.php";
    require "../config/debuguear.php";

    

    $conn = conexionBD();

    $queryProveedores = "SELECT * FROM proveedor";
    $queryMarcas = "SELECT * FROM marca";
    $queryTipoProductos = "SELECT * FROM tipo_producto";

    $resultadosProveedores = mysqli_query($conn,$queryProveedores);
    $resultadosMarcas = mysqli_query($conn,$queryMarcas);
    $resultadosTipoProductos = mysqli_query($conn,$queryTipoProductos);


    if($_SERVER["REQUEST_METHOD"]==="POST"){
        $nombre = $_POST["nombre"];
        $precio_venta = $_POST["precio_venta"];
        $descripcion_producto = $_POST["descripcion_producto"];
        $stock = $_POST["stock"];
        $precio_compra = $_POST["precio_compra"];
        $id_proveedor = $_POST["proveedor"];
        $id_marca = $_POST["marca"];
        $id_tipo_producto = $_POST["tipo_producto"];

        $imagen = $_FILES["imagen"];

        $carpetaProductos = "../productos";

        if(!is_dir($carpetaProductos)){
            mkdir($carpetaProductos);
        }

        $nombreImagen = md5(uniqid(rand(),true)) . ".jpg";

        move_uploaded_file($imagen["tmp_name"],$carpetaProductos . "/". $nombreImagen);

        $query = "INSERT INTO producto(nombre,precio_venta,descripcion_producto,stock,precio_compra,id_proveedor,id_marca,id_tipo_producto,imagen)VALUES('$nombre','$precio_venta','$descripcion_producto','$stock','$precio_compra',$id_proveedor,$id_marca,$id_tipo_producto,'$nombreImagen')";
        $resultado = mysqli_query($conn,$query);
        if($resultado){
            header("Location: ./admin.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/nuevoproducto.css">
</head>
<body>
    <header class="header">
        <i class="letra-azul">Tienda Mass</i>
    </header>
    <main class="main">
        <div class="contenedor-izquierda">
            <a href="./admin.php">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="68" height="68" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M5 12l14 0" />
                    <path d="M5 12l6 6" />
                    <path d="M5 12l6 -6" />
                </svg>
            </a>
            <img src="../img/productos.jpg" alt="Nuevo producto">
        </div>
        <div class="contenedor-derecha">
            <h2>REGISTRO DE UN PRODUCTO</h2>
            <form method="POST" class="formulario" enctype="multipart/form-data">
                <div class="bloque1-formulario">
                    <div class="contenedor-campos">
                        <label for="nombre">NOMBRE:</label>
                        <input type="text" name="nombre" placeholder="Ingrese el nombre" required>
                    </div>
                    <div class="contenedor-campos">
                        <label for="precio">PRECIO DE VENTA:</label>
                        <input type="number" name="precio_venta" placeholder="Ingrese el precio de venta" required>
                    </div>
                    <div class="contenedor-campos">
                        <label for="descripcion">DESCRIPCIÓN:</label>
                        <input type="text" name="descripcion_producto" placeholder="Ingrese la descripcion" required>
                    </div>
                    <div class="contenedor-campos">
                        <label for="stock">STOCK:</label>
                        <input type="number" name="stock" placeholder="Ingrese el stock" required>
                    </div>
                    <div class="contenedor-campos">
                        <label for="precio2">PRECIO DE COMPRA:</label>
                        <input type="number" name="precio_compra" placeholder="Ingrese el precio de compra" required>
                    </div>

                    <div class="contenedor-campos">
                        <label for="proveedor">PROVEEDOR:</label>
                        <select name="proveedor">
                            <option value="">-- SELECCIONE UN PROVEEDOR --</option>
                        <?php
                            while($rowProveedores=mysqli_fetch_assoc($resultadosProveedores)){
                        ?>
                            <option value="<?php echo $rowProveedores['id_proveedor']?>"><?php echo $rowProveedores["nombre"]?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </div>

                    <div class="contenedor-campos">
                        <label for="marca">MARCA:</label>
                        <select name="marca">
                            <option value="">-- SELECCIONE UNA MARCA --</option>
                        <?php
                            while($rowMarcas=mysqli_fetch_assoc($resultadosMarcas)){
                        ?>
                            <option value="<?php echo $rowMarcas['id_marca']?>"><?php echo $rowMarcas["descripcion_marca"]?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </div>

                    <div class="contenedor-campos">
                        <label for="tipo_producto">TIPO DE PRODUCTO:</label>
                        <select name="tipo_producto">
                            <option value="">-- SELECCIONE UN TIPO DE PRODUCTO --</option>
                        <?php
                            while($rowTipoProductos=mysqli_fetch_assoc($resultadosTipoProductos)){
                        ?>
                            <option value="<?php echo $rowTipoProductos['id_tipo_producto']?>"><?php echo $rowTipoProductos["nombre"]?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </div>

                    <input type="file" name="imagen" accept="image/jpeg, image/png">

                    <input type="submit" value="GUARDAR PRODUCTO">
                </div>

                <div class="bloque2-formulario">
                    <label>FOTO:</label>
                    <img src="../img/productos.jpg" alt="Foto de producto">
                </div>
            </form>
        </div>
    </main>
</body>
</html>