-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2022 a las 13:10:03
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
-- Base de datos: `tiendatenis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProd` int(4) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `categoria` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `existencia` int(3) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `nombreImg` varchar(250) NOT NULL,
  `descuento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProd`, `nombre`, `categoria`, `descripcion`, `existencia`, `precio`, `nombreImg`, `descuento`) VALUES
(1, 'Tenis LeFrance', 'casual', 'Tenis casual de color azul con la banderita de Francia por un lado', 15, '799.00', 'casual1.png', 0),
(2, 'Tenis White Chocolate', 'casual', 'Tenis casual de color blanco, todo bonito', 15, '699.00', 'casual2.png', 0),
(3, 'Cafesin', 'casual', 'Tenis casual de color cafe elegante y sobrio', 15, '729.00', 'casual3.png', 0),
(4, 'Casual sport', 'deporte', 'Tenis deportivo de color claro, sencillo y comodo', 15, '999.00', 'deportivo1.png', 0),
(5, 'Passion Tenis', 'deporte', 'Tenis deportivo blanco con un atrevido color rosa', 15, '1029.00', 'deportivo2.png', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nomUsuario` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `bloqueo` varchar(10) DEFAULT NULL,
  `admin` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nomUsuario`, `correo`, `contraseña`, `bloqueo`, `admin`) VALUES
(3, 'ElCheco34', 'se.checo34@gmail.com', '2d092b986e167b5b86f3098c9b75879d', 'no', 'si'),
(4, 'Pikafresa', 'wastermole411@gmail.com', 'b8f78c9547701c3ab0d6d809cb05252a', 'no', 'no');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProd`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProd` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
