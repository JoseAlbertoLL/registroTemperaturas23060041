<?php 
$ubi = $_POST["ubicacion"];
$temp = $_POST["temperatura"];
$ema = $_POST["em"]; 
$con = $_POST["con"];

date_default_timezone_set('America/Mazatlan');
$fecha = date("Y-m-d H:i:s");


// 1. Conexión
$host = '127.0.0.1';
$db   = 'registroTemperaturas';
$user = 'adminweb';
$pass = '1234';
$charset = 'utf8mb4';

//direccion de sitio
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    $stmt = $pdo->prepare("SELECT idLugar FROM lugares WHERE idLugar = ?");
    $si=0; //es no pues
    $stmt->execute([$ubi]);
    while($row = $stmt->fetch()){
        $si = 1;

    }

    if ($si == 0){
        echo "Error: Lugar no existente en la base";
        exit;
    }



    $stmt = $pdo->prepare("SELECT nombre FROM usuarios WHERE email = ? AND password = ?");
    $stmt->execute([$ema,$con]);
    while($row = $stmt->fetch()){
        echo "Correo ya existente ".$ema." a nombre de ".$row["nombre"];
        $sql = "INSERT INTO temperaturas (temperatura, fecha, lugares_idLugar) 
            VALUES (:temp, :fecha, :lugar)";

        $stmt = $pdo->prepare($sql);

        // 3. Ejecutar con datos reales
        $stmt->execute([
            ':temp' => $temp,
            ':fecha' => $fecha,
            ':lugar' => $ubi
        ]);

        echo "Registro insertado con éxito.";
        exit;
    }
    echo "Error de email o password";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>