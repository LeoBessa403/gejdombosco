<?php

class Membro
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

        $formulario = new Form($id, "web/Index/CadastroRetiroCarnaval");

        $label_options = array("Sim", "Não", "azul", "verde");
        $formulario
            ->setLabel("Membro do Grupo GEJ?")
            ->setId("ds_membro_ativo")
            ->setType("checkbox")
            ->setOptions($label_options)
            ->CriaInpunt();

        $formulario
            ->setId("no_membro")
            ->setIcon("clip-user-6")
            ->setClasses("ob nome")
            ->setInfo("O Nome deve ser Completo Mínimo de 10 Caracteres")
            ->setLabel("Nome Completo")
            ->CriaInpunt();

        $formulario
            ->setId("ds_endereco")
            ->setLabel("Endereço")
            ->CriaInpunt();

        $formulario
            ->setId("ds_bairro")
            ->setLabel("Bairro")
            ->CriaInpunt();

        $formulario
            ->setId("nu_tel1")
            ->setTamanhoInput(4)
            ->setClasses("tel ob")
            ->setIcon("fa-mobile fa")
            ->setLabel("Tel. Celular 1")
            ->CriaInpunt();

        $formulario
            ->setId("nu_tel2")
            ->setTamanhoInput(4)
            ->setIcon("clip-phone-2")
            ->setClasses("tel")
            ->setLabel("Tel. Celular 2")
            ->CriaInpunt();

        $formulario
            ->setId("dt_nascimento")
            ->setIcon("clip-calendar-3")
            ->setTamanhoInput(4)
            ->setClasses("data ob")
            ->setInfo("Para maiores de 14 anos")
            ->setLabel("Nascimento")
            ->CriaInpunt();


        $label_options = array("Sim", "Não", "azul", "verde");
        $formulario
            ->setLabel("Participou de algum Retiro?")
            ->setTamanhoInput(5)
            ->setId("ds_retiro")
            ->setType("checkbox")
            ->setOptions($label_options)
            ->CriaInpunt();

        $label_options = array("Sim", "Não", "azul", "verde");
        $formulario
            ->setLabel("Participa de alguma Pastoral?")
            ->setId("ds_pastoral_ativo")
            ->setTamanhoInput(7)
            ->setType("checkbox")
            ->setOptions($label_options)
            ->CriaInpunt();

        $formulario
            ->setId("ds_pastoral")
            ->setLabel("Qual Pastoral?")
            ->CriaInpunt();

        $opticoes_camisa = array(
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

        $formulario
            ->setId("nu_camisa")
            ->setType("select")
            ->setTamanhoInput(12)
            ->setClasses("ob")
            ->setOptions($opticoes_camisa)
            ->setLabel("Tamanho da Camisa")
            ->CriaInpunt();

        $formulario
            ->setId("no_responsavel")
            ->setTamanhoInput(6)
            ->setClasses("ob nome")
            ->setLabel("Pessoa de Referência")
            ->setInfo("Para caso de EMERGÊNCIA")
            ->CriaInpunt();

        $formulario
            ->setId("nu_tel_responsavel")
            ->setTamanhoInput(6)
            ->setIcon("clip-phone-2")
            ->setClasses("tel ob")
            ->setLabel("Tel. Referência")
            ->CriaInpunt();


        $formulario
            ->setId("ds_email")
            ->setIcon("fa-envelope fa")
            ->setClasses("email")
            ->setLabel("Email")
            ->CriaInpunt();

        $this->form = $formulario->finalizaForm();
    }
}