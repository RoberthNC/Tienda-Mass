<?php 

    session_start();

    $idEliminar = $_POST["idEliminarProductoCarrito"];
    $arregloIds = $_SESSION["arregloIdProductos"];
    
    $idx = array_search($idEliminar, $arregloIds);

    if($idx !== false){
        unset($arregloIds[$idx]);
    }

    $_SESSION["arregloIdProductos"] = $arregloIds;

?>