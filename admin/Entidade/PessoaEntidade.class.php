<?php

/**
 * Pessoa.Entidade [ ENTIDADE ]
 * @copyright (c) 2016, Leo Bessa
 */

class PessoaEntidade
{
	const TABELA = 'TB_PESSOA';
	const ENTIDADE = 'PessoaEntidade';
	const CHAVE = Constantes::CO_PESSOA;

	private $co_pessoa;
	private $nu_cpf;
	private $no_pessoa;
	private $nu_rg;
	private $dt_cadastro;
	private $dt_nascimento;
	private $st_sexo;
	private $co_contato;
	private $co_endereco;
	private $co_membro;
	private $co_usuario;


	/**
     * @return $campos
     */
	public static function getCampos() {
    	$campos = [
			Constantes::CO_PESSOA,
			Constantes::NU_CPF,
			Constantes::NO_PESSOA,
			Constantes::NU_RG,
			Constantes::DT_CADASTRO,
			Constantes::DT_NASCIMENTO,
			Constantes::ST_SEXO,
			Constantes::CO_CONTATO,
			Constantes::CO_ENDERECO,
		];
    	return $campos;
    }

	/**
     * @return $relacionamentos
     */
	public static function getRelacionamentos() {
    	$relacionamentos = [
			Constantes::CO_CONTATO => array(
                'Entidade' => ContatoEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_ENDERECO => array(
                'Entidade' => EnderecoEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_MEMBRO => array(
                'Entidade' => MembroEntidade::ENTIDADE,
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
     * @return $nu_cpf
     */
	public function getNuCpf()
    {
        return $this->nu_cpf;
    }

	/**
     * @param mixed $nu_cpf
     */
	public function setNuCpf($nu_cpf)
    {
        return $this->nu_cpf = $nu_cpf;
    }

	/**
     * @return $no_pessoa
     */
	public function getNoPessoa()
    {
        return $this->no_pessoa;
    }

	/**
     * @param mixed $no_pessoa
     */
	public function setNoPessoa($no_pessoa)
    {
        return $this->no_pessoa = $no_pessoa;
    }

	/**
     * @return $nu_rg
     */
	public function getNuRg()
    {
        return $this->nu_rg;
    }

	/**
     * @param mixed $nu_rg
     */
	public function setNuRg($nu_rg)
    {
        return $this->nu_rg = $nu_rg;
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
     * @return $dt_nascimento
     */
	public function getDtNascimento()
    {
        return $this->dt_nascimento;
    }

	/**
     * @param mixed $dt_nascimento
     */
	public function setDtNascimento($dt_nascimento)
    {
        return $this->dt_nascimento = $dt_nascimento;
    }

	/**
     * @return $st_sexo
     */
	public function getStSexo()
    {
        return $this->st_sexo;
    }

	/**
     * @param mixed $st_sexo
     */
	public function setStSexo($st_sexo)
    {
        return $this->st_sexo = $st_sexo;
    }

	/**
     * @return $co_contato
     */
	public function getCoContato()
    {
        return $this->co_contato;
    }

	/**
     * @param mixed $co_contato
     */
	public function setCoContato($co_contato)
    {
        return $this->co_contato = $co_contato;
    }

	/**
     * @return $co_endereco
     */
	public function getCoEndereco()
    {
        return $this->co_endereco;
    }

	/**
     * @param mixed $co_endereco
     */
	public function setCoEndereco($co_endereco)
    {
        return $this->co_endereco = $co_endereco;
    }

	/**
     * @return $co_membro
     */
	public function getCoMembro()
    {
        return $this->co_membro;
    }

	/**
     * @param mixed $co_membro
     */
	public function setCoMembro($co_membro)
    {
        return $this->co_membro = $co_membro;
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