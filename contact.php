<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $department = htmlspecialchars($_POST['department']);
    $subject = htmlspecialchars($_POST['subject']);
    $message_content = htmlspecialchars($_POST['message']);

    $to = 'ihahalaskar@gmail.com';
    $email_subject = "New Contact Form Submission: $subject";
    $email_body = "You have received a new message from the contact form.\n\n".
                  "Here are the details:\n".
                  "Name: $first_name $last_name\n".
                  "Email: $email\n".
                  "Department: $department\n\n".
                  "Message:\n$message_content";

    $headers = "From: $email\n";
    $headers .= "Reply-To: $email\n";

    if (mail($to, $email_subject, $email_body, $headers)) {
        header('Location: acik_pozisyonlar.html');
        exit();
    } else {
        $message = "Failed to send the message. Please try again.";
    }
}
?>
