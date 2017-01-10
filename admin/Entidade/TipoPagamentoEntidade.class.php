<?php

/**
 * TipoPagamento.Entidade [ ENTIDADE ]
 * @copyright (c) 2016, Leo Bessa
 */

class TipoPagamentoEntidade
{
	const TABELA = 'TB_TIPO_PAGAMENTO';
	const ENTIDADE = 'TipoPagamentoEntidade';
	const CHAVE = Constantes::CO_TIPO_PAGAMENTO;

	private $co_tipo_pagamento;
	private $ds_tipo_pagamento;
	private $sg_tipo_pagamento;
	private $co_parcelamento;


	/**
     * @return $campos
     */
	public static function getCampos() {
    	$campos = [
			Constantes::CO_TIPO_PAGAMENTO,
			Constantes::DS_TIPO_PAGAMENTO,
			Constantes::SG_TIPO_PAGAMENTO,
		];
    	return $campos;
    }

	/**
     * @return $relacionamentos
     */
	public static function getRelacionamentos() {
    	$relacionamentos = [
			Constantes::CO_PARCELAMENTO => array(
                'Entidade' => ParcelamentoEntidade::ENTIDADE,
                'Tipo' => 'N',
            ),
		];
    	return $relacionamentos;
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
     * @return $ds_tipo_pagamento
     */
	public function getDsTipoPagamento()
    {
        return $this->ds_tipo_pagamento;
    }

	/**
     * @param mixed $ds_tipo_pagamento
     */
	public function setDsTipoPagamento($ds_tipo_pagamento)
    {
        return $this->ds_tipo_pagamento = $ds_tipo_pagamento;
    }

	/**
     * @return $sg_tipo_pagamento
     */
	public function getSgTipoPagamento()
    {
        return $this->sg_tipo_pagamento;
    }

	/**
     * @param mixed $sg_tipo_pagamento
     */
	public function setSgTipoPagamento($sg_tipo_pagamento)
    {
        return $this->sg_tipo_pagamento = $sg_tipo_pagamento;
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