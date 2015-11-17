<?php

/**
 * Check.class [ HELPER ]
 * Classe responável por manipular e validade dados do sistema!
 * 
 * @copyright (c) 2014, Leo Bessa
 */
class PerfisAcesso {
    
    /**** PERFIS ****/
    // 1 - MASTER
    // 2 - ADMINISTRADOR
    // 3 - CADASTRO CREDENCIADO
    
    
    // Perfil Leo Bessa Total Acesso
    public $SuperPerfil                             = "1";
    
    public $ListarAuditoria                         = "2";
    
    public $ListarMembros                           = "";
    public $ListarMembrosRetiro                     = "";
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
    
    
    public $CadastroVeterinario                     = "";
    public $ListarVeterinario                       = "";
    
    
    
}
