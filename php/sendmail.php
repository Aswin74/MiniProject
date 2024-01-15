<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    // Set the recipient email address
    $to = "aswintvm2@gmail.com";

    // Set the subject of the email
    $subject = "New Message from Hostex";

    // Compose the message
    $fullMessage = "Name: $firstName $lastName\n";
    $fullMessage .= "Email: $email\n";
    $fullMessage .= "Phone: $phone\n\n";
    $fullMessage .= "Message:\n$message";

    // Additional headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain;charset=utf-8\r\n";

    // Send the email
    mail($to, $subject, $fullMessage, $headers);

    // Redirect back to the form or a thank you page
    header("Location: ../login.html");
    exit();
}
?>
