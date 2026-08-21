<?php

require_once 'components/header.php';
require_once 'components/menu.php';
require_once 'components/navbar.php';
require_once 'components/footer.php';

renderHeader('Ingreso de Vehículo | VEHIX');

renderMenu();

?>

<div class="main-content">

    <?php renderNavbar(); ?>

    <main class="content">

        <!-- AQUÍ VA TU DISEÑO ACTUAL -->

        <div class="panel-principal">

            <div class="row g-0">

                <!-- Presentación -->
                <div class="col-lg-6">

                    <section class="intro">

                        <div>

                            <div class="numero">
                                // TERMINAL 01
                            </div>

                            <h1 class="titulo">
                                CONTROL<br>
                                <span>DE ACCESO.</span>
                            </h1>

                            <p class="descripcion">
                                Registre el ingreso de vehículos
                                de forma rápida, ordenada y segura.
                            </p>

                        </div>

                        <div class="vehiculo-icono">
                            <i class="bi bi-car-front"></i>
                        </div>

                    </section>

                </div>


                <!-- Formulario -->
                <div class="col-lg-6">

                    <section class="formulario">

                        <div class="numero">
                            REGISTRO / VEHÍCULO
                        </div>

                        <h2 class="formulario-titulo mt-2">
                            Nueva entrada
                        </h2>

                        <p class="formulario-subtitulo">
                            Introduzca los datos solicitados.
                        </p>


                        <form action="ingreso_vehiculo.php" method="POST">

                            <div class="campo">

                                <label for="placa">
                                    <i class="bi bi-upc-scan me-1"></i>
                                    Identificación / Placa
                                </label>

                                <input
                                    type="text"
                                    class="form-control placa-input"
                                    id="placa"
                                    name="placa"
                                    placeholder="ABC-1234"
                                    maxlength="10"
                                    required
                                >

                            </div>


                            <div class="campo">

                                <label for="tipo">
                                    <i class="bi bi-diagram-3 me-1"></i>
                                    Categoría
                                </label>

                                <select
                                    class="form-select"
                                    id="tipo"
                                    name="tipo"
                                    required
                                >

                                    <option value="">
                                        Seleccione el tipo...
                                    </option>

                                    <option value="Automóvil">
                                        Automóvil
                                    </option>

                                    <option value="Motocicleta">
                                        Motocicleta
                                    </option>

                                    <option value="Camioneta">
                                        Camioneta
                                    </option>

                                    <option value="Camión">
                                        Camión
                                    </option>

                                    <option value="Bus">
                                        Bus
                                    </option>

                                </select>

                            </div>


                            <div class="campo">

                                <label for="hora">
                                    <i class="bi bi-stopwatch me-1"></i>
                                    Hora de entrada
                                </label>

                                <input
                                    type="time"
                                    class="form-control"
                                    id="hora"
                                    name="hora"
                                    required
                                >

                            </div>


                            <button
                                type="submit"
                                class="btn btn-acceso"
                            >

                                <i class="bi bi-box-arrow-in-right me-2"></i>

                                CONFIRMAR INGRESO

                            </button>

                        </form>

                    </section>

                </div>

            </div>

        </div>

    </main>


    <?php renderFooter(); ?>

</div>

</body>
</html>
