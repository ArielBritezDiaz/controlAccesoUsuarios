-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2023 a las 23:22:15
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
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_u` int(11) NOT NULL,
  `Nbr_u` varchar(30) NOT NULL,
  `Pass_u` varchar(120) NOT NULL,
  `email_u` varchar(30) NOT NULL,
  `token_u` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_u`, `Nbr_u`, `Pass_u`, `email_u`, `token_u`) VALUES
(1, '', '$2y$10$z9pxJRwCB86//iX.UzQ6v.eONJhPXpGSTiuXfdqFskcH2gkDWSZ9a', '', 1),
(2, 'mari', '12345', 'mariano.n.aguiar@gmail.com', 1),
(3, 'mari', '444444', 'mariano.n.aguiar@gmail.com', 1),
(4, 'Ariel', '909090', 'mariano.n.aguiar@gmail.com', 1),
(5, 'aaro', '6767', 'mariano.n.aguiar@gmail.com', 1),
(6, 'xd', 'xdxdx', 'aguiar.mariano@tecnica7.edu.ar', 1),
(7, 'alan', '1311313', 'aguiar.mariano@tecnica7.edu.ar', 1),
(8, 'alan', '3112321311', 'aguiar.mariano@tecnica7.edu.ar', 1),
(9, 'axel3', '12331313', 'aguiar.mariano@tecnica7.edu.ar', 1),
(10, 'lcui', '456', 'aguiar.mariano@tecnica7.edu.ar', 1),
(11, 'lcui', '5555', 'aguiar.mariano@tecnica7.edu.ar', 1),
(12, 'agu', '3332331', 'aguiar.mariano@tecnica7.edu.ar', 1),
(13, 'agu', '444144221', 'mariano.n.aguiar@gmail.com', 1),
(14, 'aguasdasdd', '634344554', 'mariano.n.aguiar@gmail.com', 1),
(15, 'dsaadsa', '$2y$10$OpLXSj/MrCjDRPwNFBVtV.ZTvw2t.7/B3QxdoFtqxXmse0Q5090pi', 'mariano.n.aguiar@gmail.com', 1),
(16, 'dsaadsa', '$2y$10$5eU4rMIBE6j6o2eJqvBBoufl9V7nbnkiyIOIkXxJ4l7DwszquFhji', 'mariano.n.aguiar@gmail.com', 1),
(17, 'mariano', '$2y$10$AYoYTnf5l1lWQ8Z.Dkvbe.BtixpV7Vr0gnUEfDTRXC1L4WadxCnYG', 'mariano.n.aguiar@gmail.com', 1),
(18, 'meri', '$2y$10$gaVAme/BeZQbPSng9pgETuvUSwnurUUL4l50Uga3.08vFjL2IEZZ6', 'mariano.n.aguiar@gmail.com', 1),
(19, 'javier', '$2y$10$F8dgOrG/5mMnQmd3yNe7cebad1pzBxSQ0C9zr9KzjeBBFYj2Q9JjO', 'mariano.n.aguiar@gmail.com', 1),
(20, '123', '$2y$10$70Yh2EKQsGJLx.WRQbSxW.J.R8GOkllENRvMw3wl7zbly.ro7Ty3.', 'mariano.n.aguiar@gmail.com', 1),
(21, 'uiui', '$2y$10$DJSD8h6iIbi1koXd8goqfeOCuOV6Wzy4FOhKYakz1RYBSYokuR6lG', 'mariano.n.aguiar@gmail.com', 1),
(22, 'uiui', '$2y$10$B6hxHYCbFTyb2a83W.VkruBR.hNh/w64FiqoVypJlvkcnQWDbL30e', 'mariano.n.aguiar@gmail.com', 1),
(23, 'dassdasddadadas', '$2y$10$lN83.ldwtz4vK8oKFtpUze4PdoexXpHMMkn79AJp6vjwASKBqzm4y', 'migatten897@gmail.com', 1),
(24, 'mariasdaddsad', '$2y$10$/Hmbs9tPU0h1.20o7ipZceWbkV7n.eyng9pxkUpq/ab3ITbP7oQeS', 'migatten879@gmail.com', 1),
(25, 'mariasdaddsad', '$2y$10$V8DYD6pNGug6Zj4x9ZaEqe.04JuKbdnA1kYdHyaS28YjBQTLuDv1q', 'aaron.avila@tecnica7.edu.ar', 1),
(26, 'helloworld', '$2y$10$omSq47ndjVXfSWxjeVnvP.EktenIhF5Ycws1HV4XmIuVr4b3mv5Sm', 'cmftresd@gmail.com', 1),
(27, 'mariano7', '$2y$10$HvkMJs8/qjovz2axkZb38.Ewm8Og.sGQwsYBJhYxIGM/V6yIYAMhC', 'rosita.melanito@gmail.com', 1),
(28, 'mariano7', '$2y$10$LOA1b4eMHorKSkpLTuJKjODTNQFiDhQtiiCW8d9DeWbM85OUytqMi', 'rosita.melanito36@gmail.com', 1),
(29, 'alanzelada12', '$2y$10$iYSjEsafX6RDwNlRhI1cjOKanF4s0lkXPq/EHZ5sJqEbBaShMi9qS', 'alanzelada9@gmail.com', 1),
(30, 'daasdadaddsad', '$2y$10$vzjB1k71WA9Rpx7OTbE3COesWSW.Kstkuw7nkPfxwxOtwkEMsyVQG', 'adasdasdd@dadasdasd.com', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id_articulo`);

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
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
