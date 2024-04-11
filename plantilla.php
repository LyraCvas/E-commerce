<?php

require 'config/conexionbd.php';
require 'clases/clienteFunciones.php';
require 'config/config.php';

$db = new database();
$con =  $db->conectar();

$errors = [];

if(!empty($_POST)){

    $nombres = trim($_POST['nombres']);
    $direccion = trim($_POST['direccion']);
    $email = trim($_POST['email']);
    $telefono = trim($_POST['telefono']);
    $dni = trim($_POST['dni']);
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);
    $repassword = trim($_POST['repassword']);

    if(esNulo([$nombres,$direccion,$email,$telefono,$dni,$usuario,$password, $repassword])){
        $errors[] = "Debe llenar todos los campos"; 
    }

    if(!esEmail ($email)) {
        $errors[] = "La dirección de correo  no es válida";
    }

    if(!validaPassword($password, $repassword)){
        $errors[] = "Las contraseñas no coinciden";
    }

    if(usuarioExiste($usuario, $con)){
        $errors[] = "El nombre de usuario $usuario ya existe";
    }

    if(emailExiste($email, $con)){
        $errors[] = "El correo electronico $email ya existe";
    }

   




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./resources/css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/9a29282719.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
<header>
        <div class="header__superior">
            <div class="logo">
                <img src="./resources/imgs/logos/Rhino Tech -1.png" alt="" />
            </div>

            <div class="carrito">
                <div class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 ">
                    <a href="cart_list.php" type="button" class="btn btn-primary position-relative">
                        <i class="fa-solid fa-cart-shopping"></i><span id="num_cart" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?php echo $num_cart; ?></span>
                    </a>
                </div>
            </div>
            <div class="banderas">
                <a href=""><img src="./resources/imgs/Banderas/icons8-emoji-de-las-islas-periféricas-de-ee-uu-48.png" alt="" />
                </a>
                <a href=""><img src="./resources/imgs/Banderas/icons8-emoji-españa-48.png" alt="" /></a>
            </div>
        </div>

        <div class="container__menu">
            <div class="menu">
                <input type="checkbox" id="check__menu" />
                <label for="check__menu" id="label__check">
                    <i class="fas fa-bars icon__menu"></i>
                </label>
                <nav class="menu_nav">
                    <ul class="menu_list">
                        <li class="menu_litem">
                            <a href="./index.php" id="selected"><i class="fa-solid fa-house"></i></a>
                        </li>
                        <li class="menu_litem">
                            <a href="./products.php">Tienda</a>
                            <ul class="menu_list">
                                <li class="menu_litem"><a href="./products.php?ctg=laptops">Laptos</a></li>
                                <li class="menu_litem"><a href="./products.php?ctg=desktop">Desktop</a></li>
                                <li class="menu_litem"><a href="./products.php?ctg=impresoras">Impresoras</a></li>
                                <li class="menu_litem"><a href="./products.php?ctg=audifonos">Audifonos</a></li>
                                <li class="menu_litem"><a href="./products.php?ctg=teclados">Teclados</a></li>
                            </ul>
                        </li>
                        <li class="menu_litem"><a href="#">Nosotros</a></li>
                        <li class="menu_litem"><a href="#">Blog</a></li>
                        <li class="menu_litem"><a href="#">Contactos</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

<main>
    <div class="container">

   </div>

</main>







</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>




</body>
</html>