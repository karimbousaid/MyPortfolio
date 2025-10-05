<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $to = "deine.email@beispiel.de"; // Deine E-Mail-Adresse
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n" .
               "Content-Type: text/plain; charset=UTF-8";

    $mailBody = "Name: $name\nE-Mail: $email\n\n$message";

    if (mail($to, $subject, $mailBody, $headers)) {
        echo "Danke! Deine Nachricht wurde gesendet.";
    } else {
        echo "Entschuldigung, beim Senden der Nachricht ist ein Fehler aufgetreten.";
    }
} else {
    http_response_code(405); // Methode nicht erlaubt
    echo "Nur POST-Anfragen erlaubt.";
}
?>