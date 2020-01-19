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

		<link rel="stylesheet" href="css/estilos.css">
		

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
									
							</div>
						</div>
						<div class="col-lg-6">
							<a href="cerrars.php"><button class="btn btn-danger float-right">Salir</button></a>
							<button class="btn btn-info float-right mr-3" @click="MostrarAgregarProducto=true"><i class="fas fa-box"></i>&nbsp;&nbsp;Nuevo Producto</button>
							<button class="btn btn-info float-right mr-2" @click="AgregarCategoria=true"><i class="fas fa-box-open"></i>&nbsp;&nbsp;Nueva Categoria</button>
						</div>			
					</div>	
					<hr class="bg-info">
						<div class="alert alert-danger" v-if="errorMsg">
						{{errorMsg}}				
						</div>
						<div class="alert alert-success" v-if="successMsg">
						{{successMsg}}		
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
									<tr class="text-center" v-for="producto in productos">
										<td>{{producto.idProductos}}</td>
										<td>{{producto.NombreProducto}}</td>
										<!-- <td>{{producto.Imagen}}</td> -->
										 <td><img :src="'productImages/'+producto.Imagen" width="60"></td> 
										<td>{{producto.CategoriaID}}</td>
										<td>{{producto.Prefijo}}</td>
										<td>{{producto.Precio}}</td>
								
										<td><a class="text-success" href="#"><i class="fas fa-pen-square"   @click="EditarProducto=true; SelectProduct(producto);"></i></a></td>
										<td><a class="text-danger" href="#"><i class="fas fa-trash-alt"  @click="EliminarProducto=true;  SelectProduct(producto);"></i></a></td>
									</tr>
							</table>							
							</div>							
						</div>
				</div>


		<!-- AGREGAR NUEVO PRODUCTO -->
		<div id="overlay" v-if="MostrarAgregarProducto">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Agregar Nuevo Producto</h5>
						<button type="button"  class="close"  @click="MostrarAgregarProducto=false">
							<span aria-hiden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body p-4">	
						<form action="#" method="post">
							<div class="form-group">
								<input type="text" name="Nombre" class="form-control form-control-lg" placeholder="Nombre Producto" v-model="NuevoProducto.Nombre">								
							</div>
							<div class="form-group">
								<label for="imagen">Seleccionar Imagen</label>
								 <img v-if="eurl" :src="eurl" width="40"><br> 
								<input type="file" name="Imagen" ref="Imagen" id="Imagen" class="form-control-file" @change="everImagen()"  >		
								
							</div>								
							<div class="form-group">
								<label for="SelectCategoria">Categoria</label>
										<select class="form-control" id="CategoriaID"  v-model="NuevoProducto.CategoriaID">
										<option v-for="categoria in categorias" :value="categoria.CategoriaID">{{ categoria.CategoriaID }}</option>
										</select>			
										
							</div>	
							<div class="form-group">
								<input type="text" name="Prefijo" id="Prefijo" class="form-control form-control-lg" placeholder="Prefijo $$" v-model="NuevoProducto.Prefijo">								
							</div>	
							<div class="form-group">
								<input type="text" name="Precio" id="Precio" class="form-control form-control-lg" placeholder="Precio " v-model="NuevoProducto.Precio">								
							</div>	
							<div class="form-group">
								<button class="btn btn-info btn-block btn-lg" @click="MostrarAgregarProducto=false; AddProducto();clearMsg();">Agregar Producto</button>
							
							</div>					
						</form>						
					</div>
					
					
				</div>
				
			</div>
			
		</div>
		<!-- AGREGAR NUEVO PRODUCTO -->

		<!-- AGREGAR CATEGORIA -->
		<div id="overlay" v-if="AgregarCategoria">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Agregar Nuevo Categoria</h5>
						<button type="button"  class="close"  @click="AgregarCategoria=false">
							<span aria-hiden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body p-4">	
						<form action="#" method="post">
							<div class="form-group">
								<input type="text" name="NombreCategoria" class="form-control form-control-lg" placeholder="Nombre Categoria" v-model="NuevaCategoria.NombreCategoria">								
							</div>								
							
							
							
							<div class="form-group">
								<button class="btn btn-info btn-block btn-lg" @click="AgregarCategoria=false; AddCategoria();clearMsg();">Agregar Categoria</button>							
							</div>					
						</form>						
					</div>
					
					
				</div>
				
			</div>
			
		</div>
		<!-- AGREGAR Categoria -->

		
		<!-- EDITAR PRODUCTO -->
		<div id="overlay" v-if="EditarProducto">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Editar Producto</h5>
						<button type="button"  class="close"  @click="EditarProducto=false">
							<span aria-hiden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body p-4">	
						<form action="#" method="post">
							<div class="form-group">
								<input type="text" name="Nombre" class="form-control form-control-lg" v-model="currentProducto.NombreProducto">								
							</div>
							<div class="form-group">
								<label for="Imagen">Cambiar Imagen</label>
								<div v-inf="eurl">
									<img :src="eurl" width="40" ><br>									
								</div>
								<div v-else="eurl">
									<img :src="'productImages/'+currentProducto.Imagen" width="40">									
								</div>
								<input type="file" class="form-control-file" name="eImagen" ref="eImagen" id="eImagen" @change="everImagen()">							
							</div>								
							<div class="form-group">
								<label for="exampleFormControlSelect1">Categoria</label>
										<select class="form-control" id="Categoria" v-model="currentProducto.CategoriaID">
										<option>{{currentProducto.CategoriaID}}</option>
										<option v-for="categoria in categorias" :value="categoria.CategoriaID">{{ categoria.CategoriaID }}</option>
										
										</select>					
							</div>	
							<div class="form-group">
								<input type="text" name="Prefijo" class="form-control form-control-lg"  v-model="currentProducto.Prefijo">								
							</div>	
							<div class="form-group">
								<input type="text" name="Precio" class="form-control form-control-lg"  v-model="currentProducto.Precio">								
							</div>	
							<div class="form-group">
								<button class="btn btn-info btn-block btn-lg"  @click="EditarProducto=false; ; updateProducto();clearMsg();">EDITAR</button>							
							</div>					
						</form>						
					</div>
					
					
				</div>
				
			</div>
			
		</div>
		<!-- EDITAR PRODUCTO -->

		
		<!-- ELIMINAR PRODUCTO -->
		<div id="overlay" v-if="EliminarProducto">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Eliminar Producto</h5>
						<button type="button"  class="close"  @click="EliminarProducto=false">
							<span aria-hiden="true">&times;</span>
						</button>
					</div>
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
		<!-- EDITAR PRODUCTO -->

		</div>

		



			
					

				
			
		<!--AXIOS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.1/axios.min.js"></script>
		<!-- VUE -->
		<script src="https://cdn.jsdelivr.net/npm/vue"></script>
	
		<!-- METODOS JS VUE -->
		<script>
			var app = new Vue({
    			el:'#app',
    			data: {
        			errorMsg: "",
       			 	successMsg: "",
					MostrarAgregarProducto: false,
					EditarProducto:false,
					EliminarProducto:false,
					AgregarCategoria:false,
					SelectedFile:null,
					url:null,
					eurl:null,					
					productos:[],
					categorias:[],
					NuevoProducto:{Nombre:"",Imagen:"",CategoriaID:"",Prefijo:"",Precio:""},
					NuevaCategoria:{NombreCategoria:""},
					currentProducto:{}
					},
					mounted: function(){
						this.getAllProducts();
						this.getAllCategorias();
					},
					methods:{
						getAllProducts(){
							axios.get("http://localhost/webs/PHPHUB/Procesar.php?action=read").then(function(response){
								if(response.data.error){
									app.errorMsg = response.data.message;
								}else{
									app.productos = response.data.productos;
								}

							});

						},
						getAllCategorias(){
							axios.get("http://localhost/webs/PHPHUB/Procesar.php?action=readCategory").then(function(response){
								if(response.data.error){
									app.errorMsg = response.data.message;
								}else{
									app.categorias = response.data.categorias;
								}

							});

						},
						AddProducto(){
							var formData = app.toFormData(app.NuevoProducto);
							formData.append("Imagen",document.getElementById("Imagen").files[0])
							axios.post("http://localhost/webs/PHPHUB/Procesar.php?action=create",formData).then(function(response){
								app.NuevoProducto = {Nombre: "",Imagen: "",Categoria: "",Prefijo: "",Precio: ""};
								if(response.data.error){
									app.errorMsg = response.data.message;
								}else{
									app.successMsg = response.data.message;
									app.getAllProducts();
								}

							});

						},
						AddCategoria(){
							var formData = app.toFormData(app.NuevaCategoria);
							axios.post("http://localhost/webs/PHPHUB/Procesar.php?action=createCategoria",formData).then(function(response){
								app.NuevaCategoria = {NombreCategoria: ""};
								if(response.data.error){
									app.errorMsg = response.data.message;
								}else{
									app.successMsg = response.data.message;
									app.getAllCategorias();
								}

							});

						},
						updateProducto(){
							var formData = app.toFormData(app.currentProducto);
							formData.append("eImagen",document.getElementById("eImagen").files[0])
							axios.post("http://localhost/webs/PHPHUB/Procesar.php?action=update",formData).then(function(response){
								app.currentProducto = {};
								if(response.data.error){
									app.errorMsg = response.data.message;
								}else{
									app.successMsg = response.data.message;
									app.getAllProducts();
								}

							});

						},
						DeleteProducto(){
							var formData = app.toFormData(app.currentProducto);
							axios.post("http://localhost/webs/PHPHUB/Procesar.php?action=delete",formData).then(function(response){
								app.currentProducto = {};
								if(response.data.error){
									app.errorMsg = response.data.message;
								}else{
									app.successMsg = response.data.message;
									app.getAllProducts();
								}

							});

						},
						 VerImagen(){
						 	var _this = this
					    	this.file = _this.$refs.Imagen.files[0];
						  	this.url = URL.createObjectURL(_this.file);
						  },
						 everImagen(){
						 	var _this = this
						 	this.file = _this.$refs.eImagen.files[0];
						 	this.eurl = URL.createObjectURL(_this.file);
						 },
						 InsertarImagen(){
						  	var formdata=new FormData()
						  	formdata.append("Imagen",document.getElementById("Imagen").files[0])
						 	axios.post("http://localhost/webs/PHPHUB/Procesar.php?action=Insertar", formdata)
						 	.then(function(response){
						 		app.successMsg = response.data.message;
						 		app.getAllProducts();
						  	});
						 },
						toFormData(obj){
							var fd = new FormData();
							for(var i in obj){
								fd.append(i,obj[i]);
							}
							return fd;

						},

						SelectProduct(producto){
							app.currentProducto = producto;

						},
						
						clearMsg(){
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
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">
<?php
}
?>