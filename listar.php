<?php
session_start();
if (isset($_SESSION['nombreusu'])) {
	?>
	<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>:: PANEL DE PRECIOS ::</title>
		<!-- Boobstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<!-- FONT ASOWNAME -->
		<script src="https://kit.fontawesome.com/8fee61ecf5.js" crossorigin="anonymous"></script>
		

	</head>

	<body>
		


		<div id="app">
				<div class="container-fluid">
					<div class="row bg-dark">
						<div class="col-lg-12">
							<p class="text-center text-light display-4 pt-2" style="font-size:20px;">PANEL DE PRODUCTOS </p>
						</div>		
					</div>		
				</div>
		

				<div class="container">
					<div class="row mt-3">
						<div class="col-lg-6">				
							<div class="input-group mb-3">
								<input type="text" class="form-control" placeholder="Buscar Producto" aria-label="Buscar Producto" aria-describedby="button-addon2">
									<div class="input-group-append">
										<button class="btn btn-outline-secondary" type="button" id="button-addon2">Buscar</button>
									</div>
							</div>
						</div>
						<div class="col-lg-6">
							<a href="cerrars.php"><button class="btn btn-danger float-right">Salir</button></a>
							<button class="btn btn-info float-right mr-3"><i class="fas fa-box"></i>&nbsp;&nbsp;Nuevo Producto</button>
							<button class="btn btn-info float-right mr-2"><i class="fas fa-box-open"></i>&nbsp;&nbsp;Nueva Categoria</button>
						</div>			
					</div>	
					<hr class="bg-info">
						<div class="alert alert-danger" v-if="errorMsg">
						Error				
						</div>
						<div class="alert alert-success" v-if="successMsg">
						Succes			
						</div>
						<div class="row">
							<div class="col-lg-12">
							<table class="table table-bordered table-striped">
								<thead>
									<tr class="text-center bg-info text-light">
										<th>ID</th>
										<th>Nombre</th>
										<th>Imagen</th>
										<th>Categoria</th>
										<th>Prefijo</th>
										<th>Precio</th>
										<th>Editar</th>										
										<th>Eliminar</th>	
									</tr>								
								</thead>	
								<tbody>
									<tr class="text-center">
										<td>1</td>
										<td>Pizarra Digital TOMI</td>
										<td>TOMI.jpg</td>
										<td>Pizarras Digitales</td>
										<td>USD</td>
										<td>500</td>
										<td><a class="text-success" href="#"><i class="fas fa-pen-square"></i></a></td>
										<td><a class="text-danger" href="#"><i class="fas fa-trash-alt"></i></a></td>
									</tr>
								
								</tbody>							
							</table>							
							</div>							
						</div>
				</div>

		</div>

		



			
					

				
			

		
		<!-- VUE -->
		<script src="https://cdn.jsdelivr.net/npm/vue"></script>
		<!-- METODOS JS VUE -->
		<script type="text/javascript" src="js/metodos.js"></script>
	</body>

	</html>

<?php
} else {
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">
<?php
}
?>