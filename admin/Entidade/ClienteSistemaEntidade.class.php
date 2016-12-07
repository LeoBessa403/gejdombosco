<?php

/**
 * ClienteSistema.Entidade [ ENTIDADE ]
 * @copyright (c) 2016, Leo Bessa
 */

class ClienteSistemaEntidade
{
	const TABELA = 'tb_cliente_sistema';
	const ENTIDADE = 'ClienteSistemaEntidade';
	const CHAVE = Constantes::CO_CLIENTE_SISTEMA;

	private $co_cliente_sistema;
	private $dt_cadastro;
	private $ds_observacao;
	private $st_status;
	private $co_pessoa;
	private $co_empresa;
	private $co_cliente;
	private $co_financeiro;
	private $co_fornecedor;
	private $co_funcionario;
	private $co_negociacao;
	private $co_produto;
	private $co_representante;
	private $co_unidade_venda;


	/**
     * @return $campos
     */
	public static function getCampos() {
    	$campos = [
			Constantes::CO_CLIENTE_SISTEMA,
			Constantes::DT_CADASTRO,
			Constantes::DS_OBSERVACAO,
			Constantes::ST_STATUS,
			Constantes::CO_PESSOA,
			Constantes::CO_EMPRESA,
		];
    	return $campos;
    }

	/**
     * @return $relacionamentos
     */
	public static function getRelacionamentos() {
    	$relacionamentos = [
			Constantes::CO_PESSOA => array(
                'Entidade' => PessoaEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_EMPRESA => array(
                'Entidade' => EmpresaEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_CLIENTE => array(
                'Entidade' => ClienteEntidade::ENTIDADE,
                'Tipo' => 'N',
            ),
			Constantes::CO_FINANCEIRO => array(
                'Entidade' => FinanceiroEntidade::ENTIDADE,
                'Tipo' => 'N',
            ),
			Constantes::CO_FORNECEDOR => array(
                'Entidade' => FornecedorEntidade::ENTIDADE,
                'Tipo' => 'N',
            ),
			Constantes::CO_FUNCIONARIO => array(
                'Entidade' => FuncionarioEntidade::ENTIDADE,
                'Tipo' => 'N',
            ),
			Constantes::CO_NEGOCIACAO => array(
                'Entidade' => NegociacaoEntidade::ENTIDADE,
                'Tipo' => 'N',
            ),
			Constantes::CO_PRODUTO => array(
                'Entidade' => ProdutoEntidade::ENTIDADE,
                'Tipo' => 'N',
            ),
			Constantes::CO_REPRESENTANTE => array(
                'Entidade' => RepresentanteEntidade::ENTIDADE,
                'Tipo' => 'N',
            ),
			Constantes::CO_UNIDADE_VENDA => array(
                'Entidade' => UnidadeVendaEntidade::ENTIDADE,
                'Tipo' => 'N',
            ),
		];
    	return $relacionamentos;
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
     * @return $st_status
     */
	public function getStStatus()
    {
        return $this->st_status;
    }

	/**
     * @param mixed $st_status
     */
	public function setStStatus($st_status)
    {
        return $this->st_status = $st_status;
    }

	/**
     * @return $co_pessoa
     */
	public function getCoPessoa()
    {
        return $this->co_pessoa;
    }

	/**
     * @param mixed $co_pessoa
     */
	public function setCoPessoa($co_pessoa)
    {
        return $this->co_pessoa = $co_pessoa;
    }

	/**
     * @return $co_empresa
     */
	public function getCoEmpresa()
    {
        return $this->co_empresa;
    }

	/**
     * @param mixed $co_empresa
     */
	public function setCoEmpresa($co_empresa)
    {
        return $this->co_empresa = $co_empresa;
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
     * @return $co_financeiro
     */
	public function getCoFinanceiro()
    {
        return $this->co_financeiro;
    }

	/**
     * @param mixed $co_financeiro
     */
	public function setCoFinanceiro($co_financeiro)
    {
        return $this->co_financeiro = $co_financeiro;
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
     * @return $co_funcionario
     */
	public function getCoFuncionario()
    {
        return $this->co_funcionario;
    }

	/**
     * @param mixed $co_funcionario
     */
	public function setCoFuncionario($co_funcionario)
    {
        return $this->co_funcionario = $co_funcionario;
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
     * @return $co_produto
     */
	public function getCoProduto()
    {
        return $this->co_produto;
    }

	/**
     * @param mixed $co_produto
     */
	public function setCoProduto($co_produto)
    {
        return $this->co_produto = $co_produto;
    }

	/**
     * @return $co_representante
     */
	public function getCoRepresentante()
    {
        return $this->co_representante;
    }

	/**
     * @param mixed $co_representante
     */
	public function setCoRepresentante($co_representante)
    {
        return $this->co_representante = $co_representante;
    }

	/**
     * @return $co_unidade_venda
     */
	public function getCoUnidadeVenda()
    {
        return $this->co_unidade_venda;
    }

	/**
     * @param mixed $co_unidade_venda
     */
	public function setCoUnidadeVenda($co_unidade_venda)
    {
        return $this->co_unidade_venda = $co_unidade_venda;
    }

}