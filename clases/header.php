 <!-- header -->
 <header>
     <nav class="navigation">
         <input type="checkbox" name="" id="check">
         <div class="logo-container">
             <a href="./index.php"><img class="logo" src="./resources/imgs/logos/Rhino Tech -1.png" alt=""></a>
         </div>
         <div class="nav-btn">
             <div class="nav-links">
                 <ul class="nav-list-links">
                     <li class="nav-link" style="--i: .6s">
                         <a href="./index.php">Inicio</a>
                     </li>
                     <li class="nav-link" style="--i: .6s">
                         <a href="./products.php">Productos<i class="fas fa-caret-down"></i></a>
                         <div class="dropdown_vic">
                             <ul>
                                 <li class="dropdown-link">
                                     <a href="#">Laptops</a>
                                 </li>
                                 <li class="dropdown-link">
                                     <a href="#">Impresoras</a>
                                 </li>
                                 <li class="dropdown-link">
                                     <a href="#">Audifonos<i class="fas fa-caret-down"></i></a>
                                     <div class="dropdown_vic second">
                                         <ul>
                                             <li class="dropdown-link">
                                                 <a href="#">Teclados</a>
                                             </li>
                                             <li class="dropdown-link">
                                                 <a href="#">Cornetas</a>
                                             </li>
                                             <li class="dropdown-link">
                                                 <a href="#">Router</a>
                                             </li>
                                             <li class="dropdown-link">
                                                 <a href="#">Más<i class="fas fa-caret-down"></i></a>
                                                 <div class="dropdown_vic second">
                                                     <ul>
                                                         <li class="dropdown-link">
                                                             <a href="#">Cables UTP</a>
                                                         </li>
                                                         <li class="dropdown-link">
                                                             <a href="#">Modem</a>
                                                         </li>
                                                         <li class="dropdown-link">
                                                             <a href="#">Mouses</a>
                                                         </li>
                                                         <div class="arrow"></div>
                                                     </ul>


                                                 </div>
                                             </li>
                                             <div class="arrow"></div>
                                         </ul>
                                     </div>
                                 </li>

                             </ul>
                         </div>
                     </li>
                     <li class="nav-link" style="--i: .6s">
                         <a href="./nosotros.php">Nosotros</a>
                     </li>
                     <li class="nav-link" style="--i: .6s">
                         <a href="./contacto.php">Contactos</a>
                     </li>

                     </li>
                     <li class="nav-link dashboard" style="--i: .6s">
                         <a href="./dashboard.php"><i class='bx bxs-dashboard'></i></a>
                     </li>
                     <li class="nav-link carrito" style="--i: .6s">
                         <a href="cart_list.php" type="button" class=" position-relative">
                             <i class='fa-solid fa-cart-shopping'></i> <span id="num_cart" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?php echo $num_cart; ?></span>
                         </a>
                     </li>
                 </ul>
             </div>
             <div class="log-sign" style="--i: 1.8s">
                 <a href=""><i class='bx bx-user'></i></a>
                 <a href=""><img src="./resources/imgs/Banderas/icons8-emoji-de-las-islas-periféricas-de-ee-uu-48.png" alt="" /></a>
                 <a href=""><img src="./resources/imgs/Banderas/icons8-emoji-españa-48.png" alt="" /></a>
             </div>
         </div>
         <div class="hamburger-menu-container">
             <div class="hamburger-menu">
                 <div class="ham"></div>
             </div>
         </div>
     </nav>
 </header>