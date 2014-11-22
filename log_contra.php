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
	
	</style>
</head>
<body>
<?php
	if(isset($_POST['avanzar']) && $_POST['avanzar'] == 'login'):
	$pass1 =$_POST['con'];
	if($pass1==''){
	}
	else{
		$pegar_user = $BD -> conn ()->prepare("SELECT id FROM `usuarios` WHERE password = ? " );
		$pegar_user->execute(array($pass1));
		if($pegar_user->rowCount() == 0){
			echo '<script>alert("Contraseña no válida!.")</script>';
		}
		else{				
		echo '<script>alert("confirmado");location.href="edit_contra.php"</script>';
		}
	}
	endif; 
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<script src="js/validacion_campo_vacio.js" type="text/javascript"></script>
<link href="css/Estilo_Error.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js" type="text/javascript"></script>
<link href="css/Estilo_Error.css" rel="stylesheet" type="text/css">
<head><link href="css/main.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<

<link href="css/Estilo_Error.css" rel="stylesheet" type="text/css">
</head>
<body>
	<?php
    $selecionar_usuarios = $BD -> conn ()->prepare("SELECT * FROM `usuarios` WHERE id != ?");
    $selecionar_usuarios->execute(array($_SESSION['id_user']));
    if($selecionar_usuarios->rowCount() == 0){
      echo '<p>Debes inciar sesión para usar el servicio de WebChat!</p>';
      header("Location: index.php");
    }
  ?>
		<form  action="" method="post" enctype="multipart/form-data">
		<center>	
		
			<br><br><h3><p><center><h2><font color="red" size= 6 face="COOPER">CONFIRMAR CONTRASEÑA PARA SEGUIR </font></h2></center></p><br><br>
            <font color="white">CONTRASEÑA:</font>
  			<span id="sprytextfield1">
			<label>
				<input name="con" class="caja" onkeypress="return soloLetras(event)" type="password" id="nombre" size="28" autocomplete="off">
  				<span class="textfieldRequiredMsg"><img src="images/no.gif" title="CAMPO VACIO"><br>
			</label>
			<input type="hidden" name="avanzar" value="login" /><br>
			<input type="submit" class="boot"  value="SEGUIR"/>
			<br>

		</form>
		<center>
		<br><br><br>		
  </form></center>
  
  <script type="text/javascript">
	
	var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");

	</script>


</body></html>