<?php

/**
 * Empresa.Entidade [ ENTIDADE ]
 * @copyright (c) 2016, Leo Bessa
 */

class EmpresaEntidade
{
	const TABELA = 'tb_empresa';
	const ENTIDADE = 'EmpresaEntidade';
	const CHAVE = Constantes::CO_EMPRESA;

	private $co_empresa;
	private $no_empresa;
	private $no_fantasia;
	private $dt_cadastro;
	private $nu_cnpj;
	private $nu_insc_estadual;
	private $ds_observacao;
	private $st_status;
	private $co_contato;
	private $co_pessoa;
	private $co_endereco;
	private $co_cliente_sistema;


	/**
     * @return $campos
     */
	public static function getCampos() {
    	$campos = [
			Constantes::CO_EMPRESA,
			Constantes::NO_EMPRESA,
			Constantes::NO_FANTASIA,
			Constantes::DT_CADASTRO,
			Constantes::NU_CNPJ,
			Constantes::NU_INSC_ESTADUAL,
			Constantes::DS_OBSERVACAO,
			Constantes::ST_STATUS,
			Constantes::CO_CONTATO,
			Constantes::CO_PESSOA,
			Constantes::CO_ENDERECO,
		];
    	return $campos;
    }

	/**
     * @return $relacionamentos
     */
	public static function getRelacionamentos() {
    	$relacionamentos = [
			Constantes::CO_CONTATO => array(
                'Entidade' => ContatoEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_PESSOA => array(
                'Entidade' => PessoaEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_ENDERECO => array(
                'Entidade' => EnderecoEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_CLIENTE_SISTEMA => array(
                'Entidade' => ClienteSistemaEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
		];
    	return $relacionamentos;
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
     * @return $no_empresa
     */
	public function getNoEmpresa()
    {
        return $this->no_empresa;
    }

	/**
     * @param mixed $no_empresa
     */
	public function setNoEmpresa($no_empresa)
    {
        return $this->no_empresa = $no_empresa;
    }

	/**
     * @return $no_fantasia
     */
	public function getNoFantasia()
    {
        return $this->no_fantasia;
    }

	/**
     * @param mixed $no_fantasia
     */
	public function setNoFantasia($no_fantasia)
    {
        return $this->no_fantasia = $no_fantasia;
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
     * @return $nu_cnpj
     */
	public function getNuCnpj()
    {
        return $this->nu_cnpj;
    }

	/**
     * @param mixed $nu_cnpj
     */
	public function setNuCnpj($nu_cnpj)
    {
        return $this->nu_cnpj = $nu_cnpj;
    }

	/**
     * @return $nu_insc_estadual
     */
	public function getNuInscEstadual()
    {
        return $this->nu_insc_estadual;
    }

	/**
     * @param mixed $nu_insc_estadual
     */
	public function setNuInscEstadual($nu_insc_estadual)
    {
        return $this->nu_insc_estadual = $nu_insc_estadual;
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
     * @return $co_contato
     */
	public function getCoContato()
    {
        return $this->co_contato;
    }

	/**
     * @param mixed $co_contato
     */
	public function setCoContato($co_contato)
    {
        return $this->co_contato = $co_contato;
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
     * @return $co_endereco
     */
	public function getCoEndereco()
    {
        return $this->co_endereco;
    }

	/**
     * @param mixed $co_endereco
     */
	public function setCoEndereco($co_endereco)
    {
        return $this->co_endereco = $co_endereco;
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

}