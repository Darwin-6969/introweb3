/* =========================================================
   PARKSPOT
   Sistema de registro y gestión de parqueadero
========================================================= */

const CAPACIDAD_TOTAL = 24;
const TARIFA_MEDIA_HORA = 0.50;


/* =========================================================
   VARIABLES
========================================================= */

let vehiculos = JSON.parse(
    localStorage.getItem("parkspotVehiculos")
) || [];

let recaudado = Number(
    localStorage.getItem("parkspotRecaudado")
) || 0;

let vehiculoSalidaPendiente = null;


/* =========================================================
   ELEMENTOS DEL HTML
========================================================= */

const formulario = document.getElementById("parkingForm");
const placaInput = document.getElementById("placa");
const tipoInput = document.getElementById("tipo");
const clienteInput = document.getElementById("cliente");
const horaInput = document.getElementById("hora");
const espacioInput = document.getElementById("espacio");

const tablaVehiculos = document.getElementById("tablaVehiculos");
const emptyState = document.getElementById("emptyState");

const buscador = document.getElementById("buscador");
const filtroTipo = document.getElementById("filtroTipo");

const parkingGrid = document.getElementById("parkingGrid");
const alertContainer = document.getElementById("alertContainer");

const statOcupados = document.getElementById("statOcupados");
const statDisponibles = document.getElementById("statDisponibles");
const statRecaudado = document.getElementById("statRecaudado");

const reloj = document.getElementById("reloj");
const btnTema = document.getElementById("btnTema");

const confirmarSalida = document.getElementById("confirmarSalida");
const modalSalidaElemento = document.getElementById("modalSalida");


/* =========================================================
   MODAL DE BOOTSTRAP
========================================================= */

const modalSalida = new bootstrap.Modal(modalSalidaElemento);


/* =========================================================
   INICIAR APLICACIÓN
========================================================= */

document.addEventListener("DOMContentLoaded", function () {

    establecerHoraActual();

    generarEspacios();

    mostrarVehiculos();

    actualizarEstadisticas();

    actualizarReloj();

    cargarTema();

});


/* =========================================================
   HORA ACTUAL
========================================================= */

function establecerHoraActual() {

    const ahora = new Date();

    const año = ahora.getFullYear();

    const mes = String(
        ahora.getMonth() + 1
    ).padStart(2, "0");

    const dia = String(
        ahora.getDate()
    ).padStart(2, "0");

    const horas = String(
        ahora.getHours()
    ).padStart(2, "0");

    const minutos = String(
        ahora.getMinutes()
    ).padStart(2, "0");

    horaInput.value =
        `${año}-${mes}-${dia}T${horas}:${minutos}`;

}


/* =========================================================
   GENERAR ESPACIOS
========================================================= */

function generarEspacios() {

    parkingGrid.innerHTML = "";

    espacioInput.innerHTML = `
        <option value="">
            Seleccionar espacio...
        </option>
    `;

    for (let i = 1; i <= CAPACIDAD_TOTAL; i++) {

        const numero = String(i).padStart(2, "0");

        const espacioOcupado = vehiculos.some(
            function (vehiculo) {

                return vehiculo.espacio === numero;

            }
        );


        const columna = document.createElement("div");

        columna.className = "col";


        const tarjeta = document.createElement("div");

        tarjeta.className = "card text-center h-100";


        if (espacioOcupado) {

            tarjeta.classList.add(
                "bg-danger",
                "text-white"
            );

            tarjeta.innerHTML = `
                <div class="card-body p-2">

                    <i class="bi bi-car-front-fill fs-4"></i>

                    <div class="fw-bold small">
                        P-${numero}
                    </div>

                    <span class="badge bg-light text-danger">
                        Ocupado
                    </span>

                </div>
            `;

        } else {

            tarjeta.classList.add("border-success");

            tarjeta.innerHTML = `
                <div class="card-body p-2">

                    <i class="bi bi-p-square-fill text-success fs-4"></i>

                    <div class="fw-bold small">
                        P-${numero}
                    </div>

                    <span class="badge bg-success">
                        Libre
                    </span>

                </div>
            `;

        }


        columna.appendChild(tarjeta);

        parkingGrid.appendChild(columna);


        if (!espacioOcupado) {

            const opcion = document.createElement("option");

            opcion.value = numero;

            opcion.textContent = `Espacio P-${numero}`;

            espacioInput.appendChild(opcion);

        }

    }

}


