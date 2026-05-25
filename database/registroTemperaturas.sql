-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 20-05-2026 a las 17:02:50
-- Versión del servidor: 8.0.45-0ubuntu0.24.04.1
-- Versión de PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registroTemperaturas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugares`
--

CREATE TABLE `lugares` (
  `idLugar` int NOT NULL,
  `lugar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `lugares`
--

INSERT INTO `lugares` (`idLugar`, `lugar`) VALUES
(1, 'Laboratorio'),
(2, 'Oficina Principal'),
(3, 'Almacén'),
(4, 'Sala de Servidores'),
(5, 'Recepción'),
(6, 'Aula 101'),
(7, 'Aula 102'),
(8, 'Biblioteca'),
(9, 'Cafetería'),
(10, 'Auditorio'),
(11, 'Taller Mecánico'),
(12, 'Invernadero'),
(13, 'Cuarto de Control'),
(14, 'Área de Producción'),
(15, 'Zona Exterior'),
(16, 'lugar'),
(17, 'Aula 04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temperaturas`
--

CREATE TABLE `temperaturas` (
  `idTemperaturas` int NOT NULL,
  `temperatura` decimal(10,2) NOT NULL,
  `fecha` datetime NOT NULL,
  `lugares_idLugar` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `temperaturas`
--

INSERT INTO `temperaturas` (`idTemperaturas`, `temperatura`, `fecha`, `lugares_idLugar`) VALUES
(1, 24.80, '2026-02-23 08:00:00', 1),
(2, 25.10, '2026-02-23 09:00:00', 1),
(3, 25.60, '2026-02-23 10:00:00', 1),
(4, 22.30, '2026-02-23 08:15:00', 2),
(5, 22.75, '2026-02-23 09:15:00', 2),
(6, 28.40, '2026-02-23 08:30:00', 3),
(7, 29.10, '2026-02-23 09:30:00', 3),
(8, 29.50, '2026-02-23 10:30:00', 3),
(9, 19.90, '2026-02-23 08:45:00', 4),
(10, 20.15, '2026-02-23 09:45:00', 4),
(11, 31.20, '2026-02-23 11:00:00', 5),
(12, 30.95, '2026-02-23 12:00:00', 5),
(13, 24.95, '2026-02-24 08:00:00', 1),
(14, 22.60, '2026-02-24 08:30:00', 2),
(15, 29.80, '2026-02-24 09:00:00', 3),
(16, 22.50, '2026-03-01 08:00:00', 1),
(17, 24.10, '2026-03-01 08:10:00', 2),
(18, 19.80, '2026-03-01 08:20:00', 3),
(19, 18.30, '2026-03-01 08:30:00', 4),
(20, 25.00, '2026-03-01 08:40:00', 5),
(21, 23.40, '2026-03-01 08:50:00', 6),
(22, 21.70, '2026-03-01 09:00:00', 7),
(23, 20.90, '2026-03-01 09:10:00', 8),
(24, 26.20, '2026-03-01 09:20:00', 9),
(25, 27.50, '2026-03-01 09:30:00', 10),
(26, 28.10, '2026-03-01 09:40:00', 11),
(27, 30.30, '2026-03-01 09:50:00', 12),
(28, 19.50, '2026-03-01 10:00:00', 13),
(29, 29.80, '2026-03-01 10:10:00', 14),
(30, 31.20, '2026-03-01 10:20:00', 15),
(31, 23.00, '2026-03-01 10:30:00', 1),
(32, 24.80, '2026-03-01 10:40:00', 2),
(33, 20.10, '2026-03-01 10:50:00', 3),
(34, 17.90, '2026-03-01 11:00:00', 4),
(35, 25.60, '2026-03-01 11:10:00', 5),
(36, 22.90, '2026-03-01 11:20:00', 6),
(37, 21.30, '2026-03-01 11:30:00', 7),
(38, 21.00, '2026-03-01 11:40:00', 8),
(39, 26.80, '2026-03-01 11:50:00', 9),
(40, 27.90, '2026-03-01 12:00:00', 10),
(41, 28.70, '2026-03-01 12:10:00', 11),
(42, 31.00, '2026-03-01 12:20:00', 12),
(43, 20.00, '2026-03-01 12:30:00', 13),
(44, 30.50, '2026-03-01 12:40:00', 14),
(45, 32.10, '2026-03-01 12:50:00', 15),
(46, 22.20, '2026-03-01 13:00:00', 3),
(47, 18.70, '2026-03-01 13:10:00', 4),
(48, 26.40, '2026-03-01 13:20:00', 9),
(49, 29.10, '2026-03-01 13:30:00', 14),
(50, 31.50, '2026-03-01 13:40:00', 15),
(51, 30.61, '2026-03-01 08:20:37', 5),
(52, 17.50, '2026-03-25 09:43:10', 1),
(54, 28.50, '2026-03-25 10:03:04', 1),
(55, 35.00, '2026-04-15 10:02:08', 5),
(57, 24.00, '2026-04-21 09:57:26', 14),
(58, 27.00, '2026-04-27 10:30:35', 1),
(59, 27.00, '2026-04-27 10:30:41', 1),
(60, 27.00, '2026-04-27 10:30:46', 1),
(61, 27.00, '2026-04-27 10:30:52', 1),
(62, 27.00, '2026-04-27 10:30:58', 1),
(63, 27.00, '2026-04-27 10:31:03', 1),
(64, 27.00, '2026-04-27 10:31:09', 1),
(65, 27.00, '2026-04-27 10:31:14', 1),
(66, 27.00, '2026-04-27 10:31:21', 1),
(67, 27.00, '2026-04-27 10:31:27', 1),
(68, 27.00, '2026-04-27 10:31:33', 1),
(69, 27.00, '2026-04-27 10:31:39', 1),
(70, 27.00, '2026-04-27 10:31:44', 1),
(71, 27.00, '2026-04-27 10:31:50', 1),
(72, 27.00, '2026-04-27 10:31:56', 1),
(73, 25.50, '2026-04-27 10:54:44', 1),
(74, 25.60, '2026-04-27 10:54:50', 1),
(75, 25.60, '2026-04-27 10:54:55', 1),
(76, 25.60, '2026-04-27 10:55:00', 1),
(77, 25.70, '2026-04-27 10:55:06', 1),
(78, 25.70, '2026-04-27 10:55:11', 1),
(79, 25.80, '2026-04-27 10:55:17', 1),
(80, 25.80, '2026-04-27 10:55:23', 1),
(81, 25.80, '2026-04-27 10:55:29', 1),
(82, 25.90, '2026-04-27 10:55:35', 1),
(83, 25.90, '2026-04-27 10:55:40', 1),
(84, 25.90, '2026-04-27 10:55:46', 1),
(85, 26.00, '2026-04-27 10:55:52', 1),
(86, 26.00, '2026-04-27 10:55:58', 1),
(87, 26.00, '2026-04-27 10:56:03', 1),
(88, 26.00, '2026-04-27 10:56:09', 1),
(89, 26.00, '2026-04-27 10:56:15', 1),
(90, 26.00, '2026-04-27 10:56:20', 1),
(91, 27.20, '2026-04-27 10:56:26', 1),
(92, 27.10, '2026-04-27 10:56:32', 1),
(93, 27.00, '2026-04-27 10:56:37', 1),
(94, 27.00, '2026-04-27 10:56:43', 1),
(95, 26.90, '2026-04-27 10:56:49', 1),
(96, 26.80, '2026-04-27 10:56:55', 1),
(97, 26.70, '2026-04-27 10:57:01', 1),
(98, 26.70, '2026-04-27 10:57:06', 1),
(99, 26.70, '2026-04-27 10:57:11', 1),
(100, 26.60, '2026-04-27 10:57:16', 1),
(101, 26.60, '2026-04-27 10:57:22', 1),
(102, 26.50, '2026-04-27 10:57:28', 1),
(103, 26.50, '2026-04-27 10:57:34', 1),
(104, 26.40, '2026-04-27 10:57:40', 1),
(105, 26.40, '2026-04-27 10:57:46', 1),
(106, 26.30, '2026-04-27 10:57:52', 1),
(107, 26.30, '2026-04-27 10:57:57', 1),
(108, 26.30, '2026-04-27 10:58:03', 1),
(109, 26.20, '2026-04-27 10:58:08', 1),
(110, 26.20, '2026-04-27 10:58:14', 1),
(111, 26.20, '2026-04-27 10:58:19', 1),
(112, 26.20, '2026-04-27 10:58:24', 1),
(113, 26.20, '2026-04-27 10:58:30', 1),
(114, 26.20, '2026-04-27 10:58:36', 1),
(115, 26.20, '2026-04-27 10:58:42', 1),
(116, 26.10, '2026-04-27 10:58:48', 1),
(117, 26.10, '2026-04-27 10:58:54', 1),
(118, 26.10, '2026-04-27 10:58:59', 1),
(119, 26.10, '2026-04-27 10:59:05', 1),
(120, 26.10, '2026-04-27 10:59:11', 1),
(121, 26.10, '2026-04-27 10:59:16', 1),
(122, 26.10, '2026-04-27 10:59:22', 1),
(123, 26.10, '2026-04-27 10:59:28', 1),
(124, 26.10, '2026-04-27 10:59:33', 1),
(125, 26.10, '2026-04-27 10:59:38', 1),
(126, 26.10, '2026-04-27 10:59:44', 1),
(127, 26.10, '2026-04-27 10:59:50', 1),
(128, 26.00, '2026-04-27 10:59:55', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `email`, `password`, `nombre`) VALUES
(1, 'ola@gmail.com', 'c4f38ac480cca9678660501f8eea5ed7', 'nombres'),
(2, 'algo@gmail.com', '6b34b533488035d99bbbd7e9fb26c6d8', 'aojdgjasdg'),
(3, 'otro@gmail.com', '18c2b6b52a102a6de70c0dc377408756', 'adghalsdga'),
(5, 'adghakg@gmail.com', 'e8a6be224ee16b04331db73354f0c5f4', 'wituoiw'),
(6, 'emailsuarez@gmail.com', 'b009c1687c3d535ab0752145fe4a1606', 'haceralgo'),
(7, 'correo_nuevo@gmail.com', '5a6366aee60e5f3fdf5624a08b0db52e', 'es nuevo'),
(8, 'aversijala@gmail.com', '465717cc29da050ca6ddf811d771d3ad', 'jalara'),
(9, 'correo2@gmail.com', '04bbef0ec091af509fce3d7244cc1757', 'correo2'),
(10, 'correo3@gmail.com', '348da425eadf6e38756d9198367b9b59', 'correo3'),
(11, 'correo4@gmail.com', '21dba6c07cdce1c5aee33a6f45cada69', 'correo4'),
(12, 'panchofierrin@gmail.com', '00f176ac8ef9f1d4a0ce5aec49abdf70', 'fierrin'),
(13, 'juanfranciscauuuuu@gmail.com', 'ba0d28e5cc6c380d5d9d21e9addb7611', 'juan');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_temperaturas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_temperaturas` (
`fecha` datetime
,`lugar` varchar(255)
,`temperatura` decimal(10,2)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_temperaturas`
--
DROP TABLE IF EXISTS `vista_temperaturas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`adminweb`@`localhost` SQL SECURITY DEFINER VIEW `vista_temperaturas`  AS SELECT `l`.`lugar` AS `lugar`, `t`.`temperatura` AS `temperatura`, `t`.`fecha` AS `fecha` FROM (`temperaturas` `t` join `lugares` `l` on((`t`.`lugares_idLugar` = `l`.`idLugar`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lugares`
--
ALTER TABLE `lugares`
  ADD PRIMARY KEY (`idLugar`);

--
-- Indices de la tabla `temperaturas`
--
ALTER TABLE `temperaturas`
  ADD PRIMARY KEY (`idTemperaturas`,`lugares_idLugar`),
  ADD KEY `fk_temperaturas_lugares_idx` (`lugares_idLugar`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lugares`
--
ALTER TABLE `lugares`
  MODIFY `idLugar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `temperaturas`
--
ALTER TABLE `temperaturas`
  MODIFY `idTemperaturas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `temperaturas`
--
ALTER TABLE `temperaturas`
  ADD CONSTRAINT `fk_temperaturas_lugares` FOREIGN KEY (`lugares_idLugar`) REFERENCES `lugares` (`idLugar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
