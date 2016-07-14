-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 14-Jul-2016 às 09:40
-- Versão do servidor: 5.5.44-0ubuntu0.14.04.1
-- versão do PHP: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `pap`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dates`
--

CREATE TABLE IF NOT EXISTS `dates` (
  `ed_id` int(11) NOT NULL AUTO_INCREMENT,
  `ed_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ed_day` int(11) NOT NULL,
  `ed_month` int(11) NOT NULL,
  `ed_year` int(11) NOT NULL,
  PRIMARY KEY (`ed_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `dates`
--

INSERT INTO `dates` (`ed_id`, `ed_name`, `ed_day`, `ed_month`, `ed_year`) VALUES
(2, '30-Jul', 30, 7, 2016),
(3, '25-Jul', 25, 7, 2016);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplines`
--

CREATE TABLE IF NOT EXISTS `disciplines` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `logs_id` int(11) NOT NULL AUTO_INCREMENT,
  `logs_username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `logs_action` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `logs_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logs_ip` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`logs_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `logs`
--

INSERT INTO `logs` (`logs_id`, `logs_username`, `logs_action`, `logs_date`, `logs_ip`) VALUES
(1, 'G4brym', 'Register', '2014-11-09 21:18:08', '144.64.105.23'),
(2, 'fghjgg', 'Register', '2014-11-10 20:38:44', '144.64.105.23'),
(3, 'triangle', 'Register', '2014-11-16 21:40:04', '188.80.150.60'),
(4, '1', 'Ticket Creation', '2014-11-26 19:59:30', '2.81.151.24'),
(5, '1', 'Ticket Creation', '2014-11-26 20:01:25', '2.81.151.24'),
(6, '1', 'Ticket Answer #1', '2014-11-26 20:35:41', '2.81.151.24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_year` int(11) NOT NULL,
  `m_num` int(11) NOT NULL,
  `m_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `m_hours` int(11) NOT NULL,
  `m_did` int(11) NOT NULL DEFAULT '1' COMMENT 'disciline ID',
  PRIMARY KEY (`m_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(15) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastlogin` int(32) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `token`, `remember_token`, `lastlogin`, `admin`, `created_at`, `updated_at`) VALUES
(1, 'g4bryrm98@hotmail.com', 'Gabriel', '$2y$10$f0mn2mNtWDXzIG18qZyhG.EUZo9vQWt3ceNdvKWEy/ZXA2m.eII3y', '', '6cqIg9p8psSGpgRfgLvrzupMxwVpc09IroVmAsAW33jrmN8MVl29UtLmVqjq', 1463653802, 1, '2014-11-09 21:18:03', '2016-05-19 10:40:45'),
(17017, NULL, 'VANESSA CRISTINA DA SILVA ANDRADE', NULL, '0', '', 0, 0, '2015-01-04 04:34:04', '2015-01-04 04:34:04'),
(17021, NULL, 'RICARDO MICAEL MARQUES ALMEIDA', NULL, '0', '', 0, 0, '2015-01-04 04:34:04', '2015-01-04 04:34:04'),
(17634, NULL, 'JOÃO SALVADOR GOMES  NEVES', '$2y$10$l3h4QZa6W3TPV1LgYoHf2eXsQQwSm7eksdD2nLX82OpCoLGQ2tH0K', '0', '9KpCj9J253RJF0TAci8239tuLOZeJlEMmNH1rf8RyvwZW0zBW0N3hjWHYsdJ', 1468487987, 1, '2015-01-04 04:34:04', '2016-07-14 09:19:47'),
(17700, '12000@escola.pt', 'GABRIEL RINO MASSADAS', '$2y$10$l3h4QZa6W3TPV1LgYoHf2eXsQQwSm7eksdD2nLX82OpCoLGQ2tH0K', '0', 'yzB7ULyOeZXZe18t8whx4d4NBNMqNfb9OKap2JlS0S1rFuiYa1qI6z4FrBs3', 1467993440, 0, '2015-01-04 04:34:04', '2016-07-08 15:57:20'),
(18255, NULL, 'RAFAEL CALÔBA VERDADE', '$2y$10$l3h4QZa6W3TPV1LgYoHf2eXsQQwSm7eksdD2nLX82OpCoLGQ2tH0K', '0', 'NlrWU3JDdRKrYV4zSDeQJuwfpBZfKkSMLTcjb6vxcX99RcGtoWy2U8kFjygg', 1468421673, 0, '2015-01-04 04:34:04', '2016-07-13 15:21:06'),
(20030, '12001@escola.pt', 'DANIEL ABRANTES MARTINS', '$2y$10$hcInaACjRzVhMxSi3sXvweVZEn7w/cYlmwnF6IUq.G2b74QMY/74e', '0', '', 0, 0, '2015-01-04 04:34:04', '2015-01-04 04:34:04'),
(20050, NULL, 'BEATRIZ ALEXANDRA MAXIMIANO ABRANTES', NULL, '0', '', 0, 0, '2015-01-04 04:34:04', '2015-01-04 04:34:04'),
(23126, NULL, 'ANA BEATRIZ RODRIGUES FIGUEIREDO', NULL, '0', '', 0, 0, '2015-01-04 04:34:04', '2015-01-04 04:34:04'),
(23277, NULL, 'LINDA INÊS MARTINS ARRUDA', NULL, '0', '', 0, 0, '2015-01-04 04:34:04', '2015-01-04 04:34:04'),
(23311, NULL, 'ANA BEATRIZ MORAIS DA SILVA', NULL, '0', '', 0, 0, '2015-01-04 04:34:04', '2015-01-04 04:34:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usersmods`
--

CREATE TABLE IF NOT EXISTS `usersmods` (
  `um_id` int(11) NOT NULL AUTO_INCREMENT,
  `um_mod` int(11) NOT NULL,
  `um_user` int(11) NOT NULL,
  `um_grade` float DEFAULT NULL,
  `um_date` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`um_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
