<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rhinotech</title>
    <link rel="stylesheet" href="./resources/css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/9a29282719.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<?php
    require 'config/config.php';
    require 'config/conexionbd.php';
    $db = new Database();
    $con = $db->conectar();

    $sql = $con->prepare("SELECT id_products, product_name, product_brand, year, price, discount, category FROM products WHERE activo=1 ");
    $sql->execute();

    //print_r($sql);

    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    ?>
<body>
    <!-- header -->
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

    <div class="fondo1">
        <section class="titulo1">
            <!-- <p>Inalambricos</p> -->
        </section>
        <section class="imagenprincipal">
            <img src="./resources/imgs/audifonos/audifonos.webp" alt="" />
        </section>
        <section class="titulo2">
            <h2 class="titulo2">Auriculares</h2>
        </section>
        <section class="boton1">
            <a class="cards-cont-btn" href="./products.php?ctg=audifonos">
                <span class="shadow"></span>
                <span class="edge"></span>
                <span class="front text">Catalogo </span>
            </a>
        </section>
    </div>
    <div class="contenedor2">
        <div class="contenedor_2">
            <div class="cuadro">
                <div class="cards-cont-2">
                    <div>
                        <img class="cuadro-imgs" src="./resources/imgs/laptos/lapto-_2_.webp" alt="" />
                    </div>
                    <a class="cards-cont-btn" href="./products.php?ctg=laptops">
                        <span class="shadow"></span>
                        <span class="edge"></span>
                        <span class="front text">Laptops </span>
                    </a>
                </div>

                <div class="cards-cont-2">
                    <div>
                        <img class="cuadro-imgs" src="./resources/imgs/impresoras/impresora.webp" alt="" />
                    </div>

                    <a class="cards-cont-btn" href="./products.php?ctg=impresoras">
                        <span class="shadow"></span>
                        <span class="edge"></span>
                        <span class="front text">Impresoras </span>
                    </a>
                </div>
            </div>
            <div class="cuadro-2">
                <div class="cards-cont-2">
                    <div>
                        <img class="cuadro-imgs" src="./resources/imgs/monitores/monitor-4.webp" alt="" />
                    </div>

                    <a class="cards-cont-btn" href="./products.php?ctg=monitores">
                        <span class="shadow"></span>
                        <span class="edge"></span>
                        <span class="front text">Monitores </span>
                    </a>
                </div>
                <div class="cards-cont-2">
                    <div>
                        <img class="cuadro-imgs" src="./resources/imgs/relojes/reloj22.webp" alt="" />
                    </div>

                    <a class="cards-cont-btn" href="./products.php?ctg=smartwatchs">
                        <span class="shadow"></span>
                        <span class="edge"></span>
                        <span class="front text">SmartWatchs</span>
                    </a>
                </div>

                <div class="cards-cont-2">
                    <div>
                        <img class="cuadro-imgs" src="./resources/imgs/camaras/camara-1.webp" alt="" />
                    </div>

                    <a class="cards-cont-btn" href="./products.php?ctg=camaras">
                        <span class="shadow"></span>
                        <span class="edge"></span>
                        <span class="front text">Camaras </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="tituloofertas">
        <h1>OFERTAS ESPECIALES</h1>
    </div>

    <div class="container_offerts">
        <div class="card__container">
            <article class="card__article">
                <img src="./resources/imgs/mini ups/mini.png" alt="image" class="card__img" />

                <div class="card__data">
                    <span class="card__description">UPS MINI KP3</span>
                    <h2 class="card__title">MARSRIVA 10000MAH/18W</h2>
                    <a href="./details.php?id=11&token=80ef6d1fc8542ae2a626c50f1f50092d1243833b" class="card__button">Leer Más</a>
                </div>
            </article>

            <article class="card__article">
                <img src="./resources/imgs/mini ups/mini ups2.png" alt="image" class="card__img" />

                <div class="card__data">
                    <span class="card__description">UPS MINI KP2</span>
                    <h2 class="card__title">MARSRIVA 10000MAH/18W</h2>
                    <a href="./details.php?id=12&token=0bbb977503fc2c8ef4151aa3cec299eb827a926a" class="card__button">Leer Más</a>
                </div>
            </article>

            <article class="card__article">
                <img src="./resources/imgs/mini ups/mini ups negro2.png" alt="image" class="card__img" />

                <div class="card__data">
                    <span class="card__description">UPS MINI KP1-EC</span>
                    <h2 class="card__title">MARSRIVA 8000MAH/18W</h2>
                    <a href="./details.php?id=13&token=325e94ccff9f0004d64e8e6e10292bd89d96594f" class="card__button">Leer Más</a>
                </div>
            </article>
        </div>

        <div class="card__container">
            <article class="card__article">
                <img src="./resources/imgs/Ups/ups.webp" alt="image" class="card__img" />

                <div class="card__data">
                    <span class="card__description">UPS 500VA</span>
                    <h2 class="card__title">240W 120VAC TONAL EM-500</h2>
                    <a href="./details.php?id=15&token=14a338fd2caa7da24eecb67e3dc61b2a511f694c" class="card__button">Leer Más</a>
                </div>
            </article>

            <article class="card__article">
                <img src="./resources/imgs/mini ups/mini ups negro3.png" alt="image" class="card__img" />

                <div class="card__data">
                    <span class="card__description">UPS MINI KP2-EC</span>
                    <h2 class="card__title">MARSRIVA 8000MAH/18W</h2>
                    <a href="./details.php?id=14&token=2a4e129f95e6f0f36a9ef283cc63d29b18b0229c" class="card__button">Leer Más</a>
                </div>
            </article>

            <article class="card__article">
                <img src="./resources/imgs/Ups/D_NQ_NP_621107-MLV51078174229_082022-O-removebg-preview.webp" alt="image" class="card__img" />

                <div class="card__data">
                    <span class="card__description">UPS 500VA/250W </span>
                    <h2 class="card__title">/120V CDP AVR/8 UPR-508</h2>
                    <a href="./details.php?id=16&token=389c4af4ce76fcf76cfd741660978aba1b4c8a7a" class="card__button">Leer Más</a>
                </div>
            </article>
        </div>
    </div>
    <!--==heading====================-->
    <h4 class="product-slider-heading">Productos</h4>
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

    <script src="./js/scripts.js"></script>
    <!--==script=======================================-->
    <script>
        /*Initialize Swiper*/
    </script>

    <?php include_once "./clases/footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="./js/scripts.js"></script>
</body>

</html>