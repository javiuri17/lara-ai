<?php
session_start();
include "../seguridad/db.php"
    ?>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="vistas/css/tabla.css">
    <title>LARA - Tabla del administrador</title>
</head>

<body>
    <section class="container-tabla">
        <a class="btn-logout" href="seguridad/logout.php">Cerrar sesión</a>

        <h1 class="titulo-tabla">Tabla de administrador</h1>

        <table class="tabla-admin">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Nombre</th>
                    <th>Nivel</th>
                    <th>Email</th>
                    <th class="header-accion"></th>
                    <th class="header-accion"></th>
                </tr>

            </thead>

            <tbody>
                <?php

                //$filt = $dbpro->prepare("SELECT * FROM usuarios");
                //$filt->execute();
                //$res = $filt->get_result();
                $res = mostrarUsuarios();

                for ($i = 0; $i < $res->num_rows; $i++) {
                    $vec = $res->fetch_assoc();
                    ?>

                    <tr data-nivel="<?php echo $vec["nivel"]; ?>">

                        <td>
                            <?php echo $vec["usuario"]; ?>
                        </td>

                        <td>
                            <input id="contrasena_<?php echo $vec["usuario"] ?>"
                                value="<?php echo $vec["contrasena"]; ?>" />
                        </td>

                        <td>
                            <input id="nombre_<?php echo $vec["usuario"] ?>" value="<?php echo $vec["nombre"]; ?>" />
                        </td>

                        <td>
                            <input id="nivel_<?php echo $vec["usuario"] ?>" value="<?php echo $vec["nivel"]; ?>" />
                        </td>

                        <td>
                            <input id="email_<?php echo $vec["usuario"] ?>" value="<?php echo $vec["email"]; ?>" />
                        </td>

                        <!-- utilizo un botón para el usuario que quiero actualizar o eliminar en lugar de checkbox? Sí -->
                        <td>
                            <input type="button" id="actualizar" class="btn-actualizar" usuario="<?php echo $vec["usuario"] ?>"  value="actualizar">
                        </td>

                        <td>
                            <input type="button" id="borrar" class="btn-borrar" usuario="<?php echo $vec["usuario"] ?>" value="borrar">
                        </td>

                    </tr>
                <?php }

                ?>
            </tbody>
        </table>

        <div class="filtros-tabla">
            <button type="button" class="btn-activo active" value="">Todos</button>
            <button type="button" class="btn-filtro" data-nivel="0" value="">Administradores</button>
            <button type="button" class="btn-filtro" data-nivel="1" value="">Pacientes</button>
            <button type="button" class="btn-filtro" data-nivel="2" value="">Psicólogos</button>
        </div>
    </section>
</body>


<script>
    $(".btn-filtro").click(function () {
        let nivel = $(this).data("nivel");

        $(".btn-filtro").removeClass("active");

        $(this).addClass("active");

        if (nivel === "") {
            $(".tabla-admin tbody tr").show();

        } else {
            $(".tabla-admin tbody tr").hide();
            $('.tabla-admin tbody tr[data-nivel="' + nivel + '"]').show();
        }
    });


    $(".btn-actualizar").click(function () {
        let usuario = $(this).attr("usuario");

        let nombre = $("#nombre_" + usuario).val();
        let contrasena = $("#contrasena_" + usuario).val();
        let nivel = $("#nivel_" + usuario).val();
        let email = $("#email_" + usuario).val();
        let opcion = 0;

        $.ajax({
            url: "./controladores/controladorUsuarios.php",
            type: "post",
            data: {usuario, nombre, contrasena, nivel, email, opcion},
            success: function () {
                location.reload();
                //alert("Datos mandados con exito");
            },

            /**error: function(jqxhr, estado, excepcion) {
                alert("Excepcion: ", excepcion);
            }*/

        });
    });

    $(".btn-borrar").click(function () {
        let usuario =  $(this).attr("usuario");
        let opcion = 1;
     

        $.ajax({
            url: "./controladores/controladorUsuarios.php",
            type: "post",
            data: { usuario, opcion},
            success: function () {
                    

            }
        });
    
       
    });

</script>