<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Vehículo</title>
</head>
<body>

    <form action="procesar.php" method="POST">
        <label for="placa">Placa:</label>
        <input type="text" id="placa" name="placa" required>

        <br><br>

        <label for="tipo">Tipo de vehículo:</label>
        <select id="tipo" name="tipo" required>
            <option value="">Seleccione</option>
            <option value="A01">Auto</option>
            <option value="A02">Moto</option>
        </select>

        <br><br>

        <button type="submit">Registrar</button>
    </form>

</body>
</html>