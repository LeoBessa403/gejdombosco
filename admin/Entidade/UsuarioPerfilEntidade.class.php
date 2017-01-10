<?php

/**
 * UsuarioPerfil.Entidade [ ENTIDADE ]
 * @copyright (c) 2016, Leo Bessa
 */

class UsuarioPerfilEntidade
{
	const TABELA = 'TB_USUARIO_PERFIL';
	const ENTIDADE = 'UsuarioPerfilEntidade';
	const CHAVE = Constantes::CO_USUARIO_PERFIL;

	private $co_usuario_perfil;
	private $co_usuario;
	private $co_perfil;


	/**
     * @return $campos
     */
	public static function getCampos() {
    	$campos = [
			Constantes::CO_USUARIO_PERFIL,
			Constantes::CO_USUARIO,
			Constantes::CO_PERFIL,
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
			Constantes::CO_PERFIL => array(
                'Entidade' => PerfilEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
		];
    	return $relacionamentos;
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

}