<?php
$dbpro = new mysqli("localhost", "root", "", "laradb", 3306);
mysqli_query($dbpro, "SET NAMES 'UTF8'");
$base = mysqli_select_db($dbpro, "laradb");



function conexionDB()
{

    $dbpro = new mysqli("localhost", "root", "", "laradb", 3306);
    mysqli_query($dbpro, "SET NAMES 'UTF8'");
    $base = mysqli_select_db($dbpro, "laradb");

    if ($dbpro->connect_error) {
        echo "Error de conexión: " . $dbpro->connect_error;
    } else {
        echo "Conectado correctamente";
    }

}

function consultarUsuario($usuarioBuscar)
{
    global $dbpro;
    $encontrado = false;

    $filt = $dbpro->prepare("SELECT usuario FROM usuarios WHERE usuario= ?");
    $filt->bind_param("s", $usuarioBuscar);
    $filt->execute();
    $res = $filt->get_result();
    $usuarioBuscar = $res->fetch_assoc();
    if ($res->num_rows > 0) {
        $encontrado = true;
    }

    return $encontrado;
}

function consultarContrasena($usuarioBuscar, $contrasenaBuscar)
{

    global $dbpro;
    $encontrada = false;

    $filt = $dbpro->prepare("SELECT contrasena FROM usuarios WHERE usuario = ? AND contrasena= ?");
    $filt->bind_param("ss", $usuarioBuscar, $contrasenaBuscar);
    $filt->execute();
    $res = $filt->get_result();
    if ($res->num_rows > 0) {
        $encontrada = true;
    }
    return $encontrada;
}

function devolverNivel($usuario)
{
    echo "Lanzando función";
    // Variable de ámbito global que contiene la conexión con la base de datos
    global $dbpro;
    // Nivel por defecto que va a indicar que no hay ningún usuario almacenado en db
    $nivel = -1; 

    $filt = $dbpro->prepare("SELECT nivel FROM usuarios WHERE usuario = ?");
    $filt->bind_param("s", $usuario);
    $filt->execute();
    $res = $filt->get_result();
    $fila = $res->fetch_assoc();
 
        if ($res->num_rows > 0) {
            $nivel = $fila["nivel"];
        }

        return $nivel;
    
}

function registrarUsuario($usuario, $contrasena, $nombre, $email)
{
    //echo "Lanzando función";
    global $dbpro;
    $filt = $dbpro->prepare("INSERT INTO usuarios SET usuario = ?, contrasena = ?, nombre = ?, nivel = 1, email = ?");
    $filt->bind_param("ssss", $usuario, $contrasena, $nombre, $email);
    $filt->execute();

}

function consultarAdmins(){
    global $dbpro;
    $filt = $dbpro->prepare("SELECT * FROM usuarios WHERE nivel = 0");
    $filt->execute();
    $res = $filt->get_result();
        return $res;
}

function mostrarUsuarios(){
 global $dbpro;
 $filt = $dbpro->prepare("SELECT * FROM usuarios");
        $filt->execute();
        $res = $filt->get_result();
        return $res;
}


function consultarPacientes($pacienteBuscar){
    global $dbpro; 

    $pacienteEncontrado = false;

    $filt = $dbpro->prepare("SELECT * FROM usuarios WHERE usuario = ? AND nivel = 1");
    $filt->bind_param("s", $pacienteBuscar);
    $filt->execute();
    $res = $filt->get_result();
    $pacienteBuscar = $res->fetch_assoc();
    
    if($res->num_rows > 0){
        $pacienteEncontrado = true;
    }
        return $pacienteEncontrado;
}

function consultarPsicologos(){
    global $dbpro;

    $filt = $dbpro->prepare("SELECT * FROM usuarios WHERE nivel = 2");
    $filt->execute();
    $res = $filt->get_result();
        return $res;
}

?>






