<?php

require 'config/conexionbd.php';
require 'clases/clienteFunciones.php';
require 'config/config.php';

$db = new database();
$con =  $db->conectar();

$exito = [];
$errors = [];


if(!empty($_POST)){


    $email = trim($_POST['email']);
   

    if(esNulo([$email])){
        $errors[] = "Debe llenar todos los campos"; 
    }

    if(!esEmail ($email)) {
        $errors[] = "La dirección de correo  no es válida";
    }

    if(count($errors)==0){
        if(emailExiste($email, $con)){
            $sql = $con->prepare("SELECT usuarios.id, clientes.nombres FROM usuarios INNER JOIN clientes ON usuarios.id_cliente=clientes.id 
            WHERE clientes.email LIKE ? LIMIT 1");

            $sql->execute([$email]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $user_id = $row['id'];
            $nombres = $row['nombres'];

            $token = solicitaPassword($user_id, $con);

            if($token !== null){
                require 'clases/Mailer.php';
                $mailer = new  Mailer();

                $url = SITE_URL . '/reset_password.php?id=' .$user_id .'&token=' .$token;

                $asunto = "Recuperar Password - Tienda online";
                $cuerpo ="Estimado $nombres: <br> Si has salicitado el cambio de tu contraseña haz 
                click en el siguiente link <a href='$url'>$url</a>";
                $cuerpo.= "<br>Si no has realializaste esta solicitud puedes ignorar este correo";

                if($mailer->enviarEmail($email, $asunto, $cuerpo)){
                    $exito[] = "Hemos enviado un correo electronico a la dirección $email para restablecer la contraseña";
                    
                    //echo "<p><b>Correo Enviado</b></p>";
                    //echo "<p>Hemos enviado un correo electronico a la dirección $email para restablecer la contraseña</p>";

                   // exit;
                } 

            }
         
        } else {
            $errors[] = "No existe una cuenta asociada a esta dirección de correo";
        }
    }
} 




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./resources/css/estilos.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/9a29282719.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
<?php include_once './clases/header.php'?>


<main class="form-login m-auto pt-4" style="max-width: 350px;" >
    <h3>Recuperar contraseña</h3>
    
    <?php mostrarExito($exito);?>
    <?php mostrarMensajes($errors); ?> 

    <form action="recupera.php" method="post" class="row g-3" autocomplete="off">
        
        <div class="form-floating">
            
            <input class="form-control"  type="email" name="email" id="email" placeholder="Correo Electrónico" >
            <label for="email">Correo Electrónico</label>

        </div>

        <div class="d-grid gap-3 col-12">
            <button type="submit" class="btn btn-primary">Continuar</button>
        </div>

        
        <div class="col-12">
            ¿No tiene cuenta? <a href="registro.php">Registrate aqui</a>
        </div>



    </form>

</main>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>




</body>
</html>