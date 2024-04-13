<?php
require 'config/config.php';
require 'config/conexionbd.php';
$db = new Database();
$con = $db->conectar();

// print_r($_SESSION);

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if ($id == '' || $token == '') {
    echo 'error 1';
    exit;
} else {

    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

    if ($token == $token_tmp) {

        $sql = $con->prepare("SELECT count(id_products) FROM products WHERE id_products=? AND activo=1 ");
        $sql->execute([$id]);
        if ($sql->fetchColumn() > 0) {
            $sql = $con->prepare("SELECT product_name, product_brand, descrip, price, discount FROM products WHERE id_products=? AND activo=1");
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $name = $row['product_name'];
            $brand = $row['product_brand'];
            $descrp = $row['descrip'];
            $price = $row['price'];
            $discount = $row['discount'];
            $price_discount = $price - (($price * $discount) / 100);

            $dir_imgs = 'resources/imgs/products/' . $id . '/';

            $rutaImg = $dir_imgs . 'primary.webp';

            if (!file_exists($rutaImg)) {
                $rutaImg = 'resources/imgs/noimage.jpg';
            }

            $imagenes = array();
            if (file_exists($dir_imgs)) {


                $dir = dir($dir_imgs);

                while (($archivo = $dir->read()) != false) {
                    if ($archivo != 'primary.webp' && (strpos($archivo, 'webp')) || (strpos($archivo, 'jpg'))) {
                        $imagenes[] = $dir_imgs . $archivo;
                    }
                }
                $dir->close();
            }
        }
    } else {
        echo 'error 2';
        exit;
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <title>Rhinotech</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./resources/css/style.css">
</head>

<body>
    <!-- Header -->
    <?php include 'menu.php'; ?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-md-1">
                    <div id="carouselImages" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo $rutaImg; ?>" class="d-block w-100">
                            </div>
                            <?php foreach ($imagenes as $img) { ?>
                                <div class="carousel-item">
                                    <img src="<?php echo $img; ?>" class="d-block w-100">
                                </div>
                            <?php } ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselImages" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselImages" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6 order-md-2">
                    <h2><?php echo $name ?></h2>
                    <h3><?php echo $brand ?></h3>
                    <?php if ($discount > 0) { ?>
                        <p><del><?php echo MONEDA . number_format($price, 2, '.', ','); ?></del></p>
                        <h2>
                            <?php echo MONEDA . number_format($price_discount, 2, '.', ','); ?>
                            <small class="text-success"><?php echo $discount ?>%</small>
                        </h2>
                    <?php } else { ?>
                        <h3><?php echo MONEDA . number_format($price, 2, '.', ','); ?></h3>
                    <?php } ?>
                    <p class="lead">
                        <?php echo $descrp ?>
                    </p>
                    <div class="d-grip gap-2 col-10 mx-auto">
                        <button class="btn btn-primary" type="button">Comprar</button>
                        <button class="btn btn-outline-primary" type="button" onclick="addProduct(<?php echo $id; ?>,'<?php echo $token_tmp; ?>')">Agregar al carrito</button>
                    </div>
                </div>

            </div>
        </div>
    </main>


    <?php include_once "./clases/footer.php" ?>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>