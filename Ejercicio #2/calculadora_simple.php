<?php
$resultado = "";
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero1 = $_POST['numero1'];
    $numero2 = $_POST['numero2'];
    $operacion = $_POST['operacion'];

    if (is_numeric($numero1) && is_numeric($numero2)) {
        switch ($operacion) {
            case "sumar":
                $resultado = $numero1 + $numero2;
                break;
            case "restar":
                $resultado = $numero1 - $numero2;
                break;
            case "multiplicar":
                $resultado = $numero1 * $numero2;
                break;
            case "dividir":
                if ($numero2 != 0) {
                    $resultado = $numero1 / $numero2;
                } else {
                    $error = "No se puede dividir por cero.";
                }
                break;
        }
    } else {
        $error = "Por favor, ingresar números válidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Simple</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            width: 100%;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        input[type="number"], input[type="radio"] {
            margin: 10px 0;
            padding: 10px;
            width: 85%;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="radio"] {
            width: auto;
        }
        label {
            margin-right: 10px;
            color: #333;
        }
        .radio-group {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
        }
        input[type="submit"] {
            background-color: #008080;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            margin-top: 20px;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .resultado {
            margin-top: 20px;
            font-size: 18px;
            color: #333;
        }
        .error {
            color: #e74c3c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Calculadora Simple</h2>
        <form method="POST">
            <label for="numero1">Número 1:</label>
            <input type="number" name="numero1" id="numero1" required>

            <label for="numero2">Número 2:</label>
            <input type="number" name="numero2" id="numero2" required>

            <div class="radio-group">
                <label><input type="radio" name="operacion" value="sumar" required> Sumar</label>
                <label><input type="radio" name="operacion" value="restar"> Restar</label>
                <label><input type="radio" name="operacion" value="multiplicar"> Multiplicar</label>
                <label><input type="radio" name="operacion" value="dividir"> Dividir</label>
            </div>

            <input type="submit" value="Calcular">
        </form>

        <div class="resultado">
            <?php
            if ($error !== "") {
                echo "<p class='error'>$error</p>";
            } elseif ($resultado !== "") {
                echo "<p>El resultado de la operación es: <strong>$resultado</strong></p>";
            }
            ?>
        </div>
    </div>
</body>
</html>

