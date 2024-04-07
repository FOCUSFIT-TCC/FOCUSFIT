-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/04/2024 às 04:13
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

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
-- Estrutura para tabela `perfil`
--

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_modificacao` datetime DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `perfil`
--

INSERT INTO `perfil` (`id`, `nome`, `data_criacao`, `data_modificacao`, `ativo`) VALUES
(1, 'Administrador', '2024-03-12 01:25:27', NULL, 1),
(2, 'Cliente', '2024-03-12 01:25:27', NULL, 1),
(3, 'Perfil3', '0000-00-00 00:00:00', NULL, 1),
(4, 'Perfil4', '2024-03-19 21:18:24', '2024-03-19 21:26:34', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabela_nutricional`
--

CREATE TABLE `tabela_nutricional` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `valor_energetico` float NOT NULL,
  `carboidratos` float NOT NULL,
  `proteinas` float NOT NULL,
  `gorduras_totais` float NOT NULL,
  `gorduras_saturadas` float NOT NULL,
  `gorduras_trans` float NOT NULL,
  `fibra_alimentar` float NOT NULL,
  `sodio` float NOT NULL,
  `acucar` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tabela_nutricional`
--

INSERT INTO `tabela_nutricional` (`id`, `nome`, `valor_energetico`, `carboidratos`, `proteinas`, `gorduras_totais`, `gorduras_saturadas`, `gorduras_trans`, `fibra_alimentar`, `sodio`, `acucar`) VALUES
(1, 'chocolate', 4, 5, 5, 6, 6, 6, 10, 10, 20),
(2, 'Arroz', 4, 4, 4, 4, 4, 4, 4, 4, 4),
(3, 'Filé de Frango', 101, 0, 28, 1, 1, 1, 0, 56, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users_login`
--

CREATE TABLE `users_login` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `nome` varchar(110) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users_login`
--

INSERT INTO `users_login` (`id`, `email`, `username`, `password`, `ativo`, `perfil_id`, `nome`, `foto`) VALUES
(1, 'teste@gmail.com', 'gdgedg', 'asgs', 1, 2, 'Teste3', NULL),
(2, 'teste01@gmail.com', 'userteste01', 'sounerd123', 1, 2, 'Teste2', NULL),
(4, 'adm03@gmail.com', 'Pedro Alex', 'pedro123', 1, 2, 'Pedro', NULL),
(5, 'davi@gmail.com', 'Davi', 'davi123', 1, 2, 'Davi', NULL),
(6, 'martins@gmail.com', 'Kaue Martins', 'kaue123', 1, 2, 'Kaue', NULL),
(7, 'leo@gmail.com', 'Leonardo', 'leo123', 0, 1, 'Leonardo21', 'https://i.pinimg.com/236x/95/2d/a0/952da03b73f0810c8d58c4087bccb509.jpg'),
(8, 'testeuser@gmail.com', 'testeuser', '123', 1, 2, 'Teste', NULL),
(9, 'lu@gmail.com', 'Luciano', 'lu123', 0, 2, 'Luciano', NULL),
(10, 'icarootario@gmail.com', 'Pedro', '123', 1, 2, 'Icaro', NULL),
(12, 'leandro@gmail.com', 'Leandro', 'Leandro1', 1, 1, 'Leandro', 'https://www.florence.edu.br/wp-content/uploads/2022/08/Imagem-Materia_Dia-do-Cachorro.png'),
(14, 'teste2@gmail.com', '', '', 0, 2, 'Novo', ''),
(15, 'gomao@gmail.com', 'Gomes', 'gomes123', 1, 1, 'Gomes', 'https://conteudo.imguol.com.br/c/esporte/82/2021/06/02/gol-de-bicicleta-de-cristiano-ronaldo-pelo-real-madrid-contra-a-juventus-1622663604572_v2_750x750.jpg');

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
  `perm` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `user_infos`
--

INSERT INTO `user_infos` (`id`, `user_id`, `idade`, `objetivo`, `imc`, `tipo_plano`, `perm`) VALUES
(26, 8, 'velho', NULL, NULL, NULL, NULL),
(29, 9, 'adulto', NULL, NULL, NULL, NULL),
(30, 5, NULL, 'ganho_massa', NULL, NULL, NULL),
(41, 10, NULL, 'perca_peso', NULL, NULL, NULL),
(42, 4, NULL, 'ganho_massa', NULL, NULL, NULL),
(44, 12, 'jovem', 'perca_peso', 32.14, NULL, NULL),
(45, 15, 'jovem (18-26)', 'ganho de massa', 27.78, NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tabela_nutricional`
--
ALTER TABLE `tabela_nutricional`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users_login`
--
ALTER TABLE `users_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `perfil_id` (`perfil_id`);

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
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tabela_nutricional`
--
ALTER TABLE `tabela_nutricional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `users_login`
--
ALTER TABLE `users_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `user_infos`
--
ALTER TABLE `user_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `users_login`
--
ALTER TABLE `users_login`
  ADD CONSTRAINT `users_login_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`);

--
-- Restrições para tabelas `user_infos`
--
ALTER TABLE `user_infos`
  ADD CONSTRAINT `user_infos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_login` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
