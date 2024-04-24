<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rhinotech</title>
    <link rel="stylesheet" href="./resources/css/estilos.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/9a29282719.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<?php
require 'config/config.php';
require 'config/conexionbd.php';
require 'clases/clienteFunciones.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id_products, product_name, product_brand, year, price, discount, category FROM products WHERE activo=1 ");
$sql->execute();

//print_r($sql);

$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
    <!-- Header -->
    <?php include_once './clases/header.php' ?>

    <div class="fondo1">
        <button class="btn1 btn_buy_esp"><a class="btn_a" href="#"> Comprar </a>
        </button>
    </div>
    <!-- Contenedor 2 -->
    <div class="contenedor2">
        <div class="contenedor_2">
            <div class="cuadro">
                <div class="cards-cont-2">
                    <div>
                        <img class="cuadro-imgs" src="./resources/imgs/laptos/lapto-_2_.webp" alt="" />
                    </div>
                    <button class="btn1"><a class="btn_a" href="./products.php?ctg=4"> Comprar </a></button>
                </div>
                <div class="cards-cont-2">
                    <div>
                        <img class="cuadro-imgs" src="./resources/imgs/products/36/primary.webp" alt="" />
                    </div>

                    <button class="btn1"><a class="btn_a" href="./products.php?ctg=1"> Comprar </a></button>
                </div>
                
            </div>
            <div class="cuadro-2">
                <div class="cards-cont-2">
                    <div>
                        <img class="cuadro-imgs" src="./resources/imgs/monitores/monitor-4.webp" alt="" />
                    </div>

                    <button class="btn1"><a class="btn_a" href="./products.php?ctg=6"> Comprar </a></button>
                </div>
                <div class="cards-cont-2">
                    <div>
                        <img class="cuadro-imgs" src="./resources/imgs/products/20/primary.webp" alt="" />
                    </div>

                    <button class="btn1"><a class="btn_a" href="./products.php?ctg=5"> Comprar </a></button>
                </div>
                <div class="cards-cont-2">
                    <div>
                        <img class="cuadro-imgs" src="./resources/imgs/impresoras/impresora.webp" alt="" />
                    </div>
                    <button class="btn1"><a class="btn_a" href="./products.php?ctg=7"> Comprar </a></button>
                </div>
                
            </div>
        </div>
    </div>

    <div class="tituloofertas">
        <h1>OFERTAS ESPECIALES</h1>
    </div>
    <div class="contenedor_video">        
        <video src="./resources/imgs/video background/video.mp4" autoplay loop muted></video>
        <button class="btn1 btn_buy_esp"><a class="btn_a" href="#"> Comprar </a></button>
    </div>
    <!--==heading====================-->
    <div class="tituloofertas">
        <h1 class="product-slider-heading">Productos</h4>    
    </div>
    
    <section class="product-slider">
        <!--btns=========================-->
        <div class="slider-btns">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        <div class="slider-container">
            <!-- Swiper -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <!--1================================-->
                    <div class="swiper-slide">
                        <!--box----------------------->
                        <div class="product-box">
                            <!--==offer==-->
                            <span class="product-box-offer">-20%</span>
                            <!--img-container****************-->
                            <div class="product-img-container">
                                <!--img=============-->
                                <div class="product-img">
                                    <a href="http://demo47.askas8.se/sv/front-brake-assy-37-5-12-14">
                                        <img alt="" class="product-img-front" src="./resources/imgs/router/MR30G_UN_1.0_04_normal20210524064256-removebg-preview.png" />
                                        <img alt="" class="product-img-back" src="./resources/imgs/router/router_mercusy1200-removebg-preview.png" />
                                    </a>
                                </div>
                            </div>
                            <!--text***************************-->
                            <div class="product-box-text">
                                <!--category-->
                                <div class="product-category">
                                    <span>ROUTER AC1200 GIGABIT MERCUSYS </span>
                                </div>
                                <!--tile--->
                                <a href="http://demo47.askas8.se/sv/front-brake-assy-37-5-12-14" class="product-title">
                                    DUALBAND MR30G
                                </a>
                                <!--Price--->
                                <div class="price-buy">
                                    <span class="p-price">50$</span>
                                    <a href="http://demo47.askas8.se/sv/front-brake-assy-37-5-12-14" class="p-buy-btn">Comprar Ahora</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--2================================-->
                    <div class="swiper-slide">
                        <!--box----------------------->
                        <div class="product-box">
                            <!--==-->
                            <span class="product-box-offer">-40%</span>

                            <!--img-container****************-->
                            <div class="product-img-container">
                                <!--img=============-->
                                <div class="product-img">
                                    <a href="#">
                                        <img alt="" class="product-img-front" src="./resources/imgs/tablets olax/D_NQ_NP_896805-MLV73441438883_122023-O.webp" />
                                        <img alt="" class="product-img-back" src="./resources/imgs/tablets olax/47055-large_default.webp" />
                                    </a>
                                </div>
                            </div>

                            <!--text***************************-->
                            <div class="product-box-text">
                                <!--category-->
                                <div class="product-category">
                                    <span>TABLET 8 OLAX MAGIC </span>
                                </div>
                                <!--tile-->
                                <a href="#" class="product-title">
                                    2GB/32GB C/FORRO AZUL Q8
                                </a>
                                <!--Price-->
                                <div class="price-buy">
                                    <span class="p-price">80$</span>
                                    <a href="#" class="p-buy-btn">Comprar Ahora</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--3================================-->
                    <div class="swiper-slide">
                        <!--box----------------------->
                        <div class="product-box">
                            <!--==-->
                            <span class="product-box-offer">-60%</span>

                            <!--img-container****************-->
                            <div class="product-img-container">
                                <!--img=============-->
                                <div class="product-img">
                                    <a href="#">
                                        <img alt="" class="product-img-front" src="./resources/imgs/cables utp/BobinaCableUTPDahua305MtsCat6100_CobrePFM920I-6UN-C-1-removebg-preview-1-removebg-preview.webp" />
                                        <img alt="" class="product-img-back" src="./resources/imgs/cables utp/cable-utp-cat-6-100-mt_1_extraLargeThumb-removebg-preview.webp" />
                                    </a>
                                </div>
                            </div>

                            <!--text***************************-->
                            <div class="product-box-text">
                                <!--category-->
                                <div class="product-category">
                                    <span>CABLE UTP CAT6 DAHUA </span>
                                </div>
                                <!--tile-->
                                <a href="#" class="product-title">
                                    DH-PFM920-6U305MT 100% COBRE EXTERIOR
                                </a>
                                <!--Price-->
                                <div class="price-buy">
                                    <span class="p-price">350$</span>
                                    <a href="#" class="p-buy-btn">Comprar Ahora</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--6================================-->
                    <div class="swiper-slide">
                        <!--box----------------------->
                        <div class="product-box">
                            <!--==-->
                            <span class="product-box-offer">-70%</span>

                            <!--img-container****************-->
                            <div class="product-img-container">
                                <!--img=============-->
                                <div class="product-img">
                                    <a href="#">
                                        <img alt="" class="product-img-front" src="./resources/imgs/procesadores/procesador i5 10°.webp" />
                                        <img alt="" class="product-img-back" src="./resources/imgs/procesadores/i5 10°.webp" />
                                    </a>
                                </div>
                            </div>

                            <!--text***************************-->
                            <div class="product-box-text">
                                <!--category-->
                                <div class="product-category">
                                    <span>PROCESADOR INTEL CORE I5 10400</span>
                                </div>
                                <!--tile-->
                                <a href="#" class="product-title">
                                    (SOCKET 1200) 2.9 GHZ CON FAN CAJA SELLADA
                                </a>
                                <!--Price-->
                                <div class="price-buy">
                                    <span class="p-price">200$</span>
                                    <a href="#" class="p-buy-btn">Comprar Ahora</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--4================================-->
                    <div class="swiper-slide">
                        <!--box----------------------->
                        <div class="product-box">
                            <!--==-->
                            <span class="product-box-offer">-20%</span>

                            <!--img-container****************-->
                            <div class="product-img-container">
                                <!--img=============-->
                                <div class="product-img">
                                    <a href="#">
                                        <img alt="" class="product-img-front" src="./resources/imgs/teclados/Sin título.png" />
                                        <img alt="" class="product-img-back" src="./resources/imgs/teclados/Kit-Teclado-y-Mouse-Genius-KM-8100-Inalambrico-2.4GHz-USB-conecta-3-dispositivos-de-forma-inalambrica-DPI-1000-Negro-diagonal.webp" />
                                    </a>
                                </div>
                            </div>

                            <!--text***************************-->
                            <div class="product-box-text">
                                <!--category-->
                                <div class="product-category">
                                    <span>TECLADO + MOUSE INALAMBRICO </span>
                                </div>
                                <!--tile-->
                                <a href="#" class="product-title">
                                    GENIUS SMART KM-8100 BLACK
                                </a>
                                <!--Price-->
                                <div class="price-buy">
                                    <span class="p-price">30$</span>
                                    <a href="#" class="p-buy-btn">Comprar Ahora</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--5================================-->
                    <div class="swiper-slide">
                        <!--box----------------------->
                        <div class="product-box">
                            <!--==-->
                            <span class="product-box-offer">-60%</span>

                            <!--img-container****************-->
                            <div class="product-img-container">
                                <!--img=============-->
                                <div class="product-img">
                                    <a href="#">
                                        <img alt="" class="product-img-front" src="./resources/imgs/fuente de poder/fuente azza.webp" />
                                        <img alt="" class="product-img-back" src="./resources/imgs/fuente de poder/azza_5_large.webp" />
                                    </a>
                                </div>
                            </div>

                            <!--text***************************-->
                            <div class="product-box-text">
                                <!--category-->
                                <div class="product-category">
                                    <span>FUENTE DE PODER CERTIFICADA </span>
                                </div>
                                <!--tile-->
                                <a href="#" class="product-title"> 650 WATTS AZZA ARGB </a>
                                <!--Price-->
                                <div class="price-buy">
                                    <span class="p-price">90$</span>
                                    <a href="#" class="p-buy-btn">Comprar Ahora</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- footer -->
    <?php include_once "./clases/footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
     
    <!--==script=======================================-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="./js/scripts.js"></script>
</body>

</html>