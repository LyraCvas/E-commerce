<?php
require '../config/config.php';
require '../config/conexionbd.php';
$db = new Database();
$con = $db->conectar();

$json = file_get_contents('php://input');

$data = json_decode($json,true);

//   echo '<pre>';
//   print_r($data);
//   echo '</pre>';

if(is_array($data)){

    $id_transaccion = $data['details']['id'];
    $total = $data['details']['purchase_units'][0]['amount']['value'];
    $status = $data['details']['status'];
    $date = $data['details']['update_time'];
    $date_new = date('Y-m-d H:i:s', strtotime($date));
    $email = $data['details']['payer']['email_address'];
    $id_client = $data['details']['payer']['payer_id'];


    $sql = $con->prepare("INSERT INTO orders (id_transaccion, date_order, estatus, email, client_id, total_payment) VALUES (?,?,?,?,?,?)");
    $sql->execute([$id_transaccion, $date_new, $status, $email, $id_client, $total]);
    $id = $con->lastInsertId();

    if ($id > 0){

        $products = isset($_SESSION['cart']['products']) ? ($_SESSION['cart']['products']) : null;

        if ($products != null) {

            foreach ($products as $key => $quantity) {
                $sql = $con->prepare("SELECT id_products, product_name, price, discount FROM products WHERE id_products=? AND activo=1 ");
                $sql->execute([$key]);
                $row_prod = $sql->fetch(PDO::FETCH_ASSOC);

                $price = $row_prod['price'];
                $discount = $row_prod['discount'];
                $price_discount = $price - (($price * $discount) / 100);

                $sql_products = $con->prepare("INSERT INTO orders_products (order_id, product_id, product_name, price, quantity) VALUES (?,?,?,?,?)");
                $sql_products->execute([$id, $key, $row_prod['product_name'], $price_discount, $quantity]);

            }
            // enviar correo
            include 'send_email.php';
        }
        unset($_SESSION['cart']);
    }
    
}

?>