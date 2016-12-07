<?php

/**
 * ProdutoDetalhe.Entidade [ ENTIDADE ]
 * @copyright (c) 2016, Leo Bessa
 */

class ProdutoDetalheEntidade
{
	const TABELA = 'tb_produto_detalhe';
	const ENTIDADE = 'ProdutoDetalheEntidade';
	const CHAVE = Constantes::CO_PRODUTO_DETALHE;

	private $co_produto_detalhe;
	private $nu_estoque_baixo;
	private $nu_preco;
	private $nu_lucro;
	private $nu_desconto_maximo;
	private $dt_cadastro;
	private $co_produto;
	private $co_usuario;
	private $co_perfil_produto_detalhe;


	/**
     * @return $campos
     */
	public static function getCampos() {
    	$campos = [
			Constantes::CO_PRODUTO_DETALHE,
			Constantes::NU_ESTOQUE_BAIXO,
			Constantes::NU_PRECO,
			Constantes::NU_LUCRO,
			Constantes::NU_DESCONTO_MAXIMO,
			Constantes::DT_CADASTRO,
			Constantes::CO_PRODUTO,
			Constantes::CO_USUARIO,
		];
    	return $campos;
    }

	/**
     * @return $relacionamentos
     */
	public static function getRelacionamentos() {
    	$relacionamentos = [
			Constantes::CO_PRODUTO => array(
                'Entidade' => ProdutoEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_USUARIO => array(
                'Entidade' => UsuarioEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_PERFIL_PRODUTO_DETALHE => array(
                'Entidade' => PerfilProdutoDetalheEntidade::ENTIDADE,
                'Tipo' => 'N',
            ),
		];
    	return $relacionamentos;
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
     * @return $nu_estoque_baixo
     */
	public function getNuEstoqueBaixo()
    {
        return $this->nu_estoque_baixo;
    }

	/**
     * @param mixed $nu_estoque_baixo
     */
	public function setNuEstoqueBaixo($nu_estoque_baixo)
    {
        return $this->nu_estoque_baixo = $nu_estoque_baixo;
    }

	/**
     * @return $nu_preco
     */
	public function getNuPreco()
    {
        return $this->nu_preco;
    }

	/**
     * @param mixed $nu_preco
     */
	public function setNuPreco($nu_preco)
    {
        return $this->nu_preco = $nu_preco;
    }

	/**
     * @return $nu_lucro
     */
	public function getNuLucro()
    {
        return $this->nu_lucro;
    }

	/**
     * @param mixed $nu_lucro
     */
	public function setNuLucro($nu_lucro)
    {
        return $this->nu_lucro = $nu_lucro;
    }

	/**
     * @return $nu_desconto_maximo
     */
	public function getNuDescontoMaximo()
    {
        return $this->nu_desconto_maximo;
    }

	/**
     * @param mixed $nu_desconto_maximo
     */
	public function setNuDescontoMaximo($nu_desconto_maximo)
    {
        return $this->nu_desconto_maximo = $nu_desconto_maximo;
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
     * @return $co_usuario
     */
	public function getCoUsuario()
    {
        return $this->co_usuario;
    }

	/**
     * @param mixed $co_usuario
     */
	public function setCoUsuario($co_usuario)
    {
        return $this->co_usuario = $co_usuario;
    }

	/**
     * @return $co_perfil_produto_detalhe
     */
	public function getCoPerfilProdutoDetalhe()
    {
        return $this->co_perfil_produto_detalhe;
    }

	/**
     * @param mixed $co_perfil_produto_detalhe
     */
	public function setCoPerfilProdutoDetalhe($co_perfil_produto_detalhe)
    {
        return $this->co_perfil_produto_detalhe = $co_perfil_produto_detalhe;
    }

}