<?php

require 'config/conexionbd.php';
require 'clases/clienteFunciones.php';
require 'config/config.php';

$user_id = $_GET['id'] ?? $_POST['user_id'] ?? '';
$token = $_GET['token'] ?? $_POST['token'] ?? '';

if($user_id == ''  || $token == ''){
    header ("Location: index.php");
    exit;

}

$db = new database();
$con =  $db->conectar();

$exito = [];
$errors = [];

if(!verificaTokenRequest($user_id, $token, $con)) {
    
    echo "No se pudo verificar la informacion";
    exit;
}

if(!empty($_POST)){

 
    $password = trim($_POST['password']);
    $repassword = trim($_POST['repassword']);

    if(esNulo([$user_id, $token, $password, $repassword])){
        $errors[] = "Debe llenar todos los campos"; 
    }

    if(!validaPassword($password, $repassword)){
        $errors[] = "Las contraseñas no coinciden";
    }

    if(count($errors) == 0){
        $pass_hash = password_hash($password, PASSWORD_DEFAULT);
        if(actualizaPassword($user_id, $pass_hash, $con)){
            $exito[] = "Su clave ha sido modificada con exito.";
            //echo "contraseña modificada. <br><a href='login.php'>Iniciar sesión</a>";
            //exit; 
        } else{
            $errors[] = "Error al modificar la contraseña. Intentalo nuevamente";
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
        <h3>Cambiar contraseña</h3>

        <?php mostrarMensajes($errors); ?> 
        <?php mostrarExito($exito); ?>

        <form action="reset_password.php" method="post" class="row g-3" autocomplete="off">

            <input type="hidden" name="user_id" id="user_id" value="<? $user_id;?>"/>
            <input type="hidden" name="token" id="token" value="<? $token;?>"/>


            
            <div class="form-floating">
                
                <input class="form-control"  type="password" name="password" id="password" placeholder="Nueva Contraseña" >
                <label for="password">Nueva Contraseña</label>

            </div>

            
            <div class="form-floating">
                
                <input class="form-control"  type="password" name="repasword" id="repasword" placeholder="Nueva Contraseña" >
                <label for="repasword">Confirmar Contraseña</label>

            </div>

            <div class="d-grid gap-3 col-12">
                <button type="submit" class="btn btn-primary">Continuar</button>
            </div>

            
            <div class="col-12">
                <a href="login.php">Iniciar Sesión</a>
            </div>



        </form>
    </main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>




</body>
</html>