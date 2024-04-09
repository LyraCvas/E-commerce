<?php
require 'config/config.php';
require 'config/conexionbd.php';
$db = new Database();
$con = $db->conectar();

$id_transaccion = isset($_GET['key']) ? $_GET['key'] : '0';

$error = '';

if ($id_transaccion == '') {
    $error = 'Error al procesar la peticion';
} else {

    $sql = $con->prepare("SELECT count(id) FROM orders WHERE id_transaccion=? AND estatus=? ");
    $sql->execute([$id_transaccion, 'COMPLETED']);
    if ($sql->fetchColumn() > 0) {        
        $sql = $con->prepare("SELECT id, date_order , email, total_payment FROM orders WHERE id_transaccion=? AND estatus=? LIMIT 1");
        $sql->execute([$id_transaccion, 'COMPLETED']);
        $row = $sql->fetch(PDO::FETCH_ASSOC);

        $id_compra = $row['id'];
        $total = $row['total_payment'];
        $date = $row['date_order'];

        $sqlDet = $con->prepare("SELECT product_name, price, quantity FROM orders_products WHERE order_id = ?");
        $sqlDet->execute([$id_compra]);
    } else {
        $error = 'Error al comprobar la compra';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Stripe empieza -->
    <link rel="stylesheet" href="./resources/css/stripe.css" />
    <script src="https://js.stripe.com/v3/"></script>
    <!-- Stripe termina -->
    <title>Rhinotech</title>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="header__superior">
            <div class="logo">
                <img src="./resources/imgs/logos/Rhino Tech -1.png" alt="" />
            </div>

            <div class="carrito">
                <div class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 ">
                    <a href="cart_list.php" type="button" class="btn btn-primary position-relative">
                        <i class="fa-solid fa-cart-shopping"></i><span id="num_cart" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?php echo $num_cart; ?></span>
                    </a>
                </div>
            </div>
            <div class="banderas">
                <a href=""><img src="./resources/imgs/Banderas/icons8-emoji-de-las-islas-periféricas-de-ee-uu-48.png" alt="" />
                </a>
                <a href=""><img src="./resources/imgs/Banderas/icons8-emoji-españa-48.png" alt="" /></a>
            </div>
        </div>

        <div class="container__menu">
            <div class="menu">
                <input type="checkbox" id="check__menu" />
                <label for="check__menu" id="label__check">
                    <i class="fas fa-bars icon__menu"></i>
                </label>
                <nav class="menu_nav">
                    <ul class="menu_list">
                        <li class="menu_litem">
                            <a href="./index.php" id="selected"><i class="fa-solid fa-house"></i></a>
                        </li>
                        <li class="menu_litem">
                            <a href="./products.php">Tienda</a>
                            <ul class="menu_list">
                                <li class="menu_litem"><a href="./products.php?ctg=laptops">Laptos</a></li>
                                <li class="menu_litem"><a href="./products.php?ctg=desktop">Desktop</a></li>
                                <li class="menu_litem"><a href="./products.php?ctg=impresoras">Impresoras</a></li>
                                <li class="menu_litem"><a href="./products.php?ctg=audifonos">Audifonos</a></li>
                                <li class="menu_litem"><a href="./products.php?ctg=teclados">Teclados</a></li>
                            </ul>
                        </li>
                        <li class="menu_litem"><a href="#">Nosotros</a></li>
                        <li class="menu_litem"><a href="#">Blog</a></li>
                        <li class="menu_litem"><a href="#">Contactos</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <h1>Gracias por su compra</h1>
            <?php if (strlen($error) > 0) { ?>
                <div class="row">
                    <div class="col">
                        <h3><?php echo $error; ?></h3>
                    </div>
                </div>
            <?php }else{ ?>
            <div class="row">
                <div class="col">
                    <b>Folio de la compra </b><?php echo $id_transaccion;?><br>
                    <b>Fecha de compra </b><?php echo $date;?><br>
                    <b>Total </b><?php echo MONEDA . number_format($total, 2, '.','.') ;?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Cantidad</th>
                                <th>Producto</th>
                                <th>Importe</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while( $row_det = $sqlDet->fetch(PDO::FETCH_ASSOC)){
                                $importe = $row_det['price'] * $row_det['quantity']; ?>
                                
                                <tr>
                                    <td><?php echo $row_det['quantity'];?></td>
                                    <td><?php echo $row_det['product_name'];?></td>
                                    <td><?php echo $importe;?></td>
                                </tr>   
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php } ?>
        </div>
    </main>
</body>