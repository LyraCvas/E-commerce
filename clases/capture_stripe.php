<?php
$total = $_REQUEST['total']??'';

include_once "./stripe/init.php";
require_once '../clases/secrets_stripe.php';

$stripe = new \Stripe\StripeClient($stripeSecretKey);
$token = $_POST['stripeToken'];
$charge=\Stripe\Charge::create([
    'amount'=>$total,
    'currecy'=>'usd',
    'description'=>'Pago ecommerce',
    'source'=>$token
]);
if($charge['capture']){
    
    $sql = $con->prepare("INSERT INTO orders (id_transaccion, date_order, estatus, email, client_id, total_payment) 
                                      VALUES ('".$charge['id']."',now(),?,?,'".$_SESSION['id_client']."','".$total."')");
    $sql->execute();
    $id = $con->lastInsertId();

    // probando
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
        }
        unset($_SESSION['cart']);
    }
}