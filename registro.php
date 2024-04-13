<?php

require 'config/conexionbd.php';
require 'clases/clienteFunciones.php';
require 'config/config.php';

$db = new database();
$con =  $db->conectar();

$exito = [];
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

    if(count ($errors) == 0 ){

        $id = registraCliente([$nombres, $direccion, $email, $telefono, $dni], $con);

        if($id > 0){
            
            require 'clases/Mailer.php';
            $mailer = new  Mailer();
            $token = generarToken();
     

            $pass_hash = password_hash($password, PASSWORD_DEFAULT);
           
            $idUsuario = registraUsuario([$usuario, $pass_hash, $token, $id], $con);
            if ($idUsuario > 0){

                $url = SITE_URL . '/activa_cliente.php?id=' .$idUsuario .'&token=' .$token;
                $asunto = "Activar cuenta - Tienda online";
                $cuerpo ="Estimado $nombres: <br> Para continuar con el proceso de registro es indispensable en la
                sigiente liga <a href='$url'>Activar Cuenta </a>";

                if($mailer->enviarEmail($email, $asunto, $cuerpo)){
                    $exito[] = "Hemos enviado el correo para activar su cuenta a la siguiente direccion: " . $email;
                    //echo "Para terminar el proceso de registro siga las instrucciones que le hemos enviado a la
                    //direccion de correo electronico $email";

                    //exit;
                } 

                }else{
                      $errors[] = "Error al registrar usuario";
                }
                
        } else{
            $errors[] = "Error al registrar cliente";
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


<main>
    <div class="container">
        <h2 style="margin-top:5%; margin-bottom:3%;">Datos del cliente </h2>
        <?php mostrarExito($exito);?>
        <?php mostrarMensajes($errors);?>
      

        <form class="row g-3" action="registro.php" method="post" autocomplete="off">
            
        
                <div class="col-md-6">
                    <label for="nombres"><span class="text-danger">*</span> Nombre Completo</label>
                    <input type="text" name="nombres" id="nombres" class="form-control" requirede >
                
                </div>

                <div class="col-md-6">

                    <label for="direccion"><span class="text-danger">*</span>Dirección</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" requirede >

                </div>


                <div class="col-md-6">

                    <label for="email"><span class="text-danger">*</span>Correo Electronico</label>
                    <input type="text" name="email" id="email" class="form-control" requirede >
                    <span id="validaEmail" class="text-danger"></span>

                </div>

                <div class="col-md-6">

                    <label for="telefono"><span class="text-danger">*</span>Telefono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" requirede >

                </div>

                <div class="col-md-6">
                    
                    <label for="dni"><span class="text-danger">*</span>dni</label>
                    <input type="text" name="dni" id="dni" class="form-control" requirede >

                </div>

                <div class="col-md-6">
                    
                    <label for="usuario"><span class="text-danger">*</span>Usuario</label>
                    <input type="text" name="usuario" id="usuario" class="form-control" requirede >
                    <span id="validaUsuario" class="text-danger"></span>

                </div>

                <div class="col-md-6">
                    
                    <label for="password"><span class="text-danger">*</span>Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" requirede >

                </div>

                <div class="col-md-6">
                    
                    <label for="repassword"><span class="text-danger">*</span>Repetir Contraseña</label>
                    <input type="password" name="repassword" id="repassword" class="form-control" requirede >

                </div>

                <i><b>Nota:</b> Los campos con * son obligatorios</i>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>

            

        </form>
  </div>

</main>







</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script> 
  let txtUsuario =  document.getElementById('usuario')
  txtUsuario.addEventListener("blur", function(){
    existeUsuario(txtUsuario.value)
  }, false)

  let txtEmail =  document.getElementById('email')
  txtEmail.addEventListener("blur", function(){
    existeEmail(txtEmail.value)
  }, false)

  function existeUsuario(usuario){

    let url = "clases/clienteAjax.php"
    let formData = new FormData()
    formData.append("action","existeUsuario")
    formData.append("usuario", usuario)

    fetch(url, {
      method: 'POST',
      body:formData
    }).then(response => response.json())
     .then(data=>{

      if(data.ok){

        document.getElementById('usuario').value = ''
        document.getElementById('validaUsuario').innerHTML = 'Usuario no disponible'

      } else {
        document.getElementById('validaUsuario').innerHTML = ''
      }
     })
  }

  function existeEmail(email){

let url = "clases/clienteAjax.php"
let formData = new FormData()
formData.append("action","existeEmail")
formData.append("email", email)

fetch(url, {
  method: 'POST',
  body:formData
}).then(response => response.json())
 .then(data=>{

  if(data.ok){

    document.getElementById('email').value = ''
    document.getElementById('validaEmail').innerHTML = 'Email no disponible'

  } else {
    document.getElementById('validaEmail').innerHTML = ''
  }
 })
}

</script>

</body>
</html>