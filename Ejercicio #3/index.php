<?php
// Conexión a la base de datos
$pdo = new PDO('mysql:host=localhost;dbname=parcial_1dwsl', 'root', '');

// Obtener un registro por id
$stmt = $pdo->prepare("SELECT * FROM ejercicio WHERE id = :id");
$stmt->execute(['id' => 1]);
$registro = $stmt->fetch(PDO::FETCH_ASSOC);

echo "FETCH CON UNA FILA:";
echo "<pre>";
print_r($registro); // Cambié $ejercicio por $registro
echo "</pre>";

// Obtener todos los registros
$stmt = $pdo->prepare("SELECT * FROM ejercicio");
$stmt->execute();
$registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "FETCH ALL (VARIAS FILAS):";
echo "<pre>";
print_r($registros); // Cambié $ejercicio por $registros
echo "</pre>";

// Obtener una columna específica de la primera fila
if (isset($registros[0])) { // Verifica si $registros no está vacío
    echo "FETCH ALL (OBTENER UNA COLUMNA DE LA FILA 0):";
    echo "<br>" . $registros[0]["nombre"];
} else {
    echo "No hay registros disponibles.";
}

// Obtener solo una columna (nombre) para un id específico
$stmt = $pdo->prepare("SELECT nombre FROM ejercicio WHERE id = :id");
$stmt->execute(['id' => 4]);
$nombre = $stmt->fetchColumn();

echo "<br><br> FETCH COLUMN (SOLO UNA COLUMNA) <br>";
echo $nombre;
?>
