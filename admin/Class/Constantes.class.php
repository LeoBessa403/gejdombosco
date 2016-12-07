<?php

/**
 * Constantes.class [ HELPER ]
 * Classe responável por manipular e validade dados do sistema!
 *
 * @copyright (c) 2016, Leo Bessa
 */

class  Constantes
{
	const CO_AUDITORIA = 'co_auditoria';
	const NO_TABELA = 'no_tabela';
	const DT_REALIZADO = 'dt_realizado';
	const NO_OPERACAO = 'no_operacao';
	const DS_ITEM_ANTERIOR = 'ds_item_anterior';
	const DS_ITEM_ATUAL = 'ds_item_atual';
	const CO_REGISTRO = 'co_registro';
	const DS_PERFIL_USUARIO = 'ds_perfil_usuario';
	const CO_USUARIO = 'co_usuario';
	const CO_CLIENTE_SISTEMA = 'co_cliente_sistema';
	const CO_CATEGORIA = 'co_categoria';
	const NO_CATEGORIA = 'no_categoria';
	const NU_LUCRO = 'nu_lucro';
	const ST_STATUS = 'st_status';
	const CO_TIPO_CATEGORIA = 'co_tipo_categoria';
	const CO_CLIENTE = 'co_cliente';
	const DS_OBSERVACAO = 'ds_observacao';
	const CO_PESSOA = 'co_pessoa';
	const DT_CADASTRO = 'dt_cadastro';
	const CO_EMPRESA = 'co_empresa';
	const CO_CONTATO = 'co_contato';
	const NU_TEL1 = 'nu_tel1';
	const NU_TEL2 = 'nu_tel2';
	const NU_TEL3 = 'nu_tel3';
	const NU_TEL4 = 'nu_tel4';
	const DS_EMAIL = 'ds_email';
	const DS_SITE = 'ds_site';
	const NO_EMPRESA = 'no_empresa';
	const NO_FANTASIA = 'no_fantasia';
	const NU_CNPJ = 'nu_cnpj';
	const NU_INSC_ESTADUAL = 'nu_insc_estadual';
	const CO_ENDERECO = 'co_endereco';
	const DS_ENDERECO = 'ds_endereco';
	const DS_COMPLEMENTO = 'ds_complemento';
	const DS_BAIRRO = 'ds_bairro';
	const NU_CEP = 'nu_cep';
	const NO_CIDADE = 'no_cidade';
	const SG_UF = 'sg_uf';
	const CO_FINANCEIRO = 'co_financeiro';
	const NU_PARCELA = 'nu_parcela';
	const NU_VALOR_PARCELA = 'nu_valor_parcela';
	const NU_VALOR_PARCELA_PAGO = 'nu_valor_parcela_pago';
	const DT_VENCIMENTO = 'dt_vencimento';
	const DT_VENCIMENTO_PAGO = 'dt_vencimento_pago';
	const CO_FORNECEDOR = 'co_fornecedor';
	const CO_REPRESENTANTE = 'co_representante';
	const CO_FUNCIONALIDADE = 'co_funcionalidade';
	const NO_FUNCIONALIDADE = 'no_funcionalidade';
	const DS_ROTA = 'ds_rota';
	const CO_FUNCIONARIO = 'co_funcionario';
	const DS_CARGO = 'ds_cargo';
	const DT_ADMISSAO = 'dt_admissao';
	const DT_DEMISSAO = 'dt_demissao';
	const NU_CARTEIRA = 'nu_carteira';
	const NU_SALARIO = 'nu_salario';
	const NU_HORAS = 'nu_horas';
	const CO_IMAGEM = 'co_imagem';
	const DS_CAMINHO = 'ds_caminho';
	const CO_NEGOCIACAO = 'co_negociacao';
	const CO_TIPO_NEGOCIACAO = 'co_tipo_negociacao';
	const CO_NEGOCIACAO_PRODUTO = 'co_negociacao_produto';
	const CO_PRODUTO = 'co_produto';
	const NU_QUANTIDADE = 'nu_quantidade';
	const CO_PAGAMENTO = 'co_pagamento';
	const NU_TOTAL = 'nu_total';
	const NU_VALOR_PAGO = 'nu_valor_pago';
	const NU_PARCELAS = 'nu_parcelas';
	const TP_SITUACAO = 'tp_situacao';
	const CO_TIPO_PAGAMENTO = 'co_tipo_pagamento';
	const CO_PARCELAMENTO = 'co_parcelamento';
	const CO_PERFIL = 'co_perfil';
	const NO_PERFIL = 'no_perfil';
	const CO_PERFIL_FUNCIONALIDADE = 'co_perfil_funcionalidade';
	const CO_PERFIL_PRODUTO_DETALHE = 'co_perfil_produto_detalhe';
	const CO_PRODUTO_DETALHE = 'co_produto_detalhe';
	const NU_DESCONTO = 'nu_desconto';
	const NU_CPF = 'nu_cpf';
	const NO_PESSOA = 'no_pessoa';
	const NU_RG = 'nu_rg';
	const DT_NASCIMENTO = 'dt_nascimento';
	const ST_SEXO = 'st_sexo';
	const ST_ESTADO_CIVIL = 'st_estado_civil';
	const NO_PRODUTO = 'no_produto';
	const NU_ESTOQUE = 'nu_estoque';
	const NU_CODIGO = 'nu_codigo';
	const DS_MARCA = 'ds_marca';
	const CO_UNIDADE_VENDA = 'co_unidade_venda';
	const NU_ESTOQUE_BAIXO = 'nu_estoque_baixo';
	const NU_PRECO = 'nu_preco';
	const NU_DESCONTO_MAXIMO = 'nu_desconto_maximo';
	const CO_PRODUTO_PROMOCAO = 'co_produto_promocao';
	const NU_PRECO_PROMOCIONAL = 'nu_preco_promocional';
	const DT_INICIO = 'dt_inicio';
	const DT_FIM = 'dt_fim';
	const NU_QUANTIDADE_MINIMA = 'nu_quantidade_minima';
	const NU_LIMITE = 'nu_limite';
	const DS_TIPO_CATEGORIA = 'ds_tipo_categoria';
	const NO_TIPO_NEGOCIACAO = 'no_tipo_negociacao';
	const SG_TIPO_NEGOCIACAO = 'sg_tipo_negociacao';
	const DS_TIPO_PAGAMENTO = 'ds_tipo_pagamento';
	const SG_TIPO_PAGAMENTO = 'sg_tipo_pagamento';
	const NO_UNIDADE_VENDA = 'no_unidade_venda';
	const SG_UNIDADE_VENDA = 'sg_unidade_venda';
	const DS_LOGIN = 'ds_login';
	const DS_SENHA = 'ds_senha';
	const DS_CODE = 'ds_code';
	const CO_USUARIO_PERFIL = 'co_usuario_perfil';
	const CO_ACESSO = 'co_acesso';
	const DS_SESSION_ID = 'ds_session_id';
	const DT_INICIO_ACESSO = 'dt_inicio_acesso';
	const DT_FIM_ACESSO = 'dt_fim_acesso';

}