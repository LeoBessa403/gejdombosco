<?php

/**
 * Pagamento.Entidade [ ENTIDADE ]
 * @copyright (c) 2016, Leo Bessa
 */

class PagamentoEntidade
{
	const TABELA = 'TB_PAGAMENTO';
	const ENTIDADE = 'PagamentoEntidade';
	const CHAVE = Constantes::CO_PAGAMENTO;

	private $co_pagamento;
	private $nu_total;
	private $nu_valor_pago;
	private $nu_parcelas;
	private $tp_situacao;
	private $ds_observacao;
	private $co_inscricao;
	private $co_tipo_pagamento;
	private $co_parcelamento;


	/**
     * @return $campos
     */
	public static function getCampos() {
    	$campos = [
			Constantes::CO_PAGAMENTO,
			Constantes::NU_TOTAL,
			Constantes::NU_VALOR_PAGO,
			Constantes::NU_PARCELAS,
			Constantes::TP_SITUACAO,
			Constantes::DS_OBSERVACAO,
			Constantes::CO_INSCRICAO,
			Constantes::CO_TIPO_PAGAMENTO,
		];
    	return $campos;
    }

	/**
     * @return $relacionamentos
     */
	public static function getRelacionamentos() {
    	$relacionamentos = [
			Constantes::CO_INSCRICAO => array(
                'Entidade' => InscricaoEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_PARCELAMENTO => array(
                'Entidade' => ParcelamentoEntidade::ENTIDADE,
                'Tipo' => 'N',
            ),
		];
    	return $relacionamentos;
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

	/**
     * @return $nu_total
     */
	public function getNuTotal()
    {
        return $this->nu_total;
    }

	/**
     * @param mixed $nu_total
     */
	public function setNuTotal($nu_total)
    {
        return $this->nu_total = $nu_total;
    }

	/**
     * @return $nu_valor_pago
     */
	public function getNuValorPago()
    {
        return $this->nu_valor_pago;
    }

	/**
     * @param mixed $nu_valor_pago
     */
	public function setNuValorPago($nu_valor_pago)
    {
        return $this->nu_valor_pago = $nu_valor_pago;
    }

	/**
     * @return $nu_parcelas
     */
	public function getNuParcelas()
    {
        return $this->nu_parcelas;
    }

	/**
     * @param mixed $nu_parcelas
     */
	public function setNuParcelas($nu_parcelas)
    {
        return $this->nu_parcelas = $nu_parcelas;
    }

	/**
     * @return $tp_situacao
     */
	public function getTpSituacao()
    {
        return $this->tp_situacao;
    }

	/**
     * @param mixed $tp_situacao
     */
	public function setTpSituacao($tp_situacao)
    {
        return $this->tp_situacao = $tp_situacao;
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
     * @return $co_tipo_pagamento
     */
	public function getCoTipoPagamento()
    {
        return $this->co_tipo_pagamento;
    }

	/**
     * @param mixed $co_tipo_pagamento
     */
	public function setCoTipoPagamento($co_tipo_pagamento)
    {
        return $this->co_tipo_pagamento = $co_tipo_pagamento;
    }

	/**
     * @return $co_parcelamento
     */
	public function getCoParcelamento()
    {
        return $this->co_parcelamento;
    }

	/**
     * @param mixed $co_parcelamento
     */
	public function setCoParcelamento($co_parcelamento)
    {
        return $this->co_parcelamento = $co_parcelamento;
    }

}