/* =========================================================
   REGISTRAR VEHÍCULO
========================================================= */

formulario.addEventListener("submit", function (event) {

    event.preventDefault();


    const placa = placaInput.value
        .trim()
        .toUpperCase();

    const tipo = tipoInput.value;

    const cliente = clienteInput.value.trim();

    const hora = horaInput.value;

    const espacio = espacioInput.value;


    /* VALIDACIÓN */

    if (
        placa === "" ||
        tipo === "" ||
        cliente === "" ||
        hora === "" ||
        espacio === ""
    ) {

        mostrarAlerta(
            "warning",
            "Por favor, completa todos los campos antes de registrar el vehículo."
        );

        return;
    }


    /* COMPROBAR PLACA */

    const placaExiste = vehiculos.some(
        function (vehiculo) {

            return vehiculo.placa === placa;

        }
    );


    if (placaExiste) {

        mostrarAlerta(
            "warning",
            `El vehículo con placa ${placa} ya está registrado.`
        );

        return;
    }


    /* CREAR VEHÍCULO */

    const nuevoVehiculo = {

        id: Date.now(),

        ticket: generarTicket(),

        placa: placa,

        tipo: tipo,

        cliente: cliente,

        hora: hora,

        espacio: espacio

    };


    vehiculos.push(nuevoVehiculo);


    guardarDatos();


    /* LIMPIAR FORMULARIO */

    formulario.reset();

    establecerHoraActual();


    /* ACTUALIZAR INTERFAZ */

    generarEspacios();

    mostrarVehiculos();

    actualizarEstadisticas();


    /* ALERTA */

    mostrarAlerta(
        "success",
        `
        <strong>Ingreso registrado correctamente.</strong>
        Vehículo ${placa} asignado al espacio P-${espacio}.
        Ticket: ${nuevoVehiculo.ticket}.
        `
    );

});


/* =========================================================
   GENERAR TICKET
========================================================= */

function generarTicket() {

    const numero =
        Math.floor(Math.random() * 9000) + 1000;

    return `PS-${numero}`;

}


/* =========================================================
   MOSTRAR VEHÍCULOS
========================================================= */

function mostrarVehiculos() {

    const textoBusqueda =
        buscador.value
            .trim()
            .toLowerCase();

    const tipoSeleccionado =
        filtroTipo.value;


    const vehiculosFiltrados =
        vehiculos.filter(
            function (vehiculo) {

                const coincideBusqueda =
                    vehiculo.placa
                        .toLowerCase()
                        .includes(textoBusqueda)
                    ||
                    vehiculo.cliente
                        .toLowerCase()
                        .includes(textoBusqueda);


                const coincideTipo =
                    tipoSeleccionado === "Todos"
                    ||
                    vehiculo.tipo === tipoSeleccionado;


                return (
                    coincideBusqueda &&
                    coincideTipo
                );

            }
        );


    tablaVehiculos.innerHTML = "";


    /* NO HAY RESULTADOS */

    if (vehiculosFiltrados.length === 0) {

        emptyState.classList.remove("d-none");

        return;
    }


    emptyState.classList.add("d-none");


    /* CREAR FILAS */

    vehiculosFiltrados.forEach(
        function (vehiculo) {

            const fila =
                document.createElement("tr");


            let claseTipo = "bg-primary";


            if (vehiculo.tipo === "Motocicleta") {

                claseTipo = "bg-warning text-dark";

            }


            if (vehiculo.tipo === "Camioneta") {

                claseTipo = "bg-info text-dark";

            }


            fila.innerHTML = `

                <td>
                    <span class="badge bg-dark">
                        ${vehiculo.ticket}
                    </span>
                </td>

                <td>
                    <strong class="text-primary">
                        ${vehiculo.placa}
                    </strong>
                </td>

                <td>
                    <span class="badge ${claseTipo}">
                        ${vehiculo.tipo}
                    </span>
                </td>

                <td>
                    ${vehiculo.cliente}
                </td>

                <td>
                    ${formatearHora(vehiculo.hora)}
                </td>

                <td>
                    <span class="badge bg-secondary">
                        P-${vehiculo.espacio}
                    </span>
                </td>

                <td>

                    <button
                        type="button"
                        class="btn btn-danger btn-sm"
                        onclick="prepararSalida(${vehiculo.id})"
                    >

                        <i class="bi bi-box-arrow-right"></i>

                        Salida

                    </button>

                </td>

            `;


            tablaVehiculos.appendChild(fila);

        }
    );

}


