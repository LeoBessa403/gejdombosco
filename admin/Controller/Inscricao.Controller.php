<?php

class Inscricao
{

    public function Index()
    {
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

}

?>
   