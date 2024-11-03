-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-11-2024 a las 22:36:15
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
-- Base de datos: `carrefinder`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactform`
--

CREATE TABLE `contactform` (
  `id_contact` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(20) NOT NULL,
  `asunto` varchar(60) NOT NULL,
  `mensaje` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contactform`
--

INSERT INTO `contactform` (`id_contact`, `name`, `email`, `asunto`, `mensaje`) VALUES
(1, 'Pepa', 'pepa@pepapig.com', 'asunto de ejemplo', 'esto es un mensaje de ejemplo'),
(2, 'Pepa', 'pepa@pepapig.com', 'asunto de ejemplo', 'esto es un mensaje de ejemplo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `fecha_registro`) VALUES
(1, 'Nemo', 'nemo@nemo.com', '$2y$10$6Yh7CEFwRHag4aHClQQ5Quebs9HUui8JC5FMW6p3NDBD3eMtrAHFy', '2024-11-03 18:51:27'),
(2, 'Nemo Ochoa', 'nemo1@nemo.com', '$2y$10$Xj2SFOjZskN6QvXCOW5VI.BbWvxz3AFI/Zyw2mhOeZLUV/viuGAvq', '2024-11-03 18:58:34'),
(3, 'Daniel', 'daniel@correo.com', '$2y$10$I/Q.0.mrAL33Jz3jj6N9m.tkqhM3CqXoj24a6nCnzNbqPnNsa/j6a', '2024-11-03 21:05:04'),
(4, 'Ana', 'ana@ana.com', '$2y$10$AziRN9jvdYbiTxrUKGB7gecx8fV4O0GlBOLuYymR5ngnOlxo/Ei6q', '2024-11-03 21:06:49'),
(5, 'Ana Maria', 'ana1@ana.com', '$2y$10$K5INkGyLTVS/b7TM3SpgG.LYyl3jisV1bWE/Og.USlFlNSwT.QdfO', '2024-11-03 21:08:12'),
(6, 'pepita', 'pepa@correo.com', '$2y$10$fl1fkYGllpK3xEIcg66RxOYZvc7tMJvNl/WMoeTV4tcWlnD8SVAhG', '2024-11-03 21:10:52');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactform`
--
ALTER TABLE `contactform`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactform`
--
ALTER TABLE `contactform`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
