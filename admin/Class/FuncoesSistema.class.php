<?php

/**
 * Check.class [ HELPER ]
 * Classe responável por manipular e validade dados do sistema!
 * 
 * @copyright (c) 2014, Leo Bessa
 */
class FuncoesSistema {

    public static function retornoCheckbox($check){
        if($check):
            return "S";
        else:
            return "N";
        endif;
    }
    
    public static function OperacaoAuditoria($operacao){
        
        switch ($operacao) {
            case "I":
                $op = '<span class="label label-success">INSERIU</span>';
                break;
            case "D":
                $op = '<span class="label label-danger">DELETOU</span>';
                break;
            case "U":
                $op = '<span class="label label-warning">ATUALIZOU</span>';
                break;
        }
        
        return $op;
    }
    
    public static function SituacaoUsuario($st){
        
        switch ($st) {
            case "A":
                $op = '<span class="label label-success">ATIVO</span>';
                break;
            case "I":
                $op = '<span class="label label-danger">INATIVO</span>';
                break;
        }
        
        return $op;
    }
        
 }