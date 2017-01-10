<?php

/**
 * Parcelamento.Entidade [ ENTIDADE ]
 * @copyright (c) 2016, Leo Bessa
 */

class ParcelamentoEntidade
{
	const TABELA = 'TB_PARCELAMENTO';
	const ENTIDADE = 'ParcelamentoEntidade';
	const CHAVE = Constantes::CO_PARCELAMENTO;

	private $co_parcelamento;
	private $nu_parcela;
	private $nu_valor_parcela;
	private $nu_valor_parcela_pago;
	private $dt_vencimento;
	private $dt_vencimento_pago;
	private $ds_observacao;
	private $co_pagamento;


	/**
     * @return $campos
     */
	public static function getCampos() {
    	$campos = [
			Constantes::CO_PARCELAMENTO,
			Constantes::NU_PARCELA,
			Constantes::NU_VALOR_PARCELA,
			Constantes::NU_VALOR_PARCELA_PAGO,
			Constantes::DT_VENCIMENTO,
			Constantes::DT_VENCIMENTO_PAGO,
			Constantes::DS_OBSERVACAO,
			Constantes::CO_PAGAMENTO,
		];
    	return $campos;
    }

	/**
     * @return $relacionamentos
     */
	public static function getRelacionamentos() {
    	$relacionamentos = [
			Constantes::CO_PAGAMENTO => array(
                'Entidade' => PagamentoEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
            Constantes::CO_TIPO_PAGAMENTO => array(
                'Entidade' => TipoPagamentoEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
		];
    	return $relacionamentos;
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

	/**
     * @return $nu_parcela
     */
	public function getNuParcela()
    {
        return $this->nu_parcela;
    }

	/**
     * @param mixed $nu_parcela
     */
	public function setNuParcela($nu_parcela)
    {
        return $this->nu_parcela = $nu_parcela;
    }

	/**
     * @return $nu_valor_parcela
     */
	public function getNuValorParcela()
    {
        return $this->nu_valor_parcela;
    }

	/**
     * @param mixed $nu_valor_parcela
     */
	public function setNuValorParcela($nu_valor_parcela)
    {
        return $this->nu_valor_parcela = $nu_valor_parcela;
    }

	/**
     * @return $nu_valor_parcela_pago
     */
	public function getNuValorParcelaPago()
    {
        return $this->nu_valor_parcela_pago;
    }

	/**
     * @param mixed $nu_valor_parcela_pago
     */
	public function setNuValorParcelaPago($nu_valor_parcela_pago)
    {
        return $this->nu_valor_parcela_pago = $nu_valor_parcela_pago;
    }

	/**
     * @return $dt_vencimento
     */
	public function getDtVencimento()
    {
        return $this->dt_vencimento;
    }

	/**
     * @param mixed $dt_vencimento
     */
	public function setDtVencimento($dt_vencimento)
    {
        return $this->dt_vencimento = $dt_vencimento;
    }

	/**
     * @return $dt_vencimento_pago
     */
	public function getDtVencimentoPago()
    {
        return $this->dt_vencimento_pago;
    }

	/**
     * @param mixed $dt_vencimento_pago
     */
	public function setDtVencimentoPago($dt_vencimento_pago)
    {
        return $this->dt_vencimento_pago = $dt_vencimento_pago;
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