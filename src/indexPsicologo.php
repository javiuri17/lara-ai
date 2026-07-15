<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="indexPsicologo.css">
    <link rel="stylesheet" href="vistas/css/calendarioCitas.css">
    <title>Document</title>
</head>

<body>
    <div id="calendario">



    </div>
</body>

<script>
    $.ajax({
        type: "post",
        url: "vistas/calendarioCitas.php",
        success: function (data) { 
            $("#calendario").html(data);
        }
    });


</script>

</html>