-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Set-2018 às 19:09
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbphp7`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usuarios_insert` (IN `pdeslogin` VARCHAR(64), IN `pdessenha` VARCHAR(200), IN `pdtcadastro` DATETIME)  NO SQL
BEGIN
	
    INSERT INTO tb_usuarios (deslogin, dessenha, dtcadastro) VALUES(pdeslogin, pdessenha, pdtcadastro);
    SELECT * FROM tb_usuarios WHERE id = LAST_INSERT_ID();
    
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `deslogin` varchar(10) COLLATE utf8_bin NOT NULL,
  `dessenha` varchar(10) COLLATE utf8_bin NOT NULL,
  `dtcadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `deslogin`, `dessenha`, `dtcadastro`) VALUES
(1, 'teste1', '123456', '2018-08-31 13:43:00'),
(4, 'aluno', '@lun0', '2018-09-11 13:44:12'),
(5, 'aluno', '@lun0', '2018-09-11 18:50:44'),
(6, 'aluno', '@lun0', '2018-09-11 18:50:50'),
(7, 'aluno', '@lun0', '2018-09-11 18:51:10'),
(8, 'aluno', '@lun0', '2018-09-11 13:51:57'),
(9, 'aluno', '@lun0', '2018-09-11 18:54:05'),
(10, 'aluno', '@lun0', '2018-09-11 13:54:22'),
(11, 'aluno', '@lun0', '2018-09-11 14:06:18'),
(12, 'aluno', '@lun0', '2018-09-11 14:07:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
