-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-01-2019 a las 07:03:12
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `contratos`
--
CREATE DATABASE IF NOT EXISTS `contratos` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE `contratos`;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insCliente` (IN `nombre_cli` VARCHAR(15), IN `apellido_cli` VARCHAR(15), IN `direccion_cli` VARCHAR(55))  NO SQL
INSERT INTO clientes (nombre_cli, apellido_cli, direccion_cli, pago_cli) VALUES (nombre_cli, apellido_cli, direccion_cli)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cli` int(11) NOT NULL,
  `nombre_cli` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `apellido_cli` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `direccion_cli` varchar(55) COLLATE latin1_spanish_ci NOT NULL,
  `pago_cli` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cli`, `nombre_cli`, `apellido_cli`, `direccion_cli`, `pago_cli`) VALUES
(1, 'Ana Raquel', 'Hernandez', 'Zacamil', 30),
(2, 'Enrique', 'Quezada', 'Cuscatancingo', 150),
(3, 'valery', 'Ayala', 'Mariona', 145);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles`
--

CREATE TABLE `detalles` (
  `id_det` int(11) NOT NULL,
  `total_det` double DEFAULT NULL,
  `clientes_id_cli` int(11) DEFAULT NULL,
  `servicios_id_ser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_ser` int(11) NOT NULL,
  `nombre_ser` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `precio_ser` double NOT NULL,
  `fecha_ser` date NOT NULL,
  `descuento_ser` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cli`);

--
-- Indices de la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD PRIMARY KEY (`id_det`),
  ADD KEY `clientes_id_cli` (`clientes_id_cli`),
  ADD KEY `servicios_id_ser` (`servicios_id_ser`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_ser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalles`
--
ALTER TABLE `detalles`
  MODIFY `id_det` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_ser` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD CONSTRAINT `detalles_ibfk_1` FOREIGN KEY (`clientes_id_cli`) REFERENCES `clientes` (`id_cli`),
  ADD CONSTRAINT `detalles_ibfk_2` FOREIGN KEY (`servicios_id_ser`) REFERENCES `servicios` (`id_ser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
