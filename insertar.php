	<?php


			
            $conn = new mysqli("localhost","root","","bdproductos");

            if($conn->connect_error){
                die("Conexion Fallida: ".$conn->connect_error);
            }


            $nombre = $_POST['nombre'];
			$categoria = $_POST['categoria'];
			$prefijo = $_POST['prefijo'];
            $precio = $_POST['precio'];
			$sql = "INSERT INTO `productos`(`NombreProducto`, `CategoriaID`, `Prefijo`, `Precio`) VALUES ('$nombre','$categoria','$prefijo','$precio')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=listar.php'>";

                } else {
            echo $sql;
            echo "Error: " . $sql . "<br>" . $conn->error;
            echo "<script language='javascript'> alert('No Tiene Permisos'); </script>";
            }







	?>


