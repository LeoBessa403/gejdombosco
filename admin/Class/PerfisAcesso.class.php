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
        "2" => "Administrador",
        "3" => "Cadastro Credenciado",
      "100" => "Novato",
    );
    
    
    // Perfil Leo Bessa Total Acesso
    public $SuperPerfil                             = "1";
    public $PerfilAdministrador                     = "2";
    public $PerfilInicial                           = "100";
    
    public $ListarAuditoria                         = "2";
    public $DetalharAuditoria                       = "2";
    
    public $CadastroUsuario                         = "2";
    public $ListarUsuario                           = "2";
    public $MeuPerfilUsuario                        = "100,2";
    
    ///////////////// AÇÕES EDITÁVEIS //////////////////
    
    public $ListarMembros                           = "2";
    public $CadastroMembros                         = "2";
    public $ListarMembrosRetiro                     = "2";
    public $EditarMembros                           = "2";
    public $EditarMembro                            = "2";
        
    public $CadastroEventos                         = "2";
    public $ListarEventos                           = "2";
      
    
    
}
