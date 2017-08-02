-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 11, 2017 at 12:31 PM
-- Server version: 5.5.55-cll
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unidadge_netica`
--

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
  `hash` varchar(255) COLLATE utf8_bin NOT NULL,
  `activo` tinyint(4) NOT NULL,
  `telefono` varchar(50) COLLATE utf8_bin NOT NULL,
  `perfil` int(11) DEFAULT NULL,
  `laboratorio` int(11) NOT NULL,
  `sent` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `nombre`, `apellido`, `email`, `password`, `hash`, `activo`, `telefono`, `perfil`, `laboratorio`, `sent`) VALUES
(1, 'Administrador', 'Unidad genética', 'admin@unidadgenetica.com', '$2y$10$DV8W3S9TjZkia5r5oypw5OcTSMfKTM/PExxmN1ZAdOWyOTdJxeZWW', '13f320e7b5ead1024ac95c3b208610db', 1, '81199933', 4, 0, NULL),
(2, 'Andrea', 'Tortoriello', 'andrea.tortoriello@unidadgenetica.com', '$2y$10$BCuHb1mgUjawKWvqRsTDp.yGuGsWBzwQ1ZF4pbMsYKWfSHRbuwW1S', '22fb0cee7e1f3bde58293de743871417', 1, '81823323', 4, 0, NULL),
(5, 'QFB Verónica', 'Sicarios Copado', 'veronica.sicairos@saludangeles.com', '$2y$10$iRmtAujtPQP3FTicHjSmz.WtLYWyjoBS9K1Myp3luvU96nYYKwtMK', '6855456e2fe46a9d49d3d3af4f57443d', 0, '667 758 7700 Ext. 2117', 1, 16, NULL),
(6, 'María de Jesús Jacqueline', 'Estrada Barajas', 'maria.estrada@saludangeles.com', '$2y$10$tM90g0a66O1/pw/mg5LNzO7vFqeAW2RgaBup0QjV0Akw0trc0cVQS', '00411460f7c92d2124a67ea0f4cb5f85', 0, '667 758 7700 Ext. 2113', 1, 16, NULL),
(8, 'Dra. Nayeli', 'Fragoso Díaz', 'nayelifragoso@hotmail.com', '$2y$10$qyESJBuBTaWZlzEuKYPvaOfoesAq6WkTpEM100GDcVqELCk4cmCRq', '812b4ba287f5ee0bc9d43bbf5bbe87fb', 0, '55 4614 5380', 1, 3, NULL),
(9, 'Q. Irma', 'Cortéz', 'referencia@biomedicos.com.mx', '$2y$10$8N0HdR2xoz/d/cl9tuAZLOtqb7P8IjHKCJmE7KuOPCRnUV5TdNhq.', 'b7bb35b9c6ca2aee2df08cf09d7016c2', 0, '5449 5449 Ext. 7842', 1, 4, NULL),
(10, 'Q. Mario', 'Rendón González', 'mrendon@saludangeles.com', '$2y$10$mmcoXZ7MSlWOb19F1Qcv6OlYODvnZ5RWsjyLztzC9/NNy3FM7MYiG', 'b7ee6f5f9aa5cd17ca1aea43ce848496', 0, '5449 5449 Ext. 7842', 1, 5, NULL),
(11, 'Anai', 'Alonso Gutiérrez', 'laboratoriosmendel@prodigy.net.mx', '$2y$10$3.CCP68VFLpIQlA/k/ElxuiUfs1Ni6vHGMoGkZ1UvKHOtxVDxhgY6', 'f1b6f2857fb6d44dd73c7041e0aa0f19', 0, 'sin especificar', 1, 8, NULL),
(12, 'Dra. Melania', 'Abreu', 'genosmedica@yahoo.com', '$2y$10$Ra7CdXkmdfyWeCyXBxDc7.BC5yO4Q1ssJlazJDjn0IOf9JHIfp4T2', '182be0c5cdcd5072bb1864cdee4d3d6e', 0, '55840521', 1, 9, NULL),
(13, 'Q.F.B. Alma Delia', 'Guerrero Huesca', 'ahuesca@saludangeles.com', '$2y$10$l8e7k7eY5gwcXHdwMdDm.ef/Wmi0kh1VcKOfKHn/eCASwWbZ4Aiai', '3d8e28caf901313a554cebc7d32e67e5', 0, '54495500 ext. 3090', 1, 10, NULL),
(14, 'Q.F.B. Carlos', 'Alonso Muñoz', 'laboratoriosmendel@hotmail.com', '$2y$10$JdZtzRi7AVnF/mr5maheu.t10YVyAmnlIH8j560jXs3v2gp2noST.', '812b4ba287f5ee0bc9d43bbf5bbe87fb', 0, 'sin especificar', 1, 8, NULL),
(15, 'Q. Bani A.', 'Clemente Pascacio', 'referenciahap@saludangeles.com', '$2y$10$qD./nHq/3snutyvOzFRXm.NjuPWc5/7/Wlcve6J.BSGB2V.KARBCW', '303ed4c69846ab36c2904d3ba8573050', 0, '54495500 ext. 3090', 1, 10, NULL),
(16, 'Dra. Clara ', 'Lau', 'rochester@bioderef.com', '$2y$10$G7lY1CeHfLKfJDRTNPcA1.YMT.jwjDGTjMTgOmKFImoqrznGb7d4G', 'aa942ab2bfa6ebda4840e7360ce6e7ef', 0, '41709126', 1, 11, NULL),
(17, 'Ricardo', 'Lara', 'ricardolara@lifeingenomics.com', '$2y$10$2InxMcf7wzuwgN1JHwD6AutIbNVxm3nMTLf5n56ijgSMqpazu8Ca.', 'bd4c9ab730f5513206b999ec0d90d1fb', 0, '5515555000', 1, 12, NULL),
(18, 'Clara', 'Juárez', 'clarajuarez@lifeingenomics.com', '$2y$10$5Z4qknDemt1eUWLFQ139iegicZZocxsgSiscPab1t6yYkUGXWdmHW', '39461a19e9eddfb385ea76b26521ea48', 0, '553555 3271', 1, 12, NULL),
(19, 'Herbert', 'García', 'herbertgarcia@lifeingenomics.com', '$2y$10$O9Kaw5tNWnyiUMF4ply9teyEmXSKEx9wVZYyM9GsSXbr4apPjcXLO', '1f50893f80d6830d62765ffad7721742', 0, '552093 4214', 1, 12, NULL),
(21, 'Dra. Nayeli', 'Fragoso Díaz', 'unidadprenatal@gmail.com', '$2y$10$/Wdkr21BJPxH6jiaIHx2ZeTRqizBrYlMfc..qfgbQHG5GwtRoNOAC', 'e7f8a7fb0b77bcb3b283af5be021448f', 0, '55 4165 2826', 1, 3, NULL),
(22, 'Iván', 'Aguilar Enriquez', 'draguilar18@hotmail.com', '$2y$10$Po0I4UrsRdME0YKrjua1tuLOxQ9d/lKjkuikCPUq7Eepxu3OP.gqC', 'c9892a989183de32e976c6f04e700201', 0, '667 758 7914', 2, 0, NULL),
(23, 'Mario Francisco', 'Barajas Olivas', 'mbarajasolivas@hotmail.com', '$2y$10$fxpqq1i.jLw5PeVFWvMj6O.oHdgvWx6DjkCWdM/EJqpjxoJ2s/JhW', 'd1c38a09acc34845c6be3a127a5aacaf', 0, '044 667 145 0022', 2, 0, NULL),
(24, 'José Francisco', 'Barios Rodriguez', 'barriosfran@hotmail.com', '$2y$10$XiNOtN6xwpoZ4xWRRReeJ.zk.jSwaW0EBNTH8UP1d7aF50JG2pTxC', '17e62166fc8586dfa4d1bc0e1742c08b', 0, '55 5247 5225', 2, 0, NULL),
(25, 'Francisco Javier', 'Borrajo Carbajal', 'fborrajo9194@hotmail.com', '$2y$10$V/Se2Pr4XsJ8cKnEp..MBOoosmXZQVH9Qb9Px1dYD29r35ocYKLeu', '35051070e572e47d2c26c241ab88307f', 0, '55 5516 9662', 2, 0, NULL),
(26, 'Evelio', 'Cabezas García', 'dr.ecabezas@gmail.com', '$2y$10$w5.9NIc6CtZh5G0g8rpRo.PcKOv7wa4EFiybvgdsKuG9Ewlb3Zudq', '6bc24fc1ab650b25b4114e93a98f1eba', 0, '55 5516 9560', 2, 0, NULL),
(27, 'Elia Nohemi', 'Camacho Ojeda', 'noemicamacho69@yahoo.com.mx', '$2y$10$Ek6yXo9JMQDlsxcoNcWMPOpyZL5YLFy8kFnXw/YW1lpqKbj/RWsEy', '2d6cc4b2d139a53512fb8cbb3086ae2e', 0, '55 5246 9557', 2, 0, NULL),
(28, 'Jorge Alberto', 'Campos Castellanos', 'uroangeles500@gmail.com', '$2y$10$1CLK2TNVTTp2SOQHXXt2x.ANfLxAQ83iqfxQHHLL0vi7a3GEYUUdC', 'a1d0c6e83f027327d8461063f4ac58a6', 0, '55 5246 9736', 2, 0, NULL),
(29, 'José Gadu', 'Campos Salcedo', 'jgaducampos@hotmail.com', '$2y$10$ob7yJm1aP2kIwXwdmCh08uQPqntDw76o5aCwjkRmAEyGnM/oc/dBe', '0f28b5d49b3020afeecd95b4009adf4c', 0, '55 5246 7151', 2, 0, NULL),
(30, 'Jorge Arturo', 'Cadrona Pérez', 'neonateac@hotmail.com', '$2y$10$h/zOxYBiCZdAQxtaJdL.w.oZjpugD/pF61WZ495R9YnSEhrnZ9OzW', '72b32a1f754ba1c09b3695e0cb6cde7f', 0, '55 5246 9558', 2, 0, NULL),
(31, 'Germán', 'Carreto Chávez', 'germancarreto@hotmail.com', '$2y$10$p9D5ujZTNtntQhdN1fgMSe5c.WcJz6epxoAAN6Xnxtk42tEO.IEru', 'ac1dd209cbcc5e5d1c6e28598e8cbbe8', 0, '044 55 5408 5996', 2, 0, NULL),
(32, 'Ernesto', 'Castelazo Morales', 'dr.castelazo@gmail.com', '$2y$10$6lSWW6E4Hi61dXB.CujG8.ykRsJwn0Qymw4B5g.rupAW3ks4okJZO', '26dd0dbc6e3f4c8043749885523d6a25', 0, '55 5246 9410', 2, 0, NULL),
(33, 'Jesus', 'Castro Castro', 'castrocj2@hotmail.com', '$2y$10$l5dHEOGt0i/HRZr4xQoPNOCCxvRHXWnTMPnsg5xJWzfEdtfL0gmbu', '67d16d00201083a2b118dd5128dd6f59', 0, '667 758 7950', 2, 0, NULL),
(34, 'Benjamín', 'Cherem Cherem', 'bencherem@yahoo.com', '$2y$10$yG4mpb.3APq2nl2dpcjcfO.OxwO6sWaPhuFjIac25BzT3iqlF4ZXq', 'be83ab3ecd0db773eb2dc1b0a17836a1', 0, '55 5246 9453', 2, 0, NULL),
(35, 'Pedro Juan', 'Cullen Benitez', 'pjuancb@yahoo.com', '$2y$10$lvLYf18eVmkbGk06FlsM.uuI584Z4rk.7gCYjQVOtYkoBfzAh18fO', 'b3967a0e938dc2a6340e258630febd5a', 0, '55 5246 9709', 2, 0, NULL),
(36, 'Luz Graciela', 'De la Luna Pérez', 'gracieladelaluna@hotmail.com', '$2y$10$4p/LlUFG0DpFR/rcjb1yPuMYIYOFAc09LNouSpm2Ip9eozy1Qtnqy', '8757150decbd89b0f5442ca3db4d0e0e', 0, '044 55 5454 1311', 2, 0, NULL),
(39, 'Elsa María', 'Camou Parada', 'camucita1@gmail.com', '$2y$10$c/A.m.eVjgzPohM0NnngbeGOYUfuXmsAkTD1D3tdY1xW8aUSowFt.', '5e388103a391daabe3de1d76a6739ccd', 1, '52469610', 3, 0, NULL),
(40, 'Josue Raul', 'De los Rios Ibarra', 'josuedelosrios@hotmail.com', '$2y$10$IV3eze7pf8R3uIXDtyOJCOqe1fkzDv9BV8ywgihCHHCzxjsgRr0pG', 'ca75910166da03ff9d4655a0338e6b09', 0, '667 758 7944', 2, 0, NULL),
(42, 'Dominguez Sarmiento', 'Erika Ivonne', 'dra_dominguez@hotmail.com', '$2y$10$QZBL6niYDXuWeuODyiwNw.sGHD6JAahMAxbtZfTA5DH7eWpeYEP4u', '85d8ce590ad8981ca2c8286f79f59954', 0, '55 5247 2068', 2, 0, NULL),
(43, 'Jesús Rodolfo', 'Favela Camacho', 'urologiaculiacan@gmail.com.mx', '$2y$10$aADVxM/etlJw5kQjX6WMRuLjSR0HYU4fLN5CIVx6gplXZaKr/z2ae', '819f46e52c25763a55cc642422644317', 0, '6677587948', 2, 0, NULL),
(44, 'Leticia', 'Flores Gallegos', 'letyflo@hotmail.com', '$2y$10$zbKOfYwPe5HpWxA5g0Og2etHkulJAxafRz0m25i5qlMzFA5rVZ9VO', '9fe8593a8a330607d76796b35c64c600', 0, '55 5247 4951', 2, 0, NULL),
(45, 'Rosa María Ángeles', 'Fuente Felices', 'rosifuente@hotmail.com', '$2y$10$lG9E2n.mVKzZTducV6NP/.CTlnpxD9CrU/YeQ8Ot/Ydr/vFFoqrWS', '698d51a19d8a121ce581499d7b701668', 0, '55 5246 9531', 2, 0, NULL),
(46, 'Carlos Yair', 'Garfias Rau', 'yairgarfias@prodigy.net.mx', '$2y$10$HfexhKa5d0N77NRkTymoW.5pSDnWZFMehicgy2XpVp5JcHSvDeJ92', '3b3dbaf68507998acd6a5a5254ab2d76', 0, '55 5752 9394', 2, 0, NULL),
(47, 'Dr. Saúl', 'Garza Morales', 'drsaulgarza@gmail.com', '$2y$10$tmvBgF2xex9b3ILfPpoWputdgEcbf2vTOeFtBG7CNO6YdSDAC3RB2', '443cb001c138b2561a0d90720d6ce111', 1, 'sin especificar', 2, 0, 'si'),
(48, 'Saúl', 'Garza Morales', 'unidaddeneurodesarrollo@gmail.com', '$2y$10$M5GywOJCK4ee0AgEXriMx.cgF1NPCg/n2hE6zRPU8TdjwLYKr0Zri', 'eed5af6add95a9a6f1252739b1ad8c24', 0, 'sin especificar', 2, 0, NULL),
(49, 'Saúl', 'Garza Morales', 'neurodesarrollo@aol.com', '$2y$10$IxcrG0hWSt7FAHWFX1oZheeKylDvUgju6z0wI7MK1RcTBgGn23UOe', 'ef4e3b775c934dada217712d76f3d51f', 0, '55 5246 9515', 2, 0, NULL),
(50, 'Manuel', 'González Gomez', 'manglez2@yahoo.com.mx', '$2y$10$YBY3g/gAFYPwPQ1sHaWPe.JUn.XdYtarxHqSkgWkX93cT/mXCOGU.', '28dd2c7955ce926456240b2ff0100bde', 0, '993 310 0445', 2, 0, NULL),
(51, 'Viridiana', 'Gorbea Chávez', 'gorbeav@yahoo.com', '$2y$10$5N.gU8ErXXLAyD1Lmc9TpeCf9KB.g.0ArVm/hygC/lx0ct8h29uLu', '18d8042386b79e2c279fd162df0205c8', 0, '55 5247 1886', 2, 0, NULL),
(52, 'Eva Cecilia', 'Hernández Contreras', 'evac_hc@hotmail.com', '$2y$10$VmpmM0eQqrdz1/b/eQiiPeI.zGRri6rTTg7oegOps90MVQPJWO0gW', '371bce7dc83817b7893bcdeed13799b5', 0, '044 55 4400 9078', 2, 0, NULL),
(53, 'Rafael', 'Hurtado Monroy', 'rafahurtado@prodigy.net.mx', '$2y$10$o142t.vjMBeJJ4MrymhP9uCKjEa/3zKUQWTxMs4TzP7ysehCcsvVW', 'eb163727917cbba1eea208541a643e74', 0, '55 5652 7785', 2, 0, NULL),
(54, 'Alberto', 'Kably Ambe', 'drkably@gmail.com', '$2y$10$iTiGbLm1pKl9H/G7VOdpX.JV/VUaesRJ0poAT0qJpilVWJFzXQ/jO', 'b73ce398c39f506af761d2277d853a92', 0, '55 5246 9410', 2, 0, NULL),
(55, 'Samuel', 'Karchmer Krivitzky', 'skarchmerk@gmail.com', '$2y$10$NM8XvTuqqXYdqGAdWGsBPeicD7CPv7unWjYsEDcQVz5YKlVc3vB7e', '872488f88d1b2db54d55bc8bba2fad1b', 0, '55 5246 9560', 2, 0, NULL),
(56, 'Ignacio', 'López Caballero', 'ilcurolab@hotmail.com', '$2y$10$lbaWCR82CVnEfkUB2BzSte4fl49Zf00gB/3/N4Eh3mUPtKuqodjSC', '298f95e1bf9136124592c8d4825a06fc', 0, '55 5246 9607', 2, 0, NULL),
(57, 'Armando López', 'López Jesús', 'temporal@saludangeles.com', '$2y$10$j5bv81kiike/NwezLV7NsO1QjhZTDRhhBMjGU/vm7qGsEVMf6nUiy', '8df707a948fac1b4a0f97aa554886ec8', 0, 'sin especificar', 2, 0, NULL),
(58, 'Joseph Xavier', 'López Karpovitch', 'xlopezk@gmail.com', '$2y$10$z9t8q7.Gu40qWe7fjuHFZ.hTQtVujNvSRCHvCa99AyOUXzKgT6OkO', '42a0e188f5033bc65bf8d78622277c4e', 0, '55 5568 5903', 2, 0, NULL),
(59, 'Laureano', 'Martínez Peschard', 'lmpeschard@prodigy.net.mx', '$2y$10$IFYp.djUwjWophLhyyirKu4hNQaC5B3uBsFK8DCwy7j1PjQLgoXx6', '4311359ed4969e8401880e3c1836fbe1', 0, '55 5246 9753', 2, 0, NULL),
(60, 'Dan', 'Maya Goldsmit', 'jaiele@hotmail.com', '$2y$10$UVu1h2gMFPqlibZpglUJqean7r.uuwDHgigSjESGt0rbaz1Tr66lG', 'eb163727917cbba1eea208541a643e74', 0, '55 5246 9421', 2, 0, NULL),
(61, 'Gerardo', 'Mendez Espinosa', 'g.mendez.e@hotmail.com', '$2y$10$DCl9Wn9pmt6wE0cVmQ6GtuDxyHKxkG3WEahS9/agX63joI6jSXZQe', '2838023a778dfaecdc212708f721b788', 0, '55 5246 9726', 2, 0, NULL),
(62, 'Dalila Adriana', 'Mendoza Rios', 'redaleve@hotmail.com', '$2y$10$3jMccj7NLHncPAKUEiIpteyrfBN.CUmRNivlIxC1dxHmTyV8vRj7a', 'be3159ad04564bfb90db9e32851ebf9c', 0, '55 5247 1537', 2, 0, NULL),
(63, 'María Raquel', 'Miranda Madrazo', 'racuel1790@yahoo.com', '$2y$10$DFUpwRrvlOT5ZXZBiQX3yejrZVt8LwnL2w58CSLdklLwK9.UwwlhC', 'ba2fd310dcaa8781a9a652a31baf3c68', 0, '044 55 3433 6185', 2, 0, NULL),
(64, 'Peggy', 'Molina Vargas', 'peggy-molina@hotmail.com', '$2y$10$JLTJvR9TmnTXPOLRbgyz2unUAG1vxOHBTyVEU9z1rN9K/vzhFdCda', 'f4f6dce2f3a0f9dada0c2b5b66452017', 0, '81 8365 9125', 2, 0, NULL),
(65, 'Alfonso', 'Murillo Uribe', 'alfonso@murillo.com', '$2y$10$iSPP6brIDrYwqRp7HHTcIeCz9AFNp6uvkV2eSn22XDWJxLd2.GGnO', 'c6e19e830859f2cb9f7c8f8cacb8d2a6', 0, '55 5246 9725', 2, 0, NULL),
(66, 'Raul Humberto', 'Muro Flores', 'raulmuro68@hotmail.com', '$2y$10$7Qs2K.cpQHdItVkdmPnYxORIYaT4Sc8XwoVfU4bxAH5j0Fh8fDBKu', 'f2201f5191c4e92cc5af043eebfd0946', 0, '044 993 318 0332', 2, 0, NULL),
(67, 'David', 'Oldak Svirsky', 'droldak@yahoo.com.mx', '$2y$10$45PrX2Qld5gwHANUtBq1oOmFDqKCPhSy95bwFWCIPEmF6gfuaIQiW', 'b1d10e7bafa4421218a51b1e1f1b0ba2', 0, '55 5246 9564', 2, 0, NULL),
(68, 'Eduardo', 'Ontiveros Cerda', 'lleonbaez@hotmail.com', '$2y$10$5ZgGYanRwL5Cia6aabc/E.7kh2mXZh6Qgy1/p7d9IA4piUTtKvBdK', 'd34ab169b70c9dcd35e62896010cd9ff', 0, '55 5516 4511', 2, 0, NULL),
(69, 'Roberto', 'Ovilla Martínez', 'ovillarob@hotmail.com', '$2y$10$e4RkmLDTr9dVN398Cwpe7uC5VID3z6L0DHxI9WgwmmjIjSuI4GzoK', 'fde9264cf376fffe2ee4ddf4a988880d', 0, '55 5246 9424', 2, 0, NULL),
(70, 'Javier', 'Pérez Aguirre', 'perez_aguirre@yahoo.com.mx', '$2y$10$RBLf/pzN5xbai2gpyhkhBekqkaCrDVxC1fGs/ukeT9rvBUdC7f8Cu', 'a02ffd91ece5e7efeb46db8f10a74059', 0, '55 5246 9751', 2, 0, NULL),
(71, 'Olivia', 'Pérez Bojorquez', 'dra.oliviaperez@gmail.com', '$2y$10$VMKFiOIwQP5KSTeDpQzK.OjkHvWp2lOSirkH394R2gkqE6pbPu0B.', '217eedd1ba8c592db97d0dbe54c7adfc', 0, '6677587750', 2, 0, NULL),
(72, 'Fernando', 'Pérez Zincer', 'fperezincermx@yahoo.es', '$2y$10$RhSzZuqVDlv6aGtUKY77duV4UCStA/tXiyO6sIOOYx7VaOuTueZsK', '7fe1f8abaad094e0b5cb1b01d712f708', 0, '55 5246 9571', 2, 0, NULL),
(73, 'Alejandro Roberto', 'Pliego Pérez', 'dr.pliego@gmail.com', '$2y$10$WwSVgDLbDNNfRvTVqRzid.Qfoxzf6P50j/7uCuYalwS9D2tmwpQ0C', '37693cfc748049e45d87b8c7d8b9aacd', 0, '55 5246 9562', 2, 0, NULL),
(74, 'Myriam', 'Ponce Avila', 'miriam_ponceavila@hotmail.com', '$2y$10$gTkyImHnO/xIcMgeeOJNnuF2c0Db5HhJkssvtuTob4gN.zPyPhHLW', '1a5b1e4daae265b790965a275b53ae50', 0, '55 5246 9587', 2, 0, NULL),
(79, 'Benitez Carlos', 'Quesnel García', 'drquesnel@gmail.com', '$2y$10$.Uq3OKpgQQHxr76/biqg8ejj0zLaSzs.0NRX1I4uHofDTEHbuqifK', 'd240e3d38a8882ecad8633c8f9c78c9b', 0, '55 5246 9410', 2, 0, NULL),
(80, 'Norberto', 'Reyes Paredes', 'nreypar@gmail.com', '$2y$10$HjsE6OvilWZ.lcDJBUqS3uoDjh1u/gYAGg0t7oHS7vDsHkKJOeAK2', '6081594975a764c8e3a691fa2b3a321d', 0, '55 5247 2068', 2, 0, NULL),
(81, 'Armando', 'Rojo Enriquez', 'roea90@hotmail.com', '$2y$10$enQP25cGNRW7EnM8n9jwCePG.voVj3yrODYlJZd.Dr0o6aV.2Pi/6', '8f7d807e1f53eff5f9efbe5cb81090fb', 0, '55 5247 5470', 2, 0, NULL),
(82, 'Victor Hugo', 'Ruz Cervera', 'hugoruz@prodigy.net.mx', '$2y$10$XG1j2.s4/K4DKvzh1gjIR.WXVBHFyhJnoQUgmiTSbkwQLFtReG0p.', '32bb90e8976aab5298d5da10fe66f21d', 0, '55 5246 9499', 2, 0, NULL),
(83, 'Iván Mauricio', 'Schroeder Ugalde', 'schroeder.uro@gmail.com', '$2y$10$3xdx9WLo1IcxDSIoXe7Iy.9tmGYWOGVBJ3vp/Gd5bQtaEYtzXCR52', 'cfee398643cbc3dc5eefc89334cacdc1', 0, '55 5247 0232', 2, 0, NULL),
(84, 'Sandra', 'Sucar Romero', 'sandrasucar@msn.com', '$2y$10$lkQNh/PNIJPyxCvKx.irPu1CjZBtzfcAh2g36YOC9f7gZL5DL/ABm', 'fe7ee8fc1959cc7214fa21c4840dff0a', 0, 'sin especificar', 2, 0, NULL),
(85, 'Alberto', 'Valdes Castañeda', 'dr_valdes_gastro@yahoo.com', '$2y$10$41Fl871XJjp587DgVkAEtup7IPqv/hpyc5EmpNpx/3cawsljtHOIC', '08419be897405321542838d77f855226', 0, '55 5246 9435', 2, 0, NULL),
(86, 'Renato Martín', 'Venegas Flores', 'drvenegasf@prodigy.net.mx', '$2y$10$Hj4v3UsJRiLvOcpOuVRti.Sr/tfcr7RvDmdIEQlMLq.F7dvML0Csi', '287e03db1d99e0ec2edb90d079e142f3', 0, '55 5246 9422', 2, 0, NULL),
(87, 'Rodrigo', 'Zamora Escudero', 'rod.zamora@gmail.com', '$2y$10$QXqV3CGssb7O4rvdYQ9PbOH1cKbQ45bWOEYkX7Hi31H/9dA2SOrKC', '19bc916108fc6938f52cb96f7e087941', 0, '55 5246 9410', 2, 0, NULL),
(88, 'Luiz', 'Almanzar', 'lalmanzar@keepmoving.com.mx', '$2y$10$z5w6naFLYS9gKzVhifoLBu4TjU4tHit5aqlVaNqT6lzxfwka.UkE.', 'c203d8a151612acf12457e4d67635a95', 1, '9292929', 4, 0, NULL),
(89, 'Dra. Susana', ' Monroy Santoyo', 'susie_monroy@hotmail.com', '$2y$10$0SD5ZehbCNz5q5lR2OpWpudeVLgxuUTl9weIq4AqO.gZakefHnvW.', 'fa83a11a198d5a7f0bf77a1987bcd006', 0, '55 1151 6491', 2, 0, NULL),
(90, 'Dra. Elizabeth', 'Pérez Ochoa', 'eperezochoa2009@hotmail.com', '$2y$10$0Lu4muRA22vhNImdssQ30ORQPu5ZFSO1aOnERPAiK4oS8/wniKxYO', '1e056d2b0ebd5c878c550da6ac5d3724', 0, '55 5413 3276', 2, 0, NULL),
(91, 'Dr. Alejandro', 'Martínez  Vivas', 'amartinez_1@hotmail.com', '$2y$10$CG9bMQYccI8Ai4C7PzeU3eNoY6naIehKS2w5wQ1LNigZXAZWU8Fkq', '15d4e891d784977cacbfcbb00c48f133', 0, '922 2234 842', 2, 0, NULL),
(92, 'Dr. Alejandro', 'Martínez  Vivas', 'amartinezu_1@hotmail.com', '$2y$10$KwPEQ7BxJ0va0NQKNjiCN.uX88DElkVEcGuJgnSoxrDhI59bmwDsO', '74071a673307ca7459bcf75fbd024e09', 0, '922 2234 842', 2, 0, NULL),
(93, 'Dra. Hermisenda', 'Bermúdez Tapia', 'hbermudez@hotmail.com', '$2y$10$XiAVjbSMnBvshCxoANI4Ee4mX1c1XV.3.COwI/dNDFy/vjewy4cTW', '6c4b761a28b734fe93831e3fb400ce87', 0, '55 2106 3896', 2, 0, NULL),
(94, 'Dr. Alejandro', 'Sañudo López', 'mdalejandro44@hotmail.com', '$2y$10$h/llaO/jCqSNloVQgT7J5OZJX8u6uBtyW0vW5SfYHGoms1SklcSbW', '7504adad8bb96320eb3afdd4df6e1f60', 0, '667 758 7905', 2, 0, NULL),
(95, 'Dra. Marxlenin', 'Rodríguez Matínez', 'marxsc@prodigy.net.mx', '$2y$10$nZzq4piNsJ914TMnXQK5d.5bnCmHnIQiJDVr69oyotmFNCoQjcInu', '389bc7bb1e1c2a5e7e147703232a88f6', 0, '1065 3997', 2, 0, NULL),
(96, 'Roberto Marío', 'Nava Bacca', 'navab@unimedbrh.com', '$2y$10$0UYe/nuZG2JzMUIWgXs6L..pnM5FTFxbfH.ZjMJ09HpdY.dQrQywO', '05f971b5ec196b8c65b75d2ef8267331', 0, '5554048437', 2, 0, NULL),
(97, 'Omar', 'Coronel Ayala', 'omar.coronel@gmail.com', '$2y$10$o1HM6SIQw1HY9cq862BpLuBO.K5.QM3tiNu1BYephP8PA/Uz.TwIW', '8d317bdcf4aafcfc22149d77babee96d', 0, '044 55 5503 8776', 2, 0, NULL),
(98, 'Myrna Gloria', 'Candelaria Hernández', 'candelariahmgloria@gmail.com', '$2y$10$5jgE9aVYL95OEwbnFeVx4eJQijfWd8PUrg0cFIyCJQlXAVFjD8Kqi', '0ff8033cf9437c213ee13937b1c4c455', 0, '044 55 2307 4689', 2, 0, NULL),
(99, 'Luis Manuel', 'Valero Saldaña', 'luis_valero_2000@yahoo.com', '$2y$10$.7CMGWduuYpj5TOTWPjI4e6JujGLY5SmP3QaexWjdBqIg8ysjlvSC', 'f770b62bc8f42a0b66751fe636fc6eb0', 0, '044 55 3483 0989', 2, 0, NULL),
(100, 'Cecilia', 'Camacho', 'ceciliacamacho@saludangeles.com', '$2y$10$8p8O5YcHcuhizvHNNDY2H.VZvXeZq12ML97R9ezxO/NlzLrbm3MTG', '9cc138f8dc04cbf16240daa92d8d50e2', 0, '5679 5000', 2, 0, NULL),
(101, 'Fabián', 'Walters Arballo', 'fabianwa1@hotmail.com', '$2y$10$scWGc8UYiaAW0j46.w9.uOQUsdacq7SjF6nSA2NGd1veg/VI4N54m', '3ef815416f775098fe977004015c6193', 0, '044 664 123 4348', 2, 0, NULL),
(102, 'Maria Teresa', 'Murguia Peniche', 'teresamurguiap@gmail.com', '$2y$10$pvWv7gyFryknSqOQdcDswuJLXWiNNe/PaIYGvbqiKRN6QPSQElcDi', '66368270ffd51418ec58bd793f2d9b1b', 0, '044 55 5405 8242', 2, 0, NULL),
(103, 'Armando', 'Blanco López ', 'ablancol@prodigy.net', '$2y$10$vTI/NekCyk8uyjRiEa2LTOm/zcOIgDL8R5jwJSP9eytNmUiU.xn/m', 'f4552671f8909587cf485ea990207f3b', 0, '044 55 2106 2289', 2, 0, NULL),
(104, 'Roberta', 'Demichelis', 'robertademichelis@gmail.com', '$2y$10$qsxneQCjtpOd321APjtDnOZdS9i8I7ldjGK5A0ACsI3AEVCxZc98C', '2d6cc4b2d139a53512fb8cbb3086ae2e', 0, '5555018036', 2, 0, NULL),
(105, 'Hospital ', 'Ángeles Culiacán', 'favela_66@hotmail.com', '$2y$10$JnADk6I6IgQ9N9MGb3..rOr.x9/smuWlqXA3C28URl8uWzSzv4p7W', '851ddf5058cf22df63d3344ad89919cf', 0, '667 758 7751', 2, 0, NULL),
(106, 'Hospital', 'Ángeles Culiacán', 'acostamed62@hotmail.com', '$2y$10$xYubvfJRn1MLk05cZG9U.uU7YSnmH/B4c4la8Q3nBXyJ9YO8f4NlC', '86b122d4358357d834a87ce618a55de0', 0, '667 758 7909', 2, 0, NULL),
(107, 'Hospital ', 'Ángeles Culiacán', 'drmonarrez@gmail.com', '$2y$10$O0FJM/u4ET2ssKL3gur/DeW4G9b3x1F1Q9GLYVsi5.x26ts8a4mtu', 'fe8c15fed5f808006ce95eddb7366e35', 0, '667 715 3829', 2, 0, NULL),
(108, 'Hospital ', 'Ángeles Tijuana', 'laboratorio.clinico.hti@saludangeles.com', '$2y$10$6CF5.Y8Pjfu1tOzPdo9i6O/D0emjTw5e55mhtMV8pjOKEuUCJ3.cq', 'beb22fb694d513edcf5533cf006dfeae', 0, '664 635 1800', 2, 0, NULL),
(109, 'Hospital', ' Ángeles Tijuana', 'gaby_selene@hotmail.com', '$2y$10$AC.jsfehmoWykyuBBvRzmOXwxiWXxBMBawQ1BLoqguJwMhqSsJm0i', '0cb929eae7a499e50248a3a78f7acfc7', 0, '664 386 1713', 2, 0, NULL),
(110, 'Clínica', 'Materno Fetal', 'draleis@yahoo.com.mx', '$2y$10$lk8cvwX616hjw27dxr.6Y.D3lfl5fV6E/027U5DjhTlpajcG60LAK', '3a0772443a0739141292a5429b952fe6', 0, '5246 5000', 2, 0, NULL),
(111, 'Clínica', 'Materno Fetal', 'juarez.garcia.luz@gmail.com', '$2y$10$.YzIg8mzcQCCC2gXlbxt9OA.gMBmeXDJStC7Xq3qHlJIeGVVLGzXy', '357a6fdf7642bf815a88822c447d9dc4', 0, '5246 5000', 2, 0, NULL),
(112, 'Clínica ', 'Materno Fetal', 'drajanalopez@gmail.com', '$2y$10$KNravbWeSGkyR2jJ.1214uZEs9qhn.6uoaR739XEnsNNsj5d.hg8.', '941e1aaaba585b952b62c14a3a175a61', 0, '5246 5000', 2, 0, NULL),
(113, 'Clínica', ' Materno Fetal', 'letyslo@hotmail.com', '$2y$10$Ca4T25E5ow9ioVcNqxOiwOJWuOYpPKly9A5n2q2fMYWhZuEJIjFR2', 'f718499c1c8cef6730f9fd03c8125cab', 0, '5246 5000', 2, 0, NULL),
(114, 'Clínica', 'Materno Fetal', 'sancastelazo@gmail.com', '$2y$10$3hHDCbX6suHBS987mEPhC.hZ/kyo09n.fnslvLvZtXUauezdyxkFa', '2b24d495052a8ce66358eb576b8912c8', 0, '55 1451 2984', 2, 0, NULL),
(116, 'Gadiel', 'Hernández', 'ghernandez@keepmoving.com.mx', '$2y$10$LWNUtJWyNZUf806jqye3eu7clfBwLnrOKmF7qu.I2i8xV9MQk2WY.', 'd61e4bbd6393c9111e6526ea173a7c8b', 0, '9128183131', 1, 17, 'si'),
(125, 'Andrea', 'Tortoriello', 'tortorielloandrea@gmail.com', '$2y$10$IFmcB9GWKxfTWApLCRTNSeVkdNR/KsyTS4hFn9Gz91XVf4F8g/VNq', '20aee3a5f4643755a79ee5f6a73050ac', 1, '81939131', 2, 0, 'si'),
(126, 'Andrea', 'Tortoriello', 'tortorielloandrea@hotmail.com', '$2y$10$OTzF5o/N4ynekrATZQ/Ine9ZtM9AZTra1RZZABSx1ycQmBYzDJsru', '54a367d629152b720749e187b3eaa11b', 0, '81828123', 1, 15, 'si'),
(127, 'Manuel', 'Quireza Álvarez', 'andrea.ae@hotmail.com', '$2y$10$4FGiggeRJSuyufPHCB7ii.2zB9nGW03nxKVfA37Q94o5p5KUXsDpm', 'bf8229696f7a3bb4700cfddef19fa23f', 0, '5548885997', 3, 0, 'si'),
(130, 'Eva', 'Ramirez', 'eva.ramirez@unidadgenetica.com', '$2y$10$CvqiXykSuH8xdrkPg5MCfuD8EkrnwyGr2AOrn8.r0ZdDglAusuq.C', 'e2230b853516e7b05d79744fbd4c9c13', 0, '123456789', 3, 0, NULL),
(132, 'David', 'Ramos', 'dramos@keepmoving.com.mx', '$2y$10$pwPXukhUExjGtXmy1UaOC.mkiCmI.Tb0HW0zEormU12tvX3tpAa3y', 'bf8229696f7a3bb4700cfddef19fa23f', 0, '00101010', 2, 0, NULL),
(133, 'Luis', 'Corpus', 'luiscorpus182@gmail.com', '$2y$10$nW5l2ezwpw/Gwrys6cQOc.XIqR9J0QkJmRp3Pn6cAcQMWVkUYFHiO', '149e9677a5989fd342ae44213df68868', 1, '00000111', 3, 0, 'si');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
