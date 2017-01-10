<?php

/**
 * Perfil.Entidade [ ENTIDADE ]
 * @copyright (c) 2016, Leo Bessa
 */

class PerfilEntidade
{
	const TABELA = 'TB_PERFIL';
	const ENTIDADE = 'PerfilEntidade';
	const CHAVE = Constantes::CO_PERFIL;

	private $co_perfil;
	private $no_perfil;
	private $st_status;
	private $co_perfil_funcionalidade;
	private $co_usuario_perfil;


	/**
     * @return $campos
     */
	public static function getCampos() {
    	$campos = [
			Constantes::CO_PERFIL,
			Constantes::NO_PERFIL,
			Constantes::ST_STATUS,
		];
    	return $campos;
    }

	/**
     * @return $relacionamentos
     */
	public static function getRelacionamentos() {
    	$relacionamentos = [
			Constantes::CO_PERFIL_FUNCIONALIDADE => array(
                'Entidade' => PerfilFuncionalidadeEntidade::ENTIDADE,
                'Tipo' => 'N',
            ),
			Constantes::CO_USUARIO_PERFIL => array(
                'Entidade' => UsuarioPerfilEntidade::ENTIDADE,
                'Tipo' => 'N',
            ),
		];
    	return $relacionamentos;
    }


	/**
     * @return $co_perfil
     */
	public function getCoPerfil()
    {
        return $this->co_perfil;
    }

	/**
     * @param mixed $co_perfil
     */
	public function setCoPerfil($co_perfil)
    {
        return $this->co_perfil = $co_perfil;
    }

	/**
     * @return $no_perfil
     */
	public function getNoPerfil()
    {
        return $this->no_perfil;
    }

	/**
     * @param mixed $no_perfil
     */
	public function setNoPerfil($no_perfil)
    {
        return $this->no_perfil = $no_perfil;
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
     * @return $co_perfil_funcionalidade
     */
	public function getCoPerfilFuncionalidade()
    {
        return $this->co_perfil_funcionalidade;
    }

	/**
     * @param mixed $co_perfil_funcionalidade
     */
	public function setCoPerfilFuncionalidade($co_perfil_funcionalidade)
    {
        return $this->co_perfil_funcionalidade = $co_perfil_funcionalidade;
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

}