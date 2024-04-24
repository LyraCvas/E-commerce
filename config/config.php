<?php 

define("MAIL_HOST", "smtp.gmail.com");
define("MAIL_USER", "ecommerceluzcva@gmail.com");
define("MAIL_PASS", "tycq abwc ptax ogml");
define("MAIL_PORT", "465");


define("SITE_URL", "http://localhost/E-commerce");

// Para paypal
define("CLIENT_ID", "ATpxrlBE0Xumjgn5TmacF4qoevGoxIm7TpGhWkuT7ITCLUbT--X3o3yzdQj8u82bstNMULoNYHs2Pfyf");
define("CURRENCY", "USD");

define("KEY_TOKEN", "APR.345-dzr");
define("MONEDA", "$");

session_start();

$num_cart = 0;
if (isset($_SESSION['cart']['products'])){
    $num_cart = count($_SESSION['cart']['products']);
}
?>