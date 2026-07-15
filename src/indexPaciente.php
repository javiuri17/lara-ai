<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="indexPaciente.css">
    <link rel="stylesheet" href="vistas/css/vistaPrincipal.css">
    <link rel="stylesheet" href="vistas/css/respuestaIA.css">
</head>
<body>
    <div id="vistaPrincipal">



    </div>
</body>

<script>
    $.ajax({
        type: "post",
        url: "vistas/vistaPrincipal.php",
        success: function (data) {
            //console.log("vistaPrincipal cargada correctamente");
            //console.log(data.slice(0, 300));
            $("#vistaPrincipal").html(data);
        }
    });


</script>


</html>