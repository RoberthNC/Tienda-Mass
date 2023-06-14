<?php

    require "../config/conexion.php";
    require "../config/debuguear.php";

    $conn = conexionBD();

    $idProductoEliminar = $_POST["idProductoEliminar"];

    $queryEliminarProducto = "DELETE FROM producto WHERE id_producto='$idProductoEliminar'";
    $resultados = mysqli_query($conn, $queryEliminarProducto);

?>