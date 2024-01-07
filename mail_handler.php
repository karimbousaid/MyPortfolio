<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    $to = "bousaidkarim1996@gmail.com";
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you for contacting us, $name! We will get back to you soon.";
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
} else {
    header("HTTP/1.1 405 Method Not Allowed");
    echo "405 Method Not Allowed";
}
?>