/* =========================================================
   FORMATEAR HORA
========================================================= */

function formatearHora(fechaTexto) {

    const fecha = new Date(fechaTexto);

    return fecha.toLocaleTimeString(
        "es-EC",
        {
            hour: "2-digit",
            minute: "2-digit"
        }
    );

}


/* =========================================================
   PREPARAR SALIDA
========================================================= */

function prepararSalida(id) {

    const vehiculo = vehiculos.find(
        function (item) {

            return item.id === id;

        }
    );


    if (!vehiculo) {

        return;

    }


    vehiculoSalidaPendiente = vehiculo;


    const calculo =
        calcularTarifa(vehiculo.hora);


    document.getElementById("modalPlaca")
        .textContent = vehiculo.placa;


    document.getElementById("modalTiempo")
        .textContent = calculo.textoTiempo;


    document.getElementById("modalTotal")
        .textContent =
        `$${calculo.total.toFixed(2)}`;


    modalSalida.show();

}


/* =========================================================
   CONFIRMAR SALIDA
========================================================= */

confirmarSalida.addEventListener(
    "click",
    function () {

        if (!vehiculoSalidaPendiente) {

            return;

        }


        const vehiculo =
            vehiculoSalidaPendiente;


        const calculo =
            calcularTarifa(vehiculo.hora);


        /* SUMAR DINERO */

        recaudado =
            recaudado + calculo.total;


        /* ELIMINAR VEHÍCULO */

        vehiculos =
            vehiculos.filter(
                function (item) {

                    return item.id !== vehiculo.id;

                }
            );


        guardarDatos();


        /* ACTUALIZAR */

        generarEspacios();

        mostrarVehiculos();

        actualizarEstadisticas();


        modalSalida.hide();


        /* ALERTA */

        mostrarAlerta(
            "success",
            `
            <strong>Vehículo retirado correctamente.</strong>
            La placa ${vehiculo.placa} permaneció
            ${calculo.textoTiempo}.
            Total:
            <strong>$${calculo.total.toFixed(2)}</strong>.
            `
        );


        vehiculoSalidaPendiente = null;

    }
);


/* =========================================================
   CALCULAR TARIFA
========================================================= */

function calcularTarifa(horaIngreso) {

    const ingreso =
        new Date(horaIngreso);

    const ahora =
        new Date();


    let diferencia =
        ahora - ingreso;


    if (diferencia < 0) {

        diferencia = 0;

    }


    const minutos =
        Math.ceil(
            diferencia / 60000
        );


    const bloques =
        Math.max(
            1,
            Math.ceil(
                minutos / 30
            )
        );


    const total =
        bloques * TARIFA_MEDIA_HORA;


    const horas =
        Math.floor(
            minutos / 60
        );


    const minutosRestantes =
        minutos % 60;


    let textoTiempo = "";


    if (horas > 0) {

        textoTiempo =
            `${horas} h `;

    }


    textoTiempo +=
        `${minutosRestantes} min`;


    return {

        minutos: minutos,

        bloques: bloques,

        total: total,

        textoTiempo: textoTiempo

    };

}


