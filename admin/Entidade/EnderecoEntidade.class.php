<?php

/**
 * Endereco.Entidade [ ENTIDADE ]
 * @copyright (c) 2016, Leo Bessa
 */

class EnderecoEntidade
{
	const TABELA = 'TB_ENDERECO';
	const ENTIDADE = 'EnderecoEntidade';
	const CHAVE = Constantes::CO_ENDERECO;

	private $co_endereco;
	private $ds_endereco;
	private $ds_complemento;
	private $ds_bairro;
	private $nu_cep;
	private $no_cidade;
	private $sg_uf;
	private $co_pessoa;


	/**
     * @return $campos
     */
	public static function getCampos() {
    	$campos = [
			Constantes::CO_ENDERECO,
			Constantes::DS_ENDERECO,
			Constantes::DS_COMPLEMENTO,
			Constantes::DS_BAIRRO,
			Constantes::NU_CEP,
			Constantes::NO_CIDADE,
			Constantes::SG_UF,
		];
    	return $campos;
    }

	/**
     * @return $relacionamentos
     */
	public static function getRelacionamentos() {
    	$relacionamentos = [
			Constantes::CO_PESSOA => array(
                'Entidade' => PessoaEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
		];
    	return $relacionamentos;
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
     * @return $ds_endereco
     */
	public function getDsEndereco()
    {
        return $this->ds_endereco;
    }

	/**
     * @param mixed $ds_endereco
     */
	public function setDsEndereco($ds_endereco)
    {
        return $this->ds_endereco = $ds_endereco;
    }

	/**
     * @return $ds_complemento
     */
	public function getDsComplemento()
    {
        return $this->ds_complemento;
    }

	/**
     * @param mixed $ds_complemento
     */
	public function setDsComplemento($ds_complemento)
    {
        return $this->ds_complemento = $ds_complemento;
    }

	/**
     * @return $ds_bairro
     */
	public function getDsBairro()
    {
        return $this->ds_bairro;
    }

	/**
     * @param mixed $ds_bairro
     */
	public function setDsBairro($ds_bairro)
    {
        return $this->ds_bairro = $ds_bairro;
    }

	/**
     * @return $nu_cep
     */
	public function getNuCep()
    {
        return $this->nu_cep;
    }

	/**
     * @param mixed $nu_cep
     */
	public function setNuCep($nu_cep)
    {
        return $this->nu_cep = $nu_cep;
    }

	/**
     * @return $no_cidade
     */
	public function getNoCidade()
    {
        return $this->no_cidade;
    }

	/**
     * @param mixed $no_cidade
     */
	public function setNoCidade($no_cidade)
    {
        return $this->no_cidade = $no_cidade;
    }

	/**
     * @return $sg_uf
     */
	public function getSgUf()
    {
        return $this->sg_uf;
    }

	/**
     * @param mixed $sg_uf
     */
	public function setSgUf($sg_uf)
    {
        return $this->sg_uf = $sg_uf;
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

}