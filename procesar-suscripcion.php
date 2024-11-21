<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene el correo electrónico del formulario
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

    // Verifica si el correo electrónico es válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Por favor ingresa una dirección de correo electrónico válida.";
        exit;
    }

    // Aquí puedes agregar el código para guardar el correo en la base de datos o enviar un correo

    // Mensaje de éxito
    echo "Tu solicitud de suscripción ha sido enviada. ¡Gracias!";
}
?>