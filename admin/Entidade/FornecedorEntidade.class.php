<?php

/**
 * Fornecedor.Entidade [ ENTIDADE ]
 * @copyright (c) 2016, Leo Bessa
 */

class FornecedorEntidade
{
	const TABELA = 'tb_fornecedor';
	const ENTIDADE = 'FornecedorEntidade';
	const CHAVE = Constantes::CO_FORNECEDOR;

	private $co_fornecedor;
	private $ds_observacao;
	private $dt_cadastro;
	private $st_status;
	private $co_representante;
	private $co_cliente_sistema;
	private $co_pessoa;
	private $co_empresa;
	private $co_negociacao;


	/**
     * @return $campos
     */
	public static function getCampos() {
    	$campos = [
			Constantes::CO_FORNECEDOR,
			Constantes::DS_OBSERVACAO,
			Constantes::DT_CADASTRO,
			Constantes::ST_STATUS,
			Constantes::CO_REPRESENTANTE,
			Constantes::CO_CLIENTE_SISTEMA,
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
			Constantes::CO_REPRESENTANTE => array(
                'Entidade' => RepresentanteEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_CLIENTE_SISTEMA => array(
                'Entidade' => ClienteSistemaEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_PESSOA => array(
                'Entidade' => PessoaEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_EMPRESA => array(
                'Entidade' => EmpresaEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_NEGOCIACAO => array(
                'Entidade' => NegociacaoEntidade::ENTIDADE,
                'Tipo' => 'N',
            ),
		];
    	return $relacionamentos;
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

}