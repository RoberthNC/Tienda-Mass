    <?php

        require "../config/conexion.php";
        require "../config/debuguear.php";

        $conn = conexionBD();

        $idProveedorEliminar = $_POST["idProveedorEliminar"];

        $queryEliminarProveedor = "DELETE FROM proveedor WHERE id_proveedor='$idProveedorEliminar'";
        $resultadoEliminarProveedor = mysqli_query($conn, $queryEliminarProveedor);

    ?>