<?php 
session_start();

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

$ema = $_POST["em"];
$nom = $_POST["nom"];

// 🔥 generar contraseña automática
$pas = bin2hex(random_bytes(16));

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    // Verificar si ya existe
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$ema]);

    if ($stmt->fetch()) {
        $_SESSION['msg'] = 'correo_existente';
        header("Location: formulario.php");
        exit();
    }

    // Insertar
    $sql = "INSERT INTO usuarios(idUsuario, email, password, nombre) VALUES (NULL, :ema, :pass, :nom)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':ema', $ema);
    $stmt->bindParam(':pass', $pas);
    $stmt->bindParam(':nom', $nom);

    if ($stmt->execute()){
        $_SESSION['msg'] = 'ok';
        $_SESSION['pass_generada'] = $pas;

        header("Location: formulario.php");
        exit();
    } else {
        $_SESSION['msg'] = 'error';
        header("Location: formulario.php");
        exit();
    }

} catch (PDOException $e) {
    $_SESSION['msg'] = 'error';
    header("Location: formulario.php");
    exit();
}
?>