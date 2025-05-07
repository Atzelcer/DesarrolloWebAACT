-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2025 a las 03:35:00
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
-- Base de datos: `bd_bolivia_dpm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `nombre`) VALUES
(1, 'Chuquisaca'),
(2, 'La Paz'),
(3, 'Cochabamba'),
(4, 'Oruro'),
(5, 'Potosí'),
(6, 'Tarija'),
(7, 'Santa Cruz'),
(8, 'Beni'),
(9, 'Pando');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `provincia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id`, `nombre`, `provincia_id`) VALUES
(1, 'Sucre', 1),
(2, 'Yotala', 1),
(3, 'Camargo', 2),
(4, 'Villa Charcas', 2),
(5, 'Villa Abecia', 3),
(6, 'Culpina', 3),
(7, 'Padilla', 4),
(8, 'El Villar', 4),
(9, 'Zudáñez', 5),
(10, 'Presto', 5),
(11, 'La Paz', 6),
(12, 'El Alto', 6),
(13, 'Pucarani', 7),
(14, 'Laja', 7),
(15, 'Viacha', 8),
(16, 'Tiwanaku', 8),
(17, 'Coro Coro', 9),
(18, 'Caquiaviri', 9),
(19, 'Achacachi', 10),
(20, 'Huatajata', 10),
(21, 'Cochabamba', 11),
(22, 'Sacaba', 11),
(23, 'Villa Tunari', 12),
(24, 'Chimoré', 12),
(25, 'Quillacollo', 13),
(26, 'Tiquipaya', 13),
(27, 'Punata', 14),
(28, 'San Benito', 14),
(29, 'Tiraque', 15),
(30, 'Shinahota', 15),
(31, 'Oruro', 16),
(32, 'Caracollo', 16),
(33, 'Curahuara de Carangas', 17),
(34, 'Turco', 17),
(35, 'Salinas de Garcí Mendoza', 18),
(36, 'Pampa Aullagas', 18),
(37, 'Huayllamarca', 19),
(38, 'Totora', 19),
(39, 'Poopó', 20),
(40, 'Pazña', 20),
(41, 'Potosí', 21),
(42, 'Yocalla', 21),
(43, 'Cotagaita', 22),
(44, 'Vitichi', 22),
(45, 'Tupiza', 23),
(46, 'Atocha', 23),
(47, 'Uyuni', 24),
(48, 'Tomave', 24),
(49, 'Llica', 25),
(50, 'Tahua', 25),
(51, 'Tarija', 26),
(52, 'San Lorenzo', 26),
(53, 'Uriondo', 27),
(54, 'Yunchará', 27),
(55, 'Yacuiba', 28),
(56, 'Villamontes', 28),
(57, 'Padcaya', 29),
(58, 'Bermejo', 29),
(59, 'Entre Ríos', 30),
(60, 'Caraparí', 30),
(61, 'Santa Cruz de la Sierra', 31),
(62, 'Cotoca', 31),
(63, 'San José de Chiquitos', 32),
(64, 'Roboré', 32),
(65, 'Camiri', 33),
(66, 'Charagua', 33),
(67, 'Yapacaní', 34),
(68, 'San Carlos', 34),
(69, 'Portachuelo', 35),
(70, 'Santa Rosa del Sara', 35),
(71, 'Trinidad', 36),
(72, 'San Javier', 36),
(73, 'San Ignacio de Moxos', 37),
(74, 'Loreto', 37),
(75, 'San Andrés', 38),
(76, 'San Joaquín', 38),
(77, 'Santa Ana del Yacuma', 39),
(78, 'Exaltación', 39),
(79, 'Riberalta', 40),
(80, 'Guayaramerín', 40),
(81, 'Cobija', 41),
(82, 'Porvenir', 41),
(83, 'Puerto Rico', 42),
(84, 'Filadelfia', 42),
(85, 'Santa Rosa del Abuná', 43),
(86, 'Ingavi', 43),
(87, 'Nueva Esperanza', 44),
(88, 'Villa Nueva', 44),
(89, 'Puerto Gonzalo Moreno', 45),
(90, 'San Lorenzo', 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `departamento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id`, `nombre`, `departamento_id`) VALUES
(1, 'Oropeza', 1),
(2, 'Nor Cinti', 1),
(3, 'Sud Cinti', 1),
(4, 'Tomina', 1),
(5, 'Zudáñez', 1),
(6, 'Murillo', 2),
(7, 'Los Andes', 2),
(8, 'Ingavi', 2),
(9, 'Pacajes', 2),
(10, 'Omasuyos', 2),
(11, 'Cercado', 3),
(12, 'Chapare', 3),
(13, 'Quillacollo', 3),
(14, 'Punata', 3),
(15, 'Tiraque', 3),
(16, 'Cercado', 4),
(17, 'Sajama', 4),
(18, 'Ladislao Cabrera', 4),
(19, 'Nor Carangas', 4),
(20, 'Poopó', 4),
(21, 'Tomás Frías', 5),
(22, 'Nor Chichas', 5),
(23, 'Sud Chichas', 5),
(24, 'Antonio Quijarro', 5),
(25, 'Daniel Campos', 5),
(26, 'Cercado', 6),
(27, 'Avilés', 6),
(28, 'Gran Chaco', 6),
(29, 'Arce', 6),
(30, 'O’Connor', 6),
(31, 'Andrés Ibáñez', 7),
(32, 'Chiquitos', 7),
(33, 'Cordillera', 7),
(34, 'Ichilo', 7),
(35, 'Sara', 7),
(36, 'Cercado', 8),
(37, 'Moxos', 8),
(38, 'Marbán', 8),
(39, 'Yacuma', 8),
(40, 'Vaca Díez', 8),
(41, 'Nicolás Suárez', 9),
(42, 'Manuripi', 9),
(43, 'Abuná', 9),
(44, 'Federico Román', 9),
(45, 'Madre de Dios', 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provincia_id` (`provincia_id`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departamento_id` (`departamento_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `municipios_ibfk_1` FOREIGN KEY (`provincia_id`) REFERENCES `provincias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD CONSTRAINT `provincias_ibfk_1` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
