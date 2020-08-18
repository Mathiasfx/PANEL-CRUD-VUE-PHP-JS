<?php
header('Access-Control-Allow-Origin: *');
//  include('../php/Conexiones.php');

$conn = new mysqli("localhost","laclase_mathias","Formosa1480","laclase_b2evolu");

            if($conn->connect_error){
                die("Conexion Fallida: ".$conn->connect_error);
            }


 $result = array('error'=>false);
 $action = '';

 if(isset($_GET['action'])){
     $action = $_GET['action'];
 }

 if($action == 'read'){
     $sql = $conn->query("SELECT * FROM `productos` ORDER BY Posicion ASC"); //DESC ASC
     $productos = array();
     while($row = $sql->fetch_assoc()){
         array_push($productos,$row);
     }
 }
 $result['productos'] = $productos;

 $conn->close();
 echo json_encode($result);



 ?>