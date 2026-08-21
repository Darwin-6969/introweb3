<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Iniciar sesión</title>

    <meta
        name="description"
        content="Accede a tu cuenta de forma segura."
    >

    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --text: #111827;
            --text-secondary: #6b7280;
            --border: #e5e7eb;
            --background: #f8fafc;
            --white: #ffffff;
            --danger: #dc2626;
            --danger-bg: #fef2f2;
            --success: #16a34a;
            --radius: 14px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;

            padding: 24px;

            font-family:
                Inter,
                ui-sans-serif,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;

            color: var(--text);
            background:
                radial-gradient(
                    circle at top left,
                    rgba(79, 70, 229, 0.12),
                    transparent 35%
                ),
                var(--background);
        }

        .auth-container {
            width: 100%;
            max-width: 430px;
        }

        .auth-card {
            background: var(--white);
            border: 1px solid rgba(229, 231, 235, 0.8);
            border-radius: 20px;

            padding: 40px;

            box-shadow:
                0 20px 50px rgba(15, 23, 42, 0.08),
                0 4px 12px rgba(15, 23, 42, 0.04);
        }

        .brand {
            display: flex;
            justify-content: center;
            margin-bottom: 28px;
        }

        .brand-icon {
            width: 52px;
            height: 52px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: white;
            background: var(--primary);

            border-radius: 14px;

            box-shadow:
                0 8px 20px rgba(79, 70, 229, 0.25);
        }

        .brand-icon svg {
            width: 26px;
            height: 26px;
        }

        .heading {
            text-align: center;
            margin-bottom: 30px;
        }

        .heading h1 {
            font-size: 28px;
            line-height: 1.2;
            font-weight: 700;
            letter-spacing: -0.5px;

            margin-bottom: 8px;
        }

        .heading p {
            color: var(--text-secondary);
            font-size: 15px;
            line-height: 1.5;
        }

        .alert {
            display: flex;
            align-items: flex-start;
            gap: 10px;

            padding: 12px 14px;
            margin-bottom: 20px;

            color: var(--danger);
            background: var(--danger-bg);

            border: 1px solid #fecaca;
            border-radius: 10px;

            font-size: 14px;
            line-height: 1.4;
        }

        .alert svg {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;

            margin-bottom: 8px;

            font-size: 14px;
            font-weight: 600;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;

            width: 19px;
            height: 19px;

            transform: translateY(-50%);

            color: #9ca3af;
            pointer-events: none;
        }

        .form-input {
            width: 100%;
            height: 48px;

            padding: 0 44px;

            color: var(--text);
            background: var(--white);

            border: 1px solid var(--border);
            border-radius: 10px;

            outline: none;

            font-size: 15px;

            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease;
        }

        .form-input::placeholder {
            color: #9ca3af;
        }

        .form-input:hover {
            border-color: #d1d5db;
        }

        .form-input:focus {
            border-color: var(--primary);

            box-shadow:
                0 0 0 3px rgba(79, 70, 229, 0.12);
        }

        .password-toggle {
            position: absolute;

            right: 12px;
            top: 50%;

            width: 30px;
            height: 30px;

            display: flex;
            align-items: center;
            justify-content: center;

            transform: translateY(-50%);

            border: 0;
            background: transparent;

            color: #9ca3af;

            cursor: pointer;
            border-radius: 6px;
        }

        .password-toggle:hover {
            color: var(--text);
            background: #f3f4f6;
        }

        .password-toggle svg {
            width: 18px;
            height: 18px;
        }

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 24px;

            font-size: 14px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;

            color: var(--text-secondary);
            cursor: pointer;
        }

        .remember input {
            width: 16px;
            height: 16px;

            accent-color: var(--primary);

            cursor: pointer;
        }

        .link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        .link:hover {
            color: var(--primary-hover);
            text-decoration: underline;
        }

        .submit-button {
            width: 100%;
            height: 48px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 0;
            border-radius: 10px;

            color: white;
            background: var(--primary);

            font-size: 15px;
            font-weight: 600;

            cursor: pointer;

            transition:
                background 0.2s ease,
                transform 0.1s ease,
                box-shadow 0.2s ease;
        }

        .submit-button:hover {
            background: var(--primary-hover);

            box-shadow:
                0 8px 20px rgba(79, 70, 229, 0.2);
        }

        .submit-button:active {
            transform: translateY(1px);
        }

        .submit-button:focus-visible {
            outline: 3px solid rgba(79, 70, 229, 0.25);
            outline-offset: 2px;
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 14px;

            margin: 28px 0;

            color: #9ca3af;
            font-size: 13px;
        }

        .divider::before,
        .divider::after {
            content: "";

            flex: 1;

            height: 1px;

            background: var(--border);
        }

        .register {
            text-align: center;

            color: var(--text-secondary);

            font-size: 14px;
        }

        .register .link {
            margin-left: 4px;
        }

        .security-note {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;

            margin-top: 24px;

            color: #9ca3af;

            font-size: 12px;
        }

        .security-note svg {
            width: 14px;
            height: 14px;
        }

        @media (max-width: 480px) {

            body {
                padding: 16px;
            }

            .auth-card {
                padding: 28px 22px;
                border-radius: 16px;
            }

            .heading h1 {
                font-size: 25px;
            }

            .form-options {
                align-items: flex-start;
                gap: 12px;
            }
        }

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                transition: none !important;
            }
        }
    </style>
