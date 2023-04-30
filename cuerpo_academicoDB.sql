-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-04-2023 a las 22:57:15
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cuerpo_academico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id_articulos` int(11) NOT NULL,
  `nombre` varchar(70) DEFAULT NULL,
  `fecha_publicacion` date DEFAULT NULL,
  `categoria` varchar(30) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `url_descarga` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `issn` varchar(50) DEFAULT NULL,
  `fuente_publicacion` varchar(100) DEFAULT NULL,
  `indizado` tinyint(1) DEFAULT NULL,
  `arbitrado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_articulos`, `nombre`, `fecha_publicacion`, `categoria`, `descripcion`, `url_descarga`, `imagen`, `issn`, `fuente_publicacion`, `indizado`, `arbitrado`) VALUES
(9, 'An Overview of Task Scheduling on Arduino', '2017-10-02', 'Computacion', 'The Arduino family of microcontrollers is widely used today. However, few projects address the issue of scheduling tasks in these microcontrollers. This document presents the methods of scheduling tasks on these platforms.', '', '', '23501022', 'International Journal of Recent Research in Mathematics Computer Science and Information Technology', 0, 1),
(11, 'Articulo', '2023-02-28', 'Prueba', 'de articulo', 'II- ComandosBD_Class.pdf', 'Riti.png', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos_autores`
--

