-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 23-08-2023 a las 20:36:45
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
-- Base de datos: `pharmasinergy`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Id_Cliente` int(11) NOT NULL,
  `Id_Paciente` int(11) DEFAULT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido` varchar(50) DEFAULT NULL,
  `RFC` varchar(20) DEFAULT NULL,
  `Direccion` varchar(100) DEFAULT NULL,
  `Puntos` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Id_Cliente`, `Id_Paciente`, `Nombre`, `Apellido`, `RFC`, `Direccion`, `Puntos`) VALUES
(5, 1, ' Mario', 'Cazares Diaz', 'CADM971130IF2', ' Antonio de Saavedra #268', NULL),
(6, 2, ' Alef', 'Huerta', 'HURA970315AGG1', 'Luis de León Romano 395', NULL),
(7, 3, ' Juan', 'Perez', 'ejemplo', 'Calle falsa #123', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `Id_Consulta` int(11) NOT NULL,
  `Id_Paciente` int(11) DEFAULT NULL,
  `Id_Doctor` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Motivo` varchar(200) DEFAULT NULL,
  `Diagnostico` varchar(500) DEFAULT NULL,
  `Tratamiento` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`Id_Consulta`, `Id_Paciente`, `Id_Doctor`, `Fecha`, `Motivo`, `Diagnostico`, `Tratamiento`) VALUES
