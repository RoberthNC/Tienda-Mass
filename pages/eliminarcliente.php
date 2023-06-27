
<?php
    session_start();
    require "../config/conexion.php";
    require "../config/debuguear.php";

    $conn = conexionBD();

    $idClienteEliminar = $_POST["id"];

    $queryEliminarUsuario = "DELETE FROM usuario WHERE id_cliente='$idClienteEliminar'";
    $resultadoEliminarUsuario = mysqli_query($conn, $queryEliminarUsuario);
    
    $queryEliminarCliente = "DELETE FROM cliente WHERE id_cliente='$idClienteEliminar'";
    $resultadoEliminarCliente = mysqli_query($conn, $queryEliminarCliente);

?>