-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2023 a las 16:38:03
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
-- Base de datos: `university_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `ID_Alumno` int(11) NOT NULL,
  `ID_Usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`ID_Alumno`, `ID_Usuario`) VALUES
(1, 4),
(2, 5),
(3, 7),
(4, 8),
(5, 9),
(6, 11),
(7, 12),
(8, 13),
(9, 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `ID_Clase` int(11) NOT NULL,
  `NombreClase` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`ID_Clase`, `NombreClase`) VALUES
(1, 'quimica'),
(2, 'fisica'),
(3, 'informatica'),
(4, 'arte'),
(5, 'inactivo'),
(6, 'matematicas'),
(8, 'finanzas'),
(9, 'historia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `ID_Inscripcion` int(11) NOT NULL,
  `ID_Alumno` int(11) DEFAULT NULL,
  `ID_Clase` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`ID_Inscripcion`, `ID_Alumno`, `ID_Clase`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 2),
(6, 1, 2),
(7, 2, 2),
(8, 3, 2),
(9, 4, 3),
(10, 5, 3),
(11, 1, 3),
(12, 2, 4),
(13, 3, 4),
(14, 4, 5),
(15, 5, 5),
(16, 1, 5),
(19, 6, 1),
(20, 8, 4),
(21, 8, 5),
(23, 7, 4),
(24, 7, 5),
(28, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `ID_Maestro` int(11) NOT NULL,
  `ID_Usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`ID_Maestro`, `ID_Usuario`) VALUES
(1, 2),
(2, 3),
(3, 6),
(7, 21),
(4, 22),
(5, 23),
(6, 25),
(8, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestro_clase`
--

CREATE TABLE `maestro_clase` (
  `ID_Maestro_Clase` int(11) NOT NULL,
  `ID_Maestro` int(11) DEFAULT NULL,
  `ID_Clase` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `maestro_clase`
--

INSERT INTO `maestro_clase` (`ID_Maestro_Clase`, `ID_Maestro`, `ID_Clase`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(8, 7, 8),
(9, 8, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_Usuario` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido` varchar(50) DEFAULT NULL,
  `CorreoElectronico` varchar(100) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Rol` enum('admin','maestro','alumno','inactivo') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_Usuario`, `Nombre`, `Apellido`, `CorreoElectronico`, `Password`, `Rol`) VALUES
(1, 'admin', 'admin', 'admin@admin', '$2y$10$l.VuSNv5fHnt/H5f.AP0O.G1.ockbZS1MtBORsxuVrLFagP1Hl4xG', 'admin'),
(2, 'Maestro', 'Maestro', 'maestro@maestro', '$2y$10$A7Mj4TMp.Todugi8nJ5tLOSW8nzwVBAU59cwpepItvrZGnmMzXSHG', 'maestro'),
(3, 'Harord', 'Carazas', 'harold@carazas', '$2y$10$Cz30m60quJY8g0PQaUx.leYHpl3X9aSOIy18wS5CKq7dKa8evtQce', 'maestro'),
(4, 'Michael', 'Ojeda', 'alumno@alumno', '$2y$10$xAi8QkQ6au0Gitfd7KL2c.a3X6M5jKgyT45DAkNDn92ghSo9WPQUK', 'alumno'),
(5, 'MIchael Javier', 'Ojeda', 'michael@ojeda62', NULL, 'inactivo'),
(6, 'Isaias', 'Zuñiga', 'isaias@zuñiga', NULL, 'maestro'),
(7, 'Jhonathan', 'Murillo', 'jhonatan@murillo', NULL, 'alumno'),
(8, 'Edwar', 'Rejas', 'edwar@rejas', NULL, 'inactivo'),
(9, 'Mario', 'Bonilla', 'mario@bonilla', NULL, 'alumno'),
(11, 'jjj', 'aaa', 'epa', NULL, 'inactivo'),
(12, 'Melanny', 'Esis', 'esis@melanny', NULL, 'alumno'),
(13, 'Javier', 'ojeda', 'javier@ojeda', NULL, 'maestro'),
(15, 'franklin', 'lopez', 'fran@lopez', NULL, 'alumno'),
(16, 'maikely', 'ojeda', 'mai@ojeda', '$2y$10$olALjazdJVByoHyNadAJSuOZczQ6JYWoi3iS4nh5nysUPYCz6EFXO', 'alumno'),
(18, 'thaily', 'urdaneta', 'thai@urdaneta', '$2y$10$ljRy43L7S9K.EUORBN3tXe8qpKX/wm.aZI4VFTTn9/UZY9N.Jp28O', 'alumno'),
(19, 'ana maria', 'mendez', 'ana@mendez', '$2y$10$AIZEq8FhU/szPh9rXxehfu2/jf2MLiY2S.Ep56pj03dAMEAJPde8a', 'alumno'),
(21, 'felipe', 'franco', 'felipe@franco', '$2y$10$tqVGOjLFKRg6lrX3fSISrum0Lp8luVsMfmsTsBq5noKjEWZvshgrS', 'inactivo'),
(22, 'andres', 'fuenmayor', 'andres@fuenmayor', '$2y$10$kggzKOcH7NE0tQU94IUAduv8vIn89UWvjrgELbk5PgMo6TiqIY9pO', 'maestro'),
(23, 'ricardo', 'medina', 'ricardo@medina', '$2y$10$Wu/H5z3gagx6zjCfe1RODudsVWtN8ep/tJecwd0SXwvuUuQZiPuZi', 'maestro'),
(25, 'alejandra', 'rodriguez', 'alejandra@rodriguez', '$2y$10$dWueozoGMmRJgfoj3yKnIOv3V/6QvnPAAF67AnT2t39fdvxQcVFyG', 'maestro'),
(26, 'arturo', 'jimenez', 'arturo@jimenez', '$2y$10$0TlHeBAgooTzEgpQ.1nqgeaAahifxasPisMrNbvjJrCWRR6WDc4jq', 'maestro'),
(27, 'aleanna', 'carrasquero', 'aleanna@carrasquero', '$2y$10$TXdG7EB7dF7B5Lb7Y8ut6ems9Yo82UmTGwvxbcWHuEWk4oHVH0OZ2', 'alumno');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`ID_Alumno`),
  ADD UNIQUE KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`ID_Clase`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`ID_Inscripcion`),
  ADD KEY `ID_Alumno` (`ID_Alumno`),
  ADD KEY `ID_Clase` (`ID_Clase`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`ID_Maestro`),
  ADD UNIQUE KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indices de la tabla `maestro_clase`
--
ALTER TABLE `maestro_clase`
  ADD PRIMARY KEY (`ID_Maestro_Clase`),
  ADD KEY `ID_Maestro` (`ID_Maestro`),
  ADD KEY `ID_Clase` (`ID_Clase`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_Usuario`),
  ADD UNIQUE KEY `CorreoElectronico` (`CorreoElectronico`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `ID_Alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `ID_Clase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `ID_Inscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `maestros`
--
ALTER TABLE `maestros`
  MODIFY `ID_Maestro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `maestro_clase`
--
ALTER TABLE `maestro_clase`
  MODIFY `ID_Maestro_Clase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuarios` (`ID_Usuario`);

--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `inscripciones_ibfk_1` FOREIGN KEY (`ID_Alumno`) REFERENCES `alumnos` (`ID_Alumno`),
  ADD CONSTRAINT `inscripciones_ibfk_2` FOREIGN KEY (`ID_Clase`) REFERENCES `clases` (`ID_Clase`);

--
-- Filtros para la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD CONSTRAINT `maestros_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuarios` (`ID_Usuario`);

--
-- Filtros para la tabla `maestro_clase`
--
ALTER TABLE `maestro_clase`
  ADD CONSTRAINT `maestro_clase_ibfk_1` FOREIGN KEY (`ID_Maestro`) REFERENCES `maestros` (`ID_Maestro`),
  ADD CONSTRAINT `maestro_clase_ibfk_2` FOREIGN KEY (`ID_Clase`) REFERENCES `clases` (`ID_Clase`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
