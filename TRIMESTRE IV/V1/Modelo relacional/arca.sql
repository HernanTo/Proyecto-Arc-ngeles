-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2022 a las 03:23:07
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `arca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citasmedicas`
--

CREATE TABLE `citasmedicas` (
  `id_cita` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estadoCita` tinyint(4) NOT NULL,
  `consultorio` int(4) NOT NULL,
  `tddDoctor` varchar(10) NOT NULL,
  `docDoctor` varchar(20) NOT NULL,
  `tddPaciente` varchar(10) NOT NULL,
  `docPaciente` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `citasmedicas`
--

INSERT INTO `citasmedicas` (`id_cita`, `fecha`, `hora`, `estadoCita`, `consultorio`, `tddDoctor`, `docDoctor`, `tddPaciente`, `docPaciente`) VALUES
(1, '2022-08-13', '15:00:00', 0, 903, '', '721827383', '', NULL),
(2, '2022-08-13', '14:00:00', 1, 903, '', '721827383', '', '1203827182'),
(7, '2022-08-19', '20:00:00', 1, 782, '', '1018726753', ' ', ' ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `idEspecialidad` int(11) NOT NULL,
  `nombreEspecialidad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`idEspecialidad`, `nombreEspecialidad`) VALUES
(0, 'Ninguna'),
(1, 'Medico General'),
(2, 'Psicologo'),
(4, 'Root');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observacion`
--

CREATE TABLE `observacion` (
  `id_observacion` int(11) NOT NULL,
  `id_cita` int(11) NOT NULL,
  `observacion` varchar(1000) DEFAULT NULL,
  `soporte` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pqrsf`
--

CREATE TABLE `pqrsf` (
  `fk_pk_tipo_documentoU` varchar(10) NOT NULL,
  `documento_U` varchar(20) NOT NULL,
  `pNombre_U` varchar(30) NOT NULL,
  `sNombre_U` varchar(30) DEFAULT NULL,
  `pApellido_U` varchar(30) NOT NULL,
  `sApellido_U` varchar(30) DEFAULT NULL,
  `celular_U` bigint(20) NOT NULL,
  `telefono_U` bigint(20) DEFAULT NULL,
  `correoElectronico_U` varchar(45) NOT NULL,
  `fk_pk_idTipoPQRSF` int(11) NOT NULL,
  `NumeroRadicacion` int(11) NOT NULL,
  `fechaPQRSF` date NOT NULL,
  `motivoPQRSF` varchar(50) NOT NULL,
  `detallePQRSF` varchar(1000) NOT NULL,
  `soportePQRSF` varchar(100) DEFAULT NULL,
  `estadoPQRSF` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta_seguridad`
--

CREATE TABLE `pregunta_seguridad` (
  `n_pregunta` int(11) NOT NULL,
  `pregunta_seg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pregunta_seguridad`
--

INSERT INTO `pregunta_seguridad` (`n_pregunta`, `pregunta_seg`) VALUES
(1, '¿Cuál era el nombre de su primera mascota?'),
(2, '¿Cual es el nombre de la ciudad en la que naciste?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `cod_rol` int(11) NOT NULL,
  `desc_rol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`cod_rol`, `desc_rol`) VALUES
