-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2017 at 05:48 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ug`
--

-- --------------------------------------------------------

--
-- Table structure for table `altaestudios`
--

CREATE TABLE `altaestudios` (
  `IdAltaEstudios` int(11) NOT NULL,
  `FechaEstudio` date NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `archivo` int(11) NOT NULL,
  `IdLaboratorio` int(11) NOT NULL,
  `activo` int(11) NOT NULL,
  `IdTipoEstudio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `altaestudios`
--

INSERT INTO `altaestudios` (`IdAltaEstudios`, `FechaEstudio`, `IdUsuario`, `archivo`, `IdLaboratorio`, `activo`, `IdTipoEstudio`) VALUES
(1, '2017-05-02', 2, 1, 4, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `archivo`
--

CREATE TABLE `archivo` (
  `IdArchivo` int(11) NOT NULL,
  `NombreArchivo` varchar(250) COLLATE utf8_bin NOT NULL,
  `Tamano` varchar(250) COLLATE utf8_bin NOT NULL,
  `web_path` varchar(250) COLLATE utf8_bin NOT NULL,
  `local_path` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `archivo`
--

INSERT INTO `archivo` (`IdArchivo`, `NombreArchivo`, `Tamano`, `web_path`, `local_path`) VALUES
(1, '14.pdf', '128169', '/upload/estudioNumero1.pdf', 'C:/xamppv2/htdocs/upload/estudioNumero1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `laboratorio`
--

CREATE TABLE `laboratorio` (
  `IdLaboratorio` int(11) NOT NULL,
  `NombreLaboratorio` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `laboratorio`
--

INSERT INTO `laboratorio` (`IdLaboratorio`, `NombreLaboratorio`) VALUES
(1, 'Génoma'),
(2, 'Nerv'),
(3, 'Gainax'),
(4, 'Moreira'),
(5, 'Diagnolab'),
(6, 'Umbrella'),
(7, 'Pedregal');

-- --------------------------------------------------------

--
-- Table structure for table `perfil`
--

CREATE TABLE `perfil` (
  `IdPerfil` int(11) NOT NULL,
  `NombrePerfil` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `perfil`
--

INSERT INTO `perfil` (`IdPerfil`, `NombrePerfil`) VALUES
(1, 'Laboratorista'),
(2, 'Médico'),
(3, 'Paciente'),
(4, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tipoestudio`
--

CREATE TABLE `tipoestudio` (
  `IdTipoEstudio` int(11) NOT NULL,
  `NombreEstudio` varchar(250) COLLATE utf8_bin NOT NULL,
  `ClaveEstudio` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tipoestudio`
--

INSERT INTO `tipoestudio` (`IdTipoEstudio`, `NombreEstudio`, `ClaveEstudio`) VALUES
(1, 'Cultivo de tejidos', 'CT'),
(2, 'Sangre periférica', 'SP'),
(3, 'Médula ósea', 'MO'),
(4, 'Líquido amniótico', 'LA'),
(5, 'Biopsia vellosidad corialesCul', 'BVC'),
(6, 'Hibridación in situ  por fluorescencia', 'FISH'),
(7, 'Sangre de cordón umbilical', 'SCU'),
(8, 'Estudio molecular', 'EM'),
(9, 'Duo marcaador', 'DUO'),
(10, 'Cuádruple marcador', 'HAL'),
(11, 'Preeclampsia', 'PE');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL,
  `hash` varchar(32) COLLATE utf8_bin NOT NULL,
  `activo` tinyint(4) NOT NULL,
  `telefono` int(11) NOT NULL,
  `perfil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `nombre`, `apellido`, `email`, `password`, `hash`, `activo`, `telefono`, `perfil`) VALUES
(2, 'Alonso', 'Ramos', 'aramos@keepmoving.com.mx', '12345', 'e1e32e235eee1f970470a3a6658dfdd5', 1, 2147483647, NULL),
(3, 'Irma', 'Nava', 'inava@keepmoving.com.mx', '$2y$10$p1QYpJ6zp3hLOHiU3XOyJebU6hHQaOUxf4gdnLA9qBMkQhNpRBal2', '26408ffa703a72e8ac0117e74ad46f33', 1, 0, 2),
(4, 'Melissa', 'Sanchez', 'msanchez@keepmoving.com.mx', '$2y$10$4QV5Kgocp91AJQ3aWewNpOZ/pBXiu6r8Tg6P9DM.3rhsfz1v.PB/.', 'b4288d9c0ec0a1841b3b3728321e7088', 1, 0, 1),
(5, 'melissa', 'sanchez', 'msahcnez@keepmoving.com.mx', '$2y$10$24nNWC//T59HXd.QhbUri.zVgC36VvOBwL17Jy/CWGxlOhrUQOJ3m', 'cfa0860e83a4c3a763a7e62d825349f7', 0, 0, NULL),
(6, 'brenda', 'karyme', 'brendak@gmail.com', '$2y$10$nMb4c3LfwnZwRXXumiesNOUn8gSzOzWybQNmSf8n1H5OI0W01CjRG', 'c75b6f114c23a4d7ea11331e7c00e73c', 0, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `altaestudios`
--
ALTER TABLE `altaestudios`
  ADD PRIMARY KEY (`IdAltaEstudios`);

--
-- Indexes for table `archivo`
--
ALTER TABLE `archivo`
  ADD PRIMARY KEY (`IdArchivo`);

--
-- Indexes for table `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD PRIMARY KEY (`IdLaboratorio`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`IdPerfil`);

--
-- Indexes for table `tipoestudio`
--
ALTER TABLE `tipoestudio`
  ADD PRIMARY KEY (`IdTipoEstudio`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `altaestudios`
--
ALTER TABLE `altaestudios`
  MODIFY `IdAltaEstudios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `archivo`
--
ALTER TABLE `archivo`
  MODIFY `IdArchivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `IdLaboratorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `perfil`
--
ALTER TABLE `perfil`
  MODIFY `IdPerfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tipoestudio`
--
ALTER TABLE `tipoestudio`
  MODIFY `IdTipoEstudio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
