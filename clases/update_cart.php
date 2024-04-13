<?php 
require '../config/config.php';
require '../config/conexionbd.php';


if(isset($_POST['action'])){
    $action = $_POST['action'];
    $id = isset($_POST['id_products'])? $_POST['id_products'] : 0;

    if ($action == 'agregar'){
        $quantity = isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;
        $response = agregar($id,$quantity);
        if ($response > 0){
            $datos['ok'] = true;
        }else{
            $datos['ok'] = false;
        }
        $datos['sub'] = MONEDA . number_format($response, 2, '.', ',');
    }else if($action == 'eliminar'){
        $datos['ok'] = eliminar($id);
    } else{
        $datos['ok'] = false;
    }
}else{
    $datos['ok'] = false;
}

echo json_encode($datos);

function agregar($id, $quantity)

{
    $res = 0;
    if ($id > 0 && $quantity > 0 && is_numeric(($quantity))){
        if (isset($_SESSION['cart']['products'][$id])){
        $_SESSION['cart']['products'][$id] = $quantity;

        $db = new Database();
        $con = $db->conectar();    
        $sql = $con->prepare("SELECT price, discount FROM products WHERE id_products=? AND activo=1 LIMIT 1");
        $sql->execute([$id]);
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        $price = $row['price'];
        $discount = $row['discount'];
        $price_discount = $price - (($price * $discount) / 100);
        $res = $quantity * $price_discount;
        
        return $res;
        }
        
    }else{
        return $res;
    }
}

function eliminar($id){
    if($id > 0){
        if (isset($_SESSION['cart']['products'][$id])){
            unset($_SESSION['cart']['products'][$id]);
            return true;
        } else{
            return false;
        }       
    }
}