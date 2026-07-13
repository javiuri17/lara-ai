<?php 


class chats{

    function guardarChats($usuario, $mensaje, $respuestaFormateada){
        global $dbpro;

        //Estas variables registran la conexión con la IA y desconexión
        $fechaConexion= time();
        $fechaDesconexion = time();

        //Primera consulta para guardar el chat en el historial
        $filt = $dbpro->prepare("INSERT INTO chats SET usuario = ?, mensaje = ?, respuesta = ?");
        $filt->bind_param("sss", $usuario, $mensaje, $respuestaFormateada);
        $filt->execute();
        $res = $filt->get_result();
    }


    function eliminarChats(){}

}

?>