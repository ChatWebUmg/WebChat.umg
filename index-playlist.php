<?php
  session_start();
  include_once "config.php";
  require_once('classes/BD.class.php');
  
  $BD  = new  BD (); 
  $BD -> conn ();   
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
  <link rel="Stylesheet" href="css/estilo1.css" type="text/css"  >
  <link rel="Stylesheet" href="css/Button.css" type="text/css"  >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Dewplayer</title>

<!-- Quelques styles CSS -->
<style type="text/css">
html {
  font-family:"Myriad","Myriad Pro",Georgia,Helvetica,Sans-serif;
 
}
body {
  
  padding:0;
  margin:0;
  background: url("images/zdewplayer.jpg");
}
h1 {
  color:#eee;
  padding-top: 3em;
  padding-bottom:2em;
  margin:0;
}
#content {
  margin:auto 0;
  text-align:center;
  margin-top: 150px;

}
#hint {
  color:#666;
  margin-left:15%;
  width:300px;
  text-align:left;
  margin-top:3em;
}
</style>
</head>

<body>
     <nav >    
      <ul id="button">
        <li><a href="chat.php" id="radius">Inicio</a></li>
        <li><a href="somos.php" id="radius">Quiénes Somos</a></li>
        <li><a href="configuracion.php" id="radius">Configuración</a></li>
        <li><a href="index-playlist.php" id="radius">Música</a></li>
        </ul>
      </nav>

<?php
    $selecionar_usuarios = $BD -> conn ()->prepare("SELECT * FROM `usuarios` WHERE id != ?");
    $selecionar_usuarios->execute(array($_SESSION['id_user']));
    if($selecionar_usuarios->rowCount() == 0){
      echo '<p>Debes inciar sesión para usar el servicio de WebChat!</p>';
      header("Location: index.php");
    }
  ?>

<div id="content">

	<object type="application/x-shockwave-flash" data="swf/dewplayer-playlist.swf" width="240" height="200" id="dewplayer" name="dewplayer">
	<param name="wmode" value="transparent" />
	<param name="movie" value="dewplayer-playlist.swf" />
	<param name="flashvars" value="showtime=true&autoreplay=true&xml=xml/playlist.xml" />
	</object>
	
</div>
</body>
</html>
