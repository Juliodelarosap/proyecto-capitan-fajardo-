-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2024 a las 16:57:45
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php_rafa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(10,2) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `user_phone` int(15) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `product_description`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(1, 3500.00, 'paid', 'not paid', 1, 2147483647, 'santo domingo', 'colinas del edén 3', '2024-02-05 03:31:28'),
(2, 3500.00, 'not paid', 'paid', 1, 829, 'santo domingo', 'colinas del edén 3', '2024-02-05 03:32:59'),
(3, 5500.00, 'not paid', 'not paid', 1, 809123456, 'miami', 'floral', '2024-02-05 03:34:20'),
(4, 2500.00, 'not paid', 'enviado', 1, 2147483647, 'new york', 'calle miami casa 11', '2024-02-04 22:36:26'),
(5, 9999.99, 'not paid', 'retenido', 1, 2147483647, 'new york', 'calle miami casa 13', '2024-02-04 23:01:50'),
(6, 3500.00, 'pagado', 'pagado', 1, 2147483647, 'santo domingo', 'colinas del edén 3', '2024-02-04 23:24:34'),
(7, 3500.00, 'not paid', 'on_hold', 1, 0, '', '', '2024-02-05 21:34:14'),
(8, 3500.00, 'not paid', 'on_hold', 1, 2147483647, 'santo domingo', 'calle pajonal casa no 11', '2024-02-05 21:35:18'),
(9, 7000.00, 'not paid', 'on_hold', 1, 829, 'santo domingo', 'calle pajonal casa no 11', '2024-02-05 21:38:18'),
(10, 9999.99, 'not paid', 'on_hold', 14, 2147483647, 'ciudad de mexico', 'los girasoles 3', '2024-02-05 21:40:49'),
(11, 9999.99, 'not paid', 'on_hold', 15, 829, 'santo domingo', 'calle pajonal casa no 11', '2024-02-05 21:46:16'),
(12, 3500.00, 'not paid', 'on_hold', 1, 829, 'santo domingo', 'colinas del eden3', '2024-02-05 22:01:47'),
(13, 5500.00, 'not paid', 'on_hold', 1, 2147483647, 'ciudad de mexico', 'los girasoles 3', '2024-02-05 22:03:41'),
(14, 9999.99, 'not paid', 'on_hold', 15, 2147483647, 'santo domingo', 'colinas del eden3', '2024-02-05 22:09:10'),
(15, 9999.99, 'not paid', 'on_hold', 15, 99999999, 'santo domingo', 'calle pajonal casa no 11', '2024-02-05 22:12:01'),
(16, 17500.00, 'not paid', 'on_hold', 15, 99999999, 'ciudad de mexico', 'colinas del eden3', '2024-02-05 22:15:16'),
(17, 5500.00, 'not paid', 'on_hold', 1, 829, 'santo domingo', 'colinas del eden3', '2024-02-05 23:09:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`) VALUES
(1, 5, '2', 'Mochila BG-2355', 'feat3.png', 2500.00, 3, 1, '2024-02-04 23:01:50'),
(2, 5, '3', 'bulto BG-2355', 'feat1.png', 5500.00, 1, 1, '2024-02-04 23:01:50'),
(3, 6, '1', 'Mochila BG-2345', 'feactured1.png', 3500.00, 1, 1, '2024-02-04 23:24:34'),
(4, 7, '1', 'Mochila BG-2345', 'feactured1.png', 3500.00, 1, 1, '2024-02-05 21:34:14'),
(5, 8, '1', 'Mochila BG-2345', 'feactured1.png', 3500.00, 1, 1, '2024-02-05 21:35:18'),
(6, 9, '1', 'Mochila BG-2345', 'feactured1.png', 3500.00, 2, 1, '2024-02-05 21:38:18'),
(7, 10, '3', 'bulto BG-2355', 'feat1.png', 5500.00, 2, 14, '2024-02-05 21:40:49'),
(8, 10, '2', 'Mochila BG-2355', 'feat3.png', 2500.00, 2, 14, '2024-02-05 21:40:49'),
(9, 11, '1', 'Mochila BG-2345', 'feactured1.png', 3500.00, 2, 15, '2024-02-05 21:46:16'),
(10, 11, '3', 'bulto BG-2355', 'feat1.png', 5500.00, 2, 15, '2024-02-05 21:46:16'),
(11, 12, '1', 'Mochila BG-2345', 'feactured1.png', 3500.00, 1, 1, '2024-02-05 22:01:47'),
(12, 13, '3', 'bulto BG-2355', 'feat1.png', 5500.00, 1, 1, '2024-02-05 22:03:41'),
(13, 14, '1', 'Mochila BG-2345', 'feactured1.png', 3500.00, 5, 15, '2024-02-05 22:09:10'),
(14, 15, '1', 'Mochila BG-2345', 'feactured1.png', 3500.00, 4, 15, '2024-02-05 22:12:01'),
(15, 16, '1', 'Mochila BG-2345', 'feactured1.png', 3500.00, 5, 15, '2024-02-05 22:15:16'),
(16, 17, '3', 'bulto BG-2355', 'feat1.png', 5500.00, 1, 1, '2024-02-05 23:09:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_special_offer` int(2) NOT NULL,
  `product_color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_special_offer`, `product_color`) VALUES
(1, 'Mochila BG-2345', 'mochilas', 'deportiva y comoda', 'feactured1.png', 'feactured2.png', 'feactured3.png', 'feactured4.png', 3500.00, 0, 'NEGRA'),
(2, 'Mochila BG-2355', 'mochilas', 'calidad y confort', 'feat3.png', 'feat2.png', 'feat3.png', 'feat4.png', 2500.00, 0, 'GRIS'),
(3, 'bulto BG-2355', 'bulto', 'calidad y alta gama', 'feat1.png', 'feat2.png', 'feat3.png', 'feat4.png', 5500.00, 0, 'GRIS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'Jorge luis martinez', 'mecatronicosrd@gmail.com', '$2y$10$FkMfzOUQM.FvwY3e1RljD.LZ77L3hry7tj3vDzO9Z5KyrRBL3/OgO'),
(14, 'luis manuel Martínez Suarez', 'luismanuel@gmail.com', '$2y$10$wchDyc5vyhUGAzY8Vl.kteIg21gCul2KZ1GiWBfnDC.qA.x7kQMcK'),
(15, 'prueba1', 'prueba@gmail.com', '$2y$10$j4sUVLKNKjTcTgcHhm3Xi.PSm3XuS0AH/E4W2NkxUln1E2l2BYRL2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indices de la tabla `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UX_Constraint` (`user_email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
