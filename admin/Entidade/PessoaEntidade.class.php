<?php

/**
 * Pessoa.Entidade [ ENTIDADE ]
 * @copyright (c) 2016, Leo Bessa
 */

class PessoaEntidade
{
	const TABELA = 'tb_pessoa';
	const ENTIDADE = 'PessoaEntidade';
	const CHAVE = Constantes::CO_PESSOA;

	private $co_pessoa;
	private $nu_cpf;
	private $no_pessoa;
	private $nu_rg;
	private $dt_cadastro;
	private $dt_nascimento;
	private $st_sexo;
	private $st_estado_civil;
	private $co_endereco;
	private $co_contato;
	private $co_cliente;
	private $co_cliente_sistema;
	private $co_empresa;
	private $co_fornecedor;
	private $co_funcionario;
	private $co_representante;
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
			Constantes::ST_ESTADO_CIVIL,
			Constantes::CO_ENDERECO,
			Constantes::CO_CONTATO,
		];
    	return $campos;
    }

	/**
     * @return $relacionamentos
     */
	public static function getRelacionamentos() {
    	$relacionamentos = [
			Constantes::CO_ENDERECO => array(
                'Entidade' => EnderecoEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_CONTATO => array(
                'Entidade' => ContatoEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_CLIENTE => array(
                'Entidade' => ClienteEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_CLIENTE_SISTEMA => array(
                'Entidade' => ClienteSistemaEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_EMPRESA => array(
                'Entidade' => EmpresaEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_FORNECEDOR => array(
                'Entidade' => FornecedorEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_FUNCIONARIO => array(
                'Entidade' => FuncionarioEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_REPRESENTANTE => array(
                'Entidade' => RepresentanteEntidade::ENTIDADE,
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
     * @return $st_estado_civil
     */
	public function getStEstadoCivil()
    {
        return $this->st_estado_civil;
    }

	/**
     * @param mixed $st_estado_civil
     */
	public function setStEstadoCivil($st_estado_civil)
    {
        return $this->st_estado_civil = $st_estado_civil;
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
     * @return $co_cliente
     */
	public function getCoCliente()
    {
        return $this->co_cliente;
    }

	/**
     * @param mixed $co_cliente
     */
	public function setCoCliente($co_cliente)
    {
        return $this->co_cliente = $co_cliente;
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
     * @return $co_empresa
     */
	public function getCoEmpresa()
    {
        return $this->co_empresa;
    }

	/**
     * @param mixed $co_empresa
     */
	public function setCoEmpresa($co_empresa)
    {
        return $this->co_empresa = $co_empresa;
    }

	/**
     * @return $co_fornecedor
     */
	public function getCoFornecedor()
    {
        return $this->co_fornecedor;
    }

	/**
     * @param mixed $co_fornecedor
     */
	public function setCoFornecedor($co_fornecedor)
    {
        return $this->co_fornecedor = $co_fornecedor;
    }

	/**
     * @return $co_funcionario
     */
	public function getCoFuncionario()
    {
        return $this->co_funcionario;
    }

	/**
     * @param mixed $co_funcionario
     */
	public function setCoFuncionario($co_funcionario)
    {
        return $this->co_funcionario = $co_funcionario;
    }

	/**
     * @return $co_representante
     */
	public function getCoRepresentante()
    {
        return $this->co_representante;
    }

	/**
     * @param mixed $co_representante
     */
	public function setCoRepresentante($co_representante)
    {
        return $this->co_representante = $co_representante;
    }

    /**
     * @return mixed
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
        $this->co_usuario = $co_usuario;
    }

}