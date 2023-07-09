<?php

    require "../config/conexion.php";
    require "../config/debuguear.php";

    $conn = conexionBD();

    $queryPedidos = "SELECT * FROM pedido";
    $resultadosPedidos = mysqli_query($conn,$queryPedidos);

    $band = false;

    if($_SERVER["REQUEST_METHOD"]==="POST"){
        $band = true;
        $filtro = $_POST["fecha"];
        $queryFiltrado = "SELECT * FROM pedido WHERE fecha_compra='$filtro'";
        $resultadosFiltrado = mysqli_query($conn,$queryFiltrado);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Ventas</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/listarclientes.css">
    <script src="../js/cliente.js"></script>
</head>
<body>
    <?php
        include "./modaleliminarcliente.php";
    ?>
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
            <img src="../img/ventas.jpg" alt="Reporte">
        </div>
        <div class="contenedor-derecha">
            <h2>REPORTE DE VENTAS</h2>
            <form method="POST" class="formulario">
                <h3>Buscar</h3>
                <input type="date" name="fecha" style="padding: 5px; border-radius: 5px; border:1px solid black;">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                        <path d="M21 21l-6 -6" />
                    </svg>
                </button>
            </form>
            <div class="contenedor-tabla">
                <table>
                    <thead>
                        <th>Id</th>
                        <th>Cliente</th>
                        <th>Monto</th>
                        <th>Fecha de Compra</th>
                        <th>Tipo de Entrega</th>
                        <th>Tipo de Pago</th>
                    </thead>
                    <tbody>
                        <?php
                            if($band === false){
                                while($row=mysqli_fetch_assoc($resultadosPedidos)){
                                    $idCliente = $row["id_cliente"];
                                    $dataCliente = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM cliente WHERE id_cliente='$idCliente'"));
                                    $idTipoEntrega = $row["id_tipo_entrega"];
                                    $dataTipoEntrega = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM tipo_entrega WHERE id_tipo_entrega='$idTipoEntrega'"));
                                    $idFormaPago = $row["id_forma_pago"];
                                    $dataTipoPago = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM forma_pago WHERE id_forma_pago='$idFormaPago'"));
                        ?>
                            <tr>
                                <td><?php echo $row["id_pedido"];?></td>
                                <td><?php echo $dataCliente["nombre"];?></td>
                                <td><?php echo $row["monto"];?></td>
                                <td><?php echo $row["fecha_compra"];?></td>
                                <td><?php echo $dataTipoEntrega["descripcion_tipoEntrega"];?></td>
                                <td><?php echo $dataTipoPago["descripcion_formaPago"];?></td>
                            </tr>
                        <?php
                                }
                            }
                            else if($band === true){
                                while($row2=mysqli_fetch_assoc($resultadosFiltrado)){
                                    $idCliente2 = $row2["id_cliente"];
                                    $dataCliente2 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM cliente WHERE id_cliente='$idCliente2'"));
                                    $idTipoEntrega2 = $row2["id_tipo_entrega"];
                                    $dataTipoEntrega2 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM tipo_entrega WHERE id_tipo_entrega='$idTipoEntrega2'"));
                                    $idFormaPago2 = $row2["id_forma_pago"];
                                    $dataTipoPago2 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM forma_pago WHERE id_forma_pago='$idFormaPago2'"));
                        ?>
                            <tr>
                                <td><?php echo $row2["id_pedido"];?></td>
                                <td><?php echo $dataCliente2["nombre"];?></td>
                                <td><?php echo $row2["monto"];?></td>
                                <td><?php echo $row2["fecha_compra"];?></td>
                                <td><?php echo $dataTipoEntrega2["descripcion_tipoEntrega"];?></td>
                                <td><?php echo $dataTipoPago2["descripcion_formaPago"];?></td>
                            </tr>
                        <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>