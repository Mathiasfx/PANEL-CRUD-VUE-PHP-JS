<?php

session_start();

	$conn = new mysqli("localhost","laclase_mathias","Formosa1480","laclase_b2evolu");
    //$conn = new mysqli("localhost","root","","bdpersona");

            if($conn->connect_error){
                die("Conexion Fallida: ".$conn->connect_error);
            }

	$id = $_GET['id'];
	$nombre = $_GET['nombre'];
	$categoria =$_GET['categoria'];
	$prefijo =  $_GET['prefijo'];
    $precio =  $_GET['precio'];

	$sql = "UPDATE productos SET NombreProducto='$nombre', CategoriaID='$categoria', Prefijo='$prefijo', Precio='$precio' WHERE idProductos='$id'";

     if ($conn->query($sql) === TRUE) {
                echo "<SCRIPT LANGUAGE='javascript'>alert('Producto Actualizado');</SCRIPT>";
               echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=listar.php'>";

                } else {
            echo $sql;
            echo "Error: " . $sql . "<br>" . $conn->error;
            echo "<script language='javascript'> alert('No Tiene Permisos'); </script>";
            }

    ?>





