<?php

/**
 * TipoPagamento.Entidade [ ENTIDADE ]
 * @copyright (c) 2016, Leo Bessa
 */

class TipoPagamentoEntidade
{
	const TABELA = 'tb_tipo_pagamento';
	const ENTIDADE = 'TipoPagamentoEntidade';
	const CHAVE = Constantes::CO_TIPO_PAGAMENTO;

	private $co_tipo_pagamento;
	private $ds_tipo_pagamento;
	private $sg_tipo_pagamento;
	private $co_pagamento;


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
			Constantes::CO_PAGAMENTO => array(
                'Entidade' => PagamentoEntidade::ENTIDADE,
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