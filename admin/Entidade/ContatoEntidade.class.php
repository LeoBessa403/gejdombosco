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
	private $ds_email;
	private $TB_CONTATO;
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
			Constantes::DS_EMAIL,
			Constantes::TB_CONTATO,
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
     * @return $TB_CONTATO
     */
	public function getTBCONTATO()
    {
        return $this->TB_CONTATO;
    }

	/**
     * @param mixed $TB_CONTATO
     */
	public function setTBCONTATO($TB_CONTATO)
    {
        return $this->TB_CONTATO = $TB_CONTATO;
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