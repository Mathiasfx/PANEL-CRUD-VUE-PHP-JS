<?php

session_start();
if(isset($_SESSION['nombreusu']))
{
	$id = $_GET['id'];
	
	$conn = new mysqli("localhost","root","","bdpersona");

            if($conn->connect_error){
                die("Conexion Fallida: ".$conn->connect_error);
            }
            $sql ="DELETE FROM productos WHERE idProductos='$id'";

			}

			if ($conn->query($sql) === TRUE) {
                echo "eliminado";
				echo"<META HTTP-EQUIV='Refresh' CONTENT='0; URL=listar.php'>";

                } else {
            echo $sql;
            echo "Error: " . $sql . "<br>" . $conn->error;
            echo "<script language='javascript'> alert('No Tiene Permisos'); </script>";
            }












?>