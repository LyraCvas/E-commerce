<?php

use PHPMailer\PHPMailer\{PHPMailer,SMTP,Exception};



require '../phpmailer\src\PHPMailer.php';
require '../phpmailer\src\SMTP.php';
require '../phpmailer\src\Exception.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;   //SMTP::DEBUG_OF;                   
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'ecommerceluzcva@gmail.com';                     
    $mail->Password   = 'tycq abwc ptax ogml';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('ecommerceluzcva@gmail.com', 'Mailer');
    $mail->addAddress('sebastianlira2010@hotmail.com', 'User');     //Add a recipient


    //Content
    $mail->isHTML(true);        
    $mail->Subject = 'Detalles de su compra';
    $body = '<h4> Gracias por su compra</h4>';
    $body .='<p> El id de su compra es <b>'.$id_transaccion.'</b></p>';
    $mail->Body    = $body;
    $mail->AltBody = 'Los detalles de su compra.';

    $mail->setLanguage('es', '../phpmailer\language\phpmailer.lang-es.php' );

    $mail->send();
} catch (Exception $e) {
    echo "Error al enviar el correo: {$mail->ErrorInfo}";
    //exit;
}