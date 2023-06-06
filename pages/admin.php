<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <header class="header">
        <i class="letra-azul">Tienda Mass</i>
    </header>

    <main class="main">
        <div class="contenedor">
            <div class="contenedor-seccion">
                <h2>PRODUCTOS</h2>
                <img src="../img/productos.jpg" alt="Metáfora de productos">
                <div class="botones">
                    <a href="./nuevoproducto.php">AGREGAR</a>
                    <a href="./listarproductos.php">MOSTRAR</a>
                </div>
            </div>
            <div class="contenedor-seccion">
                <h2>CLIENTES</h2>
                <img src="../img/clientes.jpg" alt="Metáfora de clientes">
                <div class="botones">
                    <a href="./listarclientes.php">MOSTRAR</a>
                </div>
            </div>
            <div class="contenedor-seccion">
                <h2>PROVEEDORES</h2>
                <img src="../img/proveedores.jpg" alt="Metáfora de proveedores">
                <div class="botones">
                    <a href="./nuevoproveedor.php">AGREGAR</a>
                    <a href="./listarproveedores.php">MOSTRAR</a>
                </div>
            </div>
        </div>
        <div class="contenedor">
            <div class="contenedor-seccion">
                <h2>CATEGORÍAS</h2>
                <img src="../img/categorias.png" alt="Metáfora de categorías">
                <div class="botones">
                    <a href="./nuevacategoria.php">AGREGAR</a>
                    <a href="./listarcategorias.php">MOSTRAR</a>
                </div>
            </div>
            <div class="contenedor-seccion">
                <h2>REPORTE DE VENTAS</h2>
                <img src="../img/ventas.jpg" alt="Metáfora de reporte de ventas">
                <div class="botones">
                    <a href="./listarventas.php">MOSTRAR</a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>