<?php

// Verificar que el formulario haya sido enviado mediante POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    $error = "Acceso inválido. No se recibieron datos del registro.";

} else {

    // Recibir información del formulario
    $placa = trim($_POST["placa"] ?? "");
    $tipo  = trim($_POST["tipo"] ?? "");
    $hora  = trim($_POST["hora"] ?? "");

    // Validación
    if ($placa === "" || $tipo === "" || $hora === "") {

        $error = "No se puede completar el registro porque existen campos vacíos.";

    } else {

        $registroCorrecto = true;

        // Convertir placa a mayúsculas para mostrarla uniformemente
        $placa = strtoupper($placa);
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>VEHIX | Registro</title>

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
            --gris: #8d9791;
            --borde: #28302c;
            --blanco: #f1f5f2;
            --rojo: #ff6262;
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            background:
                radial-gradient(
                    circle at 50% 0%,
                    rgba(182,243,74,.08),
                    transparent 35%
                ),
                var(--negro);
            color: var(--blanco);
            font-family: Arial, Helvetica, sans-serif;
        }

        .contenedor {
            max-width: 900px;
        }

        .barra {
            padding: 20px 0;
            border-bottom: 1px solid var(--borde);
        }

        .logo {
            font-weight: 900;
            letter-spacing: 3px;
            font-size: 21px;
        }

        .logo span {
            color: var(--verde);
        }

        .terminal {
            font-size: 11px;
            color: var(--gris);
            letter-spacing: 1px;
        }

        .terminal span {
            color: var(--verde);
        }

        /* Tarjeta */
        .tarjeta {
            background: var(--panel);
            border: 1px solid var(--borde);
            border-radius: 6px;
            margin-top: 50px;
            overflow: hidden;
            box-shadow: 0 25px 70px rgba(0,0,0,.5);
        }

        .cabecera {
            padding: 35px;
            border-bottom: 1px solid var(--borde);
            background: #0d120f;
        }

        .codigo {
            color: var(--verde);
            font-size: 11px;
            letter-spacing: 2px;
            font-weight: bold;
        }

        .titulo {
            font-size: 30px;
            font-weight: 900;
            margin: 10px 0 5px;
        }

        .subtitulo {
            color: var(--gris);
            margin: 0;
            font-size: 14px;
        }

        /* Éxito */
        .estado-exito {
            display: flex;
            align-items: center;
            gap: 18px;
            padding: 28px 35px;
            background: rgba(182,243,74,.05);
            border-bottom: 1px solid var(--borde);
        }

        .icono-exito {
            width: 55px;
            height: 55px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--verde);
            border-radius: 50%;
            color: var(--verde);
            font-size: 25px;
        }

        .estado-exito h2 {
            font-size: 18px;
            margin: 0 0 4px;
        }

        .estado-exito p {
            color: var(--gris);
            margin: 0;
            font-size: 13px;
        }

        /* Información */
        .datos {
            padding: 35px;
        }

        .dato {
            background: var(--panel-2);
            border: 1px solid var(--borde);
            padding: 25px;
            height: 100%;
            border-radius: 4px;
        }

        .dato-icono {
            color: var(--verde);
            font-size: 22px;
            margin-bottom: 20px;
        }

        .dato-label {
            color: #68736c;
            font-size: 10px;
            letter-spacing: 2px;
            font-weight: bold;
        }

        .dato-valor {
            color: var(--blanco);
            font-size: 22px;
            font-weight: 900;
            margin-top: 6px;
        }

        /* Placa */
        .matricula {
            background: #eeeeea;
            color: #111;
            border-radius: 4px;
            border: 4px solid #252525;
            padding: 7px 15px;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-size: 20px;
            font-weight: 900;
            letter-spacing: 3px;
        }

        .matricula-pais {
            background: #146b38;
            color: white;
            font-size: 9px;
            padding: 8px 5px;
            letter-spacing: 0;
        }

        /* Pie */
        .pie-tarjeta {
            padding: 25px 35px;
            border-top: 1px solid var(--borde);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .identificador {
            color: #58625c;
            font-size: 10px;
            letter-spacing: 1px;
        }

        .btn-volver {
            background: transparent;
            border: 1px solid var(--borde);
            color: var(--blanco);
            border-radius: 3px;
            padding: 11px 20px;
            font-weight: bold;
            font-size: 13px;
        }

        .btn-volver:hover {
            border-color: var(--verde);
            color: var(--verde);
            background: rgba(182,243,74,.05);
        }

        /* Error */
        .error {
            padding: 45px 35px;
        }

        .error-caja {
            border: 1px solid rgba(255,98,98,.3);
            background: rgba(255,98,98,.05);
            padding: 25px;
            border-radius: 4px;
            display: flex;
            gap: 18px;
            align-items: flex-start;
        }

        .error-icono {
            color: var(--rojo);
            font-size: 28px;
        }

        .error-caja h2 {
            font-size: 18px;
            margin: 0 0 7px;
        }

        .error-caja p {
            color: var(--gris);
            margin: 0;
            font-size: 14px;
        }

        @media (max-width: 576px) {

            .tarjeta {
                margin-top: 25px;
            }

            .cabecera,
            .datos,
            .error {
                padding: 25px;
            }

            .estado-exito {
                padding: 25px;
            }

            .pie-tarjeta {
                padding: 20px 25px;
                flex-direction: column;
                align-items: stretch;
            }

            .btn-volver {
                text-align: center;
            }

        }

    </style>

</head>

<body>

<div class="container contenedor">

    <!-- Barra superior -->
    <div class="barra d-flex justify-content-between align-items-center">

        <div class="logo">
            VEH<span>IX</span>
        </div>

        <div class="terminal">
            TERMINAL <span>01</span>
            &nbsp; / &nbsp;
            CONTROL
        </div>

    </div>

    <!-- Tarjeta -->
    <div class="tarjeta">

        <!-- Cabecera -->
        <div class="cabecera">

            <div class="codigo">
                ACCESS / LOG
            </div>

            <h1 class="titulo">
                Registro vehicular
            </h1>

            <p class="subtitulo">
                Comprobante generado por el sistema de control de acceso.
            </p>

        </div>

        <?php if (isset($error)): ?>

            <!-- ERROR -->

            <div class="error">

                <div class="error-caja">

                    <div class="error-icono">
                        <i class="bi bi-exclamation-octagon-fill"></i>
                    </div>

                    <div>

                        <h2>
                            Registro rechazado
                        </h2>

                        <p>
                            <?= htmlspecialchars($error) ?>
                        </p>

                    </div>

                </div>

            </div>

            <div class="pie-tarjeta">

                <div class="identificador">
                    ERROR DE VALIDACIÓN
                </div>

                <a
                    href="index.php"
                    class="btn btn-volver"
                >
                    <i class="bi bi-arrow-left me-2"></i>
                    VOLVER AL CONTROL
                </a>

            </div>

        <?php else: ?>

            <!-- ÉXITO -->

            <div class="estado-exito">

                <div class="icono-exito">
                    <i class="bi bi-check2"></i>
                </div>

                <div>

                    <h2>
                        Acceso registrado correctamente
                    </h2>

                    <p>
                        La unidad ha sido ingresada al sistema.
                    </p>

                </div>

            </div>

            <!-- Datos -->
            <div class="datos">

                <div class="row g-3">

                    <!-- Placa -->
                    <div class="col-md-6">

                        <div class="dato">

                            <div class="dato-icono">
                                <i class="bi bi-upc-scan"></i>
                            </div>

                            <div class="dato-label">
                                IDENTIFICACIÓN VEHICULAR
                            </div>

                            <div class="dato-valor">

                                <div class="matricula">

                                    <span class="matricula-pais">
                                        EC
                                    </span>

                                    <?= htmlspecialchars($placa) ?>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Tipo -->
                    <div class="col-md-6">

                        <div class="dato">

                            <div class="dato-icono">
                                <i class="bi bi-car-front-fill"></i>
                            </div>

                            <div class="dato-label">
                                CATEGORÍA DE UNIDAD
                            </div>

                            <div class="dato-valor">
                                <?= htmlspecialchars($tipo) ?>
                            </div>

                        </div>

                    </div>

                    <!-- Hora -->
                    <div class="col-md-6">

                        <div class="dato">

                            <div class="dato-icono">
                                <i class="bi bi-clock-history"></i>
                            </div>

                            <div class="dato-label">
                                HORA DE INGRESO
                            </div>

                            <div class="dato-valor">
                                <?= htmlspecialchars($hora) ?>
                            </div>

                        </div>

                    </div>

                    <!-- Estado -->
                    <div class="col-md-6">

                        <div class="dato">

                            <div class="dato-icono">
                                <i class="bi bi-shield-check"></i>
                            </div>

                            <div class="dato-label">
                                ESTADO DE ACCESO
                            </div>

                            <div class="dato-valor" style="color:#b6f34a;">
                                AUTORIZADO
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Pie -->
            <div class="pie-tarjeta">

                <div class="identificador">
                    VEHIX / ACCESS LOG / TERMINAL 01
                </div>

                <a
                    href="index.php"
                    class="btn btn-volver"
                >
                    <i class="bi bi-plus-lg me-2"></i>
                    NUEVO REGISTRO
                </a>

            </div>

        <?php endif; ?>

    </div>

    <div class="text-center py-4">

        <small style="color:#3f4943;">
            VEHIX CONTROL SYSTEM · 2026
        </small>

    </div>

</div>

</body>
</html>
