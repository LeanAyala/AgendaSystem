-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-07-2024 a las 17:56:01
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
-- Base de datos: `sistema-agenda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dia`
--

CREATE TABLE `dia` (
  `id_dia` int(11) NOT NULL,
  `name_dia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dia`
--

INSERT INTO `dia` (`id_dia`, `name_dia`) VALUES
(1, 'Lunes'),
(2, 'Martes'),
(3, 'Miércoles'),
(4, 'Jueves'),
(5, 'Viernes'),
(6, 'Sábado'),
(7, 'Domingo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id_equipo` int(11) NOT NULL,
  `name_equipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `id_localidad` int(11) NOT NULL,
  `name_localidad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mes`
--

CREATE TABLE `mes` (
  `id_mes` int(11) NOT NULL,
  `name_mes` varchar(255) NOT NULL,
  `dia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operativo`
--

CREATE TABLE `operativo` (
  `id_operativo` int(11) NOT NULL,
  `name_operativo` varchar(255) NOT NULL,
  `localidad_id` int(11) NOT NULL,
  `tipo_operativo_id` int(11) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `equipo_id` int(11) NOT NULL,
  `referente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promotores`
--

CREATE TABLE `promotores` (
  `id_promotor` int(11) NOT NULL,
  `name_promotor` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referente`
--

CREATE TABLE `referente` (
  `id_referente` int(11) NOT NULL,
  `name_referente` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_user`
--

CREATE TABLE `rol_user` (
  `id_rol` int(11) NOT NULL,
  `name_rol` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol_user`
--

INSERT INTO `rol_user` (`id_rol`, `name_rol`) VALUES
(1, 'administrador'),
(2, 'común');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_operativo`
--

CREATE TABLE `tipo_operativo` (
  `id_tipo_operativo` int(11) NOT NULL,
  `name_operativo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dia`
--
ALTER TABLE `dia`
  ADD PRIMARY KEY (`id_dia`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`id_localidad`);

--
-- Indices de la tabla `mes`
--
ALTER TABLE `mes`
  ADD PRIMARY KEY (`id_mes`),
  ADD KEY `dia_id` (`dia_id`);

--
-- Indices de la tabla `operativo`
--
ALTER TABLE `operativo`
  ADD PRIMARY KEY (`id_operativo`),
  ADD KEY `equipo_id` (`equipo_id`),
  ADD KEY `tipo_operativo_id` (`tipo_operativo_id`),
  ADD KEY `localidad_id` (`localidad_id`),
  ADD KEY `referente_id` (`referente_id`);

--
-- Indices de la tabla `promotores`
--
ALTER TABLE `promotores`
  ADD PRIMARY KEY (`id_promotor`);

--
-- Indices de la tabla `referente`
--
ALTER TABLE `referente`
  ADD PRIMARY KEY (`id_referente`);

--
-- Indices de la tabla `rol_user`
--
ALTER TABLE `rol_user`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tipo_operativo`
--
ALTER TABLE `tipo_operativo`
  ADD PRIMARY KEY (`id_tipo_operativo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dia`
--
ALTER TABLE `dia`
  MODIFY `id_dia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `id_localidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mes`
--
ALTER TABLE `mes`
  MODIFY `id_mes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `operativo`
--
ALTER TABLE `operativo`
  MODIFY `id_operativo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `promotores`
--
ALTER TABLE `promotores`
  MODIFY `id_promotor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `referente`
--
ALTER TABLE `referente`
  MODIFY `id_referente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol_user`
--
ALTER TABLE `rol_user`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_operativo`
--
ALTER TABLE `tipo_operativo`
  MODIFY `id_tipo_operativo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mes`
--
ALTER TABLE `mes`
  ADD CONSTRAINT `mes_ibfk_1` FOREIGN KEY (`dia_id`) REFERENCES `dia` (`id_dia`);

--
-- Filtros para la tabla `operativo`
--
ALTER TABLE `operativo`
  ADD CONSTRAINT `operativo_ibfk_1` FOREIGN KEY (`localidad_id`) REFERENCES `localidad` (`id_localidad`),
  ADD CONSTRAINT `operativo_ibfk_2` FOREIGN KEY (`tipo_operativo_id`) REFERENCES `tipo_operativo` (`id_tipo_operativo`),
  ADD CONSTRAINT `operativo_ibfk_3` FOREIGN KEY (`equipo_id`) REFERENCES `equipo` (`id_equipo`),
  ADD CONSTRAINT `operativo_ibfk_4` FOREIGN KEY (`referente_id`) REFERENCES `referente` (`id_referente`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rol_user` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
