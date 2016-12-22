<?php

/**
 * PessoaModel.class [ MODEL ]
 * @copyright (c) 2016, Leo Bessa
 */
class  PessoaModel extends AbstractModel
{

    public function __construct()
    {
        parent::__construct(PessoaEntidade::ENTIDADE);
    }

    public function pesquisaUsuarioCadastrado($condicoes)
    {
        $pesquisa = new Pesquisa();
        $where = '';
        foreach ($condicoes as $key => $value) {
            $where = 'where '. $key . ' = "'. $value . '"';
        }
        $pesquisa->Pesquisar(PessoaEntidade::TABELA, $where);
        return $this->getUmObjeto(PessoaEntidade::ENTIDADE, $pesquisa->getResult());
    }


}