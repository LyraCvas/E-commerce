<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer{   

    function enviarEmail($email,$asunto, $cuerpo){
        
        require_once './config/config.php';
        require './phpmailer/src/PHPMailer.php';
        require './phpmailer/src/SMTP.php';
        require './phpmailer/src/Exception.php';
        

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;   //SMTP::DEBUG_OF;                   
    $mail->isSMTP();                                            
    $mail->Host       = MAIL_HOST;
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = MAIL_USER;                     
    $mail->Password   = MAIL_PASS;                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = MAIL_PORT;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom(MAIL_USER, 'CDP');
    $mail->addAddress($email);     //Add a recipient


    //Content
    $mail->isHTML(true);        
    $mail->Subject = $asunto;

   
    $mail->Body    = utf8_decode($cuerpo);


    $mail->setLanguage('es', '../phpmailer\language\phpmailer.lang-es.php' );

    if($mail->send()){
        return true;
    }else{
        return false;
    }

} catch (Exception $e) {
    echo "Error al enviar el correo: {$mail->ErrorInfo}";
    return false;
    //exit;
}
      
    }



}