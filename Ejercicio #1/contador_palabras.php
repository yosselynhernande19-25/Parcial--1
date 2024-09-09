<?php
$numero_palabras = "";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['frase'])) {
    $frase = $_GET['frase'];
    $numero_palabras = str_word_count($frase);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de Palabras</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            max-width: 500px;
            width: 100%;
            background: #fff;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        input[type="text"] {
            width: 85%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #4CB5B5;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #808000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Contador de Palabras</h2>
        <form method="GET">
            <label for="frase">Introduce una frase:</label>
            <input type="text" name="frase" id="frase" required>
            <input type="submit" value="Contar Palabras">
        </form>
        <?php
        if ($numero_palabras !== "") {
            echo "<p>La frase tiene <strong>$numero_palabras</strong> palabras.</p>";
        }
        ?>
    </div>
</body>
</html>
