<?php

/**
 * Usuario.Entidade [ ENTIDADE ]
 * @copyright (c) 2016, Leo Bessa
 */

class UsuarioEntidade
{
	const TABELA = 'tb_usuario';
	const ENTIDADE = 'UsuarioEntidade';
	const CHAVE = Constantes::CO_USUARIO;

	private $co_usuario;
	private $ds_login;
	private $ds_senha;
	private $ds_code;
	private $st_status;
	private $dt_cadastro;
	private $co_cliente_sistema;
	private $co_imagem;
	private $co_pessoa;
	private $co_negociacao;
	private $co_produto_detalhe;
	private $co_produto_promocao;
	private $co_usuario_perfil;
	private $co_acesso;


	/**
     * @return $campos
     */
	public static function getCampos() {
    	$campos = [
			Constantes::CO_USUARIO,
			Constantes::DS_LOGIN,
			Constantes::DS_SENHA,
			Constantes::DS_CODE,
			Constantes::ST_STATUS,
			Constantes::DT_CADASTRO,
			Constantes::CO_CLIENTE_SISTEMA,
			Constantes::CO_IMAGEM,
			Constantes::CO_PESSOA,
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
			Constantes::CO_IMAGEM => array(
                'Entidade' => ImagemEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_PESSOA => array(
                'Entidade' => PessoaEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_NEGOCIACAO => array(
                'Entidade' => NegociacaoEntidade::ENTIDADE,
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
			Constantes::CO_USUARIO_PERFIL => array(
                'Entidade' => UsuarioPerfilEntidade::ENTIDADE,
                'Tipo' => 'N',
            ),
			Constantes::CO_ACESSO => array(
                'Entidade' => AcessoEntidade::ENTIDADE,
                'Tipo' => 'N',
            ),
		];
    	return $relacionamentos;
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
     * @return $ds_login
     */
	public function getDsLogin()
    {
        return $this->ds_login;
    }

	/**
     * @param mixed $ds_login
     */
	public function setDsLogin($ds_login)
    {
        return $this->ds_login = $ds_login;
    }

	/**
     * @return $ds_senha
     */
	public function getDsSenha()
    {
        return $this->ds_senha;
    }

	/**
     * @param mixed $ds_senha
     */
	public function setDsSenha($ds_senha)
    {
        return $this->ds_senha = $ds_senha;
    }

	/**
     * @return $ds_code
     */
	public function getDsCode()
    {
        return $this->ds_code;
    }

	/**
     * @param mixed $ds_code
     */
	public function setDsCode($ds_code)
    {
        return $this->ds_code = $ds_code;
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

	/**
     * @return $co_usuario_perfil
     */
	public function getCoUsuarioPerfil()
    {
        return $this->co_usuario_perfil;
    }

	/**
     * @param mixed $co_usuario_perfil
     */
	public function setCoUsuarioPerfil($co_usuario_perfil)
    {
        return $this->co_usuario_perfil = $co_usuario_perfil;
    }

    /**
     * @return mixed
     */
    public function getCoAcesso()
    {
        return $this->co_acesso;
    }

    /**
     * @param mixed $co_acesso
     */
    public function setCoAcesso($co_acesso)
    {
        $this->co_acesso = $co_acesso;
    }



}