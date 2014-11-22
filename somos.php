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
<title>WebChat | UMG</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
 <link rel="stylesheet"  href="css/layout1.css" type="text/css"/>
 <link rel="Stylesheet" href="css/Button.css" type="text/css"  >
 <link rel="Stylesheet" href="css/estilo1.css" type="text/css"  >



<script src="js/ValidacionesEspeciales.js" type="text/javascript"></script>

<link href="css/Estilo_Error.css" rel="stylesheet" type="text/css">
<style>
.letras{
 color:#ffffff;
}
</style>
<script type='text/javascript'>

function setIframeHeight( iframeId ) 
{
  var ifDoc, ifRef = document.getElementById( iframeId );
  
  try
  {   
    ifDoc = ifRef.contentWindow.document.documentElement;  
  }
  catch( e )
  { 
    try
    { 
      ifDoc = ifRef.contentDocument.documentElement;  
    }
    catch(ee)
    {   
    }  
  }
  
  if( ifDoc )
  {
  ifRef.height = 1;  
  ifRef.height = ifDoc.scrollHeight;
  }
}
</script>
</head>
<body>
  <?php
    $selecionar_usuarios = $BD -> conn ()->prepare("SELECT * FROM `usuarios` WHERE id != ?");
    $selecionar_usuarios->execute(array($_SESSION['id_user']));
    if($selecionar_usuarios->rowCount() == 0){
      echo '<p>Debes inciar sesión para usar el servicio de WebChat!</p>';
      header("Location: index.php");
    }
  ?>  <nav >    
      <ul id="button">
        <li><a href="chat.php" id="radius">Inicio</a></li>
        <li><a href="somos.php" id="radius">Quiénes Somos</a></li>
        <li><a href="configuracion.php" id="radius">Configuración</a></li>
        <li><a href="index-playlist.php" id="radius">Música</a></li>
        </ul>
      </nav>

<CENTER>

          

                        <div class="contentLayout">
                            <div id="content" >
                               
                                    <div class="box tabs themed_box">
                                        <h2 class="box-header">
                    GRUPO DE WEBCHAT
                    </h2>
                                          
                                        
                                        <div class="box-content">  
     
                    
                                        <iframe src="informacion.php" id="admin" name="admin" scrolling="no" width="100%" height="100%"  frameborder="0"  onload = "setIframeHeight(this.id)"></iframe>
                                            </div>
                                    </div>
                                      
                            </div>
                        </div>
</CENTER>
</body>
</html>