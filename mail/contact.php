<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "av.mustafayildiz@hotmail.com"; // Change this email to your //
$subject = "$m_subject:  $name";
$body = "İletişime geçmek için formu doldurunuz.\n\n"."Bilgileriniz:\n\nAd-Soyad: $name\n\n\nEmail: $email\n\nKonu: $m_subject\n\nMesaj: $message";
$header = "From: $email";
$header .= "Reply-To: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
