-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 02:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prestamosequipos`
--

-- --------------------------------------------------------

--
-- Table structure for table `devoluciones`
--

CREATE TABLE `devoluciones` (
  `ID_Devolucion` int(11) NOT NULL,
  `ID_Solicitud_Devolucion` int(11) NOT NULL,
  `ID_Tecnico_Recibe` int(11) DEFAULT NULL,
  `Estado_Devolucion` int(11) NOT NULL,
  `Estado_Equipo_Devuelve` int(11) DEFAULT NULL,
  `Observacion_Devolucion` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `devoluciones`
--

INSERT INTO `devoluciones` (`ID_Devolucion`, `ID_Solicitud_Devolucion`, `ID_Tecnico_Recibe`, `Estado_Devolucion`, `Estado_Equipo_Devuelve`, `Observacion_Devolucion`) VALUES
(1, 1, 1, 2, 1, 'Entrega en buen estado');

-- --------------------------------------------------------

--
-- Table structure for table `equipos`
--

CREATE TABLE `equipos` (
  `ID_Equipo` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Marca` varchar(50) NOT NULL,
  `Detalle` varchar(100) NOT NULL,
  `Precio_Adquisicion` decimal(10,0) NOT NULL,
  `Estado_Equipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipos`
--

INSERT INTO `equipos` (`ID_Equipo`, `Nombre`, `Marca`, `Detalle`, `Precio_Adquisicion`, `Estado_Equipo`) VALUES
(1, 'Cable HDMI', 'HDMI Adopters', 'Cable de 5m, puerto HDMI', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `solicitudes`
--

CREATE TABLE `solicitudes` (
  `ID_Solicitud` int(11) NOT NULL,
  `ID_Tecnico_Aprueba` int(11) DEFAULT NULL,
  `ID_Solicitante` int(11) NOT NULL,
  `ID_Equipo_Solicita` int(11) NOT NULL,
  `Estado_Solicitud` int(11) NOT NULL,
  `Observacion_Solicitud` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `solicitudes`
--

INSERT INTO `solicitudes` (`ID_Solicitud`, `ID_Tecnico_Aprueba`, `ID_Solicitante`, `ID_Equipo_Solicita`, `Estado_Solicitud`, `Observacion_Solicitud`) VALUES
(1, 1, 2, 1, 1, 'Solicita para la clase de \'Métodos Numéricos\'');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_Usuario` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Cedula` varchar(10) NOT NULL,
  `Rol` int(11) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `Clave` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`ID_Usuario`, `Nombre`, `Apellido`, `Cedula`, `Rol`, `Telefono`, `Clave`) VALUES
(1, 'Anahi', 'Naranjo', '1805221676', 1, '0983763276', '12345'),
(2, 'Johan', 'Curicho', '999999999', 2, '099999999', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `devoluciones`
--
ALTER TABLE `devoluciones`
  ADD PRIMARY KEY (`ID_Devolucion`),
  ADD KEY `ID_Solicitud_Devolucion` (`ID_Solicitud_Devolucion`),
  ADD KEY `ID_Tecnico_Recibe` (`ID_Tecnico_Recibe`);

--
-- Indexes for table `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`ID_Equipo`);

--
-- Indexes for table `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`ID_Solicitud`),
  ADD KEY `ID_Solicitante` (`ID_Solicitante`),
  ADD KEY `ID_Equipo_Solicita` (`ID_Equipo_Solicita`),
  ADD KEY `ID_Tecnico_Aprueba` (`ID_Tecnico_Aprueba`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_Usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `devoluciones`
--
ALTER TABLE `devoluciones`
  MODIFY `ID_Devolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `equipos`
--
ALTER TABLE `equipos`
  MODIFY `ID_Equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `ID_Solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `devoluciones`
--
ALTER TABLE `devoluciones`
  ADD CONSTRAINT `devoluciones_ibfk_1` FOREIGN KEY (`ID_Solicitud_Devolucion`) REFERENCES `solicitudes` (`ID_Solicitud`),
  ADD CONSTRAINT `devoluciones_ibfk_2` FOREIGN KEY (`ID_Tecnico_Recibe`) REFERENCES `usuarios` (`ID_Usuario`);

--
-- Constraints for table `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_ibfk_1` FOREIGN KEY (`ID_Solicitante`) REFERENCES `usuarios` (`ID_Usuario`),
  ADD CONSTRAINT `solicitudes_ibfk_2` FOREIGN KEY (`ID_Equipo_Solicita`) REFERENCES `equipos` (`ID_Equipo`),
  ADD CONSTRAINT `solicitudes_ibfk_3` FOREIGN KEY (`ID_Tecnico_Aprueba`) REFERENCES `usuarios` (`ID_Usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
