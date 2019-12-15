<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>::PANEL PRECIOS::</title>
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
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

					<div class="wrap-input100 validate-input m-b-10" data-validate="Usuario Requerido">
						<input class="input100" id="usu" type="text" name="txtlogin" required="true">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

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
					<div class="msg" id="msg">

				</div>
				</form>
			</div>
		</div>
	</div>

	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>

	
	<!--===============================================================================================-->
</body>

</html>
<?php
if (isset($_POST['txtpass'])) {
	session_start();
	include_once 'Conexiones.php';
	$login = $conn->real_escape_string($_POST['txtlogin']);
	$pass = $conn->real_escape_string($_POST['txtpass']);
	$resultado = $conn->query("SELECT * FROM tbusuario where login='$login' and pass='$pass' and activo!=0");
	$valida = $resultado->num_rows;
	if ($valida != 0) {
		$datosUsu = $resultado->fetch_row();
		$_SESSION['nombreusu'] = $datosUsu[3];
		$_SESSION['perfil'] = $datosUsu[4];
		echo "Session entro";
		echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=listar.php'>";
	} else {
		echo
			"<script>
				var textnode = document.createTextNode('Usuario ó Password Incorrecto');
				document.getElementById('msg').appendChild(textnode);
			</script>";
	}
}
?>