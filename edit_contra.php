<?php
  session_start();
  include_once "config.php";
  require_once('classes/BD.class.php');
  
  $BD  = new  BD (); 
  $BD -> conn ();   

?>
<html xmlns="http://www.w3.org/1999/xhtml"><head><link href="css/main.css" rel="stylesheet" type="text/css">
<script src="js/validacion_campo_vacio.js" type="text/javascript"></script>
<link href="css/Estilo_Error.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js" type="text/javascript"></script>
<link href="css/Estilo_Error.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
.caja{
  display: inline-block;
  margin: 5px;
  border: 1px solid #dadada;
  background-color: #eaeaea;
  padding: 3px;
  color: #404040;
  width: 250px;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
}

</style>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">


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


   <center>
  <form id="form1" name="form1" method="post" action="edit_contra.php">  
  <table width="68%" border="3" align="center" >
  <h3><p><center><h2><font color="green" size= 6 face="COOPER">EDITAR NOMBRE </font></h2></center></p>
  <tbody>
  <tr>
  <td align="right"><font color="white">Ingrese Nombre Actual:</font></td>
  <td><span id="sprytextfield1">
  <input name="viejo" class="caja" onkeypress="return soloLetras(event)" type="text" size="32" autocomplete="off">
  <span class="textfieldRequiredMsg"><img src="images/no.gif" title="CAMPO VACIO"></span></span></td>
  </tr> 
  <tr>
  <td align="right"><font color="white">Ingrese Nombre Nuevo:</font></td>
  <td><span id="sprytextfield2">
  <input name="nuevo" class="caja" onkeypress="return soloLetras(event)" type="text" size="32" autocomplete="off">
  <span class="textfieldRequiredMsg"><img src="images/no.gif" title="CAMPO VACIO"></span></span></td>
  </tr>
  
  <tr><td colspan="2"><input type="submit" class="boot" name="guarda" value="ACTUALIZAR"> <input type="reset" class="boot" name="guarda" value="LIMPIAR"></td></tr>
  </tbody></table></form>




 
  <form id="form2" name="form2" method="post" action="edit_contra.php"> 
  <table width="68%" border="3" align="center" >
  <h3><p><center><h2><font color="black" size= 6 face="COOPER">EDITAR CONTRASEÑA </font></h2></center></p>
  <tbody>
  <tr>
  <td align="right"><font color="white">Ingrese Contraseña Actual:</font></td>
  <td><span id="sprytextfield3">
  <input name="viejo1" class="caja" onkeypress="return soloLetras(event)" type="password" size="32" autocomplete="off">
  <span class="textfieldRequiredMsg"><img src="images/no.gif" title="CAMPO VACIO"></span></span></td>
  </tr> 
  <tr>
  <td align="right"><font color="white">Ingrese Contraseña Nueva:</font></td> 
  <td><span id="sprytextfield4">
  <input name="nuevo1" class="caja" onkeypress="return soloLetras(event)" type="password" size="32" autocomplete="off">
  <span class="textfieldRequiredMsg"><img src="images/no.gif" title="CAMPO VACIO"></span></span></td>
  </tr>
  
  <tr><td colspan="2"><input type="submit" class="boot" name="guarda1" value="ACTUALIZAR"> <input type="reset" class="boot" name="guarda" value="LIMPIAR"></td></tr>
  </tbody></table></form>





  <form id="form3" name="form3" method="post" action="edit_contra.php"> 
  <table width="68%" border="3" align="center" >
  <h3><p><center><h2><font color="red" size= 6 face="COOPER">EDITAR CORREO </font></h2></center></p>
  <tbody>
  <tr>
  <td align="right"><font color="white">Ingrese Correo Actual:</font></td>
  <td><span id="sprytextfield5">
  <input name="viejo2" class="caja" onkeypress="return soloLetras(event)" type="text" size="32" autocomplete="off">
  <span class="textfieldRequiredMsg"><img src="images/no.gif" title="CAMPO VACIO"></span></span></td>
  </tr> 
  <tr>
  <td align="right"><font color="white">Ingrese Correo Nuevo:</font></td> 
  <td><span id="sprytextfield6">
  <input name="nuevo2" class="caja" onkeypress="return soloLetras(event)" type="text" size="32" autocomplete="off">
  <span class="textfieldRequiredMsg"><img src="images/no.gif" title="CAMPO VACIO"></span></span></td>
  </tr>
  <tr><td colspan="2"><input type="submit" class="boot" name="guarda2" value="ACTUALIZAR"> <input type="reset" class="boot" name="guarda" value="LIMPIAR"></td></tr>
  </tbody></table>
</form>
  </center>
  <script type="text/javascript">
  var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
  var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
  var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
  var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
  var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
  var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
  </script>

<?php
if (isset($_REQUEST['guarda'])) {
$con=mysql_connect('localhost','root','aevrrm9702') or die("problemas en servidor");
mysql_select_db('chat',$con)or die("problemas con la base de datos");
$a=$_POST['nuevo'];
$b=$_POST['viejo'];

mysql_query("UPDATE usuarios set nome='$a' WHERE nome='$b'",$con)or die (mysql_error());
    echo '<script>alert("Nombre Actualizada Correctamente");</script>';

}
/***************************************************************************************************************/



if (isset($_REQUEST['guarda1'])) {
$con=mysql_connect('localhost','root','aevrrm9702') or die("problemas en servidor");
mysql_select_db('chat',$con)or die("problemas con la base de datos");
$a=$_POST['nuevo1'];
$b=$_POST['viejo1'];

mysql_query("UPDATE usuarios set password='$a' WHERE password='$b'",$con)or die (mysql_error());
   echo '<script>alert("Contraseña Actualizada Correctamente");</script>';
}
/********************************************************************************************************************/
if (isset($_REQUEST['guarda2'])) {
$con=mysql_connect('localhost','root','aevrrm9702') or die("problemas en servidor");
mysql_select_db('chat',$con)or die("problemas con la base de datos");
$a=$_POST['nuevo2'];
$b=$_POST['viejo2'];

mysql_query("UPDATE usuarios set email='$a' WHERE email='$b'",$con)or die (mysql_error());
   echo '<script>alert("Correo Actualizada Correctamente");</script>';
}
?>
</body>
</html>