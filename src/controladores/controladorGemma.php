<?php 
session_start();
include "../services/gemmaLogic.php";



header("Content-Type: application/json; charset=UTF-8");

    $usuario = $_POST["usuario"];
    $mensaje = $_POST["mensaje"];
try {
    $mensaje = $_POST["mensaje"];

    if (!$mensaje || trim($mensaje) === "") {
        echo json_encode([
            "ok" => false,
            "error" => "El mensaje no puede estar vacío."
        ]);
            exit;
    }



    $gemma = new GoogleService();

    $respuestaIA = $gemma->enviarMensaje($usuario, $mensaje);


    echo json_encode([
        "ok" => true,
        "respuesta" => $respuestaIA
    ], JSON_UNESCAPED_UNICODE);

} catch (Exception $e) {
    echo json_encode([
        "ok" => false,
        "error" => $e->getMessage()
    ], JSON_UNESCAPED_UNICODE);
}



?>