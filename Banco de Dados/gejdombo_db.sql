-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17-Nov-2015 às 13:18
-- Versão do servidor: 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gej_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_auditoria`
--

CREATE TABLE IF NOT EXISTS `tb_auditoria` (
  `co_auditoria` int(10) unsigned NOT NULL,
  `no_tabela` varchar(150) DEFAULT NULL,
  `dt_realizado` datetime DEFAULT NULL,
  `no_operacao` varchar(1) DEFAULT NULL,
  `ds_item_anterior` text,
  `ds_item_atual` text,
  `co_usuario` int(10) DEFAULT NULL,
  `co_registro` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_evento`
--

CREATE TABLE IF NOT EXISTS `tb_evento` (
  `co_evento` int(10) unsigned NOT NULL,
  `no_evento` varchar(250) DEFAULT NULL,
  `ds_conteudo` text,
  `ds_palavras_chaves` varchar(100) DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_realizado` date DEFAULT NULL,
  `ds_local` varchar(150) DEFAULT NULL,
  `co_foto_capa` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_foto`
--

CREATE TABLE IF NOT EXISTS `tb_foto` (
  `co_foto` int(10) unsigned NOT NULL,
  `ds_caminho` varchar(150) DEFAULT NULL,
  `co_evento` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_membro`
--

CREATE TABLE IF NOT EXISTS `tb_membro` (
  `co_membro` int(10) unsigned NOT NULL,
  `no_membro` varchar(100) DEFAULT NULL,
  `ds_endereco` varchar(250) DEFAULT NULL,
  `ds_bairro` varchar(50) DEFAULT NULL,
  `nu_tel1` varchar(15) DEFAULT NULL,
  `nu_tel2` varchar(15) DEFAULT NULL,
  `nu_tel3` varchar(15) DEFAULT NULL,
  `no_responsavel` varchar(100) DEFAULT NULL,
  `ds_email` varchar(150) DEFAULT NULL,
  `st_estuda` varchar(1) DEFAULT NULL,
  `st_trabalha` varchar(1) DEFAULT NULL,
  `ds_conhecimento` text,
  `dt_nascimento` datetime DEFAULT NULL,
  `st_status` varchar(1) DEFAULT NULL,
  `dt_cadastro` datetime NOT NULL,
  `st_batizado` varchar(1) NOT NULL,
  `st_eucaristia` varchar(1) NOT NULL,
  `st_crisma` varchar(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_membro`
--

INSERT INTO `tb_membro` (`co_membro`, `no_membro`, `ds_endereco`, `ds_bairro`, `nu_tel1`, `nu_tel2`, `nu_tel3`, `no_responsavel`, `ds_email`, `st_estuda`, `st_trabalha`, `ds_conhecimento`, `dt_nascimento`, `st_status`, `dt_cadastro`, `st_batizado`, `st_eucaristia`, `st_crisma`) VALUES
(2, 'LETICIA MARTINS DE SOUSA', 'QR 213 conj. 04 casa 04', 'Samambaia Norte', '(61) 9256-1414', '', '(61) 3459-6243', 'Márcia Rejane de Sousa', 'leticia.martinsousa@hotmail.com', 'S', 'N', '', '2000-02-23 00:00:00', 'N', '2015-09-08 23:40:58', 'S', 'S', 'N'),
(3, 'Cecília Pereira de Souza', 'Qr 601 conjunto 18 casa 11', 'Samambaia Norte', '(61) 8626-7176', '(61) 8228-5287', '(61) 3357-2919', 'Silvane Aparecida Pereira de Souza ', 'cecilia.souzaba7@gmail.com', 'S', 'N', 'Por meio da paróquia São João Evangelista, e vários amigos que fazem parte do grupo jovem. ', '2002-04-26 00:00:00', 'N', '2015-09-08 23:41:04', 'S', 'S', 'N'),
(5, 'Lucas Miranda Gontijo', 'Qr 401 conjunto 09 casa 30', 'Samambaia Norte', '(61) 9410-2650', '', '(61) 3358-5155', 'Lucas Miranda Gontijo', 'Lucasgontijomaria@hotmail.com', 'N', 'N', 'Através de amigos. ', '1996-11-09 00:00:00', 'N', '2015-09-08 23:47:46', 'S', 'S', 'S'),
(6, 'Suyane Tallita ', 'Qr 207 conjunto 01 casa 26', 'Samambaia norte', '(61) 9300-1679', '', '(61) 3459-2093', 'Lidiane Reis Silva ', 'Suyane.silvastrs@gmail.com', 'S', 'N', 'Amigos da escola e amigos da igreja! !', '1998-07-11 00:00:00', 'N', '2015-09-08 23:48:35', 'S', 'S', 'S'),
(7, 'Danilo Rodrigues Bezerra', 'Qr 423 Cj 12 Casa 26', 'Samambaia Norte ', '(61) 9415-5719', '(61) 9175-6764', '(61) 3359-6391', 'Ana Arlete Rodrigues Bezerra ', 'Dan.Fazenda@hormail.com', 'S', 'N', '', '1998-04-06 00:00:00', 'N', '2015-09-08 23:50:20', 'N', 'N', 'N'),
(9, 'Nicole Yale', 'Qr 403 conjunto 06 casa 30', '', '6198706294', '6198706294', '6198706294', 'Alaíde Rocha', 'nicoleyale.ny@gmail.com', 'S', 'N', 'Através de um amigo que era do Gej ', '1999-05-06 00:00:00', 'N', '2015-09-08 23:54:22', 'S', 'S', 'S'),
(10, 'Maysa Pereira Dias', 'QR 407 conj. 2 casa 6', 'Samambaia Norte', '(61) 9668-1204', '', '(61) 3359-3317', 'Maria Pereira dos S. Dias', 'maysapd@hotmail.com', 'S', 'N', 'Pelas fundadoras, no ano da fundação.', '1997-07-13 00:00:00', 'N', '2015-09-08 23:57:44', 'S', 'S', 'S'),
(11, 'Lilian Machado Carvalho Bessa', 'QR 403 conjunto 10 casa 28', 'Samambaia', '(61) 9106-6240', '', '(61) 3082-6060', 'Lilian Bessa', 'lililasp@gmail.com', 'S', 'S', 'Sou fundadora rs', '1988-10-31 00:00:00', 'N', '2015-09-09 00:30:45', 'S', 'S', 'S'),
(12, 'Paulo Vitor Rodrigues de Oliveira', 'QR 401 Conjunto 20 Casa 07', 'Samambaia Norte', '(61) 9429-3606', '', '(61) 3458-2565', 'Antônia Ieda Rodrigues dos Reis', 'paulovitor3005@gmail.com', 'S', 'S', 'Através do retiro da crisma e de eventos organizados pelo grupo.', '1997-05-30 00:00:00', 'N', '2015-09-09 00:41:22', 'S', 'S', 'S'),
(13, 'Fernando Rodrigues', 'QR 213 conjunto 03 casa 18', 'Norte', '(61) 9214-0660', '(61) 9277-1024', '(61) 3459-3635', 'Marilene Rodrigues Mesquita', 'Fernandorodrigues.frm@gmail.com', 'N', 'N', 'Através de amigos.', '1992-08-02 00:00:00', 'N', '2015-09-09 01:52:15', 'S', 'S', 'S'),
(14, 'Kamila Silva', 'Qr 405 conjunto 25 casa 05', 'Samambaia ', '(61) 8553-9668', '', '(61) 3083-9668', 'Eurides', 'kamilaf.silva@hotmail.com', 'S', 'N', 'Pelo Elliel ????', '1999-01-17 00:00:00', 'N', '2015-09-09 06:06:08', 'S', 'S', 'S'),
(15, 'Linneker Lima', 'QR 405 conj 13 casa 13', 'Samambaia ', '(61) 8228-6402', '', '(61) 3459-4937', 'Eliene Lima', 'Linnekerlima@hotmail.com', 'N', 'S', 'Por meio de amigos.', '1995-10-04 00:00:00', 'N', '2015-09-09 06:31:55', 'S', 'S', 'S'),
(16, 'Letícia Pereira da Silva', 'Quadra 301 conjunto 07 lote 1/6 apto 1005 bloco A Condomínio Via Tropical ', 'Samambaia Sul', '(61) 9297-8818', '(61) 9277-1024', '(61) 9214-0660', 'Joelma Aparecida Pereira Batista', 'lelekinha.pereira@gmail.com', 'S', 'N', 'Na igreja e através das redes sociais !!', '1999-08-03 00:00:00', 'N', '2015-09-09 06:50:54', 'S', 'S', 'N'),
(17, 'ALEXANDRE BARBOSA DE ARAUJO', 'Qr 411 conj 6 casa 2', 'Samamabaia Norte', '(61) 8500-1641', '', '(61) 3359-3458', 'Alice', '', 'S', 'S', '', '1999-07-30 00:00:00', 'N', '2015-09-09 07:32:47', 'S', 'S', 'S'),
(18, 'Rômulo Dias Miranda Cardoso', 'qn 211 conj 01 casa 35', 'Samambaia Norte', '(61) 8522-0757', '', '(61) 3359-8257', 'Maria Celis Miranda dos Santos', 'romulomiran@hotmail.com', 'S', 'S', 'na Crisma de 2013 e me apaixonei por esses chatos. ', '1997-05-23 00:00:00', 'N', '2015-09-09 07:46:30', 'S', 'S', 'S'),
(19, 'larissa silva de jesus ', 'qr 401 conjunto 29 casa 11 ', 'samambaia norte ', '(61) 8654-0043', '(61) 9210-8830', '(61) 3082-6958', 'maria claudenice costa da silva ', 'larisssasilvaj@hotmail.com', 'N', 'S', 'por mim mesma ,obrigada ', '1996-03-07 00:00:00', 'N', '2015-09-09 08:11:00', 'S', 'S', 'S'),
(20, 'Maria Eduarda Lima Roberto Gomes', 'Qr 405 - Conj 13 - Casa 13', 'Samambaia Norte', '(61) 8644-6915', '', '(61) 3459-4937', 'Eliene ', '', 'S', 'N', '', '2001-04-11 00:00:00', 'N', '2015-09-09 17:16:09', 'S', 'S', 'N'),
(21, 'Rita de Cássia', 'QR: 403 conjunto: 3 casa: 26', 'Samambaia norte', '(61) 9280-4066', '', '', 'Antônia Aurinete ', 'ritadecassia201183@hotmail.com', 'S', 'S', '', '1997-11-03 00:00:00', 'N', '2015-09-09 17:16:27', 'S', 'S', 'S'),
(22, 'Taiane Ferreira Souto', 'QR 508 CONJ 01 CASA 23', 'Samambaia Sul', '(61) 9368-7908', '(61) 8682-2644', '', 'Maria do Socorro Gomes Ferreira', 'taianecat2009@homtail.com', 'S', 'S', 'Através de uma amiga que faz partes do grupo , e pelos Retiros de Carnaval .', '1999-02-26 00:00:00', 'N', '2015-09-09 17:17:40', 'S', 'S', 'S'),
(23, 'Alessandra de Sousa Pereira', 'Qr 403 conj 03 casa 26', 'Samambaia', '(61) 9146-5160', '', '', 'Antônia Aurinete', 'Sandraaa1589@gmail.com', 'S', 'N', '', '2000-09-09 00:00:00', 'N', '2015-09-09 17:18:31', 'S', 'N', 'N'),
(24, 'Pâmela Cristina Ferreira Souto', 'QR 508 CONJ 01 CASA 23', 'Samambaia Sul', '(61) 9426-8941', '(61) 8682-2644', '', 'Maria do Socorro Gomes Ferreira', 'taianecat2009@homtail.com', 'S', 'N', 'Através de uma amiga que faz parte do grupo .', '1997-10-31 00:00:00', 'N', '2015-09-09 17:18:55', 'S', 'S', 'S'),
(25, 'Mariana Silva Gomes', 'QR 603 Conjunto 06 Lote 11', 'Samambaia Norte', '(61) 8642-7684', '(61) 8274-1015', '(61) 3357-3502', 'Maria Ivone Silva Gomes', 'silvagomesmari@hotmail.com', 'S', 'N', 'Conversando com minhas catequistas,pedindo orientações de como me aproximar mais da Igreja,me indicaram o Gej..', '2001-07-10 00:00:00', 'N', '2015-09-09 17:20:00', 'N', 'N', 'N'),
(26, 'Wellington Gomes da Cunha Freitas', 'QR 211 CONJUNTO 05 CASA 20 ', 'Samambaia Norte e ', '(61) 8345-4255', '(61) 8552-9714', '(61) 3359-6366', '', 'welfre@gmail.com.br', 'S', 'S', 'Através de uma parente ', '1990-12-25 00:00:00', 'N', '2015-09-09 17:24:07', 'S', 'S', 'S'),
(27, 'Francisco Henrique Mota de Souza', 'QR: 425 CJ:27 CS:05', 'Samambaia Norte', '(61) 9547-9913', '', '(61) 3359-5307', 'Luzia Paulino de Souza', 'fhms1996@gmail.com', 'S', 'S', 'Através de um amigo.', '1996-01-30 00:00:00', 'N', '2015-09-09 17:31:06', 'S', 'S', 'S'),
(28, 'JAIME ABTIBOL PEREIRA', 'QR 209 CONJUNTO 07 CASA 16', 'SAMAMBAIA NORTE', '(61) 8212-4379', '', '', '', 'jaime.abtibol@gmail.com', 'S', 'S', 'Convite ', '1993-02-05 00:00:00', 'N', '2015-09-09 17:33:31', 'S', 'S', 'S'),
(29, 'Mailson Costa de Aguiar', 'qr 403 cj 10 cs 21', 'samambaia', '(61) 8244-9829', '', '(61) 3357-6475', 'Eliane Ferreira Costa', '', 'S', 'N', 'Pelo retiro de crisma', '1999-07-09 00:00:00', 'N', '2015-09-09 17:35:28', 'S', 'S', 'S'),
(30, 'Priscila Martins Matias', 'Qr 213 conjunto 05 casa 09', 'Samambia Norte ', '(61) 9167-5324', '(61) 9251-2368', '(61) 3359-3574', 'Rita Maria Martins do Nascimento ', 'Priscilamartins213@gmail.com', 'N', 'N', 'Por amigos ', '1999-02-03 00:00:00', 'N', '2015-09-09 17:37:24', 'S', 'S', 'S'),
(31, 'Ana Caroline Alves da Rocha', 'Qr 401 conj 05 casa 06 ', 'Samambaia Norte ', '(61) 8373-1714', '(61) 8296-4439', '', 'Ana Caroline Alves da Rocha ', 'ana.carolinerocha95@hotmail.com', 'N', 'S', 'Através das maravilhosas Lilian e Letícia que me deram aula de Catequese anos antes do Gej ser fundado. ', '1995-11-02 00:00:00', 'N', '2015-09-09 17:45:38', 'S', 'S', 'S'),
(32, 'Luana Ribeiro Bessa', 'QR 405 CONJUNTO 21 CASA 26', 'Samambaia Norte', '(61) 9198-4370', '', '(61) 3359-3397', 'Luana Ribeiro Bessa', 'lukka_bessa@hotmail.com', 'N', 'S', 'Atraves da inspiração que Deus nos deu após uma vigilia com as reliquias de Dom Bosco :)', '1993-08-17 00:00:00', 'N', '2015-09-09 17:49:33', 'S', 'S', 'S'),
(33, 'Filipe Santos Silva', 'Qr603 ch39 lote 31 condomínio Vida Nova', 'Samambaia Norte', '(61) 9367-2587', '', '', '', 'Filipesantos010@gmail.com', 'S', 'N', '', '1996-03-22 00:00:00', 'N', '2015-09-09 17:51:02', 'S', 'S', 'S'),
(34, 'Poliana Martins Soares', 'Qr 208 conj 22 casa 04', 'Samambaia Norte', '(61) 8564-7543', '', '', 'Damiana Adália Soares', 'polianamartins_02@outlook.com', 'S', 'N', 'Através de amigos! ', '1999-02-02 00:00:00', 'N', '2015-09-09 17:52:23', 'S', 'S', 'S'),
(35, 'Paulo Henrique Souza', 'qr405conj18casa06', 'samambaia norte', '(61) 9968-6839', '(61) 8254-7440', '', 'Ana Lúcia Martins Souza', 'paulo_10df@hotmail.com', 'S', 'S', 'No retiro de crisma', '1999-12-23 00:00:00', 'N', '2015-09-09 17:56:18', 'S', 'S', 'S'),
(36, 'Rafael Silva de oliveira', 'QR 213 conjunto 03 casa 26', 'Samambaia Norte ', '(61) 8566-5983', '(61) 8566-5983', '(61) 8566-5983', 'Rosangela Maria Silva Santos ', 'rafael_flatro@hotmail.com', 'S', 'N', 'Através da primeira Vigília ', '1995-12-19 00:00:00', 'N', '2015-09-09 17:56:31', 'S', 'S', 'N'),
(37, 'Rodrigo De Sousa Soares', 'Qr 404 conjunto 14 casa 26', 'Samambaia Norte', '(61) 8590-3990', '', '(61) 3045-9022', 'Raimunda Pereira de Sousa', 'rodrigodisousa@gmail.com', 'S', 'N', 'conheci o gej através de conhecidos que faziam parte do grupo e me convidaram pra primeira vigilia alegria que vem de Deus ai participei do retiro de carnaval e me apaixonei pelo carisma do grupo', '1997-02-16 00:00:00', 'N', '2015-09-09 18:12:58', 'S', 'S', 'S'),
(38, 'Dion Lucas Serafim Bispo', 'QR 207 CJ 04 CS 11', 'samambaia ', '(61) 8548-7443', '(61) 9301-4651', '(61) 3459-9124', 'Dion Lucas Serafim Bispo', 'lucasgejeriano@gmail.com', 'S', 'N', 'Através de uma prima de um amigo irmão ', '1997-08-04 00:00:00', 'N', '2015-09-09 18:18:01', 'S', 'S', 'S'),
(39, 'Lucas Lopes de Oliveira', 'QR 411 conjunto 11 casa 06', 'Samambaia Norte', '(61) 9870-3831', '(61) 8479-9360', '(61) 3359-5376', 'Maria Aparecida', 'lucas9360@gmail.com', 'S', 'N', 'Na crisma', '1998-02-11 00:00:00', 'N', '2015-09-09 18:23:54', 'S', 'S', 'S'),
(40, 'Julia Fernanda Braga da Silva', 'Qr 403 conjunto 06 casa 05 ', '', '(61) 8499-4010', '', '(61) 3082-5058', 'Simone gerônimo da Silva ', '', 'S', 'N', 'Através da crisma ', '1999-11-30 00:00:00', 'N', '2015-09-09 18:27:32', 'S', 'S', 'N'),
(41, 'raul dias miranda cardoso', 'qn 211 conjunto 01 casa 35', 'samambaia', '(61) 9512-1814', '', '(61) 3359-8257', 'maria celis miranda dos santosa', 'raulmiran@hotmail.com', 'S', 'N', '', '2001-04-27 00:00:00', 'N', '2015-09-09 18:28:42', 'S', 'S', 'N'),
(42, 'Gabriel Da Silva Barbosa', 'Qr 405 , Conjunto 12 Casa 16', 'Samambaia', '(61) 8549-4269', '(61) 8322-9009', '', 'Maria Vilanir Da Silva Barbosa', 'bielzinhogta_2009@hotmail.com', 'S', 'N', 'O grupo Gej Dom Bosco foi quem fez a minha Crisma !', '1998-03-02 00:00:00', 'N', '2015-09-09 18:29:18', 'S', 'S', 'S'),
(43, 'Manoel Pereira dos Reis neto', 'Qr 405 conjunto 10 casa 15', '', '(61) 9663-3265', '', '(61) 3459-6546', 'Marilda dos reis oliveira', 'Manoelpereira58@gmail.com', 'S', 'N', 'Por amigos ', '1998-08-07 00:00:00', 'N', '2015-09-09 18:34:14', 'S', 'S', 'S'),
(44, 'Ana Melyna Oliveira', 'Qr 202 conjunto 10 casa 23', '', '(61) 9102-2772', '', '(61) 3458-5448', 'Joelene', 'melyna_sousa@outlook.com', 'S', 'N', 'Através da primeira Virgília ', '2001-01-11 00:00:00', 'N', '2015-09-09 18:43:46', 'S', 'S', 'N'),
(45, 'Mickelly Sousa dos Santos', 'QR 401 Conjunto 01 Casa 08', 'Samambaia', '(61) 8109-5770', '(61) 9218-5622', '', 'Ana Célia Azevedo Barros', 'mickelly. 123@gmail.com', 'S', 'N', 'Através de uma visita, durante uma aula de crisma. ', '1998-01-29 00:00:00', 'N', '2015-09-09 18:59:12', 'S', 'N', 'S'),
(46, 'ERICA STEPHANIE DE SOUSA CARVALHO', 'QR 205 CONJUTO 02 CASA 18', 'SAMAMBAIA NORTE', '(61) 8195-1313', '(61) 8464-0608', '(61) 3357-1919', 'solangecarvalho''', 'solpereirasousa@hotmail.com', 'S', 'N', 'PELO MEUS AMIGO E MEU IRMAO QUE JA FOI PARTICIPANTE DO GRUPO', '2000-12-02 00:00:00', 'N', '2015-09-09 19:09:06', 'S', 'S', 'N'),
(47, 'Karolyne aguiar', 'Karolyneaguiar_bsb@hotmail.com', 'Samambaia ', '(61) 8246-0606', '', '(61) 3357-0651', 'Sônia Maria ', '', 'S', 'N', '', '2000-11-28 00:00:00', 'N', '2015-09-09 19:11:56', 'S', 'N', 'N'),
(48, 'Carolina isabelle lopes oliveira', 'Qr209 conj.05 casa28', 'samambaia', '(61) 8563-9907', '(61) 8302-6209', '(61) 3459-9091', 'Adelina lopes oliveira', '', 'S', 'N', 'Depois da virgilia.', '2000-01-22 00:00:00', 'N', '2015-09-09 19:13:35', 'S', 'S', 'N'),
(49, 'Joyce Lopes', 'QR 609 01 02', 'Samambaia norte', '(61) 9393-3476', '', '(61) 3459-3241', 'Janaina lopes', 'Joycefe.lopes@gmail.com', 'S', 'S', 'Através da crisma ', '1998-10-28 00:00:00', 'N', '2015-09-09 19:32:33', 'S', 'S', 'S'),
(50, 'Fernanda Lima', 'Qn 211 conjunto 02 casa 51 lote 02', 'Samambaia Norte', '(61) 9813-3206', '', '(61) 3559-1097', 'Rita Rodrigues Da Silva', 'Fernanda.karla.15@hotmail.com', 'S', 'N', 'Pela 1° vigilia Alegria que vem de Deus', '2000-03-15 00:00:00', 'N', '2015-09-09 19:37:40', 'S', 'S', 'S'),
(51, 'Nathalia Pereira Dias', 'QR 407 conjunto 02 casa 06', 'Samambaia Norte ', '(61) 9955-5202', '', '(61) 3359-3317', 'Maria Pereira dos Santos Dias', 'naathpdias@hotmail.com', 'S', 'N', 'Pela minha irmã que já tinha sido integrante', '2001-03-29 00:00:00', 'N', '2015-09-09 19:56:52', 'S', 'S', 'N'),
(52, 'Elliel Kassio dos Santos Ferreira', 'Qr 209 Conjunto 02 Casa 17', 'Samambaia Norte', '(61) 9603-5922', '', '(61) 3459-9565', 'Izabel Maria dos Santos Ferreira', 'elliel.ferreira@outlook.com', 'S', 'S', 'Através do Despertar Vocacional', '1998-09-03 00:00:00', 'N', '2015-09-09 20:53:57', 'S', 'S', 'S'),
(53, 'Karen Mialichi da Silva Maia', 'QR 212 conjunto 14 casa 15', 'Samambaia Norte', '(61) 8623-1547', '', '(61) 3458-6671', 'Ivanildes da Silva Maia', 'karenmialichii@gmail.com', 'S', 'N', 'Através de amigos integrantes do GEJ.', '2000-01-29 00:00:00', 'N', '2015-09-09 21:42:14', 'S', 'S', 'N'),
(54, 'Diego Roca da Silva', 'QR 211 conjunto 02 casa 26', 'Norte ', '(61) 9109-8481', '(61) 8570-4620', '(61) 3359-5182', 'Maria Edileuza da costa rocha', 'diegorsilva211@gmail.com', 'N', 'S', 'Frequentando as missas na Paróquia São João evangelista e amigos !  ', '1995-11-14 00:00:00', 'N', '2015-09-09 22:07:42', 'N', 'N', 'N'),
(55, 'Beatriz Gomes dos Santos', 'QR 405 Conjunto 15 Casa 08', 'Samambaia Norte', '(61) 8634-6115', '(61) 9337-8081', '(61) 3459-5545', 'Maria Iraldina Gomes dos santos', 'beatrizgomes_gsm@hotmail.com', 'S', 'N', 'Atraves da minha prima que ja era menbro do grupo e pelo retiro da Crisma', '1997-07-27 00:00:00', 'N', '2015-09-09 22:22:33', 'S', 'S', 'S'),
(56, 'Fernanda Gomes de Freitas Moura', 'QR 405 conjunto 08 casa 15 ', 'Samambaia Norte ', '(61) 8499-5380', '', '(61) 3359-2508', 'Geni Gomes ', 'fehs2gomes@hotmail.com', 'S', 'S', 'Através do meu irmão. ', '1998-11-25 00:00:00', 'N', '2015-09-09 22:26:31', 'S', 'S', 'S'),
(57, 'Karine Victoria Oliveira da silva', 'Qr  603 chácara 39 Rua 4 casa 52A', 'Samambaia norte', '(61) 8578-4112', '', '', 'Márcia Francina de oliveira', 'Karinekamillygatinhas@Gmail. Com', 'N', 'N', '', '2000-07-20 00:00:00', 'N', '2015-09-09 22:43:03', 'N', 'N', 'N'),
(59, 'LETÍCIA MACHADO CARVALHO BESSA', 'Qr 403 Cj 10 Cs 28', 'Samambaia Norte', '(61) 9105-8681', '(61) 8337-5957', '(61) 3082-6060', '', 'lelebessa@gejdombosco.com.br', 'S', 'S', '', '1992-08-27 00:00:00', 'N', '2015-09-09 22:54:48', 'S', 'S', 'S'),
(60, 'Gabriel Ribeiro de Sousa Figueiredo', 'Qr-401 Cj-25 Cs-27', 'Samambaia Norte', '(61) 8431-4769', '(61) 8605-0624', '(61) 3013-0440', 'Gessivan Ribeiro de souza', 'gabrielribeirosf@gmail.com', 'S', 'N', 'Atravez de amigos da comunidade ', '2000-01-04 00:00:00', 'N', '2015-09-09 22:58:05', 'S', 'S', 'N'),
(62, 'Rafael Paulino', 'QR 401 conj 16 casa 14', 'samambaia norte', '(61) 8520-2835', '', '', '', '', 'S', 'N', '', '2001-02-25 00:00:00', 'N', '2015-09-10 00:44:03', 'S', 'S', 'N'),
(63, 'Douglas Souza', 'Qr 403 cj 02 casa 20', 'Samambaia Norte', '(61) 8652-8982', '', '', 'Elias Martins', '', 'N', 'N', '', '1997-03-18 00:00:00', 'N', '2015-09-10 09:30:58', 'N', 'N', 'N'),
(64, 'Vivian Belmira Rosa dos Santos', 'qn 209 cj 02 cs 22', 'samambaia norte', '(61) 9517-7369', '', '', 'antônia', 'vivianbelmira@gmail.com', 'S', 'N', 'Por amigos e pela igreja', '1998-09-23 00:00:00', 'N', '2015-09-10 09:53:25', 'S', 'N', 'N'),
(65, 'Thiago Marinho de Oliveira Vilas Boas', 'QR 405 CONJUNTO 11 CASA 07', 'Samambaia', '(61) 9624-0659', '', '(61) 3459-9830', 'Maria Aparecida Vilas Boas', 'Grupovillasboas@hotmail.com', 'S', 'N', '1° vigília alegria que vem de Deus', '2000-08-18 00:00:00', 'N', '2015-09-10 10:17:15', 'S', 'S', 'N'),
(66, 'kamilly victoria oliveira da Silva', 'QR 603 CHA.39 RUA 4 CASA 52 A CONDOMINIO VIDA NOVA ', 'samambaia-norte ', '(61) 8638-4219', '', '(61) 3458-5655', 'Márcia Francine ', 'kamilly2001_victoria@gmail.com', 'S', 'N', 'sou da paróquia a muito tempo,e conheci o gej através da minha irmã e então já quis conhece,participa dessa família maravilhosa', '2001-12-05 00:00:00', 'N', '2015-09-10 11:27:07', 'S', 'S', 'N'),
(67, 'Islene Aguiar Do Nascimento', 'Qr 417 Conj 01 Casa 10', 'Samambaia Norte', '(61) 8587-0864', '(61) 9189-3307', '(61) 3459-9632', 'Ivana Maria Aguiar Do Nascimento', 'isleneaguiar@gmail.com', 'S', 'N', 'conheci o Gej pelo retiro de Crisma ', '1998-06-14 00:00:00', 'N', '2015-09-10 11:34:50', 'S', 'S', 'S'),
(68, 'CARLOS CHISTIAN', 'QR 207 Conj 5 Casa 20', 'Samambaia Norte', '(61) 8529-2731', '', '', 'Maria Aparecida', 'Carloschristian03@gmail.com', 'N', 'S', 'Através de uns amigos a dois anos atrás ', '1996-05-25 00:00:00', 'N', '2015-09-10 11:42:21', 'S', 'S', 'S'),
(69, 'Daniel Negreiro Marciel', 'QR 205 CONJUNTO 03 CASA 34', 'Samambaia Norte ', '(61) 8576-6304', '(61) 8576-6304', '', 'Julio César Quirino Marciel Rodrigues', 'Daniel@glacon.com.br', 'S', 'S', 'Por amigos ', '1998-05-14 00:00:00', 'N', '2015-09-10 12:10:29', 'S', 'S', 'S'),
(70, 'Paloma Rayssa da Silva dos Santos', 'QR 402 CONJUNTO 24 CASA 05', 'Samambaia Norte- Brasília', '06191071150', '', '33572555', 'Dirceu Maria / Luiz Diogo', 'rpaloma0@gmail.com', 'S', 'N', 'Retiro de carnaval', '1998-04-21 00:00:00', 'N', '2015-09-10 12:48:20', 'S', 'S', 'N'),
(71, 'Cinara Medeiro Martins', 'Qr 413 conj 11 casa 10', 'Samambaia Norte ', '(61) 9122-5633', '(61) 8329-1744', '(00) 0000-0000', 'Francisca Irene e António Francisco', 'cinaramedeiros1313@gmail.com', 'S', 'N', 'Por a crisma', '1998-06-15 00:00:00', 'N', '2015-09-10 15:25:08', 'S', 'S', 'S'),
(72, 'Gideon Morais Alves', 'qr 209 cj 07 cs 09', 'Samambaia Norte', '(61) 9108-5943', '', '', '', '', 'N', 'N', '', '1998-05-31 00:00:00', 'N', '2015-09-10 16:27:06', 'N', 'N', 'N'),
(73, 'Leonardo Machado Carvalho bessa', 'qr 403 conjunto 10 casa 28', 'Samambaia Norte', '(61) 9327-4991', '(61) 8400-5270', '(61) 3082-6060', '', 'leonardomcbessa@gmaill.com', 'N', 'S', 'Pelas Irmãs Bessa', '1984-07-06 00:00:00', 'N', '2015-09-10 17:10:15', 'S', 'S', 'S'),
(74, 'Bárbara Fonseca', 'QR 414 conjunto 13 casa 17', 'Samambaia Norte', '(61) 8408-6741', '(61) 8407-0644', '(61) 3039-5165', 'Elaine Maria da Silva', 'babynhalidnha_@hotmail.com', 'S', 'N', 'Pela I Vigília Alegria que vem Deus ', '1998-06-07 00:00:00', 'N', '2015-09-10 18:56:03', 'S', 'S', 'N'),
(75, 'Cellyne de Souza', 'Qr 110 conjunto 19 casa 12', 'Samambaia sul', '61 81379948', '61 83383704', '33587242', 'Jucirene de Souza ', 'ju_jsm_@hotmail.com', 'S', 'N', 'Por pessoas que participam ', '2000-09-30 00:00:00', 'N', '2015-09-10 21:09:55', 'S', 'S', 'N'),
(76, 'Andressa cristina da silva feitoza', 'Qr 205 conjunto 06 lote 08 casa 02 ', 'Samambaia norte ', '(61) 8208-4583', '', '(61) 3359-3693', 'Waldiria ', 'dedessa1669@gmail.com', 'S', 'N', 'Através da igreja e de amigos...', '2000-07-31 00:00:00', 'N', '2015-09-10 23:21:41', 'S', 'S', 'N'),
(77, 'Bruno Silva Pereira', 'Qr 405 conj 16 casa 33', 'Samambaia Norte', '(61) 8594-9715', '', '(61) 3082-6966', 'Mara Camila Silva Braga', 'Bruno-mxm@hotmail.com', 'S', 'N', 'Pelo convite depois da minha crisma', '1999-11-29 00:00:00', 'N', '2015-09-11 10:09:26', 'S', 'S', 'S'),
(78, 'Maria Laura Bastos de Souza (Laura)', 'QR 403 CONJUNTO 07 CASA 10', 'SAMAMBAIA NORTE', '(61) 8487-6065', '(61) 8449-9903', '(61) 3458-8419', 'MARIA DA CONCEIÇÃO BASTOS GONÇALVES ', 'laura.baastosd@gmail.com', 'S', 'S', 'Na paróquia. Após minha crisma, pelas catequistas.', '1995-03-28 00:00:00', 'N', '2015-09-11 10:27:10', 'S', 'S', 'S'),
(79, 'Geraldo henrique de Lima Junior', 'Qr406 conj 01 casa 26', 'Samambaia  norte', '(61) 9123-3030', '(61) 8644-8574', '(61) 3358-6605', 'Joselina Ribeiro  de moura ', 'henrique.jr93@gmail.com', 'S', 'S', 'Com amigos ', '1998-02-14 00:00:00', 'N', '2015-09-11 13:10:03', 'S', 'S', 'S'),
(80, 'Lara de souza felix', 'Qr403 cj 9 cs 20', 'samambaia norte', '(61) 8541-5218', '', '(61) 3358-2381', 'maria Lucilene ', 'larafeelix@gmail.com', 'S', 'N', 'Minha prima que me apresentou ', '2000-06-17 00:00:00', 'N', '2015-09-11 14:36:47', 'N', 'N', 'N'),
(81, 'Diego Pimenta Rodrigues', 'Quadra 221 Conjunto 03 Casa 19', 'Norte', '(61) 8447-1448', '', '(61) 3359-6093', 'Vespasiana Rocha Rodrigues', 'diegodeus456@gmail.com', 'S', 'N', 'Virgília Dom Bosco', '1998-09-13 00:00:00', 'N', '2015-09-11 16:59:01', 'S', 'S', 'S'),
(82, 'Fabrício Alves Oliveira', 'QR 421 conjunto 16 casa 03', 'Samambaia Norte ', '(61) 9410-8557', '(61) 9398-7791', '(61) 3359-2037', 'Maria de Jesus Alves Oliveira', 'fabricio_setemares@hotmail.com', 'S', 'N', 'Eu conheci na primeira Virgília e ai sempre fui doido para entrar desde quando conheci,fui nas duas virgilias,e não quero perder essa oportunidade de entrar pro melhor grupo ', '2001-07-05 00:00:00', 'N', '2015-09-11 17:11:35', 'S', 'S', 'N'),
(83, 'darley Almeida', 'Qr 213 conjunto 05 casa 09', 'Samambia Norte ', '(61) 9408-4434', '', '', '', '', 'S', 'N', 'Através de um amigo ', '1994-09-28 00:00:00', 'N', '2015-09-11 17:55:51', 'N', 'N', 'N'),
(84, 'Sabrina Alves', 'Qr 414 conjunto 16 casa 31', 'Samambaia Norte ', '(61) 8182-5248', '', '', 'Bia Alves Carvalho ', 'bininha_405@hotmail.com', 'S', 'N', 'Através da Crisma ', '1997-07-19 00:00:00', 'N', '2015-09-11 18:50:26', 'S', 'S', 'S'),
(85, 'Jerlane Soares Magalhaes Da Silva', 'Qr 211 conj 01 casa 26', 'Samambaia norte', '(61) 9584-0876', '(61) 9369-7311', '', 'Maria Edileuza', 'jerlanesilva06@hotmail.com.br', 'S', 'N', 'Pelo Rômulo q me apresentou ao grupo e naum me arrempendo de ter conhecido o Gej', '2001-02-06 00:00:00', 'N', '2015-09-11 22:42:20', 'S', 'S', 'N'),
(86, 'Marcos Rian Tomé de Oliveira', 'QR 401 CONJ 20 CASA 08', '', '(61) 8481-3867', '', '(61) 3357-0832', 'Ataliba', 'Rian.fla65@gmail.com', 'S', 'N', 'Pelo meu primo ( Paulo Vitor )', '2015-09-18 00:00:00', 'N', '2015-09-12 19:38:15', 'S', 'S', 'N'),
(87, 'Gabrielle Rodrigues Oliveira', 'qn211conjuto 2 casa 4', 'samambaia', '(61) 9120-3923', '(61) 9245-7360', '', 'Maria do Socorro Rodrigues Santos', 'gabriele25_@hotmail.com', 'S', 'N', 'Atravez da 1° virgilia alegria que vem de Deus !', '2000-03-04 00:00:00', 'N', '2015-09-12 20:49:31', 'S', 'S', 'N'),
(88, 'Atila Santos Lima', 'Qr 209 Conjunto 05 Casa 17', 'Norte', '(61) 9395-0808', '', '', '', 'atilla.santos@outlook.com', 'S', 'S', 'Através da crisma', '2015-10-18 00:00:00', 'N', '2015-09-13 10:11:43', 'S', 'S', 'S'),
(89, 'Leander Guilherme Silva Saraiva', 'Qr405 cj16 Cs33', 'Samambaia norte', '(61) 8616-9388', '', '(61) 3082-6966', 'Marcella Priscila da Silva Braga', 'leander1guilherme@gmail.com', 'S', 'N', 'Através do meu primo.\r\n', '1999-09-28 00:00:00', 'N', '2015-09-13 10:39:14', 'S', 'N', 'N'),
(90, 'kivia pereira de souza', 'Qr 407conj 04 casa 07 ', 'samambaia norte', '(61) 8609-9037', '(61) 8639-1113', '(61) 3459-6493', 'Ana lidia pereira de souza ', 'kivia407@gmail.com', 'S', 'N', 'Através de pessoas principalmente da sabrina ela me falou que o gej era tudo de bom e me chamou para fazer parte dessa família e eu pensei bem e agora quero participar . ;)', '2000-11-01 00:00:00', 'N', '2015-09-13 10:41:47', 'S', 'S', 'N'),
(91, 'Geovana Vieira Mendes', 'Qr 205 conjunto 05 casa 11', 'Samambaia Norte', '(61) 9637-9652', '', '', 'Gildeni Mendes Vieira Queiroz', 'Gil100mendes@gmail.com', 'S', 'N', 'Atraves dos encontros catequéticos', '2001-10-01 00:00:00', 'N', '2015-09-13 13:16:51', 'S', 'S', 'N'),
(92, 'Karolina Mota de Aguiar', 'QR 209 conjunto 05 casa 27', 'Norte', '(61) 9331-6425', '(61) 8584-0551', '(61) 3359-6361', 'Edileus mota Araújo ', 'karollina@live.com', 'S', 'N', 'No meu retiro da crisma em 2012', '1997-04-30 00:00:00', 'N', '2015-09-14 18:03:43', 'S', 'S', 'S'),
(94, 'Lucrece Neri Portela', 'Qr 403 Conjunto 16 Casa 17 ', 'Samambaia Norte', '(61) 9315-1297', '', '(61) 3358-8725', 'Lucilene Aguiar Neri Portela', 'lucrece.neri@hotmail.com', 'N', 'S', 'Conheci o GEJ no ano de 2012 em uma visita com convite na minha sala de catequese.', '1996-11-06 00:00:00', 'N', '2015-09-14 18:52:34', 'S', 'S', 'S'),
(95, 'Brenno Silva', 'QR 401 conjunto 29 casa 11', 'Samambaia', '(61) 8672-2667', '', '', 'Larissa Silva', 'BrennoSilva.401@outlook.com', 'S', 'N', 'Pela a Igreja', '2001-02-13 00:00:00', 'N', '2015-09-14 19:00:25', 'S', 'S', 'N'),
(96, 'Graziele de sousa nascimento', 'QR 415 cj 2 CS 19', 'Samambaia', '(61) 9241-8953', '(61) 9184-2036', '(61) 3459-1852', 'Jusiane Maria de sousa', 'Zielyprincesa415@hotmail.com', 'S', 'S', 'Através dos eventos q eles nos chamavam pra participa do grupo', '1999-08-07 00:00:00', 'N', '2015-09-14 19:34:39', 'S', 'S', 'S'),
(97, 'Dyana Batista dos Santos', 'Qr 401 conjunto 18 casa 26', 'Samambaia', '(61) 8571-9044', '', '(61) 3082-5802', 'Neymar/Joana', 'Dydy-batista@hotmail.com', 'S', 'N', 'Meu irmão participava ', '1999-09-29 00:00:00', 'N', '2015-09-15 18:57:07', 'S', 'S', 'S'),
(100, 'Marina Silva', 'QR 609 CJ 01 Cs06', 'Samambaia Norte', '(61) 9294-8068', '', '(61) 3459-1833', 'Mauro', 'Marinaibe1802@gmail.com', 'S', 'N', 'Através de amigos ', '2001-02-18 00:00:00', 'N', '2015-10-25 18:54:58', 'S', 'S', 'N'),
(101, 'Andressa Carvalho da Silva', 'Qr 603 Chac 39 Rua 3- condomínio Vida Nova casa 25 A', 'Samambaia Norte ', '(61) 8557-2017', '', '', 'Remivaldo Donizete Jesus da Silva ', 'andy.ncarvalho5@gmail.com', 'S', 'N', 'Conheci o GEJ na I vigília Alegria que vem de Deus, porém, só tive interesse de participar na II vigília Alegria que vem de Deus.', '2000-10-12 00:00:00', 'N', '2015-10-25 19:05:36', 'S', 'S', 'S'),
(102, 'Jéssica Lopes Ferreira', 'Qr 609 conj 01 casa 02', 'Samabaia norte', '(61) 9569-7376', '', '(61) 3459-3241', 'Janaína Lopes', 'Jessicalopes767@gmail.com', 'S', 'N', 'Através da minha irmã e amigos ', '2000-05-04 00:00:00', 'N', '2015-10-25 19:30:42', 'S', 'S', 'N'),
(103, 'Stéfanni Aguiar Azevêdo', 'Qr 403 conjunto 11 casa 02', 'Samambaia Norte ', '(61) 9341-6877', '', '', 'Lucilene Aguiar Neris', '', 'S', 'N', '', '1999-02-02 00:00:00', 'N', '2015-10-25 19:45:17', 'S', 'S', 'S'),
(104, 'Bruna Araújo de Matos', 'Qr 203 Conjunto 4 casa 23', 'Samambaia norte ', '(61) 9246-9704', '', '(61) 3359-4065', 'Luiza', 'bruna.a.matos@hotmail.com', 'S', 'N', 'Pela crisma ', '1995-06-30 00:00:00', 'N', '2015-10-25 21:04:44', 'S', 'S', 'S'),
(105, 'Ingrid De Oliveira', 'qr 417 cj10 casa 23', 'samambaia norte', '(61) 8649-3711', '(61) 8558-8755', '(61) 3459-7211', 'Ana Paula De Oliveira', 'ingrid_745@hotmail.com', 'S', 'N', 'com os membros do grupo gej.', '2000-06-07 00:00:00', 'N', '2015-10-25 22:26:02', 'S', 'S', 'S'),
(106, 'Mailane Noleto Espíndola', 'Qr 205 conjunto 07 casa 23 ', 'Samanbaia Norte ', '(61) 9971-7009', '(61) 8583-7009', '', '', 'Mailanespindola@gmail.com', 'S', 'S', 'Através do meu Retiro de Crisma. ', '1995-02-06 00:00:00', 'N', '2015-10-26 12:39:26', 'S', 'S', 'S'),
(107, 'João Diego Tonhá dos Santos', 'Q QR 210 Conjunto 24', '', '(61) 8535-6095', '', '6132018084', 'Jussaria de Souza Tonhá', 'diego46zinho@hotmail.com', 'S', 'N', 'Amigos ', '1996-09-15 00:00:00', 'N', '2015-10-26 12:40:46', 'S', 'S', 'S'),
(108, 'Vitória Prudêncio Lima', 'QR 421 CONJUNTO 09 CASA 11', 'Samambaia Norte', '(61) 9642-8563', '', '(61) 3559-0374', 'Maria Lima', 'vicclima123@hotmail.com', 'S', 'N', 'Através de duas pessoas que me falaram sobre ele e me chamaram para participar.', '1998-06-21 00:00:00', 'N', '2015-10-26 12:51:26', 'S', 'S', 'S'),
(109, 'Ana Clara Ferreira', 'Qr 403 conjunto 2 casa 24', 'Samambaia Norte ', '(61) 8285-9025', '', '(61) 3082-6201', 'Eraildes Madalena Ferreira ', '', 'S', 'N', 'Através da divulgação dos membros ', '1999-12-06 00:00:00', 'N', '2015-10-26 13:24:20', 'S', 'S', 'S'),
(110, 'Thaynara Barbosa de Almeida', 'Qr 209 conjunto 01 lote 28 apartamento 104', 'Samambaia norte ', '(61) 9525-0255', '(61) 8658-3590', '(61) 3359-4933', 'Maria de Jesus Barbosa de Almeida', 'thaynara.mkt@gmail.com', 'S', 'N', 'Por amigos ', '1998-05-25 00:00:00', 'N', '2015-10-26 15:26:37', 'S', 'S', 'S'),
(111, 'Davi Pereira Alves', 'QR 603, Condomínio, Rua 05, Lote 75B', 'Samambaia Norte, DF', '(61) 9438-8569', '', '(61) 3358-4911', 'Antonia Pereira da Silva', 'alves.davipereira15@gmail.com', 'S', 'N', 'Diante da minha decisão de crismar, que comentei com família, amigos e conhecidos, fui apresentado ao grupo no qual não foi apenas me oferecido participação mas também ajuda.', '2000-05-12 00:00:00', 'N', '2015-10-27 15:39:16', 'S', 'S', 'N'),
(112, 'Pâmela Virgilio dos Santos', 'Qr 405 conjunto 12 casa 08', 'Samambaia ', '(61) 8564-6765', '(61) 8409-8381', '(61) 3459-4391', 'Lúcia Virgilio ', 'pamelavirgilio063@gmail.com', 'S', 'S', 'Através de amigos que participava do GEJ.', '1999-11-23 00:00:00', 'N', '2015-10-28 13:46:26', 'S', 'S', 'S'),
(113, 'Lucas Coutinho de Lucena', 'Qr 223 conj 06 cs 19', 'Samambaia Norte', '(61) 9527-6714', '(61) 8280-7846', '', 'Eunice Coutinho de Alcobaças', 'Lucas_coutinho223@hotmail.com', 'S', 'N', '', '1996-02-04 00:00:00', 'N', '2015-10-28 18:01:40', 'S', 'S', 'S'),
(114, 'jonathan ferreira dionisio', 'QR 203 CONJUNTO 4 CASA 27', 'samambaia', '(61) 8668-4645', '', '(61) 3357-2107', 'verônica moreira da silva', 'jonatha.ferreira.dionisio@gmail.com', 'S', 'N', 'retiro crisma e no inicio da catequese da crima', '1999-12-09 00:00:00', 'N', '2015-10-31 20:00:33', 'S', 'S', 'S'),
(115, 'jonathan ferreira', 'QR 203 CONJUNTO 4 CASA 27', 'samambaia', '(61) 8668-4645', '', '(61) 3357-2107', 'verônica moreira da silva', 'jonatha.ferreira.dionisio@gmail.com', 'S', 'N', 'retiro crisma e no inicio da catequese da crima', '1999-12-09 00:00:00', 'N', '2015-10-31 20:09:26', 'S', 'S', 'S'),
(116, 'Maria Luiza Moura de Souza', 'QR 213 conjunto 03 casa 17 ', 'Samambaia Norte', '(61) 9555-4014', '(61) 8681-9609', '(61) 3459-8307', 'Mônica Moura', 'Marialuizamouradesouza@gmail.com', 'S', 'N', 'Através de dois amigos meus da escola que faz parte do Gej ', '2001-05-24 00:00:00', 'N', '2015-10-31 21:50:41', 'S', 'S', 'N'),
(117, 'Sávio Bispo Reis', 'Qr 209 conj 07 casa 06', '', '6199991627', '6199991627', '', 'Marizete bispo reis', 'savinhosba@gmail.com', 'S', 'N', 'Na igreja', '2000-09-04 00:00:00', 'N', '2015-11-01 10:08:37', 'S', 'S', 'S'),
(118, 'Ana Julia Ferreira', 'Qr 403 conjunto 2 casa 24', 'Samambaia Norte ', '(61) 8276-0443', '(61) 8201-4967', '(61) 3082-6201', 'Eraildes M. Ferreira', 'Ferreirajulia10@hotmail.com', 'N', 'S', 'Por amigos e pela minha irma', '2002-03-08 00:00:00', 'N', '2015-11-02 11:58:13', 'N', 'N', 'S'),
(119, 'marli alves figueredo', 'QN 312 CJ 07 LT 01 AP1007', 'SAMAMBAIA NORTE ', '(61) 8223-8261', '', '(61) 3458-2370', 'MARLI ALVES FIGUEREDO', 'marli92@outlook.com', 'N', 'S', 'EU CONHECI O GEJ FAZENDO CATEQUESE. QUANDO FUI PRO RETIRO DE CRISMA CONVERSEI COM ALGUMAS MENINAS DO GRUPO.ENTÃO FUI A UMA REUNIÃO E AMEI MUITO.', '1992-08-26 00:00:00', 'N', '2015-11-07 10:34:03', 'S', 'N', 'N'),
(120, 'Marcelo Souza Dos Santos', 'QR 401 Conjunto 01 casa 08', 'Samambaia norte', '(61) 8108-9773', '(61) 8167-7779', '(61) 3358-9992', 'Manuel Alves Dos Santos', 'marcelosousa868@gmail.com', 'S', 'N', 'Em um encontro após a crisma', '2000-02-20 00:00:00', 'N', '2015-11-08 22:39:23', 'S', 'S', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_membro_retiro`
--

CREATE TABLE IF NOT EXISTS `tb_membro_retiro` (
  `co_membro_retiro` int(10) unsigned NOT NULL,
  `no_membro` varchar(100) DEFAULT NULL,
  `ds_endereco` varchar(250) DEFAULT NULL,
  `ds_bairro` varchar(50) DEFAULT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `nu_tel1` varchar(15) DEFAULT NULL,
  `nu_tel2` varchar(15) DEFAULT NULL,
  `ds_email` varchar(150) DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_pastoral` text,
  `ds_retiro` varchar(1) DEFAULT NULL,
  `nu_cpf` varchar(15) DEFAULT NULL,
  `nu_rg` varchar(200) DEFAULT NULL,
  `ds_membro_ativo` varchar(1) DEFAULT NULL,
  `ds_situacao_atual_grupo` int(1) DEFAULT NULL,
  `co_retiro` int(10) unsigned NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_membro_retiro`
--

INSERT INTO `tb_membro_retiro` (`co_membro_retiro`, `no_membro`, `ds_endereco`, `ds_bairro`, `dt_nascimento`, `nu_tel1`, `nu_tel2`, `ds_email`, `dt_cadastro`, `ds_pastoral`, `ds_retiro`, `nu_cpf`, `nu_rg`, `ds_membro_ativo`, `ds_situacao_atual_grupo`, `co_retiro`) VALUES
(1, 'Walter Martins', 'avenida ferroviaria E n 1023 ', 'setor Nodeste', '1999-08-26', '(61) 9917-0367', '', '', '2015-09-14 19:22:47', 'ministerio de Musica', 'N', NULL, NULL, NULL, NULL, 1),
(2, 'marcos santos dias', 'rua 11 quadra 29 casa 22 ', 'bella vista ', '1981-07-16', '(61) 9829-4828', '', 'marcossantosdias5@gmail.com', '2015-09-14 19:31:42', NULL, 'N', NULL, NULL, NULL, NULL, 1),
(3, 'eliar da costa santos', 'rua 11 quadra 29 casa 22 ', 'bella vista ', '1984-12-16', '(61) 9962-6703', '', '', '2015-09-14 19:36:10', NULL, 'N', NULL, NULL, NULL, NULL, 1),
(4, 'Ana Paula Souza Dos Anjos', 'rua 11c 11 Q 28 setor bela vista', 'bela vista', '1994-02-22', '(61) 9933-5206', '', '', '2015-09-14 20:00:32', NULL, 'N', NULL, NULL, NULL, NULL, 1),
(5, 'Angela Souza Dos Anjos', 'Travessa rua 08 n 12', 'Setor imperatriz', '1995-04-24', '(61) 9666-2643', '(61) 9613-0649', 'Anginhaanjos@gmail.com', '2015-09-14 20:07:27', 'Conferência', 'N', NULL, NULL, NULL, NULL, 1),
(6, 'Nayara carolynna donnici Miranda', 'Rua sem denominação número 22', 'Bela vista ', '1992-12-06', '(61) 9917-7388', '', 'Nayaradonnici@gmail.com', '2015-09-14 22:19:57', 'EESA, liturgia Ssvp', 'N', NULL, NULL, NULL, NULL, 1),
(7, 'Jhonas Lustosa', 'Qnn 03 conjunto c casa 06', 'Ceilândia norte', '1994-10-09', '(61) 9604-3836', '', 'Jhonas.Lustosa@gmail.com', '2015-09-14 22:20:15', NULL, 'N', NULL, NULL, NULL, NULL, 1),
(8, 'Lindemberg Divino Soares Alves Xisto', 'Avenida Valeriano de Castro N° 813 ', 'Centro', '1990-06-03', '(61) 9922-5747', '', 'berg.soares21@hotmail.com', '2015-09-14 22:32:38', 'Ministério de Música Nas Asas Do Senhor', 'N', NULL, NULL, NULL, NULL, 1),
(9, 'Alessandra Batista Silva Santos', 'Rua José Jacinto n 80 ', 'Jardim Califórnia', '1989-06-28', '(61) 9607-0929', '(61) 3631-6950', 'Sandrinha.agde@hotmail.com', '2015-09-14 23:00:29', 'Ssvp', 'N', NULL, NULL, NULL, NULL, 1),
(10, 'Gabriel Pereira Junior', 'Rua 10 numero 176 ', 'Formosinha', '1990-05-20', '(61) 6199-52802', '(61) 3631-6050', 'Gabrielfsajunior@gmail.com', '2015-09-14 23:19:37', 'Ssvp', 'N', NULL, NULL, NULL, NULL, 1),
(11, 'Luana Gomes da Silva', 'rua 10 n 10 ', 'parque das laranjeiras ', '1996-07-04', '(61) 9831-9391', '(61) 9651-2173', 'luanakayto@gmail.com', '2015-09-14 23:22:17', NULL, 'N', NULL, NULL, NULL, NULL, 1),
(12, 'Mayk Muniz Nogueira Barros', 'Rua 5  Numero 239', 'Parque das Laranjeiras', '1993-01-30', '(61) 9937-5944', '(61) 9618-4791', 'Mayknogueira1356@hotmail.com', '2015-09-15 08:23:42', 'EESA(escola de evangelizaçao santo andre)', 'N', NULL, NULL, NULL, NULL, 1),
(13, 'Jéssica Mayara de Lima', 'Rua São Benedito número 152 ', 'Formosinha', '1994-11-27', '(61) 9645-6875', '', 'jslima968@gmail.com', '2015-09-15 08:57:23', 'Sociedade São Vicente de Paulo', 'N', NULL, NULL, NULL, NULL, 1),
(14, 'William Rodrigues de Ataides', 'rua 05', 'ferroviario ', '1985-10-03', '(61) 9609-8729', '', 'wilataides@gmail.com', '2015-09-15 09:20:02', 'Sociedade São Vicente de Paulo', 'N', NULL, NULL, NULL, NULL, 1),
(15, 'Raiane Santos Pinto', 'Travessa Olimpio Spindola n° 69', 'Centro', '1993-08-02', '(61) 9966-6592', '', 'raahspinto@hotmail.com', '2015-09-15 10:24:51', 'SSVP, EESA- Escola de Evangelização Santo André', 'N', NULL, NULL, NULL, NULL, 1),
(16, 'mariaconceiçaodeoliveira', 'rua 11 Qd 28 lt 21', 'bela vista', '1985-12-08', '(61) 9613-1059', '', 'mariadaconceiçao@hotma', '2015-09-17 15:09:08', NULL, 'N', NULL, NULL, NULL, NULL, 1),
(17, 'Isabella Heloisa dos Santos Guia', 'Rua santa teresinha', 'Setor nordeste', '1996-06-18', '(61) 9679-7910', '(61) 9906-3437', 'Isabella.heloisaa@gmail.com', '2015-09-17 15:26:18', 'Grupo de música/ Dizimo', 'N', NULL, NULL, NULL, NULL, 1),
(18, 'Rômulo Cardoso miranda', 'Rua sem denominação n22', 'Bela vista', '1988-07-21', '(61) 9917-7388', '(61) 9621-2036', 'romulocardoso1@hotmail.com', '2015-09-17 20:10:00', 'Ssvp EESA', 'N', NULL, NULL, NULL, NULL, 1),
(19, 'Zé Carlos Cardoso dos Santos', 'Rua 22 quadra 46 n 20', 'Jardim das oliveiras', '1981-10-13', '(61) 9962-6568', '', 'Wwwzequinhapatensegmail.com', '2015-09-17 22:55:15', 'Canta no Grupo emanoel', 'N', NULL, NULL, NULL, NULL, 1),
(20, 'ana paula neres', 'rua05 quadra 84 lote 19 ', 'parque vila verde', '1989-07-12', '(61) 9836-1308', '', '', '2015-09-18 19:02:48', 'ssvp', 'S', NULL, NULL, NULL, NULL, 1),
(21, 'lucas viera da silva', 'rua. 05 qd84 lt 19', 'vila verde. formosa go', '1990-06-05', '(61) 9996-7856', '', '', '2015-09-18 19:09:03', 'ssvp', 'S', NULL, NULL, NULL, NULL, 1),
(22, 'GLEITON DE SOUSA BRASILEIRO', 'Rua 21 nr 197', 'Setor nordeste ', '1985-03-25', '(61) 9976-5961', '', 'Gleiton.brasileiro@gmail.com', '2015-09-18 21:52:27', 'Sociedade São Vicente de Paulo', 'S', NULL, NULL, NULL, NULL, 1),
(23, 'Leidiane do Nascimento Alves', 'Rua Augusto Inácio de Macedo Q:01, L:10 Formosa', 'Jardim California', '1988-09-30', '(61) 9909-9418', '', 'leidiannealves@hotmail.com', '2015-09-18 22:11:24', 'E.J.V.C', 'S', NULL, NULL, NULL, NULL, 1),
(24, 'Leonardo Bessa', 'qr 403 conjunto 10 casa 28', 'Samambaia', '1984-07-06', '(61) 9327-4991', '', 'leonardomcbessa@gmail.com', '2015-11-10 11:32:58', NULL, 'S', '726.814.381-87', '2077811', 'S', 3, 2),
(25, 'Lilian Machado Carvalho Bessa', 'Qr 403 CJ 10 CS 28', 'Samambaia ', '1988-10-31', '(61) 9106-6240', '', 'lililasp@gmail.com', '2015-11-10 18:34:32', NULL, 'S', '023.511.271-29', '2529020', 'S', 3, 2),
(26, 'Karen Geovanna', 'Qr 423 Conjunto 03 Casa 24', 'Samambaia Norte', '1998-04-17', '(61) 9528-2513', '', 'karenn.geovanna@gmail.com', '2015-11-14 17:47:32', NULL, 'S', '060.508.581-10', '3445561', 'S', 3, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_retiro`
--

CREATE TABLE IF NOT EXISTS `tb_retiro` (
  `co_retiro` int(10) unsigned NOT NULL,
  `no_retiro` varchar(150) DEFAULT NULL,
  `dt_evento` date DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_retiro`
--

INSERT INTO `tb_retiro` (`co_retiro`, `no_retiro`, `dt_evento`) VALUES
(1, 'Formosa 1', '2015-09-20'),
(2, 'Abastecimento Espiritual', '2015-12-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `co_usuario` int(10) NOT NULL,
  `no_usuario` varchar(200) NOT NULL,
  `ds_login` varchar(50) NOT NULL,
  `ds_senha` varchar(100) NOT NULL,
  `ds_code` varchar(50) NOT NULL,
  `ds_perfil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`co_usuario`, `no_usuario`, `ds_login`, `ds_senha`, `ds_code`, `ds_perfil`) VALUES
(1, 'Leonardo M C Bessa', 'leobessa', '123456', '123456', '1'),
(2, 'Lilian M C Bessa', 'lililasp', '123456', '123456', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_auditoria`
--
ALTER TABLE `tb_auditoria`
  ADD PRIMARY KEY (`co_auditoria`);

--
-- Indexes for table `tb_evento`
--
ALTER TABLE `tb_evento`
  ADD PRIMARY KEY (`co_evento`,`co_foto_capa`),
  ADD KEY `fk_tb_evento_tb_foto_idx` (`co_foto_capa`);

--
-- Indexes for table `tb_foto`
--
ALTER TABLE `tb_foto`
  ADD PRIMARY KEY (`co_foto`),
  ADD KEY `fk_tb_foto_tb_evento1_idx` (`co_evento`);

--
-- Indexes for table `tb_membro`
--
ALTER TABLE `tb_membro`
  ADD PRIMARY KEY (`co_membro`);

--
-- Indexes for table `tb_membro_retiro`
--
ALTER TABLE `tb_membro_retiro`
  ADD PRIMARY KEY (`co_membro_retiro`),
  ADD KEY `fk_tb_membro_retiro_tb_retiro1_idx` (`co_retiro`);

--
-- Indexes for table `tb_retiro`
--
ALTER TABLE `tb_retiro`
  ADD PRIMARY KEY (`co_retiro`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`co_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_auditoria`
--
ALTER TABLE `tb_auditoria`
  MODIFY `co_auditoria` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_evento`
--
ALTER TABLE `tb_evento`
  MODIFY `co_evento` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_foto`
--
ALTER TABLE `tb_foto`
  MODIFY `co_foto` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_membro`
--
ALTER TABLE `tb_membro`
  MODIFY `co_membro` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `tb_membro_retiro`
--
ALTER TABLE `tb_membro_retiro`
  MODIFY `co_membro_retiro` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tb_retiro`
--
ALTER TABLE `tb_retiro`
  MODIFY `co_retiro` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
