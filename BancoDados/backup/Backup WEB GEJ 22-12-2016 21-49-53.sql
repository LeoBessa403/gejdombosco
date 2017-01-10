CREATE DATABASE IF NOT EXISTS gej_bd;

USE gej_bd;

DROP TABLE IF EXISTS tb_acesso;


CREATE TABLE `tb_acesso` (
  `co_acesso` int(11) NOT NULL AUTO_INCREMENT,
  `ds_session_id` varchar(255) NOT NULL,
  `dt_inicio_acesso` datetime DEFAULT NULL,
  `dt_fim_acesso` datetime DEFAULT NULL,
  `co_usuario` int(10) NOT NULL,
  PRIMARY KEY (`co_acesso`,`co_usuario`),
  KEY `fk_TB_ACESSO_TB_USUARIO1_idx` (`co_usuario`),
  CONSTRAINT `fk_TB_ACESSO_TB_USUARIO1` FOREIGN KEY (`co_usuario`) REFERENCES `tb_usuario` (`co_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


INSERT INTO tb_acesso VALUES("1","nd1t1hgaegkr6ensi5gdtctj93","2016-12-19 20:19:45","2016-12-19 21:17:19","1");

INSERT INTO tb_acesso VALUES("2","ku0c7o17106jl3suik9adchcs7","2016-12-19 20:47:06","2016-12-19 21:15:40","1");

INSERT INTO tb_acesso VALUES("3","ku0c7o17106jl3suik9adchcs7","2016-12-19 20:50:42","2016-12-19 20:50:42","2");




DROP TABLE IF EXISTS tb_auditoria;


CREATE TABLE `tb_auditoria` (
  `co_auditoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_tabela` varchar(150) DEFAULT NULL,
  `dt_realizado` datetime DEFAULT NULL,
  `no_operacao` varchar(1) DEFAULT NULL,
  `ds_item_anterior` text,
  `ds_item_atual` text,
  `co_registro` int(10) DEFAULT NULL,
  `ds_perfil_usuario` text,
  `co_usuario` int(10) NOT NULL,
  PRIMARY KEY (`co_auditoria`,`co_usuario`),
  KEY `fk_TB_AUDITORIA_TB_USUARIO1_idx` (`co_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;


INSERT INTO tb_auditoria VALUES("1","tb_acesso","2016-12-19 20:19:45","I","","ds_session_id==nd1t1hgaegkr6ensi5gdtctj93;/co_usuario==1;/dt_inicio_acesso==2016-12-19 20:19:45;/dt_fim_acesso==2016-12-19 20:19:45","1","","0");

INSERT INTO tb_auditoria VALUES("2","tb_acesso","2016-12-19 20:19:48","U","co_acesso==1;/ds_session_id==nd1t1hgaegkr6ensi5gdtctj93;/dt_inicio_acesso==2016-12-19 20:19:45;/dt_fim_acesso==2016-12-19 20:19:45;/co_usuario==1","dt_fim_acesso==2016-12-19 20:19:45","1","Master","1");

INSERT INTO tb_auditoria VALUES("3","tb_perfil_funcionalidade","2016-12-19 20:20:35","D","","","","Master","1");

INSERT INTO tb_auditoria VALUES("4","tb_perfil_funcionalidade","2016-12-19 20:20:35","I","","co_perfil==2;/co_funcionalidade==5","2","Master","1");

INSERT INTO tb_auditoria VALUES("5","tb_perfil_funcionalidade","2016-12-19 20:20:36","I","","co_perfil==2;/co_funcionalidade==6","3","Master","1");

INSERT INTO tb_auditoria VALUES("6","tb_perfil_funcionalidade","2016-12-19 20:20:46","D","","","","Master","1");

INSERT INTO tb_auditoria VALUES("7","tb_perfil_funcionalidade","2016-12-19 20:20:46","I","","co_perfil==3;/co_funcionalidade==6","4","Master","1");

INSERT INTO tb_auditoria VALUES("8","tb_acesso","2016-12-19 20:47:06","I","","ds_session_id==ku0c7o17106jl3suik9adchcs7;/co_usuario==1;/dt_inicio_acesso==2016-12-19 20:47:06;/dt_fim_acesso==2016-12-19 20:47:06","2","","0");

INSERT INTO tb_auditoria VALUES("9","tb_acesso","2016-12-19 20:47:06","U","co_acesso==1;/ds_session_id==nd1t1hgaegkr6ensi5gdtctj93;/dt_inicio_acesso==2016-12-19 20:19:45;/dt_fim_acesso==2016-12-19 20:19:45;/co_usuario==1","dt_fim_acesso==2016-12-19 20:47:06","1","Master","1");

INSERT INTO tb_auditoria VALUES("10","tb_endereco","2016-12-19 20:48:40","I","","ds_endereco==endereco;/ds_complemento==;/ds_bairro==;/no_cidade==;/nu_cep==72681438;/sg_uf==AP","2","Master","1");

INSERT INTO tb_auditoria VALUES("11","tb_contato","2016-12-19 20:48:40","I","","ds_email==novo@mail.com;/nu_tel1==22222222222;/nu_tel2==33333333333","2","Master","1");

INSERT INTO tb_auditoria VALUES("12","tb_imagem","2016-12-19 20:48:40","I","","ds_caminho==novinho-585863c874d24.png","2","Master","1");

INSERT INTO tb_auditoria VALUES("13","tb_pessoa","2016-12-19 20:48:40","I","","no_pessoa==novinho;/nu_cpf==12345678909;/nu_rg==2222222222222;/dt_nascimento==1984-05-05;/st_sexo==M;/dt_cadastro==2016-12-19 20:48:40;/co_endereco==2;/co_contato==2","2","Master","1");

INSERT INTO tb_auditoria VALUES("14","tb_usuario","2016-12-19 20:48:40","I","","co_imagem==2;/co_pessoa==2","2","Master","1");

INSERT INTO tb_auditoria VALUES("15","tb_usuario_perfil","2016-12-19 20:48:40","I","","co_usuario==2;/co_perfil==3","2","Master","1");

INSERT INTO tb_auditoria VALUES("16","tb_imagem","2016-12-19 20:49:17","U","co_imagem==2;/ds_caminho==novinho-585863c874d24.png","ds_caminho==","2","Master","1");

INSERT INTO tb_auditoria VALUES("17","tb_contato","2016-12-19 20:49:17","U","co_contato==2;/nu_tel1==22222222222;/nu_tel2==33333333333;/nu_tel3==;/ds_email==novo@mail.com","ds_email==novo@mail.com;/nu_tel1==22222222222;/nu_tel2==33333333333","2","Master","1");

INSERT INTO tb_auditoria VALUES("18","tb_endereco","2016-12-19 20:49:17","U","co_endereco==2;/ds_endereco==endereco;/ds_complemento==;/ds_bairro==;/nu_cep==72681438;/no_cidade==;/sg_uf==AP","ds_endereco==endereco;/ds_complemento==;/ds_bairro==;/no_cidade==;/nu_cep==72681438;/sg_uf==AP","2","Master","1");

INSERT INTO tb_auditoria VALUES("19","tb_pessoa","2016-12-19 20:49:17","U","co_pessoa==2;/nu_cpf==12345678909;/no_pessoa==novinho;/nu_rg==2222222222222;/dt_cadastro==2016-12-19 20:48:40;/dt_nascimento==1984-05-05;/st_sexo==M;/co_contato==2;/co_endereco==2","no_pessoa==novinho;/nu_cpf==12345678909;/nu_rg==2222222222222;/dt_nascimento==1984-05-05;/st_sexo==M","2","Master","1");

INSERT INTO tb_auditoria VALUES("20","tb_usuario","2016-12-19 20:49:18","U","co_usuario==2;/ds_senha==;/ds_code==;/st_status==I;/dt_cadastro==0000-00-00 00:00:00;/co_imagem==2;/co_pessoa==2","ds_senha==123456**;/ds_code==TVRJek5EVTJLaW89;/st_status==I","2","Master","1");

INSERT INTO tb_auditoria VALUES("21","tb_usuario_perfil","2016-12-19 20:49:18","D","co_usuario_perfil==2;/co_usuario==2;/co_perfil==3","","2","Master","1");

INSERT INTO tb_auditoria VALUES("22","tb_usuario_perfil","2016-12-19 20:49:18","I","","co_usuario==2;/co_perfil==3","3","Master","1");

INSERT INTO tb_auditoria VALUES("23","tb_imagem","2016-12-19 20:49:41","U","co_imagem==2;/ds_caminho==","ds_caminho==novinho-58586404f3d1e.png","2","Master","1");

INSERT INTO tb_auditoria VALUES("24","tb_contato","2016-12-19 20:49:41","U","co_contato==2;/nu_tel1==22222222222;/nu_tel2==33333333333;/nu_tel3==;/ds_email==novo@mail.com","ds_email==novo@mail.com;/nu_tel1==22222222222;/nu_tel2==33333333333","2","Master","1");

INSERT INTO tb_auditoria VALUES("25","tb_endereco","2016-12-19 20:49:41","U","co_endereco==2;/ds_endereco==endereco;/ds_complemento==;/ds_bairro==;/nu_cep==72681438;/no_cidade==;/sg_uf==AP","ds_endereco==endereco;/ds_complemento==;/ds_bairro==;/no_cidade==;/nu_cep==72681438;/sg_uf==AP","2","Master","1");

INSERT INTO tb_auditoria VALUES("26","tb_pessoa","2016-12-19 20:49:41","U","co_pessoa==2;/nu_cpf==12345678909;/no_pessoa==novinho;/nu_rg==2222222222222;/dt_cadastro==2016-12-19 20:48:40;/dt_nascimento==1984-05-05;/st_sexo==M;/co_contato==2;/co_endereco==2","no_pessoa==novinho;/nu_cpf==12345678909;/nu_rg==2222222222222;/dt_nascimento==1984-05-05;/st_sexo==M","2","Master","1");

INSERT INTO tb_auditoria VALUES("27","tb_usuario","2016-12-19 20:49:41","U","co_usuario==2;/ds_senha==123456**;/ds_code==TVRJek5EVTJLaW89;/st_status==I;/dt_cadastro==0000-00-00 00:00:00;/co_imagem==2;/co_pessoa==2","ds_senha==123456**;/ds_code==TVRJek5EVTJLaW89;/st_status==A","2","Master","1");

INSERT INTO tb_auditoria VALUES("28","tb_usuario_perfil","2016-12-19 20:49:42","D","co_usuario_perfil==3;/co_usuario==2;/co_perfil==3","","3","Master","1");

INSERT INTO tb_auditoria VALUES("29","tb_usuario_perfil","2016-12-19 20:49:42","I","","co_usuario==2;/co_perfil==3","4","Master","1");

INSERT INTO tb_auditoria VALUES("30","tb_acesso","2016-12-19 20:50:42","I","","ds_session_id==ku0c7o17106jl3suik9adchcs7;/co_usuario==2;/dt_inicio_acesso==2016-12-19 20:50:42;/dt_fim_acesso==2016-12-19 20:50:42","3","","0");

INSERT INTO tb_auditoria VALUES("31","tb_acesso","2016-12-19 20:50:42","U","co_acesso==2;/ds_session_id==ku0c7o17106jl3suik9adchcs7;/dt_inicio_acesso==2016-12-19 20:47:06;/dt_fim_acesso==2016-12-19 20:47:06;/co_usuario==1","dt_fim_acesso==2016-12-19 20:50:42","2","Membro","2");

INSERT INTO tb_auditoria VALUES("32","tb_acesso","2016-12-19 20:58:38","U","co_acesso==2;/ds_session_id==ku0c7o17106jl3suik9adchcs7;/dt_inicio_acesso==2016-12-19 20:47:06;/dt_fim_acesso==2016-12-19 20:50:42;/co_usuario==1","dt_fim_acesso==2016-12-19 20:58:38","2","","0");

INSERT INTO tb_auditoria VALUES("33","tb_acesso","2016-12-19 20:58:38","U","co_acesso==2;/ds_session_id==ku0c7o17106jl3suik9adchcs7;/dt_inicio_acesso==2016-12-19 20:47:06;/dt_fim_acesso==2016-12-19 20:58:38;/co_usuario==1","dt_fim_acesso==2016-12-19 20:58:38","2","Membro","2");

INSERT INTO tb_auditoria VALUES("34","tb_imagem","2016-12-19 21:09:18","U","co_imagem==2;/ds_caminho==novinho-58586404f3d1e.png","ds_caminho==","2","Membro","2");

INSERT INTO tb_auditoria VALUES("35","tb_contato","2016-12-19 21:09:18","U","co_contato==2;/nu_tel1==22222222222;/nu_tel2==33333333333;/nu_tel3==;/ds_email==novo@mail.com","ds_email==novo@mail.com;/nu_tel1==22222222222;/nu_tel2==33333333333","2","Membro","2");

INSERT INTO tb_auditoria VALUES("36","tb_endereco","2016-12-19 21:09:19","U","co_endereco==2;/ds_endereco==endereco;/ds_complemento==;/ds_bairro==;/nu_cep==72681438;/no_cidade==;/sg_uf==AP","ds_endereco==endereco;/ds_complemento==;/ds_bairro==;/no_cidade==;/nu_cep==72681438;/sg_uf==AP","2","Membro","2");

INSERT INTO tb_auditoria VALUES("37","tb_pessoa","2016-12-19 21:09:19","U","co_pessoa==2;/nu_cpf==12345678909;/no_pessoa==novinho;/nu_rg==2222222222222;/dt_cadastro==2016-12-19 20:48:40;/dt_nascimento==1984-05-05;/st_sexo==M;/co_contato==2;/co_endereco==2","no_pessoa==novinho;/nu_cpf==12345678909;/nu_rg==1;/dt_nascimento==1984-05-05;/st_sexo==M","2","Membro","2");

INSERT INTO tb_auditoria VALUES("38","tb_usuario","2016-12-19 21:09:19","U","co_usuario==2;/ds_senha==123456**;/ds_code==TVRJek5EVTJLaW89;/st_status==A;/dt_cadastro==0000-00-00 00:00:00;/co_imagem==2;/co_pessoa==2","ds_senha==123456**;/ds_code==TVRJek5EVTJLaW89;/st_status==I","2","Membro","2");

INSERT INTO tb_auditoria VALUES("39","tb_usuario_perfil","2016-12-19 21:09:19","D","co_usuario_perfil==4;/co_usuario==2;/co_perfil==3","","4","Membro","2");

INSERT INTO tb_auditoria VALUES("40","tb_acesso","2016-12-19 21:15:40","U","co_acesso==2;/ds_session_id==ku0c7o17106jl3suik9adchcs7;/dt_inicio_acesso==2016-12-19 20:47:06;/dt_fim_acesso==2016-12-19 20:58:38;/co_usuario==1","dt_fim_acesso==2016-12-19 21:15:40","2","","0");

INSERT INTO tb_auditoria VALUES("41","tb_acesso","2016-12-19 21:15:40","U","co_acesso==2;/ds_session_id==ku0c7o17106jl3suik9adchcs7;/dt_inicio_acesso==2016-12-19 20:47:06;/dt_fim_acesso==2016-12-19 21:15:40;/co_usuario==1","dt_fim_acesso==2016-12-19 21:15:40","2","","2");

INSERT INTO tb_auditoria VALUES("42","tb_acesso","2016-12-19 21:17:19","U","co_acesso==1;/ds_session_id==nd1t1hgaegkr6ensi5gdtctj93;/dt_inicio_acesso==2016-12-19 20:19:45;/dt_fim_acesso==2016-12-19 20:47:06;/co_usuario==1","dt_fim_acesso==2016-12-19 21:17:19","1","","0");

INSERT INTO tb_auditoria VALUES("43","tb_acesso","2016-12-19 21:17:19","U","co_acesso==1;/ds_session_id==nd1t1hgaegkr6ensi5gdtctj93;/dt_inicio_acesso==2016-12-19 20:19:45;/dt_fim_acesso==2016-12-19 21:17:19;/co_usuario==1","dt_fim_acesso==2016-12-19 21:17:19","1","Master","1");




DROP TABLE IF EXISTS tb_contato;


CREATE TABLE `tb_contato` (
  `co_contato` int(11) NOT NULL AUTO_INCREMENT,
  `nu_tel1` varchar(15) NOT NULL,
  `nu_tel2` varchar(15) DEFAULT NULL,
  `nu_tel3` varchar(15) DEFAULT NULL,
  `ds_email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`co_contato`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


INSERT INTO tb_contato VALUES("1","61993274991","6130826060","","leonardomcbessa@gmail.com");

INSERT INTO tb_contato VALUES("2","22222222222","33333333333","","novo@mail.com");




DROP TABLE IF EXISTS tb_endereco;


CREATE TABLE `tb_endereco` (
  `co_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `ds_endereco` varchar(150) NOT NULL,
  `ds_complemento` varchar(100) DEFAULT NULL,
  `ds_bairro` varchar(80) DEFAULT NULL,
  `nu_cep` varchar(15) DEFAULT NULL,
  `no_cidade` varchar(80) DEFAULT NULL,
  `sg_uf` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`co_endereco`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


INSERT INTO tb_endereco VALUES("1","qr 403 conjunto 10 casa 28","","Samambaia Norte","72319111","Brasília","DF");

INSERT INTO tb_endereco VALUES("2","endereco","","","72681438","","AP");




DROP TABLE IF EXISTS tb_evento;


CREATE TABLE `tb_evento` (
  `co_evento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_evento` varchar(250) DEFAULT NULL,
  `ds_conteudo` text,
  `ds_palavras_chaves` varchar(100) DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_realizado` date DEFAULT NULL,
  `ds_local` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`co_evento`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;





DROP TABLE IF EXISTS tb_funcionalidade;


CREATE TABLE `tb_funcionalidade` (
  `co_funcionalidade` int(11) NOT NULL AUTO_INCREMENT,
  `no_funcionalidade` varchar(150) NOT NULL,
  `ds_rota` varchar(250) NOT NULL,
  `st_status` varchar(1) NOT NULL DEFAULT 'I' COMMENT 'A - Ativo / I - Inativo',
  PRIMARY KEY (`co_funcionalidade`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;


INSERT INTO tb_funcionalidade VALUES("1","Perfil Master","Admin/Index/SuperPerfil","A");

INSERT INTO tb_funcionalidade VALUES("2","Auditoria Listar","Admin/Auditoria/ListarAuditoria","A");

INSERT INTO tb_funcionalidade VALUES("3","Auditoria Detalhar","Admin/Auditoria/DetalharAuditoria","A");

INSERT INTO tb_funcionalidade VALUES("4","Usuario Cadastrar","Admin/Usuario/CadastroUsuario","A");

INSERT INTO tb_funcionalidade VALUES("5","Usuario Listar","Admin/Usuario/ListarUsuario","A");

INSERT INTO tb_funcionalidade VALUES("6","Meu Usuario","Admin/Usuario/MeuPerfilUsuario","A");

INSERT INTO tb_funcionalidade VALUES("7","Perfil Listar","Admin/Perfil/ListarPerfil","A");

INSERT INTO tb_funcionalidade VALUES("8","Perfil Cadastrar","Admin/Perfil/CadastroPerfil","A");

INSERT INTO tb_funcionalidade VALUES("9","Funcionalidade Listar","Admin/Funcionalidade/ListarFuncionalidade","A");

INSERT INTO tb_funcionalidade VALUES("10","Funcionalidade Cadastrar","Admin/Funcionalidade/CadastroFuncionalidade","A");

INSERT INTO tb_funcionalidade VALUES("11","Funcionalidades Perfil","Admin/Funcionalidade/FuncionalidadesPerfil","A");




DROP TABLE IF EXISTS tb_imagem;


CREATE TABLE `tb_imagem` (
  `co_imagem` int(10) NOT NULL AUTO_INCREMENT,
  `ds_caminho` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`co_imagem`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


INSERT INTO tb_imagem VALUES("1","leonardo-m-c-bessa-56e8920c23ab6.jpg");

INSERT INTO tb_imagem VALUES("2","");




DROP TABLE IF EXISTS tb_inscricao;


CREATE TABLE `tb_inscricao` (
  `co_inscricao` int(10) unsigned NOT NULL,
  `ds_pastoral` text,
  `ds_retiro` varchar(1) DEFAULT NULL,
  `ds_membro_ativo` varchar(1) DEFAULT 'N',
  `ds_situacao_atual_grupo` int(1) DEFAULT NULL,
  `co_evento` int(10) unsigned NOT NULL,
  `nu_camisa` int(1) NOT NULL,
  `no_responsavel` varchar(50) NOT NULL,
  `nu_tel_responsavel` varchar(15) NOT NULL,
  `ds_descricao` text NOT NULL,
  `co_pessoa` int(11) NOT NULL,
  PRIMARY KEY (`co_inscricao`,`co_pessoa`),
  KEY `fk_tb_membro_retiro_tb_retiro1_idx` (`co_evento`),
  KEY `fk_TB_INSCRICAO_TB_PESSOA1_idx` (`co_pessoa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;





DROP TABLE IF EXISTS tb_membro;


CREATE TABLE `tb_membro` (
  `co_membro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_responsavel` varchar(100) DEFAULT NULL,
  `st_estuda` varchar(1) DEFAULT NULL,
  `st_trabalha` varchar(1) DEFAULT NULL,
  `ds_conhecimento` text,
  `st_status` varchar(1) DEFAULT NULL,
  `st_batizado` varchar(1) NOT NULL,
  `st_eucaristia` varchar(1) NOT NULL,
  `st_crisma` varchar(1) NOT NULL,
  `co_pessoa` int(11) NOT NULL,
  PRIMARY KEY (`co_membro`,`co_pessoa`),
  KEY `fk_TB_MEMBRO_TB_PESSOA1_idx` (`co_pessoa`),
  CONSTRAINT `fk_TB_MEMBRO_TB_PESSOA1` FOREIGN KEY (`co_pessoa`) REFERENCES `tb_pessoa` (`co_pessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





DROP TABLE IF EXISTS tb_pagamento;


CREATE TABLE `tb_pagamento` (
  `co_pagamento` int(11) NOT NULL AUTO_INCREMENT,
  `nu_total` decimal(10,0) DEFAULT NULL,
  `nu_valor_pago` decimal(10,0) DEFAULT NULL,
  `nu_parcelas` int(11) DEFAULT NULL,
  `tp_situacao` varchar(1) DEFAULT 'N' COMMENT 'N - Não iniciado / I - Iniciado / C - Concluido',
  `ds_observacao` text,
  `co_inscricao` int(10) unsigned NOT NULL,
  `co_tipo_pagamento` int(11) NOT NULL,
  PRIMARY KEY (`co_pagamento`,`co_inscricao`,`co_tipo_pagamento`),
  KEY `fk_TB_PAGAMENTO_TB_INSCRICAO1_idx` (`co_inscricao`),
  KEY `fk_TB_PAGAMENTO_TB_TIPO_PAGAMENTO1_idx` (`co_tipo_pagamento`),
  CONSTRAINT `fk_TB_PAGAMENTO_TB_INSCRICAO1` FOREIGN KEY (`co_inscricao`) REFERENCES `tb_inscricao` (`co_inscricao`),
  CONSTRAINT `fk_TB_PAGAMENTO_TB_TIPO_PAGAMENTO1` FOREIGN KEY (`co_tipo_pagamento`) REFERENCES `tb_tipo_pagamento` (`co_tipo_pagamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





DROP TABLE IF EXISTS tb_parcelamento;


CREATE TABLE `tb_parcelamento` (
  `co_parcelamento` int(11) NOT NULL AUTO_INCREMENT,
  `nu_parcela` int(11) DEFAULT NULL,
  `nu_valor_parcela` decimal(10,0) DEFAULT NULL,
  `nu_valor_parcela_pago` decimal(10,0) DEFAULT NULL,
  `dt_vencimento` date DEFAULT NULL,
  `dt_vencimento_pago` date DEFAULT NULL,
  `ds_observacao` text,
  `co_pagamento` int(11) NOT NULL,
  PRIMARY KEY (`co_parcelamento`,`co_pagamento`),
  KEY `fk_TB_PARCELAMENTO_TB_PAGAMENTO1_idx` (`co_pagamento`),
  CONSTRAINT `fk_TB_PARCELAMENTO_TB_PAGAMENTO1` FOREIGN KEY (`co_pagamento`) REFERENCES `tb_pagamento` (`co_pagamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





DROP TABLE IF EXISTS tb_perfil;


CREATE TABLE `tb_perfil` (
  `co_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `no_perfil` varchar(45) NOT NULL,
  `st_status` varchar(1) DEFAULT 'I',
  PRIMARY KEY (`co_perfil`),
  UNIQUE KEY `co_perfil_UNIQUE` (`co_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


INSERT INTO tb_perfil VALUES("1","Master","A");

INSERT INTO tb_perfil VALUES("2","Coordenador","A");

INSERT INTO tb_perfil VALUES("3","Membro","A");




DROP TABLE IF EXISTS tb_perfil_funcionalidade;


CREATE TABLE `tb_perfil_funcionalidade` (
  `co_perfil_funcionalidade` int(11) NOT NULL AUTO_INCREMENT,
  `co_perfil` int(11) NOT NULL,
  `co_funcionalidade` int(11) NOT NULL,
  PRIMARY KEY (`co_perfil_funcionalidade`,`co_perfil`,`co_funcionalidade`),
  KEY `fk_tb_perfil_tb_funcionalidade_tb_funcionalidade1_idx` (`co_funcionalidade`),
  KEY `fk_tb_perfil_tb_funcionalidade_tb_perfil1_idx` (`co_perfil`),
  CONSTRAINT `fk_tb_perfil_tb_funcionalidade_tb_funcionalidade1` FOREIGN KEY (`co_funcionalidade`) REFERENCES `tb_funcionalidade` (`co_funcionalidade`),
  CONSTRAINT `fk_tb_perfil_tb_funcionalidade_tb_perfil1` FOREIGN KEY (`co_perfil`) REFERENCES `tb_perfil` (`co_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;


INSERT INTO tb_perfil_funcionalidade VALUES("1","1","1");

INSERT INTO tb_perfil_funcionalidade VALUES("2","2","5");

INSERT INTO tb_perfil_funcionalidade VALUES("3","2","6");

INSERT INTO tb_perfil_funcionalidade VALUES("4","3","6");




DROP TABLE IF EXISTS tb_pessoa;


CREATE TABLE `tb_pessoa` (
  `co_pessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nu_cpf` varchar(15) DEFAULT NULL,
  `no_pessoa` varchar(100) NOT NULL,
  `nu_rg` varchar(15) DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `st_sexo` varchar(1) DEFAULT NULL,
  `co_contato` int(11) NOT NULL,
  `co_endereco` int(11) NOT NULL,
  PRIMARY KEY (`co_pessoa`,`co_contato`,`co_endereco`),
  KEY `fk_TB_PESSOA_TB_CONTATO1_idx` (`co_contato`),
  KEY `fk_TB_PESSOA_TB_ENDERECO1_idx` (`co_endereco`),
  CONSTRAINT `fk_TB_PESSOA_TB_CONTATO1` FOREIGN KEY (`co_contato`) REFERENCES `tb_contato` (`co_contato`),
  CONSTRAINT `fk_TB_PESSOA_TB_ENDERECO1` FOREIGN KEY (`co_endereco`) REFERENCES `tb_endereco` (`co_endereco`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


INSERT INTO tb_pessoa VALUES("1","72681438187","Leonardo Machado Carvalho Bessa","2077811","2016-10-31 00:00:00","1984-07-06","M","1","1");

INSERT INTO tb_pessoa VALUES("2","12345678909","novinho","1","2016-12-19 20:48:40","1984-05-05","M","2","2");




DROP TABLE IF EXISTS tb_tipo_pagamento;


CREATE TABLE `tb_tipo_pagamento` (
  `co_tipo_pagamento` int(11) NOT NULL AUTO_INCREMENT,
  `ds_tipo_pagamento` varchar(45) DEFAULT NULL,
  `sg_tipo_pagamento` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`co_tipo_pagamento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


INSERT INTO tb_tipo_pagamento VALUES("1","Dinheiro","DI");

INSERT INTO tb_tipo_pagamento VALUES("2","Cartão de Crédito","CC");




DROP TABLE IF EXISTS tb_usuario;


CREATE TABLE `tb_usuario` (
  `co_usuario` int(10) NOT NULL AUTO_INCREMENT,
  `ds_senha` varchar(100) NOT NULL,
  `ds_code` varchar(50) NOT NULL,
  `st_status` varchar(1) NOT NULL DEFAULT 'I' COMMENT '''A - Ativo / I - Inativo''',
  `dt_cadastro` datetime NOT NULL,
  `co_imagem` int(10) NOT NULL,
  `co_pessoa` int(11) NOT NULL,
  PRIMARY KEY (`co_usuario`,`co_imagem`,`co_pessoa`),
  KEY `fk_TB_USUARIO_TB_IMAGEM1_idx` (`co_imagem`),
  KEY `fk_TB_USUARIO_TB_PESSOA2_idx` (`co_pessoa`),
  CONSTRAINT `fk_TB_USUARIO_TB_IMAGEM1` FOREIGN KEY (`co_imagem`) REFERENCES `tb_imagem` (`co_imagem`),
  CONSTRAINT `fk_TB_USUARIO_TB_PESSOA2` FOREIGN KEY (`co_pessoa`) REFERENCES `tb_pessoa` (`co_pessoa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;


INSERT INTO tb_usuario VALUES("1","123456**","TVRJek5EVTJLaW89","A","2016-10-31 00:00:00","1","1");

INSERT INTO tb_usuario VALUES("2","123456**","TVRJek5EVTJLaW89","A","0000-00-00 00:00:00","2","2");




DROP TABLE IF EXISTS tb_usuario_perfil;


CREATE TABLE `tb_usuario_perfil` (
  `co_usuario_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `co_usuario` int(10) NOT NULL,
  `co_perfil` int(11) NOT NULL,
  PRIMARY KEY (`co_usuario_perfil`,`co_usuario`,`co_perfil`),
  KEY `fk_TB_USUARIO_PERFIL_TB_USUARIO1_idx` (`co_usuario`),
  KEY `fk_TB_USUARIO_PERFIL_TB_PERFIL1_idx` (`co_perfil`),
  CONSTRAINT `fk_TB_USUARIO_PERFIL_TB_PERFIL1` FOREIGN KEY (`co_perfil`) REFERENCES `tb_perfil` (`co_perfil`),
  CONSTRAINT `fk_TB_USUARIO_PERFIL_TB_USUARIO1` FOREIGN KEY (`co_usuario`) REFERENCES `tb_usuario` (`co_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


INSERT INTO tb_usuario_perfil VALUES("1","1","1");




