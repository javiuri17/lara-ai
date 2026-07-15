<?php 
session_start();
//$usuario = $_POST["usuario"];
//$contrasena = $_POST["contrasena"];
//$nombre = $_POST["nombre"];
//$nivel = $_POST["nivel"];
//$email = $_POST["email"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="indexAdmin.css">
    <title>Document</title>
</head>

<body>

    <div id="tabla">


    </div>

</body>

<script>
    $.ajax({
        type: "post",
        url: "vistas/tabla.php",
        //data: { usuario, contrasena, nombre, nivel, email},
        success: function (data) {
            $("#tabla").html(data);
            console.log(data);
        }
    });

</script>

</html>