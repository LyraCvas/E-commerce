<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/estilos.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    }
    // print_r($cart_list);
    ?>


    <!-- Header-->
    <?php include_once './clases/header.php'?>

    <main>
        <div class="container">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th></th><!-- Imagen del producto -->
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th></th><!-- Boton eliminar producto -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($cart_list == null) {
                            echo '<tr><td colspan="6" class="text-center"><b>Carrito Vacio, añade algun producto primero</b></td></tr>';
                            echo '<tr><td colspan="6" class="text-center"><a class="btn1 btn_a" type="button" href="products.php">Ir a productos</a></td></tr>';
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
                                    <td><?php echo MONEDA . number_format($price_discount, 2, '.', ','); ?></td>
                                    <td>
                                        <input type="number" min="1" max="10" step="1" value="<?php echo $quantity; ?>" size="5" id="quantity_<?php echo $_id; ?>" onchange="updateQuantity(this.value, <?php echo $_id; ?>)">
                                    </td>
                                    <td>
                                        <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"><?php echo MONEDA . number_format($sub_total, 2, '.', ','); ?></div>
                                    </td>
                                    <td> <a href="#" id="delete" class="btn btn-warning btn-sm" data-bs-id="<?php echo $_id; ?>" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fa-solid fa-trash"></i></a></td>
                                </tr>
                            <?php } ?>

                            <tr>
                                <td colspan="4"></td>
                                <td colspan="2">
                                    <p class="h3" id="total"><?php echo MONEDA . number_format($total, 2, '.', ','); ?></p>
                                </td>
                            </tr>
                    </tbody>
                <?php } ?>
                </table>
            </div>
            <?php if ($cart_list != null) { ?>
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-end gap-2 p-3">
                        <a href="payment.php" class="btn btn-primary btn-lg">Pagar</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Eliminar producto de la lista</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseas eliminar el producto de la lista?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No quiero</button>
                    <button id="btn-delete" type="button" class="btn btn-danger" onclick="eliminar()">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

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