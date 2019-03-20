-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20-Set-2018 às 06:41
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `regserver`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `username` varchar(255) NOT NULL,
  `usernamefull` varchar(255) NOT NULL,
  `cpf` bigint(12) NOT NULL,
  `crm_med` varchar(14) NOT NULL,
  `password` varchar(255) NOT NULL,
  `respondido` tinyint(1) NOT NULL,
  `endereco` varchar(1000) NOT NULL,
  `telefone1` bigint(18) NOT NULL,
  `telefone2` bigint(18) NOT NULL,
  `data_nascimento` date NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`id`, `data`, `username`, `usernamefull`, `cpf`, `crm_med`, `password`, `respondido`, `endereco`, `telefone1`, `telefone2`, `data_nascimento`, `email`) VALUES
(1, '2018-08-27', 'Roberta Miranda', '', 19482014758, '40028922-PA', '', 1, '', 0, 0, '0000-00-00', ''),
(9, '2018-09-15', 'Richard', '', 18496048392, '40028922-PA', '', 1, '', 0, 0, '0000-00-00', ''),
(10, '2018-08-15', 'Naruto Uzumaki', '', 89334569320, '40028922-PA', '', 1, '', 0, 0, '0000-00-00', ''),
(33, '2018-08-16', 'Joazinho', '', 2483940573, '40028922-PA', '', 0, '', 0, 0, '0000-00-00', ''),
(34, '2018-08-17', 'Matheus', '', 38920847921, '40028922-PA', '', 0, '', 0, 0, '0000-00-00', ''),
(35, '2018-08-17', 'Ravenclaw', '', 22250309112, '40028922-PA', '', 0, '', 0, 0, '0000-00-00', ''),
(36, '2018-08-23', 'Xaves', '', 2101000211, '40028922-PA', '', 0, '', 0, 0, '0000-00-00', ''),
(37, '2018-08-30', 'Haziel', '', 12345678911, '40028922-PA', '', 0, '', 0, 0, '0000-00-00', ''),
(39, '2018-08-30', 'Ana Maria', 'Ana Maria Gonçalves da Silva', 12345678910, '40028922-PA', '', 0, '', 0, 0, '0000-00-00', ''),
(40, '2018-08-29', 'Sasuke', 'Sasuke Uchiha', 12345678999, '40028922-PA', '63d30affb4526bdc979ace6a9f82d79d', 0, '', 0, 0, '0000-00-00', ''),
(41, '2018-09-14', 'Roberto', 'Roberto Mendes da Silva', 12233344445, '40028922-PA', '', 0, '', 0, 0, '0000-00-00', ''),
(42, '2018-09-25', 'Jessica', 'Jessica Jones', 12345678912, '40028922-PA', '', 0, '', 0, 0, '0000-00-00', ''),
(43, '2018-09-25', 'Luke', 'Luke Cage', 12345678123, '40028922-PA', '', 0, '', 0, 0, '0000-00-00', ''),
(44, '1994-12-01', 'Rafael', 'Rafael dos Anjos Query', 12345555555, '40028922-PA', '2e924956f706ca965f7551887941f062', 0, 'R. Augusto Corrêa, 1 - Guamá, Belém - PA, 66075-110', 32657891, 991028391, '0000-00-00', 'rafinhaquery@email.com'),
(45, '1984-02-01', 'Keanu', 'Keanu Reeves', 12345671111, '40028922-PA', '91f0d0a199ecfcfe871da82021a1740c', 0, '351 S Studio Dr, Lake Buena Vista, FL 32830, EUA', 32657891, 991028391, '0000-00-00', 'keanu@email.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ficha`
--

CREATE TABLE `ficha` (
  `id` int(11) NOT NULL,
  `cpf` bigint(14) NOT NULL,
  `exame` varchar(100) NOT NULL,
  `observacoes_med` varchar(600) NOT NULL,
  `observacoes_paci` varchar(600) NOT NULL,
  `impressoes` varchar(600) NOT NULL,
  `url` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ficha`
--

INSERT INTO `ficha` (`id`, `cpf`, `exame`, `observacoes_med`, `observacoes_paci`, `impressoes`, `url`) VALUES
(1, 12345555555, 'HLA-B*27', '', '', 'Paciente apresenta sintomas de Espondiloartrite', 'ficha_paciente.php?user=Rafael%20dos%20Anjos%20Query&&cpf=12345555555&&data=1994-12-01&&crm=40028922-PA&&tel1=32657891&&tel2=991028391&&gender=Masculino&&exam=HLA-B*27&&obs_med=Top&&obs_paci=Paciente%20apresenta%20alergia%20a%20tal%20composto&&print=Paciente%20apresenta%20sintomas%20de%20Espondiloartrite&&email=rafinhaquery@email.com&&end=R.%20Augusto%20Corrêa,%201%20-%20Guamá,%20Belém%20-%20PA,%2066075-110'),
(4, 12345671111, 'HLA-DQA1/DQB1', '', '', '', 'ficha_paciente.php?user=Keanu Reeves&&cpf=12345671111&&data=1984-02-01&&crm=40028922-PA&&tel1=32657891&&tel2=991028391&&gender=Masculino&&exam=HLA-DQA1/DQB1&&obs_med=Topzera&&obs_paci=Paciente coisado&&print=&&email=keanu@email.com&&end=351 S Studio Dr, Lake Buena Vista, FL 32830, EUA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tipo` tinyint(3) NOT NULL,
  `idade` tinyint(150) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `usernamefull` varchar(255) NOT NULL,
  `crm` varchar(12) NOT NULL,
  `telefone1` bigint(18) NOT NULL,
  `telefone2` bigint(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `tipo`, `idade`, `sexo`, `usernamefull`, `crm`, `telefone1`, `telefone2`) VALUES
(1, 'Matheus', 'matheus@email.com', '202cb962ac59075b964b07152d234b70', 1, 0, '', '', '', 0, 0),
(2, 'Matheus', 'matheus@email.com', 'e56b6eea9b0bc782bbb9ea6098ead641', 2, 0, '', 'Matheus Gonçalves Pinheiro da Silva', '40028922-PA', 32651935, 91981940232),
(73, 'Ana', '', '', 2, 0, '', '', '', 0, 0),
(74, 'Ana Maria', '', '', 2, 0, '', '', '', 0, 0),
(75, 'Ana Maria Gonçalves', '', '', 2, 0, '', '', '', 0, 0),
(76, 'Ana Maria Gonçalves', '', '', 2, 0, '', '', '', 0, 0),
(77, 'Carlos', 'carlinhos@email', '202cb962ac59075b964b07152d234b70', 2, 0, '', 'Carlos Daniel da Silva', '323232-RN', 0, 0),
(78, 'Roberta', '', '', 2, 0, '', '', '', 0, 0),
(79, 'Ricardo', '', '', 2, 0, '', '', '', 0, 0),
(80, 'Haziel', '', '', 2, 0, '', '', '', 0, 0),
(81, 'Roberta Miranda', '', '', 2, 0, '', '', '', 0, 0),
(82, 'Richard', '', '', 2, 0, '', '', '', 0, 0),
(89, '', '', '1234567890', 2, 0, 'Masculino', '', '', 0, 0),
(91, '', '', '', 2, 0, 'Masculino', '', '', 0, 0),
(93, '', '', '', 2, 0, 'Masculino', '', '', 0, 0),
(94, '', '', '', 2, 0, 'Masculino', '', '', 0, 0),
(95, '', '', '', 2, 0, 'Masculino', '', '', 0, 0),
(101, '', '', '', 2, 0, 'Masculino', '', '', 0, 0),
(102, '', '', '', 2, 0, 'Masculino', '', '', 0, 0),
(103, '', '', '', 2, 0, 'Masculino', '', '', 0, 0),
(104, '', '', '', 2, 0, 'Masculino', '', '', 0, 0),
(105, '', '', '', 2, 0, 'Masculino', '', '', 0, 0),
(106, '', '', '', 2, 0, 'Masculino', '', '', 0, 0),
(107, 'Matheus', '', '02115768248', 2, 10, 'Masculino', '', '', 0, 0),
(108, 'Ravenclaw', '', '3fa15b861caf39865701bcf99a129125', 2, 23, 'Feminino', '', '', 0, 0),
(109, 'Xaves', '', 'bb7de56b1bf2a4ef39ad7885b81a4d9b', 2, 54, 'Masculino', '', '', 0, 0),
(110, 'Haziel', '', '1e5ce73f4fc4c3b764fb66811f093c87', 2, 44, 'Masculino', '', '', 0, 0),
(112, 'Ana Maria', '', '12345678910', 3, 56, 'Feminino', 'Ana Maria Gonçalves da Silva', '', 0, 0),
(113, 'Sasuke', '', '63d30affb4526bdc979ace6a9f82d79d', 3, 45, 'Masculino', 'Sasuke Uchiha', '', 0, 0),
(114, 'Roberto', '', '7f6035edc2a381856db6a2ef8afc4d42', 3, 34, 'Masculino', 'Roberto Mendes da Silva', '', 0, 0),
(115, 'Jessica', '', 'faf5341a39919352a4f9bde4d6de5396', 3, 43, 'Feminino', 'Jessica Jones', '', 0, 0),
(116, 'Luke', '', 'c271edbedb5e77a4597ddc63547cdd1a', 3, 23, 'Masculino', 'Luke Cage', '', 0, 0),
(117, 'Rafael', '', '2e924956f706ca965f7551887941f062', 3, 0, 'Masculino', 'Rafael dos Anjos Query', '', 0, 0),
(118, 'Keanu', '', '91f0d0a199ecfcfe871da82021a1740c', 3, 0, 'Masculino', 'Keanu Reeves', '', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `ficha`
--
ALTER TABLE `ficha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
