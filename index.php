<?php
    session_start();

    if($_SERVER["REQUEST_METHOD"]=="post"){
        $_SESSION["login"]==$_POST["login"];
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="style-index.css">
</head>
<body>
<div class="main">
    <main>
    <form action="index.php" method="post" onsubmit="return validar()">
        <h2>LOGIN</h2>
    <label for="usuario">Introduce tu usuario:</label><br>
    <input type="text" name="usuario" id="usuario" placeholder="Usuario"><br>
    <div id="validarUsuario"></div>
    <label for="contrasenia">Introduce tu contraseña:</label><br>
    <input type="password" name="contrasenia" id="contrasenia" placeholder="Contraseña"><br><br>
    <div id="validarContrasenia"></div>
    <input type="submit" value="Entrar" onclick="validar()">
    <div id="validarFormulario"></div>
    </form>
    </main>
    <script>
        function validar(){
            let usuario = document.getElementById("usuario").value;
            let contrasenia = document.getElementById("contrasenia").value;

            if(usuario==""){
                document.getElementById("validarUsuario").innerHTML="<p>Rellena el campo Usuario</p>";
                return false;
            }if(usuario.length< 4){
                    document.getElementById("validarUsuario").innerHTML="<p>Rellena correctamente el campo</p>";
                    return false;
                }
            if(contrasenia==""){
                document.getElementById("validarContrasenia").innerHTML="<p>Rellena el campo Contraseña</p>";
                return false;   
            }if(contrasenia.length < 8){
                document.getElementById("validarContrasenia").innerHTML="<p>La contraseña no es valida, vuelve a intentarlo</p>";
                return false;}

        }

    </script>
    <?php    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $user="Admin";
        $password="AbCd1234";
        $usuario=($_POST["usuario"]);
        $contrasenia=($_POST["contrasenia"]);
        if($usuario == $user && $contrasenia == $password){
            session_start();
            $_SESSION['logeado']=true;
            header("Location:guardar.php");
            exit();
        }else{
            echo"<p style=color:red;text-align:center;>El usuario o contraseña es incorrecto</p>";
        }
    }
    ?>
</div>
</body>
</html>

