var Funcoes = function () {
    var inicio = function () {
        
                var home      = servidor_inicial();
                var upload    = home + pasta_upload();
                var urlValida = home + 'admin/Controller/Ajax.Controller.php';

               $("#ds_membro_ativo").change(function(){
                   disabilitaCamposCredenciados();
               })
                
                
                // CADASTRO De Retiro - Abastecimento
                function disabilitaCamposRetiro(){ 
                    if($("#ds_membro_ativo").prop('checked')){
                        $("#ds_situacao_atual_grupo").parent(".form-group").slideDown("slow");
                    }else{
                        $("#ds_situacao_atual_grupo").parent(".form-group").slideUp("fast");
                    }
                }

                disabilitaCamposRetiro();
                
                // Valida data Para Maiores de 14 Anos
                $("#dt_nascimento").change(function(){
                    var ano   = $(this).val().substring(6,10);
                    var Hoje     = new Date();
                    var AnoAtual = Hoje.getFullYear();
                    var novoAno  = AnoAtual - 14;
                    
                    if(ano > novoAno){
                        Funcoes.Alerta(Funcoes.MSG01);
                        $(this).val("");
                        $(".dt_nascimento").parent(".form-group").addClass('has-error').removeClass('has-success');
                        $('span#dt_nascimento-info').text("Para maiores de 14 anos");
                        return false;
                    }
               })
                

                
    };
    return {
        init: function () {
            inicio();
        },
        Alerta: function(msg){
            $(".aviso .modal-header").removeClass().addClass("modal-header btn btn-warning");
            $(".aviso #icone").removeClass().addClass("btn btn-yellow");
            $(".aviso i").removeClass().addClass("fa fa-exclamation-triangle");
            $(".aviso .modal-header .modal-title").text("ALERTA");
            $(".aviso #confirmacao_msg b").html(msg);
            $("#aviso").click();
        },
        Sucesso: function(msg){
            $(".aviso .modal-header").removeClass().addClass("modal-header btn btn-success");
            $(".aviso #icone").removeClass().addClass("btn btn-green");
            $(".aviso i").removeClass().addClass("fa fa-check")
            $(".aviso .modal-header .modal-title").text("SUCESSO");
            $(".aviso #confirmacao_msg b").html(msg);
            $("#aviso").click();
        },
        Informativo: function(msg){
            $(".aviso .modal-header").removeClass().addClass("modal-header btn btn-info");
            $(".aviso #icone").removeClass().addClass("btn btn-primary");
            $(".aviso i").removeClass().addClass("fa fa-info-circle");
            $(".aviso .modal-header .modal-title").text("INFORMATIVO");
            $(".aviso #confirmacao_msg b").html(msg);
            $("#aviso").click();
        },
        
        MSG_CONFIRMACAO: "CONFIRMAÇÃO",
        
        MSG01: "Sua Idade Não é Permitida.",
        
    };
}();

