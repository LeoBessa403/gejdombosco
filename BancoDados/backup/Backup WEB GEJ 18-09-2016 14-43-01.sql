CREATE DATABASE IF NOT EXISTS gej_bd;

USE gej_bd;

DROP TABLE IF EXISTS tb_agenda;

CREATE TABLE `tb_agenda` (
  `co_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `dt_inicio` datetime DEFAULT NULL,
  `dt_fim` datetime DEFAULT NULL,
  `ds_descricao` text,
  `st_dia_todo` varchar(1) DEFAULT NULL COMMENT 'S - Sim / N - Não',
  `st_status` varchar(1) DEFAULT 'A' COMMENT 'L - Liberado /A - Aguardando / B - Bloqueado',
  `ds_titulo` varchar(150) DEFAULT NULL,
  `co_categoria` int(10) unsigned NOT NULL,
  `co_usuario_solicitante` int(10) NOT NULL,
  `co_usuario_status` int(10) NOT NULL DEFAULT '0',
  `co_evento` int(10) unsigned NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  PRIMARY KEY (`co_agenda`,`co_categoria`,`co_usuario_solicitante`,`co_usuario_status`,`co_evento`),
  KEY `fk_tb_agenda_tb_categoria1_idx` (`co_categoria`),
  KEY `fk_tb_agenda_tb_usuario1_idx` (`co_usuario_solicitante`),
  KEY `fk_tb_agenda_tb_usuario2_idx` (`co_usuario_status`),
  KEY `fk_tb_agenda_tb_evento1_idx` (`co_evento`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO tb_agenda VALUES("2","2016-01-20 20:00:00","0000-00-00 00:00:00","ss","N","A","Novo Compromisso de Teste","2","1","0","3","2016-01-22 10:53:00");
INSERT INTO tb_agenda VALUES("3","2016-01-14 20:00:00","0000-00-00 00:00:00","rg","N","A","Retiro novo","1","1","0","2","2016-01-22 10:51:22");
INSERT INTO tb_agenda VALUES("4","2016-03-15 20:00:00","0000-00-00 00:00:00","fdsf","N","A","Nova Tarefa 01","1","1","0","3","2016-03-15 19:50:57");
INSERT INTO tb_agenda VALUES("5","2016-05-18 20:00:00","0000-00-00 00:00:00","So pra testa","N","A","Ensaio da Musica","2","1","0","3","2016-05-17 19:55:52");



DROP TABLE IF EXISTS tb_agenda_perfil;

CREATE TABLE `tb_agenda_perfil` (
  `co_agenda` int(11) NOT NULL,
  `co_perfil` int(11) NOT NULL,
  PRIMARY KEY (`co_agenda`,`co_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_agenda_perfil VALUES("2","8");
INSERT INTO tb_agenda_perfil VALUES("3","2");
INSERT INTO tb_agenda_perfil VALUES("4","3");
INSERT INTO tb_agenda_perfil VALUES("5","6");



DROP TABLE IF EXISTS tb_auditoria;

CREATE TABLE `tb_auditoria` (
  `co_auditoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_tabela` varchar(150) DEFAULT NULL,
  `dt_realizado` datetime DEFAULT NULL,
  `no_operacao` varchar(1) DEFAULT NULL,
  `ds_item_anterior` text,
  `ds_item_atual` text,
  `co_usuario` int(10) DEFAULT NULL,
  `co_registro` int(10) DEFAULT NULL,
  `ds_perfil_usuario` text,
  PRIMARY KEY (`co_auditoria`)
) ENGINE=MyISAM AUTO_INCREMENT=164 DEFAULT CHARSET=utf8;

INSERT INTO tb_auditoria VALUES("1","tb_usuario","2016-01-26 20:38:37","U","co_usuario==8;/no_usuario==Novo user;/ds_login==testenovo;/ds_senha==123456**;/ds_code==TVRJek5EVTJLaW89;/ds_foto==;/ds_sexo==M;/st_situacao==A;/ds_email==ledwos@leo.com;/dt_cadastro==2016-01-13 15:33:12","no_usuario==Novo user;/ds_email==ledwos@leo.com;/ds_sexo==M;/ds_login==testenovo;/ds_senha==123456**;/st_situacao==A;/ds_code==TVRJek5EVTJLaW89","1","8","1");
INSERT INTO tb_auditoria VALUES("2","tb_usuario_perfil","2016-01-26 20:38:37","D","co_usuario==8;/co_perfil==3","","1","8","1");
INSERT INTO tb_auditoria VALUES("3","tb_usuario_perfil","2016-01-26 20:38:37","I","","co_usuario==8;/co_perfil==2","1","0","1");
INSERT INTO tb_auditoria VALUES("4","tb_usuario_perfil","2016-01-26 20:38:37","I","","co_usuario==8;/co_perfil==3","1","0","1");
INSERT INTO tb_auditoria VALUES("5","tb_perfil_funcionalidade","2016-01-26 20:43:03","D","","","1","0","1");
INSERT INTO tb_auditoria VALUES("6","tb_perfil_funcionalidade","2016-01-26 20:43:03","I","","co_perfil==2;/co_funcionalidade==2","1","0","1");
INSERT INTO tb_auditoria VALUES("7","tb_perfil_funcionalidade","2016-01-26 20:43:03","I","","co_perfil==2;/co_funcionalidade==3","1","0","1");
INSERT INTO tb_auditoria VALUES("8","tb_perfil_funcionalidade","2016-01-26 20:43:03","I","","co_perfil==2;/co_funcionalidade==4","1","0","1");
INSERT INTO tb_auditoria VALUES("9","tb_perfil_funcionalidade","2016-01-26 20:43:03","I","","co_perfil==2;/co_funcionalidade==5","1","0","1");
INSERT INTO tb_auditoria VALUES("10","tb_perfil_funcionalidade","2016-01-26 20:43:03","I","","co_perfil==2;/co_funcionalidade==6","1","0","1");
INSERT INTO tb_auditoria VALUES("11","tb_perfil_funcionalidade","2016-01-26 20:43:03","I","","co_perfil==2;/co_funcionalidade==7","1","0","1");
INSERT INTO tb_auditoria VALUES("12","tb_perfil_funcionalidade","2016-01-26 20:43:03","I","","co_perfil==2;/co_funcionalidade==8","1","0","1");
INSERT INTO tb_auditoria VALUES("13","tb_perfil_funcionalidade","2016-01-26 20:43:03","I","","co_perfil==2;/co_funcionalidade==12","1","0","1");
INSERT INTO tb_auditoria VALUES("14","tb_perfil_funcionalidade","2016-01-26 20:43:03","I","","co_perfil==2;/co_funcionalidade==13","1","0","1");
INSERT INTO tb_auditoria VALUES("15","tb_perfil_funcionalidade","2016-01-26 20:43:03","I","","co_perfil==2;/co_funcionalidade==14","1","0","1");
INSERT INTO tb_auditoria VALUES("16","tb_perfil_funcionalidade","2016-01-26 20:43:03","I","","co_perfil==2;/co_funcionalidade==15","1","0","1");
INSERT INTO tb_auditoria VALUES("17","tb_perfil_funcionalidade","2016-01-26 20:43:03","I","","co_perfil==2;/co_funcionalidade==16","1","0","1");
INSERT INTO tb_auditoria VALUES("18","tb_perfil_funcionalidade","2016-01-26 20:43:03","I","","co_perfil==2;/co_funcionalidade==17","1","0","1");
INSERT INTO tb_auditoria VALUES("19","tb_perfil_funcionalidade","2016-01-26 20:43:03","I","","co_perfil==2;/co_funcionalidade==18","1","0","1");
INSERT INTO tb_auditoria VALUES("20","tb_perfil_funcionalidade","2016-01-26 20:43:03","I","","co_perfil==2;/co_funcionalidade==19","1","0","1");
INSERT INTO tb_auditoria VALUES("21","tb_perfil_funcionalidade","2016-01-26 20:43:03","I","","co_perfil==2;/co_funcionalidade==20","1","0","1");
INSERT INTO tb_auditoria VALUES("22","tb_perfil_funcionalidade","2016-01-26 20:43:03","I","","co_perfil==2;/co_funcionalidade==21","1","0","1");
INSERT INTO tb_auditoria VALUES("23","tb_perfil_funcionalidade","2016-01-26 20:43:04","I","","co_perfil==2;/co_funcionalidade==22","1","0","1");
INSERT INTO tb_auditoria VALUES("24","tb_perfil_funcionalidade","2016-01-26 20:43:04","I","","co_perfil==2;/co_funcionalidade==23","1","0","1");
INSERT INTO tb_auditoria VALUES("25","tb_perfil_funcionalidade","2016-01-26 20:43:04","I","","co_perfil==2;/co_funcionalidade==24","1","0","1");
INSERT INTO tb_auditoria VALUES("26","tb_perfil_funcionalidade","2016-01-26 20:43:04","I","","co_perfil==2;/co_funcionalidade==25","1","0","1");
INSERT INTO tb_auditoria VALUES("27","tb_usuario","2016-01-26 20:43:37","U","co_usuario==8;/no_usuario==Novo user;/ds_login==testenovo;/ds_senha==123456**;/ds_code==TVRJek5EVTJLaW89;/ds_foto==;/ds_sexo==M;/st_situacao==A;/ds_email==ledwos@leo.com;/dt_cadastro==2016-01-13 15:33:12","no_usuario==Novo user;/ds_email==ledwos@leo.com;/ds_sexo==M;/ds_login==testenovo;/ds_senha==123456**;/st_situacao==A;/ds_code==TVRJek5EVTJLaW89","1","8","1");
INSERT INTO tb_auditoria VALUES("28","tb_usuario_perfil","2016-01-26 20:43:38","D","co_usuario==8;/co_perfil==2","","1","8","1");
INSERT INTO tb_auditoria VALUES("29","tb_usuario_perfil","2016-01-26 20:43:38","I","","co_usuario==8;/co_perfil==2","1","0","1");
INSERT INTO tb_auditoria VALUES("30","tb_usuario_perfil","2016-01-26 20:43:38","I","","co_usuario==8;/co_perfil==3","1","0","1");
INSERT INTO tb_auditoria VALUES("31","tb_usuario","2016-01-26 20:44:45","U","co_usuario==8;/no_usuario==Novo user;/ds_login==testenovo;/ds_senha==123456**;/ds_code==TVRJek5EVTJLaW89;/ds_foto==;/ds_sexo==M;/st_situacao==A;/ds_email==ledwos@leo.com;/dt_cadastro==2016-01-13 15:33:12","no_usuario==Novo user;/ds_email==ledwos@leo.com;/ds_sexo==M;/ds_login==testenovo;/ds_senha==123456**;/st_situacao==A;/ds_code==TVRJek5EVTJLaW89","1","8","1");
INSERT INTO tb_auditoria VALUES("32","tb_usuario_perfil","2016-01-26 20:44:45","D","co_usuario==8;/co_perfil==2","","1","8","1");
INSERT INTO tb_auditoria VALUES("33","tb_usuario_perfil","2016-01-26 20:44:45","I","","co_usuario==8;/co_perfil==3","1","0","1");
INSERT INTO tb_auditoria VALUES("34","tb_perfil_funcionalidade","2016-01-26 20:46:01","D","","","1","0","1");
INSERT INTO tb_auditoria VALUES("35","tb_perfil_funcionalidade","2016-01-26 20:46:01","I","","co_perfil==3;/co_funcionalidade==6","1","0","1");
INSERT INTO tb_auditoria VALUES("36","tb_usuario","2016-01-26 20:49:59","U","co_usuario==8;/no_usuario==Novo user;/ds_login==testenovo;/ds_senha==123456**;/ds_code==TVRJek5EVTJLaW89;/ds_foto==;/ds_sexo==M;/st_situacao==A;/ds_email==ledwos@leo.com;/dt_cadastro==2016-01-13 15:33:12","no_usuario==Novo user;/ds_email==ledwos@leo.com;/ds_sexo==M;/ds_login==testenovo;/ds_senha==123456**;/st_situacao==A;/ds_code==TVRJek5EVTJLaW89","1","8","1");
INSERT INTO tb_auditoria VALUES("37","tb_usuario_perfil","2016-01-26 20:50:00","D","co_usuario==8;/co_perfil==3","","1","8","1");
INSERT INTO tb_auditoria VALUES("38","tb_usuario_perfil","2016-01-26 20:50:00","I","","co_usuario==8;/co_perfil==5","1","0","1");
INSERT INTO tb_auditoria VALUES("39","tb_usuario_perfil","2016-01-26 20:50:00","I","","co_usuario==8;/co_perfil==3","1","0","1");
INSERT INTO tb_auditoria VALUES("40","tb_perfil_funcionalidade","2016-01-26 20:51:16","D","","","1","0","1");
INSERT INTO tb_auditoria VALUES("41","tb_perfil_funcionalidade","2016-01-26 20:51:16","I","","co_perfil==4;/co_funcionalidade==12","1","0","1");
INSERT INTO tb_auditoria VALUES("42","tb_perfil_funcionalidade","2016-01-26 20:51:16","I","","co_perfil==4;/co_funcionalidade==15","1","0","1");
INSERT INTO tb_auditoria VALUES("43","tb_perfil_funcionalidade","2016-01-26 20:51:16","I","","co_perfil==4;/co_funcionalidade==18","1","0","1");
INSERT INTO tb_auditoria VALUES("44","tb_perfil_funcionalidade","2016-01-26 20:51:16","I","","co_perfil==4;/co_funcionalidade==21","1","0","1");
INSERT INTO tb_auditoria VALUES("45","tb_perfil_funcionalidade","2016-01-26 20:51:16","I","","co_perfil==4;/co_funcionalidade==22","1","0","1");
INSERT INTO tb_auditoria VALUES("46","tb_perfil_funcionalidade","2016-01-26 20:51:16","I","","co_perfil==4;/co_funcionalidade==23","1","0","1");
INSERT INTO tb_auditoria VALUES("47","tb_perfil_funcionalidade","2016-01-26 20:51:16","I","","co_perfil==4;/co_funcionalidade==25","1","0","1");
INSERT INTO tb_auditoria VALUES("48","tb_perfil_funcionalidade","2016-01-26 20:51:29","D","","","1","0","1");
INSERT INTO tb_auditoria VALUES("49","tb_perfil_funcionalidade","2016-01-26 20:51:29","I","","co_perfil==5;/co_funcionalidade==12","1","0","1");
INSERT INTO tb_auditoria VALUES("50","tb_perfil_funcionalidade","2016-01-26 20:51:29","I","","co_perfil==5;/co_funcionalidade==21","1","0","1");
INSERT INTO tb_auditoria VALUES("51","tb_perfil_funcionalidade","2016-01-26 20:51:29","I","","co_perfil==5;/co_funcionalidade==22","1","0","1");
INSERT INTO tb_auditoria VALUES("52","tb_perfil_funcionalidade","2016-01-26 20:51:29","I","","co_perfil==5;/co_funcionalidade==23","1","0","1");
INSERT INTO tb_auditoria VALUES("53","tb_perfil_funcionalidade","2016-01-26 20:51:29","I","","co_perfil==5;/co_funcionalidade==25","1","0","1");
INSERT INTO tb_auditoria VALUES("54","tb_perfil_funcionalidade","2016-01-26 20:51:37","D","","","1","0","1");
INSERT INTO tb_auditoria VALUES("55","tb_perfil_funcionalidade","2016-01-26 20:51:37","I","","co_perfil==6;/co_funcionalidade==21","1","0","1");
INSERT INTO tb_auditoria VALUES("56","tb_perfil_funcionalidade","2016-01-26 20:51:54","D","","","1","0","1");
INSERT INTO tb_auditoria VALUES("57","tb_perfil_funcionalidade","2016-01-26 20:51:54","I","","co_perfil==7;/co_funcionalidade==12","1","0","1");
INSERT INTO tb_auditoria VALUES("58","tb_perfil_funcionalidade","2016-01-26 20:51:54","I","","co_perfil==7;/co_funcionalidade==21","1","0","1");
INSERT INTO tb_auditoria VALUES("59","tb_perfil_funcionalidade","2016-01-26 20:51:54","I","","co_perfil==7;/co_funcionalidade==22","1","0","1");
INSERT INTO tb_auditoria VALUES("60","tb_perfil_funcionalidade","2016-01-26 20:51:54","I","","co_perfil==7;/co_funcionalidade==23","1","0","1");
INSERT INTO tb_auditoria VALUES("61","tb_perfil_funcionalidade","2016-01-26 20:51:54","I","","co_perfil==7;/co_funcionalidade==25","1","0","1");
INSERT INTO tb_auditoria VALUES("62","tb_perfil_funcionalidade","2016-01-26 20:52:03","D","","","1","0","1");
INSERT INTO tb_auditoria VALUES("63","tb_perfil_funcionalidade","2016-01-26 20:52:03","I","","co_perfil==8;/co_funcionalidade==21","1","0","1");
INSERT INTO tb_auditoria VALUES("64","tb_perfil_funcionalidade","2016-01-26 20:52:16","D","","","1","0","1");
INSERT INTO tb_auditoria VALUES("65","tb_perfil_funcionalidade","2016-01-26 20:52:17","I","","co_perfil==9;/co_funcionalidade==12","1","0","1");
INSERT INTO tb_auditoria VALUES("66","tb_perfil_funcionalidade","2016-01-26 20:52:17","I","","co_perfil==9;/co_funcionalidade==21","1","0","1");
INSERT INTO tb_auditoria VALUES("67","tb_perfil_funcionalidade","2016-01-26 20:52:17","I","","co_perfil==9;/co_funcionalidade==22","1","0","1");
INSERT INTO tb_auditoria VALUES("68","tb_perfil_funcionalidade","2016-01-26 20:52:17","I","","co_perfil==9;/co_funcionalidade==23","1","0","1");
INSERT INTO tb_auditoria VALUES("69","tb_perfil_funcionalidade","2016-01-26 20:52:17","I","","co_perfil==9;/co_funcionalidade==25","1","0","1");
INSERT INTO tb_auditoria VALUES("70","tb_perfil_funcionalidade","2016-01-26 20:52:25","D","","","1","0","1");
INSERT INTO tb_auditoria VALUES("71","tb_perfil_funcionalidade","2016-01-26 20:52:25","I","","co_perfil==10;/co_funcionalidade==21","1","0","1");
INSERT INTO tb_auditoria VALUES("72","tb_perfil_funcionalidade","2016-01-26 20:52:37","D","","","1","0","1");
INSERT INTO tb_auditoria VALUES("73","tb_perfil_funcionalidade","2016-01-26 20:52:37","I","","co_perfil==11;/co_funcionalidade==12","1","0","1");
INSERT INTO tb_auditoria VALUES("74","tb_perfil_funcionalidade","2016-01-26 20:52:37","I","","co_perfil==11;/co_funcionalidade==21","1","0","1");
INSERT INTO tb_auditoria VALUES("75","tb_perfil_funcionalidade","2016-01-26 20:52:37","I","","co_perfil==11;/co_funcionalidade==22","1","0","1");
INSERT INTO tb_auditoria VALUES("76","tb_perfil_funcionalidade","2016-01-26 20:52:37","I","","co_perfil==11;/co_funcionalidade==23","1","0","1");
INSERT INTO tb_auditoria VALUES("77","tb_perfil_funcionalidade","2016-01-26 20:52:38","I","","co_perfil==11;/co_funcionalidade==25","1","0","1");
INSERT INTO tb_auditoria VALUES("78","tb_perfil_funcionalidade","2016-01-26 20:52:50","D","","","1","0","1");
INSERT INTO tb_auditoria VALUES("79","tb_perfil_funcionalidade","2016-01-26 20:52:50","I","","co_perfil==12;/co_funcionalidade==21","1","0","1");
INSERT INTO tb_auditoria VALUES("80","tb_perfil_funcionalidade","2016-01-26 20:53:02","D","","","1","0","1");
INSERT INTO tb_auditoria VALUES("81","tb_perfil_funcionalidade","2016-01-26 20:53:02","I","","co_perfil==13;/co_funcionalidade==12","1","0","1");
INSERT INTO tb_auditoria VALUES("82","tb_perfil_funcionalidade","2016-01-26 20:53:02","I","","co_perfil==13;/co_funcionalidade==21","1","0","1");
INSERT INTO tb_auditoria VALUES("83","tb_perfil_funcionalidade","2016-01-26 20:53:02","I","","co_perfil==13;/co_funcionalidade==22","1","0","1");
INSERT INTO tb_auditoria VALUES("84","tb_perfil_funcionalidade","2016-01-26 20:53:02","I","","co_perfil==13;/co_funcionalidade==23","1","0","1");
INSERT INTO tb_auditoria VALUES("85","tb_perfil_funcionalidade","2016-01-26 20:53:02","I","","co_perfil==13;/co_funcionalidade==25","1","0","1");
INSERT INTO tb_auditoria VALUES("86","tb_perfil_funcionalidade","2016-01-26 20:53:11","D","","","1","0","1");
INSERT INTO tb_auditoria VALUES("87","tb_perfil_funcionalidade","2016-01-26 20:53:11","I","","co_perfil==14;/co_funcionalidade==21","1","0","1");
INSERT INTO tb_auditoria VALUES("88","tb_perfil_funcionalidade","2016-01-26 20:53:27","D","","","1","0","1");
INSERT INTO tb_auditoria VALUES("89","tb_perfil_funcionalidade","2016-01-26 20:53:27","I","","co_perfil==15;/co_funcionalidade==12","1","0","1");
INSERT INTO tb_auditoria VALUES("90","tb_perfil_funcionalidade","2016-01-26 20:53:27","I","","co_perfil==15;/co_funcionalidade==21","1","0","1");
INSERT INTO tb_auditoria VALUES("91","tb_perfil_funcionalidade","2016-01-26 20:53:27","I","","co_perfil==15;/co_funcionalidade==22","1","0","1");
INSERT INTO tb_auditoria VALUES("92","tb_perfil_funcionalidade","2016-01-26 20:53:27","I","","co_perfil==15;/co_funcionalidade==23","1","0","1");
INSERT INTO tb_auditoria VALUES("93","tb_perfil_funcionalidade","2016-01-26 20:53:27","I","","co_perfil==15;/co_funcionalidade==25","1","0","1");
INSERT INTO tb_auditoria VALUES("94","tb_perfil_funcionalidade","2016-01-26 20:53:38","D","","","1","0","1");
INSERT INTO tb_auditoria VALUES("95","tb_perfil_funcionalidade","2016-01-26 20:53:38","I","","co_perfil==16;/co_funcionalidade==21","1","0","1");
INSERT INTO tb_auditoria VALUES("96","tb_perfil_funcionalidade","2016-01-26 20:53:53","D","","","1","0","1");
INSERT INTO tb_auditoria VALUES("97","tb_perfil_funcionalidade","2016-01-26 20:53:53","I","","co_perfil==17;/co_funcionalidade==12","1","0","1");
INSERT INTO tb_auditoria VALUES("98","tb_perfil_funcionalidade","2016-01-26 20:53:53","I","","co_perfil==17;/co_funcionalidade==25","1","0","1");
INSERT INTO tb_auditoria VALUES("99","tb_usuario","2016-01-26 20:54:54","U","co_usuario==8;/no_usuario==Novo user;/ds_login==testenovo;/ds_senha==123456**;/ds_code==TVRJek5EVTJLaW89;/ds_foto==;/ds_sexo==M;/st_situacao==A;/ds_email==ledwos@leo.com;/dt_cadastro==2016-01-13 15:33:12","no_usuario==Novo user;/ds_email==ledwos@leo.com;/ds_sexo==M;/ds_login==testenovo;/ds_senha==123456**;/st_situacao==A;/ds_code==TVRJek5EVTJLaW89","1","8","1");
INSERT INTO tb_auditoria VALUES("100","tb_usuario_perfil","2016-01-26 20:54:54","D","co_usuario==8;/co_perfil==3","","1","8","1");
INSERT INTO tb_auditoria VALUES("101","tb_usuario_perfil","2016-01-26 20:54:54","I","","co_usuario==8;/co_perfil==17","1","0","1");
INSERT INTO tb_auditoria VALUES("102","tb_usuario_perfil","2016-01-26 20:54:54","I","","co_usuario==8;/co_perfil==3","1","0","1");
INSERT INTO tb_auditoria VALUES("103","tb_perfil_funcionalidade","2016-01-26 20:55:51","D","co_perfil==17;/co_funcionalidade==12","","1","17","1");
INSERT INTO tb_auditoria VALUES("104","tb_perfil_funcionalidade","2016-01-26 20:55:51","I","","co_perfil==17;/co_funcionalidade==12","1","0","1");
INSERT INTO tb_auditoria VALUES("105","tb_perfil_funcionalidade","2016-01-26 20:55:51","I","","co_perfil==17;/co_funcionalidade==21","1","0","1");
INSERT INTO tb_auditoria VALUES("106","tb_perfil_funcionalidade","2016-01-26 20:55:51","I","","co_perfil==17;/co_funcionalidade==22","1","0","1");
INSERT INTO tb_auditoria VALUES("107","tb_perfil_funcionalidade","2016-01-26 20:55:51","I","","co_perfil==17;/co_funcionalidade==23","1","0","1");
INSERT INTO tb_auditoria VALUES("108","tb_perfil_funcionalidade","2016-01-26 20:55:51","I","","co_perfil==17;/co_funcionalidade==25","1","0","1");
INSERT INTO tb_auditoria VALUES("109","tb_perfil_funcionalidade","2016-01-26 20:56:00","D","","","1","0","1");
INSERT INTO tb_auditoria VALUES("110","tb_perfil_funcionalidade","2016-01-26 20:56:00","I","","co_perfil==18;/co_funcionalidade==21","1","0","1");
INSERT INTO tb_auditoria VALUES("111","tb_perfil_funcionalidade","2016-01-26 20:56:12","D","","","1","0","1");
INSERT INTO tb_auditoria VALUES("112","tb_perfil_funcionalidade","2016-01-26 20:56:12","I","","co_perfil==19;/co_funcionalidade==21","1","0","1");
INSERT INTO tb_auditoria VALUES("113","tb_funcionalidade","2016-03-02 12:05:56","I","","no_funcionalidade==Biblioteca Cadastrar;/ds_rota==Admin/Biblioteca/CadastroLivro","1","26","1");
INSERT INTO tb_auditoria VALUES("114","tb_livro","2016-03-15 19:25:20","I","","no_titulo==Novo livro;/no_editora==Nova editora;/no_autor==novo autor;/nu_ano_publicacao==2005;/nu_paginas==201;/nu_edicao==22;/nu_isbn==rrr6d9f5fgg;/ds_observacao==fff;/ds_foto_capa==Biblioteca/novo-livro-56e88bd040c6a.jpg;/dt_cadastro==2016-03-15 19:25:20","1","1","1");
INSERT INTO tb_auditoria VALUES("115","tb_codigo_livro","2016-03-15 19:25:20","I","","co_livro==1;/ds_codigo_livro==ZSD6AAZ3-1","1","1","1");
INSERT INTO tb_auditoria VALUES("116","tb_codigo_livro","2016-03-15 19:25:20","I","","co_livro==1;/ds_codigo_livro==ZSD6AAZ3-2","1","2","1");
INSERT INTO tb_auditoria VALUES("117","tb_agenda","2016-03-15 19:50:57","I","","ds_descricao==fdsf;/dt_cadastro==2016-03-15 19:50:57;/co_usuario_solicitante==1;/st_dia_todo==N;/dt_inicio==2016-03-15 20:00:00;/dt_fim==;/ds_titulo==Nova Tarefa 01;/co_categoria==1;/co_evento==3","1","4","1");
INSERT INTO tb_auditoria VALUES("118","tb_agenda_perfil","2016-03-15 19:50:57","I","","co_agenda==4;/co_perfil==3","1","0","1");
INSERT INTO tb_auditoria VALUES("119","tb_usuario","2016-03-15 19:51:57","U","co_usuario==1;/no_usuario==Leonardo M C Bessa;/ds_login==leobessa;/ds_senha==123456**;/ds_code==TVRJek5EVTJLaW89;/ds_foto==leonardo-m-c-bessa-56a22609c26a5.jpg;/ds_sexo==M;/st_situacao==A;/ds_email==leonardomcbessa@gmail.com;/dt_cadastro==2015-12-22 15:07:16","no_usuario==Leonardo M C Bessa;/ds_email==leonardomcbessa@gmail.com;/ds_sexo==M;/ds_login==leobessa;/ds_senha==123456**;/st_situacao==A;/ds_code==TVRJek5EVTJLaW89;/ds_foto==leonardo-m-c-bessa-56e8920c23ab6.jpg","1","1","1");
INSERT INTO tb_auditoria VALUES("120","tb_usuario_perfil","2016-03-15 19:51:58","D","co_usuario==1;/co_perfil==1","","1","1","1");
INSERT INTO tb_auditoria VALUES("121","tb_usuario_perfil","2016-03-15 19:51:58","I","","co_usuario==1;/co_perfil==1","1","0","1");
INSERT INTO tb_auditoria VALUES("122","tb_funcionalidade","2016-03-15 20:00:07","I","","no_funcionalidade==Biblioteca Listar;/ds_rota==Admin/Biblioteca/ListarLivro","1","27","1");
INSERT INTO tb_auditoria VALUES("123","tb_perfil","2016-03-15 20:00:55","I","","no_perfil==Lider Formação","1","20","1");
INSERT INTO tb_auditoria VALUES("124","tb_perfil_funcionalidade","2016-03-15 20:01:15","D","","","1","0","1");
INSERT INTO tb_auditoria VALUES("125","tb_perfil_funcionalidade","2016-03-15 20:01:15","I","","co_funcionalidade==26;/co_perfil==13","1","0","1");
INSERT INTO tb_auditoria VALUES("126","tb_perfil_funcionalidade","2016-03-15 20:01:48","D","co_perfil==14;/co_funcionalidade==21","","1","14","1");
INSERT INTO tb_auditoria VALUES("127","tb_perfil","2016-03-15 20:01:48","D","co_perfil==14;/no_perfil==Membro Formação","","1","14","1");
INSERT INTO tb_auditoria VALUES("128","tb_perfil_funcionalidade","2016-03-15 20:01:54","D","","","1","0","1");
INSERT INTO tb_auditoria VALUES("129","tb_perfil","2016-03-15 20:01:55","D","co_perfil==20;/no_perfil==Lider Formação","","1","20","1");
INSERT INTO tb_auditoria VALUES("130","tb_perfil_funcionalidade","2016-03-15 20:02:17","D","co_perfil==13;/co_funcionalidade==26","","1","13","1");
INSERT INTO tb_auditoria VALUES("131","tb_perfil_funcionalidade","2016-03-15 20:02:17","I","","co_funcionalidade==26;/co_perfil==13","1","0","1");
INSERT INTO tb_auditoria VALUES("132","tb_perfil_funcionalidade","2016-03-15 20:02:30","D","","","1","0","1");
INSERT INTO tb_auditoria VALUES("133","tb_perfil_funcionalidade","2016-03-15 20:02:30","I","","co_funcionalidade==27;/co_perfil==4","1","0","1");
INSERT INTO tb_auditoria VALUES("134","tb_perfil_funcionalidade","2016-03-15 20:02:30","I","","co_funcionalidade==27;/co_perfil==5","1","0","1");
INSERT INTO tb_auditoria VALUES("135","tb_perfil_funcionalidade","2016-03-15 20:02:30","I","","co_funcionalidade==27;/co_perfil==6","1","0","1");
INSERT INTO tb_auditoria VALUES("136","tb_perfil_funcionalidade","2016-03-15 20:02:30","I","","co_funcionalidade==27;/co_perfil==7","1","0","1");
INSERT INTO tb_auditoria VALUES("137","tb_perfil_funcionalidade","2016-03-15 20:02:30","I","","co_funcionalidade==27;/co_perfil==8","1","0","1");
INSERT INTO tb_auditoria VALUES("138","tb_perfil_funcionalidade","2016-03-15 20:02:30","I","","co_funcionalidade==27;/co_perfil==9","1","0","1");
INSERT INTO tb_auditoria VALUES("139","tb_perfil_funcionalidade","2016-03-15 20:02:30","I","","co_funcionalidade==27;/co_perfil==10","1","0","1");
INSERT INTO tb_auditoria VALUES("140","tb_perfil_funcionalidade","2016-03-15 20:02:30","I","","co_funcionalidade==27;/co_perfil==11","1","0","1");
INSERT INTO tb_auditoria VALUES("141","tb_perfil_funcionalidade","2016-03-15 20:02:30","I","","co_funcionalidade==27;/co_perfil==12","1","0","1");
INSERT INTO tb_auditoria VALUES("142","tb_perfil_funcionalidade","2016-03-15 20:02:30","I","","co_funcionalidade==27;/co_perfil==13","1","0","1");
INSERT INTO tb_auditoria VALUES("143","tb_perfil_funcionalidade","2016-03-15 20:02:30","I","","co_funcionalidade==27;/co_perfil==15","1","0","1");
INSERT INTO tb_auditoria VALUES("144","tb_perfil_funcionalidade","2016-03-15 20:02:30","I","","co_funcionalidade==27;/co_perfil==16","1","0","1");
INSERT INTO tb_auditoria VALUES("145","tb_perfil_funcionalidade","2016-03-15 20:02:30","I","","co_funcionalidade==27;/co_perfil==17","1","0","1");
INSERT INTO tb_auditoria VALUES("146","tb_perfil_funcionalidade","2016-03-15 20:02:30","I","","co_funcionalidade==27;/co_perfil==18","1","0","1");
INSERT INTO tb_auditoria VALUES("147","tb_perfil_funcionalidade","2016-03-15 20:02:30","I","","co_funcionalidade==27;/co_perfil==19","1","0","1");
INSERT INTO tb_auditoria VALUES("148","tb_livro","2016-03-15 20:08:44","I","","no_titulo==Youcat Brasil - Catecismo Jovem da Igreja Católica ;/no_editora==Nova editora 22;/no_autor==novo autor 22;/nu_ano_publicacao==2002;/nu_paginas==200;/nu_edicao==12;/nu_isbn==rrr6d9f5fgg;/ds_observacao==teste;/ds_foto_capa==;/dt_cadastro==2016-03-15 20:08:44","1","2","1");
INSERT INTO tb_auditoria VALUES("149","tb_codigo_livro","2016-03-15 20:08:44","I","","co_livro==2;/ds_codigo_livro==OUB7DPH8-1","1","3","1");
INSERT INTO tb_auditoria VALUES("150","tb_codigo_livro","2016-03-15 20:08:44","I","","co_livro==2;/ds_codigo_livro==OUB7DPH8-2","1","4","1");
INSERT INTO tb_auditoria VALUES("151","tb_codigo_livro","2016-03-15 20:08:44","I","","co_livro==2;/ds_codigo_livro==OUB7DPH8-3","1","5","1");
INSERT INTO tb_auditoria VALUES("152","tb_usuario","2016-03-15 20:45:29","U","co_usuario==3;/no_usuario==Beatriz Gomes dos Santos;/ds_login==Beatriz Gomes;/ds_senha==mariaminhamãe;/ds_code==YldGeWFXRnRhVzVvWVczRG8yVT0=;/ds_foto==;/ds_sexo==F;/st_situacao==A;/ds_email==beatrizgomes_gsm@hotmail.com;/dt_cadastro==2016-01-03 11:56:21","no_usuario==Beatriz Gomes dos Santos;/ds_email==beatrizgomes_gsm@hotmail.com;/ds_sexo==F;/ds_login==Beatriz Gomes;/ds_senha==mariaminhamãe;/st_situacao==A;/ds_code==YldGeWFXRnRhVzVvWVczRG8yVT0=","1","3","1");
INSERT INTO tb_auditoria VALUES("153","tb_usuario_perfil","2016-03-15 20:45:30","D","co_usuario==3;/co_perfil==3","","1","3","1");
INSERT INTO tb_auditoria VALUES("154","tb_usuario_perfil","2016-03-15 20:45:30","I","","co_usuario==3;/co_perfil==8","1","0","1");
INSERT INTO tb_auditoria VALUES("155","tb_usuario_perfil","2016-03-15 20:45:30","I","","co_usuario==3;/co_perfil==3","1","0","1");
INSERT INTO tb_auditoria VALUES("156","tb_agenda","2016-05-17 19:55:52","I","","ds_descricao==So pra testa;/dt_cadastro==2016-05-17 19:55:52;/co_usuario_solicitante==1;/st_dia_todo==N;/dt_inicio==2016-05-18 20:00:00;/dt_fim==;/ds_titulo==Ensaio da Musica;/co_categoria==2;/co_evento==3","1","5","1");
INSERT INTO tb_auditoria VALUES("157","tb_agenda_perfil","2016-05-17 19:55:53","I","","co_agenda==5;/co_perfil==6","1","0","1");
INSERT INTO tb_auditoria VALUES("158","tb_codigo_livro","2016-05-19 20:01:41","D","","","1","0","1");
INSERT INTO tb_auditoria VALUES("159","tb_livro","2016-05-19 20:01:41","D","co_livro==6;/no_titulo==Novo livro 5;/no_editora==;/no_autor==novo autor de livrosg eg;/dt_cadastro==2016-03-29 15:09:27;/ds_observacao==;/nu_ano_publicacao==0;/nu_paginas==0;/nu_isbn==;/nu_edicao==0;/ds_foto_capa==Biblioteca/novo-livro-5-56fac4d7512d0.jpg;/ds_palavras_chave==Deus, virgem maria","","1","6","1");
INSERT INTO tb_auditoria VALUES("160","tb_emprestimo","2016-05-19 22:23:06","I","","co_codigo_livro==Array;/dt_reserva==2016-05-19 22:23:06;/st_situacao==R;/co_usuario==1","1","0","1");
INSERT INTO tb_auditoria VALUES("161","tb_emprestimo","2016-05-19 22:24:37","I","","co_codigo_livro==Array;/dt_reserva==2016-05-19 22:24:37;/st_situacao==R;/co_usuario==1","1","0","1");
INSERT INTO tb_auditoria VALUES("162","tb_emprestimo","2016-05-19 22:27:35","I","","co_codigo_livro==12;/dt_reserva==2016-05-19 22:27:35;/st_situacao==R;/co_usuario==1","1","0","1");
INSERT INTO tb_auditoria VALUES("163","tb_emprestimo","2016-05-19 22:28:07","I","","co_codigo_livro==13;/dt_reserva==2016-05-19 22:28:07;/st_situacao==R;/co_usuario==1","1","0","1");



DROP TABLE IF EXISTS tb_categoria;

CREATE TABLE `tb_categoria` (
  `co_categoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_categoria` varchar(40) DEFAULT NULL,
  `ds_tipo` varchar(45) DEFAULT NULL,
  `ds_cor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`co_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO tb_categoria VALUES("1","Reunião","agenda","label-green");
INSERT INTO tb_categoria VALUES("2","Ensaio","agenda","label-default");
INSERT INTO tb_categoria VALUES("3","Encontro","agenda","label-purple");
INSERT INTO tb_categoria VALUES("4","Formação","agenda","label-beige");
INSERT INTO tb_categoria VALUES("5","Evento","agenda","label-orange");



DROP TABLE IF EXISTS tb_codigo_livro;

CREATE TABLE `tb_codigo_livro` (
  `co_codigo_livro` int(11) NOT NULL AUTO_INCREMENT,
  `ds_codigo_livro` varchar(10) DEFAULT NULL,
  `co_livro` int(11) NOT NULL,
  `st_status` varchar(1) DEFAULT 'U' COMMENT 'U - Utilizável / I - Inutilizável',
  PRIMARY KEY (`co_codigo_livro`,`co_livro`),
  KEY `fk_tb_codigo_livro_tb_livro1_idx` (`co_livro`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

INSERT INTO tb_codigo_livro VALUES("1","EWK5ALP3-1","1","U");
INSERT INTO tb_codigo_livro VALUES("2","EWK5ALP3-2","1","I");
INSERT INTO tb_codigo_livro VALUES("3","EWK5ALP3-3","1","I");
INSERT INTO tb_codigo_livro VALUES("4","EWK5ALP3-4","1","U");
INSERT INTO tb_codigo_livro VALUES("5","EWK5ALP3-5","1","U");
INSERT INTO tb_codigo_livro VALUES("6","NTC1KNK5-1","2","U");
INSERT INTO tb_codigo_livro VALUES("7","NTC1KNK5-2","2","U");
INSERT INTO tb_codigo_livro VALUES("8","LFB6ESK0-1","3","U");
INSERT INTO tb_codigo_livro VALUES("9","FIN8SZR5-1","4","U");
INSERT INTO tb_codigo_livro VALUES("10","FIN8SZR5-2","4","U");
INSERT INTO tb_codigo_livro VALUES("11","FIN8SZR5-3","4","I");
INSERT INTO tb_codigo_livro VALUES("12","MWF3SCD7-1","5","U");
INSERT INTO tb_codigo_livro VALUES("13","MWF3SCD7-2","5","U");
INSERT INTO tb_codigo_livro VALUES("14","MWF3SCD7-3","5","U");
INSERT INTO tb_codigo_livro VALUES("15","MWF3SCD7-4","5","U");
INSERT INTO tb_codigo_livro VALUES("16","MWF3SCD7-5","5","U");
INSERT INTO tb_codigo_livro VALUES("17","BAG0FME6-1","7","U");
INSERT INTO tb_codigo_livro VALUES("18","BAG0FME6-2","7","U");



DROP TABLE IF EXISTS tb_emprestimo;

CREATE TABLE `tb_emprestimo` (
  `co_usuario` int(10) NOT NULL,
  `co_codigo_livro` int(11) NOT NULL,
  `st_situacao` varchar(1) DEFAULT NULL COMMENT 'R - Reservado / E - Emprestado / D - Devolvido / L - Lista de Espera',
  `dt_reserva` datetime DEFAULT NULL,
  `dt_emprestimo` date DEFAULT NULL,
  `dt_devolucao` date DEFAULT NULL,
  PRIMARY KEY (`co_usuario`,`co_codigo_livro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO tb_emprestimo VALUES("1","4","R","2016-03-29 00:00:00","0000-00-00","0000-00-00");
INSERT INTO tb_emprestimo VALUES("1","10","R","2016-05-19 22:23:06","0000-00-00","0000-00-00");
INSERT INTO tb_emprestimo VALUES("1","12","R","2016-05-19 22:27:35","0000-00-00","0000-00-00");
INSERT INTO tb_emprestimo VALUES("1","13","R","2016-05-19 22:28:07","0000-00-00","0000-00-00");
INSERT INTO tb_emprestimo VALUES("2","8","E","2016-03-28 00:00:00","2016-03-29","0000-00-00");
INSERT INTO tb_emprestimo VALUES("3","9","D","2016-03-08 00:00:00","2016-03-09","2016-03-19");



DROP TABLE IF EXISTS tb_evento;

CREATE TABLE `tb_evento` (
  `co_evento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_evento` varchar(250) DEFAULT NULL,
  `ds_conteudo` text,
  `ds_palavras_chaves` varchar(100) DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_realizado` date DEFAULT NULL,
  `ds_local` varchar(150) DEFAULT NULL,
  `co_foto_capa` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`co_evento`,`co_foto_capa`),
  KEY `fk_tb_evento_tb_foto1_idx` (`co_foto_capa`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO tb_evento VALUES("1","Formosa 1","<p>UMA BREVE DESCRI&Ccedil;&Atilde;O PAARA O EVENTO DO RETIRO DE FORMOSA</p>","retiro, formosa","2016-01-13 11:24:30","2015-09-20","paroquia São joão evangelista","4");
INSERT INTO tb_evento VALUES("2","Abastecimento Espiritual","<p>UMA BREVE DESCRI&Ccedil;&Atilde;O PAARA O EVENTO DO RETIRO DE ABASTECIMENTO ESPIRITUAL</p>","abastaecimento, retiro","2016-01-13 11:25:58","2015-12-06","Sitio Bom Jesus","0");
INSERT INTO tb_evento VALUES("3","4º Retiro de Carnaval","<p>UMA BREVE DESCRI&Ccedil;&Atilde;O PAARA O EVENTO DO RETIRO DE CARNAVAL 2016</p>","retiro, carnaval","2016-01-13 11:27:17","2016-02-07","paroquia São joão evangelista","10");
INSERT INTO tb_evento VALUES("4","Espera do Retiro de Carnaval","","retiro, carnaval","2016-01-13 11:27:41","2016-02-07","paroquia São joão evangelista","0");



DROP TABLE IF EXISTS tb_foto;

CREATE TABLE `tb_foto` (
  `co_foto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ds_caminho` varchar(150) DEFAULT NULL,
  `co_evento` int(10) unsigned NOT NULL,
  PRIMARY KEY (`co_foto`,`co_evento`),
  KEY `fk_tb_foto_tb_evento1_idx` (`co_evento`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO tb_foto VALUES("1","","0");
INSERT INTO tb_foto VALUES("2","","0");
INSERT INTO tb_foto VALUES("3","","0");
INSERT INTO tb_foto VALUES("4","","0");
INSERT INTO tb_foto VALUES("5","Eventos/Evento-1/formosa-1-5696500e7b728.jpg","1");
INSERT INTO tb_foto VALUES("6","Eventos/Evento-1/formosa-1-5696500e7f418.jpg","1");
INSERT INTO tb_foto VALUES("7","Eventos/Evento-1/formosa-1-5696500e7f418.jpg","1");
INSERT INTO tb_foto VALUES("8","Eventos/Evento-1/formosa-1-5696500e83108.jpg","1");
INSERT INTO tb_foto VALUES("9","Eventos/Evento-1/formosa-1-5696500e86df9.jpg","1");
INSERT INTO tb_foto VALUES("10","","0");



DROP TABLE IF EXISTS tb_funcionalidade;

CREATE TABLE `tb_funcionalidade` (
  `co_funcionalidade` int(11) NOT NULL AUTO_INCREMENT,
  `no_funcionalidade` varchar(150) NOT NULL,
  `ds_rota` varchar(250) NOT NULL,
  PRIMARY KEY (`co_funcionalidade`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

INSERT INTO tb_funcionalidade VALUES("1","Perfil Master","Admin/Index/SuperPerfil");
INSERT INTO tb_funcionalidade VALUES("2","Auditoria Listar","Admin/Auditoria/ListarAuditoria");
INSERT INTO tb_funcionalidade VALUES("3","Auditoria Detalhar","Admin/Auditoria/DetalharAuditoria");
INSERT INTO tb_funcionalidade VALUES("4","Usuario Cadastrar","Admin/Usuario/CadastroUsuario");
INSERT INTO tb_funcionalidade VALUES("5","Usuario Listar","Admin/Usuario/ListarUsuario");
INSERT INTO tb_funcionalidade VALUES("6","Meu Usuario","Admin/Usuario/MeuPerfilUsuario");
INSERT INTO tb_funcionalidade VALUES("7","Perfil Listar","Admin/Perfil/ListarPerfil");
INSERT INTO tb_funcionalidade VALUES("8","Perfil Cadastrar","Admin/Perfil/CadastroPerfil");
INSERT INTO tb_funcionalidade VALUES("9","Funcionalidade Listar","Admin/Funcionalidade/ListarFuncionalidade");
INSERT INTO tb_funcionalidade VALUES("10","Funcionalidade Cadastrar","Admin/Funcionalidade/CadastroFuncionalidade");
INSERT INTO tb_funcionalidade VALUES("11","Funcionalidades Perfil","Admin/Funcionalidade/FuncionalidadesPerfil");
INSERT INTO tb_funcionalidade VALUES("12","Agenda Adicionar Compromisso","Admin/Agenda/AdicionarCompromisso");
INSERT INTO tb_funcionalidade VALUES("13","Membros Listar","Admin/Membros/ListarMembros");
INSERT INTO tb_funcionalidade VALUES("14","Membros Cadastrar","Admin/Membros/CadastroMembros");
INSERT INTO tb_funcionalidade VALUES("15","Membros Retiro Listar","Admin/Membros/ListarMembrosRetiro");
INSERT INTO tb_funcionalidade VALUES("16","Membros Editar","Admin/Membros/EditarMembros");
INSERT INTO tb_funcionalidade VALUES("17","Membro Editar","Admin/Membros/EditarMembro");
INSERT INTO tb_funcionalidade VALUES("18","Membro Retiro Editar","Admin/Membros/EditarMembroRetiro");
INSERT INTO tb_funcionalidade VALUES("19","Evento Cadastrar","Admin/Evento/CadastroEvento");
INSERT INTO tb_funcionalidade VALUES("20","Evento Listar","Admin/Evento/ListarEvento");
INSERT INTO tb_funcionalidade VALUES("21","Tarefa Detalhar","Admin/Tarefa/DetalharTarefa");
INSERT INTO tb_funcionalidade VALUES("22","Tarefa Cadastrar","Admin/Tarefa/CadastroTarefa");
INSERT INTO tb_funcionalidade VALUES("23","Tarefa Listar","Admin/Tarefa/ListarTarefa");
INSERT INTO tb_funcionalidade VALUES("24","Tarefa Excluir","Admin/Tarefa/ExcluirTarefa");
INSERT INTO tb_funcionalidade VALUES("25","Agenda Calendario","Admin/Agenda/Calendario");
INSERT INTO tb_funcionalidade VALUES("26","Biblioteca Cadastrar","Admin/Biblioteca/CadastroLivro");
INSERT INTO tb_funcionalidade VALUES("27","Biblioteca Listar","Admin/Biblioteca/ListarLivro");



DROP TABLE IF EXISTS tb_livro;

CREATE TABLE `tb_livro` (
  `co_livro` int(11) NOT NULL AUTO_INCREMENT,
  `no_titulo` varchar(200) DEFAULT NULL,
  `no_editora` varchar(80) DEFAULT NULL,
  `no_autor` varchar(80) DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_observacao` text,
  `nu_ano_publicacao` int(4) DEFAULT NULL,
  `nu_paginas` int(11) DEFAULT NULL,
  `nu_isbn` varchar(45) DEFAULT NULL,
  `nu_edicao` int(3) DEFAULT NULL,
  `ds_foto_capa` varchar(200) DEFAULT NULL,
  `ds_palavras_chave` varchar(250) NOT NULL,
  PRIMARY KEY (`co_livro`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO tb_livro VALUES("1","Novo livro 6","teste de editora 88","novo autor de livros","2016-03-29 14:38:46","oo","2005","186","t6t966f22ff","10","Biblioteca/novo-livro-55-56fabda67c9e0.jpg","Deus, virgem maria");
INSERT INTO tb_livro VALUES("2","Novo livro 1","teste de editora 88","novo autor de livros","2016-03-29 15:07:09","pioj","1998","123","t6t966f22ff88","10","Biblioteca/novo-livro-1-56fac44d778f1.jpg","Deus, virgem maria");
INSERT INTO tb_livro VALUES("3","Novo livro 2","teste de editora","novo autor de livros 88","2016-03-29 15:08:02","jk","2001","30","t6t966f22ff","0","Biblioteca/novo-livro-2-56fac4820d2d1.jpg","Deus, virgem maria");
INSERT INTO tb_livro VALUES("4","Novo livro 3","teste de editora 88","novo autor de livros 88","2016-03-29 15:08:37","dfg","2005","25","t6t966f22ff","0","Biblioteca/novo-livro-3-56fac4a520195.jpg","Deus, virgem maria");
INSERT INTO tb_livro VALUES("5","Novo livro 4","teste de editorafgefg","novo autor de livros","2016-03-29 15:09:10","","2006","0","t6t966f22ff","0","Biblioteca/novo-livro-4-56fac4c6a57c7.jpg","Deus, virgem maria");
INSERT INTO tb_livro VALUES("7","Novo livro 7","teste de editora 88","novo autor de livros","2016-03-29 15:10:47","eferfg","2000","200","t6t966f22ff","10","Biblioteca/novo-livro-7-56fac52736514.jpg","Deus, virgem maria");



DROP TABLE IF EXISTS tb_membro;

CREATE TABLE `tb_membro` (
  `co_membro` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `dt_nascimento` date DEFAULT NULL,
  `st_status` varchar(1) DEFAULT NULL,
  `dt_cadastro` datetime NOT NULL,
  `st_batizado` varchar(1) NOT NULL,
  `st_eucaristia` varchar(1) NOT NULL,
  `st_crisma` varchar(1) NOT NULL,
  PRIMARY KEY (`co_membro`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=latin1;

INSERT INTO tb_membro VALUES("2","LETICIA MARTINS DE SOUSA","QR 213 conj. 04 casa 04","Samambaia Norte","(61) 9256-1414","","(61) 3459-6243","Márcia Rejane de Sousa","leticia.martinsousa@hotmail.com","S","N","","2000-02-23","N","2015-09-08 23:40:58","S","S","N");
INSERT INTO tb_membro VALUES("3","Cecília Pereira de Souza","Qr 601 conjunto 18 casa 11","Samambaia Norte","(61) 8626-7176","(61) 8228-5287","(61) 3357-2919","Silvane Aparecida Pereira de Souza ","cecilia.souzaba7@gmail.com","S","N","Por meio da paróquia São João Evangelista, e vários amigos que fazem parte do grupo jovem. ","2002-04-26","N","2015-09-08 23:41:04","S","S","N");
INSERT INTO tb_membro VALUES("5","Lucas Miranda Gontijo","Qr 401 conjunto 09 casa 30","Samambaia Norte","(61) 9410-2650","","(61) 3358-5155","Lucas Miranda Gontijo","Lucasgontijomaria@hotmail.com","N","N","Através de amigos. ","1996-11-09","N","2015-09-08 23:47:46","S","S","S");
INSERT INTO tb_membro VALUES("6","Suyane Tallita ","Qr 207 conjunto 01 casa 26","Samambaia norte","(61) 9300-1679","","(61) 3459-2093","Lidiane Reis Silva ","Suyane.silvastrs@gmail.com","S","N","Amigos da escola e amigos da igreja! !","1998-07-11","N","2015-09-08 23:48:35","S","S","S");
INSERT INTO tb_membro VALUES("7","Danilo Rodrigues Bezerra","Qr 423 Cj 12 Casa 26","Samambaia Norte ","(61) 9415-5719","(61) 9175-6764","(61) 3359-6391","Ana Arlete Rodrigues Bezerra ","Dan.Fazenda@hormail.com","S","N","","1998-04-06","N","2015-09-08 23:50:20","N","N","N");
INSERT INTO tb_membro VALUES("9","Nicole Yale","Qr 403 conjunto 06 casa 30","","6198706294","6198706294","6198706294","Alaíde Rocha","nicoleyale.ny@gmail.com","S","N","Através de um amigo que era do Gej ","1999-05-06","N","2015-09-08 23:54:22","S","S","S");
INSERT INTO tb_membro VALUES("10","Maysa Pereira Dias","QR 407 conj. 2 casa 6","Samambaia Norte","(61) 9668-1204","","(61) 3359-3317","Maria Pereira dos S. Dias","maysapd@hotmail.com","S","N","Pelas fundadoras, no ano da fundação.","1997-07-13","N","2015-09-08 23:57:44","S","S","S");
INSERT INTO tb_membro VALUES("11","Lilian Machado Carvalho Bessa","QR 403 conjunto 10 casa 28","Samambaia","(61) 9106-6240","","(61) 3082-6060","Lilian Bessa","lililasp@gmail.com","S","S","Sou fundadora rs","1988-10-31","N","2015-09-09 00:30:45","S","S","S");
INSERT INTO tb_membro VALUES("12","Paulo Vitor Rodrigues de Oliveira","QR 401 Conjunto 20 Casa 07","Samambaia Norte","(61) 9429-3606","","(61) 3458-2565","Antônia Ieda Rodrigues dos Reis","paulovitor3005@gmail.com","S","S","Através do retiro da crisma e de eventos organizados pelo grupo.","1997-05-30","N","2015-09-09 00:41:22","S","S","S");
INSERT INTO tb_membro VALUES("13","Fernando Rodrigues","QR 213 conjunto 03 casa 18","Norte","(61) 9214-0660","(61) 9277-1024","(61) 3459-3635","Marilene Rodrigues Mesquita","Fernandorodrigues.frm@gmail.com","N","N","Através de amigos.","1992-08-02","N","2015-09-09 01:52:15","S","S","S");
INSERT INTO tb_membro VALUES("14","Kamila Silva","Qr 405 conjunto 25 casa 05","Samambaia ","(61) 8553-9668","","(61) 3083-9668","Eurides","kamilaf.silva@hotmail.com","S","N","Pelo Elliel ????","1999-01-17","N","2015-09-09 06:06:08","S","S","S");
INSERT INTO tb_membro VALUES("15","Linneker Lima","QR 405 conj 13 casa 13","Samambaia ","(61) 8228-6402","","(61) 3459-4937","Eliene Lima","Linnekerlima@hotmail.com","N","S","Por meio de amigos.","1995-10-04","N","2015-09-09 06:31:55","S","S","S");
INSERT INTO tb_membro VALUES("16","Letícia Pereira da Silva","Quadra 301 conjunto 07 lote 1/6 apto 1005 bloco A Condomínio Via Tropical ","Samambaia Sul","(61) 9297-8818","(61) 9277-1024","(61) 9214-0660","Joelma Aparecida Pereira Batista","lelekinha.pereira@gmail.com","S","N","Na igreja e através das redes sociais !!","1999-08-03","N","2015-09-09 06:50:54","S","S","N");
INSERT INTO tb_membro VALUES("17","ALEXANDRE BARBOSA DE ARAUJO","Qr 411 conj 6 casa 2","Samamabaia Norte","(61) 8500-1641","","(61) 3359-3458","Alice","","S","S","","1999-07-30","N","2015-09-09 07:32:47","S","S","S");
INSERT INTO tb_membro VALUES("18","Rômulo Dias Miranda Cardoso","qn 211 conj 01 casa 35","Samambaia Norte","(61) 8522-0757","","(61) 3359-8257","Maria Celis Miranda dos Santos","romulomiran@hotmail.com","S","S","na Crisma de 2013 e me apaixonei por esses chatos. ","1997-05-23","N","2015-09-09 07:46:30","S","S","S");
INSERT INTO tb_membro VALUES("19","larissa silva de jesus ","qr 401 conjunto 29 casa 11 ","samambaia norte ","(61) 8654-0043","(61) 9210-8830","(61) 3082-6958","maria claudenice costa da silva ","larisssasilvaj@hotmail.com","N","S","por mim mesma ,obrigada ","1996-03-07","N","2015-09-09 08:11:00","S","S","S");
INSERT INTO tb_membro VALUES("20","Maria Eduarda Lima Roberto Gomes","Qr 405 - Conj 13 - Casa 13","Samambaia Norte","(61) 8644-6915","","(61) 3459-4937","Eliene ","","S","N","","2001-04-11","N","2015-09-09 17:16:09","S","S","N");
INSERT INTO tb_membro VALUES("21","Rita de Cássia","QR: 403 conjunto: 3 casa: 26","Samambaia norte","(61) 9280-4066","","","Antônia Aurinete ","ritadecassia201183@hotmail.com","S","S","","1997-11-03","N","2015-09-09 17:16:27","S","S","S");
INSERT INTO tb_membro VALUES("22","Taiane Ferreira Souto","QR 508 CONJ 01 CASA 23","Samambaia Sul","(61) 9368-7908","(61) 8682-2644","","Maria do Socorro Gomes Ferreira","taianecat2009@homtail.com","S","S","Através de uma amiga que faz partes do grupo , e pelos Retiros de Carnaval .","1999-02-26","N","2015-09-09 17:17:40","S","S","S");
INSERT INTO tb_membro VALUES("23","Alessandra de Sousa Pereira","Qr 403 conj 03 casa 26","Samambaia","(61) 9146-5160","","","Antônia Aurinete","Sandraaa1589@gmail.com","S","N","","2000-09-09","N","2015-09-09 17:18:31","S","N","N");
INSERT INTO tb_membro VALUES("24","Pâmela Cristina Ferreira Souto","QR 508 CONJ 01 CASA 23","Samambaia Sul","(61) 9426-8941","(61) 8682-2644","","Maria do Socorro Gomes Ferreira","taianecat2009@homtail.com","S","N","Através de uma amiga que faz parte do grupo .","1997-10-31","N","2015-09-09 17:18:55","S","S","S");
INSERT INTO tb_membro VALUES("25","Mariana Silva Gomes","QR 603 Conjunto 06 Lote 11","Samambaia Norte","(61) 8642-7684","(61) 8274-1015","(61) 3357-3502","Maria Ivone Silva Gomes","silvagomesmari@hotmail.com","S","N","Conversando com minhas catequistas,pedindo orientações de como me aproximar mais da Igreja,me indicaram o Gej..","2001-07-10","N","2015-09-09 17:20:00","N","N","N");
INSERT INTO tb_membro VALUES("26","Wellington Gomes da Cunha Freitas","QR 211 CONJUNTO 05 CASA 20 ","Samambaia Norte e ","(61) 8345-4255","(61) 8552-9714","(61) 3359-6366","","welfre@gmail.com.br","S","S","Através de uma parente ","1990-12-25","N","2015-09-09 17:24:07","S","S","S");
INSERT INTO tb_membro VALUES("27","Francisco Henrique Mota de Souza","QR: 425 CJ:27 CS:05","Samambaia Norte","(61) 9547-9913","","(61) 3359-5307","Luzia Paulino de Souza","fhms1996@gmail.com","S","S","Através de um amigo.","1996-01-30","N","2015-09-09 17:31:06","S","S","S");
INSERT INTO tb_membro VALUES("28","JAIME ABTIBOL PEREIRA","QR 209 CONJUNTO 07 CASA 16","SAMAMBAIA NORTE","(61) 8212-4379","","","","jaime.abtibol@gmail.com","S","S","Convite ","1993-02-05","N","2015-09-09 17:33:31","S","S","S");
INSERT INTO tb_membro VALUES("29","Mailson Costa de Aguiar","qr 403 cj 10 cs 21","samambaia","(61) 8244-9829","","(61) 3357-6475","Eliane Ferreira Costa","","S","N","Pelo retiro de crisma","1999-07-09","N","2015-09-09 17:35:28","S","S","S");
INSERT INTO tb_membro VALUES("30","Priscila Martins Matias","Qr 213 conjunto 05 casa 09","Samambia Norte ","(61) 9167-5324","(61) 9251-2368","(61) 3359-3574","Rita Maria Martins do Nascimento ","Priscilamartins213@gmail.com","N","N","Por amigos ","1999-02-03","N","2015-09-09 17:37:24","S","S","S");
INSERT INTO tb_membro VALUES("31","Ana Caroline Alves da Rocha","Qr 401 conj 05 casa 06 ","Samambaia Norte ","(61) 8373-1714","(61) 8296-4439","","Ana Caroline Alves da Rocha ","ana.carolinerocha95@hotmail.com","N","S","Através das maravilhosas Lilian e Letícia que me deram aula de Catequese anos antes do Gej ser fundado. ","1995-11-02","N","2015-09-09 17:45:38","S","S","S");
INSERT INTO tb_membro VALUES("32","Luana Ribeiro Bessa","QR 405 CONJUNTO 21 CASA 26","Samambaia Norte","(61) 9198-4370","","(61) 3359-3397","Luana Ribeiro Bessa","lukka_bessa@hotmail.com","N","S","Atraves da inspiração que Deus nos deu após uma vigilia com as reliquias de Dom Bosco :)","1993-08-17","N","2015-09-09 17:49:33","S","S","S");
INSERT INTO tb_membro VALUES("33","Filipe Santos Silva","Qr603 ch39 lote 31 condomínio Vida Nova","Samambaia Norte","(61) 9367-2587","","","","Filipesantos010@gmail.com","S","N","","1996-03-22","N","2015-09-09 17:51:02","S","S","S");
INSERT INTO tb_membro VALUES("34","Poliana Martins Soares","Qr 208 conj 22 casa 04","Samambaia Norte","(61) 8564-7543","","","Damiana Adália Soares","polianamartins_02@outlook.com","S","N","Através de amigos! ","1999-02-02","N","2015-09-09 17:52:23","S","S","S");
INSERT INTO tb_membro VALUES("35","Paulo Henrique Souza","qr405conj18casa06","samambaia norte","(61) 9968-6839","(61) 8254-7440","","Ana Lúcia Martins Souza","paulo_10df@hotmail.com","S","S","No retiro de crisma","1999-12-23","N","2015-09-09 17:56:18","S","S","S");
INSERT INTO tb_membro VALUES("36","Rafael Silva de oliveira","QR 213 conjunto 03 casa 26","Samambaia Norte ","(61) 8566-5983","(61) 8566-5983","(61) 8566-5983","Rosangela Maria Silva Santos ","rafael_flatro@hotmail.com","S","N","Através da primeira Vigília ","1995-12-19","N","2015-09-09 17:56:31","S","S","N");
INSERT INTO tb_membro VALUES("37","Rodrigo De Sousa Soares","Qr 404 conjunto 14 casa 26","Samambaia Norte","(61) 8590-3990","","(61) 3045-9022","Raimunda Pereira de Sousa","rodrigodisousa@gmail.com","S","N","conheci o gej através de conhecidos que faziam parte do grupo e me convidaram pra primeira vigilia alegria que vem de Deus ai participei do retiro de carnaval e me apaixonei pelo carisma do grupo","1997-02-16","N","2015-09-09 18:12:58","S","S","S");
INSERT INTO tb_membro VALUES("38","Dion Lucas Serafim Bispo","QR 207 CJ 04 CS 11","samambaia ","(61) 8548-7443","(61) 9301-4651","(61) 3459-9124","Dion Lucas Serafim Bispo","lucasgejeriano@gmail.com","S","N","Através de uma prima de um amigo irmão ","1997-08-04","N","2015-09-09 18:18:01","S","S","S");
INSERT INTO tb_membro VALUES("39","Lucas Lopes de Oliveira","QR 411 conjunto 11 casa 06","Samambaia Norte","(61) 9870-3831","(61) 8479-9360","(61) 3359-5376","Maria Aparecida","lucas9360@gmail.com","S","N","Na crisma","1998-02-11","N","2015-09-09 18:23:54","S","S","S");
INSERT INTO tb_membro VALUES("40","Julia Fernanda Braga da Silva","Qr 403 conjunto 06 casa 05 ","","(61) 8499-4010","","(61) 3082-5058","Simone gerônimo da Silva ","","S","N","Através da crisma ","1999-11-30","N","2015-09-09 18:27:32","S","S","N");
INSERT INTO tb_membro VALUES("41","raul dias miranda cardoso","qn 211 conjunto 01 casa 35","samambaia","(61) 9512-1814","","(61) 3359-8257","maria celis miranda dos santosa","raulmiran@hotmail.com","S","N","","2001-04-27","N","2015-09-09 18:28:42","S","S","N");
INSERT INTO tb_membro VALUES("42","Gabriel Da Silva Barbosa","Qr 405 , Conjunto 12 Casa 16","Samambaia","(61) 8549-4269","(61) 8322-9009","","Maria Vilanir Da Silva Barbosa","bielzinhogta_2009@hotmail.com","S","N","O grupo Gej Dom Bosco foi quem fez a minha Crisma !","1998-03-02","N","2015-09-09 18:29:18","S","S","S");
INSERT INTO tb_membro VALUES("43","Manoel Pereira dos Reis neto","Qr 405 conjunto 10 casa 15","","(61) 9663-3265","","(61) 3459-6546","Marilda dos reis oliveira","Manoelpereira58@gmail.com","S","N","Por amigos ","1998-08-07","N","2015-09-09 18:34:14","S","S","S");
INSERT INTO tb_membro VALUES("44","Ana Melyna Oliveira","Qr 202 conjunto 10 casa 23","","(61) 9102-2772","","(61) 3458-5448","Joelene","melyna_sousa@outlook.com","S","N","Através da primeira Virgília ","2001-01-11","N","2015-09-09 18:43:46","S","S","N");
INSERT INTO tb_membro VALUES("45","Mickelly Sousa dos Santos","QR 401 Conjunto 01 Casa 08","Samambaia","(61) 8109-5770","(61) 9218-5622","","Ana Célia Azevedo Barros","mickelly. 123@gmail.com","S","N","Através de uma visita, durante uma aula de crisma. ","1998-01-29","N","2015-09-09 18:59:12","S","N","S");
INSERT INTO tb_membro VALUES("46","ERICA STEPHANIE DE SOUSA CARVALHO","QR 205 CONJUTO 02 CASA 18","SAMAMBAIA NORTE","(61) 8195-1313","(61) 8464-0608","(61) 3357-1919","solangecarvalho\'","solpereirasousa@hotmail.com","S","N","PELO MEUS AMIGO E MEU IRMAO QUE JA FOI PARTICIPANTE DO GRUPO","2000-12-02","N","2015-09-09 19:09:06","S","S","N");
INSERT INTO tb_membro VALUES("47","Karolyne aguiar","Karolyneaguiar_bsb@hotmail.com","Samambaia ","(61) 8246-0606","","(61) 3357-0651","Sônia Maria ","","S","N","","2000-11-28","N","2015-09-09 19:11:56","S","N","N");
INSERT INTO tb_membro VALUES("48","Carolina isabelle lopes oliveira","Qr209 conj.05 casa28","samambaia","(61) 8563-9907","(61) 8302-6209","(61) 3459-9091","Adelina lopes oliveira","","S","N","Depois da virgilia.","2000-01-22","N","2015-09-09 19:13:35","S","S","N");
INSERT INTO tb_membro VALUES("49","Joyce Lopes","QR 609 01 02","Samambaia norte","(61) 9393-3476","","(61) 3459-3241","Janaina lopes","Joycefe.lopes@gmail.com","S","S","Através da crisma ","1998-10-28","N","2015-09-09 19:32:33","S","S","S");
INSERT INTO tb_membro VALUES("50","Fernanda Lima","Qn 211 conjunto 02 casa 51 lote 02","Samambaia Norte","(61) 9813-3206","","(61) 3559-1097","Rita Rodrigues Da Silva","Fernanda.karla.15@hotmail.com","S","N","Pela 1° vigilia Alegria que vem de Deus","2000-03-15","N","2015-09-09 19:37:40","S","S","S");
INSERT INTO tb_membro VALUES("51","Nathalia Pereira Dias","QR 407 conjunto 02 casa 06","Samambaia Norte ","(61) 9955-5202","","(61) 3359-3317","Maria Pereira dos Santos Dias","naathpdias@hotmail.com","S","N","Pela minha irmã que já tinha sido integrante","2001-03-29","N","2015-09-09 19:56:52","S","S","N");
INSERT INTO tb_membro VALUES("52","Elliel Kassio dos Santos Ferreira","Qr 209 Conjunto 02 Casa 17","Samambaia Norte","(61) 9603-5922","","(61) 3459-9565","Izabel Maria dos Santos Ferreira","elliel.ferreira@outlook.com","S","S","Através do Despertar Vocacional","1998-09-03","N","2015-09-09 20:53:57","S","S","S");
INSERT INTO tb_membro VALUES("53","Karen Mialichi da Silva Maia","QR 212 conjunto 14 casa 15","Samambaia Norte","(61) 8623-1547","","(61) 3458-6671","Ivanildes da Silva Maia","karenmialichii@gmail.com","S","N","Através de amigos integrantes do GEJ.","2000-01-29","N","2015-09-09 21:42:14","S","S","N");
INSERT INTO tb_membro VALUES("54","Diego Roca da Silva","QR 211 conjunto 02 casa 26","Norte ","(61) 9109-8481","(61) 8570-4620","(61) 3359-5182","Maria Edileuza da costa rocha","diegorsilva211@gmail.com","N","S","Frequentando as missas na Paróquia São João evangelista e amigos !  ","1995-11-14","N","2015-09-09 22:07:42","N","N","N");
INSERT INTO tb_membro VALUES("55","Beatriz Gomes dos Santos","QR 405 Conjunto 15 Casa 08","Samambaia Norte","(61) 8634-6115","(61) 9337-8081","(61) 3459-5545","Maria Iraldina Gomes dos santos","beatrizgomes_gsm@hotmail.com","S","N","Atraves da minha prima que ja era menbro do grupo e pelo retiro da Crisma","1997-07-27","N","2015-09-09 22:22:33","S","S","S");
INSERT INTO tb_membro VALUES("56","Fernanda Gomes de Freitas Moura","QR 405 conjunto 08 casa 15 ","Samambaia Norte ","(61) 8499-5380","","(61) 3359-2508","Geni Gomes ","fehs2gomes@hotmail.com","S","S","Através do meu irmão. ","1998-11-25","N","2015-09-09 22:26:31","S","S","S");
INSERT INTO tb_membro VALUES("57","Karine Victoria Oliveira da silva","Qr  603 chácara 39 Rua 4 casa 52A","Samambaia norte","(61) 8578-4112","","","Márcia Francina de oliveira","Karinekamillygatinhas@Gmail. Com","N","N","","2000-07-20","N","2015-09-09 22:43:03","N","N","N");
INSERT INTO tb_membro VALUES("59","LETÍCIA MACHADO CARVALHO BESSA","Qr 403 Cj 10 Cs 28","Samambaia Norte","(61) 9105-8681","(61) 8337-5957","(61) 3082-6060","","lelebessa@gejdombosco.com.br","S","S","","1992-08-27","N","2015-09-09 22:54:48","S","S","S");
INSERT INTO tb_membro VALUES("60","Gabriel Ribeiro de Sousa Figueiredo","Qr-401 Cj-25 Cs-27","Samambaia Norte","(61) 8431-4769","(61) 8605-0624","(61) 3013-0440","Gessivan Ribeiro de souza","gabrielribeirosf@gmail.com","S","N","Atravez de amigos da comunidade ","2000-01-04","N","2015-09-09 22:58:05","S","S","N");
INSERT INTO tb_membro VALUES("62","Rafael Paulino","QR 401 conj 16 casa 14","samambaia norte","(61) 8520-2835","","","","","S","N","","2001-02-25","N","2015-09-10 00:44:03","S","S","N");
INSERT INTO tb_membro VALUES("63","Douglas Souza","Qr 403 cj 02 casa 20","Samambaia Norte","(61) 8652-8982","","","Elias Martins","","N","N","","1997-03-18","N","2015-09-10 09:30:58","N","N","N");
INSERT INTO tb_membro VALUES("64","Vivian Belmira Rosa dos Santos","qn 209 cj 02 cs 22","samambaia norte","(61) 9517-7369","","","antônia","vivianbelmira@gmail.com","S","N","Por amigos e pela igreja","1998-09-23","N","2015-09-10 09:53:25","S","N","N");
INSERT INTO tb_membro VALUES("65","Thiago Marinho de Oliveira Vilas Boas","QR 405 CONJUNTO 11 CASA 07","Samambaia","(61) 9624-0659","","(61) 3459-9830","Maria Aparecida Vilas Boas","Grupovillasboas@hotmail.com","S","N","1° vigília alegria que vem de Deus","2000-08-18","N","2015-09-10 10:17:15","S","S","N");
INSERT INTO tb_membro VALUES("66","kamilly victoria oliveira da Silva","QR 603 CHA.39 RUA 4 CASA 52 A CONDOMINIO VIDA NOVA ","samambaia-norte ","(61) 8638-4219","","(61) 3458-5655","Márcia Francine ","kamilly2001_victoria@gmail.com","S","N","sou da paróquia a muito tempo,e conheci o gej através da minha irmã e então já quis conhece,participa dessa família maravilhosa","2001-12-05","N","2015-09-10 11:27:07","S","S","N");
INSERT INTO tb_membro VALUES("67","Islene Aguiar Do Nascimento","Qr 417 Conj 01 Casa 10","Samambaia Norte","(61) 8587-0864","(61) 9189-3307","(61) 3459-9632","Ivana Maria Aguiar Do Nascimento","isleneaguiar@gmail.com","S","N","conheci o Gej pelo retiro de Crisma ","1998-06-14","N","2015-09-10 11:34:50","S","S","S");
INSERT INTO tb_membro VALUES("68","CARLOS CHISTIAN","QR 207 Conj 5 Casa 20","Samambaia Norte","(61) 8529-2731","","","Maria Aparecida","Carloschristian03@gmail.com","N","S","Através de uns amigos a dois anos atrás ","1996-05-25","N","2015-09-10 11:42:21","S","S","S");
INSERT INTO tb_membro VALUES("69","Daniel Negreiro Marciel","QR 205 CONJUNTO 03 CASA 34","Samambaia Norte ","(61) 8576-6304","(61) 8576-6304","","Julio César Quirino Marciel Rodrigues","Daniel@glacon.com.br","S","S","Por amigos ","1998-05-14","N","2015-09-10 12:10:29","S","S","S");
INSERT INTO tb_membro VALUES("70","Paloma Rayssa da Silva dos Santos","QR 402 CONJUNTO 24 CASA 05","Samambaia Norte- Brasília","06191071150","","33572555","Dirceu Maria / Luiz Diogo","rpaloma0@gmail.com","S","N","Retiro de carnaval","1998-04-21","N","2015-09-10 12:48:20","S","S","N");
INSERT INTO tb_membro VALUES("71","Cinara Medeiro Martins","Qr 413 conj 11 casa 10","Samambaia Norte ","(61) 9122-5633","(61) 8329-1744","(00) 0000-0000","Francisca Irene e António Francisco","cinaramedeiros1313@gmail.com","S","N","Por a crisma","1998-06-15","N","2015-09-10 15:25:08","S","S","S");
INSERT INTO tb_membro VALUES("72","Gideon Morais Alves","qr 209 cj 07 cs 09","Samambaia Norte","(61) 9108-5943","","","","","N","N","","1998-05-31","N","2015-09-10 16:27:06","N","N","N");
INSERT INTO tb_membro VALUES("73","Leonardo Machado Carvalho bessa","qr 403 conjunto 10 casa 28","Samambaia Norte","(61) 9327-4991","(61) 8400-5270","(61) 3082-6060","","leonardomcbessa@gmaill.com","N","S","Pelas Irmãs Bessa","1984-07-06","N","2015-09-10 17:10:15","S","S","S");
INSERT INTO tb_membro VALUES("74","Bárbara Fonseca","QR 414 conjunto 13 casa 17","Samambaia Norte","(61) 8408-6741","(61) 8407-0644","(61) 3039-5165","Elaine Maria da Silva","babynhalidnha_@hotmail.com","S","N","Pela I Vigília Alegria que vem Deus ","1998-06-07","N","2015-09-10 18:56:03","S","S","N");
INSERT INTO tb_membro VALUES("75","Cellyne de Souza","Qr 110 conjunto 19 casa 12","Samambaia sul","61 81379948","61 83383704","33587242","Jucirene de Souza ","ju_jsm_@hotmail.com","S","N","Por pessoas que participam ","2000-09-30","N","2015-09-10 21:09:55","S","S","N");
INSERT INTO tb_membro VALUES("76","Andressa cristina da silva feitoza","Qr 205 conjunto 06 lote 08 casa 02 ","Samambaia norte ","(61) 8208-4583","","(61) 3359-3693","Waldiria ","dedessa1669@gmail.com","S","N","Através da igreja e de amigos...","2000-07-31","N","2015-09-10 23:21:41","S","S","N");
INSERT INTO tb_membro VALUES("77","Bruno Silva Pereira","Qr 405 conj 16 casa 33","Samambaia Norte","(61) 8594-9715","","(61) 3082-6966","Mara Camila Silva Braga","Bruno-mxm@hotmail.com","S","N","Pelo convite depois da minha crisma","1999-11-29","N","2015-09-11 10:09:26","S","S","S");
INSERT INTO tb_membro VALUES("78","Maria Laura Bastos de Souza (Laura)","QR 403 CONJUNTO 07 CASA 10","SAMAMBAIA NORTE","(61) 8487-6065","(61) 8449-9903","(61) 3458-8419","MARIA DA CONCEIÇÃO BASTOS GONÇALVES ","laura.baastosd@gmail.com","S","S","Na paróquia. Após minha crisma, pelas catequistas.","1995-03-28","N","2015-09-11 10:27:10","S","S","S");
INSERT INTO tb_membro VALUES("79","Geraldo henrique de Lima Junior","Qr406 conj 01 casa 26","Samambaia  norte","(61) 9123-3030","(61) 8644-8574","(61) 3358-6605","Joselina Ribeiro  de moura ","henrique.jr93@gmail.com","S","S","Com amigos ","1998-02-14","N","2015-09-11 13:10:03","S","S","S");
INSERT INTO tb_membro VALUES("80","Lara de souza felix","Qr403 cj 9 cs 20","samambaia norte","(61) 8541-5218","","(61) 3358-2381","maria Lucilene ","larafeelix@gmail.com","S","N","Minha prima que me apresentou ","2000-06-17","N","2015-09-11 14:36:47","N","N","N");
INSERT INTO tb_membro VALUES("81","Diego Pimenta Rodrigues","Quadra 221 Conjunto 03 Casa 19","Norte","(61) 8447-1448","","(61) 3359-6093","Vespasiana Rocha Rodrigues","diegodeus456@gmail.com","S","N","Virgília Dom Bosco","1998-09-13","N","2015-09-11 16:59:01","S","S","S");
INSERT INTO tb_membro VALUES("82","Fabrício Alves Oliveira","QR 421 conjunto 16 casa 03","Samambaia Norte ","(61) 9410-8557","(61) 9398-7791","(61) 3359-2037","Maria de Jesus Alves Oliveira","fabricio_setemares@hotmail.com","S","N","Eu conheci na primeira Virgília e ai sempre fui doido para entrar desde quando conheci,fui nas duas virgilias,e não quero perder essa oportunidade de entrar pro melhor grupo ","2001-07-05","N","2015-09-11 17:11:35","S","S","N");
INSERT INTO tb_membro VALUES("83","darley Almeida","Qr 213 conjunto 05 casa 09","Samambia Norte ","(61) 9408-4434","","","","","S","N","Através de um amigo ","1994-09-28","N","2015-09-11 17:55:51","N","N","N");
INSERT INTO tb_membro VALUES("84","Sabrina Alves","Qr 414 conjunto 16 casa 31","Samambaia Norte ","(61) 8182-5248","","","Bia Alves Carvalho ","bininha_405@hotmail.com","S","N","Através da Crisma ","1997-07-19","N","2015-09-11 18:50:26","S","S","S");
INSERT INTO tb_membro VALUES("85","Jerlane Soares Magalhaes Da Silva","Qr 211 conj 01 casa 26","Samambaia norte","(61) 9584-0876","(61) 9369-7311","","Maria Edileuza","jerlanesilva06@hotmail.com.br","S","N","Pelo Rômulo q me apresentou ao grupo e naum me arrempendo de ter conhecido o Gej","2001-02-06","N","2015-09-11 22:42:20","S","S","N");
INSERT INTO tb_membro VALUES("86","Marcos Rian Tomé de Oliveira","QR 401 CONJ 20 CASA 08","","(61) 8481-3867","","(61) 3357-0832","Ataliba","Rian.fla65@gmail.com","S","N","Pelo meu primo ( Paulo Vitor )","2015-09-18","N","2015-09-12 19:38:15","S","S","N");
INSERT INTO tb_membro VALUES("87","Gabrielle Rodrigues Oliveira","qn211conjuto 2 casa 4","samambaia","(61) 9120-3923","(61) 9245-7360","","Maria do Socorro Rodrigues Santos","gabriele25_@hotmail.com","S","N","Atravez da 1° virgilia alegria que vem de Deus !","2000-03-04","N","2015-09-12 20:49:31","S","S","N");
INSERT INTO tb_membro VALUES("88","Atila Santos Lima","Qr 209 Conjunto 05 Casa 17","Norte","(61) 9395-0808","","","","atilla.santos@outlook.com","S","S","Através da crisma","2015-10-18","N","2015-09-13 10:11:43","S","S","S");
INSERT INTO tb_membro VALUES("89","Leander Guilherme Silva Saraiva","Qr405 cj16 Cs33","Samambaia norte","(61) 8616-9388","","(61) 3082-6966","Marcella Priscila da Silva Braga","leander1guilherme@gmail.com","S","N","Através do meu primo.\n\n","1999-09-28","N","2015-09-13 10:39:14","S","N","N");
INSERT INTO tb_membro VALUES("90","kivia pereira de souza","Qr 407conj 04 casa 07 ","samambaia norte","(61) 8609-9037","(61) 8639-1113","(61) 3459-6493","Ana lidia pereira de souza ","kivia407@gmail.com","S","N","Através de pessoas principalmente da sabrina ela me falou que o gej era tudo de bom e me chamou para fazer parte dessa família e eu pensei bem e agora quero participar . ;)","2000-11-01","N","2015-09-13 10:41:47","S","S","N");
INSERT INTO tb_membro VALUES("91","Geovana Vieira Mendes","Qr 205 conjunto 05 casa 11","Samambaia Norte","(61) 9637-9652","","","Gildeni Mendes Vieira Queiroz","Gil100mendes@gmail.com","S","N","Atraves dos encontros catequéticos","2001-10-01","N","2015-09-13 13:16:51","S","S","N");
INSERT INTO tb_membro VALUES("92","Karolina Mota de Aguiar","QR 209 conjunto 05 casa 27","Norte","(61) 9331-6425","(61) 8584-0551","(61) 3359-6361","Edileus mota Araújo ","karollina@live.com","S","N","No meu retiro da crisma em 2012","1997-04-30","N","2015-09-14 18:03:43","S","S","S");
INSERT INTO tb_membro VALUES("94","Lucrece Neri Portela","Qr 403 Conjunto 16 Casa 17 ","Samambaia Norte","(61) 9315-1297","","(61) 3358-8725","Lucilene Aguiar Neri Portela","lucrece.neri@hotmail.com","N","S","Conheci o GEJ no ano de 2012 em uma visita com convite na minha sala de catequese.","1996-11-06","N","2015-09-14 18:52:34","S","S","S");
INSERT INTO tb_membro VALUES("95","Brenno Silva","QR 401 conjunto 29 casa 11","Samambaia","(61) 8672-2667","","","Larissa Silva","BrennoSilva.401@outlook.com","S","N","Pela a Igreja","2001-02-13","N","2015-09-14 19:00:25","S","S","N");
INSERT INTO tb_membro VALUES("96","Graziele de sousa nascimento","QR 415 cj 2 CS 19","Samambaia","(61) 9241-8953","(61) 9184-2036","(61) 3459-1852","Jusiane Maria de sousa","Zielyprincesa415@hotmail.com","S","S","Através dos eventos q eles nos chamavam pra participa do grupo","1999-08-07","N","2015-09-14 19:34:39","S","S","S");
INSERT INTO tb_membro VALUES("97","Dyana Batista dos Santos","Qr 401 conjunto 18 casa 26","Samambaia","(61) 8571-9044","","(61) 3082-5802","Neymar/Joana","Dydy-batista@hotmail.com","S","N","Meu irmão participava ","1999-09-29","N","2015-09-15 18:57:07","S","S","S");
INSERT INTO tb_membro VALUES("100","Marina Silva","QR 609 CJ 01 Cs06","Samambaia Norte","(61) 9294-8068","","(61) 3459-1833","Mauro","Marinaibe1802@gmail.com","S","N","Através de amigos ","2001-02-18","N","2015-10-25 18:54:58","S","S","N");
INSERT INTO tb_membro VALUES("101","Andressa Carvalho da Silva","Qr 603 Chac 39 Rua 3- condomínio Vida Nova casa 25 A","Samambaia Norte ","(61) 8557-2017","","","Remivaldo Donizete Jesus da Silva ","andy.ncarvalho5@gmail.com","S","N","Conheci o GEJ na I vigília Alegria que vem de Deus, porém, só tive interesse de participar na II vigília Alegria que vem de Deus.","2000-10-12","N","2015-10-25 19:05:36","S","S","S");
INSERT INTO tb_membro VALUES("102","Jéssica Lopes Ferreira","Qr 609 conj 01 casa 02","Samabaia norte","(61) 9569-7376","","(61) 3459-3241","Janaína Lopes","Jessicalopes767@gmail.com","S","N","Através da minha irmã e amigos ","2000-05-04","N","2015-10-25 19:30:42","S","S","N");
INSERT INTO tb_membro VALUES("103","Stéfanni Aguiar Azevêdo","Qr 403 conjunto 11 casa 02","Samambaia Norte ","(61) 9341-6877","","","Lucilene Aguiar Neris","","S","N","","1999-02-02","N","2015-10-25 19:45:17","S","S","S");
INSERT INTO tb_membro VALUES("104","Bruna Araújo de Matos","Qr 203 Conjunto 4 casa 23","Samambaia norte ","(61) 9246-9704","","(61) 3359-4065","Luiza","bruna.a.matos@hotmail.com","S","N","Pela crisma ","1995-06-30","N","2015-10-25 21:04:44","S","S","S");
INSERT INTO tb_membro VALUES("105","Ingrid De Oliveira","qr 417 cj10 casa 23","samambaia norte","(61) 8649-3711","(61) 8558-8755","(61) 3459-7211","Ana Paula De Oliveira","ingrid_745@hotmail.com","S","N","com os membros do grupo gej.","2000-06-07","N","2015-10-25 22:26:02","S","S","S");
INSERT INTO tb_membro VALUES("106","Mailane Noleto Espíndola","Qr 205 conjunto 07 casa 23 ","Samanbaia Norte ","(61) 9971-7009","(61) 8583-7009","","","Mailanespindola@gmail.com","S","S","Através do meu Retiro de Crisma. ","1995-02-06","N","2015-10-26 12:39:26","S","S","S");
INSERT INTO tb_membro VALUES("107","João Diego Tonhá dos Santos","Q QR 210 Conjunto 24","","(61) 8535-6095","","6132018084","Jussaria de Souza Tonhá","diego46zinho@hotmail.com","S","N","Amigos ","1996-09-15","N","2015-10-26 12:40:46","S","S","S");
INSERT INTO tb_membro VALUES("108","Vitória Prudêncio Lima","QR 421 CONJUNTO 09 CASA 11","Samambaia Norte","(61) 9642-8563","","(61) 3559-0374","Maria Lima","vicclima123@hotmail.com","S","N","Através de duas pessoas que me falaram sobre ele e me chamaram para participar.","1998-06-21","N","2015-10-26 12:51:26","S","S","S");
INSERT INTO tb_membro VALUES("109","Ana Clara Ferreira","Qr 403 conjunto 2 casa 24","Samambaia Norte ","(61) 8285-9025","","(61) 3082-6201","Eraildes Madalena Ferreira ","","S","N","Através da divulgação dos membros ","1999-12-06","N","2015-10-26 13:24:20","S","S","S");
INSERT INTO tb_membro VALUES("110","Thaynara Barbosa de Almeida","Qr 209 conjunto 01 lote 28 apartamento 104","Samambaia norte ","(61) 9525-0255","(61) 8658-3590","(61) 3359-4933","Maria de Jesus Barbosa de Almeida","thaynara.mkt@gmail.com","S","N","Por amigos ","1998-05-25","N","2015-10-26 15:26:37","S","S","S");
INSERT INTO tb_membro VALUES("111","Davi Pereira Alves","QR 603, Condomínio, Rua 05, Lote 75B","Samambaia Norte, DF","(61) 9438-8569","","(61) 3358-4911","Antonia Pereira da Silva","alves.davipereira15@gmail.com","S","N","Diante da minha decisão de crismar, que comentei com família, amigos e conhecidos, fui apresentado ao grupo no qual não foi apenas me oferecido participação mas também ajuda.","2000-05-12","N","2015-10-27 15:39:16","S","S","N");
INSERT INTO tb_membro VALUES("112","Pâmela Virgilio dos Santos","Qr 405 conjunto 12 casa 08","Samambaia ","(61) 8564-6765","(61) 8409-8381","(61) 3459-4391","Lúcia Virgilio ","pamelavirgilio063@gmail.com","S","S","Através de amigos que participava do GEJ.","1999-11-23","N","2015-10-28 13:46:26","S","S","S");
INSERT INTO tb_membro VALUES("113","Lucas Coutinho de Lucena","Qr 223 conj 06 cs 19","Samambaia Norte","(61) 9527-6714","(61) 8280-7846","","Eunice Coutinho de Alcobaças","Lucas_coutinho223@hotmail.com","S","N","","1996-02-04","N","2015-10-28 18:01:40","S","S","S");
INSERT INTO tb_membro VALUES("114","jonathan ferreira dionisio","QR 203 CONJUNTO 4 CASA 27","samambaia","(61) 8668-4645","","(61) 3357-2107","verônica moreira da silva","jonatha.ferreira.dionisio@gmail.com","S","N","retiro crisma e no inicio da catequese da crima","1999-12-09","N","2015-10-31 20:00:33","S","S","S");
INSERT INTO tb_membro VALUES("115","jonathan ferreira","QR 203 CONJUNTO 4 CASA 27","samambaia","(61) 8668-4645","","(61) 3357-2107","verônica moreira da silva","jonatha.ferreira.dionisio@gmail.com","S","N","retiro crisma e no inicio da catequese da crima","1999-12-09","N","2015-10-31 20:09:26","S","S","S");
INSERT INTO tb_membro VALUES("116","Maria Luiza Moura de Souza","QR 213 conjunto 03 casa 17 ","Samambaia Norte","(61) 9555-4014","(61) 8681-9609","(61) 3459-8307","Mônica Moura","Marialuizamouradesouza@gmail.com","S","N","Através de dois amigos meus da escola que faz parte do Gej ","2001-05-24","N","2015-10-31 21:50:41","S","S","N");
INSERT INTO tb_membro VALUES("117","Sávio Bispo Reis","Qr 209 conj 07 casa 06","","6199991627","6199991627","","Marizete bispo reis","savinhosba@gmail.com","S","N","Na igreja","2000-09-04","N","2015-11-01 10:08:37","S","S","S");
INSERT INTO tb_membro VALUES("118","Ana Julia Ferreira","Qr 403 conjunto 2 casa 24","Samambaia Norte ","(61) 8276-0443","(61) 8201-4967","(61) 3082-6201","Eraildes M. Ferreira","Ferreirajulia10@hotmail.com","N","S","Por amigos e pela minha irma","2002-03-08","N","2015-11-02 11:58:13","N","N","S");
INSERT INTO tb_membro VALUES("119","marli alves figueredo","QN 312 CJ 07 LT 01 AP1007","SAMAMBAIA NORTE ","(61) 8223-8261","","(61) 3458-2370","MARLI ALVES FIGUEREDO","marli92@outlook.com","N","S","EU CONHECI O GEJ FAZENDO CATEQUESE. QUANDO FUI PRO RETIRO DE CRISMA CONVERSEI COM ALGUMAS MENINAS DO GRUPO.ENTÃO FUI A UMA REUNIÃO E AMEI MUITO.","1992-08-26","N","2015-11-07 10:34:03","S","N","N");
INSERT INTO tb_membro VALUES("120","Marcelo Souza Dos Santos","QR 401 Conjunto 01 casa 08","Samambaia norte","(61) 8108-9773","(61) 8167-7779","(61) 3358-9992","Manuel Alves Dos Santos","marcelosousa868@gmail.com","S","N","Em um encontro após a crisma","2000-02-20","N","2015-11-08 22:39:23","S","S","S");
INSERT INTO tb_membro VALUES("123","Karen Geovanna","Qr 423 Conjunto 03 Casa 24","Samambaia Norte","(61) 9528-2513","","","Denyse","karenn.geovanna@gmail.com","S","S","Conheci por algumas pessoas na escola e pela II Vigilia alegria que vem de Deus. *-*","1998-04-17","N","2015-11-18 20:51:31","S","S","S");
INSERT INTO tb_membro VALUES("124","Ana Catharine alves de sousa leite","Qr 403 cj 07 casa 10","samambaia-norte","(61) 8682-6476","(61) 8496-2440","(6_) ____-_____","","","N","N","","1998-12-09","N","2015-11-20 17:53:19","N","N","N");



DROP TABLE IF EXISTS tb_membro_retiro;

CREATE TABLE `tb_membro_retiro` (
  `co_membro_retiro` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `ds_membro_ativo` varchar(1) DEFAULT 'N',
  `ds_situacao_atual_grupo` int(1) DEFAULT NULL,
  `co_evento` int(10) unsigned NOT NULL,
  `nu_camisa` int(1) NOT NULL,
  `st_pagamento` varchar(1) NOT NULL DEFAULT 'N',
  `no_responsavel` varchar(50) NOT NULL,
  `nu_tel_responsavel` varchar(15) NOT NULL,
  `ds_descricao` text NOT NULL,
  PRIMARY KEY (`co_membro_retiro`),
  KEY `fk_tb_membro_retiro_tb_retiro1_idx` (`co_evento`)
) ENGINE=MyISAM AUTO_INCREMENT=262 DEFAULT CHARSET=latin1;

INSERT INTO tb_membro_retiro VALUES("1","Walter Martins","avenida ferroviaria E n 1023 ","setor Nodeste","1999-08-26","(61) 9917-0367","","","2015-09-14 19:22:47","ministerio de Musica","N","","","","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("2","marcos santos dias","rua 11 quadra 29 casa 22 ","bella vista ","1981-07-16","(61) 9829-4828","","marcossantosdias5@gmail.com","2015-09-14 19:31:42","","N","","","","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("3","eliar da costa santos","rua 11 quadra 29 casa 22 ","bella vista ","1984-12-16","(61) 9962-6703","","","2015-09-14 19:36:10","","N","","","","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("4","Ana Paula Souza Dos Anjos","rua 11c 11 Q 28 setor bela vista","bela vista","1994-02-22","(61) 9933-5206","","","2015-09-14 20:00:32","","N","","","","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("5","Angela Souza Dos Anjos","Travessa rua 08 n 12","Setor imperatriz","1995-04-24","(61) 9666-2643","(61) 9613-0649","Anginhaanjos@gmail.com","2015-09-14 20:07:27","Conferência","N","","","","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("6","Nayara carolynna donnici Miranda","Rua sem denominação número 22","Bela vista ","1992-12-06","(61) 9917-7388","","Nayaradonnici@gmail.com","2015-09-14 22:19:57","EESA, liturgia Ssvp","N","","","","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("7","Jhonas Lustosa","Qnn 03 conjunto c casa 06","Ceilândia norte","1994-10-09","(61) 9604-3836","","Jhonas.Lustosa@gmail.com","2015-09-14 22:20:15","","N","","","","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("8","Lindemberg Divino Soares Alves Xisto","Avenida Valeriano de Castro N° 813 ","Centro","1990-06-03","(61) 9922-5747","","berg.soares21@hotmail.com","2015-09-14 22:32:38","Ministério de Música Nas Asas Do Senhor","N","","","","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("9","Alessandra Batista Silva Santos","Rua José Jacinto n 80 ","Jardim Califórnia","1989-06-28","(61) 9607-0929","(61) 3631-6950","Sandrinha.agde@hotmail.com","2015-09-14 23:00:29","Ssvp","N","","","","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("10","Gabriel Pereira Junior","Rua 10 numero 176 ","Formosinha","1990-05-20","(61) 6199-52802","(61) 3631-6050","Gabrielfsajunior@gmail.com","2015-09-14 23:19:37","Ssvp","N","","","","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("11","Luana Gomes da Silva","rua 10 n 10 ","parque das laranjeiras ","1996-07-04","(61) 9831-9391","(61) 9651-2173","luanakayto@gmail.com","2015-09-14 23:22:17","","N","","","","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("12","Mayk Muniz Nogueira Barros","Rua 5  Numero 239","Parque das Laranjeiras","1993-01-30","(61) 9937-5944","(61) 9618-4791","Mayknogueira1356@hotmail.com","2015-09-15 08:23:42","EESA(escola de evangelizaçao santo andre)","N","","","","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("13","Jéssica Mayara de Lima","Rua São Benedito número 152 ","Formosinha","1994-11-27","(61) 9645-6875","","jslima968@gmail.com","2015-09-15 08:57:23","Sociedade São Vicente de Paulo","N","","","","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("14","William Rodrigues de Ataides","rua 05","ferroviario ","1985-10-03","(61) 9609-8729","","wilataides@gmail.com","2015-09-15 09:20:02","Sociedade São Vicente de Paulo","N","","","","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("15","Raiane Santos Pinto","Travessa Olimpio Spindola n° 69","Centro","1993-08-02","(61) 9966-6592","","raahspinto@hotmail.com","2015-09-15 10:24:51","SSVP, EESA- Escola de Evangelização Santo André","N","","","","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("16","mariaconceiçaodeoliveira","rua 11 Qd 28 lt 21","bela vista","1985-12-08","(61) 9613-1059","","mariadaconceiçao@hotma","2015-09-17 15:09:08","","N","","","","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("17","Isabella Heloisa dos Santos Guia","Rua santa teresinha","Setor nordeste","1996-06-18","(61) 9679-7910","(61) 9906-3437","Isabella.heloisaa@gmail.com","2015-09-17 15:26:18","Grupo de música/ Dizimo","N","","","","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("48","Gideon Morais Alves","Qr 209 cj 07 cs 09","Samambaia Norte","1998-05-31","(61) 9308-5943","","gideonmalves@gmail.com","2015-11-18 18:08:55","","S","","","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("19","Zé Carlos Cardoso dos Santos","Rua 22 quadra 46 n 20","Jardim das oliveiras","1981-10-13","(61) 9962-6568","","Wwwzequinhapatensegmail.com","2015-09-17 22:55:15","Canta no Grupo emanoel","N","","","","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("20","ana paula neres","rua05 quadra 84 lote 19 ","parque vila verde","1989-07-12","(61) 9836-1308","","","2015-09-18 19:02:48","ssvp","S","","","","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("21","lucas viera da silva","rua. 05 qd84 lt 19","vila verde. formosa go","1990-06-05","(61) 9996-7856","","","2015-09-18 19:09:03","ssvp","S","","","","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("22","GLEITON DE SOUSA BRASILEIRO","Rua 21 nr 197","Setor nordeste ","1985-03-25","(61) 9976-5961","","Gleiton.brasileiro@gmail.com","2015-09-18 21:52:27","Sociedade São Vicente de Paulo","S","","","","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("23","Leidiane do Nascimento Alves","Rua Augusto Inácio de Macedo Q:01, L:10 Formosa","Jardim California","1988-09-30","(61) 9909-9418","","leidiannealves@hotmail.com","2015-09-18 22:11:24","E.J.V.C","S","","","","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("24","Leonardo Machado Carvalho Bessa","qr 403 conjunto 10 casa 28","Samambaia","1984-07-06","(61) 9327-4991","","leonardomcbessa@gmail.com","2015-11-10 11:32:58","","S","726.814.381-87","2077811","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("25","Lilian Machado Carvalho Bessa","Qr 403 CJ 10 CS 28","Samambaia ","1988-10-31","(61) 9106-6240","","lililasp@gmail.com","2015-11-10 18:34:32","","S","023.511.271-29","2529020","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("89","ana catharine alves de sousa leite","Qr 403 cj 07 casa 10","samambaia-norte","1998-12-09","(61) 8682-6476","(61) 8496-2440","anacatharine_ana123@hotmail.com","2015-11-20 17:51:40","","S","029.209.751-45","3438740","S","1","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("27","Fernanda Gomes de Freitas Moura","Qr 405 conjunto 8 casa 15 ","Samambaia Norte ","1998-11-25","(61) 8499-5380","","fehs2gomes@hotmail.com ","2015-11-18 16:02:22","","S","053.103.531-00","","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("141","Bruno Vinicius de Souza Oliveira","QR 403 CONJUNTO 09 CASA 20","SAMAMBAIA NORTE","2001-06-27","(61) 9902-0660","(61) 3357-2381","brunnovn300@hotmail.com","2015-12-11 17:34:51","","S","","","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("142","Maria karlene Ramos Lima","Quadra 46 lote 14","Santa Lúcia  Águas Lindas ","1986-08-24","(61) 9271-7998","","karlenerlima@gmail.com","2015-12-11 17:38:01","","S","013.046.941-60","2410507","N","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("46","Julia Fernanda braga da Silva","403 06 05 ","Samambaia ","1999-11-30","(61) 8499-4010","(61) 8544-2789","Juliafernanda16@hotmail.com","2015-11-18 17:19:46","","S","065.568.291-02","3510490","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("45","Kamila Francisco Silva","Qr 405 conjunto 25 casa 05","Samambaia ","1999-01-17","(61) 8553-9668","(61) 8613-0447","kamilaf.silva@hotmail.com","2015-11-18 16:58:55","","S","062.440.351-35","3433231","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("33","Priscila Martins Matias","Qr 213 conjunto 05 casa 09","Samambia Norte ","1999-02-03","(61) 9167-5324","","Priscilamartins213@gmail.com","2015-11-18 16:22:05","","S","064.087.351-00","","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("49","Paulo Vitor Rodrigues de Oliveira","Qr 401 Conjunto 20 Casa 07","Samambaia Norte (Samambaia)","1997-05-30","(61) 9429-3606","(61) 8462-5249","paulovitor3005@gmail.com","2015-11-18 18:19:46","","S","059.487.921-37","3340445","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("52","Nathalia Pereira Dias","QR 407 conjunto 02 casa 06","Samambaia Norte ","2001-03-29","(61) 9955-5202","(61) 9843-8828","naathpdias@hotmail.com","2015-11-18 18:44:11","","S","049.997.391-78","3147688","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("38","Rômulo Dias Miranda Cardoso","Qn211 conjunto 01 casa 35","Samambaia norte","1997-05-23","(61) 8522-0757","","Romulomiran@hotmail.com","2015-11-18 16:28:17","","S","056.989.781-58","3078508","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("90","Geni Gomes da Silva Moura","QR 405 conjunto 8 casa 15 ","Samambaia Norte ","1968-07-16","(61) 8400-8088","","genifff@gmail.com ","2015-11-20 19:04:30","","S","443.043.151-53","935471","N","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("44","Diego Pimenta Rodrigues","Quadra 221 conj 03 casa 19","samambaia norte","1998-09-13","(61) 8447-1448","(61) 8487-1687","diegopiimenta21@gmail.com","2015-11-18 16:46:07","","N","035.070.701-46","760357","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("51","Clarisse Vitória França Pereira","Qr 603 chácara 39 rua 05 casa 68B","Samambaia","1996-03-01","(61) 8452-5449","(61) 3458-2228","clarissevitoriafranca@gmail.com","2015-11-18 18:38:34","","S","053.010.061-42","3355675","S","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("42","Islene Aguiar do Nascimento","Qr 417 conj 01 casa 10 ","Samambaia Norte","1998-06-14","(61) 9189-3307","(61) 8587-0864","isleneaguiar@gmail.com","2015-11-18 16:41:32","","S","055.162.411-62","3290245","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("140","Thayná Azevedo Brandão","QNJ 08 CASA 17 ","Taguatinga Norte","1999-08-02","(61) 8225-9415","","Margarita.magalhaes@gmail.com","2015-12-11 14:55:14","","S","033.846.891-94","2870472","N","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("53","Tiago Freire Lopes","Qr 413 conjunto 11 casa 28 ","Samambaia norte","1995-07-01","(61) 8236-4375","(61) 3082-5160","tyagolopesdf@gmail.com","2015-11-18 18:46:39","","S","051.479.841-60","2008099109030","S","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("54","Lucrece Neri Portela","Qr 403 Conjunto 16 Casa 17 ","Samambaia Norte","1996-11-06","(61) 3358-8725","(61) 9315-1297","lucrece.neri@hotmail.com","2015-11-18 19:08:09","","S","048.987.841-51","3239132","S","1","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("55","Poliana Nunes de Andrade","Qr 611 Conj 04 Casa 04","Samambaia Norte","1998-11-25","(61) 9857-5018","(61) 3359-3804","andradepoliana25@gmail.com","2015-11-18 19:09:56","","S","","","S","2","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("56","juliana lima de araujo","qr 405 conjunto 16 casa 40","Samambaia","1995-04-03","6199933466","6199933466","julianafg405@gmail.com","2015-11-18 19:21:19","","S","058.212.521-99","2809286","S","2","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("58","Sávio Bispo Reis","Qr 209 conj 07 casa 06","","2000-09-04","6199991627","6199991627","savinhosba@gmail.com","2015-11-18 19:51:10","","S","","","S","1","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("59","Maria Laura Bastos de Souza","QR 403 CONJ 07 CASA 10","Samambaia Norte","1995-03-28","(61) 8487-6065","(61) 3458-8419","laura.baastosd@gmail.com","2015-11-18 19:55:41","","S","048.976.731-19","3174535","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("60","Karen Geovanna","Qr 423 Conjunto 03 Casa 24","Samambaia Norte","1998-04-17","(61) 9528-2513","","karenn.geovanna@gmail.com","2015-11-18 20:41:21","","S","060.508.581-10","3445561","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("61","Ana Melyna de Oliveira Carvalho Sousa","Qr 202 conjunto 10 casa 23","","2001-01-11","(61) 9102-2772","(61) 8471-7862","melyna_sousa@outlook.com ","2015-11-18 21:20:52","","S","","19249","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("62","Andressa Cristina da Silva Feitoza","Qr 205 conjunto 06 casa 08","Samambaia Norte ","2000-07-31","(61) 8571-9753","(61) 3359-3693","dessa1669@gmail.com","2015-11-18 23:43:39","","S","071.180.771-00","3684599","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("93","Karine Victoria Oliveira da silva","Qr 603 chácara 39 Rua 4 casa 52A condomínio vida nova","Samambaia ","2000-07-20","(61) 8578-4112","(61) 8517-5039","Karinekamillygatinhas@hotmail.com","2015-11-21 09:16:53","","S","004.414.851-89","3709850","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("64","Francisco Henrique Mota de Souza","QR: 425 CJ:27 CS:05","Samambaia Norte","1996-01-30","(61) 9547-9913","(61) 3359-5307","fhms1996@gmail.com","2015-11-19 13:49:54","","S","043.370.203-65","5879927","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("66","Gleice Izabel de Azevedo","Qr 403 conjunto 12 casa 09","Samambaia Norte ","1998-11-10","(61) 8299-9300","","gleice.izazavedo@gmail.com","2015-11-19 14:25:21","","S","731.845.001-87","3244897","S","1","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("67","Suyane Tallita Reis Silva","qr 207 conjunto 01 casa 26","Samambaia Norte","1998-07-11","(61) 9300-1679","(61) 8477-4148","suyane.tallita@outlook.com","2015-11-19 15:14:43","","S","063.524.781-07","3460572","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("68","THAIS OLIVEIRA DA COSTA","QR 615 CONJUNTO 01 CASA 21","SAMAMBAIA NORTE","1993-04-23","(61) 9297-1837","(61) 3458-6671","thaisksm23@gmail.com","2015-11-19 15:51:03","","S","038.944.431-62","2950728","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("69","KEITER DA SILVA MAIA","QR 212 CONJUNTO 14 CASA 15 ","SAMAMBAIA NORTE","1992-11-22","(61) 9183-9164","(61) 3458-6671","","2015-11-19 15:54:13","","S","036.433.471-11","2906270","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("70","MANOEL PEREIRA DOS REIS NETO","QR 405 CJ 10 CS 15 ","Samambaia Norte","1998-08-07","(61) 9663-3265","(61) 3459-6546","manoelpereira58@gmail.com","2015-11-19 15:58:18","","S","068.224.571-27","3520395","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("71","Maysa Pereira Dias","QR 407 conj. 2 casa 6","Samambaia Norte","1997-07-13","(61) 9668-1204","","maysapd@hotmail.com","2015-11-20 00:08:52","","S","007.926.791-21","3161236","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("72","Felipe Gomes de Freitas Moura","Qr 405, Conjunto 08, Casa 15","Samambaia","1995-04-20","(61) 8577-8905","(61) 3359-2508","fgfm_95@hotmail.com","2015-11-20 08:55:48","","S","046.284.501-02","3067194","S","2","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("75","Andressa Carvalho da Silva","Qr 603 Chac 39 Rua 3- condomínio Vida Nova casa 25 A","Samambaia Norte ","2000-07-12","(61) 8557-2017","","andy.ncarvalho5@gmail.com","2015-11-20 10:26:13","","S","702.751.051-05","3381421","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("77","Graziele de Sousa nascimento","QR 415 conj 2 casa 19","Samambaia","1999-08-07","(61) 9241-8953","(61) 9184-2036","+556191842036","2015-11-20 11:10:10","","S","071.874.501-92","3720240","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("138","Cinara Medeiro Martins","Qr 413 conj 11 casa 10","Samambaia Norte ","1998-06-15","(61) 9159-6823","(61) 9277-7724","cinaramedeiros1313@gmail.com","2015-12-11 14:43:50","","S","064.094.191-55","3344360","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("79","Nicole Yale Souza dos Santos","Qr 403 conjunto 06 casa 30","Samambaia Norte","1999-05-06","6198706294","6198706294","nicoleyale.ny@gmail.com","2015-11-20 12:25:15","","S","068.505.051-30","3618244","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("95","Karolina Mota de Aguiar","Qr209conjunto 5 casa 27","Norte","1997-04-30","(61) 9331-6425","(61) 3359-6361","karollina@live.com","2015-11-21 11:29:47","","S","044.193.581-81","3205772","S","1","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("81","Letícia Martins de Sousa","QR 213 conj. 04 casa 04","Samambaia Norte","2000-02-23","(61) 9256-1414","(61) 9966-1640","leticia.martinsousa@hotmail.com","2015-11-20 12:59:23","","S","069.808.661-92","3649374","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("82","Lucas Miranda Gontijo","Qr 401 conjunto 09 casa 30","Samambaia Norte ","1996-11-09","(61) 9410-2650","(61) 3358-5155","Lucasgontijomaria@hotmail. Com","2015-11-20 13:09:20","","S","060.757.651-07","3455230","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("84","Cecília Pereira de Souza","Qr 601 conjunto 18 casa 11 ","Samambaia Norte ","2001-04-26","(61) 8228-5287","(61) 8595-3962","cecilia.souzaba7@gmail.com","2015-11-20 13:11:57","","S","056.036.071-14","3348534","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("85","Cellyne de Souza Mota","Qr 110 conjunto 19 casa ","Samambaia Sul ","2000-09-23","(62) 8137-9948","(61) 8338-3704","Ju_jsm_@hotmail.com","2015-11-20 13:34:05","","N","053.967.021-92","3637714","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("86","ISABELA ARAÚJO DOS SANTOS","QR 603 CHACARA 39 CASA 30 B RUA 3 CONDOMÍNIO VIDA NOVA","SAMAMBAIA NORTE","2001-07-14","(61) 3458-3336","(61) 8121-4179","sirlei_arq@hotmail.com","2015-11-20 13:50:45","","N","071.286.181-55","3694686","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("87","Carlos Christian Silva Neto","Qr 207 conjunto 05 casa 20","Samambaia norte ","1996-05-25","(61) 8529-2731","","Carloschristian03@gmail.com","2015-11-20 14:36:04","","N","053.657.781-11","1129660","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("88","Vitória Prudêncio Lima","QR 421 CONJUNTO 09 CASA 11","Samambaia Norte","1998-06-21","(61) 9642-8563","","vicclima123@hotmail.com","2015-11-20 17:01:22","","S","055.191.981-79","","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("96","Dion Lucas Serafim Bispo","qr 207 cj 04 csa 11","samambaia norte","1997-08-04","(61) 8548-7443","(61) 3459-9124","lucasgejeriano@gmail.com","2015-11-21 12:06:13","","S","","3395631","S","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("97","Raul Dias Miranda Cardoso","Qn 211 conjunto 01 casa 35","Samambaia","2001-04-27","(61) 9512-1814","(61) 3359-8257","Raulmiran@hotmail.com","2015-11-21 12:35:47","","S","065.971.131-10","3374856","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("98","kamilly victoria oliveira da Silva","QR 603 CHA 39 RUA 4 CASA 52 \"A\" CONDOMINIO VIDA NOVA ","samambaia-norte ","2001-12-05","(61) 8638-4219","(61) 8517-5039","kamilly05122001@gmail.com","2015-11-21 13:08:08","","S","072.178.421-66","3709308","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("99","João Diego Tonha dos Santos","Qr 210 conjunto 24 Casa 17","Samambaia Norte ","1996-09-15","(61) 8535-6095","(61) 8596-5715","diego46zinho@hotmail.com","2015-11-21 20:37:20","","S","052.419.711-30","3211168","N","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("139","Gabriel da silva barbosa","Qr 405 , Conjunto 12 Casa 16","Samambaia","1998-03-02","(61) 8549-4269","(61) 8549-4269","","2015-12-11 14:47:43","","N","067.378.271-95","3089567","N","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("101","Douglas Souza dos Santos","Qr 403 cj 02 casa 20","Samambaia ","1997-03-18","(61) 8652-8982","","Douglasfriendi@gmail.com","2015-11-22 13:07:12","","S","063.339.011-99","3460323","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("102","Alexandre Barbosa de Araujo","Qr 411 conjuto 6 casa 2","Samambaia Norte","1999-07-30","(61) 3359-3458","(61) 8500-1641","","2015-11-22 13:24:48","","N","065.087.051-48","3315168","N","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("103","Bárbara Fonseca","QR 414 conjunto 13 casa 17","Samambaia Norte","1998-06-07","(61) 8407-0644","(61) 8408-6741","babynhalidnha_@hotmail.com","2015-11-22 21:40:57","","S","","","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("104","Larissa silva de Jesus","Qr 403 conjunto 12 casa 16","Samambaia Norte ","1996-03-07","(61) 9210-8830","(61) 3357-7666","larissasilvaj@hotmail.com","2015-11-22 22:09:13","","S","057.715.041-30","3231173","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("105","Thaynara Barbosa de Almeida","QN 209 Conjunto 1 lote 25 apartamento 104","Samambaia norte ","1998-05-25","(61) 9525-0255","(61) 8658-3590","thaynara.mkt@gmail.com","2015-11-22 23:56:41","","S","066.095.881-39","3421561","S","2","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("106","Joyce Marques Santana","Quadra: 203 conjunto: 03 casa: 05","Samambaia- norte","1998-11-07","(61) 9923-6423","(61) 9642-3013","Joycemarquessantana@gmail.com","2015-11-23 19:55:55","","S","040.272.311-20","3408815","S","2","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("107","Maria Luiza Moura de Souza","QR 213 conjunto 03 casa 17 ","Samambaia Norte","2001-05-24","(61) 9555-4014","(61) 8484-6955","Marialuizamouradesouza@gmail.com","2015-11-25 10:48:57","","N","072.080.251-26","3711182","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("108","Beatriz Gomes dos Santos","QR 405 Conjunto 15 Casa 08","Samambaia Norte","1997-07-27","(61) 8634-6115","(61) 9337-8081","beatrizgomes_gsm@hotmail.com","2015-11-27 18:34:21","","N","052.810.441-17","3223433","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("109","Breno Silva de Jesus","Qr 401 conjunto 29 Casa 11","Samambaia","2001-02-13","(61) 8672-2667","(61) 8672-2667","BrennoDaniel123@hotmail.com","2015-11-27 18:37:12","","S","074.992.171-40","3776706","S","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("110","Maria Iraldina Gomes dos Santos","QR 405 Conjunto 15 Casa 08","Samambaia Norte","1967-07-06","(61) 9337-8081","(61) 8634-6115","","2015-11-27 18:37:49","","N","553.453.281-53","3223454","N","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("111","Rita de Cássia","403/03/26","Samambaia norte ","1997-11-03","(61) 9280-4066","","ritadecassia201183@hotmail.com","2015-11-27 18:40:11","","N","","","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("112","Beatriz Lorrana Ferreira Mota Araújo","QN207 cj1casa 30","SAMAMBAIA Norte ","2000-11-27","(61) 9190-3358","(61) 9117-5497","","2015-11-29 00:07:01","","S","","","S","1","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("113","Kivia pereira de souza","QR 407 CONJUNTO 04 CASA 07","SAMAMBAIA NORTE ","2000-11-01","(61) 8455-7980","(61) 8639-1113","kivia407@gmail.com","2015-11-29 21:10:31","","S","060.053.331-00","3596496","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("114","Letícia Pereira da Silva","Quadra 301 conj 07 cond. Via Tropical apart. 1005 bloco A","Samambaia Sul","1999-08-03","(61) 9297-8818","(61) 9241-9993","lelekinha.pereira@gmail","2015-11-29 22:15:16","","S","043.218.491-01","3002886","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("115","Antonia Ieda Rodrigues dos Reis","Qr 401 Conjunto 20 Casa 07","Samambaia Norte (Samambaia)","1963-08-17","(61) 8462-5249","(61) 9429-3606","paulovitor3005@gmail.com","2015-11-30 10:07:36","","N","505.776.891-34","2023687","N","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("116","Luana Ribeiro Bessa","Qr 405 conjunto 21 casa 26","Samambaia Norte","1993-08-17","(61) 3359-3397","(61) 9198-4370","lukka_bessa@hotmail.com","2015-11-30 11:04:42","","S","038.744.301-03","2944508","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("117","Alessandra de Sousa Pereira","Qr 401 conj 03 casa 26","Samambaia norte","2000-09-09","(61) 9146-5160","","","2015-11-30 15:30:23","","S","","37666923","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("118","Karen Mialichi da Silva Maia","QR 212 conjunto 14 casa 15","Samambaia Norte","2000-01-29","(61) 3458-6671","(61) 3458-6671","karenmialichii@gmail.com","2015-11-30 23:11:25","","N","058.365.681-11","3582719","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("119","Maria Pereira dos Santos Dias","QR 407 conj. 2 casa 6","Samambaia Norte","1971-01-28","(61) 9843-8828","","maysapd@hotmail.com","2015-12-01 15:06:17","","N","584.668.191-34","2090785","N","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("120","Urbano Dias da Cruz","QR 407 conj. 2 casa 6","Samambaia Norte","1966-04-02","(61) 9988-2957","","maysapd@hotmail.com","2015-12-01 15:07:45","","N","340.691.001-72","872780","N","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("121","Alberto Carlos da Costa","Qr 615 conj 01 casa 21","Samambaia Norte ","1966-09-01","(61) 8218-3560","","thaisksm23@gmail.com","2015-12-01 18:28:20","","S","305.041.203-87","2357043","N","0","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("122","Rafael Silva de Oliveira","Qr 213 conjunto 03 casa 26 ","Samambaia Norte ","1995-12-04","(61) 8566-5983","","","2015-12-02 07:47:41","","N","052.294.681-06","3020187","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("123","Daniel Negreiro Marciel","QR 205 Conjunto 03 Casa 34","Samambaia Norte","1998-05-14","(61) 8576-6304","(61) 8611-4489","daniel@glacon.com.br","2015-12-03 10:13:18","","S","062.123.761-23","","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("124","Davi Pereira Alves","Qr 603, Condomínio, Rua 05, Lote 75B","Samambaia Norte","2000-05-12","(61) 9438-8569","","alves.davipereira15@gmail.com","2015-12-05 11:21:12","","N","048.689.801-65","3569481","S","1","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("125","Fernanda Silva De Araújo","QR 405 conj 07 casa 06","Samambaia ","2001-11-19","(61) 8545-8029","(61) 9591-3028","fernanda405.silva@gmail.com","2015-12-06 18:50:05","","N","071.988.971-50","3703418","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("126","Núbia Gois de Oliveira","QR 211 conjunto 05 casa 20","Norte","1994-07-03","(61) 8134-3288","(61) 3359-6366","Nubiahta80@gmail.com ","2015-12-06 22:26:55","","S","042.132.251-94","3001125","S","2","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("127","Paulo Henrique","qr 405 conjunto 18 casa 06","samambaia norte","1999-12-23","(61) 9968-5839","(61) 9685-3315","paulo_10df@hotmail.com","2015-12-06 23:26:24","","S","071.262.181-41","3687413","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("128","Layanne Da luz","Qr 405 Conjunto 27 Casa 05","Samambaia Norte ","1996-06-22","(61) 8489-4234","","layanne.bdl@gmail.com","2015-12-07 11:55:38","","S","052.879.001-39","3239534","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("129","Amaury Costa Silva Ramos","QR 204 conjunto 12 lote 16 ","Norte ","1996-12-17","(61) 8554-0740","(61) 9177-4916","amaury.ritchenzoo@gmail.com","2015-12-07 13:21:49","","S","058.586.001-74","3094934","S","1","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("131","Maria Eduarda Lima Roberto Gomes","Qr 405 conjunto 13 casa 13","Samambaia","2001-04-11","(61) 8644-6915","(61) 3459-4937","","2015-12-08 13:12:37","","S","060.473.231-70","3521944","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("132","Fernando Rodrigues Mesquita","Qr 213 Conjunto 03 casa 18","Norte","1992-08-02","(61) 9214-0660","(61) 9252-9907","fernandorodrigues.frm@gmail.com","2015-12-10 11:47:47","","N","032.654.751-74","2846287","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("133","Bruno Silva Pereira","Qr 405 conjunto 16 casa 33","Samambaia","1999-11-29","(61) 8594-9715","","Bruno-mxm@hotmail.com","2015-12-10 19:01:15","","S","066.947.181-01","3571772","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("134","Leticia Machado Carvalho Bessa","Qr 403 Conjunto 10 Casa 28","Samambaia","1992-08-27","(61) 3082-60606","(61) 9105-8681","lele.403@hotmail.com","2015-12-10 22:56:44","","S","039.040.861-11","2807680","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("135","Diego rocha da silva","Qr 211 conjunto 02 casa 26","Norte","1995-11-14","(61) 9109-8481","(61) 3359-5182","Diegorsilva211@gmail.com","2015-12-10 23:39:30","","N","036.858.521-24","2801200","S","3","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("136","Elliel Kassio dos Santos Ferreira","Qr 209 Conjunto 02 Conjunto 02","Samambaia Norte","1998-12-03","(61) 9870-2614","(61) 9608-7015","elliel.ferreira@outlook.com","2015-12-11 10:18:03","","S","047.687.751-28","3285704","S","2","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("137","Camila Santana Marques","qr 203 conjunto 03 casa 07","Samambaia Norte","1993-09-28","(61) 8334-5828","(61) 3083-5372","camilasantanamarques@gmail.com","2015-12-11 13:11:38","","S","037.374.651-26","3003626","S","1","0","0","N","","","");
INSERT INTO tb_membro_retiro VALUES("143","Leonardo Machado Carvalho Bessa","qr 403 conjunto 10 casa 28","Samambaia Norte","1984-07-06","(61) 9327-4991","","leonardomcbessa@gmail.com","2015-12-31 16:26:26","GEJ","S","","","S","0","0","8","N","Jose Arnaldo","(61) 9300-3405","");
INSERT INTO tb_membro_retiro VALUES("151","Thaís Gomes Bueno","Qr 210 conjunto 12 casa 16","Norte","1996-02-10","(61) 8131-2024","(61) 3041-4514","thais.gomesbueno@gmail.com","2016-01-03 12:19:33","","S","","","N","0","0","3","N","Antônio da Silva Bueno","(61) 8131-2024","");
INSERT INTO tb_membro_retiro VALUES("152","Larissa Lopes Falcão","Qr 833 conjunto 03 casa 16","","1996-03-02","(61) 9393-7772","","larissaissah@gmail.com","2016-01-03 12:44:38","","N","","","N","0","0","3","N","paroquia nossa senhora das graças ","(61) 3559-4385","");
INSERT INTO tb_membro_retiro VALUES("153","Pâmela Cristina Ferreira Souto","Qr 508 Conj 01 Casa 23 ","Samambaia Sul","1997-10-31","(61) 9426-8941","(61) 8682-2644","pamela508@outlook.com","2016-01-03 13:44:18","Gej Dom Bosco ","N","","","S","0","0","3","N","Maria Do Socorro","(61) 8682-2644","");
INSERT INTO tb_membro_retiro VALUES("154","Fabrício Alves Oliveira","Qr 421 conjunto 16 casa 03","Samambaia norte ","2001-07-14","(61) 9410-8557","(61) 9398-7791","fabriceras15@hotmail.com","2016-01-03 13:56:50","","S","","","S","0","0","7","N","Mãe ","(61) 9398-7791","");
INSERT INTO tb_membro_retiro VALUES("155","Erica stephanie de Sousa carvalho","Qr205 cj02 casa18","Samambaia norye","2000-12-02","(61) 3357-1919","(61) 8464-0608","Ericastephanie2015@gmail.com","2016-01-03 14:00:27","Gej dom Bosco","S","","","S","0","0","7","N","Solange","(61) 9295-3159","");
INSERT INTO tb_membro_retiro VALUES("156","Rafael Silva de Oliveira","Qr 213 conjunto 03 casa 26","Samambaia Norte ","1994-12-04","(06) 9434-6402","","","2016-01-03 14:18:33","Grupo Jovem","N","","","S","0","0","6","N","Rosângela Maria","(61) 3083-0552","");
INSERT INTO tb_membro_retiro VALUES("157","Bruna Araújo de Matos","Qr 203 conjunto 4 casa 23","Samambaia ","1995-06-30","(61) 9246-9704","","Bruna.a.matos@hotmail.com ","2016-01-03 14:23:45","","S","","","S","0","0","4","N","Luiza","(61) 9287-7955","");
INSERT INTO tb_membro_retiro VALUES("158","Maria Karlene Ramos Lima","qr 403 conjunto 10 casa 28","Samambaia","1986-08-24","(61) 9271-7998","","karlenerlima@gmail.com","2016-01-03 14:29:11","","S","","","N","0","0","4","N","Maria","(61) 8469-8596","");
INSERT INTO tb_membro_retiro VALUES("159","João Diego Tonhá dos Santos","Qr 210 conj 24 casa 17","Samambaia Norte","1996-09-15","(61) 8535-6095","(61) 3201-8084","diego46zinho@hotmail.com","2016-01-03 14:36:34","","N","","","S","0","0","3","N","Anderson ","(61) 3201-8084","");
INSERT INTO tb_membro_retiro VALUES("160","Brenda Araújo de Matos","Qr 203 conj 4 casa 23 ","Samambaia norte ","2000-10-19","(61) 9948-6908","(61) 9992-8833","Brenda.matos2000@gmail.com","2016-01-03 14:38:13","","S","","","S","0","0","2","N","Bruna Matos","(61) 3359-4065","");
INSERT INTO tb_membro_retiro VALUES("161","Karine Victoria oliveira da silva","Qr 603 chácara 39 rua 4 casa 52a ","Samambaia norte","2000-07-20","(61) 8578-4112","(61) 8517-5039","Karinekamillygatinhas@Gmail.Com","2016-01-03 14:46:03","","S","","","S","0","0","2","N","Márcia","(61) 8517-5039","");
INSERT INTO tb_membro_retiro VALUES("162","Maria Luiza Moura de Souza","QR 213 Conjunto 03 casa 17 ","Samambaia Norte","2001-05-24","(61) 9555-4014","(61) 3459-8307","Marialuizamouradesouza@gmail.com","2016-01-03 14:53:57","","S","","","S","0","0","6","N","Mônica Moura da Silva","(61) 8484-6955","");
INSERT INTO tb_membro_retiro VALUES("163","Diego Pimenta Rodrigues","Quadra 221 Conjunto 03 Casa 19","Samambaia Norte","1998-09-13","(61) 8447-1448","(61) 8487-1687","diegodeus456@gmail.com","2016-01-03 15:18:34","","S","","","S","0","0","7","N","Ana","(61) 3359-6093","");
INSERT INTO tb_membro_retiro VALUES("164","Vitoria Lima","QR 421 conjunto 09 casa 11","Samambaia Norte","1998-06-21","(61) 9642-8563","","vicclima123@hotmail com","2016-01-03 16:44:42","","S","","","S","0","0","3","N","Mãe","(61) 3559-0374","");
INSERT INTO tb_membro_retiro VALUES("165","Suyane Tallita Reis Silva","Qr 207 conjunto 01 casa 26 ","Samambaia Norte","1998-07-11","(61) 9300-1679","(61) 8477-4148","Suyane.tallita@outlook.com ","2016-01-03 21:50:44","Gej Dom Bosco ","S","","","S","0","0","3","N","Lidiane mãe ","(61) 3459-2093","");
INSERT INTO tb_membro_retiro VALUES("166","Cecília Pereira de Souza","Qr 601 conjunto 18 casa 11","Samambaia Norte ","2001-04-26","(61) 8626-7176","(61) 8228-5287","cecilia.souzaba7@gmail.com","2016-01-03 23:35:47","GEJ DOM BOSCO ","S","","","S","0","0","3","N","Arlei Oliveira de Souza","(61) 8595-3962","");
INSERT INTO tb_membro_retiro VALUES("167","Breno Silva de jesus","403 12 16","Samambaia","2000-02-13","(61) 8672-2667","","BrennoDaniel123@gmail.com","2016-01-03 23:52:51","Gej dom bosco","N","","","S","0","0","6","N","Larissa silva","(61) 8672-2667","");
INSERT INTO tb_membro_retiro VALUES("168","Fernanda Silva De Araújo","QR 405 conj 07 casa 06 ","Samambaia ","2001-12-19","(61) 9591-3028","(61) 8545-8029","fernanda405.silva@gmail.com","2016-01-04 02:26:27","","S","","","S","0","0","6","N","Mãe ","(61) 3459-4002","");
INSERT INTO tb_membro_retiro VALUES("169","Taynara Rodrigues de Azevedo","QR 415 conj 10 CS 17 ","Samambaia Norte ","1998-05-20","(61) 9223-1152","(61) 9270-3294","Taynararoodriguess@gmail.com","2016-01-04 21:44:00","","N","","","N","0","0","4","N","Alemira ","(61) 3359-6623","");
INSERT INTO tb_membro_retiro VALUES("170","Noely Lara da Silva Pereira","QR 409 conjunto 06 casa 13 ","Samambaia norte ","1998-11-18","(61) 9858-7057","(61) 3459-1828","noelylaradrew@gmail.com","2016-01-05 01:12:21","Ministério de acólitos ","S","","","N","0","0","2","N","Luzia da Silva ","(61) 9628-3701","");
INSERT INTO tb_membro_retiro VALUES("171","Mateus Oliveira Dias","QR 409 conjunto 06 casa 13 ","Samambaia norte ","1997-10-02","(61) 8599-5766","(61) 3082-6534","Matteusads@hotmail.com","2016-01-05 01:16:26","","S","","","N","0","0","7","N","Noely lara ","(61) 9858-7057","");
INSERT INTO tb_membro_retiro VALUES("172","Elton Baraúna de Souza","Qn 209 conjunto 02 casa 02 ","Norte ","1994-01-08","(61) 9132-2778","(61) 3083-5021","","2016-01-05 01:45:22","GEJ","S","","","N","0","0","2","N","Adelice ","(61) 3083-5021","");
INSERT INTO tb_membro_retiro VALUES("173","Karen Geovanna","Qr 423 Conjunto 03 Casa 24","Samambaia Norte","1998-04-17","(61) 9528-2513","","karenn.geovanna@gmail.com","2016-01-05 10:06:27","","N","","","S","0","0","3","N","Denyse","(61) 3459-5330","");
INSERT INTO tb_membro_retiro VALUES("174","Carlos christian","Qr 207 conj 05 casa 20","Samambaia norte ","1996-05-25","(61) 8529-2731","","Carloschristian03@gmail.com","2016-01-05 10:06:54","Gej Dom Bosco, Ministério de Acólitos ","S","","","S","0","0","7","N","Carlos ","(61) 8529-2731","");
INSERT INTO tb_membro_retiro VALUES("175","Ingrid de Oliveira","QR 417 conj 10 casa 23","Samambaia norte","2000-06-07","(61) 9186-9084","(61) 8558-8755","Paulaeingrid_df@hotmail. Com","2016-01-05 10:17:48","","N","","","N","0","0","3","N","Mãe ","(61) 3459-7211","");
INSERT INTO tb_membro_retiro VALUES("176","Andressa Carvalho da Silva","Qr 603 chac 39 rua 3 casa 25 A","Samambaia Norte","2000-07-12","(61) 8557-2017","(61) 3082-6018","andy.ncarvalho5@gmail.com","2016-01-05 10:38:48","","S","","","S","0","0","3","N","Lucia Maria","(61) 8669-7252","");
INSERT INTO tb_membro_retiro VALUES("177","Amaury Costa Silva Ramos","QR 204 Conjunto 12 Lote 16","Norte ","1996-12-17","(61) 8554-0740","","amaury.ritchenzoo@gmail.com","2016-01-05 11:04:17","","S","","","S","0","0","7","N","Maria de Fátima ","(61) 9177-4916","");
INSERT INTO tb_membro_retiro VALUES("178","Bruna Lidice da Silva Dias","Qr 221 conjunto 01 casa 06","Samambaia norte ","1995-12-05","(61) 9566-9471","(61) 8538-2903","Brunalidice@gmail.com","2016-01-05 11:18:57","","N","","","N","0","0","3","N","Nília Maria da Silva dias ","(61) 8538-2903","");
INSERT INTO tb_membro_retiro VALUES("179","Jonathan ferreira Dionisio","Qr 203 conjunto 04 casa 27","Samambaia","1999-12-09","(61) 9408-4008","","Veronica.dasilva.moreira@gmail.com","2016-01-05 11:35:58","","N","","","S","0","0","3","N","Veronica","(61) 8668-4645","");
INSERT INTO tb_membro_retiro VALUES("180","Stefanni Aguiar de Azevedo","Qr 403 conj 11 casa 02","Samambaia Norte","1999-02-02","(61) 9341-6877","","","2016-01-05 12:19:22","","S","","","S","0","0","3","N","Lucilene Aguiar","(61) 9545-0752","");
INSERT INTO tb_membro_retiro VALUES("181","Karolina Mota","QR: 209 conj 05 casa 27","Norte","1997-04-30","(61) 9331-6425","(61) 9222-6161","karollina@live.com","2016-01-05 12:23:33","Catequese, gej ","S","","","S","0","0","4","N","Edileusa","(61) 3359-6361","");
INSERT INTO tb_membro_retiro VALUES("182","Ana Melyna de Oliveira","Qr 202 conjunto 10 casa 23 ","","2001-01-11","(61) 8471-7862","(61) 8655-8785","","2016-01-05 12:30:33","","S","","","S","0","0","3","N","Edmar de Araújo ","(61) 3458-5448","");
INSERT INTO tb_membro_retiro VALUES("183","Bárbara Fonseca","QR 414 conjunto 13 casa 17","Samambaia Norte","1998-06-07","(61) 8407-0644","(61) 8408-6741","babynhalidnha_@hotmail.com","2016-01-05 12:43:43","","S","","","S","0","0","7","N","Elaine Maria da Silva","(61) 3039-5165","");
INSERT INTO tb_membro_retiro VALUES("185","kamilly victoria oliveira da silva","QR 603 CHA:39 RUA 4 CASA 52 \"A\" CONDOMÍNIO VIDA NOVA","samambaia-norte","2001-12-05","(61) 3458-5655","(61) 8517-5039","kamillysilvavictoria@gmail.com","2016-01-05 14:06:54","","S","","","S","0","0","2","N","Márcia francine de oliveira ","(61) 8517-5039","");
INSERT INTO tb_membro_retiro VALUES("186","Ana Karoliny Rodrigues de Oliveira","Qn 213 conjunto 01 casa 17","Samambaia","1998-10-07","(61) 9188-0251","(61) 8627-2287","","2016-01-05 14:23:18","","S","","","N","0","0","3","N","Sirlene mãe","(61) 9206-1515","");
INSERT INTO tb_membro_retiro VALUES("187","Gabrielly de Souza Macêdo","QR 611 Conjunto 06 Casa 12","Samambaia Norte","2002-03-05","(61) 9917-8560","(61) 8510-3774","gabriellyszmc@hotmail.com","2016-01-05 14:34:17","","S","","","N","0","0","2","N","Gabrielly","(61) 9917-8560","");
INSERT INTO tb_membro_retiro VALUES("188","Isaias Sutero Da Silva Gomes","Qn 406 Conj. D Lote 01 AP 07 (ENTRADA B)","Samambaia Norte","1999-03-27","(61) 8196-4458","","isaiassutero7@gmail.com","2016-01-05 14:35:26","","N","","","N","0","0","7","N","Janilson","(61) 8196-4458","");
INSERT INTO tb_membro_retiro VALUES("189","Luana Gomes da Silva","Rua 10 N 10 ","Laranjeiras ","1996-07-04","(61) 9831-9391","(61) 3631-2937","luanakayto@gmail.com","2016-01-05 16:31:17","","S","","","N","0","0","2","N","Meire ","(61) 9651-2173","");
INSERT INTO tb_membro_retiro VALUES("219","Thais Oliveira ds Costa","Qr 615 conj 01 cs 21","Samambaia Norte","1993-04-23","(61) 9297-1837","(61) 8266-3066","thaisksm23@gmail.com","2016-01-06 11:40:58","Catequese, dizímo e liturgia","S","","","S","0","3","4","N","Ivanildes","(61) 3458-6671","");
INSERT INTO tb_membro_retiro VALUES("191","Thaynara Barbosa de Almeida","QN 209 Conjunto 1 lote 25 apartamento 104","Samambaia Norte ","1998-05-25","(61) 9525-0255","(61) 8658-3590","thaynara.mkt@gmail.com","2016-01-05 16:44:29","Catequese ","S","","","S","0","0","3","N","Maria de Jesus Barbosa","(61) 8400-3462","");
INSERT INTO tb_membro_retiro VALUES("192","Jéssika Laureane Pereira Mendes","rua 08 casa 301","setor nordeste","1996-05-01","(61) 9813-5164","","jessikalaureane@gmail.com","2016-01-05 16:46:04","","S","","","N","0","0","7","N","Mãe ","(61) 3631-5104","");
INSERT INTO tb_membro_retiro VALUES("193","Izaias Gomes da Silva","rua 10 n 10","parque das laranjeiras ","1970-09-05","(61) 9654-3278","","meirefonseca32@hotmail.com","2016-01-05 16:53:51","","S","","","N","0","0","7","N","Esposa ","(61) 9651-2173","");
INSERT INTO tb_membro_retiro VALUES("194","Andressa Machado de Freitas","Rua 04 Lote 26","Parque das Laranjeiras","1996-11-28","(61) 9911-7021","","andressamf66@hotmail.com","2016-01-05 16:55:21","","S","","","N","0","0","3","N","Marilene Pereira da Guirra","(61) 9844-8722","");
INSERT INTO tb_membro_retiro VALUES("221","Gleice Izabel de Azevedo","QR 403 conjunto 12 casa 09","Samambaia Norte","1998-11-10","(61) 8299-9300","","gleice.izazavedo@gmail","2016-01-06 11:49:42","","S","","","N","0","3","3","N","Nazaré","(61) 8142-9638","");
INSERT INTO tb_membro_retiro VALUES("196","Felipe Gomes de Freitas Moura","Qr 405, conjunto 08, casa 15","Samambaia Norte","1995-04-20","(61) 8577-8905","","fgfm_95@hotmail.com","2016-01-05 17:28:24","","S","","","N","0","0","7","N","Fernanda Gomes","(61) 3359-2508","");
INSERT INTO tb_membro_retiro VALUES("197","Rafael Paulino","Qr 401 conj 16 casa 14","Samambaia","2001-02-25","(61) 8634-3367","","","2016-01-05 18:17:56","","S","","","S","0","0","7","N","Elisangela","(61) 8577-4328","");
INSERT INTO tb_membro_retiro VALUES("198","Maysa Pereira Dias","QR 407 conj. 2 casa 6","Samambaia Norte","1997-07-13","(61) 9668-1204","","maysapd@hotmail.com","2016-01-05 19:18:56","GEJ","N","","","S","0","0","5","N","Maria Pereira dos S. Dias","(61) 3359-3317","");
INSERT INTO tb_membro_retiro VALUES("199","Nathalia Pereira Dias","QR 407 conjunto 02 casa 06","SAMABAIA NORTE ","2001-03-29","(61) 9955-5202","","naathpdias@hotmail.com","2016-01-05 19:20:05","Gej Dom Bosco ","N","","","S","0","0","5","N","Maria Pereira dos Santos Dias","(61) 3359-3317","");
INSERT INTO tb_membro_retiro VALUES("220","Keiter da Silva Maia","Qr 212 conj 14 cs 15","Samambaia Norte","1992-11-22","(61) 9183-9164","","keitermaia@hotmail.com","2016-01-06 11:46:00","","S","","","S","0","3","7","N","Ivanildes","(61) 3458-6671","");
INSERT INTO tb_membro_retiro VALUES("226","Thiago Marinho de Oliveira Vilas Boas","QR 405 Conj 11 casa 07","Samambaia","2000-08-18","(61) 9624-0659","","","2016-01-06 12:08:16","","S","","","S","0","3","6","N","Maria Aparecida","(61) 3459-9830","");
INSERT INTO tb_membro_retiro VALUES("227","Karen Mialichi","","","2000-01-29","(62) 9815-2345","","","2016-01-06 12:17:22","Gej Dom Bosco ","S","","","S","0","3","4","N","Vanildes ","(61) 8278-9273","");
INSERT INTO tb_membro_retiro VALUES("217","Thayná Azevedo Brandão"," QNJ 08 CASA 17","Taguatinga Norte","1999-08-02","(61) 8225-9415","","margarita.magalhaes@gmail.com","2016-01-06 00:40:55","","N","","","N","0","3","4","N","Margarita Azevedo Magalhães","(61) 8211-5429","");
INSERT INTO tb_membro_retiro VALUES("203","Franciele Gomes da Silva","Rua 10 casa 08","Pq das Laranjeiras","1992-02-26","(61) 9653-3544","(61) 9977-5556","Franzinha1101_gmail.com","2016-01-05 21:57:08","","S","","","N","0","0","4","N","Guilherme","(61) 9977-5556","");
INSERT INTO tb_membro_retiro VALUES("216","Ariane Nunes da Silva","QR 417 conjunto 06 casa 14","Samambaia Norte ","1999-03-01","(61) 9399-2705","(61) 8494-6694","ariane.nunes768@gmail.com","2016-01-06 00:17:19","","S","","","S","0","3","4","N","Maria Adilina Nunes Martins ","(61) 8494-6694","");
INSERT INTO tb_membro_retiro VALUES("205","Marcelo Souza dos Santos","QR 401 conjunto 01 casa 08","Samambaia Norte","2000-02-20","(61) 8278-2960","(61) 8135-4451","mickelly.123@gmail.com","2016-01-05 22:04:54","","S","","","S","0","0","7","N","Manoel Alves dos Santos","(61) 3358-9992","");
INSERT INTO tb_membro_retiro VALUES("206","Alex Carvalho de Deus","Rua 10 casa 08","Pq das Laranjeiras","1996-10-21","(61) 9801-6189","(61) 9653-3544","Alexfsagol@hotmal.com","2016-01-05 22:05:19","","N","","","N","0","0","7","N","Franciele","(61) 9653-3544","");
INSERT INTO tb_membro_retiro VALUES("207","Lara Barros de Sousa","Qr 401 coj 01 casa 08","Samambaia norte","2000-04-09","(61) 8127-0621","(61) 8135-4451","Lara.barros123@gmail.com","2016-01-05 22:19:58","","S","","","S","0","0","2","N","Ana Célia de Azevedo barros","(61) 3358-9992","");
INSERT INTO tb_membro_retiro VALUES("208","Jéssica Mayara de Lima","Rua são Benedito número 152","Formosinha","1994-11-27","(61) 9645-6875","(61) 9922-5747","Jslima968@gmail.com","2016-01-05 22:20:29","","N","","","N","0","0","3","N","Lindenberg ","(61) 9922-5747","");
INSERT INTO tb_membro_retiro VALUES("209","Lindemberg Divino Soares Alves Xisto","  Avenida Valeriano de Castro número 813 ","Centro ","1990-06-03","(61) 9922-5747","(61) 9645-6875","Berg.soares21@hotmail.com","2016-01-05 22:24:25","","N","","","N","0","3","7","N","Jessica","(61) 9645-6875","");
INSERT INTO tb_membro_retiro VALUES("210","Nayara Carvalho Assunção","Qr 403 cj 10 casa 27","Samambaia Norte","1999-01-27","(62) 8121-6222","","lele.403@hotmail.com","2016-01-05 22:47:18","","N","","","N","0","3","3","N","Letícia Bessa","(61) 9105-8681","");
INSERT INTO tb_membro_retiro VALUES("211","Vitor Hugo Barroso","Qr 403 conjunto 9","Samambaia Norte (DF)","1999-08-25","(61) 9387-2602","","vitorhugo229@outlook.com","2016-01-05 23:19:12","São João Evangelista","S","","","N","0","3","7","N","Eliete Aparecida Barroso","(61) 3081-4590","");
INSERT INTO tb_membro_retiro VALUES("212","Amanda Alcântara Mendes","Qr 415 conjunto 01 casa 19","Samambaia ","1998-10-09","(61) 9430-4401","(61) 8176-6352","amanda-415@hotmail.com","2016-01-05 23:29:15","","S","","","N","0","3","4","N","Gonçalo Mendes ","(61) 9430-4401","");
INSERT INTO tb_membro_retiro VALUES("213","Joyce Marques Santana","Quadra:203 conjunto: 03 casa:05","Norte","1998-01-07","(61) 9923-6423","(61) 9642-3013","Joycemarquessantana@gmail.com","2016-01-05 23:59:38","Catequese ","S","","","N","0","3","3","N","Márcia Roberta de Santana","(61) 3358-4918","");
INSERT INTO tb_membro_retiro VALUES("214","Natale dos Santos Almeida","Qr 413 conj 11 casa 10","Samambaia Norte ","2000-01-21","(55) 6193-80900","(61) 9122-5633","cinaramedeiros1313@gmail.com","2016-01-06 00:00:53","","S","","","N","0","3","2","N","Francisca Irene e António Francisco","(61) 9159-6823","");
INSERT INTO tb_membro_retiro VALUES("215","Jessica dos Santos Almeida","Qr 413 conj 11 casa 10","Samambaia Norte ","1997-12-31","(55) 6192-39658","(61) 9122-5633","cinaramedeiros1313@gmail.com","2016-01-06 00:02:59","","S","","","N","0","3","3","N","Francisca Irene e António Francisco","(61) 9159-6823","");
INSERT INTO tb_membro_retiro VALUES("218","Ana Caroline Alves dada rocha","QR 401 conj 5 cs 06","Samambaia norte","1995-11-02","(61) 8373-1714","","Ana.carolinerocha95@hotmail.com","2016-01-06 09:32:30","","S","","","N","0","3","4","N","Andre Luiz Barbosa","(61) 3458-6377","");
INSERT INTO tb_membro_retiro VALUES("222","Isabela Araújo dos Santos","Qr 603 chacara 39 casa 30 B Rua 03 ","Samambaia Norte ","2001-07-14","(61) 8401-7340","(61) 3458-3336","sirlei_arq@hotmail.com","2016-01-06 11:50:51","","N","","","S","0","3","2","N","Sirlei Ferreira dos Santos ","(61) 8121-4179","");
INSERT INTO tb_membro_retiro VALUES("223","Gabriella Araujo Oiveira","qd 21 lote 32 Lunabel 3a","Novo Gama","1999-11-01","(61) 9232-2826","(61) 9368-6503","","2016-01-06 11:51:32","dizimo","S","","","N","0","3","3","N","Edileusa","(61) 9222-6161","");
INSERT INTO tb_membro_retiro VALUES("224","Andressa Cristina da Silva Feitoza","QR 205 conjunto 06 casa 08","Samambaia Norte ","2000-07-31","(61) 8208-4583","(61) 8571-9753","","2016-01-06 11:53:49","","S","","","S","0","3","3","N","waldiria","(61) 3359-3693","");
INSERT INTO tb_membro_retiro VALUES("225","Rodrigo Dias Rocha Thomé","Qr 405 conj 06 cs 06","Samambaia-Norte","2001-09-23","(61) 9156-5261","(61) 9249-2925","rodrigodirocha@gmail.com","2016-01-06 12:00:53","Catequese ","S","","","N","0","3","8","N","Regina ","(61) 8518-9095","");
INSERT INTO tb_membro_retiro VALUES("228","Diego Rocha da silva","Qr 211 conjunto 02 casa 26","Norte","1995-11-14","(61) 9109-8481","(61) 8570-4620","Diegorsilva211@gmail.com","2016-01-06 12:17:58","","N","","","S","0","3","3","N","Edileuza","(61) 3359-5182","");
INSERT INTO tb_membro_retiro VALUES("229","Kivia Pereira De Souza","Qr 407 conj 04 casa 07","Samambaia norte ","2000-11-01","(61) 8455-7980","(61) 8609-9037","kivia407@gmail.com","2016-01-06 12:24:41","gej Dom Bosco ","N","","","S","0","3","9","N","Ana lidia pereira ","(61) 8639-1113","");
INSERT INTO tb_membro_retiro VALUES("230","Alessandra de Sousa Pereira","Qr 403 conj 03 cs 26","","2000-09-09","(61) 9146-5160","","","2016-01-06 12:34:58","","S","","","S","0","3","3","N","nete ","(61) 9504-5229","");
INSERT INTO tb_membro_retiro VALUES("231","Cellyne de Souza Mota","Qr 110 conjunto 19 casa 12 ","Samambaia sul","2000-09-30","(61) 8137-9948","(61) 8338-3704","","2016-01-06 13:03:58","Maria de Nazaré ","S","","","S","0","3","2","N","Jucirene","(61) 3358-7242","");
INSERT INTO tb_membro_retiro VALUES("232","Alexandre Barbosa de Araujo","Qr 411 conjunto 6casa 02","Samambaia Norte","1999-07-30","(61) 8500-1641","(61) 3359-3458","alexandre22272830@gmail.com","2016-01-06 13:04:07","Gej","S","","","S","0","3","7","N","Alice","(61) 9656-2733","");
INSERT INTO tb_membro_retiro VALUES("233","Pâmela Virgilio dos Santos","Quadra 405 conjunto 12 casa 08","Samambaia- norte ","1999-11-23","(61) 8564-6765","(61) 3459-4391","pamelavirgilio063@gmail","2016-01-06 13:10:19","Grupo jovem ","S","","","S","0","3","3","N","Lúcia Virgilio ","(61) 8409-8381","");
INSERT INTO tb_membro_retiro VALUES("234","Rita de Cássia","403/03/26","Samambaia norte ","1997-11-03","(61) 9280-4066","","ritadecassia201183@hotmail.com","2016-01-06 13:11:39","","N","","","S","0","3","3","N","Antônia aurinete ","(00) 0000-0000","");
INSERT INTO tb_membro_retiro VALUES("235","Aryadna Moreira Dos Santos","Quadra 2 conjunto c casa 14","Setor Veredas Brazlãndia","1998-12-12","(61) 3391-5763","(61) 8666-3545","aryadnamoreira@gmail.com","2016-01-06 18:58:20","Paróquia Santa Terezinha","S","","","N","0","3","3","N","Alfrida Moreira ","(61) 8453-7237","");
INSERT INTO tb_membro_retiro VALUES("236","Marina Lopes Rodrigues","Qr 625 conjunto 07 casa 04","Samambaia-Norte","1999-07-24","(61) 8299-8075","(61) 8299-7967","marindemaria@gmail.com","2016-01-06 22:35:54","Grupo de oração João Paulo ||","S","","","N","0","3","3","N","Vanete ","(61) 3359-4415","");
INSERT INTO tb_membro_retiro VALUES("237","Antônio ilton Ferreira Mota filho","Qr 421 conjunto 18 casa 17","Samambaia norte ","1998-07-02","(61) 8197-9733","","","2016-01-06 22:36:19","Ministério de Acólitos são Tarcísio ","S","","","N","0","3","6","N","Rositânia Francisca da Silva ","(61) 8296-3268","");
INSERT INTO tb_membro_retiro VALUES("238","Paulo henrique Pereira Fonseca","qr 204 conjunto 07 casa 07","Samambaia","1996-04-26","(61) 9564-6425","","phpf.hnrique@gmail.com","2016-01-06 22:53:16","","N","","","N","0","3","7","N","Marcelena Pereira de Jesus","(61) 9333-2017","");
INSERT INTO tb_membro_retiro VALUES("239","Mateus Nelson Pereira Ferraz","qn5b conjunto 03 casa 20","riacho fundo 2","1996-03-11","(61) 9510-7411","","","2016-01-06 23:03:07","","S","","","N","0","3","6","N","Larissa Paixão ","(61) 9210-8830","");
INSERT INTO tb_membro_retiro VALUES("240","BRUNO VINICIUS DE SOUZA OLIVEIRA","QR 403 CONJUNTO 09 CASA 21","SAMAMBAIA NORTE","2001-06-27","(61) 9902-0660","(61) 9123-5063","","2016-01-06 23:12:28","","S","","","S","0","3","7","N","ARETHA","(61) 3357-7954","");
INSERT INTO tb_membro_retiro VALUES("241","Lucas Fernandes Santos","Qr403 conjunto01 casa 09","Samambaia Norte ","1997-01-31","(61) 9296-0467","","lucas.fernandess@hotmail.com","2016-01-07 01:43:09","","S","","","N","0","3","8","N","Nubia","(61) 3357-8055","");
INSERT INTO tb_membro_retiro VALUES("242","Tiago de Souza Andrade","Qr 403 conjunto 02 casa 18","Samambaia Norte","1993-05-30","(61) 9880-1057","","tiaguin_bsb@live.com","2016-01-07 13:34:11","","N","","","N","0","4","6","N","Douglas","(00) 0000-00000","");
INSERT INTO tb_membro_retiro VALUES("243","Jeane Santana de Oliveira","Quadra 803 conjunto 20 casa 38","Recanto das Emas ","1997-02-26","(61) 9575-3807","","jeanesantana99@gmail.com","2016-01-07 15:53:36","","S","","","N","0","4","2","N","Celis","(61) 3359-8257","");
INSERT INTO tb_membro_retiro VALUES("244","Camila Santana Marques","Qr 203 conjunto 03 casa 07","Samambaia Norte","1993-09-28","(61) 8334-5828","","camilasantanamarques@gmail.com","2016-01-07 16:30:49","","S","","","S","0","4","3","N","Liduina Santana Marques","(61) 9290-1526","");
INSERT INTO tb_membro_retiro VALUES("245","Davi Braga de Souza","Qr 403 conjunto 02 casa 03","Samambaia Norte","1997-12-16","(61) 9576-6379","","davifriendly@hotmail.com","2016-01-07 16:59:30","","N","","","N","0","4","7","N","Larissa Silva","(61) 3357-0363","");
INSERT INTO tb_membro_retiro VALUES("246","Abel Santiago Santos","QR 606 conjunto 01casa 06","Samambaia norte","1997-05-12","(61) 8432-9034","","abel.awesome@hotmail.com","2016-01-07 17:03:22","","N","","","N","0","4","6","N","Ivoneide","(61) 3036-9842","");
INSERT INTO tb_membro_retiro VALUES("255","Patrick Stanley da Silva Araujo","Qr 212 conj 14 cs 15","Samambaia","1988-07-22","(61) 8262-1323","","","2016-01-07 23:28:19","","N","","","N","0","4","8","N","Ivanildes","(61) 3458-6671","");
INSERT INTO tb_membro_retiro VALUES("248","Brenda Rodrigues de Araújo","Qnh 05 casa 50","Taguatinga Norte ","2000-10-31","(61) 8225-6810","","","2016-01-07 18:01:23","Grupo jovem Jacim","S","","","N","0","4","3","N","Sandra Maria","(61) 3354-5713","");
INSERT INTO tb_membro_retiro VALUES("249","Luana de Sá Neves","Qr 405 Conjunto 27 Casa 14","Samambaia","2000-11-25","(61) 8276-0395","(61) 3359-3144","kamilaf.silva@hotmail.com","2016-01-07 20:00:50","","N","","","N","0","4","1","N","Rosana","(61) 8572-9625","");
INSERT INTO tb_membro_retiro VALUES("250","Gabriella Carol Ferreira Batista","Qr 205 Conjunto 04 Casa 12","Samambaia","2000-06-21","(61) 8479-0962","","kamilaf.silva@hotmail.com","2016-01-07 20:05:03","","N","","","N","0","4","3","N","Divaldo","(61) 8558-8580","");
INSERT INTO tb_membro_retiro VALUES("251","Aurenívia Santana Carvalho","Qr 625 conjunto 07 casa 03","Samambaia Norte","1999-05-05","(61) 9318-0232","(61) 9625-9059","aureasantana99@gmail.com","2016-01-07 20:09:03","","N","","","N","0","4","4","N","Francisca Santana","(61) 3459-3761","");
INSERT INTO tb_membro_retiro VALUES("252","Lauanda de Andrade peixoto","Qr 417 conjunto 4 casa 2","Samambaia norte","2000-04-20","(61) 8223-1201","","","2016-01-07 20:47:35","Grupo jovem ripo jovem chamas do senhor ","N","","","N","0","4","2","N","Valeria ","(61) 9226-5563","");
INSERT INTO tb_membro_retiro VALUES("253","Kellen Maria da Silva Maia","Qr 212 conj 14 cs 15","Samambaia","1995-12-28","(61) 8124-2582","","","2016-01-07 23:25:36","","N","","","N","0","4","3","N","Ivanildes","(61) 3458-6671","");
INSERT INTO tb_membro_retiro VALUES("256","Diego Souza dos Santos","QR 401 conjunto 01 casa 08","Samambaia Norte","2001-10-09","(61) 8595-3378","","mickelly.123@gmail.com","2016-01-07 23:42:11","","N","","","N","0","4","7","N","Manoel Alves dos Santos","(61) 8167-7779","");
INSERT INTO tb_membro_retiro VALUES("257","TAYANE MOREIRA DA MOTA","QS 11 CONJUNTO K CASA 32","Areal","1998-08-01","(61) 8550-1187","(61) 8561-5167","tayane.moreira16@gmail.com","2016-01-08 00:41:08","","N","","","N","0","4","4","N","Dayane","(61) 3401-2017","");
INSERT INTO tb_membro_retiro VALUES("258","Luis Eduardo Alves Abrantes","QR 405 conjunto 04 casa 12","Samambaia Norte","1996-02-25","(61) 8672-2409","","dudy_Abrantes e hotmail.com","2016-01-08 09:15:15","","S","","","N","0","4","8","N","Francinaldo","(61) 9909-6735","");
INSERT INTO tb_membro_retiro VALUES("259","Marina Bezerra da Silva","Qr 609 Conjunto 01 Casa 06","Samambaia Norte","2001-02-18","(61) 9294-8068","(61) 8470-9702","Marinaibe1802@gmail.com","2016-01-08 10:23:10","","N","","","S","0","4","3","N","Marilú","(61) 3459-1833","");
INSERT INTO tb_membro_retiro VALUES("260","Lucas da Silva andrelino","QR 609 conjunto 01 casa 04","Samambaia","1994-10-12","(61) 9288-7378","(61) 9294-8068","Lukasandrelino@gmail.com","2016-01-08 11:01:30","","N","","","N","0","4","6","N","Marina","(61) 3358-3468","");
INSERT INTO tb_membro_retiro VALUES("261","Novata teste","qr 403","Samamabaia","1999-01-07","(23) 4235-2355","","","2016-01-20 16:02:48","","N","","","N","0","4","3","N","Jose ","(32) 5566-62335","");



DROP TABLE IF EXISTS tb_perfil;

CREATE TABLE `tb_perfil` (
  `co_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `no_perfil` varchar(45) NOT NULL,
  PRIMARY KEY (`co_perfil`),
  UNIQUE KEY `co_perfil_UNIQUE` (`co_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO tb_perfil VALUES("1","Master");
INSERT INTO tb_perfil VALUES("2","Coordenador");
INSERT INTO tb_perfil VALUES("3","Membro");
INSERT INTO tb_perfil VALUES("4","Líder Evento");
INSERT INTO tb_perfil VALUES("5","Líder Música");
INSERT INTO tb_perfil VALUES("6","Membro Música");
INSERT INTO tb_perfil VALUES("7","Líder Teatro");
INSERT INTO tb_perfil VALUES("8","Membro Teatro");
INSERT INTO tb_perfil VALUES("9","Líder Animação");
INSERT INTO tb_perfil VALUES("10","Membro Animação");
INSERT INTO tb_perfil VALUES("11","Líder Ornamentação");
INSERT INTO tb_perfil VALUES("12","Membro Ornamentação");
INSERT INTO tb_perfil VALUES("13","Líder Formação");
INSERT INTO tb_perfil VALUES("15","Líder Intercessão");
INSERT INTO tb_perfil VALUES("16","Membro Intercessão");
INSERT INTO tb_perfil VALUES("17","Líder Comunicação");
INSERT INTO tb_perfil VALUES("18","Membro Comunicação");
INSERT INTO tb_perfil VALUES("19","Líder");



DROP TABLE IF EXISTS tb_perfil_funcionalidade;

CREATE TABLE `tb_perfil_funcionalidade` (
  `co_perfil` int(11) NOT NULL,
  `co_funcionalidade` int(11) NOT NULL,
  PRIMARY KEY (`co_perfil`,`co_funcionalidade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_perfil_funcionalidade VALUES("1","1");
INSERT INTO tb_perfil_funcionalidade VALUES("2","2");
INSERT INTO tb_perfil_funcionalidade VALUES("2","3");
INSERT INTO tb_perfil_funcionalidade VALUES("2","4");
INSERT INTO tb_perfil_funcionalidade VALUES("2","5");
INSERT INTO tb_perfil_funcionalidade VALUES("2","6");
INSERT INTO tb_perfil_funcionalidade VALUES("2","7");
INSERT INTO tb_perfil_funcionalidade VALUES("2","8");
INSERT INTO tb_perfil_funcionalidade VALUES("2","12");
INSERT INTO tb_perfil_funcionalidade VALUES("2","13");
INSERT INTO tb_perfil_funcionalidade VALUES("2","14");
INSERT INTO tb_perfil_funcionalidade VALUES("2","15");
INSERT INTO tb_perfil_funcionalidade VALUES("2","16");
INSERT INTO tb_perfil_funcionalidade VALUES("2","17");
INSERT INTO tb_perfil_funcionalidade VALUES("2","18");
INSERT INTO tb_perfil_funcionalidade VALUES("2","19");
INSERT INTO tb_perfil_funcionalidade VALUES("2","20");
INSERT INTO tb_perfil_funcionalidade VALUES("2","21");
INSERT INTO tb_perfil_funcionalidade VALUES("2","22");
INSERT INTO tb_perfil_funcionalidade VALUES("2","23");
INSERT INTO tb_perfil_funcionalidade VALUES("2","24");
INSERT INTO tb_perfil_funcionalidade VALUES("2","25");
INSERT INTO tb_perfil_funcionalidade VALUES("3","6");
INSERT INTO tb_perfil_funcionalidade VALUES("4","12");
INSERT INTO tb_perfil_funcionalidade VALUES("4","15");
INSERT INTO tb_perfil_funcionalidade VALUES("4","18");
INSERT INTO tb_perfil_funcionalidade VALUES("4","21");
INSERT INTO tb_perfil_funcionalidade VALUES("4","22");
INSERT INTO tb_perfil_funcionalidade VALUES("4","23");
INSERT INTO tb_perfil_funcionalidade VALUES("4","25");
INSERT INTO tb_perfil_funcionalidade VALUES("4","27");
INSERT INTO tb_perfil_funcionalidade VALUES("5","12");
INSERT INTO tb_perfil_funcionalidade VALUES("5","21");
INSERT INTO tb_perfil_funcionalidade VALUES("5","22");
INSERT INTO tb_perfil_funcionalidade VALUES("5","23");
INSERT INTO tb_perfil_funcionalidade VALUES("5","25");
INSERT INTO tb_perfil_funcionalidade VALUES("5","27");
INSERT INTO tb_perfil_funcionalidade VALUES("6","21");
INSERT INTO tb_perfil_funcionalidade VALUES("6","27");
INSERT INTO tb_perfil_funcionalidade VALUES("7","12");
INSERT INTO tb_perfil_funcionalidade VALUES("7","21");
INSERT INTO tb_perfil_funcionalidade VALUES("7","22");
INSERT INTO tb_perfil_funcionalidade VALUES("7","23");
INSERT INTO tb_perfil_funcionalidade VALUES("7","25");
INSERT INTO tb_perfil_funcionalidade VALUES("7","27");
INSERT INTO tb_perfil_funcionalidade VALUES("8","21");
INSERT INTO tb_perfil_funcionalidade VALUES("8","27");
INSERT INTO tb_perfil_funcionalidade VALUES("9","12");
INSERT INTO tb_perfil_funcionalidade VALUES("9","21");
INSERT INTO tb_perfil_funcionalidade VALUES("9","22");
INSERT INTO tb_perfil_funcionalidade VALUES("9","23");
INSERT INTO tb_perfil_funcionalidade VALUES("9","25");
INSERT INTO tb_perfil_funcionalidade VALUES("9","27");
INSERT INTO tb_perfil_funcionalidade VALUES("10","21");
INSERT INTO tb_perfil_funcionalidade VALUES("10","27");
INSERT INTO tb_perfil_funcionalidade VALUES("11","12");
INSERT INTO tb_perfil_funcionalidade VALUES("11","21");
INSERT INTO tb_perfil_funcionalidade VALUES("11","22");
INSERT INTO tb_perfil_funcionalidade VALUES("11","23");
INSERT INTO tb_perfil_funcionalidade VALUES("11","25");
INSERT INTO tb_perfil_funcionalidade VALUES("11","27");
INSERT INTO tb_perfil_funcionalidade VALUES("12","21");
INSERT INTO tb_perfil_funcionalidade VALUES("12","27");
INSERT INTO tb_perfil_funcionalidade VALUES("13","12");
INSERT INTO tb_perfil_funcionalidade VALUES("13","21");
INSERT INTO tb_perfil_funcionalidade VALUES("13","22");
INSERT INTO tb_perfil_funcionalidade VALUES("13","23");
INSERT INTO tb_perfil_funcionalidade VALUES("13","25");
INSERT INTO tb_perfil_funcionalidade VALUES("13","26");
INSERT INTO tb_perfil_funcionalidade VALUES("13","27");
INSERT INTO tb_perfil_funcionalidade VALUES("15","12");
INSERT INTO tb_perfil_funcionalidade VALUES("15","21");
INSERT INTO tb_perfil_funcionalidade VALUES("15","22");
INSERT INTO tb_perfil_funcionalidade VALUES("15","23");
INSERT INTO tb_perfil_funcionalidade VALUES("15","25");
INSERT INTO tb_perfil_funcionalidade VALUES("15","27");
INSERT INTO tb_perfil_funcionalidade VALUES("16","21");
INSERT INTO tb_perfil_funcionalidade VALUES("16","27");
INSERT INTO tb_perfil_funcionalidade VALUES("17","12");
INSERT INTO tb_perfil_funcionalidade VALUES("17","21");
INSERT INTO tb_perfil_funcionalidade VALUES("17","22");
INSERT INTO tb_perfil_funcionalidade VALUES("17","23");
INSERT INTO tb_perfil_funcionalidade VALUES("17","25");
INSERT INTO tb_perfil_funcionalidade VALUES("17","27");
INSERT INTO tb_perfil_funcionalidade VALUES("18","21");
INSERT INTO tb_perfil_funcionalidade VALUES("18","27");
INSERT INTO tb_perfil_funcionalidade VALUES("19","21");
INSERT INTO tb_perfil_funcionalidade VALUES("19","27");



DROP TABLE IF EXISTS tb_tarefa;

CREATE TABLE `tb_tarefa` (
  `co_tarefa` int(11) NOT NULL AUTO_INCREMENT,
  `ds_titulo` varchar(200) DEFAULT NULL,
  `ds_descricao` text,
  `st_status` varchar(1) DEFAULT NULL COMMENT 'N - Não iniciada / A - Em andamento / C - concluída / I - Inativa (Cancelada)',
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_inicio` date DEFAULT NULL,
  `dt_fim` date DEFAULT NULL,
  `dt_conclusao` date DEFAULT NULL,
  `co_evento` int(10) unsigned NOT NULL,
  `co_perfil` int(11) NOT NULL,
  `co_usuario` int(10) NOT NULL,
  `st_prioridade` int(1) DEFAULT '4' COMMENT '1 - Urgente / 2 - Alta / 3 - Media / 4 - Baixa',
  PRIMARY KEY (`co_tarefa`,`co_evento`,`co_perfil`,`co_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

INSERT INTO tb_tarefa VALUES("1","Ligar para os participantes do retiro","Separa quem vai ligar, e verificar se surge mais vagas para puxar da lista de espera.","N","2016-01-15 15:46:16","2016-01-10","2016-01-18","0000-00-00","3","4","2","4");
INSERT INTO tb_tarefa VALUES("2","Cobrar o retorno dos representantes das equipes da gincana","<p>Entrar em contato com os representantes das equipes e verificar como est&atilde;o as equipes, para analisar se as equipes ser&atilde;o refeitas.</p>","N","2016-01-15 15:48:29","2016-01-15","2016-01-17","0000-00-00","3","4","1","1");
INSERT INTO tb_tarefa VALUES("3","Medir o Salão","Medir salão para ver a possibilidade de aumentar vagas do retiro e ingressos do Luau","C","2016-01-18 00:58:42","2016-01-16","2016-01-16","2016-01-16","3","4","2","4");
INSERT INTO tb_tarefa VALUES("4","Reorganizar cronograma","<ul>\n\n	<li>Reorganizar o cronograma, pois a Gaga n&atilde;o vai mais e a</li>\n\n	<li>Prega&ccedil;&atilde;o do Robson tem que analisar</li>\n\n	<li>Organizar o momento do t&uacute;nel com o que vai ser feito no plen&aacute;rio.</li>\n\n	<li>Decidir dinamica de apresenta&ccedil;&atilde;o</li>\n\n	<li>Sugest&atilde;o de troca das pe&ccedil;as das marcaras e dos herois para enquadra os temas.&nbsp;</li>\n\n</ul>","I","2016-01-15 17:32:16","2016-01-16","2016-01-16","0000-00-00","3","4","1","4");
INSERT INTO tb_tarefa VALUES("5","Fazer escala da intercessão e de trabalho para Luau","<p>Fazer escala da intercess&atilde;o e trabalho para Luau, de acordo com a lista de quem vai trabalhar</p>","N","2016-01-15 16:15:27","2016-01-16","2016-01-16","0000-00-00","3","4","1","1");
INSERT INTO tb_tarefa VALUES("6","Fazer as compras do Luau","<p>Fazer as compras do Luau Escrever aqui a lista</p>","A","2016-01-15 16:05:37","2016-01-15","2016-01-15","0000-00-00","3","4","1","4");
INSERT INTO tb_tarefa VALUES("7","Fazer os acertos dos ingressos do Luau com as equipes","<p>Entrar em contato com os representantes lembrando de fazer o acerto dos ingressos. elaborar um recado para postar nos grupos lembrando do prazo do acerto</p>","N","2016-01-15 16:08:31","2016-01-15","2016-01-21","0000-00-00","3","4","1","2");
INSERT INTO tb_tarefa VALUES("8","Fazer a Lista de que irá trabalhar no Luau","Fazer a Lista de que irá trabalhar no retiro para poder fazer a escala de trabalho e da capela","N","2016-01-15 16:16:45","2016-01-16","2016-01-16","0000-00-00","3","4","2","4");
INSERT INTO tb_tarefa VALUES("9","Fazer o cardápio do retiro","<p>Postar o card&aacute;pio aqui no sistema</p>","N","2016-01-15 16:22:59","2016-01-16","2016-01-31","0000-00-00","3","4","1","2");
INSERT INTO tb_tarefa VALUES("10","Fazer a Lista de compras para o Carnaval","<p>Postar aqui a Lista de compras</p>","A","2016-01-15 16:24:08","2016-01-16","2016-01-31","0000-00-00","3","4","1","4");
INSERT INTO tb_tarefa VALUES("11","Fazer compras para o carnaval","<p>Pessoal que est&aacute; mais ligado ao financeiro ir fazer as compras, baseado na lista.</p>","N","2016-01-15 16:28:53","2016-02-01","2016-02-05","0000-00-00","3","4","2","4");
INSERT INTO tb_tarefa VALUES("12","Marcar a Reunião com o padre","<p>Pauta da reuni&atilde;o com o padre</p>\n\n\n\n<ul>\n\n	<li>Dormitorios parrte antiga</li>\n\n	<li>Missa</li>\n\n	<li>Confiss&atilde;o</li>\n\n</ul>","N","2016-01-15 16:43:07","2016-02-27","2016-01-27","0000-00-00","3","4","2","4");
INSERT INTO tb_tarefa VALUES("13","Ligar para o rapaz do aluguel do inflavel","<p>Ligar para o rapaz dos inflaveis para verificar calores e fechar dia e hor&aacute;rio do aluguel.</p>","C","2016-01-15 16:44:45","2016-01-15","2016-01-31","2016-01-14","3","4","1","4");
INSERT INTO tb_tarefa VALUES("14","Mandar fazer as camisetas","<p>Mandar fazer as camisetas da galera do GEJ, cerificar a quest&atilde;o da do valor da entrada e prazo de entraga das camisetas&nbsp;</p>","N","2016-01-15 17:07:46","2016-01-16","2016-01-16","0000-00-00","3","4","1","3");
INSERT INTO tb_tarefa VALUES("15","Fazer escala da intercessão e de trabalho para o Retiro","<p>Fazer escala da intercess&atilde;o e de trabalho para o Retiro</p>\n\n\n\n<p>Postar aqui a Escala</p>","N","2016-01-15 17:09:32","2016-01-18","2016-01-31","0000-00-00","3","4","2","4");
INSERT INTO tb_tarefa VALUES("16","Listar compras para Luau","<p>Postar aqui a lista</p>","I","2016-01-15 20:40:58","2016-01-16","2016-01-16","0000-00-00","3","4","1","4");



DROP TABLE IF EXISTS tb_usuario;

CREATE TABLE `tb_usuario` (
  `co_usuario` int(10) NOT NULL AUTO_INCREMENT,
  `no_usuario` varchar(200) NOT NULL,
  `ds_login` varchar(50) NOT NULL,
  `ds_senha` varchar(100) NOT NULL,
  `ds_code` varchar(50) NOT NULL,
  `ds_foto` varchar(150) DEFAULT NULL,
  `ds_sexo` varchar(1) DEFAULT NULL COMMENT '''M - Masculino / F - Feminino''',
  `st_situacao` varchar(1) NOT NULL DEFAULT 'I' COMMENT '''A - Ativo / I - Inativo''',
  `ds_email` varchar(250) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  PRIMARY KEY (`co_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO tb_usuario VALUES("1","Leonardo M C Bessa","leobessa","123456**","TVRJek5EVTJLaW89","leonardo-m-c-bessa-56e8920c23ab6.jpg","M","A","leonardomcbessa@gmail.com","2015-12-22 15:07:16");
INSERT INTO tb_usuario VALUES("2","Lilian Machado Carvalho Bessa","lilibessa","123456**","TVRJek5EVTJLaW89","","F","A","lililasp@gmail.com","2016-01-03 11:16:53");
INSERT INTO tb_usuario VALUES("3","Beatriz Gomes dos Santos","Beatriz Gomes","mariaminhamãe","YldGeWFXRnRhVzVvWVczRG8yVT0=","","F","A","beatrizgomes_gsm@hotmail.com","2016-01-03 11:56:21");
INSERT INTO tb_usuario VALUES("4","Linneker Lima Roberto Gomes","Linneker Maria","maria10*","YldGeWFXRXhNQ289","linneker-lima-roberto-gomes-5689293b48cb5.jpg","M","A","Linnekerlima@hotmail.com","2016-01-03 11:59:23");
INSERT INTO tb_usuario VALUES("5","Letícia Machado Carvalho Bessa","lelebessa","LeticiaBessa270892","VEdWMGFXTnBZVUpsYzNOaE1qY3dPRGt5","leticia-machado-carvalho-bessa-5689295ec079a.jpg","F","A","lele.403@hotmail.com","2016-01-03 11:59:58");
INSERT INTO tb_usuario VALUES("6","Larissa Silva de Jesus","Larissinha","batatafrita*","WW1GMFlYUmhabkpwZEdFcQ==","larissa-silva-de-jesus-56892c65f0f57.jpeg","F","A","Larissasilvaj@hotmail.com","2016-01-03 12:12:53");
INSERT INTO tb_usuario VALUES("7","Luana Ribeiro Bessa","Luana Bessa","naotenhammedojpII2016","Ym1GdmRHVnVhR0Z0YldWa2IycHdTVWt5TURFMg==","luana-ribeiro-bessa-56893d07d5c69.jpeg","F","A","lukka_bessa@hotmail.com","2016-01-03 13:16:54");
INSERT INTO tb_usuario VALUES("8","Novo user","testenovo","123456**","TVRJek5EVTJLaW89","","M","A","ledwos@leo.com","2016-01-13 15:33:12");



DROP TABLE IF EXISTS tb_usuario_evento;

CREATE TABLE `tb_usuario_evento` (
  `co_usuario` int(10) NOT NULL,
  `co_evento` int(10) NOT NULL,
  PRIMARY KEY (`co_usuario`,`co_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS tb_usuario_perfil;

CREATE TABLE `tb_usuario_perfil` (
  `co_usuario` int(10) NOT NULL,
  `co_perfil` int(10) NOT NULL,
  PRIMARY KEY (`co_usuario`,`co_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO tb_usuario_perfil VALUES("1","1");
INSERT INTO tb_usuario_perfil VALUES("2","2");
INSERT INTO tb_usuario_perfil VALUES("2","3");
INSERT INTO tb_usuario_perfil VALUES("3","3");
INSERT INTO tb_usuario_perfil VALUES("3","8");
INSERT INTO tb_usuario_perfil VALUES("4","3");
INSERT INTO tb_usuario_perfil VALUES("4","4");
INSERT INTO tb_usuario_perfil VALUES("5","2");
INSERT INTO tb_usuario_perfil VALUES("5","3");
INSERT INTO tb_usuario_perfil VALUES("6","3");
INSERT INTO tb_usuario_perfil VALUES("6","4");
INSERT INTO tb_usuario_perfil VALUES("7","2");
INSERT INTO tb_usuario_perfil VALUES("7","3");
INSERT INTO tb_usuario_perfil VALUES("8","3");
INSERT INTO tb_usuario_perfil VALUES("8","17");



