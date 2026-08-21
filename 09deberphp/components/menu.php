<?php

function renderMenu()
{
?>

<aside class="sidebar" id="sidebar">

    <!-- LOGO -->
    <div class="sidebar-brand">

        <i class="bi bi-p-square-fill me-2"></i>

        <span>Parking System</span>

    </div>


    <!-- USUARIO -->
    <div class="sidebar-user">

        <div class="user-icon">
            <i class="bi bi-person-fill"></i>
        </div>

        <div>
            <strong>Administrador</strong>

            <small>
                <i class="bi bi-circle-fill text-success"></i>
                En línea
            </small>
        </div>

    </div>


    <!-- MENU -->
    <nav class="sidebar-menu">

        <div class="menu-title">
            PRINCIPAL
        </div>


        <a href="dashboard.php"
           class="menu-link active">

            <i class="bi bi-speedometer2"></i>

            <span>Dashboard</span>

        </a>


        <a href="ingreso_vehiculo.php"
           class="menu-link">

            <i class="bi bi-car-front"></i>

            <span>Ingresar vehículo</span>

        </a>


        <a href="#"
           class="menu-link">

            <i class="bi bi-list-ul"></i>

            <span>Vehículos</span>

        </a>


        <div class="menu-title">
            USUARIOS
        </div>


        <a href="registro.php"
           class="menu-link">

            <i class="bi bi-person-plus"></i>

            <span>Registrar usuario</span>

        </a>


        <a href="#"
           class="menu-link">

            <i class="bi bi-people"></i>

            <span>Usuarios</span>

        </a>


        <div class="menu-title">
            SISTEMA
        </div>


        <a href="#"
           class="menu-link">

            <i class="bi bi-bar-chart"></i>

            <span>Reportes</span>

        </a>


        <a href="#"
           class="menu-link">

            <i class="bi bi-gear"></i>

            <span>Configuración</span>

        </a>


        <a href="index.php"
           class="menu-link text-danger">

            <i class="bi bi-box-arrow-right"></i>

            <span>Cerrar sesión</span>

        </a>

    </nav>

</aside>

<?php
}
