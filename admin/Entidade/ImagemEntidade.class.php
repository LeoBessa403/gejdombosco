<?php

/**
 * Imagem.Entidade [ ENTIDADE ]
 * @copyright (c) 2016, Leo Bessa
 */

class ImagemEntidade
{
	const TABELA = 'TB_IMAGEM';
	const ENTIDADE = 'ImagemEntidade';
	const CHAVE = Constantes::CO_IMAGEM;

	private $co_imagem;
	private $ds_caminho;
	private $co_usuario;


	/**
     * @return $campos
     */
	public static function getCampos() {
    	$campos = [
			Constantes::CO_IMAGEM,
			Constantes::DS_CAMINHO,
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
     * @return $ds_caminho
     */
	public function getDsCaminho()
    {
        return $this->ds_caminho;
    }

	/**
     * @param mixed $ds_caminho
     */
	public function setDsCaminho($ds_caminho)
    {
        return $this->ds_caminho = $ds_caminho;
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