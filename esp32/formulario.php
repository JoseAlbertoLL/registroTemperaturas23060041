<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Formulario</title>

<style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #473dd1, #1d1c58);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .mensaje {
        margin-bottom: 15px;
        padding: 15px 20px;
        border-radius: 10px;
        font-weight: bold;
        text-align: center;
        animation: fadeIn 0.5s ease;
    }

    .exito {
        background: #d4edda;
        color: #155724;
    }

    .error {
        background: #f8d7da;
        color: #721c24;
    }

    button {
        margin-top: 10px;
        padding: 8px 12px;
        border: none;
        border-radius: 8px;
        background: #4facfe;
        color: white;
        cursor: pointer;
        transition: 0.3s;
    }

    button:hover {
        background: #00c6ff;
    }

    #copiadoMsg {
        display: none;
        margin-top: 10px;
        color: #155724;
        font-size: 14px;
        transition: opacity 0.3s ease;
    }

    form {
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        width: 300px;
    }

    form h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    label {
        display: block;
        margin-top: 15px;
        font-weight: bold;
        color: #333;
    }

    input[type="email"],
    input[type="text"] {
        width: 92%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 8px;
    }

    input[type="submit"] {
        width: 100%;
        margin-top: 20px;
        padding: 12px;
        border: none;
        border-radius: 10px;
        background: #4facfe;
        color: white;
        font-size: 16px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background: #00c6ff;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

</head>
<body>

<?php if (isset($_SESSION['msg'])): ?>
    <div id="mensaje" class="mensaje <?= $_SESSION['msg'] == 'ok' ? 'exito' : 'error' ?>">

        <?php if ($_SESSION['msg'] == 'ok'): ?>
            Registro exitoso <br>

            <?php if (isset($_SESSION['pass_generada'])): ?>
                <span id="passTexto"><?= $_SESSION['pass_generada'] ?></span>
                <br>
                <button type="button" onclick="copiarPass()">Copiar contraseña</button>

                <!-- 🔥 MENSAJE DE COPIADO -->
                <p id="copiadoMsg">✔ Contraseña copiada</p>
            <?php endif; ?>

        <?php elseif ($_SESSION['msg'] == 'correo_existente'): ?>
            Ese correo ya está registrado
        <?php else: ?>
            Error al registrar
        <?php endif; ?>

    </div>

<?php 
unset($_SESSION['msg']);
unset($_SESSION['pass_generada']);
endif;
?>

<form method="post" action="guarda_usuarios.php">
    <h2>REGISTRO DE USUARIO</h2>

    <label>EMAIL</label>
    <input type="email" name="em" required>

    <label>NOMBRE</label>
    <input type="text" name="nom" required>

    <input type="submit" value="Guardar">
</form>

<script>
// 🔥 desaparecer mensaje automáticamente
setTimeout(() => {
    const msg = document.getElementById('mensaje');
    if (msg) {
        msg.style.transition = "opacity 0.5s";
        msg.style.opacity = "0";
        setTimeout(() => msg.remove(), 500);
    }
}, 4000);

// 📋 copiar contraseña SIN alert
function copiarPass() {
    const texto = document.getElementById('passTexto').innerText;
    const msg = document.getElementById('copiadoMsg');

    navigator.clipboard.writeText(texto).then(() => {
        msg.style.display = "block";
        msg.style.opacity = "1";

        setTimeout(() => {
            msg.style.opacity = "0";
            setTimeout(() => msg.style.display = "none", 300);
        }, 2000);
    });
}
</script>

</body>
</html>