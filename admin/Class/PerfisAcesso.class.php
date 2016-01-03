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
        "1" => "Master",
        "2" => "Coordenador",
        "3" => "Membro",
        "4" => "Líder Evento",
    );
    
    
    // Perfil Leo Bessa Total Acesso
    public $SuperPerfil                             = "1";
    public $PerfilAdministrador                     = "2";
    public $PerfilInicial                           = "3";
    
    public $ListarAuditoria                         = "2";
    public $DetalharAuditoria                       = "2";
    
    public $CadastroUsuario                         = "2";
    public $ListarUsuario                           = "2";
    public $MeuPerfilUsuario                        = "3,2";
    
    ///////////////// AÇÕES EDITÁVEIS //////////////////
    
    public $ListarMembros                           = "2";
    public $CadastroMembros                         = "2";
    public $ListarMembrosRetiro                     = "2,4";
    public $EditarMembros                           = "2";
    public $EditarMembro                            = "2";
    public $EditarMembroRetiro                      = "2,4";
        
    public $CadastroEventos                         = "2";
    public $ListarEventos                           = "2";
    
    
    public $Calendario                              = "";
      
    
    
}
