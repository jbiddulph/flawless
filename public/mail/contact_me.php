<?php
// Check for empty fields
if(empty($_POST['name'])                ||
empty($_POST['email'])               ||
empty($_POST['phone'])               ||
empty($_POST['message'])     ||
!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
{
return false;
}

$recipient = "taskayatrudi@gmail.com";
$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$subject = "FLAWLESS MEDICAL AESTHETICS CONTACT";
$message = strip_tags(htmlspecialchars($_POST['message']));

if (isset($_POST['email'])) {
    if (preg_match('(\w[-._\w]*\w@\w[-._\w]*\w\.\w{2,})', $_POST['email'])) {
        $msg = 'E-mail address is valid';
    } else {
        $msg = 'Invalid email address';
    }

    $mess = "Name: " . $name . "\n";
    $mess .= "Email: " . $email . "\n";
    $mess .= "Subject: " . $subject . "\n";
    $mess .= "Message: " . $message . "\n\n";

    $headers = "From: <" . $email . ">\r\n";


    mail($recipient, $subject, $mess, $headers);
    return true;
}
