CREATE TABLE `Usuarios` (
  `ID_Usuario` int PRIMARY KEY AUTO_INCREMENT,
  `Nombre` varchar(50),
  `Apellido` varchar(50),
  `Cedula` varchar(10),
  `Rol` varchar(25),
  `Telefono` varchar(10),
  `Clave` varchar(50)
);

CREATE TABLE `Equipos` (
  `ID_Equipo` int PRIMARY KEY AUTO_INCREMENT,
  `Nombre` varchar(50),
  `Marca` varchar(50),
  `Detalle` varchar(100),
  `Precio_Adquisicion` decimal,
  `Estado_Equipo` int
);

CREATE TABLE `Solicitudes` (
  `ID_Solicitud` int PRIMARY KEY AUTO_INCREMENT,
  `ID_Tecnico_Aprueba` int,
  `ID_Solicitante` int,
  `ID_Equipo_Solicita` int,
  `Estado_Solicitud` int,
  `Observacion_Solicitud` varchar(150)
);

CREATE TABLE `Devoluciones` (
  `ID_Devolucion` int PRIMARY KEY AUTO_INCREMENT,
  `ID_Solicitud_Devolucion` int,
  `Estado_Devolucion` int,
  `Observacion_Devolucion` varchar(150)
);

ALTER TABLE `Solicitudes` ADD FOREIGN KEY (`ID_Solicitante`) REFERENCES `Usuarios` (`ID_Usuario`);

ALTER TABLE `Solicitudes` ADD FOREIGN KEY (`ID_Equipo_Solicita`) REFERENCES `Equipos` (`ID_Equipo`);

ALTER TABLE `Devoluciones` ADD FOREIGN KEY (`ID_Solicitud_Devolucion`) REFERENCES `Solicitudes` (`ID_Solicitud`);

ALTER TABLE `Solicitudes` ADD FOREIGN KEY (`ID_Tecnico_Aprueba`) REFERENCES `Usuarios` (`ID_Usuario`);
