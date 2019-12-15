<?php

session_start();
include_once 'Conexiones.php';
	
    
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





