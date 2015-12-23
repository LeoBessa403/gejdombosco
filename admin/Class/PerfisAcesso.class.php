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
        "100" => "Usuário Inicial",
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
    
    ///////// AÇÕES EDITÁVEIS //////////////////////////
    
    public $ListarMembros                           = "";
    public $CadastroMembros                         = "";
    public $ListarMembrosRetiro                     = "";
    public $EditarMembros                           = "";
    public $EditarMembro                            = "";
        
    public $CadastroEventos                         = "";
    public $ListarEventos                           = "";
      
    
    
}
