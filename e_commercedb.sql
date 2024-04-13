-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-04-2024 a las 14:51:18
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
  `name_catg` varchar(20) NOT NULL,
  `desc_catg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `catg`
--

INSERT INTO `catg` (`id`, `name_catg`, `desc_catg`) VALUES
(1, 'COMPUTADORAS', ''),
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
  `direccion` varchar(80) NOT NULL,
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
  `activo` int(11) NOT NULL DEFAULT 1
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
(16, 'UPS 500VA/250W', 'CDP', '2022', '120V CDP AVR/8 UPR-508', 39.99, 0, 8, 1),
(17, 'Divisor USB C OTG, carga PD de 18 W', 'MOGOOD', '2020', '[USB C OTG]: el adaptador USB C OTG con alimentación contiene un USB-C de 60 W PD de carga rápida, 1USB-A 2.0 puertos, proporcionando una alta transferencia de datos.\r\n[Divisor USB C]: El divisor USB C es ligero y fácil de transportar cuando viaja. Compatible con Surface Book 2, Google Chromecast con Google TV, impresora 3D Octa4a, Pi-KVM, Pixel book, Dell XPS 15, Nintendo Switch, con Raspberry Pi 4B para PiKVM, Samsung Galaxy S20/S120+/Note10 Series y más dispositivos USB-C. Los teléfonos móviles con conector de auriculares 3.5 no soportan el cable. No es compatible con Motorola Teléfono\r\nCarga rápida de 18 W: este cable OTG USB C carga tu teléfono hasta 60 W mientras transfiere datos y conecta múltiples periféricos de alimentación pequeña. Está teniendo una velocidad confiable para todos los últimos teléfonos de carga USB-C tipo C.\r\n[OTG con carga]: Plug and play, no se requieren controladores/software adicionales para el adaptador USB C otg con alimentación. Los dos lados se pueden insertar en los dispositivos, simplemente enchufar y reproducir en cualquier momento que desees. Es posible que algunos dispositivos no usen la fecha mientras se carga, por favor hágamelo saber\r\nSatisfacción del cliente garantizada: proporcionamos un excelente servicio al cliente 24/7 para resolver todos tus problemas. Si tienes algún problema, ponte en contacto con nosotros por correo electrónico sin dudarlo. Te proporcionaremos un nuevo reemplazo si no estás satisfecho con él.', 8.99, 0, 5, 1),
(18, 'Cable Ethernet Cat 8, 3 pies', 'Vabogu', '2022', '🔌【Ultra velocidad de Internet】 El cable ethernet Cat 8 soporta un ancho de banda de hasta 2000MHz y aumenta la velocidad de transmisión de datos hasta 40Gbps,Cables 26AWG adecuados para interior/exterior a hipervelocidad sin preocuparse por el desorden de los cables, Cat8 puede reducir cualquier interferencia de señal al máximo. Te permite transmitir videos en alta definición, música, navegar por la red y jugar a juegos a hipervelocidad.\r\n🔌【RJ45 Conectores y Amplia Compatibilidad】 Con dos conectores RJ45 blindados en ambos extremos, el cable Ethernet Cat8 funciona perfectamente Compatible con todos los anteriores(cat5, cat5e, cat6, cat6a y cat7), Y con IP Cam, routers, Nintendo switch, ADSL, Adaptadores, Módem, PS3, PS4, X-box, Patch panel, Servidores, Impresoras de red, Netgear, NAS, teléfonos VoIP, portátil, Acoplador, Hubs, Keystone jack, Smart TV, Imac y otro dispositivo con conectores RJ45.\r\n🔌【Durable y resistente a la intemperie y resistente a los rayos UV】 El cable LAN Cat8 utiliza 100% de cobre libre de oxígeno en el interior, 4 pares 100% 26WAG puro y grueso par trenzado blindado (STP) de hilos de cobre, escudo de papel de aluminio, escudo de malla tejida, blindado con chaqueta de PVC resistente a los rayos UV de alta calidad, el cable de Ethernet Cat8 clasificado al aire libre es anti-envejecimiento, puede soportar la luz solar directa y el frío extremo y el clima húmedo y caliente todavía trabajando eficientemente. Se puede enterrar directamente. Apto para uso en interiores y exteriores.\r\n🔌【26AWG y rendimiento superior】 En comparación con otros cables Ethernet de 32AWG, el Cat8 de 26AWG es más grueso, mucho más rápido y estable en la transferencia de datos, que es perfectamente adecuado para los productos inteligentes de AI, como Amazon Alexa, Apple Siri, Google Home, Es adecuado para las redes LAN de empresas pequeñas o medianas, especialmente para las interconexiones de los centros de datos a los servidores. Con un cable de red de alta velocidad resistente, no experimentarás un retraso o una parada en la transferencia de datos.\r\n🔌【Atención al cliente 24-7】 Puedes ponerte en contacto con nosotros: estamos aquí para ti y te responderemos lo antes posible. Creemos en la satisfacción de nuestros clientes y siempre nos esforzamos por ayudarlos.', 6.99, 0, 5, 1),
(19, 'Cable USB C a USB C ', 'Anker', '2020', 'The Anker Advantage: Únete a los más de 80 millones impulsados por nuestra tecnología líder.\r\nCompatible con alta velocidad: carga un Samsung S23 al 55% en solo 30 minutos cuando se empareja con un cargador de suministro de energía compatible (cargador no incluido).\r\nConstruido para durar: probado en estrictas pruebas de laboratorio para soportar hasta 10,000 curvas.\r\nCarga confiable: Compatible con USB-IF para una carga segura y confiable para prácticamente cualquier dispositivo USB-C.\r\nLo que obtienes: cable Anker 310 USB-C a USB-C (paquete de 2, trenzado de 3 pies), nuestra garantía de 24 meses sin preocupaciones y un amable servicio al cliente.', 9.99, 30, 5, 1),
(20, 'Nano Pro 20W PIQ 3.0', 'Anker', '2022', 'Diseñado para iPhone: Proporciona carga de 20W a toda velocidad para el iPhone 13.\r\nCarga de alta velocidad: La carga USB-C de 20W te da la potencia que necesitas para cargar tu iPhone al 50% en solo 25 minutos, eso es hasta 3 veces más rápido que tu antiguo cargador de 5W.\r\nCaracterísticas de seguridad avanzadas: Equipado con nuestro nuevo sistema de seguridad ActiveShield️ para ofrecer una mayor protección. Cuenta con un sensor de temperatura dinámico que controla activamente la temperatura, y un chip sintonizador de potencia que ajusta la salida de potencia para proteger tu dispositivo conectado.\r\nNuestra velocidad, tu estilo: Elige entre 4 colores únicos para encontrar el que se adapte a tu estilo.\r\nLo que obtienes: Cargador Anker 511 (Anker Nano Pro), guía de bienvenida (idioma español no garantizado).', 13.99, 0, 5, 1),
(21, 'PIXMA TR4720', 'Canon', '2022', 'Impresión, copia, escáner, fax: la PIXMA TR4720 es una verdadera impresora 4 en 1 que es compacta, versátil y fácil de usar.\r\nFácil instalación: disfruta de una configuración sencilla con la aplicación Canon Print Inkjet/Selphy [1].\r\nFácil de instalar: diseñada para una fácil instalación y reemplazo del cartucho de tinta.\r\nBandeja de papel frontal: una bandeja de papel frontal rápida y fácil de cargar con capacidad de papel de 100 hojas.\r\nDocumentos y fotos de calidad: produce documentos de calidad, fotos e impresiones sin bordes[11], hasta 8.5” x 11”.\r\nPara leer las referencias de los números en la descripción del producto, ver \"hoja de especificaciones\" en la sección de especificaciones técnicas más abajo.', 99.99, 22, 7, 1),
(22, 'HL-L2460DW', 'Brother', '2022', 'Lo mejor para oficinas en casa y equipos pequeños: diseñada para una calidad de impresión consistente y premium, la impresora láser monocromática Brother HL-L2460DW produce documentos que son claros, nítidos y fáciles de revisar y compartir, todo a un precio asequible\r\nCompacto, conectado, excepcionalmente eficiente: conéctese con una conexión inalámbrica de doble banda integrada (2.4 GHz/5 GHz), Ethernet o a una sola computadora a través de una interfaz USB. Imprime a velocidades de hasta 36 ppm (2), además de la impresión dúplex automática ahorra tiempo y reduce el desperdicio de papel\r\nBROTHER Aplicación de conexión móvil: administra tu impresora inalámbrica de forma remota e imprime desde tu dispositivo móvil en cualquier momento, desde casi cualquier lugar. Pide suministros originales de Brother y realiza un seguimiento del uso del tóner y completa más trabajo sobre la marcha (3)\r\nManejo versátil de papel: aborda la impresión en blanco y negro de alto volumen con la bandeja de papel de capacidad de 250 hojas. (4) La ranura de alimentación manual permite imprimir en sobres y papel especial\r\nBROTHER Está a tu lado: respaldado por Brother con una garantía limitada de 1 año y soporte gratuito en línea, llamadas o chat en vivo durante toda la vida útil de tu impresora\r\nElige el tóner original Brother – Cuando llegue el momento de reemplazar tu tóner, asegúrate de elegir el tóner de repuesto original TN830 o TN830XL de Brother Y con Refresh EZ Print Subscription Service, nunca más te preocupes por quedarte sin tóner y disfrutarás de ahorros de hasta un 50%(5) en el tóner original de Brother Comience con Refresh hoy mismo con una prueba gratuita', 159.99, 0, 7, 1),
(23, 'MR30G ROUTER AC1200 GIGABIT', 'MERCUSYS', '2022', '<ul>\r\n<li>WiFi Gigabit AC1200 - Disfruta del entretenimiento en casa sin ningún retardo, alcanzando velocidades de hasta 1.2 Gbps (867 Mbps en la banda de 5 GHz y 300 Mbps en la banda de 2.4 GHz)</li>\r\n<li>Mayor Cobertura - 4 antenas externas de alto rendimiento con Beamforming mejoran las conexiones estables en toda tu casa para obtener señales WiFi fuertes en cada rincón</li>\r\n<li>Puertos Gigabit Completos - Aprovecha al máximo tu acceso a Internet y transfiere datos a velocidades sorprendentes para un rendimiento óptimo</li>\r\n<li>Mayor Eficiencia de Red - La tecnología MU-MIMO permite que MR30G se comunique con varios dispositivos al mismo tiempo, aumentando el rendimiento de WiFi para cada dispositivo</li>\r\n<li>Gestiona Fácilmente tu Red Doméstica - Varias funciones de software como Controles Parentales, QoS y Red de Invitados para mayor seguridad y eficacia</li>\r\n<li>Compatible con IPTV - Compatible con IGMP Proxy/Snooping, Bridge y VLAN etiquetada para optimizar la transmisión de IPTV</li>\r\n<li>Compatible con IPv6 – Te permite disfrutar tanto de los servicios IPv6 proporcionados por tu proveedor de servicios de Internet como visitar sitios web IPv6</li>\r\n</ul>', 50.00, 0, 5, 1),
(24, 'Core i5-10400 Procesador de escritorio 6 núcleos hasta 4.3 GHz', 'Intel', '2022', '<ul>\r\n<li>6 núcleos / 12 hilos</li>\r\n<li>Enchufe tipo LGA 1200</li>\r\n<li>Hasta 4. 3 GHz</li>\r\n<li>Compatible con placas base basadas en chipset Intel serie 400</li>\r\n<li>Intel Compatibilidad con Optane Memory</li>\r\n<li>Refrigerador incluido</li>\r\n</ul>', 129.99, 0, 1, 1),
(25, 'PIXMA TS3520', 'Canon', '2023', 'Ajuste la configuración en la pantalla LCD de segmento de 1,5\" y los botones directos.\r\nDiseño compacto para adaptarse a tu espacio, disponible en blanco o negro.\r\nGran calidad de impresión de documentos y fotos de 2 cartuchos FINE HYBRID INK SYSTEM.\r\nFácil configuración para smartphone y computadora y una experiencia de impresión sin complicaciones.\r\nCarga papel liso o fotográfico con la bandeja de papel trasera dedicada.', 59.99, 0, 7, 1),
(26, 'Color LaserJet Pro M283fdw', 'HP', '2022', 'Gran rendimiento multifunción con color de alta calidad: Esta impresora inalámbrica todo en uno cuenta con versatilidad de impresión, copia, escaneado y fax, velocidades de impresión rápidas de hasta 22 ppm, impresión automática a doble cara y alimentador automático de documentos de 50 páginas.\r\nImprime de forma remota con la aplicación HP Smart: Configura tu impresora LaserJet, gestiona los trabajos de impresión, recibe notificaciones e imprime y escanea con facilidad gracias a HP Smart, la mejor aplicación de impresión móvil en su categoría.\r\nAhorra tiempo con accesos directos personalizables: Elimina los pasos en tareas repetitivas y organiza documentos un 50 % más rápido directamente desde su dispositivo móvil con las funciones exclusivas de oficina en la aplicación HP Smart.\r\nSeguridad sólida: Ayuda a proteger tu impresora de oficina HP y datos empresariales delicados con elementos esenciales de seguridad integrados que ayudan a detectar y detener los ataques.\r\nConectividad inalámbrica en la que puedes confiar: Confía en la conexión de tu impresora con un rendimiento constante de Wi-Fi de doble banda.\r\nValor de JetIntelligence: Confía en los cartuchos de tóner originales HP con JetIntelligence para permitir páginas de calidad profesional, máximo rendimiento de impresión cada vez y protección contra falsificaciones con la innovadora tecnología antifraude.\r\nCompatible con una amplia gama de tamaños de papel: Esta impresora láser de color es compatible con tamaño carta, legal, ejecutivo, oficio, 4x6 in, 5x8 in, A4, A5, A5-R, A6, B5, B6, 16K, postales, tarjetas postales dobles, sobres (No. 10, B5, C5, DL, Monarch).', 549.00, 22, 7, 1),
(27, 'DCP-L2640DW', 'Brother', '2023', 'Lo mejor para pequeñas empresas: diseñado para una productividad extraordinaria, el Brother DCP-L2640DW monocromático (negro y blanco) 3 en 1 combina impresora láser, escáner, copiadora en un tamaño compacto y ofrece impresiones en blanco y negro de alta calidad\r\nImpresora rápida con escaneo eficiente: produce documentos rápidamente con velocidades de impresión de hasta 36 ppm (2) y velocidades de escaneo de hasta 23.6/7.9 ipm (3) (color negro). Un alimentador automático de documentos de 50 páginas(4) permite escanear y copiar varias páginas convenientes y ahorrar tiempo\r\nOpciones de conexión flexibles: navegue fácilmente por las cambiantes demandas de su negocio con conectividad segura multidispositivo a través de la conexión inalámbrica de doble banda integrada (2.4 GHz/5 GHz) y Ethernet. O conéctese localmente a una sola computadora a través de la interfaz USB\r\nBROTHER Aplicación de conexión móvil: imprime, escanea y administra tu impresora inalámbrica en cualquier momento, desde casi cualquier lugar desde tu dispositivo móvil. Pide suministros originales de Brother y realiza un seguimiento del uso del tóner y completa más trabajo sobre la marcha (5)\r\nElige el tóner original Brother – Cuando llegue el momento de reemplazar tu tóner, asegúrate de elegir el tóner de repuesto original TN830 o TN830XL de Brother Y con Refresh EZ Print Subscription Service, nunca más te preocupes por quedarte sin tóner y disfrutarás de ahorros de hasta un 50%(6) en el tóner original de Brother Comience con Refresh hoy mismo con una prueba gratuita', 199.99, 0, 7, 1),
(28, 'MFC-J4335DW INKvestment Tank', 'Brother', '2022', 'La impresora todo en uno proporciona capacidades de impresión, copia, escaneo y fax en una máquina compacta. Dimensiones: 7.1 pulgadas de alto x 17.1 pulgadas de ancho x 14.2 pulgadas de profundidad. El escáner de cama plana a color (CIS) escanea documentos a una resolución óptica de hasta 2400 x 1200 ppp, 19200 x 19200 ppp interpolado, o resolución de 600 x 1200 ppp usando ADF. Los cartuchos de tinta INKvestment Tank contienen más tinta que los cartuchos tradicionales para suministrar tinta continuamente al tanque interno, por lo que obtienes más páginas sin necesidad de rellenar. 2 años fabricante limitado\r\nLa impresión por inyección de tinta con una resolución de hasta 4800 x 1200 ppp garantiza impresiones detalladas y de alta calidad. Cuenta con una capacidad de entrada de 150 hojas; equipado con alimentador automático de documentos de 20 hojas y bandeja de derivación. Cumple o supera el estándar ENERGY STAR. La aplicación Brother Mobile Connect ofrece una fácil navegación por menú en pantalla para imprimir, copiar, escanear y administrar dispositivos desde tu dispositivo móvil.\r\nCuenta con velocidades de impresión de hasta 19 ppm para color y hasta 20 ppm para imágenes en blanco y negro con un ciclo de trabajo mensual máximo de 30000 páginas; admite impresión dúplex automática. Memoria de fax: hasta 180 páginas. Experimente una impresión verdaderamente ininterrumpida, ahorros excepcionales y una gran comodidad con hasta un año de tinta utilizando solo los cuatro cartuchos incluidos en la caja. Brother Page Gauge ayuda a eliminar las conjeturas de cuándo reemplazar la tinta.\r\nLa conectividad Wi-Fi USB 2.0 y 802.11b/g/n de alta velocidad mejora la productividad. La pantalla a color de 1.8\" te permite navegar fácilmente a funciones potentes. El tanque interno funciona con cartuchos de tinta INKvestment Tank rediseñados para eliminar el llenado manual. Contenido del paquete: impresora, cartuchos de tinta de arranque (negro, cian, magenta, amarillo), guía de configuración rápida, guía de seguridad del producto, guía de referencia, cable de línea telefónica y tarjeta de garantía.', 179.99, 11, 7, 1),
(29, 'MFC-J1205WXL', 'Brother', '2023', 'Sin reemplazo de tinta hasta 2 años (1). Experimente una impresión verdaderamente ininterrumpida, ahorros excepcionales y una gran comodidad con hasta 2 años de tinta, utilizando solo los cuatro cartuchos incluidos en la caja. (1)\r\nPon el poder de la impresión al alcance de tu mano: la aplicación Brother Mobile Connect fácil de usar ofrece una fácil navegación por menú en pantalla para imprimir, copiar, escanear y administrar impresoras desde tu dispositivo móvil.\r\nSistema revolucionario de depósito de tinta The Brother: las impresoras Brother INKvestment Tank cuentan con cartuchos de tinta rediseñados que contienen más tinta y ofrecen un suministro de tinta continuo al tanque interno para una impresión verdaderamente cómoda e ininterrumpida.\r\nElimina las conjeturas de reemplazo de tinta: imprime con confianza utilizando el indicador Brother Page, (3) una forma visual y numérica de saber la cantidad de tinta utilizada y la cantidad de tinta restante para ayudar a eliminar las conjeturas sobre cuándo reemplazar la tinta.\r\nUSE BROTHER GENUINE INK: Diseñado para funcionar con impresoras de inyección de tinta INKvestment Tank, está disponible una gama completa de cartuchos INKvestment Tank que ofrecen impresiones de alta calidad y rendimientos de páginas confiables: LC404BK, LC404C, LC404M, LC404Y y LC404 3PK.', 199.99, 5, 7, 1),
(30, 'Optiplex 9020 - Intel i7-4770 - 32 GB Ram - 1TB SSD', 'Dell', '2018', 'Esta computadora de escritorio Dell 9020 SFF, cuenta con Intel Core i7-4770 de 4ª generación hasta 3.9 Ghz procesador de 32 GB de RAM, SSD de 1 TB\r\nCon un diseño de factor de forma pequeño, la computadora de escritorio Dell proporciona el rendimiento de la estación de trabajo que necesitas sin ocupar demasiado espacio en el escritorio\r\nLas imágenes son manejadas por un adaptador de DisplayPort a HDMI HD Graphics 4600 (2 puertos de pantalla, 1 x VGA) incluido\r\nCuenta con puertos USB 3.0 y USB 2.0 para transferencias de datos ultrarrápidas. USB 3.0 es hasta 10 veces más rápido que USB 2.0, pero totalmente compatible con USB 2.0\r\nMantente conectado al adaptador WiFi. Reproduce tus archivos de música favoritos con sonido estéreo. Conéctese fácilmente a monitores grandes y múltiples a través de las conexiones de video integradas instaladas.', 249.99, 9, 1, 1),
(31, 'XPS 8960 Desktop Intel Core i9-14900K, 32 GB DDR5 RAM, 1 TB SSD, NVIDIA GeForce RTX 4070 12 GB GDDR6X, Windows 11 Pro', 'Dell', '2024', 'Procesador	‎3.2 GHz core_i9\r\nRAM	‎32 GB DDR5\r\nVelocidad de memoria	‎5600 MHz\r\nDisco Duro	‎SSD\r\nCoprocesador de gráficos	‎NVIDIA® GeForce RTX™ 4070\r\nMarca Chipset	‎NVIDIA\r\nDescripción de la tarjeta	‎Dedicada\r\nTamaño de RAM de la tarjeta gráfica	‎12 GB\r\nTipo de conexión inalámbrica	‎Bluetooth\r\nNúmero de puertos USB 2.0	‎2\r\nNúmero de puertos USB 3.0	‎7\r\nMarca	‎Dell\r\nSeries	‎Dell Escritorio XPS 8960\r\nNúmero de modelo del producto	‎XPS8960-9967SLV-PUS\r\nPlataforma de hardware	‎PC\r\nSistema operativo	‎Windows 11 Pro\r\nDimensiones del producto	‎16,81 x 6,81 x 14,68 pulgadas\r\nDimensiones del artículo Largo x Ancho x Altura	‎16.81 x 6.81 x 14.68 pulgadas\r\nColor	‎Platino (Platinum Silver)\r\nMarca del procesador	‎Intel\r\nNúmero de procesadores	‎24\r\nTamaño de memoria flash	‎2 TB\r\nInterfaz de la unidad de disco duro	‎Solid State', 2449.00, 0, 1, 1),
(32, '221V8LB FHD(1920 x 1080) de 22 pulgadas 100Hz', 'Dell', '2023', 'CRISP CLARIDAD: Este monitor de línea Philips V de 22 pulgadas (21.5″ visible) ofrece imágenes nítidas Full HD de 1920 x 1080. Disfruta de películas, programas y videos con notables detalles\r\nTranquilidad: los monitores Philips vienen con garantía de reemplazo anticipada de 4 años en los Estados Unidos, minimizando el tiempo de inactividad\r\nTasa de actualización rápida de 100 HZ: 100Hz da vida a tus películas y videojuegos favoritos. Transmite, atracones y juega sin esfuerzo\r\nACCIÓN SUAVE CON ADAPTIVE-SYNC: La tecnología Adaptive-Sync garantiza secuencias de acción fluidas y un tiempo de respuesta rápido. Cada marco se renderiza suavemente con claridad cristalina y sin tartamudeo\r\nCONTRASTE INCREÍBLE: El panel VA produce blancos más brillantes y negros más profundos. Obtienes imágenes realistas y más degradados con 16,7 millones de colores\r\nLA VISTA PERFECTA: El ángulo de visión extra amplio de 178/178 grados evita el cambio de colores cuando se ve desde un ángulo de desplazamiento, por lo que siempre obtiene colores consistentes\r\nTRABAJE SIN CONSEJOS: Este elegante monitor es prácticamente libre de biseles en tres lados, por lo que la pantalla parece aún más grande para el espectador. Este diseño minimalista también permite configuraciones de varios monitores sin problemas que mejoran su flujo de trabajo y aumentan la productividad\r\nUNA MEJOR EXPERIENCIA DE LECTURA: Para trabajadores de oficina ocupados, el modo EasyRead proporciona una experiencia más similar al papel para ver documentos largos\r\nDISEÑADOS PARA SU BIENESTAR: Los monitores Philips utilizan el modo LowBlue para reducir la dañina luz azul de onda corta. La tecnología sin parpadeo alivia la fatiga ocular para una computación extendida más cómoda\r\nCONVENIENCIA DEL USUARIO: Las conexiones robustas incluyen HDMI 1.4, VGA y salida de audio. La compatibilidad con VESA te ofrece opciones de montaje flexibles', 74.99, 0, 6, 1),
(33, 'Ser5 Mini PC, AMD Ryzen 5 5560U', 'Beelink', '2022', '🔥【Procesador AMD más rápido y mejor】El mini PC Beelink SER5 está alimentado por AMD Ryzen 5 5560U (6C/12T, caché L3 de 16 MB). La frecuencia base es de 2.1 GHz/la frecuencia dinámica puede alcanzar los 4.0 GHz. Cuenta con revolucionaria tecnología de 7 nm y TDP MAX 57W para una experiencia multitarea de próxima generación que toma velocidades de procesamiento. Es ampliamente utilizado para juegos AAA, edición de imágenes (CAD, PS, Pr, Ai), software de oficina, diseño creativo, programación y reuniones HTPC/Zoom/Skype, etc.\r\n🔥【4K UHD y pantalla triple】La mini computadora está equipada con gráficos AMD Radeon 7 Core 1800MHz, admite reproducción de video 4K y navegación web, y se puede conectar a un proyector para cine en casa y una variedad de entretenimiento. Triple salida de pantalla de 4K a 60Hz a través de USB-C y DP y HDMI, que le permiten realizar múltiples tareas fácilmente, y lo suficiente para satisfacer sus diversas necesidades. El FPS es de hasta 60FPS, y puedes jugar LOL, DOTA, OW, PUBG, CS:GO y otros juegos en línea.\r\n🔥【La capacidad se puede ampliar libremente】Lo que distingue a esta pequeña PC de otras micro PC es que tiene bahías de expansión vacías que se pueden añadir. La mini PC Beelink tiene un doble canal 16GB SO-DIMM DDR4 actualizable a un máximo de 64 GB (2 x 32 GB), 500 GB M.2 NVMe 2280 SSD (soporta hasta 2 TB). Además, la mini PC soporta la expansión de HDD/SSD de 2.5 pulgadas de 0.276 in hasta 2 TB (no incluida). El montaje VESA también te libera de un escritorio desordenado. parte superior. Es una forma conveniente de ocultar una mini PC detrás de un monitor o televisor.\r\n🔥【Interfaces ricas e inalámbricas】La mini PC Beelink está diseñada con 1 HDMI, 1 DP, 1 LAN RJ45 1000M, 3 USB 3.2 Gen2, 1 USB 2.0, 1 conector de audio (HP y micrófono) y 1 conector de CC, satisface fácilmente las necesidades comerciales de oficina, audio doméstico y video. El Mini PC es compatible con Wake On LAN y Auto Power On, que se puede utilizar como servidor para medios (Plex o FTP). La mini computadora incorporada Wifi 6 802.11ax y BT5.2, WiFi 2.4G+5G red de banda dual garantizan transferencias de datos estables. BT5.2 conecta velocidad más rápida y mayor cobertura.', 320.00, 20, 1, 1),
(34, 'Odyssey G32A de 24\", Free-Sync Premium, FHD, 1ms, 165Hz', 'SAMSUNG', '2022', 'Frecuencia de actualización de hasta 165 Hz: conquista a todos los enemigos, incluso a altas velocidades; la frecuencia de actualización de 165 Hz elimina el retraso y el desenfoque de movimiento para un videojuego emocionante con una acción ultrasuave.\r\nTiempo de respuesta de 1 ms (MPRT): haz que cada movimiento cuente con un tiempo de respuesta de 1 ms; los píxeles de la pantalla cambian de color con una respuesta casi instantánea, lo que permite que la acción de ritmo rápido fluya con precisión del mundo real; tu rendimiento en pantalla es tan rápido como tus propios reflejos.\r\nAMD FreeSync Premium: un videojuego sin esfuerzo; AMD FreeSync Premium cuenta con tecnología de sincronización adaptativa que reduce cortes, incorrecciones de imágenes y latencia de entrada; la compensación de la baja velocidad de cuadros garantiza la fluidez de todas las escenas.\r\nDiseño ergonómico: alcanza la altura de ganar; gira, inclina y ajusta tu monitor hasta que todos los enemigos estén a la vista perfectamente; tu pantalla se puede mover libremente para que puedas encontrar la comodidad total de videojuego.\r\nDiseño sin bordes de 3 caras: tu legado no tiene límites; el diseño sin bordes de 3 lados revela el máximo espacio para un videojuego más grande y audaz; alinea dos pantallas con precisión en una configuración de monitor doble, para que ningún enemigo pase desapercibido.', 129.99, 0, 6, 1),
(35, 'Odyssey G5, WQHD de 27 pulgadas (2560 x 1440), 144Hz, curvado, 1ms', 'SAMSUNG', '2023', 'Inmersión inigualable: Pon tu cabeza en el juego con el panel 1000R de Odyssey, que coincide con la curvatura del ojo humano para una máxima inmersión y mínima tensión ocular\r\nImpresionante WQHD: Tu mundo de juegos, ahora increíblemente realista. Con una densidad de píxeles 1,7 veces superior a la de Full HD, la resolución WQHD ofrece imágenes increíblemente detalladas y nítidas. Experimenta una visión más completa con más espacio para la acción.\r\nFrecuencia de actualización expresa de 144 Hz: más del doble de tu posible producción de marcos, con el Odyssey G5. Con una frecuencia de actualización súper suave de 144 Hz, nunca querrás volver a una pantalla tradicional.\r\nRápido tiempo de respuesta de 1 ms: una fracción de segundo puede ser la diferencia entre tu destrucción, o la de tu enemigo. Con el tiempo de respuesta gris a gris de 1 ms de Odyssey, puedes estar seguro de que, tecnológicamente, estás recibiendo información lo más rápido posible.\r\nAMD FreeSync Premium: Un juego fluido y sin esfuerzo. AMD FreeSync Premium cuenta con tecnología de sincronización adaptativa, que reduce el desgarro de la pantalla, el tartamudeo y la latencia de entrada. La baja compensación de fotogramas garantiza que cada escena fluya sin problemas.', 320.00, 25, 6, 1),
(36, 'Aurora R15 AMD Ryzen 9 7900X, 32 GB RAM, 1 TB SSD + 2 TB HDD, RTX 4080', 'Alienware ', '2023', '<ul>\r\n<li>Nuestro nuevo intercambiador de calor de 9.449 in es el doble del tamaño de su predecesor, mejorando la resistencia térmica y ayudando a mantener los relojes de impulso bajo carga.</li>\r\n<li>Tecnología de refrigeración CRYO-TECH: obtenga un rendimiento térmico excepcional y características exclusivas de iluminación AlienFX con nuestra refrigeración líquida más avanzada.</li>\r\n<li>TÉRMICAS ROBUSTAS: El Aurora R15 cuenta con rejillas laterales hexagonales, para mejorar el flujo de aire y aumentar la eficiencia de la entrada de aire.</li>\r\n<li>PROCESADOR AMD RYZEN: Para el máximo FPS, la caché en chip es esencial. Los procesadores AMD Ryzen serie 7000 abarcan hasta 80 MB, lo que permite un juego ultra suave.</li>\r\n<li>REGLAMENTO DE VOLTAJE HIPEREFICIENTE: Nuestra regulación de voltaje de 10 fases mejora el overclocking, específicamente durante largos períodos de juego, para ayudarlo a rendir al máximo durante horas y horas.</li>\r\n</ul>', 2000.00, 0, 1, 1),
(37, 'Victus 15L , AMD Ryzen 5600G , 32 GB RAM, 1 TB NVMe + 1 TB HDD, AMD Radeon RX6400', 'HP', '2023', '<ul>\r\n<li>AMD RYZEN5 de 6 núcleos: procesador AMD Ryzen 5 5600G (6 núcleos, 12 hilos, velocidad de reloj base de 3.9 GHz de hasta 4.4 GHz de velocidad máxima de reloj) para juegos de élite y creación de contenido con tecnología de vanguardia de 7 nm y sin limitaciones</li>\r\n<li>AMD Radeon RX6400: AMD Radeon RX6400 (memoria dedicada GDDR6 de 4 GB); obtén toda la potencia que necesitas para un rendimiento rápido, suave y eficiente con la nueva arquitectura AMD Turing)</li>\r\n<li>Alta velocidad: con 32 GB de RAM, todo, desde navegar por múltiples páginas web hasta jugar juegos, obtiene un aumento de rendimiento</li>\r\n<li>【Gran espacio】Obtén un rendimiento hasta 10 veces más rápido que un disco duro tradicional con 1 TB de almacenamiento de unidad de estado sólido PCIe NVMe M.2 y disco duro de 1 TB para más espacio de almacenamiento</li>\r\n<li>Especificaciones técnicas: 2 USB 3.1 Gen 1 (frontal), 1 USB 3.1 Gen 1 tipo C (frontal), 2 USB 3.1 (Gen 2 tipo A), 4 USB 2.0 (trasero), 1 HDMI, 1 combo de auriculares/micrófono, 1 DisplayPort y red 10/100/1000 Base-T ; 5.1 Puertos de salida de sonido envolvente; Realtek Wi-Fi 5 (1x1) y Bluetooth 4.2 Combo, compatible con MU-MIMO; combo de teclado y mouse HP USB negro con cable incluido, cable HDMI Z&O también incluido</li>\r\n</ul>', 320.00, 0, 1, 1),
(38, 'Mini torre 600 G2 Intel i7-6700T, RAM 32 GB, SSD 512 GB', 'HP', '2020', '<ul>\r\n<li>Este producto reacondicionado certificado está probado y certificado para verse y funcionar como nuevo. El proceso de renovación incluye pruebas de funcionalidad, limpieza básica, inspección y reempaquetado. El producto se envía con todos los accesorios relevantes, una garantía mínima de 90 días y puede llegar en una caja genérica. Solo los vendedores seleccionados que mantienen una barra de alto rendimiento pueden ofrecer</li>\r\n<li>Intel Quad-core i7-6700T hasta 3.6G, memoria DDR4 32G (2 ranuras, soporta hasta 32 GB), SSD 512G</li>\r\n<li>Incluye teclado USB (teclado y mouse en inglés)</li>\r\n<li>Puertos de entrada y salida (E/S): Front:2 USB 3.0 ,microphone,Headphone ,USB Type-C port Rear:4USB 3.0 ,VGA DP port,RJ-45</li>\r\n<li>Sistema operativo: Win10Pro64bit</li>\r\n</ul>', 200.00, 0, 1, 1),
(39, 'ROG, Intel i7-12700F, RAM 32 GB, SSD 2 TB + HDD 2 TB, NVIDIA RTX 3060 12G', 'ASUS', '2022', '<ul>\r\n<li>Procesador Intel Core i7-12700F: ofrece una fantástica experiencia de entretenimiento y juego con los últimos procesadores Intel Core i7 con IA integrada y Wi-Fi 6</li>\r\n<li>RAM DDR4 de 32 GB: un montón de RAM de alto ancho de banda para ejecutar sin problemas tus juegos, así como múltiples programas. SSD PCIe de 2 TB + disco duro de 2 TB: guarda archivos rápidamente y almacena más datos. Con una gran cantidad de almacenamiento y potencia de comunicación avanzada, ideal para juegos importantes, múltiples servidores, copias de seguridad y más.</li>\r\n<li>Gráficos NVIDIA GeForce RTX 3060: potente tarjeta gráfica para juegos con NVIDIA GeForce RTX 3060, con trazado avanzado de rayos y tecnología DLSS para imágenes impresionantes y un rendimiento mejorado. Ideal para jugadores que buscan altas velocidades de fotogramas y experiencias de juego inmersivas.</li>\r\n<li>【Windows 11 Pro incluido】Puertos: 1 x Número de puertos Ethernet, 1x Número de salidas HDMI (Total), 8 x Número de puertos USB (Total), 2 x Número de salidas DisplayPort (Total), Bluetooth 5.0, Wi-Fi 6, Windows 11 Home, 32GB Snowbell Tarjeta USB</li>\r\n<li>Estándar de comunicación inalámbrica: 802 11 AX</li>\r\n<li>Tipo de ram del sistema: ddr4 sdram</li>\r\n<li>Peso del artículo: 28.03 libras</li>\r\n</ul>', 1600.99, 0, 1, 1),
(40, 'G335', 'Logitech', '2022', '<ul>\r\n<li>Diseño liviano: con un peso de solo 8.5 oz (240 g), el modelo G335 es más pequeño y ligero que el modelo G733, cuenta con una diadema de suspensión para ayudar a distribuir el peso que puedes ajustar a tu medida.</li>\r\n<li>Comodidad todo el día: los auriculares con almohadillas suaves de espuma viscoelástica y malla deportiva son cómodos para usar por periodos prolongados, para que puedas llevar tu juego al siguiente nivel con estilo y comodidad.</li>\r\n<li>Conectar y usar: inicia rápidamente tu juego y simplemente conéctate con el conector de audio de 3.5 mm (9/64 pulgada); estos coloridos auriculares son compatibles con PC, laptop, consolas de juegos y dispositivos móviles seleccionados.</li>\r\n<li>Controles de los auriculares: la rueda de volumen se encuentra directamente en la copa del oído para subir rápidamente el volumen de tu videojuego o de la música, mientras que el micrófono se puede subir fácilmente para silenciarlo y para moverlo fuera del camino.</li>\r\n<li>Sonido impresionante: con controladores de neodimio de 40 mm (1.57 pulgadas), los auriculares G335 para juegos de computadora ofrecen un sonido estéreo nítido y claro que hace que tu videojuego cobre vida.</li>\r\n<li>Compatible con PC y consola: estos auriculares para videojuegos con micrófono son compatibles con PlayStation 5, PlayStation 4, Xbox One, Xbox Series X | S y Nintendo Switch con conexión de audio de 3.5 mm (9/64 pulgada).</li>\r\n<li>Colores vibrantes: los auriculares G335 están disponibles en varios colores, cada uno con su propia diadema elástica reversible y lavable. Las almohadillas para las orejas son de espuma viscoelástica y del color de la diadema elástica.</li>\r\n<li>Certificado por Discord: los auriculares Logitech G con cable están certificados por Discord, lo que garantiza una comunicación cristalina, con increíble claridad del sonido y de la voz para todos tus emprendimientos de videojuegos.</li>\r\n</ul>', 50.00, 0, 2, 1),
(41, 'Arctis Nova 1P', 'SteelSeries', '2022', '<ul>\r\n<li>Almighty Audio: el sistema acústico Nova diseñado a medida cuenta con el mejor audio de su clase para juegos con controladores de alta fidelidad. Personaliza completamente tu experiencia de sonido ideal con un ecualizador paramétrico profesional para juegos.</li>\r\n<li>Audio espacial de 360 grados: el sonido envolvente envolvente envolvente te transporta al mundo de los juegos, lo que te permite escuchar cada paso crítico, recarga o señal vocal para darte una ventaja. * Totalmente compatible con Tempest 3D Audio para PS5 / Microsoft Spatial Sound</li>\r\n<li>Ajustable para un ajuste perfecto: el sistema ComfortMAX incluye auriculares giratorios de ajuste de altura con cojín de memoria AirWeave y una banda elástica. La forma ligera de los auriculares te mantiene cómodo sin importar cuánto tiempo juegues.</li>\r\n<li>Micrófono bidireccional con cancelación de ruido: el micrófono ClearCast Gen 2 silencia el ruido de fondo hasta 25 dB en cualquier plataforma para darte comunicaciones nítidas. Retrae completamente el micrófono en el auricular para un aspecto más elegante.</li>\r\n<li>Soporte multiplataforma: se conecta fácilmente a cualquier consola de juegos con un conector de 0.138 in, como PlayStation, PC, Xbox o Switch. También funciona muy bien con dispositivos móviles.</li>\r\n<li>Configuración sencilla: los controles integrados permiten un cómodo ajuste de volumen y silenciamiento en los auriculares.</li>\r\n</ul>', 59.99, 0, 2, 1),
(42, 'A10 Gaming Headset Gen 2 Wired', 'Logitech/Astro', '2022', '<ul>\r\n<li>Calidad de sonido mejorada: los auriculares ASTRO Gaming A10 Gen 2 para Xbox Series X|S, Xbox One, PlayStation 5, PlayStation 4, Nintendo Switch, PC, Mac cuentan con controladores dinámicos de 1.260 in ajustados a medida para que siempre puedas escuchar tu juego y compañeros de equipo con claridad y precisión. Nota: si el tamaño de las puntas de los auriculares no coincide con el tamaño de tus canales auditivos o los auriculares no se usan correctamente en tus oídos, puedes no obtener el correcto cualidades de sonido o rendimiento de llamadas. Cambie las puntas de los auriculares a las que se ajusten más cómodamente a su oído</li>\r\n<li>Micrófono abatible para silenciar: micrófono integrado que se puede girar hacia arriba para silenciar para mayor privacidad y hacia abajo para comunicaciones nítidas a través de un micrófono unidireccional de 0.236 in</li>\r\n<li>Control de volumen en línea: este auricular para juegos cuenta con un cable de auriculares extraíble con control de volumen en línea, lo que le permite ajustar el audio sin pausar el juego</li>\r\n<li>Construido para durar: una diadema ultra duradera y una construcción robusta que ofrece un rendimiento confiable que trasciende los auriculares estándar para juegos</li>\r\n<li>Cómodo auricular sobre la oreja: construcción circumaural ergonómica y robusta con un diseño de espalda cerrada; óptimo para sesiones largas</li>\r\n<li>Las almohadillas reemplazables para las orejas y la almohadilla para la diadema eliminan la necesidad de comprar un nuevo auricular, simplemente reemplaza los cojines y almohadillas desgastados según sea necesario.</li>\r\n<li>Compatibilidad: PS5, PS4, PC/Mac, Xbox Series X|S, Xbox One, Nintendo Switch, VR, Streaming</li>\r\n</ul>', 29.99, 0, 2, 1),
(43, 'ROG Cetra II Core Moonlight White', 'ASUS', '2022', '<ul>\r\n<li>Nota: Si el tamaño de las puntas del auricular no coincide con el tamaño de sus canales auditivos o si el auricular no se usa correctamente en sus oídos, es posible que no obtenga las cualidades de sonido correctas o el rendimiento de la llamada. Cambie las puntas de los auriculares a las que se ajusten más cómodamente a su oído</li>\r\n<li>Audio nucreíble, juegos instantáneos: los auriculares intrauditivos ROG Cetra II Core Moonlight White cuentan con controladores ASUS Essence hechos de goma de silicona líquida (LSR) para una calidad de audio impecable. Los auriculares permiten a los usuarios disfrutar de un sonido de grado de juego con una amplia variedad de plataformas.</li>\r\n<li>Diseño avanzado de controlador de audio: los controladores ASUS Essence están hechos de goma de silicona líquida y están diseñados para proporcionar un rendimiento de altavoz más estable y graves increíblemente fuertes.</li>\r\n<li>Mejor diseño para juegos de mano: el ROG Cetra II Core Moonlight White viene con un conector de 90° que mantiene el cable de los auriculares fuera del camino, mejorando la comodidad durante los juegos portátiles.</li>\r\n<li>Carcasa de aluminio ligera y duradera: hecha de aluminio elegante y ligero, el ROG Cetra II Core Moonlight White tiene un aspecto llamativo y elegante que se complementa con resistencia a los arañazos, elevando la estética y la durabilidad.</li>\r\n<li>Aspecto minimalista, máximo impacto: la nueva serie de productos Moonlight White ofrece una gama de dispositivos nuevos con una estética limpia. Ármate con las ediciones Moonlight White del teclado ROG Strix Scope NX TKL, el mouse con sensor óptico Strix Impact II, los auriculares Strix Go Core, los auriculares intrauditivos Cetra II Core y las computadoras portátiles para juegos Zephyrus G14 y G15.</li>\r\n</ul>', 59.99, 0, 2, 1),
(44, 'F1 con micrófono', 'KLIM', '2018', '<ul>\r\n<li>Excelente sonido + micrófono integrado. Disfruta de un sonido nítido y nítido con los auriculares F1. Ya sea que desee escuchar ritmos poderosos o comprender perfectamente un podcast, estos auriculares coinciden con todas sus necesidades. También son excelentes para llamadas telefónicas gracias a su micrófono integrado y prácticos controles multimedia. Nota: el micrófono y los controles son compatibles solo con teléfonos.</li>\r\n<li>Ahorra batería del teléfono. ¿Sabías que los auriculares con cable pueden ahorrarte mucha batería en tu teléfono? Los dispositivos Bluetooth consumen baterías mucho más rápido que las cableadas. Toma la decisión inteligente y disfruta de tu música durante un día completo en lugar de solo unas horas. Como no tienen batería, los auriculares con cable F1 siempre están listos para la acción</li>\r\n<li>Máxima durabilidad + puntas magnéticas: los cables reforzados están probados para aumentar significativamente la durabilidad de los auriculares. Nos hemos centrado en fortalecer los delicados puntos de contacto cerca de los cabezales de los auriculares y hemos optado por una innovadora forma de jack de 45º. Puedes estar seguro de que estos auriculares intrauditivos no te darán ninguna molestia durante años. Los cabezales de los auriculares están magnetizados para un fácil almacenamiento y transporte.</li>\r\n<li>Cómodas y repuestas: vas a usar estos auriculares durante muchas horas seguidas, por lo que deben estar cómodos. Los auriculares F1 vienen equipados con innovadoras puntas de espuma viscoelástica que bloquean el ruido exterior y te dan un ajuste agradable y cómodo en tu oído. Si aún prefieres las puntas de goma tradicionales, hemos incluido 2 pares (grandes y pequeños) para que puedas intercambiarlos.</li>\r\n<li>5 años de garantía + servicio al cliente excepcional. Estamos tan seguros de la fiabilidad de este producto que ofrecemos una garantía de 5 años, por lo que es una compra completamente libre de riesgos. Esto es extremadamente raro en un producto a este precio: ¡puede estar seguro de que está haciendo la mejor compra! Nuestros especialistas están disponibles para usted 24/7: contáctenos antes o después de su compra y estaremos encantados de ayudarle!</li>\r\n</ul>', 7.99, 0, 2, 1),
(45, 'ROG Cetra', 'ASUS', '2022', '<ul>\r\n<li>Conectividad inalámbrica de modo dual: versatilidad inigualable con modos Bluetooth y 2.4 GHz</li>\r\n<li>Tecnología inalámbrica ROG SpeedNova: experimenta audio de latencia ultrabaja, conexión confiable y eficiencia energética optimizada</li>\r\n<li>Audio realista: audio de alta resolución de 24 bits a 96 kHz con detalles realistas mejorados por la tecnología Dirac OpteoTM</li>\r\n<li>Micrófonos IA de conducción ósea: captación precisa de voz para una comunicación nítida</li>\r\n<li>ANC adaptativo con modo automático: optimiza el ANC en función del ajuste intraauditivo y la forma del canal auditivo, se ajusta automáticamente a los niveles de ruido ambiental para una inmersión completa</li>\r\n<li>Multipunto híbrido: emparejarse con dos dispositivos a través de los modos 2.4 GHz y Bluetooth simultáneamente</li>\r\n<li>Larga duración de la batería: hasta 46 horas de duración de la batería** con carga inalámbrica y rápida en caso</li>\r\n<li>ASUS Iluminación RGB Aura: Muestra tu estilo con efectos personalizables</li>\r\n</ul>', 199.99, 0, 2, 1),
(46, 'V15, AMD R5 5500U, 16 GB de RAM, 1 TB SSD', 'Lenovo', '2022', '<ul>\r\n<li>RAM de alta velocidad y espacio enorme: 16 GB de RAM de alto ancho de banda para ejecutar sin problemas múltiples aplicaciones y pestañas del navegador a la vez; la unidad de estado sólido PCIe NVMe M.2 de 1 TB permite un arranque rápido y transferencia de datos</li>\r\n<li>Procesador: procesador AMD Ryzen 5 5500U (6 núcleos, 12 hilos, caché L3 de 8 MB, velocidad de reloj: 2.1 GHz, turbo de hasta 4.0 GHz)</li>\r\n<li>Pantalla: 15.6 pulgadas en diagonal, FHD (1920 x 1080)</li>\r\n<li>Especificaciones técnicas: 1 USB 3.0 tipo A, 1 USB 2.0 tipo A, 1 USB tipo C, 1 HDMI, 1 RJ45, 1 combo de auriculares/micrófono, teclado numérico, cámara web, Wi-Fi</li>\r\n<li>Sistema operativo: Windows 11 Pro Obtén todas las características del sistema operativo Windows 11 Home más gestión de dispositivos móviles, directiva de grupo, roaming de estado empresarial, acceso asignado, aprovisionamiento dinámico, actualización de Windows para empresas, modo quiosco y Active Directory/Azure AD</li>\r\n</ul>', 509.99, 0, 4, 1),
(47, 'Galaxy Book4 Pro de 16 pulgadas', 'SAMSUNG', '2024', '<ul>\r\n<li>POTENCIA PARA TUS DÍAS MÁS PRODUCTIVOS: Realiza cada tarea con un potente procesador Intel; procesador Intel Core Ultra 7 de 155 H; mejorado con gráficos AI Intel ARC</li>\r\n<li>Potente. Ligero. Increíblemente delgado: tome energía premium sobre la marcha con una computadora portátil ultraligera y increíblemente delgada; 16 pulgadas de grosor: 0.492 in, peso: 3.44 libras; grosor de 14 pulgadas: 0.457 in, peso: 2.71 libras</li>\r\n<li>Prepárate para la mejor experiencia de pantalla: aborda lo que necesitas hacer y luego relájate con lo que te gusta hacer en una amplia pantalla táctil Dynamic AMOLED 2X de 14\" o 16\" que es brillante, nítida y vívida</li>\r\n<li>UNA BATERÍA EMBALADA PARA SUS DÍAS APILADOS: Alcanza tus objetivos, y más, con una batería de larga duración que va la distancia; Adaptador de 16 \": 76 Wh (típico) de 65 Wh (típico); 14 \": 63Wh (típico) adaptador de 65 W</li>\r\n<li>NUESTRA SEGURIDAD MÁS AVANZADA DEL LIBRO GALAXY TODA: Ten tranquilidad mientras das vida a tus grandes ideas con nuestra seguridad Galaxy Book más avanzada disponible; PC de núcleo asegurado; asegurado por Knox</li>\r\n</ul>', 1749.99, 17, 4, 1),
(48, 'Nitro 17, AMD R7 7840HS, 17.3\" FHD 165Hz, NVIDIA RTX 4050', 'ACER', '2023', '<ul>\r\n<li>Acelera a toda velocidad con la laptop para juegos Acer Nitro 17 con los últimos procesadores AMD Ryzen serie 7000 y la tecnología DLSS 3 de NVIDIA, ya sea jugando casualmente o subiendo en línea. La pantalla FHD de 17.3 pulgadas perfecta con frecuencias de actualización de 165 Hz proporciona una experiencia de visualización inmersiva mientras que la refrigeración de próxima generación, un teclado RGB de 4 zonas y el software NitroSense te permiten tomar el control del campo de juego.</li>\r\n<li>Puertos para todos tus accesorios: 1 puerto USB tipo C - compatible con USB4 (hasta 40 Gbps), carga USB y entrega de energía (hasta 65 W), 1 puerto USB tipo C USB 3.2 Gen 2 (hasta 10 Gbps) DisplayPort a través de USB tipo C, y carga USB y entrega de energía (hasta 65 W), 2 - USB 3.2 Gen 2 Ps orts (uno con apagado Carga), 1 puerto USB 2.0, 1 puerto HDMI 2.1 con soporte HDCP, 1 puerto Ethernet (RJ-45), 1 conector para auriculares/micrófono</li>\r\n<li>AMD Ryzen 7000 Series: Ahora con el procesador AMD Ryzen 7 7840HS Octa-Core que ofrece un rendimiento de juego superior donde más lo necesitas. Con Precision Boost, obtén hasta 5.1GHz para tus juegos de alta demanda.</li>\r\n<li>AMD Ryzen AI: Presente su mejor yo con el chat de video mejorado con IA. Obtenga una computadora portátil que esté lista para la IA.</li>\r\n<li>Más allá de lo rápido: la GPU para portátil NVIDIA GeForce RTX 4050 es más que rápida para jugadores y creadores. Están impulsados por la arquitectura ultra eficiente NVIDIA Ada Lovelace que ofrece un salto cuántico tanto en rendimiento como en gráficos impulsados por IA. Con el interruptor MUX incluido, puede desactivar los gráficos integrados para aumentar el rendimiento del juego.</li>\r\n<li>Disfruta de la gloria visual: con una frecuencia de actualización de 165 Hz rápida, la pantalla Full HD de 17,3\" (1920 x 1080) hace que tus sesiones de juego sean fluidas, sin interrupciones e incomparables. Ahora puedes aterrizar esos disparos reflexivos con precisión milimétrica y un efecto fantasma mínimo.</li>\r\n<li>Especificaciones internas: Memoria DDR5 de 16 GB; SSD PCIe Gen 4 de 1 TB; Wi-Fi inalámbrico 6E admite Wi-Fi de doble flujo en las bandas de 2.4 GHz, 5 GHz y 6 GHz, incluida la tecnología MU-MIMO 2x2; Killer Ethernet E2600 10/100/1000; Bluetooth 5.1</li>\r\n</ul>', 999.99, 15, 4, 1);
INSERT INTO `products` (`id_products`, `product_name`, `product_brand`, `year`, `descrip`, `price`, `discount`, `category`, `activo`) VALUES
(49, 'Zenbook Pro 14 OLED 14.5\",Intel i9-13900H, RTX 4060, 16GB RAM, 1TB SSD', 'ASUS', '2023', '<ul>\r\n<li>ASUS DialPad: un controlador intuitivo que proporciona control instantáneo de la yema de los dedos en aplicaciones creativas, incluido el cambio de tamaño del pincel, la saturación y más personalizable. Visita el sitio web de ASUS para obtener más detalles. Red y comunicación: Wi-Fi 6E (802.11ax) (banda dual) 2 x 2 + tarjeta inalámbrica Bluetooth 5.3</li>\r\n<li>Pantalla: pantalla táctil OLED NanoEdge WQXGA+ (2880 x 1800) de 14.5 pulgadas, con una relación de aspecto expansiva de 16:10, la pantalla táctil está certificada por Dolby Vision y validada por PANTONE para garantizar una reproducción precisa del color con frecuencia de actualización de 120Hz</li>\r\n<li>Procesador Intel Core i9-13900H de 13ª generación de última generación a 2,6 GHz (caché de 24 MB, hasta 5,4 GHz, 14 núcleos, 20 hilos) y gráficos Intel UHD</li>\r\n<li>GPU NVIDIA Geforce RTX 4060 para portátil con 8 GB GDDR6 VRAM - Listo para estudio</li>\r\n<li>Almacenamiento rápido y memoria con SSD de rendimiento M.2 NVMe PCIe 4.0 de 1 TB con 16 GB de RAM DDR5, Windows 11 Home</li>\r\n</ul>', 1699.99, 0, 4, 1),
(50, 'Surface Laptop 4 13.5/\'\', Ryzen 5 8GB RAM, 128GB SSD', 'Microsoft', '2020', '<ul>\r\n<li>Microsoft Surface Laptop 4 cuenta con procesador AMD Ryzen 5, pantalla táctil PixelSense de 13.5/\'\' 2496x1664</li>\r\n<li>Unidad de estado sólido de 128 GB, 8 GB de RAM</li>\r\n<li>Diseño limpio y elegante, delgado y ligero, a partir de solo 2.76 libras, Surface Laptop 2 cabe fácilmente en su bolso, gráficos: Intel HD Graphics 620</li>\r\n<li>Bluetooth 4.0, Wi-Fi: LAN inalámbrica 802.11ac, lápiz de superficie no incluido</li>\r\n<li>USB 3.0, Mini DisplayPort, ranura para tarjeta SD, Windows 11 Home</li>\r\n</ul>', 499.99, 20, 4, 1),
(51, 'Victus 15.6\'\' 144 Hz, AMD R5 7535HS, RTX 2050, 32GB DDR5, 2TB NVMe SSD', 'HP', '2021', '<ul>\r\n<li>Mejora tu aventura de videojuegos: sumérgete en una velocidad inigualable con el procesador AMD Ryzen 5 7535HS, cuidadosamente diseñado tanto para entusiastas de los juegos como para creadores de contenido. Aproveche su notable fuerza para conquistar fácilmente cualquier juego o proyecto digital. Impulsados por 6 núcleos y 12 hilos, los procesadores AMD Ryzen 7535HS Series revolucionan el concepto fundamental de rendimiento de los juegos</li>\r\n<li>Pantalla antirreflejos FHD de 144 Hz inmersiva: di adiós a los molestos retrasos y al molesto desenfoque de la imagen. La pantalla de este portátil para juegos VICTUS combina perfectamente una frecuencia de actualización de 144Hz con una resolución Full HD de 1080p, lo que garantiza que tu experiencia de juego sea fluida y visualmente nítida</li>\r\n<li>Gráficos con tecnología GeForce: aumenta tu destreza artística con la tarjeta gráfica GeForce RTX 2050, llevando tu experiencia de juego a niveles sin precedentes. Aproveche la potencia de las aplicaciones mejoradas por IA, totalmente respaldadas por la plataforma Studio y impulsadas por la GPU GeForce RTX</li>\r\n<li>Conexión Wi-Fi 6 premium: disfruta de una mayor velocidad con Wi-Fi 6, compatible con los estándares 802.11ax, ofreciendo un rendimiento 3 veces más rápido que Wi-Fi 5. Diseñado para juegos ultrarrápidos, transmisión de alta calidad y comunicación fluida, Wi-Fi 6 te permite operar con las mejores configuraciones de juego posibles</li>\r\n<li>Múltiples puertos disponibles: conecta tu laptop con otros dispositivos. 2 USB tipo A, 1 tipo C, 1 lector de tarjetas SD multiformato, 1 HDMI, 1 Rj45, 1 combo de auriculares/micrófono</li>\r\n</ul>', 799.99, 5, 4, 1);

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
  `token_password` varchar(40) DEFAULT NULL,
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
  MODIFY `id_products` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

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
