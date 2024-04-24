<?php
require 'config/config.php';
require 'config/conexionbd.php';
require 'clases/clienteFunciones.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once './config/config.php';
require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';
require './phpmailer/src/Exception.php';

if (isset($_POST['submit'])) {
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $asunto = $_POST['asunto'];
  $mensaje = $_POST['mensaje'];

  $errors = array();
  if (empty($nombre)) {
    $errors[] = 'el campo nombre es obligatorio';
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'la direccion de correo no es valida';
  }
  if (empty($asunto)) {
    $errors[] = 'el campo asunto es obligatorio';
  }
  if (empty($mensaje)) {
    $errors[] = 'el campo mensaje es obligatorio';
  }

  if (count($errors) == 0) {
    $mjs = "De: $nombre <a href='mailto:$email'>$email</a><br>";
    $mjs .= "Asunto: $asunto <br><br>";
    $mjs .= "Cuerpo del mensaje:";
    $mjs .= '<p>' . $mensaje . '</p>';

    $mail = new PHPMailer(true);
    try {
      $mail->SMTPDebug = SMTP::DEBUG_OFF;
      $mail->isSMTP();
      $mail->Host       = 'smtp.gmail.com';
      $mail->SMTPAuth   = true;
      $mail->Username   = 'ecommerceluzcva@gmail.com';
      $mail->Password   = 'tycq abwc ptax ogml';
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
      $mail->setFrom('ecommerceluzcva@gmail.com', 'contacto');
      $mail->addAddress('sebastianlira2010@hotmail.com', 'Contacto');

      $mail->isHTML(true);
      $mail->Subject = 'Formulario de Contacto';
      $mail->Body = $mjs;
      $mail->send();

      $respuesta = 'correo enviado';
    } catch (Exception $e) {
      $respuesta  = 'Mensaje' . $mail->ErrorInfo;
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rhinotech</title>
  <link rel="stylesheet" href="./resources/css/estilos.css">
  <link rel="stylesheet" href="./resources/css/contacto.css">
  <link rel="shortcut icon" href="./recursos/logos/Rhino Tech ISOTIPO 3-02.webp" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://kit.fontawesome.com/9a29282719.js" crossorigin="anonymous"></script>

</head>

<body>

  <?php include_once 'clases/header.php' ?>

  <div class="container container-form pt-3">
    <div class="row col-md-12 col-lg-10 info-form">
      <h2>Contactanos</h2>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias libero corrupti quaerat veniam et temporibus. Hic laborum ducimus eius voluptas dolore explicabo commodi, eum facere ex nulla minus, perferendis dicta.</p>
      <a href="tel:+4128780067"><i class="fa fa-phone">04128780061</i></a>
      <a href="mailto:rhinotechdesign@gmail.com"><i class="fa fa-envelope">Rhinotechdesign@gmail.com</i></a>
      <address><i class="fa fa-map-marked"></i><span> Ciudad.Pais </span></address>
    </div>
    <div class="row col-md-12 col-lg-10 ">
      <?php
      if (isset($errors)) {
        if (count($errors) > 0) {
      ?>
          <div class="alert alert-danger alert-dismissible" role="alert">
            <?php
            foreach ($errors as $error) {
              echo $error . '<br>';
            }
            ?>
          </div>
      <?php
        }
      } ?>
      <form class="form" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" autocomplete="off">
        <div class="mb-1">
          <!-- <label for="nombre" class="form-label">Nombre</label> -->
          <input type="text" name="nombre" id="nombre" placeholder="Ingresa tu nombre" class="campo form-control" required autofocus>
        </div>
        <div class="mb-1">
          <!-- <label for="email" class="form-label">Email</label> -->
          <input type="email" name="email" id="email" placeholder="Ingresa tu correo" class="campo form-control" required>
        </div>
        <div class="mb-1">
          <!-- <label for="asunto" class="form-label">Asunto</label> -->
          <input name="asunto" id="asunto" placeholder="De que se trata tu peticion" class="campo form-control" required>
        </div>
        <div class="mb-1">
          <!-- <label for="mensaje" class="form-label">Mensaje</label> -->
          <textarea name="mensaje" id="mensaje" placeholder="Dejanos un mensaje" class="campo form-control" rows="3" required></textarea>
        </div>
        <div class="mb-1">
          <button type="submit" name="submit" class="btn1 w-100">Enviar</button>
        </div>
      </form>
    </div>
    <?php if (isset($respuesta)){?>
       <div class="row">
       <div class="col-lg-8 col-md-10">
          <?php echo $respuesta; ?>
       </div>
       </div>
    <?php }?>
  </div>


  <?php //include_once 'clases/footer.php' ?>

</body>

</html>