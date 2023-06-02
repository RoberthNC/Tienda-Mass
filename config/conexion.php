<?php
    function conexionBD(){
        $conn = mysqli_connect("localhost","root","","tiendamass");

        return $conn;
    }
?>