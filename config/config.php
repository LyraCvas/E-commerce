<?php 
define("MAIL_HOST", "mail.codigosdeprogramacion.com");
define("MAIL_USER", "noreply@codigosdeprogramacion.com");
define("MAIL_PASS", "tu_password");
define("MAIL_PORT", "465");


define("SITE_URL", "http://localhost/E-commerce");

define("KEY_TOKEN", "APR.345-dzr");
define("MONEDA", "$");

session_start();

$num_cart = 0;
if (isset($_SESSION['cart']['products'])){
    $num_cart = count($_SESSION['cart']['products']);
}
?>