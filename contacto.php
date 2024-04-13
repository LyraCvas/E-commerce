<?php
require 'config/config.php';
require 'config/conexionbd.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once './config/config.php';
require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';
require './phpmailer/src/Exception.php';

if (isset($_POST['submit'])){
  $nombre = $_POST['nombre'];
  $email= $_POST['email'];
  $asunto = $_POST['asunto'];
  $mensaje = $_POST['mensaje'];
  $errors = array();
  if (empty($nombre)){
    $errors[] = 'el campo nombre es obligatorio';
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



  <div class="container-form d-flex">
    <div class="info-form row col-md-6 col-12">
      <h2>Contactanos</h2>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias libero corrupti quaerat veniam et temporibus. Hic laborum ducimus eius voluptas dolore explicabo commodi, eum facere ex nulla minus, perferendis dicta.</p>
      <a href="tel:+4128780067"><i class="fa fa-phone">04128780061</i></a>
      <a href="mailto:rhinotechdesign@gmail.com"> <i class="fa fa-envelope">Rhinotechdesign@gmail.com</i></a>
      <address><i class="fa fa-map-marked"></i><span> Ciudad.Pais </span></address>
    </div>
    <div class="row ">
      
        <form action="#" autocomplete="off">
        <input type="text" name="nombre" placeholder="Ingresa tu nombre" class="campo">
        <input type="email" name="email" placeholder="Ingresa tu correo" class="campo">
        <textarea name="mensaje" placeholder="Dejanos un mensaje"></textarea>
        <input type="submit" name="enviar" value="Enviar mensaje" class="btn-enviar">
      </form>
      
      
    </div>

  </div>


<?php include_once 'clases/footer.php'?>

</body>

</html>