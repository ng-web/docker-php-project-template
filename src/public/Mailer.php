<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../vendor/autoload.php';

//send mail function
function sendEmail($to, $subject, $body)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;              //Enable verbose debug output
        $mail->isSMTP();                                    //Send using SMTP
        $mail->Host       = getenv('SMTP_HOST');            //Set the SMTP server 
        $mail->SMTPAuth   = true;                           //Enable SMTP authentication
        $mail->Username   = getenv('SMTP_USER');            //SMTP username
        $mail->Password   = getenv('SMTP_PASSWORD');        //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //Enable implicit TLS encryption
        $mail->Port       = getenv('SMTP_PORT');            //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('JPS@gmail.com', 'Mailer');
        $mail->addAddress($to);     //Add a recipient

        //Content
        $mail->isHTML(true);        //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}