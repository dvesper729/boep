<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = htmlspecialchars(trim($_POST['name']));
    $email   = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    if ($name && $email && $message) {
        $to = "vesper.ddv@gmail.com";
        $subject = "New BOEP Contact Form Message";
        $body = "From: $name <$email>\n\nMessage:\n$message";
        $headers = "From: $email\r\nReply-To: $email\r\n";

        if (mail($to, $subject, $body, $headers)) {
            header("Location: thankyou.html");
            exit;
        } else {
            header("Location: about.html?success=0");
            exit;
        }
    } else {
        header("Location: about.html?success=0");
        exit;
    }
} else {
    header("Location: about.html");
    exit;
}