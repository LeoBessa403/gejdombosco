<?php

class UsuarioView
{

    public static function Cadastrar()
    {
        $id = "CadastroUsuario";

        /** @var Form $formulario */
        $formulario = new Form($id, "admin/Index/Registrar", 'Cadastrar', 12);

        $formulario
            ->setId(Constantes::NO_PESSOA)
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
            ->setLabel("RG")
            ->CriaInpunt();

        $formulario
            ->setId(Constantes::DT_NASCIMENTO)
            ->setTamanhoInput(6)
            ->setClasses("data ob")
            ->setLabel("Nascimento")
            ->setInfo("Data de Nascimento")
            ->CriaInpunt();

        $label_options = array("" => "Selecione um", "M" => "Masculino", "F" => "Feminino");
        $formulario
            ->setLabel("Sexo")
            ->setId(Constantes::ST_SEXO)
            ->setClasses("ob")
            ->setType("select")
            ->setTamanhoInput(6)
            ->setOptions($label_options)
            ->CriaInpunt();

        $formulario
            ->setId(Constantes::DS_EMAIL)
            ->setIcon("fa-envelope fa")
            ->setClasses("email ob")
            ->setLabel("Email")
            ->CriaInpunt();

        $formulario
            ->setId(Constantes::NU_TEL1)
            ->setTamanhoInput(6)
            ->setIcon("fa fa-mobile-phone")
            ->setLabel("Telefone Celular")
            ->setInfo("Com o Whatsapp")
            ->setClasses("tel ob")
            ->CriaInpunt();

        $formulario
            ->setId(Constantes::NU_TEL2)
            ->setTamanhoInput(6)
            ->setIcon("fa fa-mobile-phone")
            ->setLabel("Telefone Celular 2")
            ->setClasses("tel")
            ->CriaInpunt();

        $formulario
            ->setId(Constantes::DS_ENDERECO)
            ->setIcon("clip-home-2")
            ->setClasses("ob")
            ->setLabel("Endereço")
            ->CriaInpunt();

        $formulario
            ->setId(Constantes::DS_COMPLEMENTO)
            ->setLabel("Complemento")
            ->CriaInpunt();

        $formulario
            ->setId(Constantes::DS_BAIRRO)
            ->setLabel("Bairro")
            ->CriaInpunt();

        $formulario
            ->setId(Constantes::NO_CIDADE)
            ->setLabel("Cidade")
            ->CriaInpunt();

        $formulario
            ->setId(Constantes::NU_CEP)
            ->setLabel("CEP")
            ->setTamanhoInput(4)
            ->setClasses("cep")
            ->CriaInpunt();

        $options = Endereco::montaComboEstadosDescricao();
        $formulario
            ->setTamanhoInput(8)
            ->setId(Constantes::SG_UF)
            ->setType("select")
            ->setClasses("ob")
            ->setLabel("Estado")
            ->setOptions($options)
            ->CriaInpunt();

        $formulario
            ->setId(Constantes::DS_SENHA)
            ->setClasses("ob senha")
            ->setTamanhoInput(6)
            ->setType("password")
            ->setLabel("Senha")
            ->CriaInpunt();

        $formulario
            ->setId("ds_senha_confirma")
            ->setClasses("ob confirma-senha")
            ->setTamanhoInput(6)
            ->setType("password")
            ->setLabel("Confirmação da Senha")
            ->CriaInpunt();

        $formulario
            ->setId(Constantes::DS_CAMINHO)
            ->setType("singlefile")
            ->setInfo("Caso queira troca de foto")
            ->setLabel("Foto de Perfil")
            ->CriaInpunt();

        return $formulario->finalizaForm();
    }

}

?>
   