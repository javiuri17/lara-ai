<?php 
session_start();
include "../seguridad/db.php";

$pacienteBuscar = $_SESSION["usuario"];



?>

<title>LARA - Nuevo chat</title>

<div class="vistaPrincipal-layout sidebar-open">
    <aside class="barraLat-chiquita" hidden onclick="desplegar()">
        <ul>
            <li>
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#e3e3e3">
                        <path
                            d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm440-80h120v-560H640v560Zm-80 0v-560H200v560h360Zm80 0h120-120Z" />
                    </svg>
                </button>
            </li>
            <li>
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#e3e3e3">
                        <path
                            d="M120-160v-600q0-33 23.5-56.5T200-840h480q33 0 56.5 23.5T760-760v203q-10-2-20-2.5t-20-.5q-10 0-20 .5t-20 2.5v-203H200v400h283q-2 10-2.5 20t-.5 20q0 10 .5 20t2.5 20H240L120-160Zm160-440h320v-80H280v80Zm0 160h200v-80H280v80Zm400 280v-120H560v-80h120v-120h80v120h120v80H760v120h-80ZM200-360v-400 400Z" />
                    </svg>
                </button>
            </li>
            <li>
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#e3e3e3">
                        <path
                            d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
                    </svg>
                </button>
            </li>
        </ul>
    </aside>

    <aside class="barraLat-grande">
         <ul>
            <li>
                <button onclick="desplegar()" class="btn-toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#e3e3e3">
                        <path
                            d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm440-80h120v-560H640v560Zm-80 0v-560H200v560h360Zm80 0h120-120Z" />
                    </svg>
                </button>
            </li>
            <li>
                <button id="">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#e3e3e3">
                        <path
                            d="M120-160v-600q0-33 23.5-56.5T200-840h480q33 0 56.5 23.5T760-760v203q-10-2-20-2.5t-20-.5q-10 0-20 .5t-20 2.5v-203H200v400h283q-2 10-2.5 20t-.5 20q0 10 .5 20t2.5 20H240L120-160Zm160-440h320v-80H280v80Zm0 160h200v-80H280v80Zm400 280v-120H560v-80h120v-120h80v120h120v80H760v120h-80ZM200-360v-400 400Z" />
                    </svg>
                </button>
                <span class="etiqueta">New chat</span>

            </li>
            <li>
                <button id="">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#e3e3e3">
                        <path
                            d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
                    </svg>
                </button>
                <span class="etiqueta">Search chats</span>
            </li>
        </ul>

        <ul>
            <li>
                <a class="btn-logout" href="seguridad/logout.php">Cerrar sesión</a>
            </li>
        </ul>
    </aside>

    <section class="laraWrapper">
    
        <header class="heading-principal">How are you feeling today, user?</header>
        <div class="ai-container">
            <input type="text" class="ai-input" placeholder="Explain what you are feeling and its cause" />


            <div class="button-group">
                <button type="button" id="enviar" usuario="<?php echo htmlspecialchars($pacienteBuscar) ?>" class="ai-button submit">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true"
                        style="height:16px;width:16px;" class="ai-icon">
                        <path fill-rule="evenodd"
                            d="M5 4a.75.75 0 0 1 .738.616l.252 1.388A1.25 1.25 0 0 0 6.996 7.01l1.388.252a.75.75 0 0 1 0 1.476l-1.388.252A1.25 1.25 0 0 0 5.99 9.996l-.252 1.388a.75.75 0 0 1-1.476 0L4.01 9.996A1.25 1.25 0 0 0 3.004 8.99l-1.388-.252a.75.75 0 0 1 0-1.476l1.388-.252A1.25 1.25 0 0 0 4.01 6.004l.252-1.388A.75.75 0 0 1 5 4ZM12 1a.75.75 0 0 1 .721.544l.195.682c.118.415.443.74.858.858l.682.195a.75.75 0 0 1 0 1.442l-.682.195a1.25 1.25 0 0 0-.858.858l-.195.682a.75.75 0 0 1-1.442 0l-.195-.682a1.25 1.25 0 0 0-.858-.858l-.682-.195a.75.75 0 0 1 0-1.442l.682-.195a1.25 1.25 0 0 0 .858-.858l.195-.682A.75.75 0 0 1 12 1ZM10 11a.75.75 0 0 1 .728.568.968.968 0 0 0 .704.704.75.75 0 0 1 0 1.456.968.968 0 0 0-.704.704.75.75 0 0 1-1.456 0 .968.968 0 0 0-.704-.704.75.75 0 0 1 0-1.456.968.968 0 0 0 .704-.704A.75.75 0 0 1 10 11Z"
                            clip-rule="evenodd">
                        </path>
                    </svg>
                    Enviar respuesta
                </button>
            </div>
        </div>
    </section>
   
</div>

<script>
// Enviamos el mensaje almacenado en ai-input junto con el usuario
$("#enviar").click(function () {
    let usuario = $(this).attr("usuario");
    let mensaje = $(".ai-input").val();

    $.ajax({
        type: "post",
        url: "controladores/controladorGemma.php",
        data: {usuario, mensaje},

        dataType: "json",
        success: function (response) {
            if(response.ok){
                $("#vistaPrincipal").load("vistas/respuestaIA.php", function () {
                    $("#injectBox").text(mensaje);
                    $("#aiAnswerBox").text(response.respuesta);
                    $(".aiInput2").val("");
                });
                //console.log(data.respuesta);
            } else {
                console.log(response.error);
            }
        },

        error: function (xhr, estado, error){
            console.log("Estado de la llamada: ",estado);
            console.log("Error en la llamada: ",error);
        }
    });
});


(() => {
    const layout = document.querySelector(".vistaPrincipal-layout");
    const barraLatGrand = layout?.querySelector(".barraLat-grande");
    const barraLatPeq = layout?.querySelector(".barraLat-chiquita");

    if (!layout || !barraLatGrand || !barraLatPeq) {
        console.error("No se han encontrado elementos de la barra lateral");
        return;
    }

    function setSidebar(openBigSidebar) {
        barraLatGrand.hidden = !openBigSidebar;
        barraLatPeq.hidden = openBigSidebar;

        layout.classList.toggle("sidebar-open", openBigSidebar);
        layout.classList.toggle("sidebar-small", !openBigSidebar);
    }

    setSidebar(true);

    window.desplegar = function () {
        setSidebar(barraLatGrand.hidden);
    };
})();

    var enviarPagina2 = document.getElementById("enviar");

    /*enviarPagina2.addEventListener("click", () => {
        location.href = "vistas/respuestaIA.php";
    });*/
</script>
    

