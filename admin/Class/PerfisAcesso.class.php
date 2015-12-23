<?php

/**
 * Check.class [ HELPER ]
 * Classe responável por manipular e validade dados do sistema!
 * 
 * @copyright (c) 2014, Leo Bessa
 */
class PerfisAcesso {
    
    /**** PERFIS ****/
   
    public static $Perfils = array(
        "1" => "Master",
        "2" => "Coordenador",
        "3" => "Líder",
        
        "30" => "Novato"
    );
    
    
    // Perfil Leo Bessa Total Acesso
    public $SuperPerfil                             = "1";
    public $PerfilAdministrador                     = "2";
    public $PerfilInicial                           = "30";
    
    public $ListarAuditoria                         = "2";
    public $DetalharAuditoria                       = "2";
    
    public $CadastroUsuario                         = "2";
    public $ListarUsuario                           = "2";
    public $MeuPerfilUsuario                        = "30,2";
    
    ///////////////// AÇÕES EDITÁVEIS //////////////////
    
    public $ListarMembros                           = "2,3";
    public $CadastroMembros                         = "2,3";
    public $ListarMembrosRetiro                     = "2,3";
    public $EditarMembros                           = "2,3";
    public $EditarMembro                            = "2,3";
        
    public $CadastroEventos                         = "2,3";
    public $ListarEventos                           = "2,3";
      
    
    
}
