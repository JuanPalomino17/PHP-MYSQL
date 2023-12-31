-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2023 a las 02:23:17
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `work_centers`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `names` varchar(255) NOT NULL,
  `work_center_id` int(11) NOT NULL,
  `entry_date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `names`, `work_center_id`, `entry_date`) VALUES
(1, 'Juan Palomino ', 1, '2023-07-11'),
(4, 'Laura Camila Polo', 2, '2023-07-12'),
(5, 'Jesus Vallejo', 3, '2023-07-13'),
(17, 'luis manuel', 5, '2023-07-08'),
(18, 'camilo s', 3, '2023-07-20'),
(20, 'lorena', 3, '2023-07-21'),
(23, 'paola', 3, '2023-07-28'),
(24, 'leo ramos', 5, '2023-07-29'),
(25, 'Carlo Torres', 5, '2023-07-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `work_centers`
--

CREATE TABLE `work_centers` (
  `id` int(11) NOT NULL,
  `name_work` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `work_centers`
--

INSERT INTO `work_centers` (`id`, `name_work`) VALUES
(1, 'Centro de trabajo A'),
(2, 'Centro de Trabajo B'),
(3, 'Centro de Trabajo C'),
(4, 'Centro de Trabajo D'),
(5, 'Centro de Trabajo E'),
(6, 'Centro de Trabajo F');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_center_id` (`work_center_id`);

--
-- Indices de la tabla `work_centers`
--
ALTER TABLE `work_centers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `work_centers`
--
ALTER TABLE `work_centers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`work_center_id`) REFERENCES `work_centers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
