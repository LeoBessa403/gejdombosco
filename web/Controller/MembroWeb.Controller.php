<?php

class MembroWeb
{
    public $result;
    public $resultAlt;
    public $form;

    function CadastroRetiroCarnaval()
    {

        $id = "CadastroRetiroCarnaval";

        if (!empty($_POST[$id])):

            $dados = $_POST;
            $dados['dt_cadastro'] = Valida::DataAtualBanco();
            $dados['dt_nascimento'] = explode(' ', Valida::DataDB($dados['dt_nascimento']));
            $dados['dt_nascimento'] = $dados['dt_nascimento'][0];
            $dados['nu_camisa'] = $dados['nu_camisa'][0];
            $dados['ds_retiro'] = FuncoesSistema::retornoCheckbox((isset($dados['ds_retiro'])) ? $dados['ds_retiro'] : null);
            $dados['ds_pastoral_ativo'] = FuncoesSistema::retornoCheckbox((isset($dados['ds_pastoral_ativo'])) ? $dados['ds_pastoral_ativo'] : null);
            $dados['ds_membro_ativo'] = FuncoesSistema::retornoCheckbox((isset($dados['ds_membro_ativo'])) ? $dados['ds_membro_ativo'] : null);
            $dados['co_evento'] = 3; // Retiro de Carnaval
            $dados['no_membro'] = trim($dados['no_membro']);
            if ($dados['ds_pastoral_ativo'] == "S"):
                $dados['ds_pastoral'] = $dados['ds_pastoral'];
            else:
                unset($dados['ds_pastoral']);
            endif;
            unset($dados[$id], $dados['ds_pastoral_ativo']);

            $pesquisa['dt_nascimento'] = $dados['dt_nascimento'];
            $pesquisa['no_membro'] = $dados['no_membro'];
            $pesquisa['co_evento'] = $dados['co_evento'];

            $membro = CadastroRetiroModel::PesquisaMembroJaCadastrado($pesquisa);

            if ($membro):
                $this->resultAlt = true;
            else:
                $idMembro = CadastroRetiroModel::CadastraDados($dados);
                if ($idMembro):
                    $this->result = true;
                endif;
            endif;
        endif;

        $this->form = MembroWebForm::Cadastrar();
    }
}