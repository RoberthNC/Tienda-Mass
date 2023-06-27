
<?php
    session_start();
    require "../config/conexion.php";
    require "../config/debuguear.php";

    $conn = conexionBD();

    $idClienteEliminar = $_POST["id"];

    $queryEliminarCliente = "DELETE FROM cliente WHERE id_cliente='$idClienteEliminar'";
    // $queryEliminarUsuario = "DELETE FROM usuario WHERE id_cliente='$idClienteEliminar'";
    $resultadoEliminarCliente = mysqli_query($conn, $queryEliminarCliente);
    // $resultadoEliminarUsuario = mysqli_query($conn, $queryEliminarUsuario);

?>