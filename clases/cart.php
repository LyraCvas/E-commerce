<?php
require '../config/config.php';

if (isset($_POST['id'])){

    $id = $_POST['id'];
    $token = $_POST['token'];

    $token_temp = hash_hmac('sha1', $id, KEY_TOKEN);

    if ($token == $token_temp){

        if(isset($_SESSION['cart']['products'][$id])){
            $_SESSION['cart']['products'][$id] += 1;
        } else {
            $_SESSION['cart']['products'][$id] = 1;
        }

        $datos['numero']=count($_SESSION['cart']['products']);
        $datos['ok'] = true;
    }else{
        $datos['ok'] = false;
    }

}else{
    $datos['ok'] = false;
}

echo json_encode($datos);
