<?php

/**
 * Financeiro.Entidade [ ENTIDADE ]
 * @copyright (c) 2016, Leo Bessa
 */

class FinanceiroEntidade
{
	const TABELA = 'tb_financeiro';
	const ENTIDADE = 'FinanceiroEntidade';
	const CHAVE = Constantes::CO_FINANCEIRO;

	private $co_financeiro;
	private $nu_parcela;
	private $nu_valor_parcela;
	private $nu_valor_parcela_pago;
	private $dt_vencimento;
	private $dt_vencimento_pago;
	private $ds_observacao;
	private $co_cliente_sistema;


	/**
     * @return $campos
     */
	public static function getCampos() {
    	$campos = [
			Constantes::CO_FINANCEIRO,
			Constantes::NU_PARCELA,
			Constantes::NU_VALOR_PARCELA,
			Constantes::NU_VALOR_PARCELA_PAGO,
			Constantes::DT_VENCIMENTO,
			Constantes::DT_VENCIMENTO_PAGO,
			Constantes::DS_OBSERVACAO,
			Constantes::CO_CLIENTE_SISTEMA,
		];
    	return $campos;
    }

	/**
     * @return $relacionamentos
     */
	public static function getRelacionamentos() {
    	$relacionamentos = [
			Constantes::CO_CLIENTE_SISTEMA => array(
                'Entidade' => ClienteSistemaEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
		];
    	return $relacionamentos;
    }


	/**
     * @return $co_financeiro
     */
	public function getCoFinanceiro()
    {
        return $this->co_financeiro;
    }

	/**
     * @param mixed $co_financeiro
     */
	public function setCoFinanceiro($co_financeiro)
    {
        return $this->co_financeiro = $co_financeiro;
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

}