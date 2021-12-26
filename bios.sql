-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-12-2021 a las 15:26:53
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_Cliente` int(11) NOT NULL,
  `cli_ci` varchar(15) NOT NULL,
  `cli_nombre` varchar(30) NOT NULL,
  `cli_apellido` varchar(30) NOT NULL,
  `cli_direccion` varchar(50) NOT NULL,
  `cli_telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_Cliente`, `cli_ci`, `cli_nombre`, `cli_apellido`, `cli_direccion`, `cli_telefono`) VALUES
(1, '2', 'pedro', 'lopez', 'tu 276', '2345566'),
(2, '11045186', 'Jose', 'Estevez', '18 de julio 3764', '23597809'),
(3, '19420829', 'Gonzalo', 'Brandon', 'Minas 2673', '23557533'),
(4, '5126734', 'Maximo', 'Vecino', 'Magallanes 3465', '2200-1611'),
(5, '11229801', 'Gabriel', 'Bertucci', 'Ellauri 2345', '2204-3318'),
(6, '9041130', 'Antonio', 'Rizzo', 'Mercedes 3409', '2355-7533'),
(7, '11441984', 'Nelsa', 'Vique', 'Santa Ana 3987', '98634225'),
(8, '18243929', 'Hugo', 'Rodriguez', 'Inca 3876', '2204-3132'),
(9, '16914948', 'Isaac', 'Acher', 'Las heras 3422', '2409-9979'),
(10, '12030231', 'Jose', 'Garcia', 'Irlanda 3765', '91829113'),
(11, '18252815', 'Carlos', 'Bentancour', 'Justicia 3412', '99540641'),
(12, '8389719', 'Angela', 'Mautone', 'Arenal Grande 2876', '97131392'),
(13, '13111367', 'Angela', 'Bugallo', 'Repeto 3987', '96437946'),
(14, '9041130', 'Antonio ', 'Rambaldi', 'Geminis 3456', '2355-7533');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id_usuario` int(11) NOT NULL,
  `ci_usuario` int(10) NOT NULL,
  `nom_usuario` varchar(200) NOT NULL,
  `ap_usuario` varchar(200) NOT NULL,
  `email_usuario` varchar(200) NOT NULL,
  `user_usuario` varchar(15) NOT NULL,
  `pass_usuario` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_usuario`, `ci_usuario`, `nom_usuario`, `ap_usuario`, `email_usuario`, `user_usuario`, `pass_usuario`) VALUES
(12, 44540981, 'Paulo', 'Fernandez', 'prueba@hotmail.com', 'paulo', 81),
(13, 45670989, 'Karina', 'Gomez', 'karygomez@hotmail.com', 'Kary', 81);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id_vehi` int(11) NOT NULL,
  `vehi_marca` varchar(20) DEFAULT NULL,
  `vehi_modelo` varchar(20) DEFAULT NULL,
  `vehi_matricula` varchar(20) DEFAULT NULL,
  `vehi_km` varchar(100) DEFAULT NULL,
  `vehi_precio` double DEFAULT NULL,
  `vehi_anio` varchar(5) DEFAULT NULL,
  `vehi_disponible` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

CREATE TABLE `vendedor` (
  `id_vend` int(11) NOT NULL,
  `vend_ci` varchar(15) DEFAULT NULL,
  `vend_nombre` varchar(30) DEFAULT NULL,
  `vend_apellido` varchar(30) DEFAULT NULL,
  `vend_direccion` varchar(50) DEFAULT NULL,
  `vend_telefono` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_ventas` int(11) NOT NULL,
  `num_Factura` varchar(15) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_vendedor` int(11) DEFAULT NULL,
  `id_vehiculo` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `Precio` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_Cliente`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_usuario`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id_vehi`);

--
-- Indices de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`id_vend`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_ventas`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_vendedor` (`id_vendedor`),
  ADD KEY `id_vehiculo` (`id_vehiculo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id_vehi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_ventas` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_Cliente`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_vendedor`) REFERENCES `vendedor` (`id_vend`),
  ADD CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id_vehi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
