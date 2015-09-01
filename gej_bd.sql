-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.27
-- Versão do PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `gej_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_auditoria`
--

CREATE TABLE IF NOT EXISTS `tb_auditoria` (
  `id_auditoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tabela` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `realizado` datetime DEFAULT NULL,
  `operacao` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_anterior` text COLLATE utf8_unicode_ci,
  `item_atual` text COLLATE utf8_unicode_ci,
  `id_user` int(10) unsigned DEFAULT NULL,
  `id_item` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_auditoria`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_membro`
--

CREATE TABLE IF NOT EXISTS `tb_membro` (
  `co_membro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_membro` varchar(100) DEFAULT NULL,
  `ds_endereco` varchar(250) DEFAULT NULL,
  `ds_bairro` varchar(50) DEFAULT NULL,
  `nu_tel1` varchar(14) DEFAULT NULL,
  `nu_tel2` varchar(14) DEFAULT NULL,
  `nu_tel3` varchar(14) DEFAULT NULL,
  `no_responsavel` varchar(100) DEFAULT NULL,
  `ds_email` varchar(150) DEFAULT NULL,
  `st_estuda` varchar(1) DEFAULT NULL,
  `st_trabalha` varchar(1) DEFAULT NULL,
  `ds_conhecimento` text,
  `dt_nascimento` datetime DEFAULT NULL,
  `st_status` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`co_membro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_membro`
--

INSERT INTO `tb_membro` (`co_membro`, `no_membro`, `ds_endereco`, `ds_bairro`, `nu_tel1`, `nu_tel2`, `nu_tel3`, `no_responsavel`, `ds_email`, `st_estuda`, `st_trabalha`, `ds_conhecimento`, `dt_nascimento`, `st_status`) VALUES
(1, 'Leonardo Bessa', 'qr 403 cj 10', 'Samambaia', '61 9327-4991', '', '61 30826060', 'jose arnaldo', 'leobessa@gmail.com', 'o', NULL, 'fefef', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `perfil` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tb_user`
--

INSERT INTO `tb_user` (`id`, `nome`, `login`, `senha`, `code`, `perfil`) VALUES
(1, 'Leonardo M C Bessa', 'leobessa', '123456', '123456', 'administrador, todo_acesso'),
(2, 'Lilian M C Bessa', 'lililasp', '123456', '123456', 'administrador');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
