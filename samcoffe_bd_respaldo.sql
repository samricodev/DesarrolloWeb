-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2022 a las 04:48:55
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `samcoffe_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `content` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `content`, `description`, `image`) VALUES
(1, 'late', '80', 350, 'cafe con leche', 'https://media.istockphoto.com/id/1142411258/es/foto/c%C3%B3mo-hacer-el-caf%C3%A9-latte-art.jpg?s=612x612&w=0&k=20&c=xoMzUbfHGBd--vZAZnI3D9wDILkY9oc-ZzfQ23mVQwg='),
(2, 'caramel macciato', '100', 350, 'cafe expresp con leche y caramelo', 'https://media.istockphoto.com/id/1302454454/es/foto/caf%C3%A9-espresso-con-granos-de-caf%C3%A9-en-el-fondo-de-la-ma%C3%B1ana.jpg?s=612x612&w=0&k=20&c=UWsxByvyjnFtAalLUgDHGZdnqVv0ha4MAdww0wII2Xg='),
(3, 'americano', '120', 355, 'cafe simple', 'https://media.istockphoto.com/id/1194149969/es/foto/taza-de-caf%C3%A9-con-espuma-aislada-sobre-fondo-blanco.jpg?s=612x612&w=0&k=20&c=cMLpxTEdpirOkHDSch8E3QP3gXqD0dTnGzms8RwK-9o='),
(4, 'expresso', '150', 100, 'shot de expresso', 'https://media.istockphoto.com/id/1137365972/es/foto/cerca-de-una-taza-humeante-de-caf%C3%A9-o-t%C3%A9-en-la-mesa-vintage-desayuno-temprano-en-la-ma%C3%B1ana-en.jpg?s=612x612&w=0&k=20&c=htgYUgkkAckChoIf_ukHReiF1KNz59W9O6GC6Xz9K_E='),
(8, 'cafe', '100', 200, 'cafe normal', 'https://media.istockphoto.com/id/1438064463/es/foto/caf%C3%A9-negro-sobre-taza-de-vidrio-transparente.jpg?s=612x612&w=0&k=20&c=AibtgsKG-rb-q6At-KXn7un3HTT1H4rZZX_XE2pfSsc=');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `login` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `password`, `login`) VALUES
(1, 'sam', 'sepiol', 'samsepiol@gmail.com', '1234', 1),
(2, 'user1', 'user1', 'user1@gmail.com', '123456', 0),
(3, 'lazaro`', 'estrada`', 'lazaestrada@gmail.com', '123456', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
