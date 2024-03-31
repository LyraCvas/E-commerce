<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Rhinotech</title>
</head>

<body>

    <?php
    require 'config/config.php';
    require 'config/conexionbd.php';
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
            <div class="row">
                <div class="col-6">
                    <h2>Metodos de pago</h4>
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
                                                <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"><?php echo MONEDA . number_format($sub_total, 2, '.', ','); ?></div>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                    <tr>
                                        <td colspan="4">
                                            <p class="h3 text-end" id="total"><?php echo MONEDA . number_format($total, 2, '.', ','); ?></p>
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
</body>

<script>
    let deleteModal = document.getElementById('deleteModal')
    deleteModal.addEventListener('show.bs.modal', function(event) {
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')
        let buttonEliminar = deleteModal.querySelector('.modal-footer #btn-delete')
        buttonEliminar.value = id
    })


    function updateQuantity(quantity, id) {
        let url = 'clases/update_cart.php'
        let formData = new FormData()
        formData.append('action', 'agregar')
        formData.append('id_products', id)
        formData.append('cantidad', quantity)

        fetch(url, {
                method: 'POST',
                body: formData,
                mode: 'cors'
            }).then(response => response.json())
            .then(data => {
                if (data.ok) {
                    let divsubtotal = document.getElementById('subtotal_' + id)
                    divsubtotal.innerHTML = data.sub

                    let total = 0.00
                    let list = document.getElementsByName('subtotal[]')

                    for (let i = 0; i < list.length; i++) {
                        total += parseFloat(list[i].innerHTML.replace(/[$,]/g, ''))
                    }
                    total = new Intl.NumberFormat('en-US', {
                        minimumFractionDigits: 2
                    }).format(total)
                    document.getElementById('total').innerHTML = '<?php echo MONEDA; ?>' + total
                }
            })
    }

    function eliminar() {
        let buttonEliminar = document.getElementById('btn-delete')
        let id = buttonEliminar.value

        let url = 'clases/update_cart.php'
        let formData = new FormData()
        formData.append('action', 'eliminar')
        formData.append('id_products', id)

        fetch(url, {
                method: 'POST',
                body: formData,
                mode: 'cors'
            }).then(response => response.json())
            .then(data => {
                if (data.ok) {
                    location.reload()
                }
            })
    }
</script>


</body>

</html>