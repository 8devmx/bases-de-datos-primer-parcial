-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2024 a las 07:38:53
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gastos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `creacion` datetime DEFAULT current_timestamp(),
  `modificacion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario` int(11) UNSIGNED NOT NULL,
  `status` int(1) NOT NULL,
  `color` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `creacion`, `modificacion`, `usuario`, `status`, `color`) VALUES
(1, 'comida', '0000-00-00 00:00:00', '2024-11-14 23:40:02', 1, 1, '972626'),
(2, 'entretenimiento', '0000-00-00 00:00:00', '2024-11-14 23:13:03', 1, 1, '000000'),
(3, 'bebida', '0000-00-00 00:00:00', '2024-11-15 00:18:28', 1, 0, 'dc05eb'),
(4, 'servicio', '0000-00-00 00:00:00', '2024-11-14 23:13:07', 1, 1, 'FFFFFF'),
(15, 'vips', '2024-11-09 00:53:59', '2024-11-21 01:03:22', 10, 1, 'ffffff'),
(25, 'vip', '2024-11-21 00:43:37', '2024-11-21 00:44:28', 10, 1, '000000'),
(34, 'swqqvvacs', '2024-11-21 01:19:50', '2024-11-21 01:19:57', 10, 1, '000000'),
(35, 'aiuda', '2024-11-21 01:22:04', '2024-11-21 01:23:27', 10, 1, '000000'),
(36, 'olaaaaa', '2024-11-21 01:22:54', '2024-11-21 01:22:54', 10, 1, '000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id` int(11) UNSIGNED NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `creacion` datetime DEFAULT current_timestamp(),
  `modificacion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cantidad` float NOT NULL,
  `categoria` int(11) UNSIGNED NOT NULL,
  `tipo` int(11) UNSIGNED NOT NULL,
  `usuario` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`id`, `descripcion`, `creacion`, `modificacion`, `cantidad`, `categoria`, `tipo`, `usuario`) VALUES
(1, 'comida vips', '2024-09-13 00:00:00', '2024-11-08 00:30:00', 270.3, 1, 1, 1),
(2, 'Pago comida ', '2024-09-13 00:00:00', '2024-11-08 00:33:00', 270.3, 1, 1, 1),
(3, 'Comida pollo pirata', '2024-09-14 00:00:00', '2024-11-08 00:59:00', 392, 1, 1, 1),
(4, 'Pago pollo', '2024-09-14 00:00:00', '2024-11-08 01:21:00', 392, 1, 2, 1),
(5, 'Pago tacos', '2024-09-14 00:00:00', '0000-00-00 00:00:00', 455, 1, 2, 1),
(6, 'Boleto concierto', '2024-09-15 00:00:00', '0000-00-00 00:00:00', 250, 2, 1, 1),
(7, 'Cerveza', '2024-09-15 00:00:00', '0000-00-00 00:00:00', 172.5, 3, 1, 1),
(8, 'Videojuego', '2024-09-17 00:00:00', '2024-11-15 00:16:23', 1299, 2, 1, 1),
(9, 'Pago gasolina', '2024-09-17 00:00:00', '0000-00-00 00:00:00', 400, 4, 2, 1),
(10, 'Comida Mcdonalds', '2024-09-18 00:00:00', '0000-00-00 00:00:00', 127, 2, 2, 2),
(22, 'alcohol', '2024-11-21 00:47:58', '2024-11-21 00:47:58', 300, 3, 1, 1),
(23, 'burguirrrr', '2024-11-21 01:26:08', '2024-11-21 01:26:08', 300, 35, 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `creacion` datetime DEFAULT current_timestamp(),
  `modificacion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `creacion`, `modificacion`, `status`) VALUES
(1, 'Administrador', '2024-11-08 03:55:09', '2024-11-08 03:55:09', 1),
(2, 'Usuario', '2024-11-08 03:55:09', '2024-11-15 00:19:21', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `creacion` datetime DEFAULT current_timestamp(),
  `modificacion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(1) NOT NULL,
  `color` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `nombre`, `creacion`, `modificacion`, `status`, `color`) VALUES
(1, 'Gasto', '0000-00-00 00:00:00', '2024-11-14 23:03:57', 1, '02c50f'),
(2, 'Ingreso', '0000-00-00 00:00:00', '2024-11-15 00:18:59', 0, 'e70404');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `rol` int(11) UNSIGNED NOT NULL,
  `creacion` datetime DEFAULT current_timestamp(),
  `modificacion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `telefono`, `correo`, `password`, `rol`, `creacion`, `modificacion`, `status`) VALUES
(1, 'Josue Plata', '9985222496', 'josueplata325@gmail.com', '12345678', 1, '0000-00-00 00:00:00', '2024-11-20 18:23:23', 1),
(2, 'some some', '454545', 'prueba325@gmail.com', '12345678', 1, '0000-00-00 00:00:00', '2024-11-08 01:39:00', 0),
(3, 'Pepe', '123123', '123123@gmail.com', '123123', 1, '0000-00-00 00:00:00', '2024-11-08 01:39:00', 0),
(7, 'Chucho', '123123', '12312355@gmail.com', 'asasdas', 1, '0000-00-00 00:00:00', '2024-11-15 00:01:16', 1),
(10, 'jose', '34324324', '21312312@gmail.com', 'asdasdasd', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(13, 'juan', '123123', '567679870@gmail.com', '121515', 1, '2024-11-08 01:19:00', '2024-11-08 01:19:00', 1),
(14, 'pepepepe', '88888888', '696969696@gmail.com', '4145117', 1, '2024-11-09 00:50:47', '2024-11-09 00:50:56', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `descripcion` (`descripcion`),
  ADD KEY `categoria` (`categoria`,`tipo`,`usuario`),
  ADD KEY `tipo` (`tipo`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `fk_categorias_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD CONSTRAINT `gastos_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gastos_ibfk_2` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gastos_ibfk_3` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
