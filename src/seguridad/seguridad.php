<?php
include "db.php";
session_start();
$usuario = $_POST["usuario"];
$contrasena = $_POST["contrasena"];

if ($usuario == "" || $contrasena == "") {
    header("Location: ../vistas/loginLARA.php?error=campos_vacios");

} else {
    //conectar con la base de datos
    conexionDB();
    echo "Conectado a la base de datos";
    
    //buscar si hay un usuario en la tabla con ese mismo $usuario
    if (consultarUsuario($usuario)) {
        echo "Usuario encontrado";
       if(consultarContrasena($usuario, $contrasena)){
            //echo "Usuario y contraseña correctas";

            $_SESSION["usuario"] = $usuario;
            

            if(devolverNivel($usuario) == 0){
                //echo "Ejecutando función: ";
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
       } else {
        header("Location: ../vistas/loginLARA.php?error=contraseña_invalida");

       }
    } else {
        //si no -> mensaje error
        header("Location: ../vistas/loginLARA.php?error=usuario_inexistente");
    }
        
}


?>