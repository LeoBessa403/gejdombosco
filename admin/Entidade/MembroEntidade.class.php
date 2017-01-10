<?php

/**
 * Membro.Entidade [ ENTIDADE ]
 * @copyright (c) 2016, Leo Bessa
 */

class MembroEntidade
{
	const TABELA = 'TB_MEMBRO';
	const ENTIDADE = 'MembroEntidade';
	const CHAVE = Constantes::CO_MEMBRO;

	private $co_membro;
	private $no_responsavel;
	private $st_estuda;
	private $st_trabalha;
	private $ds_conhecimento;
	private $st_status;
	private $st_batizado;
	private $st_eucaristia;
	private $st_crisma;
	private $co_pessoa;


	/**
     * @return $campos
     */
	public static function getCampos() {
    	$campos = [
			Constantes::CO_MEMBRO,
			Constantes::NO_RESPONSAVEL,
			Constantes::ST_ESTUDA,
			Constantes::ST_TRABALHA,
			Constantes::DS_CONHECIMENTO,
			Constantes::ST_STATUS,
			Constantes::ST_BATIZADO,
			Constantes::ST_EUCARISTIA,
			Constantes::ST_CRISMA,
			Constantes::CO_PESSOA,
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
     * @return $co_membro
     */
	public function getCoMembro()
    {
        return $this->co_membro;
    }

	/**
     * @param mixed $co_membro
     */
	public function setCoMembro($co_membro)
    {
        return $this->co_membro = $co_membro;
    }

	/**
     * @return $no_responsavel
     */
	public function getNoResponsavel()
    {
        return $this->no_responsavel;
    }

	/**
     * @param mixed $no_responsavel
     */
	public function setNoResponsavel($no_responsavel)
    {
        return $this->no_responsavel = $no_responsavel;
    }

	/**
     * @return $st_estuda
     */
	public function getStEstuda()
    {
        return $this->st_estuda;
    }

	/**
     * @param mixed $st_estuda
     */
	public function setStEstuda($st_estuda)
    {
        return $this->st_estuda = $st_estuda;
    }

	/**
     * @return $st_trabalha
     */
	public function getStTrabalha()
    {
        return $this->st_trabalha;
    }

	/**
     * @param mixed $st_trabalha
     */
	public function setStTrabalha($st_trabalha)
    {
        return $this->st_trabalha = $st_trabalha;
    }

	/**
     * @return $ds_conhecimento
     */
	public function getDsConhecimento()
    {
        return $this->ds_conhecimento;
    }

	/**
     * @param mixed $ds_conhecimento
     */
	public function setDsConhecimento($ds_conhecimento)
    {
        return $this->ds_conhecimento = $ds_conhecimento;
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
     * @return $st_batizado
     */
	public function getStBatizado()
    {
        return $this->st_batizado;
    }

	/**
     * @param mixed $st_batizado
     */
	public function setStBatizado($st_batizado)
    {
        return $this->st_batizado = $st_batizado;
    }

	/**
     * @return $st_eucaristia
     */
	public function getStEucaristia()
    {
        return $this->st_eucaristia;
    }

	/**
     * @param mixed $st_eucaristia
     */
	public function setStEucaristia($st_eucaristia)
    {
        return $this->st_eucaristia = $st_eucaristia;
    }

	/**
     * @return $st_crisma
     */
	public function getStCrisma()
    {
        return $this->st_crisma;
    }

	/**
     * @param mixed $st_crisma
     */
	public function setStCrisma($st_crisma)
    {
        return $this->st_crisma = $st_crisma;
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