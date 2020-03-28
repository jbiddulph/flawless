<?php
// Check for empty fields
if(empty($_POST['name'])                ||
empty($_POST['email'])               ||
empty($_POST['phone'])               ||
empty($_POST['message'])     ||
!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
{
echo "No arguments Provided!";
return false;
}

$recipient = "john.mbiddulph@gmail.com";
$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$subject = "FLAWLESS MEDICAL AESTHETICS";
$message = strip_tags(htmlspecialchars($_POST['message']));

if (isset($_POST['email'])) {
if (preg_match('(\w[-._\w]*\w@\w[-._\w]*\w\.\w{2,})', $_POST['email'])) {
$msg = 'E-mail address is valid';
} else {
$msg = 'Invalid email address';
}

$ip = getenv('REMOTE_ADDR');
$host = gethostbyaddr($ip);
$mess = "Name: ".$name."\n";
$mess .= "Email: ".$email."\n";
$mess .= "Subject: ".$subject."\n";
$mess .= "Message: ".$message."\n\n";
$mess .= "IP:".$ip." HOST: ".$host."\n";

$headers = "From: <".$email.">\r\n";

if(isset($_POST['url']) && $_POST['url'] == ''){

mail($recipient, $subject, $mess, $headers);
return true;
}



} else {
die('Invalid entry!');
}
