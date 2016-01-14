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
    
    public static function ValidaTarefa(array $res){
        
        $us = $_SESSION[SESSION_USER];                                                                    
        $user = $us->getUser();
        $Operfil = new PerfisAcesso();
        $meusPerfis = explode(",", $user[md5(CAMPO_PERFIL)]);
        
        $label_options = array();
        foreach ($res as $value) {
                if(in_array($Operfil->PerfilAdministrador, $meusPerfis)):
                    $label_options[] = $value;
                elseif(in_array($Operfil->SuperPerfil, $meusPerfis)):
                    $label_options[] = $value;
                elseif(in_array(4, $meusPerfis) && $value["co_evento"] == 3): // Evento que do Perfil Lider de Evento é Responsável
                    $label_options[] = $value;
                elseif(in_array(5, $meusPerfis) && in_array($value["co_perfil"], array(5,6))):
                    $label_options[] = $value;
                elseif(in_array(6, $meusPerfis) && $value["co_perfil"] == 6):
                    $label_options[] = $value;
                elseif(in_array(7, $meusPerfis) && in_array($value["co_perfil"], array(7,8))):
                    $label_options[] = $value;
                elseif(in_array(8, $meusPerfis) && $value["co_perfil"] == 8):
                    $label_options[] = $value;
                elseif(in_array(9, $meusPerfis) && in_array($value["co_perfil"], array(9,10))):
                    $label_options[] = $value;
                elseif(in_array(10, $meusPerfis) && $value["co_perfil"] == 10):
                    $label_options[] = $value;
                elseif(in_array(11, $meusPerfis) && in_array($value["co_perfil"], array(11,12))):
                    $label_options[] = $value;
                elseif(in_array(12, $meusPerfis) && $value["co_perfil"] == 12):
                    $label_options[] = $value;
                elseif(in_array(13, $meusPerfis) && in_array($value["co_perfil"], array(13,14))):
                    $label_options[] = $value;
                elseif(in_array(14, $meusPerfis) && $value["co_perfil"] == 14):
                    $label_options[] = $value;
                elseif(in_array(15, $meusPerfis) && in_array($value["co_perfil"], array(15,16))):
                    $label_options[] = $value;
                elseif(in_array(16, $meusPerfis) && $value["co_perfil"] == 16):
                    $label_options[] = $value;
                elseif(in_array(17, $meusPerfis) && in_array($value["co_perfil"], array(17,18))):
                    $label_options[] = $value;
                elseif(in_array(18, $meusPerfis) && $value["co_perfil"] == 18):
                    $label_options[] = $value;
                elseif(in_array(19, $meusPerfis) && $value["co_perfil"] == 19):
                    $label_options[] = $value;
                endif;
                
        }    
        
        return $label_options;
    }
    
    public static function StatusTarefa($status){
        
        switch ($status) {
            case "C":
                $st = '<i class="fa fa-check-circle alert-success"></i>';
                break;
            case "N":
                $st = '<i class="fa fa-exclamation-triangle alert-warning"></i>';
                break;
            case "A":
                $st = '<i class="fa fa-info-circle alert-info"></i>';
                break;
            case "I":
                $st = '<i class="fa fa-times-circle alert-danger"></i>';
                break;
        }
        
        return $st;
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
                $op = '<span class="label label-danger">NÃO</span>';
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