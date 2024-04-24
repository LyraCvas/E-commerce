<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./resources/css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Stripe empieza -->
    <link rel="stylesheet" href="./resources/css/stripe.css"/>    
    <script src="https://js.stripe.com/v3/"></script>    
    <!-- Stripe termina -->
    <title>Rhinotech</title>
</head>

<body>

    <?php
    require 'config/config.php';
    require 'config/conexionbd.php';
    require 'clases/clienteFunciones.php';
    $db = new Database();
    $con = $db->conectar();

    $products = isset($_SESSION['cart']['products']) ? ($_SESSION['cart']['products']) : null;

    //print_r($_SESSION);


    $cart_list = array();

    if ($products != null) {
        foreach ($products as $key => $quantity) {
            $sql = $con->prepare("SELECT id_products, product_name, price, discount, $quantity AS cantidad FROM products WHERE id_products=? AND activo=1 ");
            $sql->execute([$key]);
            $cart_list[] = $sql->fetch(PDO::FETCH_ASSOC);
        }
    } else {
        header("Location: index.php");
        exit;
    }

    ?>


    <!-- Header -->
    <?php include_once './clases/header.php'?>


    <main>
        <div class="container">
            <div class="row  row-cols-sm-1 row-cols-md-2 cols-1">
                <div class="col-6">
                    <h2>Metodos de pago</h4>
                        <!-- BOTONES PAYPAL -->
                        <div id="paypal-button-container"></div>

                        <!-- Display a payment form STRIPE -->
                        <!-- <h2>Stripe</h4>
                        <form id="payment-form" method="post" action="/clases/capture_stripe.php">
                            
                            <div id="payment-element">
                                
                            </div>
                            
                            <button id="submit">
                                <div class="spinner hidden" id="spinner"></div>
                                <span id="button-text">Pay now</span>
                            </button>
                            <div id="payment-message" class="hidden"></div>
                        </form> -->
                </div>
                <div class="col-6">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($cart_list == null) {
                                    echo '<tr><td colspan="5" class="text-center"><b>Lista vacia</b></td></tr>';
                                } else {
                                    $total = 0;
                                    foreach ($cart_list as $product) {
                                        $_id = $product['id_products'];
                                        $name = $product['product_name'];
                                        $price = $product['price'];
                                        $discount = $product['discount'];
                                        $quantity = $product['cantidad'];
                                        $price_discount = $price - (($price * $discount) / 100);
                                        $sub_total = $quantity * $price_discount;
                                        $total += $sub_total;

                                ?>
                                        <tr>
                                            <td><!-- imagen del producto -->
                                                <?php
                                                $id = $product['id_products'];
                                                $img = "resources/imgs/products/" . $id . "/primary.webp";
                                                if (!file_exists($img)) {
                                                    $img = "resources/imgs/noimage.jpg";
                                                }
                                                ?>
                                                <div class="contenedor_img contenedor_img-mini">
                                                    <img class="img_product-mini" src="<?php echo $img ?>" alt="">
                                                </div>
                                            </td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $quantity; ?></td>
                                            <td>
                                                <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"><?php echo MONEDA . number_format($sub_total, 2, ',', '.'); ?></div>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                    <tr>
                                        <td colspan="4">
                                            <p class="h3 text-end" id="total"><?php echo MONEDA . number_format($total, 2, ',', '.'); ?></p>
                                            <!-- Para Stripe -->
                                            <input type="hidden" name="total" value="<?php echo $total * 100;?>">
                                        </td>
                                    </tr>
                            </tbody>
                        <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>

    <?php include_once "./clases/footer.php" ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&currency=<?php echo CURRENCY; ?>"></script>

    <script src="./js/stripe2.js" defer></script>
    <!-- == Botontes de PAYPAL == inicio -->
    <script>
        paypal.Buttons({
            style: {
                color: 'blue',
                shape: 'rect',
                label: 'pay'
            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        //el monto total esta redondeado, porque no me agarra los decimales
                        amount: {
                            value: <?php echo number_format($total, 2, '.', '') ?>
                        }
                    }]
                })
            },
            onApprove: function(data, actions) {
                let URL = 'clases/capture.php'
                actions.order.capture().then(function(details) {
                    console.log(details);

                    return fetch(URL, {
                        method: 'post',
                        headers: {
                            'content-type': 'application/json'
                        },
                        body: JSON.stringify({
                            details: details
                        })
                    }).then(function(response){//para finalizar el pago
                        window.location.href="payment_complete.php?key=" + details['id'];
                    })

                });
            },

            onCancel: function(data) {
                alert("pago cancelado");
                console.log(data);
            }
        }).render('#paypal-button-container')

    </script>
    <!-- == Botontes de PAYPAL == final -->

    <!-- == Botontes de Stripe == inicio -->

    <!-- == Botontes de Stripe == final -->
</body>

</html>