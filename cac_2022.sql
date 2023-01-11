-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2023 at 08:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cac_2022`
--

-- --------------------------------------------------------

--
-- Table structure for table `orador`
--

CREATE TABLE `orador` (
  `ID` tinyint(4) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `email` varchar(40) NOT NULL,
  `orador_usr` varchar(25) NOT NULL,
  `orador_pwd` varchar(16) NOT NULL,
  `temario` longtext NOT NULL,
  `acceso` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usertype` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orador`
--

INSERT INTO `orador` (`ID`, `nombre`, `email`, `orador_usr`, `orador_pwd`, `temario`, `acceso`, `usertype`) VALUES
(1, 'Steve Wozniak', 'woz@apple.com', '', '', 'iOS de la cochera al  Apple park en Cupertino. \r\nblablabla blablabla \r\nblablabla blablabla \r\nblablabla blablabla \r\nblablabla blablabla ', '2023-01-11 02:20:01', NULL),
(2, 'Ada LOVELACE ', 'ada@lovelace.com', '', '', 'Inteligencia artificial \r\nAnalytical engine', '2023-01-11 17:22:03', NULL),
(3, 'Lola Mora', 'lola@mora.com', '', '', 'Arte y escultura\r\n\r\nTécnicas de cincelado en mármol, anatomía y estructura de la figura humana\r\nOrganización de la obra\r\nCálculo de tiempos\r\nMantenimiento de las obras', '2023-01-11 15:26:56', NULL),
(37, 'Marcos MUNDSTOCK', 'marcos@leslu.com', '', '', 'VIDA Y OBRA DE JOHANN SEBASTIAN MASTROPIERO\r\n\r\nEl célebre compositor Johann Sebastian Mastropiero, es particularmente recordado por su ópera prima, escrito íntegramente en latín, cuyo leit motiv es: \r\n\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"\r\n\r\nNi él sabe qué significa, pero quedaba haaarrrrrmosssoo', '2023-01-11 17:21:36', NULL),
(39, 'Orador prueba', 'orador@ba.com', '', '', '', '2023-01-11 19:02:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pwd` varchar(16) NOT NULL,
  `username` varchar(25) NOT NULL,
  `access_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_type` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`ID`, `apellido`, `nombre`, `email`, `pwd`, `username`, `access_time`, `user_type`) VALUES
(1, 'BOWMAN', 'David', 'hal@2001.com', '2001', 'HAL', '2023-01-10 21:07:52', 1),
(2, 'RAKIC', 'Alexa', 'alexa@mymail.com', 'Mipass54321', 'Alexa_2k', '2022-12-29 23:42:14', 0),
(3, 'BAADER', 'Gonza', 'ponsha@baader.com', 'CocoRallado', 'Ponsha', '2023-01-09 03:30:57', 0),
(4, 'JOBS', 'Steven', 'steve@apple.com', 'MyiPhone', 'SteveJobs', '2022-12-31 01:18:35', 0),
(5, 'RODRIGUEZ ', 'Orlando', 'orlando@mymail.com', 'VamosGlobo', 'Mostro', '2022-12-30 00:13:46', 0),
(6, 'BAADER', 'Solcito', 'sol@myemail.com', 'Solcitus', 'Princess', '2023-01-09 03:29:29', 0),
(203, 'PATINO', 'Roberto', 'bob@patino.com', '654321', 'BobPatino', '2023-01-11 02:31:54', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orador`
--
ALTER TABLE `orador`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orador`
--
ALTER TABLE `orador`
  MODIFY `ID` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
