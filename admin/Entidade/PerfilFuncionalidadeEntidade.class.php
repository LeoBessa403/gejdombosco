<?php

/**
 * PerfilFuncionalidade.Entidade [ ENTIDADE ]
 * @copyright (c) 2016, Leo Bessa
 */

class PerfilFuncionalidadeEntidade
{
	const TABELA = 'TB_PERFIL_FUNCIONALIDADE';
	const ENTIDADE = 'PerfilFuncionalidadeEntidade';
	const CHAVE = Constantes::CO_PERFIL_FUNCIONALIDADE;

	private $co_perfil_funcionalidade;
	private $co_perfil;
	private $co_funcionalidade;


	/**
     * @return $campos
     */
	public static function getCampos() {
    	$campos = [
			Constantes::CO_PERFIL_FUNCIONALIDADE,
			Constantes::CO_PERFIL,
			Constantes::CO_FUNCIONALIDADE,
		];
    	return $campos;
    }

	/**
     * @return $relacionamentos
     */
	public static function getRelacionamentos() {
    	$relacionamentos = [
			Constantes::CO_PERFIL => array(
                'Entidade' => PerfilEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
			Constantes::CO_FUNCIONALIDADE => array(
                'Entidade' => FuncionalidadeEntidade::ENTIDADE,
                'Tipo' => 1,
            ),
		];
    	return $relacionamentos;
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
     * @return $co_funcionalidade
     */
	public function getCoFuncionalidade()
    {
        return $this->co_funcionalidade;
    }

	/**
     * @param mixed $co_funcionalidade
     */
	public function setCoFuncionalidade($co_funcionalidade)
    {
        return $this->co_funcionalidade = $co_funcionalidade;
    }

}