-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-03-2024 a las 00:48:41
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `e_commercedb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catg`
--

CREATE TABLE `catg` (
  `id` int(11) NOT NULL,
  `name_catg` varchar(11) NOT NULL,
  `desc_catg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `catg`
--

INSERT INTO `catg` (`id`, `name_catg`, `desc_catg`) VALUES
(1, 'TELEFONOS', ''),
(2, 'AUDIFONOS', ''),
(3, 'PERIFERICOS', ''),
(4, 'LAPTOPS', ''),
(5, 'CABLES', ''),
(6, 'MONITORES', ''),
(7, 'IMPRESORAS', ''),
(8, 'UPS', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `estatus` tinyint(4) NOT NULL,
  `regi_date` datetime NOT NULL,
  `mod_date` datetime DEFAULT NULL,
  `lev_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opt`
--

CREATE TABLE `opt` (
  `id` int(11) NOT NULL,
  `name_opt` varchar(255) NOT NULL,
  `SKU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_transaccion` varchar(20) NOT NULL,
  `date_order` datetime NOT NULL,
  `estatus` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `client_id` varchar(20) NOT NULL,
  `total_payment` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id_products` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_brand` varchar(200) NOT NULL,
  `year` year(4) NOT NULL,
  `descrip` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `discount` tinyint(3) NOT NULL DEFAULT 0,
  `category` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_products`, `product_name`, `product_brand`, `year`, `descrip`, `price`, `discount`, `category`, `activo`) VALUES
(1, 'MX MECHANICAL MINI FOR MAC', 'LOGITECH', '2023', 'A minimalist keyboard with a key layout for Mac with Tactile Quiet low-profile mechanical switches and Smart Backlighting.', 129.99, 5, 3, 1),
(2, 'MX MASTER 3S FOR MAC', 'LOGITECH', '2023', 'An iconic mouse remastered.', 99.99, 0, 3, 1),
(3, 'ZONE VIBE 125', 'LOGITECH', '2023', 'Lightweight, wireless headphones with USB receiver — professional enough for the office, perfect for working from home.', 129.99, 0, 2, 1),
(4, 'ROG Zephyrus G14 (2022) GA402', 'Asus', '2022', 'Windows 11 Home\r\nAMD Radeon™ RX 6800S\r\nAMD Ryzen™ 9 6900HS Processor\r\nQHD+ (2560 x 1600, WQXGA) 16:10 120Hz ROG Nebula Display\r\n1TB M.2 NVMe™ PCIe® 4.0 SSD storage', 1399.99, 30, 4, 1),
(5, 'Sata 3.0 (6 Gb/s) High Speed Data Cable', 'generic', '0000', 'Speed: Half-duplex 1.5, 3.0 and 6.0 Gbit/s\nLength: 15 inches / 40 cm (without connectors)\nConnectors: straight, straight\nCompatible with SATA I / II / III\nPackage: 1X SATA 3.0 Cable\nColor: Black', 2.50, 0, 5, 1),
(6, 'Cable Displayport Macho A Macho 1.5mts', 'Jasoz', '2023', 'Marca\r\nJasoz\r\nModelo\r\nT-A191\r\nTipo de cable y adaptador\r\nDisplayPort\r\nColor\r\nNegro\r\nFormato de venta\r\nUnidad\r\nLargo del cable\r\n1.5 m\r\n', 9.99, 0, 5, 1),
(7, 'Cable Hdmi ', 'HDMI', '2022', '10 Metros Full Hd 4k 3d Punta 24k Gold 1.4v Tv', 6.99, 0, 5, 1),
(8, 'TPN-Q222', 'HP', '2023', 'HP Portátil \r\n* pantalla táctil HD de 15.6\"\r\n* procesador Intel Core i3-1115G4\r\n* 32 GB de RAM\r\n* SSD PCIe de 1 TB\r\n* cámara web\r\n* tipo C\r\n* HDMI\r\n* lector de tarjetas SD\r\n* Wi-Fi\r\n* Windows 11 Home\r\n* color', 473.00, 8, 4, 1),
(9, 'Monitor IPS FHD 24BL450Y-B 24\"', 'LG', '2022', 'Panel IPS 16:9 de 24\"\r\nResolución Full HD 1920 x 1080\r\nRelación de contraste 1000:1\r\n16.7 millones de colores\r\nHDMI | DisplayPort | Entradas USB\r\n5 ms (GtG) Tiempo de respuesta\r\n250 liendres Brillo\r\nAltavoces integrados', 119.99, 0, 6, 1),
(10, 'EcoTank ET-2400 ', 'Epson', '2022', 'Innovadora impresión sin cartuchos: los tanques de tinta de alta capacidad no significan más cartuchos de tinta pequeños y caros; las exclusivas botellas de tinta EcoFit de Epson hacen que el llenado sea fácil y sin preocupaciones. Temperatura de funcionamiento: 50 a 95 °F (10 a 95.0 °F). Clasificación de fuente de alimentación: 100 a 240 V. Rango de voltaje de entrada: 90 a 264 V.', 199.99, 0, 7, 1),
(11, 'UPS MINI KP3', 'MARSRIVA', '2023', '10000MAH/18W', 49.99, 0, 8, 1),
(12, 'UPS MINI KP2', 'MARSRIVA', '2022', '10000MAH/18W', 39.99, 0, 8, 1),
(13, 'UPS MINI KP1-EC', 'MARSRIVA', '2023', '8000MAH/18W', 35.99, 0, 8, 1),
(14, 'UPS MINI KP2-EC', 'MARSRIVA', '2022', '8000MAH/18W', 35.99, 0, 8, 1),
(15, 'UPS 500VA', 'TONAL', '2022', '240W 120VAC TONAL EM-500', 59.99, 0, 8, 1),
(16, 'UPS 500VA/250W', 'CDP', '2022', '120V CDP AVR/8 UPR-508', 39.99, 0, 8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `email` text NOT NULL,
  `pass` varchar(255) NOT NULL,
  `activation` int(11) NOT NULL DEFAULT 0,
  `token` varchar(40) NOT NULL,
  `token_password` varchar(40) DEFAULT NULL,
  `password_request` int(11) NOT NULL DEFAULT 0,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catg`
--
ALTER TABLE `catg`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`);

--
-- Indices de la tabla `opt`
--
ALTER TABLE `opt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_opt` (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_orders` (`order_id`),
  ADD KEY `orders_products` (`product_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_products`),
  ADD KEY `products_catg` (`category`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catg`
--
ALTER TABLE `catg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `opt`
--
ALTER TABLE `opt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_products` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30624234;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `opt`
--
ALTER TABLE `opt`
  ADD CONSTRAINT `opt_idfk_1` FOREIGN KEY (`id`) REFERENCES `products` (`id_products`);

--
-- Filtros para la tabla `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `orders_idfk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `products_idfk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id_products`);

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_catgFK` FOREIGN KEY (`category`) REFERENCES `catg` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
