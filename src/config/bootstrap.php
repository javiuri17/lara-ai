<?php 
// Este archivo va a preparar la configuración que va a utilizar nuestra capa de servicio de IA. De 
// esa forma, gemmaLogic solo debería poder acceder al modelo de IA que utilizamos a través de variables
// de entorno.

// esta línea apunta al directorio vendor en la carpeta del proyecto
require_once __DIR__ . "/../vendor/autoload.php";

// esta línea recibe la localización de la variable de entorno
$dotEnv = Dotenv\Dotenv::createImmutable(__DIR__ . "/..");


// load() lee el archivo con las variables de entorno para que luego puedan ser cargadas en la capa
// de servicio con $_ENV[] o getenv()
$dotEnv->load();




?>