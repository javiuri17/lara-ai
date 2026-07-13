<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="registroLARA.css">
    <title>LARA - Registro de usuarios</title>
</head>
<body>
    <div id="registro">
        <?php 
            if(isset($_GET['error']) && $_GET['error'] === 'vacios_campos'){ ?>
            <p style="color:red; text-align:center;">
                Ninguno de los campos puede quedarse vacío
            </p>
        <?php }?>

        <?php 
            if(isset($_GET['error']) && $_GET['error'] === 'contrasena_corta'){ ?>
            <p style="color:red; text-align:center;">
                La contraseña debe tener un mínimo de ocho caracteres
            </p>
        <?php }?>

        <?php 
            if(isset($_GET['error']) && $_GET['error'] === 'nombre_sinnumeros'){ ?>
            <p style="color:red; text-align:center;">
                El nombre del usuario que intenta registrarse no puede contener números
            </p>
        <?php }?>

         <?php 
            if(isset($_GET['error']) && $_GET['error'] === 'usuario_existe'){ ?>
            <p style="color:red; text-align:center;">
                El usuario que intentas registrar ya existe
            </p>
        <?php }?>


        <form action="../seguridad/seguridadRegistro.php" method="post">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario"><br>
            <label for="contrasena">Contraseña:</label><br>
            <input type="text" id="contrasena" name="contrasena"><br><br>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre">
            <label for="email">Correo electrónico:</label><br>
            <input type="email" id="email" name="correo-electronico"><br><br>
            <input type="submit" class="btnSub" value="submit">

            <input type="text" name="opcion" value="" hidden>
        </form>

        <button id="btnlogeo">login</button>
    </div>
</body>

<script>
    $("#btnlogeo").click(function () {
       location.href = "loginLARA.php";
    });
</script>
</html>