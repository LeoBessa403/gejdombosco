<?php

/**
 * Produto.Entidade [ ENTIDADE ]
 * @copyright (c) 2016, Leo Bessa
 */

class ProdutoEntidade
{
	const TABELA = 'tb_produto';
	const ENTIDADE = 'ProdutoEntidade';
	const CHAVE = Constantes::CO_PRODUTO;

	private $co_produto;
	private $no_produto;
	private $nu_estoque;
	private $nu_codigo;
	private $ds_marca;
	private $dt_cadastro;
	private $st_status;
	private $co_categoria;
	private $co_unidade_venda;
	private $co_imagem;
	private $co_cliente_sistema;
	private $co_negociacao_produto;
	private $co_produto_detalhe;
	private $co_produto_promocao;


	/**
     * @return $campos
     */
	public static function getCampos() {
    	$campos = [
			Constantes::CO_PRODUTO,
			Constantes::NO_PRODUTO,
			Constantes::NU_ESTOQUE,
			Constantes::NU_CODIGO,
			Constantes::DS_MARCA,
			Constantes::DT_CADASTRO,
			Constantes::ST_STATUS,
			Constantes::CO_CATEGORIA,
			Constantes::CO_UNIDADE_VENDA,
			Constantes::CO_IMAGEM,
			Constantes::CO_CLIENTE_SISTEMA,
		];
    	return $campos;
    }

	/**
     * @return $relacionamentos
     */
	public static function getRelacionamentos() {
    	$relacionamentos = [
			Constantes::CO_CATEGORIA => array(
                'Entidade' => CategoriaEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_UNIDADE_VENDA => array(
                'Entidade' => UnidadeVendaEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_IMAGEM => array(
                'Entidade' => ImagemEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_CLIENTE_SISTEMA => array(
                'Entidade' => ClienteSistemaEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_NEGOCIACAO_PRODUTO => array(
                'Entidade' => NegociacaoProdutoEntidade::ENTIDADE,
                'Tipo' => 'N',
            ),
			Constantes::CO_PRODUTO_DETALHE => array(
                'Entidade' => ProdutoDetalheEntidade::ENTIDADE,
                'Tipo' => 'N',
            ),
			Constantes::CO_PRODUTO_PROMOCAO => array(
                'Entidade' => ProdutoPromocaoEntidade::ENTIDADE,
                'Tipo' => 'N',
            ),
		];
    	return $relacionamentos;
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
     * @return $no_produto
     */
	public function getNoProduto()
    {
        return $this->no_produto;
    }

	/**
     * @param mixed $no_produto
     */
	public function setNoProduto($no_produto)
    {
        return $this->no_produto = $no_produto;
    }

	/**
     * @return $nu_estoque
     */
	public function getNuEstoque()
    {
        return $this->nu_estoque;
    }

	/**
     * @param mixed $nu_estoque
     */
	public function setNuEstoque($nu_estoque)
    {
        return $this->nu_estoque = $nu_estoque;
    }

	/**
     * @return $nu_codigo
     */
	public function getNuCodigo()
    {
        return $this->nu_codigo;
    }

	/**
     * @param mixed $nu_codigo
     */
	public function setNuCodigo($nu_codigo)
    {
        return $this->nu_codigo = $nu_codigo;
    }

	/**
     * @return $ds_marca
     */
	public function getDsMarca()
    {
        return $this->ds_marca;
    }

	/**
     * @param mixed $ds_marca
     */
	public function setDsMarca($ds_marca)
    {
        return $this->ds_marca = $ds_marca;
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
     * @return $co_categoria
     */
	public function getCoCategoria()
    {
        return $this->co_categoria;
    }

	/**
     * @param mixed $co_categoria
     */
	public function setCoCategoria($co_categoria)
    {
        return $this->co_categoria = $co_categoria;
    }

	/**
     * @return $co_unidade_venda
     */
	public function getCoUnidadeVenda()
    {
        return $this->co_unidade_venda;
    }

	/**
     * @param mixed $co_unidade_venda
     */
	public function setCoUnidadeVenda($co_unidade_venda)
    {
        return $this->co_unidade_venda = $co_unidade_venda;
    }

	/**
     * @return $co_imagem
     */
	public function getCoImagem()
    {
        return $this->co_imagem;
    }

	/**
     * @param mixed $co_imagem
     */
	public function setCoImagem($co_imagem)
    {
        return $this->co_imagem = $co_imagem;
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
     * @return $co_produto_detalhe
     */
	public function getCoProdutoDetalhe()
    {
        return $this->co_produto_detalhe;
    }

	/**
     * @param mixed $co_produto_detalhe
     */
	public function setCoProdutoDetalhe($co_produto_detalhe)
    {
        return $this->co_produto_detalhe = $co_produto_detalhe;
    }

	/**
     * @return $co_produto_promocao
     */
	public function getCoProdutoPromocao()
    {
        return $this->co_produto_promocao;
    }

	/**
     * @param mixed $co_produto_promocao
     */
	public function setCoProdutoPromocao($co_produto_promocao)
    {
        return $this->co_produto_promocao = $co_produto_promocao;
    }

}