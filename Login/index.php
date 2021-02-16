<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user_sys'])){
header("location: registro.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Formulario de inicio de sesión</title>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Flat Login Form Widget Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Signika:400,600' rel='stylesheet' type='text/css'>
<!--google fonts-->
</head>
<body>
<!--header start here-->
<h1>Formulario de inicio de sesión</h1>
<div class="header agile">
	<div class="wrap">
		<div class="login-main wthree">
			<div class="login">
			<h3>Iniciar sesión</h3>
			<form action="#" method="post">
				<input type="text" placeholder="Correo electrónico" required="" name="username" required>
				<input type="password" placeholder="Contraseña" name="password" required>
				<input name="submit" type="submit" value="Ingresar">
			</form>
			<div class="clear"> </div>
				<span><?php echo $error; ?></span>
			</div>
			
			
		</div>
	</div>
</div>
<!--header end here-->
<!--copy rights end here-->
<div class="copy-rights w3l">		 	
	<p>© <?php echo date("Y");?> Hotel Mediodia</a>  Todos los derechos reservados | Diseñado por Jesus Miguel Marcelino Kranwinkel</a> </p>		 	
</div>
<!--copyrights start here-->

</body>
</html>