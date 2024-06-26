<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer{   

    function enviarEmail($email,$asunto, $cuerpo){
        
        require_once __DIR__ . '/../config/config.php';
        require __DIR__ . '/../phpmailer/src/PHPMailer.php';
        require __DIR__ . '/../phpmailer/src/SMTP.php';
        require __DIR__ . '/../phpmailer/src/Exception.php';
        

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;   //SMTP::DEBUG_OF; SMTP::DEBUG_SERVER;                  
    $mail->isSMTP();                                            
    $mail->Host       = MAIL_HOST;
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = MAIL_USER;                     
    $mail->Password   = MAIL_PASS;                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = MAIL_PORT;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom(MAIL_USER, 'Rhinotech');
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