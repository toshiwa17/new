<?php
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];


$email_from = 'info@mcragriventure.c1.biz';
$email_subject = 'New Inquiry';

$email_body = "Customer Name: $name. \n".
                "Customer Email: $visitor_emai. \n".
                  "Subject: $subject. \n".
                    "Message: $message. \n";

$to = 'rhamy.bawit98@gmail.com';
$headers = "From: $email_from \r\n";
$headers .= "Reply-to: $email \r\n"; 

mail($to,$email_body,$email_body,$headers);
header("Location: contact.html")
?>