-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-04-2024 a las 23:38:37
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
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(80) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `estatus` tinyint(4) NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_modifica` datetime DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL
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

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `id_transaccion`, `date_order`, `estatus`, `email`, `client_id`, `total_payment`) VALUES
(3, '2XC822660D897384X', '2024-04-05 04:32:56', 'COMPLETED', 'sb-nhhlf30252923@personal.example.com', '9W7N7BQHZHPWJ', 139.00),
(4, '56980408NS655661L', '2024-04-06 05:47:35', 'COMPLETED', 'sb-nhhlf30252923@personal.example.com', '9W7N7BQHZHPWJ', 99.99),
(5, '4X6618386F628223H', '2024-04-06 18:21:23', 'COMPLETED', 'sb-nhhlf30252923@personal.example.com', '9W7N7BQHZHPWJ', 123.49),
(6, '3X0530952P905720F', '2024-04-06 18:26:29', 'COMPLETED', 'sb-nhhlf30252923@personal.example.com', '9W7N7BQHZHPWJ', 135.98),
(7, '3NE1938059118461W', '2024-04-06 18:28:34', 'COMPLETED', 'sb-nhhlf30252923@personal.example.com', '9W7N7BQHZHPWJ', 135.98),
(8, '10800982703261924', '2024-04-06 18:28:59', 'COMPLETED', 'sb-nhhlf30252923@personal.example.com', '9W7N7BQHZHPWJ', 135.98),
(9, '47R366121B849305D', '2024-04-06 18:49:48', 'COMPLETED', 'sb-nhhlf30252923@personal.example.com', '9W7N7BQHZHPWJ', 135.98),
(10, '0R050272NN298011M', '2024-04-06 18:51:34', 'COMPLETED', 'sb-nhhlf30252923@personal.example.com', '9W7N7BQHZHPWJ', 135.98),
(11, '0SA71864FJ1505002', '2024-04-06 18:59:52', 'COMPLETED', 'sb-nhhlf30252923@personal.example.com', '9W7N7BQHZHPWJ', 135.98),
(12, '6BT6317395116901Y', '2024-04-06 19:06:11', 'COMPLETED', 'sb-nhhlf30252923@personal.example.com', '9W7N7BQHZHPWJ', 253.48),
(13, '3XK52413VU7912623', '2024-04-06 19:08:34', 'COMPLETED', 'sb-nhhlf30252923@personal.example.com', '9W7N7BQHZHPWJ', 485.14),
(14, '4SD69570XR004203P', '2024-04-06 19:10:59', 'COMPLETED', 'sb-nhhlf30252923@personal.example.com', '9W7N7BQHZHPWJ', 102.49),
(15, '3WK49651BM874483L', '2024-04-06 19:25:01', 'COMPLETED', 'sb-nhhlf30252923@personal.example.com', '9W7N7BQHZHPWJ', 979.99),
(16, '2PD90247TA655134U', '2024-04-06 21:14:48', 'COMPLETED', 'sb-nhhlf30252923@personal.example.com', '9W7N7BQHZHPWJ', 225.98),
(17, '64585730FK891912K', '2024-04-06 21:22:02', 'COMPLETED', 'sb-nhhlf30252923@personal.example.com', '9W7N7BQHZHPWJ', 1109.98),
(18, '2TY33698ML8595006', '2024-04-09 22:54:45', 'COMPLETED', 'sb-nhhlf30252923@personal.example.com', '9W7N7BQHZHPWJ', 129.99);

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

--
-- Volcado de datos para la tabla `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `product_id`, `product_name`, `price`, `quantity`) VALUES
(1, 3, 1, 'MX MECHANICAL MINI FOR MAC', 123.49, 1),
(2, 3, 5, 'Sata 3.0 (6 Gb/s) High Speed Data Cable', 2.50, 6),
(3, 4, 2, 'MX MASTER 3S FOR MAC', 99.99, 1),
(4, 5, 1, 'MX MECHANICAL MINI FOR MAC', 123.49, 1),
(5, 6, 2, 'MX MASTER 3S FOR MAC', 99.99, 1),
(6, 6, 14, 'UPS MINI KP2-EC', 35.99, 1),
(7, 7, 2, 'MX MASTER 3S FOR MAC', 99.99, 1),
(8, 7, 14, 'UPS MINI KP2-EC', 35.99, 1),
(9, 8, 2, 'MX MASTER 3S FOR MAC', 99.99, 1),
(10, 8, 14, 'UPS MINI KP2-EC', 35.99, 1),
(11, 9, 2, 'MX MASTER 3S FOR MAC', 99.99, 1),
(12, 9, 14, 'UPS MINI KP2-EC', 35.99, 1),
(13, 10, 2, 'MX MASTER 3S FOR MAC', 99.99, 1),
(14, 10, 14, 'UPS MINI KP2-EC', 35.99, 1),
(15, 11, 2, 'MX MASTER 3S FOR MAC', 99.99, 1),
(16, 11, 14, 'UPS MINI KP2-EC', 35.99, 1),
(17, 12, 1, 'MX MECHANICAL MINI FOR MAC', 123.49, 1),
(18, 12, 3, 'ZONE VIBE 125', 129.99, 1),
(19, 13, 6, 'Cable Displayport Macho A Macho 1.5mts', 9.99, 1),
(20, 13, 8, 'TPN-Q222', 435.16, 1),
(21, 13, 12, 'UPS MINI KP2', 39.99, 1),
(22, 14, 2, 'MX MASTER 3S FOR MAC', 99.99, 1),
(23, 14, 5, 'Sata 3.0 (6 Gb/s) High Speed Data Cable', 2.50, 1),
(24, 15, 4, 'ROG Zephyrus G14 (2022) GA402', 979.99, 1),
(25, 16, 1, 'MX MECHANICAL MINI FOR MAC', 123.49, 1),
(26, 16, 2, 'MX MASTER 3S FOR MAC', 99.99, 1),
(27, 16, 5, 'Sata 3.0 (6 Gb/s) High Speed Data Cable', 2.50, 1),
(28, 17, 4, 'ROG Zephyrus G14 (2022) GA402', 979.99, 1),
(29, 17, 3, 'ZONE VIBE 125', 129.99, 1),
(30, 18, 3, 'ZONE VIBE 125', 129.99, 1);

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
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(120) NOT NULL,
  `activacion` int(11) NOT NULL DEFAULT 0,
  `token` varchar(40) NOT NULL,
  `toke_password` varchar(40) DEFAULT NULL,
  `password_request` int(11) NOT NULL DEFAULT 0,
  `id_cliente` int(11) NOT NULL
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
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_products`),
  ADD KEY `products_catg` (`category`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catg`
--
ALTER TABLE `catg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `opt`
--
ALTER TABLE `opt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_products` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
