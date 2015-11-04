var Funcoes = function () {
    var inicio = function () {
        
                var home      = servidor_inicial();
                var upload    = home + pasta_upload();
                var urlValida = home + 'admin/Controller/Ajax.Controller.php';

//               $("#ds_membro_ativo").change(function(){
//                   disabilitaCamposCredenciados();
//               })
//                
//                
//                // CADASTRO DE CREDENCIADO
//                function disabilitaCamposCredenciados(){ 
//                     if($("#ds_membro_ativo").prop('checked')){
//                         $("#ds_situacao_atual_grupo").attr("disabled",false);
//                     }else{
//                         $("#ds_situacao_atual_grupo").attr("disabled",true).val("");
//                     }
//                }
//
//                disabilitaCamposCredenciados();

                
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
        
        MSG01: "Ano menor que o Permitido!",
        MSG02: "Sem Vinculo",
        MSG03: "Erro ao Vincular!",
        MSG04: "A Vinculação do Veterinário ao Credenciado, Foi realizada com Sucesso!",
        MSG05: "Esse Cliente não possui fotos!",
        
    };
}();

