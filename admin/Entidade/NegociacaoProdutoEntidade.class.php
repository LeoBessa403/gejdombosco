<?php

/**
 * NegociacaoProduto.Entidade [ ENTIDADE ]
 * @copyright (c) 2016, Leo Bessa
 */

class NegociacaoProdutoEntidade
{
	const TABELA = 'tb_negociacao_produto';
	const ENTIDADE = 'NegociacaoProdutoEntidade';
	const CHAVE = Constantes::CO_NEGOCIACAO_PRODUTO;

	private $co_negociacao_produto;
	private $co_negociacao;
	private $co_produto;
	private $nu_valor;
	private $nu_quantidade;
	private $ds_observacao;


	/**
     * @return $campos
     */
	public static function getCampos() {
    	$campos = [
			Constantes::CO_NEGOCIACAO_PRODUTO,
			Constantes::CO_NEGOCIACAO,
			Constantes::CO_PRODUTO,
			Constantes::NU_VALOR,
			Constantes::NU_QUANTIDADE,
			Constantes::DS_OBSERVACAO,
		];
    	return $campos;
    }

	/**
     * @return $relacionamentos
     */
	public static function getRelacionamentos() {
    	$relacionamentos = [
			Constantes::CO_NEGOCIACAO => array(
                'Entidade' => NegociacaoEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_PRODUTO => array(
                'Entidade' => ProdutoEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
		];
    	return $relacionamentos;
    }


	/**
     * @return $co_negociacao_produto
     */
	public function getCoNegociacaoProduto()
    {
        return $this->co_negociacao_produto;
    }

	/**
     * @param mixed $co_negociacao_produto
     */
	public function setCoNegociacaoProduto($co_negociacao_produto)
    {
        return $this->co_negociacao_produto = $co_negociacao_produto;
    }

	/**
     * @return $co_negociacao
     */
	public function getCoNegociacao()
    {
        return $this->co_negociacao;
    }

	/**
     * @param mixed $co_negociacao
     */
	public function setCoNegociacao($co_negociacao)
    {
        return $this->co_negociacao = $co_negociacao;
    }

	/**
     * @return $co_produto
     */
	public function getCoProduto()
    {
        return $this->co_produto;
    }

	/**
     * @param mixed $co_produto
     */
	public function setCoProduto($co_produto)
    {
        return $this->co_produto = $co_produto;
    }

	/**
     * @return $nu_valor
     */
	public function getNuValor()
    {
        return $this->nu_valor;
    }

	/**
     * @param mixed $nu_valor
     */
	public function setNuValor($nu_valor)
    {
        return $this->nu_valor = $nu_valor;
    }

	/**
     * @return $nu_quantidade
     */
	public function getNuQuantidade()
    {
        return $this->nu_quantidade;
    }

	/**
     * @param mixed $nu_quantidade
     */
	public function setNuQuantidade($nu_quantidade)
    {
        return $this->nu_quantidade = $nu_quantidade;
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

}