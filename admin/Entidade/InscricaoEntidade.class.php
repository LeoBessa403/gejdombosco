<?php

/**
 * Inscricao.Entidade [ ENTIDADE ]
 * @copyright (c) 2016, Leo Bessa
 */

class InscricaoEntidade
{
	const TABELA = 'TB_INSCRICAO';
	const ENTIDADE = 'InscricaoEntidade';
	const CHAVE = Constantes::CO_INSCRICAO;

	private $co_inscricao;
	private $ds_pastoral;
	private $ds_retiro;
	private $ds_membro_ativo;
	private $ds_situacao_atual_grupo;
	private $co_evento;
	private $nu_camisa;
	private $no_responsavel;
	private $nu_tel_responsavel;
	private $ds_descricao;
	private $co_pessoa;
	private $co_pagamento;


	/**
     * @return $campos
     */
	public static function getCampos() {
    	$campos = [
			Constantes::CO_INSCRICAO,
			Constantes::DS_PASTORAL,
			Constantes::DS_RETIRO,
			Constantes::DS_MEMBRO_ATIVO,
			Constantes::DS_SITUACAO_ATUAL_GRUPO,
			Constantes::CO_EVENTO,
			Constantes::NU_CAMISA,
			Constantes::NO_RESPONSAVEL,
			Constantes::NU_TEL_RESPONSAVEL,
			Constantes::DS_DESCRICAO,
			Constantes::CO_PESSOA,
		];
    	return $campos;
    }

	/**
     * @return $relacionamentos
     */
	public static function getRelacionamentos() {
    	$relacionamentos = [
			Constantes::CO_EVENTO => array(
                'Entidade' => EventoEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_PESSOA => array(
                'Entidade' => PessoaEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_PAGAMENTO => array(
                'Entidade' => PagamentoEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
		];
    	return $relacionamentos;
    }


	/**
     * @return $co_inscricao
     */
	public function getCoInscricao()
    {
        return $this->co_inscricao;
    }

	/**
     * @param mixed $co_inscricao
     */
	public function setCoInscricao($co_inscricao)
    {
        return $this->co_inscricao = $co_inscricao;
    }

	/**
     * @return $ds_pastoral
     */
	public function getDsPastoral()
    {
        return $this->ds_pastoral;
    }

	/**
     * @param mixed $ds_pastoral
     */
	public function setDsPastoral($ds_pastoral)
    {
        return $this->ds_pastoral = $ds_pastoral;
    }

	/**
     * @return $ds_retiro
     */
	public function getDsRetiro()
    {
        return $this->ds_retiro;
    }

	/**
     * @param mixed $ds_retiro
     */
	public function setDsRetiro($ds_retiro)
    {
        return $this->ds_retiro = $ds_retiro;
    }

	/**
     * @return $ds_membro_ativo
     */
	public function getDsMembroAtivo()
    {
        return $this->ds_membro_ativo;
    }

	/**
     * @param mixed $ds_membro_ativo
     */
	public function setDsMembroAtivo($ds_membro_ativo)
    {
        return $this->ds_membro_ativo = $ds_membro_ativo;
    }

	/**
     * @return $ds_situacao_atual_grupo
     */
	public function getDsSituacaoAtualGrupo()
    {
        return $this->ds_situacao_atual_grupo;
    }

	/**
     * @param mixed $ds_situacao_atual_grupo
     */
	public function setDsSituacaoAtualGrupo($ds_situacao_atual_grupo)
    {
        return $this->ds_situacao_atual_grupo = $ds_situacao_atual_grupo;
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
     * @return $nu_camisa
     */
	public function getNuCamisa()
    {
        return $this->nu_camisa;
    }

	/**
     * @param mixed $nu_camisa
     */
	public function setNuCamisa($nu_camisa)
    {
        return $this->nu_camisa = $nu_camisa;
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
     * @return $nu_tel_responsavel
     */
	public function getNuTelResponsavel()
    {
        return $this->nu_tel_responsavel;
    }

	/**
     * @param mixed $nu_tel_responsavel
     */
	public function setNuTelResponsavel($nu_tel_responsavel)
    {
        return $this->nu_tel_responsavel = $nu_tel_responsavel;
    }

	/**
     * @return $ds_descricao
     */
	public function getDsDescricao()
    {
        return $this->ds_descricao;
    }

	/**
     * @param mixed $ds_descricao
     */
	public function setDsDescricao($ds_descricao)
    {
        return $this->ds_descricao = $ds_descricao;
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