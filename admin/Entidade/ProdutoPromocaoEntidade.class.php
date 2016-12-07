<?php

/**
 * ProdutoPromocao.Entidade [ ENTIDADE ]
 * @copyright (c) 2016, Leo Bessa
 */

class ProdutoPromocaoEntidade
{
	const TABELA = 'tb_produto_promocao';
	const ENTIDADE = 'ProdutoPromocaoEntidade';
	const CHAVE = Constantes::CO_PRODUTO_PROMOCAO;

	private $co_produto_promocao;
	private $nu_preco_promocional;
	private $dt_inicio;
	private $dt_fim;
	private $nu_quantidade_minima;
	private $nu_limite;
	private $dt_cadastro;
	private $st_status;
	private $co_produto;
	private $co_usuario;


	/**
     * @return $campos
     */
	public static function getCampos() {
    	$campos = [
			Constantes::CO_PRODUTO_PROMOCAO,
			Constantes::NU_PRECO_PROMOCIONAL,
			Constantes::DT_INICIO,
			Constantes::DT_FIM,
			Constantes::NU_QUANTIDADE_MINIMA,
			Constantes::NU_LIMITE,
			Constantes::DT_CADASTRO,
			Constantes::ST_STATUS,
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
		];
    	return $relacionamentos;
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

	/**
     * @return $nu_preco_promocional
     */
	public function getNuPrecoPromocional()
    {
        return $this->nu_preco_promocional;
    }

	/**
     * @param mixed $nu_preco_promocional
     */
	public function setNuPrecoPromocional($nu_preco_promocional)
    {
        return $this->nu_preco_promocional = $nu_preco_promocional;
    }

	/**
     * @return $dt_inicio
     */
	public function getDtInicio()
    {
        return $this->dt_inicio;
    }

	/**
     * @param mixed $dt_inicio
     */
	public function setDtInicio($dt_inicio)
    {
        return $this->dt_inicio = $dt_inicio;
    }

	/**
     * @return $dt_fim
     */
	public function getDtFim()
    {
        return $this->dt_fim;
    }

	/**
     * @param mixed $dt_fim
     */
	public function setDtFim($dt_fim)
    {
        return $this->dt_fim = $dt_fim;
    }

	/**
     * @return $nu_quantidade_minima
     */
	public function getNuQuantidadeMinima()
    {
        return $this->nu_quantidade_minima;
    }

	/**
     * @param mixed $nu_quantidade_minima
     */
	public function setNuQuantidadeMinima($nu_quantidade_minima)
    {
        return $this->nu_quantidade_minima = $nu_quantidade_minima;
    }

	/**
     * @return $nu_limite
     */
	public function getNuLimite()
    {
        return $this->nu_limite;
    }

	/**
     * @param mixed $nu_limite
     */
	public function setNuLimite($nu_limite)
    {
        return $this->nu_limite = $nu_limite;
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

}