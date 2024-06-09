-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 01:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `receitas`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` int(11) NOT NULL,
  `nome` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `nome`) VALUES
(1, 'Sobremesas'),
(2, 'Jantar'),
(3, 'Café da manhã'),
(4, 'Doces');

-- --------------------------------------------------------

--
-- Table structure for table `receitas`
--

CREATE TABLE `receitas` (
  `receita_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receitas`
--

INSERT INTO `receitas` (`receita_id`, `usuario_id`, `categoria_id`, `titulo`, `texto`) VALUES
(1, 9, 1, 'Sobremesa  1', 'Teste 2'),
(2, 9, 3, 'Café', 'asdasdsadsa'),
(3, 10, 1, '123', '123'),
(4, 10, 1, '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `usuario` text NOT NULL,
  `nome` text NOT NULL,
  `senha_hash` text NOT NULL,
  `senha_normal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario`, `nome`, `senha_hash`, `senha_normal`) VALUES
(8, 'usuario', 'user', '$2y$10$F02xIYZIyOqGUyqZaT9qGeTZg8wdoKnLeHqs.JgXLqwjloyQ/qFCq', '123'),
(9, 'joao', 'joao', '$2y$10$Sh2mcxYNEnp3XAYJLc5oeOI1nFmdVztjt330GrzCSHIF9lsfQq/oy', '123'),
(10, '123', '123', '$2y$10$TAZDE4snKHtrAo3CYDBGOukXWik5gr4y9tNEcL8CHrxg.dpBbzsgu', '123'),
(11, '1234', '12', '$2y$10$PLWIGRZ5BYj7sCb/T79zyulrvQ.8yf8d/erTPueXh./b.SyQ9MSx.', '123'),
(12, 'zxc', 'zxc', '$2y$10$y7PwKFfw5vMlBUPjMw/ENezk8V0j/kLUpalL4Wk36Ur81aYlkYxSe', 'zxc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indexes for table `receitas`
--
ALTER TABLE `receitas`
  ADD PRIMARY KEY (`receita_id`),
  ADD KEY `categoriaRelacionamento` (`categoria_id`),
  ADD KEY `usuarioRelacionamento` (`usuario_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `receitas`
--
ALTER TABLE `receitas`
  MODIFY `receita_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `receitas`
--
ALTER TABLE `receitas`
  ADD CONSTRAINT `categoriaRelacionamento` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`categoria_id`),
  ADD CONSTRAINT `usuarioRelacionamento` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
