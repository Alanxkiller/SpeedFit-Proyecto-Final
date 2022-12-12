-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2022 a las 08:05:08
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
-- Estructura de tabla para la tabla `envio`
--

CREATE TABLE `envio` (
  `nombreC` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ciudad` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pais` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cp` int(5) DEFAULT NULL,
  `tel` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(5, 'Passion Tenis', 'deporte', 'Tenis deportivo blanco con un atrevido color rosa', 15, '1029.00', 'deportivo2.png', 0),
(6, 'Elegance Brown', 'casual', 'Tenis elegantes y cafes, tambien bonitos', 15, '709.00', 'casual4.png', 0),
(7, 'Red Flag', 'casual', 'Tenis rojos para que todos sean capaces de ver que eres un red flag', 15, '899.00', 'casual6.png', 0),
(8, 'Black Matters', 'deporte', 'Tenis bien bonitos de marca Puma', 15, '1299.00', 'deportivo3.png', 0),
(9, 'Pink Bubble', 'deporte', 'Tenis rositas bien cute y frescos. Perfectos para whitexicans', 15, '999.00', 'deportivo4.png', 0),
(10, 'So So', 'deporte', 'Tenis modernos color blanco con un acabado industrial y lujoso', 15, '1099.00', 'deportivo5.png', 0),
(11, 'Dark Passion', 'deporte', 'Tenis oscuros con acabado moderno. Perfecto para cualquier deporte', 15, '1129.00', 'deportivo6.png', 0),
(12, 'Modern Caqui', 'casual', 'Tenis color caqui. Cómodos y con un toque clásico', 15, '699.00', 'casual5.png', 0);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `mes` varchar(20) DEFAULT NULL,
  `ventas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`mes`, `ventas`) VALUES
('enero', 12),
('febrero', 3),
('marzo', 6),
('abril', 1),
('mayo', 3),
('junio', 32),
('julio', 22),
('agosto', 51),
('septiembre', 21),
('octubre', 43),
('noviembre', 0),
('diciembre', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `envio`
--
ALTER TABLE `envio`
  ADD PRIMARY KEY (`nombreC`);

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
  MODIFY `idProd` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
