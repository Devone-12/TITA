<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe y sanitiza los datos del formulario
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $subject = htmlspecialchars(trim($_POST["subject"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Verifica si los datos son válidos
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Por favor ingresa una dirección de correo electrónico válida.";
        exit;
    }

    // Aquí puedes agregar la lógica para enviar el correo
    $to = "devone.web.sities.programming@gmail.com"; // Cambia esto a tu dirección de correo
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Construye el mensaje
    $email_message = "Nombre: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Asunto: $subject\n";
    $email_message .= "Mensaje:\n$message\n";

    // Envía el correo
    if (mail($to, $subject, $email_message, $headers)) {
        echo "Tu mensaje ha sido enviado. ¡Gracias!";
    } else {
        echo "Hubo un error al enviar tu mensaje. Por favor, intenta de nuevo más tarde.";
    }
}
?>
