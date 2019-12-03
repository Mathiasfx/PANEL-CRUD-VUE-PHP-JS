<?php


            
            $conn = new mysqli("localhost","root","","bdpersona");

            if($conn->connect_error){
                die("Conexion Fallida: ".$conn->connect_error);
            }


            $nombre = $_POST['nombre'];

            $sql = "INSERT INTO `categoria`(`CategoriaID`) VALUES ('$nombre')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=listar.php'>";

                } else {
            echo $sql;
            echo "Error: " . $sql . "<br>" . $conn->error;
            echo "<script language='javascript'> alert('No Tiene Permisos'); </script>";
            }







    ?>