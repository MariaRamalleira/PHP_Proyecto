-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2021 a las 12:46:37
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `MessageId` int(10) NOT NULL,
  `FromUserId` int(10) NOT NULL,
  `ToUserId` int(10) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Text` varchar(1000) NOT NULL,
  `Timestamp` datetime NOT NULL,
  `IsRead` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`MessageId`, `FromUserId`, `ToUserId`, `Subject`, `Text`, `Timestamp`, `IsRead`) VALUES
(22, 2, 1, 'hiii', 'hi pepeee', '2021-11-25 11:12:24', 1),
(23, 1, 2, 'Re: hiii', 'aaaaaaaa', '2021-11-25 11:13:53', 1),
(24, 2, 1, 'hi pepe', 'hi pepeeee', '2021-11-25 11:16:38', 1),
(25, 1, 2, 'Re: hi pepe', 'good and you?', '2021-11-25 11:17:16', 1),
(26, 2, 1, 'hi', 'hi pepe how are you', '2021-11-25 11:28:17', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `userId` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`userId`, `email`, `password`) VALUES
(1, 'pepe@gmail.com', '$2y$10$aNY9QL8s30VfPScy5yr5U.b48bWJG67WKr0aJu/Pm4p8YrlH477Qm'),
(2, 'maria@gmail.com', '$2y$10$/xPTAy1RVkxt.PyvbukKYOTGzdnbVZV0mFp94FohZlRHciCY8mVdC'),
(4, 'admin@gmail.com', '$2y$10$EiwYySwR7TgOMA58wvtikuUqaIAwhwFXgE.jgUTXLehrvQSMd1oBW'),
(5, 'juan@gmail.com', '$2y$10$XIhjK506sXJRxwHdHy0cUejl6TuNMjIklNSUvnDt/8NHKLefu6eAW');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`MessageId`),
  ADD KEY `FromUserId` (`FromUserId`),
  ADD KEY `ToUserId` (`ToUserId`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `MessageId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`FromUserId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`ToUserId`) REFERENCES `users` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
