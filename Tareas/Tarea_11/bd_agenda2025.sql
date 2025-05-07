-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2025 a las 15:27:31
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
-- Base de datos: `bd_agenda2025`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `nombre`) VALUES
(1, 'Chuquisaca'),
(2, 'La Paz'),
(3, 'Cochabama'),
(4, 'Potosi'),
(5, 'Santa Cruz'),
(6, 'Beni'),
(7, 'Pando'),
(8, 'Oruro'),
(9, 'Tarija');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `provincia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id`, `nombre`, `provincia_id`) VALUES
(1, 'Sucre', 1),
(2, 'La Paz', 2),
(3, 'El Alto', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `fotografia` varchar(100) NOT NULL,
  `nombres` varchar(40) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` enum('Masculino','Femenino','','') NOT NULL,
  `correo` varchar(100) NOT NULL,
  `profesion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `fotografia`, `nombres`, `apellidos`, `fecha_nacimiento`, `sexo`, `correo`, `profesion_id`) VALUES
(1, '67e6c3257f50d.jpeg', 'Juan', 'Perez Murcia', '2022-03-12', 'Masculino', 'Juan@gmail.com', 2),
(2, '67e6c34c0c215.jpeg', 'Maria', 'Sanchez Barzola', '2022-04-12', 'Femenino', 'Maria@gmail.com', 1),
(5, '67e6c362b8bae.jpeg', 'Alan', 'Brito Delgado', '2025-03-07', 'Masculino', 'brito@gmail.com', 1),
(6, '67e6c4aeeff82.jpg', 'Luis', 'Fuentes Gonzales', '1970-09-25', 'Masculino', 'fobaq@mailinator.com', 4),
(7, '', 'Laboris quidem minim', 'Numquam quia molesti', '1978-11-26', 'Femenino', 'duzoxidibe@mailinator.com', 4),
(8, '', 'Consequatur Et rati', 'Maxime consequatur ', '1990-11-23', 'Masculino', 'xenarukine@mailinator.com', 3),
(9, '', 'Fugiat lorem vel vol', 'Dolore omnis non rer', '2023-12-21', 'Femenino', 'kodo@mailinator.com', 1),
(10, '', 'Est ratione delectus', 'Sint dolore omnis ni', '1980-10-25', 'Masculino', 'jutamapuj@mailinator.com', 1),
(11, '', 'Elit ratione ea mol', 'Minus ut sed est nos', '2004-11-15', 'Femenino', 'meduro@mailinator.com', 2),
(12, '', 'Consectetur neque ex', 'Molestiae sit amet ', '2024-04-02', 'Masculino', 'guvalov@mailinator.com', 4),
(13, '', 'Placeat occaecat ac', 'Amet natus id dolo', '1975-03-17', 'Masculino', 'bylunudajy@mailinator.com', 1),
(14, '', 'Aspernatur molestiae', 'Officia voluptatem ', '1989-03-19', 'Masculino', 'bigaxexoj@mailinator.com', 3),
(15, '', 'In minima saepe unde', 'Quis aut assumenda r', '2003-06-21', 'Femenino', 'gujaranud@mailinator.com', 4),
(16, '', 'Consequat Unde porr', 'Nulla et ab eum mole', '1999-06-22', 'Femenino', 'jasupyja@mailinator.com', 2),
(17, '', 'Occaecat dolores rep', 'Aute et suscipit aut', '1998-05-13', 'Femenino', 'gezycynydy@mailinator.com', 3),
(18, '', 'Animi fuga Ut dolo', 'Et obcaecati praesen', '2010-03-22', 'Masculino', 'nogaqebyp@mailinator.com', 3),
(19, '', 'Et illum voluptatem', 'Amet ullamco ex mag', '1980-03-23', 'Femenino', 'zowulypys@mailinator.com', 3),
(20, '', 'Amet doloribus volu', 'Ea qui fuga Consequ', '2003-03-17', 'Masculino', 'wigo@mailinator.com', 4),
(22, '', 'Natus iste exercitat', 'Commodi aut maxime r', '2017-03-03', 'Masculino', 'tiqok@mailinator.com', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesiones`
--

CREATE TABLE `profesiones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesiones`
--

INSERT INTO `profesiones` (`id`, `nombre`) VALUES
(1, 'ing en sistemas'),
(2, 'ing en ciencias'),
(3, 'ing en ti'),
(4, 'ing en disenio');

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
(2, 'Yamparaez', 2),
(3, 'Nor Cinti', 1),
(4, 'Sud Cinti', 1),
(5, 'Larecaja', 2),
(6, 'Murillo', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `nivel` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `password`, `nombre`, `nivel`) VALUES
(1, 'admin@sis256.edu', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrador', 1),
(2, 'usuario@sis256.edu', 'b665e217b51994789b02b1838e730d6b93baa30f', 'usuario', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesiones`
--
ALTER TABLE `profesiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `profesiones`
--
ALTER TABLE `profesiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
