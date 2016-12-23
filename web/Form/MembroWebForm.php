<?php

class MembroWebForm
{

    public static function Cadastrar()
    {
        $id = "CadastroRetiroCarnaval";

        $formulario = new Form($id, "web/Membro/CadastroRetiroCarnaval");

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
            ->setId(Constantes::NU_CPF)
            ->setClasses("cpf ob")
            ->setTamanhoInput(6)
            ->setLabel("CPF")
            ->CriaInpunt();

        $formulario
            ->setId(Constantes::NU_RG)
            ->setTamanhoInput(6)
            ->setClasses("numero")
            ->setLabel("RG")
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

        $formulario
            ->setId("ds_endereco")
            ->setLabel("Endereço")
            ->CriaInpunt();

        $formulario
            ->setId("ds_bairro")
            ->setLabel("Bairro")
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

        return $formulario->finalizaForm();
    }
}
?>
   