<?php
          
class Index{
    
    public $Email;
            
    function Index(){
    }
    
    public static function Logar(){     
 // CLASSE DE LOGAR
        $login = Valida::LimpaVariavel($_POST['user']);
        $senha = Valida::LimpaVariavel($_POST['senha']);
        
         if(($login != "") && ($senha != "")):
            $acesso = new Pesquisa();

            $acesso->Pesquisar(TABLE_USER);
            $user = "";
            foreach ($acesso->getResult() as $result):
                if (($result[CAMPO_USER] == $login) && ($result[CAMPO_PASS] == $senha)):
                    $user = $result; 
                    break;
                endif;
            endforeach;

            if($user != ""):          
                $user["session_id"] = session_id();               
                $user["ultimo_acesso"] = strtotime(Valida::DataDB(Valida::DataAtual()));  
                
                $usuario = new Session();
                $usuario->setUser($user);
                $usuario->setSession(SESSION_USER,$usuario);
                echo "<script type='text/javascript'>"
                        . "window.location.href = '".HOME.ADMIN.LOGADO."';"
                     . "</script>";
            else:
                Redireciona(ADMIN.LOGIN."?o=alerta2");
            endif;
        else:
                Redireciona(ADMIN.LOGIN."?o=info2");
        endif;     
    }
    
    // EXEMPLO DE ENVIO DE EMAIL
    function EmailCliente(){
        $email = new Email();
        
        // Índice = Nome, e Valor = Email.
        $emails = array(
                "Leo Bessa Hot" => "leodjx@hotmail.com",
                "Lili Gmail" => "lililasp@gmail.com",
                "Lele Hot" => "lele.403@hotmail.com",
                "Leo Bessa Gmail" => "leonardomcbessa@gmail.com"
                );
        $Mensagem = "<h2>Olá vc ganhou um Bônus de 5 Milhões.... que piada</h2>";
        
        $email->setEmailDestinatario($emails)
              ->setTitulo("Email de  Teste Pra Todos")
              ->setMensagem($Mensagem);
        
        // Variável para validação de Emails Enviados com Sucesso.
        $this->Email = $email->Enviar();
    }
    
    
}
?>
   