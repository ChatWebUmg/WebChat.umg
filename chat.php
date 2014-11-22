<?php
	session_start();
	include_once "config.php";
	require_once('classes/BD.class.php');
	
	$BD  = new  BD (); 
	$BD -> conn ();   

	if(isset($_POST['salir'])){    
    	session_destroy();
 		header("Location: index.php");
    	exit();
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WebChat | UMG</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/functions.js"></script>
<script type="text/javascript" src="js/chat.js"></script>
 <link rel="Stylesheet" href="css/estilo1.css" type="text/css"  >
   <link rel="Stylesheet" href="css/Button.css" type="text/css"  >
</head>

<body>
	 <nav >    
      <ul id="button">
        <li><img class="fade" src="images/172.png" width="60"></a></li>
         <li><a href="chat.php" id="radius">Inicio</a></li>
        <li><a href="somos.php" id="radius">Quiénes Somos</a></li>
        <li><a href="configuracion.php" id="radius">Configuración</a></li>
        <li><a href="index-playlist.php" id="radius">Música</a></li>
        </ul>
      </nav>
<div id="contatos">
	<center>
		<div class="chat_head"> Web Chat</div></center>
	<table width="100%" border="0" cellpadding="32" cellspacing="32" bgcolor=" #002d57">
        <tr>
        <td width="33%" ><div id="form">
		<form method="post" action="" >
		<input type="submit" value="Cerrar Sesión" name="salir">
		</form></div>
	 	</td>              
        </tr>
       </table>
<span class="online" id="<?php echo $_SESSION['id_user'];?>"></span>
	<ul>
	<?php
		$selecionar_usuarios = $BD -> conn ()->prepare("SELECT * FROM `usuarios` WHERE id != ?");
		$selecionar_usuarios->execute(array($_SESSION['id_user']));
		if($selecionar_usuarios->rowCount() == 0){
			echo '<p>Debes inciar sesión para usar el servicio de WebChat!</p>';
			header("Location: index.php");
		}else{
		while($usuario = $selecionar_usuarios->fetchObject()){
	?>
		<li><span class="type" id="<?php echo $usuario->id;?>"></span>
		<a href="javascript:void(0);" nome="<?php echo $usuario->nome;?>" id="<?php echo $usuario->id;?>" class="comecar">
		<img class="fade"><?php echo $usuario->nome;?></a></li>
	<?php }}?>
	</ul>

	
</div>



<div style="position:absolute; top:0; right:0;" id="retorno"><div>
<div id="janelas"></div>


</body>
</html>