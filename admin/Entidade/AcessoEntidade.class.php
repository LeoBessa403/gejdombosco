<?php

/**
 * Acesso.Entidade [ ENTIDADE ]
 * @copyright (c) 2016, Leo Bessa
 */

class AcessoEntidade
{
	const TABELA = 'TB_ACESSO';
	const ENTIDADE = 'AcessoEntidade';
	const CHAVE = Constantes::CO_ACESSO;

	private $co_acesso;
	private $ds_session_id;
	private $dt_inicio_acesso;
	private $dt_fim_acesso;
	private $co_usuario;


	/**
     * @return $campos
     */
	public static function getCampos() {
    	$campos = [
			Constantes::CO_ACESSO,
			Constantes::DS_SESSION_ID,
			Constantes::DT_INICIO_ACESSO,
			Constantes::DT_FIM_ACESSO,
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
     * @return $co_acesso
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
        return $this->co_acesso = $co_acesso;
    }

	/**
     * @return $ds_session_id
     */
	public function getDsSessionId()
    {
        return $this->ds_session_id;
    }

	/**
     * @param mixed $ds_session_id
     */
	public function setDsSessionId($ds_session_id)
    {
        return $this->ds_session_id = $ds_session_id;
    }

	/**
     * @return $dt_inicio_acesso
     */
	public function getDtInicioAcesso()
    {
        return $this->dt_inicio_acesso;
    }

	/**
     * @param mixed $dt_inicio_acesso
     */
	public function setDtInicioAcesso($dt_inicio_acesso)
    {
        return $this->dt_inicio_acesso = $dt_inicio_acesso;
    }

	/**
     * @return $dt_fim_acesso
     */
	public function getDtFimAcesso()
    {
        return $this->dt_fim_acesso;
    }

	/**
     * @param mixed $dt_fim_acesso
     */
	public function setDtFimAcesso($dt_fim_acesso)
    {
        return $this->dt_fim_acesso = $dt_fim_acesso;
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