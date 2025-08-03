<?php
    $modoOscuro = false;
?>

<nav class="nav-login">
    <div class="nav-login-container">
        <div class="group-nav-elements">
            <img src="../public/assets/img/ifts19_logo.png" alt="Logo de IFTS 19" class="nav-login-logo">
            <p class="nav-title">Final desarrollo de Aplicaciones WEB - 2025</p>
        </div>        
        <div class="group-nav-elements">
            <button id="theme-toggle" aria-label="Cambiar tema">
                <!-- Ícono Luna -->
                <svg id="moon-icon" style="display: <?= $modoOscuro ? 'none' : 'inline' ?>;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z"/>
                </svg>
                <!-- Ícono Sol -->
                 <svg id="sun-icon" style="display: <?= $modoOscuro ? 'inline' : 'none' ?>;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="33" height="33" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="4"/> <!-- Centro del sol -->
                    <path d="M12 2v2m0 16v2M4.93 4.93l1.41 1.41m11.32 11.32l1.41 1.41M2 12h2m16 0h2M4.93 19.07l1.41-1.41m11.32-11.32l1.41-1.41"/> <!-- Rayos -->
                </svg>
            </button>
            <div class="nav-date">
                <span id="fecha-actual">Fecha Actual</span>
            </div>
        </div>
    </div>
</nav>