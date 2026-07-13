<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="loginLARA.css">
    <title>LARA - Inicio de sesión</title>
</head>

<body>
   <?php if (isset($_GET['error']) && $_GET['error'] === 'campos_vacios') { ?>
    <p style="color:red; text-align:center;">
        No puedes dejar el usuario ni la contraseña vacíos
    </p>
<?php }
    if (isset($_GET['error']) && $_GET['error'] === 'usuario_inexistente') { ?>
    <p style="color:red; text-align:center;">
        El usuario no existe
    </p>
<?php } 
if (isset($_GET['error']) && $_GET['error'] === 'contraseña_invalida') { ?>
    <p style="color:red; text-align:center;">
        La contraseña no es correcta
    </p>
<?php } ?>
    <div id="login">
        <form action="../seguridad/seguridad.php" method="POST">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario">
            <label for="contrasena">Contraseña:</label>
            <input type="text" id="contrasena" name="contrasena">
            <input type="submit" class="btnSub" value="submit">
        </form>
        
        <button id="btnregistro">registro</button>
    </div>


    <div id="vistaPrincipal">

    </div>

  
</body>

<script>
    $("#btnregistro").click(function () {
        location.href = "registroLARA.php";
    });
</script>