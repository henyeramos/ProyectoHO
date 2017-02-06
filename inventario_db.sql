-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2017 a las 03:20:19
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario_db`
--
CREATE DATABASE `inventario_db`;
USE `inventario_db`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `per_cedula` int(10) NOT NULL,
  `per_nombre` varchar(40) NOT NULL,
  `per_apellido` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`per_cedula`, `per_nombre`, `per_apellido`) VALUES
(2563752, 'Genesis', 'Chacon'),
(20144991, 'Henyerbeth', 'Ramos'),
(20658741, 'Alfonso', 'Ramirez'),
(20874145, 'Pedro', 'Martinez'),
(23478514, 'Pepito', 'Fernandez'),
(23741529, 'Lucas', 'Torres'),
(24541236, 'Angel', 'Patreon'),
(25471369, 'Alberto', 'Peñaranda'),
(25658412, 'Lucas', 'Perez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(8) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `isAdmin` int(4) DEFAULT NULL,
  `user_cedula` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `isAdmin`, `user_cedula`) VALUES
(3, 'xUnbroken', '$2y$10$zw1HhQBTVv32y83RpTuPUOiltsbja/pnI2di9Tx55pbPdLN69Ia0K', 1, 20144991),
(4, 'GenesisChacon', '123456', 0, 2563752),
(7, 'xUnbrokenDz', '$2y$10$zw1HhQBTVv32y83RpTuPUOiltsbja/pnI2di9Tx55pbPdLN69Ia0K', 0, 20658741),
(9, 'Alberto', '$2y$10$0bL0iS/hfRLJn5fRfDlF9Oy5tzE0naevEGTcYPwunbPdLUOMnnSd2', 0, 25471369);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`per_cedula`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `per_cedula` (`user_cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_perUser_01` FOREIGN KEY (`user_cedula`) REFERENCES `persona` (`per_cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
