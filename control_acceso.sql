-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2023 a las 23:01:21
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `control_acceso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id_articulo` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `precio` decimal(12,2) NOT NULL,
  `stock` int(6) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `categoria` varchar(15) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `estado` varchar(8) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_articulo`, `nombre`, `descripcion`, `precio`, `stock`, `imagen`, `categoria`, `color`, `estado`, `id_usuario`) VALUES
(1, 'hot wheels', '5 autos de hot wheels en caja nueva', 1200.00, 1, '1699313553_artcicle.jpg', 'Auto', NULL, NULL, NULL),
(2, 'Hot wheels big collection', 'Amazing hot wheels collection with 60 cars ', 78000.00, 1, '1699313671_artcicle.jpg', 'Auto', NULL, NULL, NULL),
(4, 'Formula 1 malboro', '--------', 234567.00, 1, '1699314118_artcicle.jpg', 'Formula', NULL, NULL, NULL),
(5, 'Formula 1 black', 'Unique f1 car black', 5600.00, 3, '1699314153_artcicle.jpg', 'Formula', NULL, NULL, NULL),
(8, 'Ferrari racing car scale', ' there are only 4 items in the whole world', 3245.00, 0, '1699314350_artcicle.jpg', 'Formula', NULL, NULL, NULL),
(39, 'Ferrari collection', '', 450000.00, 116, '1701051828_artcicle.jpg', 'Auto', 'azul', 'nuevo', 66),
(40, 'Big black', 'Luxury black car', 200000.00, 1, '1701051872_artcicle.jpg', 'varias', 'negro', 'nuevo', 66),
(43, 'Hot wheels triple collection', '', 123000.00, 47, '1701105178_artcicle.jpg', 'Auto', 'azul', 'nuevo', 67),
(44, 'Autos coleccionables', 'Los mejores autos coleccionables', 125000.00, 10, '1701109773_artcicle.jpg', 'varias', 'varios', 'usado', 67);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `articulos` text NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `fecha`, `articulos`, `id_usuario`) VALUES
(2, '2023-11-27', ' 8/3245.00/3', 66),
(3, '2023-11-27', ' 4/234567.00/1', 66),
(4, '2023-11-27', ' 4/234567.00/1', 66),
(5, '2023-11-27', ' 39/450000.00/3', 67),
(6, '2023-11-27', ' 43/123000.00/3', 67),
(7, '2023-11-27', ' 44/125000.00/2', 69),
(9, '2023-11-27', ' 39/450000.00/1', 69),
(10, '2023-11-27', ' 43/123000.00/3', 69),
(11, '2023-11-27', ' 8/3245.00/1 39/4500', 69),
(12, '2023-11-27', ' 8/3245.00/2 39/4500', 69),
(13, '2023-11-27', ' 8/3245.00/2 39/4500', 69);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_u` int(11) NOT NULL,
  `Nbr_u` varchar(30) NOT NULL,
  `Pass_u` varchar(120) NOT NULL,
  `email_u` varchar(30) NOT NULL,
  `token_u` int(11) NOT NULL,
  `Foto_u` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_u`, `Nbr_u`, `Pass_u`, `email_u`, `token_u`, `Foto_u`) VALUES
(25, 'mariasdaddsad', '$2y$10$V8DYD6pNGug6Zj4x9ZaEqe.04JuKbdnA1kYdHyaS28YjBQTLuDv1q', 'aaron.avila@tecnica7.edu.ar', 1, ''),
(27, 'mariano7', '$2y$10$HvkMJs8/qjovz2axkZb38.Ewm8Og.sGQwsYBJhYxIGM/V6yIYAMhC', 'rosita.melanito@gmail.com', 1, ''),
(28, 'mariano7', '$2y$10$LOA1b4eMHorKSkpLTuJKjODTNQFiDhQtiiCW8d9DeWbM85OUytqMi', 'rosita.melanito36@gmail.com', 1, ''),
(29, 'alanzelada12', '$2y$10$iYSjEsafX6RDwNlRhI1cjOKanF4s0lkXPq/EHZ5sJqEbBaShMi9qS', 'alanzelada9@gmail.com', 1, ''),
(30, 'daasdadaddsad', '$2y$10$vzjB1k71WA9Rpx7OTbE3COesWSW.Kstkuw7nkPfxwxOtwkEMsyVQG', 'adasdasdd@dadasdasd.com', 1, ''),
(66, 'Marianoooo', '$2y$10$C54ETrSyjO4UwCGb1ayvj.GZAdJXpBg.r9YcOopER7e3u7uYR2BD.', 'aguiar.mariano@tecnica7.edu.ar', 1, ''),
(67, 'mariano78', '$2y$10$qMvHIn65mJjPawVA4pBTau2WtMSnJAxw2zvJVmRloO/D3BapymR6C', 'mariano.n.aguiar@gmail.com', 1, ''),
(69, 'dadasdsadasdsa', '$2y$10$Pou3FSoqceOXN8Udn8yqVOE1R6frWOuxevmr1TpYzqTDwTvS3XIH2', 'cmftresd@gmail.com', 1, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id_articulo`),
  ADD KEY `fk_usuario` (`id_usuario`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_u`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`ID_u`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
