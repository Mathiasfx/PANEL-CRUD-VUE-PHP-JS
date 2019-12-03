<?php
	session_start();
	if(isset($_SESSION['nombreusu']))
	{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>:: PANEL DE PRECIOS ::</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">
	<script src="js/metodos.js"></script>
    <script language="javascript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

</head>
<body>
	<header>
		<nav class="navbar navbar-default navbar-static-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
						<span class="sr-only">Desplegar / Ocultar Menu</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="#" class="navbar-brand">Lista de Productos</a>
				</div>
				<div class="collapse navbar-collapse" id="navegacion-fm">
					<ul class="nav navbar-nav">
						<li><a href="http://www.laclasedigital.com.ar"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
						<li><a href="cerrars.php"><span class="glyphicon glyphicon-remove"></span>Salir</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php
							echo "<li><a href='#'><span class='glyphicon glyphicon-user'></span> ".$_SESSION['nombreusu']."</a></li>";
						?>
				    </ul>
				</div>
			</div>
		</nav>
	</header>


	<div class="container">

<div class="row">
  <form class="form-inline">
       <input class="form-control" type="text" placeholder="Buscar Producto"><button class="btn btn-secondary" type="button">Buscar</button>
  </form>
  <br>
  </div>



		<div class="row">


			<a class="btn btn-success" data-toggle="modal" data-target="#nuevoUsu">Nuevo Producto</a><span>   </span><a class="btn btn-default" data-toggle="modal" data-target="#nuevaCat">Nueva Categoria</a><br><br>






			<table class='table'>
				<tr>
					<th>Id</th><th>Nombre</th><th>Categoria</th><th>$</th><th>Precio</th><th><span class="glyphicon glyphicon-wrench"></span></th>
				</tr>
<?php
			
      $mysqli = new mysqli("localhost","root","","bdproductos");
			if ($mysqli->connect_errno) {
			    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			    exit();
			}
            $datosCategoria = "SELECT * FROM `categoria`";
            $result = mysqli_query($mysqli,$datosCategoria);
            $result2 = mysqli_query($mysqli,$datosCategoria);

            $consulta= "SELECT * FROM productos";

			if ($resultado = $mysqli->query($consulta))
			{
				while ($fila = $resultado->fetch_row())
				{
					echo "<tr>";
					echo "<td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td>$fila[4]</td>";
					echo"<td>";
				    echo "<a data-toggle='modal' data-target='#edit' data-id='" .$fila[0] ."' data-nombre='" .$fila[1] ."' data-categoria='" .$fila[2] ."' data-prefijo='" .$fila[3] ."'data-precio='" .$fila[4] ."' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span>Editar</a> ";
					// echo "<a class='btn btn-danger' href='elimina.php?id=".$fila[0]."' method='GET'><span class='glyphicon glyphicon-remove'></span>  Eliminar</a>";
					echo "</td>";
					echo "</tr>";
				}


				$resultado->close();
			}
			$mysqli->close();



?>

	        </table>



</div>

		<div class="modal" id="nuevoUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Nuevo Producto</h4>
                    </div>
                    <div class="modal-body">
                       <form action="insertar.php" method="POST">
                       		<div class="form-group">
                       			<label for="nombre">Nombre Producto:</label>
                       			<input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre Producto"></input>
                       		</div>
                       		<div class="form-group">
                                <select name="categoria" id="categoria">
                       			  <label for="categoria">Categoria:</label>

                                        <?php while ($row = mysqli_fetch_array($result)):; ?>

                                        <option value="<?php echo $row[1];?>"><?php echo $row[1];?></option>

                                    <?php endwhile;?>
                                </select>
                       		</div>

                       		<div class="form-group">
                       			<label for="direccion">Prefijo:</label>
                       			<input class="form-control" id="prefijo" name="prefijo" type="text" placeholder="Prefijo $ USD EURO "></input>
                       		</div>

                            <div class="form-group">
                                <label for="direccion">Precio:</label>
                                <input class="form-control" id="precio" name="precio" type="text" placeholder="Precio "></input>
                            </div>

							<input type="submit" class="btn btn-success" value="Guardar">
                       </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="edit" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Editar Producto</h4>
                    </div>
                    <div class="modal-body">
                       <form action="actualiza.php" method="GET">

                       		        <input  id="id" name="id" type="hidden" ></input>
		                       		<div class="form-group">
		                       			<label for="nombre">Nombre:</label>
		                       			<input class="form-control" id="nombre" name="nombre" type="text" ></input>
		                       		</div>
                                     <div class="form-group">
                                        <select name="categoria" id="categoria">
                                        <label for="categoria">Categoria:</label>

                                        <?php while ($row = mysqli_fetch_array($result2)):; ?>

                                        <option value="<?php echo $row[1];?>"><?php echo $row[1];?></option>

                                         <?php endwhile;?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="prefijo">Prefijo:</label>
                                        <input class="form-control" id="prefijo" name="prefijo" type="text" placeholder="Prefijo $ USD EURO "></input>
                                    </div>

                                    <div class="form-group">
                                        <label for="precio">Precio:</label>
                                        <input class="form-control" id="precio" name="precio" type="text" placeholder="Precio "></input>
                                    </div>



									<input type="submit" class="btn btn-success">
                       </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="nuevaCat" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Nueva Categoria</h4>
                    </div>
                    <div class="modal-body">
                       <form action="insertarCategoria.php" method="POST">
                            <div class="form-group">
                                <label for="nombre">Nombre Categoria:</label>
                                <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre Categoria"></input>
                            </div>

                            <input type="submit" class="btn btn-success" value="Guardar">
                       </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>



	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		  $('#edit').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient0 = button.data('id')
		  var recipient1 = button.data('nombre')
		  var recipient2 = button.data('categoria')
		  var recipient3 = button.data('prefijo')
          var recipient4 = button.data('precio')
		   // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

		  var modal = $(this)
		  modal.find('.modal-body #id').val(recipient0)
		  modal.find('.modal-body #nombre').val(recipient1)
		  modal.find('.modal-body #categoria').val(recipient2)
		  modal.find('.modal-body #prefijo').val(recipient3)
          modal.find('.modal-body #precio').val(recipient4)
		});

	</script>

</body>
</html>

<?php
	}
	else
	{
		?>
		 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">
		 <?php
	}
?>