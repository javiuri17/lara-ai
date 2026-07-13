
<section class="paginaCalendario">
    <a class="btn-logout" href="seguridad/logout.php">Cerrar sesión</a>

    <main id="card" class="calendar-card" aria-label="Planificador de citas">
        <calendar-multi
                min="2026-01-01"
                max="2026-12-31"
                locale="es-ES" 
                class="calendario">
            <svg
                aria-label="previous"
                slot="previous"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
            >
                <path d="M15.75 19.5 8.25 12l7.5-7.5"></path>
            </svg>

            <svg
                aria-label="next"
                slot="next"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
            >
                <path d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
            </svg>

            <calendar-month></calendar-month>
        </calendar-multi>
    </main>
</section>
<script type="module" src="https://unpkg.com/cally"></script>
