<?php

    require "../config/conexion.php";
    require "../config/debuguear.php";

    $conn = conexionBD();

    $idActualizar = $_GET["id"];

    //Obtener los detalles de la categoría a actualizar
    $categoriaActualizar = "SELECT * FROM categoria WHERE id_categoria='$idActualizar'";
    $resultadosCategoriaActualizar = mysqli_query($conn, $categoriaActualizar);
    $datosCategoriaActualizar = mysqli_fetch_assoc($resultadosCategoriaActualizar);

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $nombre = $_POST["nombre"];
        $queryActualizar = "UPDATE categoria SET nombre='$nombre' WHERE id_categoria='$idActualizar'";
        $resultadosActualizarCategoria = mysqli_query($conn,$queryActualizar);
        if($resultadosActualizarCategoria){
            header("Location: ./listarcategorias.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Categoría</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/actualizarcategoria.css">
</head>
<body>
    <header class="header">
        <i class="letra-azul">Tienda Mass</i>
    </header>
    <main class="main">
        <div class="contenedor-izquierda">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="68" height="68" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M5 12l14 0" />
                <path d="M5 12l6 6" />
                <path d="M5 12l6 -6" />
            </svg>
            <img src="../img/categorias.png" alt="Nueva categoria">
        </div>
        <div class="contenedor-derecha">
            <h2>ACTUALIZAR UNA CATEGORIA</h2>
            <form class="formulario" method="POST">
                <div class="bloque1-formulario">
                    <div class="contenedor-campos">
                        <label for="nombre">NOMBRE:</label>
                        <input type="text" name="nombre" placeholder="Ingrese el nombre" required value="<?php echo $datosCategoriaActualizar['nombre']?>">
                    </div>

                    <input type="submit" value="ACTUALIZAR CATEGORIA">
                </div>

                <div class="bloque2-formulario">
                    <label>FOTO:</label>
                    <img src="../img/categorias.png" alt="Foto de categoria">
                    <input type="file">
                </div>
            </form>
        </div>
    </main>
</body>
</html>