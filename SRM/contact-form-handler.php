<?php

if(isset($_POST['name']) && isset($_POST['email'])) {

    $name = htmlspecialchars($_POST['name']);
    $visitor_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Email validation
    if (!filter_var($visitor_email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    $email_from = "info@easytutorialspro.com";
    $email_subject = "New Contact Form Submission";

    $email_body = "User Name: $name\n"
                . "User Email: $visitor_email\n"
                . "Subject: $subject\n"
                . "Message: $message\n";

    $to = "hashimmunawar3@gmail.com";

    $headers = "From: $email_from\r\n";
    $headers .= "Reply-To: $visitor_email\r\n";

    mail($to, $email_subject, $email_body, $headers);

    header("Location: contact.html");
    exit;
}
else {
    echo "Form not submitted properly";
}

?>
