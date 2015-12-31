<?php
          
class Auditoria{
    
    public $result;
      
    
    function ListarAuditoria(){     
        $this->result = AuditoriaModel::PesquisaAuditoria();
    }
    
    function DetalharAuditoria(){     
        $id = UrlAmigavel::PegaParametro("aud");
        $this->result = AuditoriaModel::PesquisaUmaAuditoria($id);
        $this->result = $this->result[0];
        $perfis = UsuarioModel::PesquisaPerfilUsuarios($this->result["co_usuario"]);
        $cont = false;
        $meuPerfil = "";
        foreach ($perfis as $resUser):
            if($cont):
                $meuPerfil .= ", ";
            endif;
            $meuPerfil .= $resUser["co_perfil"];
            $cont = true;
        endforeach;
        $this->result[CAMPO_PERFIL] = $meuPerfil;
    }
    
    
    
}
?>
   