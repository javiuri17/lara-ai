<?php
include "../seguridad/db.php";
class controlador
{

    function actualizarUsuarios($usuario, $contrasena, $nombre, $nivel, $email)
    {
        global $dbpro;

        $filt = $dbpro->prepare("UPDATE usuarios SET contrasena = ?, nombre = ?, nivel = ?, email = ?  WHERE usuario = ?");
        $filt->bind_param("ssiss", $contrasena, $nombre, $nivel, $email,$usuario);
        $filt->execute();
    }

    function borrarUsuarios($usuario)
    {
        global $dbpro;
    
        // Seleccionamos al usuario por username
        $filt = $dbpro->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $filt->bind_param("s", $usuario);
        $filt->execute();
        $res = $filt->get_result();
        $vecUsuarios = $res->fetch_assoc();

        for($i = 0; $i < count($vecUsuarios); $i++){
            //echo "\n vuelta de vector usuarios: " . $i;

            $filt = $dbpro->prepare("DELETE FROM usuarios WHERE usuario = ?");
            $filt->bind_param("s", $usuario);
            $filt->execute();
        }

    }


  



}

















?>