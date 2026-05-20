<?php
$conexion = new mysqli("localhost", "adminweb", "1234", "registroTemperaturas");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "SELECT * FROM vista_temperaturas 
        ORDER BY fecha DESC 
        LIMIT 15";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro de Temperaturas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100 p-10">

<h1 class="text-3xl font-bold mb-8 text-center">
    Registro de Temperaturas
</h1>

<div class="flex flex-col md:flex-row gap-10">

    <!-- TABLA -->
    <div class="w-full md:w-1/2 overflow-x-auto">
        <table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="py-3 px-4">Lugar</th>
                    <th class="py-3 px-4">Temperatura</th>
                    <th class="py-3 px-4">Fecha</th>
                </tr>
            </thead>
            <tbody id="tabla-body" class="text-gray-800">
            <?php
            if ($resultado->num_rows > 0) {
                while($fila = $resultado->fetch_assoc()) {
                    echo "<tr class='border-b hover:bg-gray-100'>";
                    echo "<td class='py-3 px-4'>" . $fila['lugar'] . "</td>";
                    echo "<td class='py-3 px-4'>" . $fila['temperatura'] . " °C</td>";
                    echo "<td class='py-3 px-4'>" . $fila['fecha'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3' class='text-center py-4'>No hay registros</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>

    <!-- GRAFICA -->
    <div class="w-full md:w-1/2 bg-white shadow-md rounded-lg p-6">
        <canvas id="graficaTemperaturas"></canvas>
    </div>

</div>

<script>

// ==================== GRAFICA ====================
const ctx = document.getElementById('graficaTemperaturas');

let grafica = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
            label: 'Temperatura (°C)',
            data: [],
            borderWidth: 2,
            tension: 0.3,
            fill: false
        }]
    },
    options: {
        responsive: true,
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Tiempo'
                }
            },
            y: {
                title: {
                    display: true,
                    text: 'Temperatura (°C)'
                }
            }
        }
    }
});

let ultimaFecha = null;

// ==================== CARGA DATOS ====================
function cargarDatos() {

    fetch("datos.php?t=" + new Date().getTime())
        .then(response => response.json())
        .then(registros => {

            if(registros.length === 0) return;

            // 🔥 ===== GRAFICA CORRECTA =====
            const labels = registros.map(r => 
                new Date(r.fecha).toLocaleTimeString()
            );

            const datos = registros.map(r => 
                parseFloat(r.temperatura)
            );

            grafica.data.labels = labels;
            grafica.data.datasets[0].data = datos;
            grafica.update();

            // 🔥 ===== TABLA SOLO SI HAY CAMBIO =====
            let nuevaFecha = registros[0].fecha;

            if(ultimaFecha === nuevaFecha){
                return;
            }

            ultimaFecha = nuevaFecha;

            let html = "";

            registros.forEach(fila => {
                html += `
                <tr class='border-b hover:bg-gray-100'>
                    <td class='py-3 px-4'>${fila.lugar}</td>
                    <td class='py-3 px-4'>${fila.temperatura} °C</td>
                    <td class='py-3 px-4'>${fila.fecha}</td>
                </tr>`;
            });

            document.getElementById("tabla-body").innerHTML = html;

            console.log("Tabla actualizada");
        })
        .catch(error => console.error("Error AJAX:", error));
}

// ==================== INTERVALO ====================
setInterval(cargarDatos, 3000);
cargarDatos();

</script>

</body>
</html>

<?php
$conexion->close();
?><?php
$conexion = new mysqli("localhost", "adminweb", "1234", "registroTemperaturas");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "SELECT * FROM vista_temperaturas 
        ORDER BY fecha DESC 
        LIMIT 15";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro de Temperaturas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100 p-10">

<h1 class="text-3xl font-bold mb-8 text-center">
    Registro de Temperaturas
</h1>

<div class="flex flex-col md:flex-row gap-10">

    <!-- TABLA -->
    <div class="w-full md:w-1/2 overflow-x-auto">
        <table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="py-3 px-4">Lugar</th>
                    <th class="py-3 px-4">Temperatura</th>
                    <th class="py-3 px-4">Fecha</th>
                </tr>
            </thead>
            <tbody id="tabla-body" class="text-gray-800">
            <?php
            if ($resultado->num_rows > 0) {
                while($fila = $resultado->fetch_assoc()) {
                    echo "<tr class='border-b hover:bg-gray-100'>";
                    echo "<td class='py-3 px-4'>" . $fila['lugar'] . "</td>";
                    echo "<td class='py-3 px-4'>" . $fila['temperatura'] . " °C</td>";
                    echo "<td class='py-3 px-4'>" . $fila['fecha'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3' class='text-center py-4'>No hay registros</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>

    <!-- GRAFICA -->
    <div class="w-full md:w-1/2 bg-white shadow-md rounded-lg p-6">
        <canvas id="graficaTemperaturas"></canvas>
    </div>

</div>

<script>

// ==================== GRAFICA ====================
const ctx = document.getElementById('graficaTemperaturas');

let grafica = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
            label: 'Temperatura (°C)',
            data: [],
            borderWidth: 2,
            tension: 0.3,
            fill: false
        }]
    },
    options: {
        responsive: true,
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Tiempo'
                }
            },
            y: {
                title: {
                    display: true,
                    text: 'Temperatura (°C)'
                }
            }
        }
    }
});

let ultimaFecha = null;

// ==================== CARGA DATOS ====================
function cargarDatos() {

    fetch("datos.php?t=" + new Date().getTime())
        .then(response => response.json())
        .then(registros => {

            if(registros.length === 0) return;

            // 🔥 ===== GRAFICA CORRECTA =====
            const labels = registros.map(r => 
                new Date(r.fecha).toLocaleTimeString()
            );

            const datos = registros.map(r => 
                parseFloat(r.temperatura)
            );

            grafica.data.labels = labels;
            grafica.data.datasets[0].data = datos;
            grafica.update();

            let nuevaFecha = registros[0].fecha;

            if(ultimaFecha === nuevaFecha){
                return;
            }

            ultimaFecha = nuevaFecha;

            let html = "";

            registros.forEach(fila => {
                html += `
                <tr class='border-b hover:bg-gray-100'>
                    <td class='py-3 px-4'>${fila.lugar}</td>
                    <td class='py-3 px-4'>${fila.temperatura} °C</td>
                    <td class='py-3 px-4'>${fila.fecha}</td>
                </tr>`;
            });

            document.getElementById("tabla-body").innerHTML = html;

            console.log("Tabla actualizada");
        })
        .catch(error => console.error("Error AJAX:", error));
}

// ==================== INTERVALO ====================
setInterval(cargarDatos, 3000);
cargarDatos();

</script>

</body>
</html>

<?php
$conexion->close();
?>