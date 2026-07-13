<?php

include "../modelos/modeloUsuarios.php";

$opcion = filter_input(INPUT_POST, 'opcion', FILTER_SANITIZE_NUMBER_INT);

//echo "mostrando opción: " . $opcion;

$controlUsuario = new controlador();

switch($opcion) {
    case 0:
        

        $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_SPECIAL_CHARS);
        $contrasena = filter_input(INPUT_POST, 'contrasena', FILTER_SANITIZE_SPECIAL_CHARS);
        $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_SPECIAL_CHARS);
        $nivel = filter_input(INPUT_POST, 'nivel', FILTER_SANITIZE_NUMBER_INT);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        
        $controlUsuario->actualizarUsuarios($usuario, $contrasena, $nombre, $nivel, $email);
        break;

    case 1:

        $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_SPECIAL_CHARS);
        $contrasena = filter_input(INPUT_POST, 'contrasena', FILTER_SANITIZE_SPECIAL_CHARS);
        $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_SPECIAL_CHARS);
        $nivel = filter_input(INPUT_POST, 'nivel', FILTER_SANITIZE_NUMBER_INT);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);

        $controlUsuario->borrarUsuarios($usuario);
        break;


}
?>