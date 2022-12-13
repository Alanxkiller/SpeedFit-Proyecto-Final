-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 09:12 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiendatenis`
--

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `idProd` int(3) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `categoria` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `existencia` int(3) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `nombreImg` varchar(250) NOT NULL,
  `descuento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`idProd`, `nombre`, `categoria`, `descripcion`, `existencia`, `precio`, `nombreImg`, `descuento`) VALUES
(1, 'Tenis Azul-Marin casual', 'casual', 'Tenis para todo tipo de eventos', 5, '1859.00', 'images/casual1.png', 0),
(2, 'White casual', 'casual', 'Tenis color cafe casuales para eventos', 6, '3299.00', 'images/casual2.png', 0),
(3, 'X33-brown england', 'casual', 'Tenis elegantes importados de inglaterra', 3, '5999.00', 'images/casual3.png', 0),
(4, 'Tenis hamilton fibra', 'casual', 'Tenis hamilton ultima generacion', 11, '1999.00', 'images/casual4.png', 0),
(5, 'Tenis heartAttack-99', 'casual', 'Los tenis mas comodos en la marca heartAttack, para todo tipo de evento', 12, '2130.00', 'images/casual5.png', 0),
(6, 'Tenis casual/red', 'casual', 'Tenis moda 99 de color rojo', 15, '3900.00', 'images/casual6.png', 0),
(7, 'UA Assert Under Armour', 'deporte', 'Tenis para gimnasio', 13, '1250.00', 'images/deportivo1.png', 0),
(8, 'UA Assert 2 Under Armour', 'deporte', 'Tenis para todo tipo de ejercicio', 3, '2150.00', 'images/deportivo2.png', 0),
(9, 'Puma ak47', 'deporte', 'Tenis para maratones', 8, '2550.00', 'images/deportivo3.png', 0),
(10, 'Puma Runner-84', 'deporte', 'Tenis multi-deporte', 12, '1610.00', 'images/deportivo4.png', 0),
(11, 'Nike x-413', 'deporte', 'Tenis para correr', 14, '999.00', 'images/deportivo5.png', 0),
(12, 'Tenis deportivo Nike', 'deporte', 'Tenis para caminar', 19, '2799.00', 'images/deportivo6.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProd`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `idProd` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
