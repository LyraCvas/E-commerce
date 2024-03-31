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

    //Buscador
    $where = "1=1";
    $name = $_REQUEST['name'] ?? '';
    if (empty($name) == false) {
        $where = "product_name like '%" . $name . "%' OR product_brand like '%" . $name . "%'";
    } //Buscador hasta aqui

    //Paginador
    $queryCount = "SELECT COUNT(*) AS count FROM products WHERE $where ;";
    $resCount = $con->prepare($queryCount);
    $resCount->execute();
    $rowCount = $resCount->fetch(PDO::FETCH_ASSOC);
    $totalCount = $rowCount['count'];

    $itmspPage = 6;

    $totalPages = ceil($totalCount / $itmspPage);

    $selectPage = $_REQUEST['page'] ?? false;

    if ($selectPage == false) {
        $limitStart = 0;
        $selectPage = 1;
    } else {
        $limitStart = ($selectPage - 1) * $itmspPage;
    }

    $limit = "limit $limitStart,$itmspPage";
    //Paginador hasta aqui

    $sql = $con->prepare("SELECT id_products, product_name, product_brand, year, price, discount, category FROM products WHERE $where AND activo=1 $limit");
    $sql->execute();

    //print_r($sql);

    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
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
                            <a href="./index.php" ><i class="fa-solid fa-house"></i></a>
                        </li>
                        <li class="menu_litem">
                            <a href="./products.php" id="selected">Tienda</a>
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
            <!-- Barra de busqueda  -->
            <div class=" row row-cols-1 row-cols-sm-2 row-cols-md-3 py-2 flex-end ">
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" action="products.php">
                    <div class="input-group">
                        <input type="search" class="form-control" placeholder="Buscar..." aria-label="Search" aria-label="Search" name="name" value="<?php echo $_REQUEST['name'] ?? ''; ?>">
                        <button class="btn btn-outline-secondary " type="submit">
                            <i class="fas fa-search"></i>
                        </button>

                    </div>
                </form>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($resultado as $row) { ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <?php
                            $id = $row['id_products'];
                            $img = "resources/imgs/products/" . $id . "/primary.webp";
                            if (!file_exists($img)) {
                                $img = "resources/imgs/noimage.jpg";
                            }
                            ?>
                            <div class="contenedor_img">
                                <img class="img_product" src="<?php echo $img ?>" alt="">
                            </div>
                            <div class="card-body">
                                <p class="card-text"><?php echo $row['product_name'] ?></p>
                                <p class="card-text"><?php echo $row['product_brand'] ?></p>
                                <p class="card-text"><?php echo $row['year'] ?></p>
                                <?php if ($row['discount'] > 0) { ?>
                                    <div class="d-flex justify-content-start align-items-center gap-1">
                                        <h5 class="text-muted"><del><?php echo MONEDA . number_format($row['price'], 2, '.', ','); ?></del></h5>
                                        <h5>
                                            <?php echo MONEDA . number_format(($row['price'] - ($row['price'] * $row['discount'] / 100)), 2, '.', ','); ?>
                                            <small class="text-success"><?php echo $row['discount'] ?>%</small>
                                        </h5>
                                    </div>

                                <?php } else { ?>
                                    <h5 class="text-muted"><?php echo MONEDA . number_format($row['price'], 2, '.', ','); ?></h5>
                                <?php } ?>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="details.php?id=<?php echo $row['id_products']; ?>&token=<?php echo hash_hmac('sha1', $row['id_products'], KEY_TOKEN); ?>" class="btn btn-primary">Detalles</a>

                                    </div>

                                    <button class="btn btn-outline-primary" type="button" onclick="addProduct(<?php echo $row['id_products']; ?>,'<?php echo hash_hmac('sha1', $row['id_products'], KEY_TOKEN); ?>')">
                                        Agregar al carrito</button>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php
            if ($totalPages > 0) {
            ?>
                <nav aria-label="Page navigation ">
                    <ul class="pagination mt-2">
                        <?php
                        if ($selectPage != 1) {
                        ?>
                            <li class="page-item">
                                <a class="page-link" href="products.php?page=<?php echo ($selectPage - 1); ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php
                        for ($i = 1; $i <= $totalPages; $i++) {
                        ?>
                            <li class="page-item <?php echo ($selectPage == $i) ? "active" : " "; ?>" aria-current="page">
                                <a class="page-link" href="products.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php } ?>
                        <?php
                        if ($selectPage != $totalPages) {
                        ?>
                            <li class="page-item">
                                <a class="page-link" href="products.php?page=<?php echo ($selectPage + 1); ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            <?php } ?>
        </div>
    </main>


    <?php include_once "./clases/footer.php" ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function addProduct(id, token) {
            let url = 'clases/cart.php'
            let formData = new FormData()
            formData.append('id', id)
            formData.append('token', token)

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                }).then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        let elemento = document.getElementById("num_cart")
                        elemento.innerHTML = data.numero
                    }
                })
        }
    </script>

</body>

</html>