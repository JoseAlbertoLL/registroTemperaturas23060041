<?php
$conexion = new mysqli("localhost", "adminweb", "1234", "registroTemperaturas");

$sql = "SELECT * FROM vista_temperaturas ORDER BY fecha DESC LIMIT 15";
$resultado = $conexion->query($sql);

$datos = [];

while($fila = $resultado->fetch_assoc()){
    $datos[] = $fila;
}

echo json_encode($datos);

$conexion->close();
?>