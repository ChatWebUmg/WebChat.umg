<?php
session_start();
	include_once "config.php";
	require_once('classes/BD.class.php');
	
	$BD  = new  BD (); 
	$BD -> conn ();   
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Registrarse | WebChat</title>
		<style type="text/css">
			*{
				trmargin:0; padding:0;
			}
			
			body{
				background:url("images/5.jpg");
			}
		
			div#formulario{
				width:500px; 
				padding:20px; 
				height:340px; 
				background:url("images/prueba.jpg"); 
				border:1px solid #333;
				border-radius: 10px;
				position:absolute; 
				left:50%; top:50%; 
				margin-left:-250px; 
				margin-top:-200px;
			}
		
			div#formulario span{
				font:18px "Trebuchet MS", tahoma, arial; 
				color:#036; 
				float:left; 
				width:100%; 
				margin-bottom:10px;
			}
		
			div#formulario input[type=text]{
				padding:5px; 
				width:485px; 
				border:1px solid #ccc;
				border-radius: 5px; 
				outline:none; 
				font:16px tahoma, arial;
				color:#666;
			}

			div#formulario input[type=password]{
				padding:5px; 
				width:485px; 
				border:1px solid #ccc;
				border-radius: 5px; 
				outline:none; 
				font:16px tahoma, arial;
				color:#666;
			}
			
			div#formulario input[type=text]:focus{
				border-color:#036;
			}

			div#formulario input[type=password]:focus{
				border-color:#036;
			}
		
			div#formulario input[type=submit]{
				padding:4px 6px; 
				background:#069; 
				font:15px tahoma, arial; 
				color:#fff; 
				border:1px solid #036;
				border-radius: 10px;
				float:left; 
				margin-top:5px; 
				text-align:center; 
				width:95px; 
				text-shadow:#000 0 1px 0;
			}
		
			div#formulario input[type=submit]:hover{
				cursor:pointer; 
				background:#09f;
			}

			div#formulario img{
				margin-left: 350px;
				margin-top: -60px;
			}

			#rueda{
				transition: 2.5s ease;
			 	-moz-transition: 2.5s ease; /* Firefox */
			 	-webkit-transition: 2.5s ease; /* Chrome - Safari */
			 	-o-transition: 2.5s ease; /* Opera */
			}
 
			#rueda:hover{
				transform : rotate(360deg);
				-moz-transform : rotate(360deg); /* Firefox */
				-webkit-transform : rotate(360deg); /* Chrome - Safari */
				-o-transform : rotate(360deg); /* Opera */
			}

			#sesion{
				color: white;
				text-decoration: none;
			}
		</style>
</head>
<body>
	<div id="formulario">
		<form action="registro.php" method="post" enctype="multipart/form-data" name="form">
			<span>Usuario:</span>
			<label>
				<input type="text" name="user" />
			</label>

			<span>Contraseña:</span>
			<label>
				<input type="password" name="pass" />
			</label>

			<span>Correo Electrónico:</span>
			<label>
				<input type="text" name="email" />
			</label>

			<input type="hidden" name="acao" value="logar" />
			<input type="submit" value="Registrarse" />
		</form>
		<br><br><br>
		<img src="images/logo.png" id="rueda">
		<center><a href="index.php" id="sesion">¿Ya tienes una cuenta?... Inicia Sesión</a></center>
	</div>

</body>
</html>