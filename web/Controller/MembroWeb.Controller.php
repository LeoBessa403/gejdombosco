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
            $EnderecoModel = new EnderecoModel();
            $ContatoModel = new ContatoModel();
            $PessoaModel = new PessoaModel();

            $endereco[Constantes::DS_ENDERECO] = $dados[Constantes::DS_ENDERECO];
            $endereco[Constantes::DS_COMPLEMENTO] = $dados[Constantes::DS_COMPLEMENTO];
            $endereco[Constantes::DS_BAIRRO] = $dados[Constantes::DS_BAIRRO];
            $endereco[Constantes::NO_CIDADE] = $dados[Constantes::NO_CIDADE];
            $endereco[Constantes::NU_CEP] = Valida::RetiraMascara($dados[Constantes::NU_CEP]);
            $endereco[Constantes::SG_UF] = $dados[Constantes::SG_UF][0];

            $contato[Constantes::DS_EMAIL] = trim($dados[Constantes::DS_EMAIL]);
            $contato[Constantes::NU_TEL1] = Valida::RetiraMascara($dados[Constantes::NU_TEL1]);
            $contato[Constantes::NU_TEL2] = Valida::RetiraMascara($dados[Constantes::NU_TEL2]);

            $pessoa[Constantes::NO_PESSOA] = strtoupper(trim($dados[Constantes::NO_PESSOA]));
            $pessoa[Constantes::NU_CPF] = Valida::RetiraMascara($dados[Constantes::NU_CPF]);
            $pessoa[Constantes::NU_RG] = Valida::RetiraMascara($dados[Constantes::NU_RG]);
            $pessoa[Constantes::DT_NASCIMENTO] = Valida::DataDBDate($dados[Constantes::DT_NASCIMENTO]);
            $pessoa[Constantes::ST_SEXO] = $dados[Constantes::ST_SEXO][0];
            
            
            
            
            
            
            
            
            
            
            
            
            
            debug($dados);

            $dados['dt_cadastro'] = Valida::DataAtualBanco();
            $dados['dt_nascimento'] = explode(' ', Valida::DataDB($dados['dt_nascimento']));
            $dados['dt_nascimento'] = $dados['dt_nascimento'][0];
            $dados['nu_camisa'] = $dados['nu_camisa'][0];
            $dados['ds_retiro'] = FuncoesSistema::retornoCheckbox((isset($dados['ds_retiro'])) ? $dados['ds_retiro'] : null);
            $dados['ds_pastoral_ativo'] = FuncoesSistema::retornoCheckbox((isset($dados['ds_pastoral_ativo'])) ? $dados['ds_pastoral_ativo'] : null);
            $dados['ds_membro_ativo'] = FuncoesSistema::retornoCheckbox((isset($dados['ds_membro_ativo'])) ? $dados['ds_membro_ativo'] : null);
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
    
    static function montaComboCamisas(){
         return array(
            "" => "Selecione um Tamanho",
            "1" => "BL PP",
            "2" => "BL P",
            "3" => "BL M",
            "4" => "BL G",
            "5" => "BL GG",
            "6" => "P",
            "7" => "M",
            "8" => "G",
            "9" => "GG"
        );
    }
}