<?php

class UsuarioModel{
    
    public static function CadastraUsuario(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar(Constantes::USUARIO_TABELA, $dados);
        return $cadastro->getUltimoIdInserido();
    }
    
    public static function CadastraUsuarioPerfil(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar(Constantes::USUARIO_PERFIL_TABELA, $dados);
        return $cadastro->getUltimoIdInserido();
    }
    
    public static function PesquisaUsuarios(array $dados){
        $pesquisa = new Pesquisa();
        $where = $pesquisa->getClausula($dados);
        
        $us = $_SESSION[SESSION_USER];                                                                    
        $user = $us->getUser();
        $perfis = $user[md5(CAMPO_PERFIL)];
        
        $Operfil = new PerfisAcesso();
        $perfil = explode(",", $perfis);
        $controle = false;
        if(!in_array($Operfil->SuperPerfil, $perfil)):
            if($where):
                $where .= " and ";
            else:
                $where .= "where ";
            endif;
             $where .= Constantes::USUARIO_CHAVE_PRIMARIA." != ".$Operfil->SuperPerfil;
        endif;
        $pesquisa->Pesquisar(Constantes::USUARIO_TABELA,$where);
        return $pesquisa->getResult();
    }
    
      public static function PesquisaPerfilUsuarios($coUsuario){
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar(Constantes::USUARIO_PERFIL_TABELA,"where ".Constantes::USUARIO_CHAVE_PRIMARIA." = :id", "id={$coUsuario}");
        return $pesquisa->getResult();
    }
    
    public static function PesquisaUsuarioCadastrado(array $dados){
        $pesquisa = new Pesquisa();
        foreach ($dados as $key => $value) {
            $where = "where ".$key." = '".$value."'";
        }
        $pesquisa->Pesquisar(Constantes::USUARIO_TABELA,$where);
        return $pesquisa->getResult();
    }
    
    public static function AtualizaUsuario(array $dados,$id){
        $atualiza = new Atualiza();
        $atualiza->Atualizar(Constantes::USUARIO_TABELA, $dados, "where ".Constantes::USUARIO_CHAVE_PRIMARIA." = :id", "id={$id}");
        return $atualiza->getResult();
    }
    
    public static function PesquisaUmUsuario($idUsuario){
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar(Constantes::USUARIO_TABELA,"where ".Constantes::USUARIO_CHAVE_PRIMARIA." = :id","id={$idUsuario}");
        return $pesquisa->getResult();
    }
    
    public static function DeletaUsuario($co_usuario){
        $deleta = new Deleta();
        $deleta->Deletar(Constantes::USUARIO_PERFIL_TABELA, "where ".Constantes::USUARIO_CHAVE_PRIMARIA." = :usuario", "usuario={$co_usuario}");
        $deleta->Deletar(Constantes::USUARIO_TABELA, "where ".Constantes::USUARIO_CHAVE_PRIMARIA." = :usuario", "usuario={$co_usuario}");
        return $deleta->getResult();
    }
    
    public static function DeletaPerfisUsuario($co_usuario){
        $deleta = new Deleta();
        $deleta->Deletar(Constantes::USUARIO_PERFIL_TABELA, "where ".Constantes::USUARIO_CHAVE_PRIMARIA." = :usuario", "usuario={$co_usuario}");
        return $deleta->getResult();
    }
    
}