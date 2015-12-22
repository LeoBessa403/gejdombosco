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
    
    public $ListarAuditoria                         = "2";
    public $DetalharAuditoria                       = "2";
    
    public $ListarMembros                           = "";
    public $CadastroMembros                         = "";
    public $ListarMembrosRetiro                     = "";
    public $EditarMembros                           = "";
    public $EditarMembro                            = "";
        
    public $CadastroEventos                         = "";
    public $ListarEventos                           = "";
    
    public $CadastroCredenciado                     = "";
    public $ListarCredenciado                       = "";
    public $ProcedimentosAtendidos                  = "";
    public $ListarProcedimentosCredenciado          = "";
    
    public $EdicaoCredenciado                       = "";
    
    public $CadastroPlano                           = "";
    public $ListarPlano                             = "";
    public $ProcedimentosPlano                      = "";
    public $ListarProcedimentosPlano                = "";
    public $ExportarPlano                           = "";
    
    
    public $CadastroProcedimento                    = "";
    public $ListarProcedimento                      = "";
    public $ExportarProcedimento                    = "";
    
    
    public $CadastroRaca                            = "";
    public $ListarRaca                              = "";
    
    
    public $CadastroTitular                         = "";
    public $ListarTitular                           = "";
    
    
    public $CadastroUsuario                         = "";
    public $ListarUsuario                           = "";
    public $MeuPerfilUsuario                        = "100";
    
    
    public $CadastroVeterinario                     = "";
    public $ListarVeterinario                       = "";
    
    
    
}