(1, 1, 1, '2023-08-15', 'PIQUETE DE ABEJORRO', 'FUE PICADO POR UN ABEJORRO ', 'NADA\r\n      '),
(2, 3, 1, '2023-08-21', 'DOLOR DE ESTOMAGO', 'REPOSO      ', 'TOMAR PASTILLA PEPTO BISMOL\r\n      ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultadetalle`
--

CREATE TABLE `consultadetalle` (
  `Id_Detalle` int(11) NOT NULL,
  `Id_Consulta` int(11) DEFAULT NULL,
  `Id_Producto` int(11) DEFAULT NULL,
  `Dosis` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE `doctores` (
  `Id_Doctor` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido` varchar(50) DEFAULT NULL,
  `Especialidad` varchar(50) DEFAULT NULL,
  `RFC` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`Id_Doctor`, `Nombre`, `Apellido`, `Especialidad`, `RFC`) VALUES
(1, 'Gregory', 'House', 'Diagnostico Medico', 'GREHOUS590611I63');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `Id_Historia` int(11) NOT NULL,
  `Id_Paciente` int(11) DEFAULT NULL,
  `Informacion` varchar(1000) DEFAULT NULL,
  `Alergias` varchar(255) DEFAULT NULL,
  `Antecedentes` varchar(255) DEFAULT NULL,
  `Altura` float DEFAULT NULL,
  `Peso` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`Id_Historia`, `Id_Paciente`, `Informacion`, `Alergias`, `Antecedentes`, `Altura`, `Peso`) VALUES
(1, 1, '        ESTO ES UN EJEMPLO NORMAL      ', '        NINGUNA\r\n            ', '        SE ROMPIO LA MANDIBULA\r\n            ', 176, 80);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE `laboratorio` (
  `Id_Laboratorio` int(11) NOT NULL,
  `Laboratorio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `laboratorio`
--

INSERT INTO `laboratorio` (`Id_Laboratorio`, `Laboratorio`) VALUES
(1, 'Bayer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `Id_Marca` int(11) NOT NULL,
  `Marca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`Id_Marca`, `Marca`) VALUES
(1, 'Pfizer'),
(2, 'Bayer'),
(4, 'Maver'),
(5, 'Johnson & Johnson');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamento`
--

CREATE TABLE `medicamento` (
  `Id_Medicamento` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Id_Laboratorio` int(11) DEFAULT NULL,
  `PrincipioActivo` varchar(50) DEFAULT NULL,
  `IsGenerico` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medicamento`
--

INSERT INTO `medicamento` (`Id_Medicamento`, `Nombre`, `Id_Laboratorio`, `PrincipioActivo`, `IsGenerico`) VALUES
(0, '', NULL, NULL, 1),
(1, 'Aspirina', 1, 'Acido Acetilsalisilico', 0),
(2, 'Actron', 1, 'Ibuprofeno', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordendetalle`
--

CREATE TABLE `ordendetalle` (
  `Id_ODetalle` int(11) NOT NULL,
  `Id_Orden` int(11) DEFAULT NULL,
  `Id_Producto` int(11) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `PU` decimal(10,2) DEFAULT NULL,
  `Importe` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ordendetalle`
--

INSERT INTO `ordendetalle` (`Id_ODetalle`, `Id_Orden`, `Id_Producto`, `Cantidad`, `PU`, `Importe`) VALUES
(25, 2, 2, 2, 130.00, 260.00),
(26, 2, 5, 5, 80.00, 400.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `Id_Orden` int(11) NOT NULL,
  `Id_Cliente` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Total` decimal(10,2) DEFAULT NULL,
  `Id_Consulta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`Id_Orden`, `Id_Cliente`, `Fecha`, `Total`, `Id_Consulta`) VALUES
(2, 5, '2023-08-19', 660.00, 1),
(3, 6, '2023-08-22', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `Id_Paciente` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellidos` varchar(100) DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL,
  `Direccion` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`Id_Paciente`, `Nombre`, `Apellidos`, `Edad`, `Direccion`) VALUES
(1, 'Mario', 'Cazares Diaz', 25, 'Antonio de Saavedra #268'),
(2, 'Alef', 'Huerta', 26, 'Luis de León Romano 395'),
(3, 'Juan', 'Perez', 35, 'Calle falsa #123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Id_Producto` int(11) NOT NULL,
  `Id_Medicamento` int(11) DEFAULT NULL,
  `EsMedicamento` tinyint(1) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Id_Marca` int(11) DEFAULT NULL,
  `UnidadMedida` varchar(50) DEFAULT NULL,
  `CostoDirecto` decimal(15,2) DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL,
  `Existencia` int(11) DEFAULT NULL,
  `PuntoReorden` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Id_Producto`, `Id_Medicamento`, `EsMedicamento`, `Nombre`, `Descripcion`, `Id_Marca`, `UnidadMedida`, `CostoDirecto`, `Precio`, `Existencia`, `PuntoReorden`) VALUES
(2, 1, 1, ' Aspirina', 'Caja de Aspirinas de 100 mg de 30 pastillas', 2, '100', 100.00, 130.00, 5, 0),
(5, 0, 0, 'Cotonetes', 'Cotonetes 300 piezas', 5, '300', 60.00, 80.00, 5, 1),
(7, 0, 0, 'Biberon', 'Biberon 30ml', 5, '1', 50.00, 70.00, 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE `receta` (
  `Id_Receta` int(11) NOT NULL,
  `Id_Consulta` int(11) DEFAULT NULL,
  `Indicaciones` varchar(500) DEFAULT NULL,
  `Fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id_Usuario` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Password` varchar(13) NOT NULL,
  `Rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_Usuario`, `Nombre`, `Password`, `Rol`) VALUES
(1, 'Marita', 'mC.d3098', 1),
(3, 'Juan', '12345', 2),
(4, 'Pedro', '56789', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Id_Cliente`),
  ADD KEY `Id_Paciente` (`Id_Paciente`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`Id_Consulta`),
  ADD KEY `Id_Paciente` (`Id_Paciente`),
  ADD KEY `Id_Doctor` (`Id_Doctor`);

--
-- Indices de la tabla `consultadetalle`
--
ALTER TABLE `consultadetalle`
  ADD PRIMARY KEY (`Id_Detalle`),
  ADD KEY `Id_Consulta` (`Id_Consulta`),
  ADD KEY `Id_Producto` (`Id_Producto`);

--
-- Indices de la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`Id_Doctor`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`Id_Historia`),
  ADD KEY `Id_Paciente` (`Id_Paciente`);

--
-- Indices de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD PRIMARY KEY (`Id_Laboratorio`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`Id_Marca`);

--
-- Indices de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  ADD PRIMARY KEY (`Id_Medicamento`),
  ADD KEY `Id_Laboratorio` (`Id_Laboratorio`);

--
-- Indices de la tabla `ordendetalle`
--
ALTER TABLE `ordendetalle`
  ADD PRIMARY KEY (`Id_ODetalle`),
  ADD KEY `Id_Orden` (`Id_Orden`),
  ADD KEY `Id_Producto` (`Id_Producto`);

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`Id_Orden`),
  ADD KEY `Id_Cliente` (`Id_Cliente`),
  ADD KEY `Id_Consulta` (`Id_Consulta`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`Id_Paciente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Id_Producto`),
  ADD KEY `Id_Medicamento` (`Id_Medicamento`),
  ADD KEY `Id_Marca` (`Id_Marca`);

--
-- Indices de la tabla `receta`
--
ALTER TABLE `receta`
  ADD PRIMARY KEY (`Id_Receta`),
  ADD KEY `Id_Consulta` (`Id_Consulta`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `Id_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `Id_Consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `consultadetalle`
--
ALTER TABLE `consultadetalle`
  MODIFY `Id_Detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `Id_Doctor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `Id_Historia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `Id_Laboratorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `Id_Marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  MODIFY `Id_Medicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ordendetalle`
--
ALTER TABLE `ordendetalle`
  MODIFY `Id_ODetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `Id_Orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `Id_Paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `Id_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `receta`
--
ALTER TABLE `receta`
  MODIFY `Id_Receta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`Id_Paciente`) REFERENCES `paciente` (`Id_Paciente`);

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`Id_Paciente`) REFERENCES `paciente` (`Id_Paciente`),
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`Id_Doctor`) REFERENCES `doctores` (`Id_Doctor`);

--
-- Filtros para la tabla `consultadetalle`
--
ALTER TABLE `consultadetalle`
  ADD CONSTRAINT `consultadetalle_ibfk_1` FOREIGN KEY (`Id_Consulta`) REFERENCES `consulta` (`Id_Consulta`),
  ADD CONSTRAINT `consultadetalle_ibfk_2` FOREIGN KEY (`Id_Producto`) REFERENCES `productos` (`Id_Producto`);

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`Id_Paciente`) REFERENCES `paciente` (`Id_Paciente`);

--
-- Filtros para la tabla `medicamento`
--
ALTER TABLE `medicamento`
  ADD CONSTRAINT `medicamento_ibfk_1` FOREIGN KEY (`Id_Laboratorio`) REFERENCES `laboratorio` (`Id_Laboratorio`);

--
-- Filtros para la tabla `ordendetalle`
--
ALTER TABLE `ordendetalle`
  ADD CONSTRAINT `ordendetalle_ibfk_1` FOREIGN KEY (`Id_Orden`) REFERENCES `ordenes` (`Id_Orden`),
  ADD CONSTRAINT `ordendetalle_ibfk_2` FOREIGN KEY (`Id_Producto`) REFERENCES `productos` (`Id_Producto`);

--
-- Filtros para la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD CONSTRAINT `ordenes_ibfk_1` FOREIGN KEY (`Id_Cliente`) REFERENCES `cliente` (`Id_Cliente`),
  ADD CONSTRAINT `ordenes_ibfk_2` FOREIGN KEY (`Id_Consulta`) REFERENCES `consulta` (`Id_Consulta`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`Id_Medicamento`) REFERENCES `medicamento` (`Id_Medicamento`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`Id_Marca`) REFERENCES `marca` (`Id_Marca`);

--
-- Filtros para la tabla `receta`
--
ALTER TABLE `receta`
  ADD CONSTRAINT `receta_ibfk_1` FOREIGN KEY (`Id_Consulta`) REFERENCES `consulta` (`Id_Consulta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
