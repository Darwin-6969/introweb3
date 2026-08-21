<?php

function renderNavbar()
{
?>

<header class="navbar-top">

    <div>

        <button
            class="btn btn-light"
            id="sidebarToggle"
        >

            <i class="bi bi-list fs-4"></i>

        </button>

    </div>


    <div class="d-flex align-items-center gap-3">

        <!-- NOTIFICACIONES -->
        <button class="btn btn-light position-relative">

            <i class="bi bi-bell fs-5"></i>

            <span class="position-absolute
                         top-0
                         start-100
                         translate-middle
                         badge
                         rounded-pill
                         bg-danger">

                3

            </span>

        </button>


        <!-- USUARIO -->
        <div class="dropdown">

            <button
                class="btn btn-light dropdown-toggle"
                data-bs-toggle="dropdown"
            >

                <i class="bi bi-person-circle me-1"></i>

                Administrador

            </button>


            <ul class="dropdown-menu dropdown-menu-end">

                <li>
                    <a class="dropdown-item" href="#">
                        <i class="bi bi-person me-2"></i>
                        Mi perfil
                    </a>
                </li>

                <li>
                    <a class="dropdown-item" href="#">
                        <i class="bi bi-gear me-2"></i>
                        Configuración
                    </a>
                </li>

                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item text-danger"
                       href="index.php">

                        <i class="bi bi-box-arrow-right me-2"></i>

                        Cerrar sesión

                    </a>
                </li>

            </ul>

        </div>

    </div>

</header>

<?php
}
