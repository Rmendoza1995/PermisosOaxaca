-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 01:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `creapermiso`
--

CREATE TABLE `creapermiso` (
  `id` int(10) NOT NULL,
  `propietario` varchar(50) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `version` varchar(50) DEFAULT NULL,
  `anomodelo` varchar(50) DEFAULT NULL,
  `marca` varchar(30) DEFAULT NULL,
  `numserie` varchar(30) DEFAULT NULL,
  `modelo` varchar(30) DEFAULT NULL,
  `motor` varchar(30) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `ciudad` varchar(30) DEFAULT NULL,
  `vigencia` varchar(12) DEFAULT NULL,
  `Foliopermi` varchar(50) DEFAULT NULL,
  `rfc` varchar(17) NOT NULL,
  `fecha_expedicion` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `creapermiso`
--

INSERT INTO `creapermiso` (`id`, `propietario`, `usuario`, `version`, `anomodelo`, `marca`, `numserie`, `modelo`, `motor`, `color`, `ciudad`, `vigencia`, `Foliopermi`, `rfc`, `fecha_expedicion`) VALUES
(3, 'ALFREDO DE LA ROSA', 'admin', 'GRAND TOURING', '2011', 'chevrolet', '654165465A4S', 'chevy', '53641654615R43', 'GRIS', 'CDMX', '24/13/2027', '0145286', 'MENR10293097631', '24/03/2024'),
(8, 'rocosoDE LA ROSA', 'admin', 'cx7', '2010', 'chevrolet', '654165465A4S', 'monza', '53641654615R43', 'AZUL', 'CDMX', '04/07/2028', '52702175', 'MPR930115NN0', '02/04/2024');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `creapermiso`
--
ALTER TABLE `creapermiso`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `creapermiso`
--
ALTER TABLE `creapermiso`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
