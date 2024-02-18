<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception';
require 'PHPMailer/src/PHPMailer';
require 'PHPMailer/src/SMTP';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

if(isset($_POST['send'])) {
    $sender = $_POST['sender'];
    $name = $_POST['name'];
    $subject = $_POST['subject']; 
    $content = $_POST['content'];

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'raba.dagohoy.ui@phinmaed.com';                     //SMTP username
        $mail->Password   = 'kdwwxglxbzngyzeq';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($sender, $name);
        $mail->addAddress('raba.dagohoy.ui@phinmaed.com', 'MCR Admin');


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $content;

        $mail->send();
        ?>
        <script>
            alert("Your Message has been sent.");
            window.location.href = "contact";
        </script>
        <?php
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}