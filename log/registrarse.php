<?php
// Establecer la conexión a la base de datos
include_once "database.php";

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tomar los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];
    $apodo = $_POST['apodo'];

    // Generar un hash único para la activación de la cuenta
    $hash = md5(uniqid(rand(), true));

    // Insertar los datos del cliente en la base de datos
    $query = "INSERT INTO cliente (nom_clie, email_clie, pssword_clie, nickname_clie, hash_, activo) VALUES ('$nombre', '$email', '$contraseña', '$apodo', '$hash', 0)";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Enviar correo electrónico de activación
        $to = $email;
        $subject = 'Activación de cuenta';
        $message = '¡Gracias por registrarte! Para activar tu cuenta, haz clic en el siguiente enlace: https://amanycreandoando.site/log/activar.php?email=' . $email . '&hash=' . $hash;
        $headers = 'From: gestorcuentas1691@manycreandoando.site'; // Cambia esto a tu dirección de correo electrónico
        mail($to, $subject, $message, $headers);

        // Redirigir al usuario a una página de éxito
        header('Location: login.php');
        exit;
    } else {
        $error_message = 'Error al registrar el usuario. Por favor, inténtalo de nuevo.';
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
</head>
<body>

    <h2>Registrarse</h2>
    
    <?php if (isset($error_message)): ?>
        <p><?= $error_message ?></p>
    <?php endif; ?>

    <form action="registrarse.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" required><br><br>

        <label for="apodo">Apodo:</label>
        <input type="text" id="apodo" name="apodo" required><br><br>

        <input type="submit" value="Registrarse">
    </form>

</body>
</html>
