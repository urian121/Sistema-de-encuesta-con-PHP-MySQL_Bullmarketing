-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 15-06-2022 a las 06:51:08
-- Versión del servidor: 5.7.37-cll-lve
-- Versión de PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bull_encuesta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `people_surveyed_id` int(11) DEFAULT NULL,
  `myquestion_id` int(11) DEFAULT NULL,
  `resp` int(20) DEFAULT NULL,
  `fecha` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `answer`
--

INSERT INTO `answer` (`id`, `people_surveyed_id`, `myquestion_id`, `resp`, `fecha`) VALUES
(46, 14, 1, 5, '2022-06-13 11:50:AM'),
(47, 14, 2, 1, '2022-06-13 11:50:AM'),
(48, 14, 3, 5, '2022-06-13 11:50:AM'),
(49, 15, 1, 1, '2022-06-13 11:50:AM'),
(50, 15, 2, 4, '2022-06-13 11:50:AM'),
(51, 15, 3, 2, '2022-06-13 11:50:AM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_user`
--

CREATE TABLE `login_user` (
  `id` int(10) NOT NULL,
  `fullName` varchar(250) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `login_user`
--

INSERT INTO `login_user` (`id`, `fullName`, `email`, `password`) VALUES
(16, 'Alejandro Rodriguez', 'alejandro_torres@gmail.com', '$2y$10$9UHa4wvs93CUEuZHS7b.muqwVFj2clyjpjpukJ6hVRJyeI5RTGNTm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `myquestions`
--

CREATE TABLE `myquestions` (
  `id` int(11) NOT NULL,
  `questions` varchar(250) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `myquestions`
--

INSERT INTO `myquestions` (`id`, `questions`) VALUES
(1, 'Que tal ha sido tu experiencia con Bullmarketing?'),
(2, 'Recomendarías a Bullmarketing a tus amigos?'),
(3, 'Volverías a trabajar con Bullmarketing?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `people_surveyed`
--

CREATE TABLE `people_surveyed` (
  `id` int(11) NOT NULL,
  `name_people` varchar(250) CHARACTER SET utf8 NOT NULL,
  `saludo` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `people_surveyed`
--

INSERT INTO `people_surveyed` (`id`, `name_people`, `saludo`) VALUES
(14, 'Urian', 'Hola, Urian un gustos en saludarte, oye para nuestro equipo de Bullmarketing es importante tu opinión, por lo que nos gustaría que llenarás esta pequeña encuesta.'),
(15, 'Ana', 'Hola, Ana un gustos en saludarte, oye para nuestro equipo de Bullmarketing es importante tu opinión, por lo que nos gustaría que llenarás esta pequeña encuesta.'),
(16, 'JEANS', 'Hola, JEANS un gustos en saludarte, oye para nuestro equipo de Bullmarketing es importante tu opinión, por lo que nos gustaría que llenarás esta pequeña encuesta.'),
(20, 'Neffer', 'Hola, Neffer un gustos en saludarte, oye para nuestro equipo de Bullmarketing es importante tu opinión, por lo que nos gustaría que llenarás esta pequeña encuesta.'),
(33, 'Jose', 'Hola, Jose un gustos en saludarte, oye para nuestro equipo de Bullmarketing es importante tu opiniÃ³n, por lo que nos gustarÃ­a que llenarÃ¡s esta pequeÃ±a encuesta.'),
(34, 'Julian', 'Hola, JuliÃ¡n un gustos en saludarte, oye para nuestro equipo de Bullmarketing es importante tu opiniÃ³n, por lo que nos gustarÃ­a que llenarÃ¡s esta pequeÃ±a encuesta.'),
(35, 'Tatiana', 'Hola, Tatiana un gustos en saludarte, oye para nuestro equipo de Bullmarketing es importante tu opiniÃ³n, por lo que nos gustarÃ­a que llenarÃ¡s esta pequeÃ±a encuesta.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `myquestions`
--
ALTER TABLE `myquestions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `people_surveyed`
--
ALTER TABLE `people_surveyed`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `login_user`
--
ALTER TABLE `login_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `myquestions`
--
ALTER TABLE `myquestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `people_surveyed`
--
ALTER TABLE `people_surveyed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
