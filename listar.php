<?php
header('Acces-Control-Allow-Origin:*');
//Session Activa
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
		<!-- Estilos Propios -->
		<link rel="stylesheet" href="css/estilos.css">
	</head>
	<body>
		<!-- Div App JS -->
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
					<!-- Buscador - Falta Configurar -->
					<div class="col-lg-6">
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Buscar Producto" aria-label="Buscar Producto" aria-describedby="button-addon2">
						</div>
					</div>
					<!-- Buscador - Falta Configurar -->
					<!-- Botones de Salir - Agregar Producto y Categoria VUE-->
					<div class="col-lg-6">
						<a href="index.php"><button class="btn btn-danger float-right">Salir</button></a>
						<button class="btn btn-info float-right mr-3" @click="MostrarAgregarProducto=true"><i class="fas fa-box"></i>&nbsp;&nbsp;Nuevo Producto</button>
						<button class="btn btn-info float-right mr-2" @click="AgregarCategoria=true"><i class="fas fa-box-open"></i>&nbsp;&nbsp;Nueva Categoria</button>
					</div>
					<!-- Botones de Salir - Agregar Producto y Categoria VUE-->
				</div>
				<!-- Mensajes de Procesos-->
				<hr class="bg-info">
				<div class="alert alert-danger" v-if="errorMsg">
					{{errorMsg}}
				</div>
				<div class="alert alert-success" v-if="successMsg">
					{{successMsg}}
				</div>
				<!-- Mensajes de Procesos-->
				<!-- Tabla de Procutos-->
				<div class="row">
					<div class="col-lg-12">
						<table class="table table-bordered table-striped">
							<thead>
								<!-- Titulos-->
								<tr class="text-center bg-info text-light">
									<th>Pos</th>
									<th>Nombre</th>
									<th>Descripcion</th>
									<th>Imagen</th>
									<th>Link</th>
									<th>Categoria</th>
									<th>Prefijo</th>
									<th>Precio</th>
									<th>Editar</th>
									<th>Eliminar</th>
								</tr>
								<!-- Titulos-->
							</thead>
							<tbody>
								<!-- Contenido-->
								<tr class="text-center" v-for="producto in productos">
									<td>{{producto.Posicion}}</td>
									<td>{{producto.NombreProducto}}</td>
									<td class="text-left" v-if="producto.Descripcion.length < 30">{{producto.Descripcion}}</td>
									<td class="text-left" v-else>{{producto.Descripcion.substring(0,30)+".."}}</td>
									<!-- <td>{{producto.Imagen}}</td> -->
									<td><img :src="'productImages/'+producto.Imagen" width="50" height="50"></td>
									<td>{{producto.Link.substring(0,5)+".."}}</td>
									<td>{{producto.CategoriaID}}</td>
									<td>{{producto.Prefijo}}</td>
									<td>{{producto.Precio}}</td>

									<td><a class="text-success" href="#"><i class="fas fa-pen-square" @click="EditarProducto=true; SelectProduct(producto);"></i></a></td>
									<td><a class="text-danger" href="#"><i class="fas fa-trash-alt" @click="EliminarProducto=true;  SelectProduct(producto);"></i></a></td>
								</tr>
								<!-- Contenido-->
						</table>
					</div>
				</div>
			</div>
			<!-- Tabla de Procutos-->

			<!-- MODAL AGREGAR NUEVO PRODUCTO -->
			<div id="overlay" v-if="MostrarAgregarProducto">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Agregar Nuevo Producto</h5>
							<button type="button" class="close" @click="MostrarAgregarProducto=false">
								<span aria-hiden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body p-4">
							<form action="#" method="post">
								<!-- Input Posicion-->
								<div class="form-group">
									<input type="text" name="Posicion" class="form-control form-control-lg" placeholder="Posicion" v-model="NuevoProducto.Posicion">
								</div>
								<!-- Input Nombre-->
								<div class="form-group">
									<input type="text" name="Nombre" class="form-control form-control-lg" placeholder="Nombre Producto" v-model="NuevoProducto.Nombre">
								</div>
								<!-- Input Descripcion-->
								<div class="form-group">
									<textarea type="text" id="Descripcion" name="Descripcion" class="form-control form-control-lg" placeholder="Descripcion del producto" v-model="NuevoProducto.Descripcion"></textarea>
								</div>
								<!-- Input Imagen-->
								<div class="form-group">
									<label for="imagen">Seleccionar Imagen</label>
									<img v-if="eurl" :src="eurl" width="40"><br>
									<input type="file" class="form-control-file" name="eImagen" ref="eImagen" id="eImagen" @change="everImagen()">
								</div>
								<!-- Input Link-->
								<div class="form-group">			
									<input type="text" id="Link" class="form-control form-control-lg" placeholder="Link Video o Descripcion" v-model="NuevoProducto.Link">
								</div>
								<!-- Select Categoria-->
								<div class="form-group">
										<select class="form-control" id="CategoriaID" v-model="NuevoProducto.CategoriaID">
										<option v-for="categoria in categorias" :value="categoria.CategoriaID">{{ categoria.CategoriaID }}</option>
									</select>
								</div>
								<!-- Select Prefijo-->
								<div class="form-group">
										<select class="form-control" name="Prefijo" id="Prefijo" v-model="NuevoProducto.Prefijo">
										<option value="USD">USD</option>
										<option value="$">$</option>
									</select>
								</div>
								<!-- Input Precio-->
								<div class="form-group">
									<input type="text" name="Precio" id="Precio" class="form-control form-control-lg" placeholder="Precio " v-model="NuevoProducto.Precio">
								</div>
								<!-- Boton Submit-->
								<div class="form-group">
									<button class="btn btn-info btn-block btn-lg" @click="MostrarAgregarProducto=false; AddProducto();clearMsg();">Agregar Producto</button>
								</div>
								<!-- Boton Submit-->
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- MODAL AGREGAR NUEVO PRODUCTO -->

			<!-- MODAL AGREGAR CATEGORIA -->
			<div id="overlay" v-if="AgregarCategoria">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Agregar Nuevo Categoria</h5>
							<button type="button" class="close" @click="AgregarCategoria=false">
								<span aria-hiden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body p-4">
							<form action="#" method="post">
								<!-- Input Nombre Categoria-->
								<div class="form-group">
									<input type="text" name="NombreCategoria" class="form-control form-control-lg" placeholder="Nombre Categoria" v-model="NuevaCategoria.NombreCategoria">
								</div>
								<!-- Boton Submit-->
								<div class="form-group">
									<button class="btn btn-info btn-block btn-lg" @click="AgregarCategoria=false; AddCategoria();clearMsg();">Agregar Categoria</button>
								</div>
								<!-- Boton Submit-->
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- MODAL AGREGAR CATEGORIA -->
			<!-- MODAL EDITAR PRODUCTO -->
			<div id="overlay" v-if="EditarProducto">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Editar Producto</h5>
							<button type="button" class="close" @click="EditarProducto=false">
								<span aria-hiden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body p-4">
							<form action="#" method="post">
							<!-- Input Producto-->
							<div class="form-group">
									<input type="text" name="PosicionProducto" class="form-control form-control-lg" placeholder="Posicion" v-model="currentProducto.Posicion">
								</div>
								<!-- Input Nombre Producto-->
								<div class="form-group">
									<input type="text" name="NombreProducto" class="form-control form-control-lg" v-model="currentProducto.NombreProducto">
								</div>
								<!-- Input Descripcion-->
								<div class="form-group">
									<textarea type="text" name="Descripcion" id="Descripcion" class="form-control form-control-lg" v-model="currentProducto.Descripcion"> </textarea>
								</div>
								<!-- Input IMAGEN-->
								<div class="form-group">
									<label for="eImagen">Cambiar Imagen</label>
									<div v-if="eurl">
										<img :src="eurl" width="12%"><br>
									</div>
									<!-- Previsualizacion de Imagen-->
									<div v-else="eurl">
										<img :src="'productImages/'+currentProducto.Imagen" width="12%"><br>
									</div>
									<!-- Input File-->
									<input type="hidden" id="idProductos" name="idProductos" v-model="currentProducto.idProductos">
									<input type="file" class="form-control-file" name="eImagen" ref="eImagen" id="eImagen" @change="everImagen()">
								</div>
								<!-- Input Link-->
								<div class="form-group">
									<label for="Link">Editar Link</label>
									<input type="text" id="Link" class="form-control form-control-lg" placeholder="Link Video o Descripcion" v-model="currentProducto.Link">
								</div>
								<!-- Select Categoria-->
								<div class="form-group">
									<label for="exampleFormControlSelect1">Categoria</label>
									<select class="form-control" id="Categoria" v-model="currentProducto.CategoriaID">
										<option>{{currentProducto.CategoriaID}}</option>
										<option v-for="categoria in categorias" :value="categoria.CategoriaID">{{ categoria.CategoriaID }}</option>
									</select>
								</div>
								<!-- Input Prefijo-->
								<div class="form-group">
									<label for="exampleFormControlSelect1">Prefijo</label>
									<select class="form-control" name="Prefijo" id="Prefijo" v-model="currentProducto.Prefijo">
										<option>{{currentProducto.Prefijo}}</option>
										<option value="USD">USD</option>
										<option value="$">$</option>
									</select>
								<!-- Input Precio-->
								</div>
								<div class="form-group">
									<input type="text" name="Precio" class="form-control form-control-lg" v-model="currentProducto.Precio">
								</div>
								<!-- Boton Submit-->
								<div class="form-group">
									<button class="btn btn-info btn-block btn-lg" @click="EditarProducto=false;  updateProducto();clearMsg();">EDITAR</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- MODAL EDITAR PRODUCTO -->

			<!-- MODAL ELIMINAR PRODUCTO -->
			<div id="overlay" v-if="EliminarProducto">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Eliminar Producto</h5>
							<button type="button" class="close" @click="EliminarProducto=false">
								<span aria-hiden="true">&times;</span>
							</button>
						</div>
						<!-- Mensaje antes de eliminar-->
						<div class="modal-body p-4">
							<h4 class="text-danger">Esta seguro de Eliminar el producto?</h4>
							<h5>Esta eliminando {{currentProducto.NombreProducto}}</h5>
							<hr>
							<button class="btn btn-danger btn-lg" @click="EliminarProducto=false; DeleteProducto();clearMsg();">SI </button>
							&nbsp;&nbsp;&nbsp;
							<button class="btn btn-success btn-lg" @click="EliminarProducto=false">NO </button>
						</div>
					</div>
				</div>
			</div>
			<!-- MODAL ELIMINAR PRODUCTO -->
		</div>

		<!--AXIOS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.1/axios.min.js"></script>
		<!-- VUE -->
		<script src="https://cdn.jsdelivr.net/npm/vue"></script>

		<!-- METODOS JS VUE -->
		<script>
			var app = new Vue({
				el: '#app',
				data: {
					errorMsg: "",
					successMsg: "",
					MostrarAgregarProducto: false,
					EditarProducto: false,
					EliminarProducto: false,
					AgregarCategoria: false,
					SelectedFile: null,
					url: 'q',
					eurl: null,
					productos: [],
					categorias: [],
					NuevoProducto: {
						Posicion: "",
						Nombre: "",
						Descripcion: "",
						Imagen: "",
						Link: "",
						CategoriaID: "",
						Prefijo: "",
						Precio: ""
					},
					NuevaCategoria: {
						NombreCategoria: ""
					},
					currentProducto: {}
				},
				mounted: function() {
					this.getAllProducts();
					this.getAllCategorias();
				},
				methods: {
					//Metodo de Obtener todos los productos
					getAllProducts() {
						axios.get("Procesar.php?action=leer").then(function(response) {
							if (response.data.error) {
								app.errorMsg = response.data.message;
							} else {
								app.productos = response.data.productos;
							}
						});
					},
					//Metodo de Obtener todas las Categorias
					getAllCategorias() {
						axios.get("Procesar.php?action=readCategory").then(function(response) {
							if (response.data.error) {
								app.errorMsg = response.data.message;
							} else {
								app.categorias = response.data.categorias;
							}
						});
					},
					//Metodo de Agregar Productos
					AddProducto() {
						var formData = app.toFormData(app.NuevoProducto);
						formData.append("eImagen", document.getElementById("eImagen").files[0])
						axios.post("Procesar.php?action=create", formData).then(function(response) {
							app.NuevoProducto = {
								Posicion:"",
								Nombre: "",
								Descripcion: "",
								Imagen: "",
								Link: "",
								Categoria: "",
								Prefijo: "",
								Precio: ""
							};
							if (response.data.error) {
								app.errorMsg = response.data.message;
							} else {
								app.successMsg = response.data.message;
								app.getAllProducts();
							}

						});
					},
					//Metodo de Agregar Categoria
					AddCategoria() {
						var formData = app.toFormData(app.NuevaCategoria);
						axios.post("Procesar.php?action=createCategoria", formData).then(function(response) {
							app.NuevaCategoria = {
								NombreCategoria: ""
							};
							if (response.data.error) {
								app.errorMsg = response.data.message;
							} else {
								app.successMsg = response.data.message;
								app.getAllCategorias();
							}

						});
					},
					//Metodo de Actualizar Producto
					updateProducto() {
						var formData = app.toFormData(app.currentProducto);
						formData.append("idProductos", document.getElementById("idProductos").value)
						formData.append("eImagen", document.getElementById("eImagen").files[0])
						axios.post("Procesar.php?action=update", formData).then(function(response) {
							app.currentProducto = {};
							if (response.data.error) {
								app.errorMsg = response.data.message;
							} else {
								app.successMsg = response.data.message;
								app.getAllProducts();
							}
						});
					},
					//Metodo de Eliminar Producto
					DeleteProducto() {
						var formData = app.toFormData(app.currentProducto);
						axios.post("Procesar.php?action=delete", formData).then(function(response) {
							app.currentProducto = {};
							if (response.data.error) {
								app.errorMsg = response.data.message;
							} else {
								app.successMsg = response.data.message;
								app.getAllProducts();
							}
						});
					},
					//Metodo de Insertar Imagen
					InsertarImagen() {
						var formdata = new FormData()
						formdata.append("Imagen", document.getElementById("Imagen").files[0])
						axios.post("Procesar.php?action=Insertar", formdata)
							.then(function(response) {
								app.successMsg = response.data.message;
								app.getAllProducts();
							});
					},
					//Metodo de Ver Imagen Actual
					verImagen: function() {
						var _this = this
						_this.file = _this.$refs.Imagen.files[0];
						_this.url = URL.createObjectURL(_this.file);
					},
					//Metodo de Ver Imagen
					everImagen: function() {
						var _this = this
						_this.file = _this.$refs.eImagen.files[0];
						_this.eurl = URL.createObjectURL(_this.file);
					},
					//Metodo Seleccionar Producto Actual
					SelectProduct(producto) {
						app.currentProducto = producto;

					},
					toFormData(obj) {
						var fd = new FormData();
						for (var i in obj) {
							fd.append(i, obj[i]);
						}
						return fd;
					},
					//  Limpia mensaje de proceso
					clearMsg() {
						app.errorMsg = "";
						app.successMsg = "";
					}
				}
			});
		</script>
	</body>
	</html>
<?php
} else {
?>
	<!-- Si la session no esta activa se devuelve a la pagina de inicio -->
	 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=https://www.laclasedigital.com.ar/paneldecontrol/index.php"> 
		<!-- <META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">	-->
<?php
}
?>