/* =========================================================
   ACTUALIZAR ESTADÍSTICAS
========================================================= */

function actualizarEstadisticas() {

    const ocupados =
        vehiculos.length;


    const disponibles =
        CAPACIDAD_TOTAL - ocupados;


    statOcupados.textContent =
        ocupados;


    statDisponibles.textContent =
        disponibles;


    statRecaudado.textContent =
        `$${recaudado.toFixed(2)}`;

}


/* =========================================================
   MOSTRAR ALERTA
========================================================= */

function mostrarAlerta(tipo, mensaje) {

    let icono =
        "bi-info-circle-fill";


    if (tipo === "success") {

        icono =
            "bi-check-circle-fill";

    }


    if (tipo === "warning") {

        icono =
            "bi-exclamation-triangle-fill";

    }


    if (tipo === "danger") {

        icono =
            "bi-x-circle-fill";

    }


    const alerta =
        document.createElement("div");


    alerta.className =
        `alert alert-${tipo} alert-dismissible fade show shadow-sm`;


    alerta.setAttribute(
        "role",
        "alert"
    );


    alerta.innerHTML = `

        <i class="bi ${icono}"></i>

        <span class="ms-2">
            ${mensaje}
        </span>

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
        ></button>

    `;


    alertContainer.appendChild(
        alerta
    );


    setTimeout(
        function () {

            if (alerta.parentNode) {

                alerta.remove();

            }

        },
        5000
    );

}


/* =========================================================
   BUSCADOR
========================================================= */

buscador.addEventListener(
    "input",
    function () {

        mostrarVehiculos();

    }
);


/* =========================================================
   FILTRO
========================================================= */

filtroTipo.addEventListener(
    "change",
    function () {

        mostrarVehiculos();

    }
);


/* =========================================================
   GUARDAR DATOS
========================================================= */

function guardarDatos() {

    localStorage.setItem(
        "parkspotVehiculos",
        JSON.stringify(vehiculos)
    );


    localStorage.setItem(
        "parkspotRecaudado",
        recaudado.toString()
    );

}


/* =========================================================
   RELOJ
========================================================= */

function actualizarReloj() {

    const ahora =
        new Date();


    reloj.textContent =
        ahora.toLocaleTimeString(
            "es-EC",
            {
                hour: "2-digit",
                minute: "2-digit",
                second: "2-digit"
            }
        );

}


setInterval(
    actualizarReloj,
    1000
);


/* =========================================================
   MODO OSCURO
========================================================= */

btnTema.addEventListener(
    "click",
    function () {

        const modoOscuro =
            document.body.classList.contains(
                "bg-dark"
            );


        if (modoOscuro) {

            document.body.classList.remove(
                "bg-dark",
                "text-white"
            );

            document.body.classList.add(
                "bg-light"
            );


            btnTema.innerHTML =
                `<i class="bi bi-moon-stars-fill"></i>`;


            localStorage.setItem(
                "parkspotTema",
                "light"
            );


        } else {

            document.body.classList.remove(
                "bg-light"
            );

            document.body.classList.add(
                "bg-dark",
                "text-white"
            );


            btnTema.innerHTML =
                `<i class="bi bi-sun-fill"></i>`;


            localStorage.setItem(
                "parkspotTema",
                "dark"
            );

        }

    }
);


/* =========================================================
   CARGAR TEMA
========================================================= */

function cargarTema() {

    const tema =
        localStorage.getItem(
            "parkspotTema"
        );


    if (tema === "dark") {

        document.body.classList.remove(
            "bg-light"
        );

        document.body.classList.add(
            "bg-dark",
            "text-white"
        );


        btnTema.innerHTML =
            `<i class="bi bi-sun-fill"></i>`;

    }

}


/* =========================================================
   PLACA EN MAYÚSCULAS
========================================================= */

placaInput.addEventListener(
    "input",
    function () {

        this.value =
            this.value.toUpperCase();

    }
);