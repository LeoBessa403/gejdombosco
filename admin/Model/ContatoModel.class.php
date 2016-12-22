<?php

/**
 * ContatoModel.class [ MODEL ]
 * @copyright (c) 2016, Leo Bessa
 */
class  ContatoModel extends AbstractModel
{

    public function __construct()
    {
        parent::__construct(ContatoEntidade::ENTIDADE);
    }

    public function pesquisaContatoCadastrado($condicoes)
    {
        $pesquisa = new Pesquisa();
        $where = '';
        foreach ($condicoes as $key => $value) {
            $where = 'where '. $key . ' = "'. $value . '"';
        }
        $pesquisa->Pesquisar(ContatoEntidade::TABELA, $where);
        return $this->getUmObjeto(ContatoEntidade::ENTIDADE, $pesquisa->getResult());
    }


}