CREATE TABLE `articulos_autores` (
  `id_articulos_autores` int(11) NOT NULL,
  `id_articulo` int(11) DEFAULT NULL,
  `id_autor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulos_autores`
--

INSERT INTO `articulos_autores` (`id_articulos_autores`, `id_articulo`, `id_autor`) VALUES
(11, 9, 1),
(12, 9, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `id_autor` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `imagen_autor` varchar(250) NOT NULL,
  `miembro` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`id_autor`, `nombre`, `apellido`, `descripcion`, `imagen_autor`, `miembro`) VALUES
(1, 'Ricardo Fernando', 'Rosales Cisneros', 'A Mich le encanta afrontar desafíos. La dilatada experiencia que Mich atesora como director comercial en la industria del software ha posibilitado que la empresa goce de la posición que ostenta actual', '', 'Si'),
(2, 'Nora del Carmen', 'Osuna Millan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', '', 'Si'),
(3, 'Juan Antonio', 'Meza Fregoso', 'informacion', '', 'Si'),
(7, 'Manuel', 'Castañon Puga', 'l', '', 'No'),
(8, 'Felipe', 'Lara Rosano', '', '', 'No'),
(9, 'Donald', 'Rodriguez', '', '', 'No'),
(10, 'Margarita', 'Ramirez Ramirez', '', '', 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `lugar` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen_evento` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_evento`, `nombre`, `fecha_inicio`, `fecha_final`, `lugar`, `descripcion`, `imagen_evento`) VALUES
(5, '5to Coloquio Estatal del programa MGTIC', '2020-05-27', '2020-05-28', 'Videoconferencia', 'La maestría en gestión de Tecnologías de la información y la Comunicación (MGTIC) presentan un espacio para el conocimiento y difusión de los Proyectos Terminales de los estudiantes del programa. La MGTIC los invita a las exposiciones y a la...', 'evento 5to coloquio.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos_autores`
--

CREATE TABLE `eventos_autores` (
  `id_eventos_autores` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eventos_autores`
--

INSERT INTO `eventos_autores` (`id_eventos_autores`, `id_autor`, `id_evento`) VALUES
(9, 1, 5),
(10, 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `investigaciones`
--

CREATE TABLE `investigaciones` (
  `id_investigacion` int(11) NOT NULL,
  `clave` int(11) DEFAULT NULL,
  `titulo` varchar(70) DEFAULT NULL,
  `periodo_inicio` int(11) NOT NULL,
  `anio_inicio` year(4) NOT NULL,
  `periodo_fin` int(11) NOT NULL,
  `anio_fin` year(4) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `url_descarga` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `investigaciones`
--

INSERT INTO `investigaciones` (`id_investigacion`, `clave`, `titulo`, `periodo_inicio`, `anio_inicio`, `periodo_fin`, `anio_fin`, `descripcion`, `url_descarga`) VALUES
(5, 0, 'SIMULADOR DE PROCESOS DE GESTIÓN DE LA INNOVACIÓN COMO BASE DE CONOCIM', 2, 2016, 2, 2016, 'El presente tiene como propósito contar con una guía clara y específica que garantice la óptima operación y desarrollo de las diferentes actividades del Simulador de procesos de gestión de la innovación como base de conocimiento para la educación e investigación l Es importante señalar, que este documento está sujeto a actualización en la medida que se vayan realizando distintas versiones del software.', ''),
(6, NULL, 'Prueba', 0, 0000, 0, 0000, 'Funcione', 'SQL Condiciones.pdf'),
(7, NULL, 'Ley', 0, 0000, 0, 0000, 'Información', 'LIEG_abro.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `investigaciones_autores`
--

CREATE TABLE `investigaciones_autores` (
  `id_investigaciones_autores` int(11) NOT NULL,
  `id_investigacion` int(11) DEFAULT NULL,
  `id_autor` int(11) DEFAULT NULL,
  `asociado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `investigaciones_autores`
--

INSERT INTO `investigaciones_autores` (`id_investigaciones_autores`, `id_investigacion`, `id_autor`, `asociado`) VALUES
(8, 5, 1, 0),
(9, 5, 3, 1),
(10, 5, 7, 1),
(11, 5, 10, 1),
(12, 5, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libros` int(11) NOT NULL,
  `titulo` varchar(70) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `categoria` varchar(30) DEFAULT NULL,
  `fecha_publicacion` date NOT NULL,
  `url_descarga` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `isbn` varchar(50) NOT NULL,
  `editorial` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libros`, `titulo`, `descripcion`, `categoria`, `fecha_publicacion`, `url_descarga`, `imagen`, `isbn`, `editorial`) VALUES
(18, 'Modelo de Interacción basado en Agentes BDI con Percepciones Difusas', 'El modelo de interacción hace uso de agentes con percepciones difusas que tratan la incertidumbre y la imprecisión emergente, con el fin de aprender el comportamiento de las personas y controlar el ambiente pervasivo adecuándolo a las preferencias de las mismas, así mismo el modelo permite tener una interacción más eficiente minimizando errores, incrementando la satisfacción, disminuyendo la frustración y en definitiva, hace más productivas las tareas que rodean a las personas.', 'Informatica', '2017-09-19', 'Modelo-de-Interacción.pdf', 'Modelo de Interaccion.jpg', '9786202240550', 'Editorial Académica Española'),
(20, 'Libro', 'Prueba', 'para que funcione', '2023-04-03', 'LIEG_abro.pdf', 'Innovation In Medicine and Healthcare 2017.jpg', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros_autores`
--

CREATE TABLE `libros_autores` (
  `id_libros_autores` int(11) NOT NULL,
  `id_libro` int(11) DEFAULT NULL,
  `id_autor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros_autores`
--

INSERT INTO `libros_autores` (`id_libros_autores`, `id_libro`, `id_autor`) VALUES
(42, 18, 1),
(43, 18, 7),
(44, 18, 8);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id_articulos`);

--
-- Indices de la tabla `articulos_autores`
--
ALTER TABLE `articulos_autores`
  ADD PRIMARY KEY (`id_articulos_autores`),
  ADD KEY `id_articulo` (`id_articulo`),
  ADD KEY `id_autor` (`id_autor`);

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indices de la tabla `eventos_autores`
--
ALTER TABLE `eventos_autores`
  ADD PRIMARY KEY (`id_eventos_autores`),
  ADD KEY `id_autor` (`id_autor`),
  ADD KEY `id_evento` (`id_evento`);

--
-- Indices de la tabla `investigaciones`
--
ALTER TABLE `investigaciones`
  ADD PRIMARY KEY (`id_investigacion`);

--
-- Indices de la tabla `investigaciones_autores`
--
ALTER TABLE `investigaciones_autores`
  ADD PRIMARY KEY (`id_investigaciones_autores`),
  ADD KEY `id_investigacion` (`id_investigacion`),
  ADD KEY `id_autor` (`id_autor`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libros`);

--
-- Indices de la tabla `libros_autores`
--
ALTER TABLE `libros_autores`
  ADD PRIMARY KEY (`id_libros_autores`),
  ADD KEY `id_libro` (`id_libro`),
  ADD KEY `id_autor` (`id_autor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id_articulos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `articulos_autores`
--
ALTER TABLE `articulos_autores`
  MODIFY `id_articulos_autores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `eventos_autores`
--
ALTER TABLE `eventos_autores`
  MODIFY `id_eventos_autores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `investigaciones`
--
ALTER TABLE `investigaciones`
  MODIFY `id_investigacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `investigaciones_autores`
--
ALTER TABLE `investigaciones_autores`
  MODIFY `id_investigaciones_autores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `libros_autores`
--
ALTER TABLE `libros_autores`
  MODIFY `id_libros_autores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos_autores`
--
ALTER TABLE `articulos_autores`
  ADD CONSTRAINT `articulos_autores_ibfk_1` FOREIGN KEY (`id_articulo`) REFERENCES `articulos` (`id_articulos`),
  ADD CONSTRAINT `articulos_autores_ibfk_2` FOREIGN KEY (`id_autor`) REFERENCES `autores` (`id_autor`);

--
-- Filtros para la tabla `eventos_autores`
--
ALTER TABLE `eventos_autores`
  ADD CONSTRAINT `eventos_autores_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `autores` (`id_autor`),
  ADD CONSTRAINT `eventos_autores_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`);

--
-- Filtros para la tabla `investigaciones_autores`
--
ALTER TABLE `investigaciones_autores`
  ADD CONSTRAINT `investigaciones_autores_ibfk_1` FOREIGN KEY (`id_investigacion`) REFERENCES `investigaciones` (`id_investigacion`),
  ADD CONSTRAINT `investigaciones_autores_ibfk_2` FOREIGN KEY (`id_autor`) REFERENCES `autores` (`id_autor`);

--
-- Filtros para la tabla `libros_autores`
--
ALTER TABLE `libros_autores`
  ADD CONSTRAINT `libros_autores_ibfk_1` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id_libros`),
  ADD CONSTRAINT `libros_autores_ibfk_2` FOREIGN KEY (`id_autor`) REFERENCES `autores` (`id_autor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
