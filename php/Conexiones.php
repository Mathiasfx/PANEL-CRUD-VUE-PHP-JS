<?php
$conn = new mysqli("localhost","root","","");

if($conn->connect_error){
    die("Conexion Fallida: ".$conn->connect_error);
}
?>