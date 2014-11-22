<!doctype html>
<html lang="es">
    <head>
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
        <meta charset="utf-8">
        <title></title>
    </head>
    
    <body>
        <?php
            include ("config.php");

            $conexion = mysqli_connect(HOST,USER,PASS,BD);
            $email = $_POST["email"];
            $nuevo_email = mysqli_query($conexion,"SELECT * FROM usuarios WHERE email = '$_POST[email]' ");
                  
            if (mysqli_num_rows($nuevo_email)>0) {            
                echo '<script>alert("Usuario existente.");location.href="registrarse.php"</script>';
            }

            else{
                if(isset($_POST['user']) && !empty ($_POST['user']) &&
                isset($_POST['email']) && !empty ($_POST['email']) &&
                isset($_POST['pass']) && !empty ($_POST['pass'])){
                
                    $conexion = mysqli_connect(HOST,USER,PASS,BD) or die ("Problemas con el host");
                    mysqli_query($conexion,"INSERT INTO usuarios (nome,email,password) VALUES ('$_POST[user]','$_POST[email]','$_POST[pass]')");
                    echo '<script>alert("¡Se ha registrado correctamente!");location.href="index.php"</script>';
                }

                else{
                    echo '<script>alert("¡Ingrese todos sus datos!");location.href="registrarse.php"</script>';

                }               
            }   
        ?>
    </body>
</html>