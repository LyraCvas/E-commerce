<?php 

define("KEY_TOKEN", "APR.345-dzr");
define("MONEDA", "$");

session_start();

$num_cart = 0;
if (isset($_SESSION['cart']['products'])){
    $num_cart = count($_SESSION['cart']['products']);
}
?>