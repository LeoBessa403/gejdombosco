<?php

/**
 * TipoCategoria.Entidade [ ENTIDADE ]
 * @copyright (c) 2016, Leo Bessa
 */

class TipoCategoriaEntidade
{
	const TABELA = 'tb_tipo_categoria';
	const ENTIDADE = 'TipoCategoriaEntidade';
	const CHAVE = Constantes::CO_TIPO_CATEGORIA;

	private $co_tipo_categoria;
	private $ds_tipo_categoria;


	/**
     * @return $campos
     */
	public static function getCampos() {
    	$campos = [
			Constantes::CO_TIPO_CATEGORIA,
			Constantes::DS_TIPO_CATEGORIA,
		];
    	return $campos;
    }

	/**
     * @return $relacionamentos
     */
	public static function getRelacionamentos() {
    	$relacionamentos = [
			Constantes::CO_CATEGORIA => array(
				'Entidade' => CategoriaEntidade::ENTIDADE,
				'Tipo' => 'N',
			),
		];
    	return $relacionamentos;
    }


	/**
     * @return $co_tipo_categoria
     */
	public function getCoTipoCategoria()
    {
        return $this->co_tipo_categoria;
    }

	/**
     * @param mixed $co_tipo_categoria
     */
	public function setCoTipoCategoria($co_tipo_categoria)
    {
        return $this->co_tipo_categoria = $co_tipo_categoria;
    }

	/**
     * @return $ds_tipo_categoria
     */
	public function getDsTipoCategoria()
    {
        return $this->ds_tipo_categoria;
    }

	/**
     * @param mixed $ds_tipo_categoria
     */
	public function setDsTipoCategoria($ds_tipo_categoria)
    {
        return $this->ds_tipo_categoria = $ds_tipo_categoria;
    }

}