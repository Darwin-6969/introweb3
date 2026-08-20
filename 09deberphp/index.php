<?php
// Página principal del sistema de control vehicular
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>VEHIX | Control de Accesos</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>
        :root {
            --negro: #080b0a;
            --panel: #101513;
            --panel-2: #151b18;
            --verde: #b6f34a;
            --verde-oscuro: #86bd26;
            --gris: #8d9791;
            --borde: #28302c;
            --blanco: #f1f5f2;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background:
                radial-gradient(circle at 80% 10%, rgba(182,243,74,.08), transparent 25%),
                radial-gradient(circle at 10% 90%, rgba(182,243,74,.05), transparent 30%),
                var(--negro);
            color: var(--blanco);
            font-family: Arial, Helvetica, sans-serif;
        }

        .contenedor {
            max-width: 1100px;
        }

        /* Barra superior */
        .barra-superior {
            border-bottom: 1px solid var(--borde);
            padding: 18px 0;
        }

        .marca {
            font-weight: 900;
            letter-spacing: 3px;
            font-size: 22px;
        }

        .marca span {
            color: var(--verde);
        }

        .estado {
            color: var(--verde);
            font-size: 12px;
            letter-spacing: 1px;
            font-weight: bold;
        }

        .punto {
            width: 8px;
            height: 8px;
            background: var(--verde);
            border-radius: 50%;
            display: inline-block;
            box-shadow: 0 0 12px var(--verde);
            animation: pulsar 1.8s infinite;
        }

        @keyframes pulsar {
            0%, 100% {
                opacity: 1;
            }

            50% {
                opacity: .35;
            }
        }

        /* Panel */
        .panel-principal {
            margin-top: 55px;
            background: var(--panel);
            border: 1px solid var(--borde);
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 25px 70px rgba(0,0,0,.45);
        }

        /* Columna izquierda */
        .intro {
            background:
                linear-gradient(rgba(16,21,19,.88), rgba(16,21,19,.98)),
                radial-gradient(circle at center, #293629, #101513);
            min-height: 600px;
            padding: 55px 40px;
            border-right: 1px solid var(--borde);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .numero {
            font-size: 11px;
            color: var(--verde);
            letter-spacing: 3px;
            font-weight: bold;
        }

        .titulo {
            font-size: clamp(42px, 6vw, 72px);
            line-height: .9;
            font-weight: 900;
            letter-spacing: -4px;
            margin-top: 20px;
        }

        .titulo span {
            color: var(--verde);
        }

        .descripcion {
            color: var(--gris);
            max-width: 390px;
            line-height: 1.7;
            margin-top: 25px;
        }

        .vehiculo-icono {
            font-size: 100px;
            color: transparent;
            -webkit-text-stroke: 1px rgba(182,243,74,.35);
            text-align: center;
        }

        .mini-info {
            border-top: 1px solid var(--borde);
            padding-top: 20px;
        }

        .mini-info small {
            color: var(--gris);
        }

        /* Formulario */
        .formulario {
            padding: 55px 45px;
            background: #0c100e;
        }

        .formulario-titulo {
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .formulario-subtitulo {
            color: var(--gris);
            font-size: 14px;
            margin-bottom: 40px;
        }

        .campo {
            margin-bottom: 28px;
        }

        .campo label {
            color: #cbd3ce;
            font-size: 12px;
            letter-spacing: 1px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 9px;
        }

        .form-control,
        .form-select {
            background: var(--panel-2);
            color: var(--blanco);
            border: 1px solid var(--borde);
            border-radius: 3px;
            padding: 15px;
            transition: .2s;
        }

        .form-control:focus,
        .form-select:focus {
            background: #19201c;
            color: white;
            border-color: var(--verde);
            box-shadow: 0 0 0 3px rgba(182,243,74,.08);
        }

        .form-control::placeholder {
            color: #59635d;
        }

        .form-select option {
            background: var(--panel);
        }

        /* Matrícula */
        .placa-contenedor {
            position: relative;
        }

        .placa-contenedor::before {
            content: "EC";
            position: absolute;
            left: 12px;
            top: 13px;
            bottom: 13px;
            width: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--verde);
            color: #111;
            font-size: 11px;
            font-weight: 900;
            z-index: 2;
            border-radius: 2px;
        }

        .placa-input {
            padding-left: 60px !important;
            font-weight: 800;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .ayuda {
            color: #59635d;
            font-size: 11px;
            margin-top: 8px;
        }

        /* Botón */
        .btn-acceso {
            width: 100%;
            background: var(--verde);
            color: #10140e;
            border: none;
            border-radius: 3px;
            padding: 16px;
            font-weight: 900;
            letter-spacing: 1px;
            transition: .2s;
        }

        .btn-acceso:hover {
            background: #c9ff69;
            color: #10140e;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(182,243,74,.15);
        }

        .seguridad {
            margin-top: 25px;
            color: #59635d;
            font-size: 11px;
            text-align: center;
        }

        .seguridad i {
            color: var(--verde);
        }

        /* Responsive */
        @media (max-width: 767px) {
            .panel-principal {
                margin-top: 25px;
            }

            .intro {
                min-height: auto;
                padding: 35px 25px;
                border-right: none;
                border-bottom: 1px solid var(--borde);
            }

            .vehiculo-icono {
                font-size: 65px;
                margin-top: 30px;
            }

            .formulario {
                padding: 35px 25px;
            }

            .titulo {
                font-size: 50px;
            }
        }
    </style>
</head>

<body>

<div class="container contenedor">

    <!-- Barra superior -->
    <div class="barra-superior d-flex justify-content-between align-items-center">

        <div class="marca">
            VEH<span>IX</span>
        </div>

        <div class="estado">
            <span class="punto me-2"></span>
            SISTEMA OPERATIVO
        </div>

    </div>

    <!-- Panel principal -->
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
                            Registre el ingreso de vehículos de forma rápida,
                            ordenada y segura. Complete los datos de la unidad
                            para generar su comprobante de entrada.
                        </p>
                    </div>

                    <div>

                        <div class="vehiculo-icono">
                            <i class="bi bi-car-front"></i>
                        </div>

                        <div class="mini-info d-flex justify-content-between">
                            <div>
                                <small>ESTACIÓN</small><br>
                                <strong>ENTRADA A-01</strong>
                            </div>

                            <div class="text-end">
                                <small>ESTADO</small><br>
                                <strong style="color:#b6f34a;">
                                    DISPONIBLE
                                </strong>
                            </div>
                        </div>

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

                    <form action="registro.php" method="POST">

                        <!-- Placa -->
                        <div class="campo">

                            <label for="placa">
                                <i class="bi bi-upc-scan me-1"></i>
                                Identificación / Placa
                            </label>

                            <div class="placa-contenedor">

                                <input
                                    type="text"
                                    class="form-control placa-input"
                                    id="placa"
                                    name="placa"
                                    placeholder="ABC-1234"
                                    maxlength="10"
                                    autocomplete="off"
                                    required
                                >

                            </div>

                            <div class="ayuda">
                                FORMATO DE IDENTIFICACIÓN VEHICULAR
                            </div>

                        </div>

                        <!-- Tipo -->
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
                                <option value="">Seleccione el tipo...</option>
                                <option value="Automóvil">Automóvil</option>
                                <option value="Motocicleta">Motocicleta</option>
                                <option value="Camioneta">Camioneta</option>
                                <option value="Camión">Camión</option>
                                <option value="Bus">Bus</option>
                            </select>

                        </div>

                        <!-- Hora -->
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

                        <!-- Botón -->
                        <button
                            type="submit"
                            class="btn btn-acceso"
                        >
                            <i class="bi bi-box-arrow-in-right me-2"></i>
                            CONFIRMAR INGRESO
                        </button>

                    </form>

                    <div class="seguridad">
                        <i class="bi bi-shield-lock-fill me-1"></i>
                        INFORMACIÓN PROCESADA MEDIANTE CONEXIÓN SEGURA
                    </div>

                </section>

            </div>

        </div>

    </div>

    <div class="text-center py-4">
        <small style="color:#3f4943;">
            VEHIX CONTROL SYSTEM · TERMINAL 01
        </small>
    </div>

</div>

</body>
</html>
