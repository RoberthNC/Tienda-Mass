    <?php

        require "../config/conexion.php";
        require "../config/debuguear.php";

        $conn = conexionBD();

        $idCategoriaEliminar = $_POST["idCategoriaEliminar"];

        $queryEliminarCategoria = "DELETE FROM categoria WHERE id_categoria='$idCategoriaEliminar'";
        $resultadoEliminarCategoria = mysqli_query($conn, $queryEliminarCategoria);

    ?>