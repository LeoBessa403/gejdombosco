<?php

/**
 * Auditoria.Entidade [ ENTIDADE ]
 * @copyright (c) 2016, Leo Bessa
 */

class AuditoriaEntidade
{
	const TABELA = 'TB_AUDITORIA';
	const ENTIDADE = 'AuditoriaEntidade';
	const CHAVE = Constantes::CO_AUDITORIA;

	private $co_auditoria;
	private $no_tabela;
	private $dt_realizado;
	private $no_operacao;
	private $ds_item_anterior;
	private $ds_item_atual;
	private $co_registro;
	private $ds_perfil_usuario;
	private $co_usuario;


	/**
     * @return $campos
     */
	public static function getCampos() {
    	$campos = [
			Constantes::CO_AUDITORIA,
			Constantes::NO_TABELA,
			Constantes::DT_REALIZADO,
			Constantes::NO_OPERACAO,
			Constantes::DS_ITEM_ANTERIOR,
			Constantes::DS_ITEM_ATUAL,
			Constantes::CO_REGISTRO,
			Constantes::DS_PERFIL_USUARIO,
			Constantes::CO_USUARIO,
		];
    	return $campos;
    }

	/**
     * @return $relacionamentos
     */
	public static function getRelacionamentos() {
    	$relacionamentos = [
			Constantes::CO_USUARIO => array(
                'Entidade' => UsuarioEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
		];
    	return $relacionamentos;
    }


	/**
     * @return $co_auditoria
     */
	public function getCoAuditoria()
    {
        return $this->co_auditoria;
    }

	/**
     * @param mixed $co_auditoria
     */
	public function setCoAuditoria($co_auditoria)
    {
        return $this->co_auditoria = $co_auditoria;
    }

	/**
     * @return $no_tabela
     */
	public function getNoTabela()
    {
        return $this->no_tabela;
    }

	/**
     * @param mixed $no_tabela
     */
	public function setNoTabela($no_tabela)
    {
        return $this->no_tabela = $no_tabela;
    }

	/**
     * @return $dt_realizado
     */
	public function getDtRealizado()
    {
        return $this->dt_realizado;
    }

	/**
     * @param mixed $dt_realizado
     */
	public function setDtRealizado($dt_realizado)
    {
        return $this->dt_realizado = $dt_realizado;
    }

	/**
     * @return $no_operacao
     */
	public function getNoOperacao()
    {
        return $this->no_operacao;
    }

	/**
     * @param mixed $no_operacao
     */
	public function setNoOperacao($no_operacao)
    {
        return $this->no_operacao = $no_operacao;
    }

	/**
     * @return $ds_item_anterior
     */
	public function getDsItemAnterior()
    {
        return $this->ds_item_anterior;
    }

	/**
     * @param mixed $ds_item_anterior
     */
	public function setDsItemAnterior($ds_item_anterior)
    {
        return $this->ds_item_anterior = $ds_item_anterior;
    }

	/**
     * @return $ds_item_atual
     */
	public function getDsItemAtual()
    {
        return $this->ds_item_atual;
    }

	/**
     * @param mixed $ds_item_atual
     */
	public function setDsItemAtual($ds_item_atual)
    {
        return $this->ds_item_atual = $ds_item_atual;
    }

	/**
     * @return $co_registro
     */
	public function getCoRegistro()
    {
        return $this->co_registro;
    }

	/**
     * @param mixed $co_registro
     */
	public function setCoRegistro($co_registro)
    {
        return $this->co_registro = $co_registro;
    }

	/**
     * @return $ds_perfil_usuario
     */
	public function getDsPerfilUsuario()
    {
        return $this->ds_perfil_usuario;
    }

	/**
     * @param mixed $ds_perfil_usuario
     */
	public function setDsPerfilUsuario($ds_perfil_usuario)
    {
        return $this->ds_perfil_usuario = $ds_perfil_usuario;
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