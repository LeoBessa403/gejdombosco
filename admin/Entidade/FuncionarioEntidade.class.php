<?php

/**
 * Funcionario.Entidade [ ENTIDADE ]
 * @copyright (c) 2016, Leo Bessa
 */

class FuncionarioEntidade
{
	const TABELA = 'tb_funcionario';
	const ENTIDADE = 'FuncionarioEntidade';
	const CHAVE = Constantes::CO_FUNCIONARIO;

	private $co_funcionario;
	private $ds_cargo;
	private $dt_admissao;
	private $dt_demissao;
	private $dt_cadastro;
	private $nu_carteira;
	private $nu_salario;
	private $nu_horas;
	private $st_status;
	private $co_imagem;
	private $co_cliente_sistema;
	private $co_pessoa;


	/**
     * @return $campos
     */
	public static function getCampos() {
    	$campos = [
			Constantes::CO_FUNCIONARIO,
			Constantes::DS_CARGO,
			Constantes::DT_ADMISSAO,
			Constantes::DT_DEMISSAO,
			Constantes::DT_CADASTRO,
			Constantes::NU_CARTEIRA,
			Constantes::NU_SALARIO,
			Constantes::NU_HORAS,
			Constantes::ST_STATUS,
			Constantes::CO_IMAGEM,
			Constantes::CO_CLIENTE_SISTEMA,
			Constantes::CO_PESSOA,
		];
    	return $campos;
    }

	/**
     * @return $relacionamentos
     */
	public static function getRelacionamentos() {
    	$relacionamentos = [
			Constantes::CO_IMAGEM => array(
                'Entidade' => ImagemEntidade::ENTIDADE,
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
		];
    	return $relacionamentos;
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
     * @return $ds_cargo
     */
	public function getDsCargo()
    {
        return $this->ds_cargo;
    }

	/**
     * @param mixed $ds_cargo
     */
	public function setDsCargo($ds_cargo)
    {
        return $this->ds_cargo = $ds_cargo;
    }

	/**
     * @return $dt_admissao
     */
	public function getDtAdmissao()
    {
        return $this->dt_admissao;
    }

	/**
     * @param mixed $dt_admissao
     */
	public function setDtAdmissao($dt_admissao)
    {
        return $this->dt_admissao = $dt_admissao;
    }

	/**
     * @return $dt_demissao
     */
	public function getDtDemissao()
    {
        return $this->dt_demissao;
    }

	/**
     * @param mixed $dt_demissao
     */
	public function setDtDemissao($dt_demissao)
    {
        return $this->dt_demissao = $dt_demissao;
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
     * @return $nu_carteira
     */
	public function getNuCarteira()
    {
        return $this->nu_carteira;
    }

	/**
     * @param mixed $nu_carteira
     */
	public function setNuCarteira($nu_carteira)
    {
        return $this->nu_carteira = $nu_carteira;
    }

	/**
     * @return $nu_salario
     */
	public function getNuSalario()
    {
        return $this->nu_salario;
    }

	/**
     * @param mixed $nu_salario
     */
	public function setNuSalario($nu_salario)
    {
        return $this->nu_salario = $nu_salario;
    }

	/**
     * @return $nu_horas
     */
	public function getNuHoras()
    {
        return $this->nu_horas;
    }

	/**
     * @param mixed $nu_horas
     */
	public function setNuHoras($nu_horas)
    {
        return $this->nu_horas = $nu_horas;
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
     * @return $co_imagem
     */
	public function getCoImagem()
    {
        return $this->co_imagem;
    }

	/**
     * @param mixed $co_imagem
     */
	public function setCoImagem($co_imagem)
    {
        return $this->co_imagem = $co_imagem;
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

}