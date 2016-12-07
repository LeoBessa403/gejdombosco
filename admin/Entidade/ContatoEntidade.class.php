<?php

/**
 * Contato.Entidade [ ENTIDADE ]
 * @copyright (c) 2016, Leo Bessa
 */

class ContatoEntidade
{
	const TABELA = 'tb_contato';
	const ENTIDADE = 'ContatoEntidade';
	const CHAVE = Constantes::CO_CONTATO;

	private $co_contato;
	private $nu_tel1;
	private $nu_tel2;
	private $nu_tel3;
	private $nu_tel4;
	private $ds_email;
	private $ds_site;
	private $co_empresa;
	private $co_pessoa;


	/**
     * @return $campos
     */
	public static function getCampos() {
    	$campos = [
			Constantes::CO_CONTATO,
			Constantes::NU_TEL1,
			Constantes::NU_TEL2,
			Constantes::NU_TEL3,
			Constantes::NU_TEL4,
			Constantes::DS_EMAIL,
			Constantes::DS_SITE,
		];
    	return $campos;
    }

	/**
     * @return $relacionamentos
     */
	public static function getRelacionamentos() {
    	$relacionamentos = [
			Constantes::CO_EMPRESA => array(
                'Entidade' => EmpresaEntidade::ENTIDADE,
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
     * @return $nu_tel1
     */
	public function getNuTel1()
    {
        return $this->nu_tel1;
    }

	/**
     * @param mixed $nu_tel1
     */
	public function setNuTel1($nu_tel1)
    {
        return $this->nu_tel1 = $nu_tel1;
    }

	/**
     * @return $nu_tel2
     */
	public function getNuTel2()
    {
        return $this->nu_tel2;
    }

	/**
     * @param mixed $nu_tel2
     */
	public function setNuTel2($nu_tel2)
    {
        return $this->nu_tel2 = $nu_tel2;
    }

	/**
     * @return $nu_tel3
     */
	public function getNuTel3()
    {
        return $this->nu_tel3;
    }

	/**
     * @param mixed $nu_tel3
     */
	public function setNuTel3($nu_tel3)
    {
        return $this->nu_tel3 = $nu_tel3;
    }

	/**
     * @return $nu_tel4
     */
	public function getNuTel4()
    {
        return $this->nu_tel4;
    }

	/**
     * @param mixed $nu_tel4
     */
	public function setNuTel4($nu_tel4)
    {
        return $this->nu_tel4 = $nu_tel4;
    }

	/**
     * @return $ds_email
     */
	public function getDsEmail()
    {
        return $this->ds_email;
    }

	/**
     * @param mixed $ds_email
     */
	public function setDsEmail($ds_email)
    {
        return $this->ds_email = $ds_email;
    }

	/**
     * @return $ds_site
     */
	public function getDsSite()
    {
        return $this->ds_site;
    }

	/**
     * @param mixed $ds_site
     */
	public function setDsSite($ds_site)
    {
        return $this->ds_site = $ds_site;
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