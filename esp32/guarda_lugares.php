<?php 
$lug = $_POST["lug"];

// Conexión
$host = '127.0.0.1';
$db   = 'registroTemperaturas';
$user = 'adminweb';
$pass = '1234';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    // Verificar si ya existe
    $stmt = $pdo->prepare("SELECT lugar FROM lugares WHERE lugar = ?");
    $stmt->execute([$lug]);

    if ($stmt->fetch()) {
        echo "YA EXISTE";
    } else {
        // Insertar
        $sql = "INSERT INTO lugares(lugar) VALUES (?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$lug]);

        echo "Registro insertado con éxito.";
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>