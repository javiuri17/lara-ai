<?php 

    include "../seguridad/db.php";
    include '../modelos/modeloChats.php';
    include "../config/bootstrap.php"; 

    class GoogleService{
        private $apiKey;
        private $modelo;


        //prepara la configuración que necesita la capa de servicio antes de mandarle nada a OpenRouter
        function __construct(){ 
            $this->apiKey = $_ENV["OPENROUTER_API_KEY"] ?? getenv("OPENROUTER_API_KEY");
            $this->modelo = $_ENV["OPENROUTER_MODEL"] ?? getenv("OPENROUTER_MODEL") ?:"google/gemma-4-31b-it:free";
        }

        function enviarMensaje($usuario, $mensaje) {
            $chats = new chats();

            //echo " usuario que enviamos: " . $usuario;

            // Endpoint de OpenRouter a donde vamos a mandar la solicitud
            $url = "https://openrouter.ai/api/v1/chat/completions";
            //Datos que se convertirán a JSON y se mandan al gateway, incluyendo el modelo de IA
            $datos = [
            "model" =>  $this->modelo,  
            // Los mensajes con el rol sistema dirigen el comportamiento de la IA 
            "messages" => [
                
                    [
                        "role" => "system",
                        "content" => "
                            You are an AI assistant called LARA inside a psychology support platform.
                            Do not repeat your name after the first interaction with every user.
                            You must be helpful, calm and respectful.
                            You must not diagnose mental illnesses.
                            You must not replace a psychologist.
                            You must analyze the things that a user says to you during a conversation, and
                            detect if there are any evidence of potential mental disorders which that particular user might have.
                            You must give guidelines to follow through with a psychologist if necessary.
                            "
                    ], 

                    [
                        // Y en esta variable mensaje se almacenaría la respuesta del usuario
                        "role" =>  "user",
                        "content"=> $mensaje
                    ],
                ]


            ];

            // Iniciamos una request que apunta al endpoint de OpenRouter
            $ch = curl_init($url); 
     
            curl_setopt_array($ch, [
 
                // La respuesta de la IA vuelve como un string
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true, 
                //Headers que pide OpenRouter, indicándole que estamos mandando los datos como un objeto JSON,
                //mientras que la Auth manda nuestra api key
                CURLOPT_HTTPHEADER => [
                    "Content-Type: application/json",
                    "Authorization: Bearer " . $this->apiKey
                ],
                //Convertimos nuestro array en un json
                CURLOPT_POSTFIELDS => json_encode($datos, JSON_UNESCAPED_UNICODE),
                CURLOPT_TIMEOUT => 30
            ]);
            

                $respuestaCrudo = curl_exec($ch);


                if($respuestaCrudo === false){
                    $error = curl_error($ch);
                    curl_close($ch);
                    throw new Exception("cURL error: " . $error);
                }

                $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);


                $resultado = json_decode($respuestaCrudo, true);

                //echo "\n usuario que enviamos: " . $usuario;

                //echo " respuesta que recibimos: " . $respuesta;

                //echo "mensaje que recibimos: " . $this->extraerTexto($resultado); 

                if(json_last_error() !== JSON_ERROR_NONE){
                    throw new Exception("Invalid JSON response from OpenRouter.");
                }

                
                if($httpcode >= 400){
                    $mensajeError = $resultado["error"]["message"] ?? "Unknown OpenRouter API error.";
                    throw new Exception($mensajeError);
                }

                $respuestaFormateada = $this->extraerTexto($resultado);

                $chats->guardarChats($usuario, $mensaje, $respuestaFormateada);
               
                return $respuestaFormateada;

        }

        // se encarga de extraer la respuesta de la IA en texto        
        function extraerTexto($resultado){

            if(isset($resultado["choices"][0]["message"]["content"])){
                //Aquí devuelve el resultado OpenRouter
                return $resultado["choices"][0]["message"]["content"];
            }

            // En caso de que el if falle, mandamos un mensaje de error en su lugar
            return "No valid response received from AI";
        }

            
    }

?>