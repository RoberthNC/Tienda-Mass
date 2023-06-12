<?php

    require "../config/conexion.php";
    require "../config/debuguear.php";

    $conn = conexionBD();

    $idActualizar = $_GET["id"];

    //Obtener detalles del producto a actualizar
    $proveedorActualizar = "SELECT * FROM proveedor WHERE id_proveedor='$idActualizar'";
    $resultadosProveedorActualizar = mysqli_query($conn,$proveedorActualizar);
    $datosProveedorActualizar = mysqli_fetch_assoc($resultadosProveedorActualizar);

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $ruc = $_POST["ruc"];
        $telefono = $_POST["telefono"];
        $email = $_POST["email"];
        $direccion_domicilio = $_POST["direccion_domicilio"];

        $queryActualizar = "UPDATE proveedor SET nombre='$nombre', apellido='$apellido', ruc='$ruc', telefono='$telefono', email='$email', direccion_domicilio='$direccion_domicilio' WHERE id_proveedor='$idActualizar'";
        $resultadosActualizarProveedor = mysqli_query($conn,$queryActualizar);
        if($resultadosActualizarProveedor){
            header("Location: ./listarproveedores.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Proveedor</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/actualizarproveedor.css">
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
            <img src="../img/proveedores.jpg" alt="Nuevo proveedor">
        </div>
        <div class="contenedor-derecha">
            <h2>ACTUALIZAR UN PROVEEDOR</h2>
            <form method="POST" class="formulario">
                <div class="bloque1-formulario">
                    <div class="contenedor-campos">
                        <label for="nombre">NOMBRE:</label>
                        <input type="text" name="nombre" placeholder="Ingrese el nombre" required value="<?php echo $datosProveedorActualizar['nombre']?>">
                    </div>
                    <div class="contenedor-campos">
                        <label for="apellido">APELLIDO:</label>
                        <input type="text" name="apellido" placeholder="Ingrese el apellido" required value="<?php echo $datosProveedorActualizar['apellido']?>">
                    </div>
                    <div class="contenedor-campos">
                        <label for="ruc">RUC:</label>
                        <input type="text" name="ruc" placeholder="Ingrese el ruc" maxlength="11" required value="<?php echo $datosProveedorActualizar['ruc']?>">
                    </div>
                    <div class="contenedor-campos">
                        <label for="telefono">TELEFONO:</label>
                        <input type="tel" name="telefono" placeholder="Ingrese el telefono" maxlength="9" required value="<?php echo $datosProveedorActualizar['telefono']?>">
                    </div>
                    <div class="contenedor-campos">
                        <label for="email">EMAIL:</label>
                        <input type="email" name="email" placeholder="Ingrese el email" required value="<?php echo $datosProveedorActualizar['email']?>">
                    </div>
                    <div class="contenedor-campos">
                        <label for="direccion">DIRECCION:</label>
                        <input type="text" name="direccion_domicilio" placeholder="Ingrese la direccion" required value="<?php echo $datosProveedorActualizar['direccion_domicilio']?>">
                    </div>

                    <input type="submit" value="ACTUALIZAR PROVEEDOR">
                </div>

                <div class="bloque2-formulario">
                    <label>FOTO:</label>
                    <img src="../img/proveedores.jpg" alt="Foto de proveedor">
                </div>
            </form>
        </div>
    </main>
</body>
</html>