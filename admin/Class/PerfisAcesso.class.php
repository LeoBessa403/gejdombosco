<?php

/**
 * PerfisAcesso.class [ HELPER ]
 * Classe responável por manipular e validade o Perfil de Acesso dos Usuários do Sistema!
 * 
 * @copyright (c) 2015, Leo Bessa
 */
class PerfisAcesso {
    
    /**** PERFIS ****/
   
    public static $Perfils = array(
        "1"  => "Master",
        "2"  => "Coordenador",
        "3"  => "Membro",
        "4"  => "Líder Evento",
        "5"  => "Líder Música",
        "6"  => "Membro Música",
        "7"  => "Líder Teatro",
        "8"  => "Membro Teatro",
        "9"  => "Líder Animação",
        "10" => "Membro Animação",
        "11" => "Líder Ornamentação",
        "12" => "Membro Ornamentação",
        "13" => "Líder Formação",
        "14" => "Membro Formação",
        "15" => "Líder Intercessão",
        "16" => "Membro Intercessão",
        "17" => "Líder Comunicação",
        "18" => "Membro Comunicação",
        "19" => "Líder"
    );
    
    
    // Perfil Leo Bessa Total Acesso
    public $SuperPerfil                             = "1";
    public $PerfilAdministrador                     = "2";
    public $PerfilInicial                           = "3";
    public $TodosPerfis                             = "2,4,5,7,9,11,13,15,17,3,6,8,10,12,14,16,18,19";
    
    public $ListarAuditoria                         = "2";
    public $DetalharAuditoria                       = "2";
    
    public $CadastroUsuario                         = "2";
    public $ListarUsuario                           = "2";
    public $MeuPerfilUsuario                        = "3";
    
    ///////////////// AÇÕES EDITÁVEIS //////////////////
    
    //--------------- Todos Perfis -------------------//
    public $DetalharTarefa                          = "2,4,5,7,9,11,13,15,17,3,6,8,10,12,14,16,18,19";
    
    
    public $ListarMembros                           = "2";
    public $CadastroMembros                         = "2";
    public $ListarMembrosRetiro                     = "2,4";
    public $EditarMembros                           = "2";
    public $EditarMembro                            = "2";
    public $EditarMembroRetiro                      = "2,4";
        
    public $CadastroEvento                          = "2";
    public $ListarEvento                            = "2";
    
    public $CadastroTarefa                          = "2,4,5,7,9,11,13,15,17";
    public $ListarTarefa                            = "2,4,5,7,9,11,13,15,17";
    public $ExcluirTarefa                           = "2";
    
    public $Calendario                              = "";
    public $AdicionarCompromisso                    = "";
      
    
    
}
