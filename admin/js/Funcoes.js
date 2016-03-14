var Funcoes = function () {
    var inicio = function () {
        
                //VARIÁVEIS GLOBAIS
                var dados       = constantes();
                var urlValida   = dados['HOME'] + 'admin/Controller/Ajax.Controller.php';
                var upload      = dados['PASTAUPLOADS'];
                
               // MASCARA DE CADASTRO DE LIVROS 
               $("#nu_ano_publicacao").mask("9999").change(function(){
                    var ano = $(this).val();
                    var Hoje     = new Date();
                    var AnoAtual = Hoje.getFullYear();
                    
                    if(ano > AnoAtual){
                        Funcoes.Alerta(Funcoes.MSG02);
                        $(this).val("");
                        return false;
                    }else if(ano < 1900){
                        Funcoes.Alerta(Funcoes.MSG03);
                        $(this).val("");
                        return false;
                    }
               });
               $("#nu_edicao").mask("9?99");
               $("#quantidade").mask("9?99");
               $("#nu_paginas").mask("9?99");
               
               
               $("#ds_pastoral_ativo").change(function(){
                   disabilitaCamposRetiro();
               })
                
                
                // CADASTRO De Retiro de Carnaval
                function disabilitaCamposRetiro(){ 
                    if($("#ds_pastoral_ativo").prop('checked')){
                        $("#ds_pastoral").parent(".form-group").slideDown("slow");
                    }else{
                        $("#ds_pastoral").parent(".form-group").slideUp("fast");
                    }
                }

                disabilitaCamposRetiro();
                
                
                
               $("#st_status").change(function(){
                   disabilitaDtTermino();
               })
                
                // CADASTRO de Tarefa
                function disabilitaDtTermino(){ 
                    if($("#st_status").val() == "C"){
                        $("#dt_conclusao").parent().parent(".form-group").slideDown("slow");
                        $("#dt_conclusao").addClass("ob");
                    }else if($("#st_status").val() == "I"){
                        $("#dt_conclusao").parent().parent(".form-group").slideUp("fast").removeClass("has-error");
                        $("#dt_conclusao").removeClass("ob");
                    }else{
                        $("#dt_conclusao").parent().parent(".form-group").slideUp("fast").removeClass("has-error");
                        $("#dt_conclusao").val("").removeClass("ob");
                    }
                       
                }

                disabilitaDtTermino();
                
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
               
               function verificaTodas(){
                    var todas = true;
                    $(".funcionalidade").each(function() { 
                        if(!$(this).prop('checked')){    
                            todas = false;
                        } 
                    });
                    if(todas){
                        $(".todas").prop("checked",true);
                    }else{
                        $(".todas").prop("checked",false);
                    }
               }
                
                
                // VINCULAÇÃO FUNCIONALIDADES AO PERFIL // BOTÃO TODOS FUNCIONALIDADES
                $(".todas").change(function(){
                    if($(this).prop('checked')){                 
                        $(".funcionalidade").each(function() {
                            $(this).prop("checked",true);
                        }); 
                    }else{
                        $(".funcionalidade").each(function() {
                            $(this).prop("checked",false);
                        }); 
                    }
                });

                // VINCULAÇÃO DA FUNCIONALIDADE AO PERFIL
                $(".funcionalidade").change(function(){ 
                    verificaTodas();
                });
                
                verificaTodas();
                
                
                // CARREGA MODAL DE FOTOS DO CLIENTE
                $(".fotos").click(function(){ 
                    var id = $(this).attr("id");
                    var title = $(this).attr("title");
                    $(".foto .modal-body.modal-body img").attr("src",""); 
                    $.ajax({
                        url: urlValida,
                        data: {valida: "capa_livro", id: id},
                        method: "GET",
                        type: 'json',
                        beforeSend: function(){
                             $("#load").click();
                        },
                        success: function(data){ 
                            $("#carregando .cancelar").click();
                            var objData = jQuery.parseJSON(data);
                            if(objData.ds_foto_capa){
                                $(".foto .modal-header .modal-title").text(title); 
                                $(".foto .modal-body.modal-body img").attr("src","../../" + upload + objData.ds_foto_capa);
                                $("#fotos").click();
                            }else{
                                Funcoes.Alerta(Funcoes.MSG04);
                            }
                        }
                    });
               });  
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
        Erro: function(msg){
            $(".aviso .modal-header").removeClass().addClass("modal-header btn btn-bricky");
            $(".aviso #icone").removeClass().addClass("btn btn-bricky");
            $(".aviso i").removeClass().addClass("fa fa-frown-o");
            $(".aviso .modal-header .modal-title").text("Erro");
            $(".aviso #confirmacao_msg b").html(msg);
            $("#aviso").click();
        },
        
        MSG_CONFIRMACAO: "CONFIRMAÇÃO",
        
        MSG01: "Sua Idade Não é Permitida.",
        MSG02: "Ano de publicação não pode ser maior que o ano atual.",
        MSG03: "Ano de publicação não pode ser menor que o ano de 1900.",
        MSG04: "Livro sem Foto de Capa",
        
    };
}();

