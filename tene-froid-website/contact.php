<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = htmlspecialchars($_POST["name"]);
    $email   = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST["message"]);

    $to      = "moussadiallo4072@gmail.com"; // Remplace par ton email
    $subject = "Nouveau message de $name via le site TENE FROID";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8";

    if (mail($to, $subject, $message, $headers)) {
        echo "Message envoyé avec succès.";
    } else {
        echo "Échec de l'envoi. Vérifiez votre hébergeur.";
    }
} else {
    echo "Méthode non autorisée.";
}
