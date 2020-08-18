<?php
$conn = new mysqli("localhost","laclase_mathias","Formosa1480","laclase_b2evolu");

if($conn->connect_error){
    die("Conexion Fallida: ".$conn->connect_error);
}
?>