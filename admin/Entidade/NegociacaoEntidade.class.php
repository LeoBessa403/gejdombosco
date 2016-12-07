<?php

/**
 * Negociacao.Entidade [ ENTIDADE ]
 * @copyright (c) 2016, Leo Bessa
 */

class NegociacaoEntidade
{
	const TABELA = 'tb_negociacao';
	const ENTIDADE = 'NegociacaoEntidade';
	const CHAVE = Constantes::CO_NEGOCIACAO;

	private $co_negociacao;
	private $dt_cadastro;
	private $ds_observacao;
	private $co_cliente;
	private $co_fornecedor;
	private $co_usuario;
	private $co_tipo_negociacao;
	private $co_cliente_sistema;
	private $co_negociacao_produto;
	private $co_pagamento;


	/**
     * @return $campos
     */
	public static function getCampos() {
    	$campos = [
			Constantes::CO_NEGOCIACAO,
			Constantes::DT_CADASTRO,
			Constantes::DS_OBSERVACAO,
			Constantes::CO_CLIENTE,
			Constantes::CO_FORNECEDOR,
			Constantes::CO_USUARIO,
			Constantes::CO_TIPO_NEGOCIACAO,
			Constantes::CO_CLIENTE_SISTEMA,
		];
    	return $campos;
    }

	/**
     * @return $relacionamentos
     */
	public static function getRelacionamentos() {
    	$relacionamentos = [
			Constantes::CO_CLIENTE => array(
                'Entidade' => ClienteEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_FORNECEDOR => array(
                'Entidade' => FornecedorEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_USUARIO => array(
                'Entidade' => UsuarioEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_TIPO_NEGOCIACAO => array(
                'Entidade' => TipoNegociacaoEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_CLIENTE_SISTEMA => array(
                'Entidade' => ClienteSistemaEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_NEGOCIACAO_PRODUTO => array(
                'Entidade' => NegociacaoProdutoEntidade::ENTIDADE,
                'Tipo' => 'N',
            ),
			Constantes::CO_PAGAMENTO => array(
                'Entidade' => PagamentoEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
		];
    	return $relacionamentos;
    }


	/**
     * @return $co_negociacao
     */
	public function getCoNegociacao()
    {
        return $this->co_negociacao;
    }

	/**
     * @param mixed $co_negociacao
     */
	public function setCoNegociacao($co_negociacao)
    {
        return $this->co_negociacao = $co_negociacao;
    }

	/**
     * @return $dt_cadastro
     */
	public function getDtCadastro()
    {
        return $this->dt_cadastro;
    }

	/**
     * @param mixed $dt_cadastro
     */
	public function setDtCadastro($dt_cadastro)
    {
        return $this->dt_cadastro = $dt_cadastro;
    }

	/**
     * @return $ds_observacao
     */
	public function getDsObservacao()
    {
        return $this->ds_observacao;
    }

	/**
     * @param mixed $ds_observacao
     */
	public function setDsObservacao($ds_observacao)
    {
        return $this->ds_observacao = $ds_observacao;
    }

	/**
     * @return $co_cliente
     */
	public function getCoCliente()
    {
        return $this->co_cliente;
    }

	/**
     * @param mixed $co_cliente
     */
	public function setCoCliente($co_cliente)
    {
        return $this->co_cliente = $co_cliente;
    }

	/**
     * @return $co_fornecedor
     */
	public function getCoFornecedor()
    {
        return $this->co_fornecedor;
    }

	/**
     * @param mixed $co_fornecedor
     */
	public function setCoFornecedor($co_fornecedor)
    {
        return $this->co_fornecedor = $co_fornecedor;
    }

	/**
     * @return $co_usuario
     */
	public function getCoUsuario()
    {
        return $this->co_usuario;
    }

	/**
     * @param mixed $co_usuario
     */
	public function setCoUsuario($co_usuario)
    {
        return $this->co_usuario = $co_usuario;
    }

	/**
     * @return $co_tipo_negociacao
     */
	public function getCoTipoNegociacao()
    {
        return $this->co_tipo_negociacao;
    }

	/**
     * @param mixed $co_tipo_negociacao
     */
	public function setCoTipoNegociacao($co_tipo_negociacao)
    {
        return $this->co_tipo_negociacao = $co_tipo_negociacao;
    }

	/**
     * @return $co_cliente_sistema
     */
	public function getCoClienteSistema()
    {
        return $this->co_cliente_sistema;
    }

	/**
     * @param mixed $co_cliente_sistema
     */
	public function setCoClienteSistema($co_cliente_sistema)
    {
        return $this->co_cliente_sistema = $co_cliente_sistema;
    }

	/**
     * @return $co_negociacao_produto
     */
	public function getCoNegociacaoProduto()
    {
        return $this->co_negociacao_produto;
    }

	/**
     * @param mixed $co_negociacao_produto
     */
	public function setCoNegociacaoProduto($co_negociacao_produto)
    {
        return $this->co_negociacao_produto = $co_negociacao_produto;
    }

	/**
     * @return $co_pagamento
     */
	public function getCoPagamento()
    {
        return $this->co_pagamento;
    }

	/**
     * @param mixed $co_pagamento
     */
	public function setCoPagamento($co_pagamento)
    {
        return $this->co_pagamento = $co_pagamento;
    }

}