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
    
    public static function SituacaoSimNao($st){
        if(!$st):
            $st = "N";
        endif;
        switch ($st) {
            case "S":
                $op = '<span class="label label-success">SIM</span>';
                break;
            case "N":
                $op = '<span class="label label-danger">NÂO</span>';
                break;
        }
        
        return $op;
    }
    
    public static function TamanhoCamisa($tm){
        
        switch ($tm) {
            case 1:
                $op = 'BL PP';
                break;
            case 2:
                $op = 'BL P';
                break;
            case 3:
                $op = 'BL M';
                break;
            case 4:
                $op = 'BL G';
                break;
            case 5:
                $op = 'BL GG';
                break;
            case 6:
                $op = 'P';
                break;
            case 7:
                $op = 'M';
                break;
            case 8:
                $op = 'G';
                break;
            case 9:
                $op = 'GG';
                break;
        }
        
        return $op;
    }
        
 }