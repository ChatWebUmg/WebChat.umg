<?php
	session_start();
	include_once "config.php";
	require_once('classes/BD.class.php');
	
	$BD  = new  BD (); 
	$BD -> conn ();   
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Iniciar Sesión</title>
		
		<style type="text/css">
			*{
				trmargin:0; padding:0;
			}
			
			body{
				background:url("images/2.jpg");
			}
		
			div#formulario{
				width:500px; 
				padding:20px; 
				height:250px; 
				background:url("images/prueba.jpg"); 
				border:1px solid #333;
				border-radius: 10px;
				position:relative; 
				left:50%; top:50%; 
				margin-left:-250px; 
				margin-top:180px;
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

			#foot{
				text-align: center;
				color:white;
				background: #09f;
				height: 20px;
				padding: 5px;
				border: solid 1px black;
				border-radius: 10px;
				font-size: 18px; 
			}

			#linea{
				margin-top: 180px;
			}
		</style>
	</head>

<body>

<?php
	
	if(isset($_POST['acao']) && $_POST['acao'] == 'logar'):
		$email = strip_tags(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
		$pass = strip_tags(filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING));
		
	if($email == '' && $pass = ''){

	}
	else{
		$pegar_user = $BD -> conn ()->prepare("SELECT id FROM `usuarios` WHERE email = ? AND password = ?" );
		$pegar_user->execute(array($email,$pass));
		
		if($pegar_user->rowCount() == 0){
			echo '<script>alert("Datos inválidos")</script>';
		}
		else{
			$fetch = $pegar_user->fetchObject();

			$atual = date('Y-m-d H:i:s');
			$expira = date('Y-m-d H:i:s', strtotime('+1 min'));
			$update = $BD -> conn ()->prepare("UPDATE `usuarios`SET horario = ?, limite = ? WHERE email = ? AND password = ?");
			$update->execute(array($atual, $expira, $email, $pass));
				
			$_SESSION['id_user'] = $fetch->id;
			echo '<script>alert("¡B I E N V E N I D O!");location.href="chat.php"</script>';
		}
	}
	endif; 
?>

	<div id="formulario">
		<form action="" method="post" enctype="multipart/form-data">
			<span>Correo Electrónico:</span>
			<label>
				<input type="text" name="email" />
			</label>

			<span>Contraseña:</span>
			<label>
				<input type="password" name="pass" />
			</label>
			<input type="hidden" name="acao" value="logar" />
			<input type="submit" value="Entrar"/>
		</form>
		<br><br><br>
		<img src="images/logo.png" id="rueda">
		<center><a href="registrarse.php" id="sesion">¿Deseas registrarte?... Haz click aquí</a></center>
	</div>

	
</body>
</html>