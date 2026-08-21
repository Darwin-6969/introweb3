<?php
session_start();
require_once 'components/header.php';
require_once 'components/menu.php';
require_once 'components/navbar.php';
require_once 'components/footer.php';

renderHeader('Dashboard | VEHIX');

renderMenu();

?>

<div class="main-content">

    <?php renderNavbar(); ?>


    <main class="content">

        <div class="container-fluid">


            <!-- ENCABEZADO -->

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>

                    <h1 class="h3 mb-1">
                        Dashboard - <?= $_SESSION['usuario'] ?>
                    </h1>


                    <p class="text-muted mb-0">
                        Panel principal del sistema
                    </p>

                </div>

            </div>


            <!-- TARJETAS -->

            <div class="row g-4">


                <!-- VEHÍCULOS -->

                <div class="col-lg-3 col-md-6">

                    <div class="card dashboard-card bg-primary text-white">

                        <div class="card-body">

                            <div class="d-flex justify-content-between">

                                <div>

                                    <h3>
                                        120
                                    </h3>

                                    <p class="mb-0">
                                        Vehículos
                                    </p>

                                </div>

                                <i class="bi bi-car-front-fill dashboard-icon"></i>

                            </div>

                        </div>

                        <div class="card-footer">

                            <a
                                href="ingreso_vehiculo.php"
                                class="text-white text-decoration-none"
                            >

                                Ver vehículos

                                <i class="bi bi-arrow-right"></i>

                            </a>

                        </div>

                    </div>

                </div>


                <!-- INGRESOS -->

                <div class="col-lg-3 col-md-6">

                    <div class="card dashboard-card bg-success text-white">

                        <div class="card-body">

                            <div class="d-flex justify-content-between">

                                <div>

                                    <h3>
                                        85
                                    </h3>

                                    <p class="mb-0">
                                        Ingresos hoy
                                    </p>

                                </div>

                                <i class="bi bi-box-arrow-in-right dashboard-icon"></i>

                            </div>

                        </div>

                        <div class="card-footer">

                            <a
                                href="ingreso_vehiculo.php"
                                class="text-white text-decoration-none"
                            >

                                Registrar ingreso

                                <i class="bi bi-arrow-right"></i>

                            </a>

                        </div>

                    </div>

                </div>


                <!-- VEHÍCULOS DENTRO -->

                <div class="col-lg-3 col-md-6">

                    <div class="card dashboard-card bg-warning text-dark">

                        <div class="card-body">

                            <div class="d-flex justify-content-between">

                                <div>

                                    <h3>
                                        35
                                    </h3>

                                    <p class="mb-0">
                                        Vehículos dentro
                                    </p>

                                </div>

                                <i class="bi bi-car-front dashboard-icon"></i>

                            </div>

                        </div>

                        <div class="card-footer">

                            Vehículos actualmente dentro

                        </div>

                    </div>

                </div>


                <!-- ALERTAS -->

                <div class="col-lg-3 col-md-6">

                    <div class="card dashboard-card bg-danger text-white">

                        <div class="card-body">

                            <div class="d-flex justify-content-between">

                                <div>

                                    <h3>
                                        5
                                    </h3>

                                    <p class="mb-0">
                                        Alertas
                                    </p>

                                </div>

                                <i class="bi bi-exclamation-triangle dashboard-icon"></i>

                            </div>

                        </div>

                        <div class="card-footer">

                            Revisar alertas

                        </div>

                    </div>

                </div>

            </div>


            <!-- CONTENIDO INFERIOR -->

            <div class="row mt-4">


                <!-- TABLA -->

                <div class="col-lg-8">

                    <div class="card shadow-sm">

                        <div class="card-header">

                            <h5 class="mb-0">

                                <i class="bi bi-clock-history me-2"></i>

                                Últimos ingresos

                            </h5>

                        </div>


                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-hover">

                                    <thead>

                                        <tr>

                                            <th>
                                                Placa
                                            </th>

                                            <th>
                                                Vehículo
                                            </th>

                                            <th>
                                                Hora
                                            </th>

                                            <th>
                                                Estado
                                            </th>

                                        </tr>

                                    </thead>


                                    <tbody>

                                        <tr>

                                            <td>
                                                ABC-123
                                            </td>

                                            <td>
                                                Toyota Corolla
                                            </td>

                                            <td>
                                                08:30
                                            </td>

                                            <td>

                                                <span class="badge bg-success">
                                                    Dentro
                                                </span>

                                            </td>

                                        </tr>


                                        <tr>

                                            <td>
                                                XYZ-456
                                            </td>

                                            <td>
                                                Honda Civic
                                            </td>

                                            <td>
                                                09:15
                                            </td>

                                            <td>

                                                <span class="badge bg-success">
                                                    Dentro
                                                </span>

                                            </td>

                                        </tr>


                                        <tr>

                                            <td>
                                                DEF-789
                                            </td>

                                            <td>
                                                Ford Focus
                                            </td>

                                            <td>
                                                10:20
                                            </td>

                                            <td>

                                                <span class="badge bg-secondary">
                                                    Salió
                                                </span>

                                            </td>

                                        </tr>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- ACCIONES -->

                <div class="col-lg-4">

                    <div class="card shadow-sm">

                        <div class="card-header">

                            <h5 class="mb-0">
                                Acciones rápidas
                            </h5>

                        </div>


                        <div class="card-body">


                            <a
                                href="ingreso_vehiculo.php"
                                class="btn btn-primary w-100 mb-2"
                            >

                                <i class="bi bi-car-front me-2"></i>

                                Ingresar vehículo

                            </a>


                            <a
                                href="registro.php"
                                class="btn btn-success w-100 mb-2"
                            >

                                <i class="bi bi-person-plus me-2"></i>

                                Registrar usuario

                            </a>


                            <button
                                class="btn btn-secondary w-100"
                            >

                                <i class="bi bi-file-earmark-text me-2"></i>

                                Ver reportes

                            </button>


                        </div>

                    </div>

                </div>

            </div>

        </div>

    </main>


    <?php renderFooter(); ?>

</div>


<script src="assets/js/app.js"></script>

</body>

</html>