(1, 'Administrador'),
(2, 'Secretaria'),
(3, 'Doctor'),
(4, 'Paciente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `tdd` varchar(3) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`tdd`, `descripcion`) VALUES
('CC', 'Cédula de Ciudadanía'),
('CE', 'Cédula de Extranjería'),
('TI', 'Tarjeta de Identidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopqrsf`
--

CREATE TABLE `tipopqrsf` (
  `idTipoPQRSF` int(11) NOT NULL,
  `TipoPQRSF` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipopqrsf`
--

INSERT INTO `tipopqrsf` (`idTipoPQRSF`, `TipoPQRSF`) VALUES
(1, 'Queja'),
(2, 'Felicitaciones'),
(3, 'Peticiones'),
(4, 'Reclamos'),
(5, 'Sugerencias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposdecita`
--

CREATE TABLE `tiposdecita` (
  `idTiposCita` int(11) NOT NULL,
  `NombreTipoCita` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tiposdecita`
--

INSERT INTO `tiposdecita` (`idTiposCita`, `NombreTipoCita`) VALUES
(1, 'General'),
(2, 'Psicologo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `fk_pk_tipo_documentoU` varchar(10) NOT NULL,
  `documento_U` varchar(20) NOT NULL,
  `estado_U` tinyint(2) NOT NULL,
  `pNombre_U` varchar(30) NOT NULL,
  `sNombre_U` varchar(30) DEFAULT NULL,
  `pApellido_U` varchar(30) NOT NULL,
  `sApellido_U` varchar(30) DEFAULT NULL,
  `fechaNacimiento_U` date NOT NULL,
  `direccion_U` varchar(40) DEFAULT NULL,
  `correoElectronico_U` varchar(45) NOT NULL,
  `celular_U` bigint(20) NOT NULL,
  `eps_P` varchar(20) DEFAULT NULL,
  `especialidad_U` varchar(20) NOT NULL,
  `claveU` varchar(20) NOT NULL,
  `fk_pregunta_seg` int(11) DEFAULT NULL,
  `resp_preg` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`fk_pk_tipo_documentoU`, `documento_U`, `estado_U`, `pNombre_U`, `sNombre_U`, `pApellido_U`, `sApellido_U`, `fechaNacimiento_U`, `direccion_U`, `correoElectronico_U`, `celular_U`, `eps_P`, `especialidad_U`, `claveU`, `fk_pregunta_seg`, `resp_preg`, `photo`) VALUES
('CE', '1018726753', 1, 'Flor', '', 'Amaya', 'Arevalo', '1995-05-07', 'Cra 97c #47C - 78', 'arevalo45@arca.com', 3027685642, NULL, '1', 'weACOCKp', NULL, NULL, NULL),
('CC', '1019877654', 1, 'Jorge', '', 'Villa', 'Sanchez', '1993-10-09', 'Calle 10A #20-19', 'villa4032@arca.com', 3056786452, NULL, '1', 'plIGhTRE', NULL, NULL, NULL),
('CC', '102128331', 1, 'Santiago', '', 'Flores', 'Gomez', '1970-04-27', 'Calle 43 No. 27-12', 'flores3261@arca.com', 3145439850, NULL, '4', 'CierSuPi', NULL, NULL, NULL),
('TI', '1023937291', 1, 'Alejandra', 'Maria', 'Vargas', 'Torres', '2006-12-20', 'Av. Ciudad de Cali No. 6C-09', 'maleja67@gmail.com', 3058765432, 'Sura', '0', 'ZvXfkeZD', 1, 'Titan', NULL),
('CC', '1040340344', 1, 'Martha', 'Cecilia', 'Fonseca', 'Acevedo', '2005-05-20', 'Av. Ciudad de Cali No. 9C-76', 'acevado@arca.com', 3145439851, NULL, '0', 'nSCRUETi', NULL, NULL, NULL),
('CC', '1049204933', 1, 'Carlos', 'Manuel', 'Soler', 'Rosas', '1985-10-10', 'Calle 90B sur #13-27', 'soler52@arca.com', 3132095640, NULL, '0', 'amgCtEdr', NULL, NULL, NULL),
('TI', '1203827182', 1, 'Carlos', 'Emmanuel', 'Cruz', 'Ramirez', '2007-09-07', 'Calle 24 No 5-60', 'caemcruz32@gmail.com', 3117865243, 'Cafam', '0', 'HYDRomIs', 1, 'Max', NULL),
('CC', '12673126', 1, 'Tatiana', '', 'Ospina', 'Martinez', '1999-05-19', 'Avenida Cra. 60 No. 57-60', 'taty999@gmail.com', 3202876543, 'Sura', '0', 'orEdUght', 2, 'Santa Marta', NULL),
('CE', '281379387', 1, 'Maria', 'Jose', 'Perez', 'Rojas', '1999-03-11', 'Calle 11 No. 4 - 14', 'maria32@outlook.com', 3219787661, 'Sanitas', '0', 'UryonTrA', 2, 'Bogotá', NULL),
('CC', '52876456', 1, 'Juan', 'Daniel', 'Rojas', 'Diaz', '1974-02-25', 'Carrera 49B #60-50', 'rojas23@arca.com', 3024567687, NULL, '1', 'PAtERNiX', NULL, NULL, NULL),
('CC', '721827383', 1, 'Yeraldin', 'Marcela', 'Vega', 'Sanchez', '1994-12-08', 'Calle 45 No 60-32', 'vega4965@arca.com', 3145604949, NULL, '2', 'OunChLIc', NULL, NULL, NULL),
('CE', '748323632', 1, 'Pablo', 'Jose', 'Cortez', 'Blanco', '1983-04-06', 'Calle 48b sur No. 21-13', 'pablito73@outlook.com', 3129876543, 'Compensar', '0', 'SbbArGDh', 2, 'Bogota', NULL),
('CC', '9876256', 1, 'Daniela', 'Maria', 'Beltran', 'Jimenez', '1967-11-06', 'Cra 90b #50A-12', 'beltran4051@arca.com', 3118765421, NULL, '2', 'pqYXkNVc', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_has_roles`
--

CREATE TABLE `usuario_has_roles` (
  `usuario_tdoc` varchar(10) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `usuario_rol` int(11) NOT NULL,
  `estado_rol` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_has_roles`
--

INSERT INTO `usuario_has_roles` (`usuario_tdoc`, `usuario_id`, `usuario_rol`, `estado_rol`) VALUES
('CC', 9876256, 3, 1),
('CC', 12673126, 4, 1),
('CC', 52876456, 3, 1),
('CC', 102128331, 1, 1),
('CC', 721827383, 3, 1),
('CC', 1019877654, 3, 1),
('CC', 1034586848, 2, 1),
('CC', 1040340344, 1, 1),
('CC', 1049204933, 2, 1),
('CE', 281379387, 4, 1),
('CE', 748323632, 4, 1),
('CE', 1018726753, 3, 1),
('TI', 1023937291, 4, 1),
('TI', 1203827182, 4, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citasmedicas`
--
ALTER TABLE `citasmedicas`
  ADD PRIMARY KEY (`id_cita`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`idEspecialidad`);

--
-- Indices de la tabla `observacion`
--
ALTER TABLE `observacion`
  ADD PRIMARY KEY (`id_observacion`);

--
-- Indices de la tabla `pqrsf`
--
ALTER TABLE `pqrsf`
  ADD PRIMARY KEY (`NumeroRadicacion`,`fk_pk_idTipoPQRSF`);

--
-- Indices de la tabla `pregunta_seguridad`
--
ALTER TABLE `pregunta_seguridad`
  ADD PRIMARY KEY (`n_pregunta`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`cod_rol`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`tdd`);

--
-- Indices de la tabla `tipopqrsf`
--
ALTER TABLE `tipopqrsf`
  ADD PRIMARY KEY (`idTipoPQRSF`);

--
-- Indices de la tabla `tiposdecita`
--
ALTER TABLE `tiposdecita`
  ADD PRIMARY KEY (`idTiposCita`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`documento_U`,`fk_pk_tipo_documentoU`);

--
-- Indices de la tabla `usuario_has_roles`
--
ALTER TABLE `usuario_has_roles`
  ADD PRIMARY KEY (`usuario_tdoc`,`usuario_id`,`usuario_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citasmedicas`
--
ALTER TABLE `citasmedicas`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `idEspecialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `observacion`
--
ALTER TABLE `observacion`
  MODIFY `id_observacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pqrsf`
--
ALTER TABLE `pqrsf`
  MODIFY `NumeroRadicacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipopqrsf`
--
ALTER TABLE `tipopqrsf`
  MODIFY `idTipoPQRSF` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tiposdecita`
--
ALTER TABLE `tiposdecita`
  MODIFY `idTiposCita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
