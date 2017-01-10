<?php

/**
 * Evento.Entidade [ ENTIDADE ]
 * @copyright (c) 2016, Leo Bessa
 */

class EventoEntidade
{
	const TABELA = 'TB_EVENTO';
	const ENTIDADE = 'EventoEntidade';
	const CHAVE = Constantes::CO_EVENTO;

	private $co_evento;
	private $no_evento;
	private $ds_conteudo;
	private $ds_palavras_chaves;
	private $dt_cadastro;
	private $dt_realizado;
	private $ds_local;


	/**
     * @return $campos
     */
	public static function getCampos() {
    	$campos = [
			Constantes::CO_EVENTO,
			Constantes::NO_EVENTO,
			Constantes::DS_CONTEUDO,
			Constantes::DS_PALAVRAS_CHAVES,
			Constantes::DT_CADASTRO,
			Constantes::DT_REALIZADO,
			Constantes::DS_LOCAL,
		];
    	return $campos;
    }

	/**
     * @return $relacionamentos
     */
	public static function getRelacionamentos() {
    	$relacionamentos = [
		];
    	return $relacionamentos;
    }


	/**
     * @return $co_evento
     */
	public function getCoEvento()
    {
        return $this->co_evento;
    }

	/**
     * @param mixed $co_evento
     */
	public function setCoEvento($co_evento)
    {
        return $this->co_evento = $co_evento;
    }

	/**
     * @return $no_evento
     */
	public function getNoEvento()
    {
        return $this->no_evento;
    }

	/**
     * @param mixed $no_evento
     */
	public function setNoEvento($no_evento)
    {
        return $this->no_evento = $no_evento;
    }

	/**
     * @return $ds_conteudo
     */
	public function getDsConteudo()
    {
        return $this->ds_conteudo;
    }

	/**
     * @param mixed $ds_conteudo
     */
	public function setDsConteudo($ds_conteudo)
    {
        return $this->ds_conteudo = $ds_conteudo;
    }

	/**
     * @return $ds_palavras_chaves
     */
	public function getDsPalavrasChaves()
    {
        return $this->ds_palavras_chaves;
    }

	/**
     * @param mixed $ds_palavras_chaves
     */
	public function setDsPalavrasChaves($ds_palavras_chaves)
    {
        return $this->ds_palavras_chaves = $ds_palavras_chaves;
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
     * @return $dt_realizado
     */
	public function getDtRealizado()
    {
        return $this->dt_realizado;
    }

	/**
     * @param mixed $dt_realizado
     */
	public function setDtRealizado($dt_realizado)
    {
        return $this->dt_realizado = $dt_realizado;
    }

	/**
     * @return $ds_local
     */
	public function getDsLocal()
    {
        return $this->ds_local;
    }

	/**
     * @param mixed $ds_local
     */
	public function setDsLocal($ds_local)
    {
        return $this->ds_local = $ds_local;
    }

}