</head>

<body>

<main class="auth-container">

    <section class="auth-card" aria-labelledby="login-title">

        <!-- Logo -->
        <div class="brand" aria-hidden="true">
            <div class="brand-icon">

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <rect
                        x="3"
                        y="11"
                        width="18"
                        height="10"
                        rx="2"
                    />
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                </svg>

            </div>
        </div>


        <!-- Encabezado -->
        <div class="heading">

            <h1 id="login-title">
                Bienvenido de nuevo
            </h1>

            <p>
                Inicia sesión para acceder a tu cuenta.
            </p>

        </div>


        <!-- Mensaje de error -->
        <div
            class="alert"
            role="alert"
            aria-live="polite"
        >

            <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                aria-hidden="true"
            >
                <circle cx="12" cy="12" r="10"/>
                <line x1="12" y1="8" x2="12" y2="12"/>
                <line x1="12" y1="16" x2="12.01" y2="16"/>
            </svg>

            <span>
                Por favor, completa todos los campos.
            </span>

        </div>


        <!-- Formulario -->
        <form method="POST" action="validar.php" autocomplete="on">

            <!-- Email -->
            <div class="form-group">

                <label
                    class="form-label"
                    for="email"
                >
                    Correo electrónico
                </label>

                <div class="input-wrapper">

                    <svg
                        class="input-icon"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <rect
                            x="3"
                            y="5"
                            width="18"
                            height="14"
                            rx="2"
                        />
                        <polyline points="3,7 12,13 21,7"/>
                    </svg>

                    <input
                        class="form-input"
                        type="email"
                        id="email"
                        name="email"
                        placeholder="tu@email.com"
                        autocomplete="email"
                        required
                        autofocus
                    >

                </div>

            </div>


            <!-- Contraseña -->
            <div class="form-group">

                <label
                    class="form-label"
                    for="password"
                >
                    Contraseña
                </label>

                <div class="input-wrapper">

                    <svg
                        class="input-icon"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <rect
                            x="3"
                            y="11"
                            width="18"
                            height="10"
                            rx="2"
                        />
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>

                    <input
                        class="form-input"
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Introduce tu contraseña"
                        autocomplete="current-password"
                        required
                    >

                    <?php
                        if(isset($_SESSION['mensaje'])){
                        $msg = $_SESSION['mensaje'];
                        echo $msg;
                        unset($_SESSION['mensaje']);
                        }
                    ?>
                    <button
                        type="button"
                        class="password-toggle"
                        id="togglePassword"
                        aria-label="Mostrar contraseña"
                        title="Mostrar contraseña"
                    >
                        <svg
                            id="eyeIcon"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                    </button>

                </div>

            </div>


            <!-- Opciones -->
            <div class="form-options">

                <label class="remember">

                    <input
                        type="checkbox"
                        name="remember"
                        value="1"
                    >

                    <span>
                        Recordarme
                    </span>

                </label>

                <a
                    class="link"
                    href="forgot-password.php"
                >
                    ¿Olvidaste tu contraseña?
                </a>

            </div>


            <!-- Botón -->
            <button
                type="submit"
                class="submit-button"
                id="submitButton"
            >
                Iniciar sesión
            </button>

        </form>


        <!-- Registro -->
        <div class="divider">
            <span>o</span>
        </div>

        <div class="register">

            ¿Todavía no tienes una cuenta?

            <a
                class="link"
                href="register.php"
            >
                Crear cuenta
            </a>

        </div>


        <!-- Seguridad -->
        <div class="security-note">

            <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                aria-hidden="true"
            >
                <rect
                    x="3"
                    y="11"
                    width="18"
                    height="10"
                    rx="2"
                />
                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
            </svg>

            <span>
                Tus datos están protegidos
            </span>

        </div>

    </section>

</main>


<script>

    const passwordInput =
        document.getElementById('password');

    const togglePassword =
        document.getElementById('togglePassword');

    togglePassword.addEventListener('click', function () {

        const isPassword =
            passwordInput.type === 'password';

        passwordInput.type =
            isPassword ? 'text' : 'password';

        togglePassword.setAttribute(
            'aria-label',
            isPassword
                ? 'Ocultar contraseña'
                : 'Mostrar contraseña'
        );

        togglePassword.setAttribute(
            'title',
            isPassword
                ? 'Ocultar contraseña'
                : 'Mostrar contraseña'
        );
    });


    // Evitar doble envío accidental del formulario

    const form =
        document.querySelector('form');

    const submitButton =
        document.getElementById('submitButton');

    form.addEventListener('submit', function () {

        submitButton.disabled = true;
        submitButton.textContent =
            'Iniciando sesión...';

    });

</script>

</body>
</html>
