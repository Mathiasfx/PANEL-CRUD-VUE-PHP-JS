<?php
header('Access-Control-Allow-Origin: *');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>::PANEL PRECIOS::</title>
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('img/img-01.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<div class="wrap-login100">
					<img src="img/logo.png" width="200px">
				</div>
				<form action="index.php" method="post">
					<span class="login100-form-title p-t-20 p-b-45">
						Ingreso Panel
					</span>
						<!-- Mensaje Alerta -->
					<div id="msg">
					</div>
						<!-- Mensaje Alerta -->					
						<!-- Input Usuario -->	
					<div class="wrap-input100 validate-input m-b-10" data-validate="Usuario Requerido">
						<input class="input100" id="usu" type="text" name="txtlogin" required="true">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>
						<!-- Input Contraseña -->	
					<div class="wrap-input100 validate-input m-b-10" data-validate="Password Requerido">
						<input class="input100" id="pass" type="password" name="txtpass" required="true">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>
					<div class="container-login100-form-btn p-t-10">
						<input type="submit" class="btn btn-success" value="Ingresar">
					</div>
				</form>
			</div>
		</div>
	</div>	
</body>
</html>

<!-- Inicio de Session Script -->
<?php
if (isset($_POST['txtpass'])) {
	session_start();
	// Conexion con base de datos 
	require 'php/Conexiones.php';
	$login = $conn->real_escape_string($_POST['txtlogin']);
	$pass = $conn->real_escape_string($_POST['txtpass']);
	//Verificacion de Usuario y Contraseña
	$resultado = $conn->query("SELECT * FROM tbusuario where login='$login' and pass='$pass' and activo!=0");
	$valida = $resultado->num_rows;
	// Si la Session es Valida enviar a la pagina de Lista de productos
	if ($valida != 0) {
		$datosUsu = $resultado->fetch_row();
		$_SESSION['nombreusu'] = $datosUsu[3];
		$_SESSION['perfil'] = $datosUsu[4];
		echo "Incio Exitoso";
		//redireccion
		echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=listar.php'>";
	} else {
		//Alerta de Usuario Contraseña Incorrecta
		echo
			"<script>
				html = `<h2>Usuario o Contraseña Incorrecta</h2>`
				document.getElementById('msg').appendChild(html);
			</script>";
			}
}
?>
<!-- FIN de Session Script -->