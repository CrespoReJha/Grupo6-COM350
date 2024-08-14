-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-08-2024 a las 14:23:47
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
-- Base de datos: `bd_gimnasio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `ci` int(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `celular` int(11) NOT NULL,
  `membresia` int(2) NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `ci`, `nombre`, `celular`, `membresia`, `estado`) VALUES
(1, 1234567, 'Juan Pérez', 789654123, 1, 'activo'),
(2, 2345678, 'Ana Gómez', 789654124, 2, 'inactivo'),
(3, 3456789, 'Luis Martínez', 789654125, 3, 'activo'),
(4, 4567890, 'María López', 789654126, 1, 'activo'),
(5, 5678901, 'Carlos Sánchez', 789654127, 2, 'inactivo'),
(6, 6789012, 'Sofía Ramírez', 789654128, 3, 'activo'),
(7, 7890123, 'Daniela Fernández', 789654129, 1, 'activo'),
(8, 8901234, 'José García', 789654130, 2, 'inactivo'),
(9, 9012345, 'Laura Ruiz', 789654131, 3, 'activo'),
(10, 1234568, 'Marta González', 789654132, 1, 'activo'),
(11, 2345679, 'Pedro Moreno', 789654133, 2, 'inactivo'),
(12, 3456790, 'Lucía Ortega', 789654134, 3, 'activo'),
(13, 4567891, 'Gabriel Torres', 789654135, 1, 'activo'),
(14, 5678902, 'Elena Rojas', 789654136, 2, 'inactivo'),
(15, 6789013, 'Miguel Díaz', 789654137, 3, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `monto` int(11) NOT NULL,
  `detalle` varchar(100) NOT NULL,
  `fecha_pago` date NOT NULL,
  `estado` enum('Pagado','Pendiente','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `id_cliente`, `monto`, `detalle`, `fecha_pago`, `estado`) VALUES
(1, 1, 50, '', '2024-08-01', 'Pagado'),
(2, 2, 30, '', '0000-00-00', 'Pendiente'),
(3, 3, 45, '', '2024-08-07', 'Pagado'),
(4, 4, 60, '', '0000-00-00', 'Pendiente'),
(5, 5, 50, '', '2024-08-11', 'Pagado'),
(6, 6, 35, '', '0000-00-00', 'Pendiente'),
(7, 7, 70, '', '2024-08-15', 'Pagado'),
(8, 8, 25, '', '0000-00-00', 'Pendiente'),
(9, 9, 55, '', '2024-08-20', 'Pagado'),
(10, 10, 40, '', '0000-00-00', 'Pendiente'),
(11, 11, 50, '', '2024-08-25', 'Pagado'),
(12, 12, 60, '', '0000-00-00', 'Pendiente'),
(13, 13, 45, '', '2024-08-29', 'Pagado'),
(14, 14, 30, '', '0000-00-00', 'Pendiente'),
(15, 15, 65, '', '2024-08-31', 'Pagado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
