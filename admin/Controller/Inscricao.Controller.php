<?php

class Inscricao
{

    public function Index()
    {
    }

    public function DetalharInscricao()
    {
        $id = "DetalharInscricao";

        $coInscricao = UrlAmigavel::PegaParametro("insc");
        $res = array();
        if ($coInscricao):
            $InscricaoModel = new InscricaoModel();
            /** @var InscricaoEntidade $inscricao */
            $inscricao = $InscricaoModel->PesquisaUmQuando([Constantes::CO_INSCRICAO => $coInscricao]);

//            debug($inscricao);

            $res['ds_Mebro_Gej'] = FuncoesSistema::SituacaoSimNao($inscricao->getDsMembroAtivo());
            $res[Constantes::CO_INSCRICAO] = $inscricao->getCoInscricao();
            $res[Constantes::NO_PESSOA] = $inscricao->getCoPessoa()->getNoPessoa();
            $res[Constantes::NU_TEL1] = Valida::MascaraTel($inscricao->getCoPessoa()->getCoContato()->getNuTel1());
            $res[Constantes::NU_TEL2] = Valida::MascaraTel($inscricao->getCoPessoa()->getCoContato()->getNuTel2());
            $res[Constantes::NU_CPF] = Valida::MascaraCpf($inscricao->getCoPessoa()->getNuCpf());
            $res[Constantes::NU_RG] = $inscricao->getCoPessoa()->getNuRg();
            $res[Constantes::DT_NASCIMENTO] = Valida::DataShow($inscricao->getCoPessoa()->getDtNascimento());
            $res[Constantes::ST_SEXO] = FuncoesSistema::retornoSexo($inscricao->getCoPessoa()->getStSexo());

            $res[Constantes::DS_EMAIL] = $inscricao->getCoPessoa()->getCoContato()->getDsEmail();
            $res[Constantes::NO_RESPONSAVEL] = $inscricao->getNoResponsavel();
            $res[Constantes::NU_TEL_RESPONSAVEL] = Valida::MascaraTel($inscricao->getNuTelResponsavel());
            $res[Constantes::DS_PASTORAL] = $inscricao->getDsPastoral();

            $res[Constantes::DS_ENDERECO] = $inscricao->getCoPessoa()->getCoEndereco()->getDsEndereco();
            $res[Constantes::DS_COMPLEMENTO] = $inscricao->getCoPessoa()->getCoEndereco()->getDsComplemento();
            $res[Constantes::DS_BAIRRO] = $inscricao->getCoPessoa()->getCoEndereco()->getDsBairro();
            $res[Constantes::NO_CIDADE] = $inscricao->getCoPessoa()->getCoEndereco()->getNoCidade();
            $res[Constantes::NU_CEP] = $inscricao->getCoPessoa()->getCoEndereco()->getNuCep();
            $res[Constantes::SG_UF] = $inscricao->getCoPessoa()->getCoEndereco()->getSgUf();
        endif;

        $this->result = $res;
    }

    public function ListarInscricao()
    {
        $inscricaoModel = new InscricaoModel();
        $dados = array();
        $session = new Session();

        if ($session->CheckSession(PESQUISA_AVANCADA)) {
            $session->FinalizaSession(PESQUISA_AVANCADA);
        }
        if (!empty($_POST)) {
//            $dados = array(
//                Constantes::NO_PESSOA => trim($_POST[Constantes::NO_PESSOA]),
//                Constantes::NU_CPF => Valida::RetiraMascara($_POST[Constantes::NU_CPF]),
//            );
//            $session->setSession(PESQUISA_AVANCADA, $dados);
//            $pessoaModel = new PessoaModel();
//            $pessoas = $pessoaModel->PesquisaTodos($dados);
//            $todos = array();
//            foreach ($pessoas as $pessoa) {
//                $todos[] = $pessoa->getCoInscricao()->getCoInscricao();
//            }
//            if ($todos) {
//                $usuarios[Constantes::CO_USUARIO] = implode(', ', $todos);
//                $this->result = $usuarioModel->PesquisaTodos($usuarios);
//            } else {
//                $this->result = array();
//            }
        } else {
            $this->result = $inscricaoModel->PesquisaTodos($dados);
        }
    }

    // AÇÃO DE EXPORTAÇÃO
    public function ExportarListarInscricao()
    {
//        $usuarioModel = new InscricaoModel();
//        $session = new Session();
//        if ($session->CheckSession(PESQUISA_AVANCADA)) {
//            $dados = $session->getSession(PESQUISA_AVANCADA);
//            $pessoaModel = new PessoaModel();
//            $pessoas = $pessoaModel->PesquisaTodos($dados);
//            foreach ($pessoas as $pessoa) {
//                $todos[] = $pessoa->getCoInscricao()->getCoInscricao();
//            }
//            $usuarios[Constantes::CO_USUARIO] = implode(', ', $todos);
//            $result = $usuarioModel->PesquisaTodos($usuarios);
//        } else {
//            $result = $usuarioModel->PesquisaTodos();
//        }
//        $formato = UrlAmigavel::PegaParametro("formato");
//        $i = 0;
//        /** @var InscricaoEntidade $value */
//        foreach ($result as $value) {
//            $res[$i][Constantes::NO_PESSOA] = $value->getCoPessoa()->getNoPessoa();
//            $res[$i][Constantes::NU_CPF] = Valida::MascaraCpf($value->getCoPessoa()->getNuCpf());
//            $res[$i][Constantes::ST_STATUS] = FuncoesSistema::SituacaoInscricao($value->getStStatus());
//            $i++;
//        }
//        $Colunas = array('Nome', 'CPF', 'Status');
//        $exporta = new Exportacao($formato);
//        // $exporta->setPapelOrientacao("paisagem");
//        $exporta->setColunas($Colunas);
//        $exporta->setConteudo($res);
//        $exporta->GeraArquivo();
    }

    public function ListarInscricaoPesquisaAvancada()
    {
//        echo InscricaoForm::Pesquisar();
    }

    public static function FormasDePagamento()
    {
        $tipoPagametnoModel = new TipoPagamentoModel();
        $tipos = $tipoPagametnoModel->PesquisaTodos();
        /** @var TipoPagamentoEntidade $forma */
        foreach ($tipos as $forma) {
            $pagamentos[$forma->getCoTipoPagamento()] = $forma->getDsTipoPagamento();
        }
        return $pagamentos;
    }

}

?>
   