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
    
        
 }