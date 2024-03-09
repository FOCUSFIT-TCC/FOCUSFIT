-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04/03/2024 às 01:29
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_focusfit`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `users_login`
--

CREATE TABLE `users_login` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users_login`
--

INSERT INTO `users_login` (`id`, `email`, `username`, `password`) VALUES
(1, 'teste@gmail.com', 'gdgedg', 'asgs'),
(2, 'teste01@gmail.com', 'userteste01', 'sounerd123'),
(4, 'adm03@gmail.com', 'Pedro Alex', 'pedro123'),
(5, 'davi@gmail.com', 'Davi', 'davi123'),
(6, 'martins@gmail.com', 'Kaue Martins', 'kaue123'),
(7, 'leo@gmail.com', 'Leonardo', 'leo123'),
(8, 'testeuser@gmail.com', 'testeuser', '123'),
(9, 'lu@gmail.com', 'Luciano', 'lu123');

-- --------------------------------------------------------

--
-- Estrutura para tabela `user_infos`
--

CREATE TABLE `user_infos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `idade` varchar(255) DEFAULT NULL,
  `objetivo` varchar(255) DEFAULT NULL,
  `imc` float DEFAULT NULL,
  `tipo_plano` varchar(20) DEFAULT NULL,
  `perm` varchar(20) DEFAULT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `user_infos`
--

INSERT INTO `user_infos` (`id`, `user_id`, `idade`, `objetivo`, `imc`, `tipo_plano`, `perm`, `foto_perfil`) VALUES
(26, 8, 'velho', NULL, NULL, NULL, NULL, NULL),
(27, 8, 'velho', NULL, NULL, NULL, NULL, NULL),
(29, 9, 'adulto', NULL, NULL, NULL, NULL, 'https://i.em.com.br/J2PwYzMF_MceC7Yek18wGIbiDX4=/1200x1200/smart/imgsapp.em.com.br/app/noticia_127983242361/2023/02/06/1453747/desenho-de-um-anime-homem-loiro-de-olhos-azuis_1_50529.jpg'),
(30, 5, NULL, 'ganho_massa', NULL, NULL, NULL, NULL),
(31, 5, 'jovem', NULL, NULL, NULL, NULL, NULL),
(32, 5, 'velho', NULL, NULL, NULL, NULL, NULL),
(33, 5, NULL, 'perca_peso', NULL, NULL, NULL, NULL),
(34, 5, 'adulto', NULL, NULL, NULL, NULL, NULL),
(35, 5, 'jovem', NULL, NULL, NULL, NULL, NULL),
(36, 5, 'jovem', NULL, NULL, NULL, NULL, NULL),
(37, 5, 'adulto', NULL, NULL, NULL, NULL, NULL),
(38, 5, 'adulto', NULL, NULL, NULL, NULL, NULL),
(39, 5, 'adulto', NULL, NULL, NULL, NULL, NULL),
(40, 5, 'adulto', NULL, NULL, NULL, NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `users_login`
--
ALTER TABLE `users_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Índices de tabela `user_infos`
--
ALTER TABLE `user_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `users_login`
--
ALTER TABLE `users_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `user_infos`
--
ALTER TABLE `user_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `user_infos`
--
ALTER TABLE `user_infos`
  ADD CONSTRAINT `user_infos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_login` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
