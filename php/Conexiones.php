<?php
$conn = new mysqli("localhost","root","","bdproductos");

            if($conn->connect_error){
                die("Conexion Fallida: ".$conn->connect_error);
            }
?>