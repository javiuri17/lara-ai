<?php
include "db.php";
session_start();

$usuario = $_POST["usuario"];
$contrasena = $_POST["contrasena"];
$nombre = $_POST["nombre"];
$nivel = $_POST["nivel"];
$email = $_POST["email"];

//si el campo de usuario, contrasena, nombre o email están vacíos, mostramos un mensaje
//de que no pueden dejarse los campos vacíos
if (empty($usuario) || empty($contrasena) || empty($nombre) || empty($email)) {

    header("Location: ../vistas/registroLARA.php?error=vacios_campos");

} else {
    if (strlen($contrasena) < 8) {
        header("Location: ../vistas/registroLARA.php?error=contrasena_corta");

    } else {
        if (preg_match('#[0-9]#', $nombre)) {
            header("Location: ../vistas/registroLARA.php?error=nombre_sinnumeros");

        } else {
            conexionDB();
            echo "Conectado a la base de datos";

            //buscar si hay un usuario en la tabla con ese mismo $usuario
            if (consultarUsuario($usuario)) {
                header("Location: ../vistas/registroLARA.php?error=usuario_existe");
            } else {
                echo "Datos correctos, procedemos al registro";
                registrarUsuario($usuario, $contrasena, $nombre, $email);
                //echo "Usuario registrado correctamente";
                $_SESSION['usuario'] = $usuario;
                $_SESSION['contrasena'] =  $contrasena;
                $_SESSION['nombre'] = $nombre;
                $_SESSION['nivel'] = $nivel;
                $_SESSION['email'] = $email;
                if(devolverNivel($usuario) == 0){
                    header("Location: ../index.php");
                } else {
                 if(devolverNivel($usuario) == 1){
                    header("Location: ../indexPaciente.php");
                 } else {
                    if(devolverNivel($usuario) == 2){
                        header("Location: ../indexPsicologo.php");
                    }
                    
                 }

                }
            }

        }


    }

}

?>