var Calendar = function () {
    //function to initiate Full CAlendar
    var runCalendar = function () {
        var $modal = $('#event-management');
        $('#event-categories div.event-category').each(function () {
            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text() + " Novo") // use the element's text as the event title
            };
            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);
            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true, // will cause the event to go back to its
                revertDuration: 50 //  original position after the drag
            });
        });
        /* initialize the calendar
				 -----------------------------------------------------------------*/
        //VARIÁVEL GLOBAL
        var dados    = constantes();

        var home             = dados['HOME'];
        var urlCarregaTarefa = home + 'Admin/Controller/AgendaCarrega.Controller.php';
        var urlValida        = home + 'Admin/Controller/Ajax.Controller.php';
        
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var form = '';
        var calendar = $('#calendar').fullCalendar({
            buttonText: {
                prev: '<i class="fa fa-chevron-left"></i>',
                next: '<i class="fa fa-chevron-right"></i>'
            },
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            drop: function (date, allDay) { // this function is called when something is dropped
                // retrieve the dropped element's stored Event Object
                var originalEventObject = $(this).data('eventObject');
                var $categoryClass = $(this).attr('data-class');
                // we need to copy it, so that multiple events don't have a reference to the same object
                var copiedEventObject = $.extend({}, originalEventObject);
                // assign it the date that was reported
                copiedEventObject.start = date;
                copiedEventObject.allDay = allDay;
                if ($categoryClass)
                    copiedEventObject['className'] = [$categoryClass];
                // render the event on the calendar
                // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
                // is the "remove after drop" checkbox checked?
//                if ($('#drop-remove').is(':checked')) {
//                    // if so, remove the element from the "Draggable Events" list
//                    $(this).remove();
//                }
            },
            events: urlCarregaTarefa,
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            selectable: true,
            selectHelper: true,
            select: function (start) {  
                $modal.modal({
                    backdrop: 'static'
                });
                Calendar.limpaForm();
                
                dia = start.getDate();
                mes = (start.getMonth()+1);
                if(dia < 10){
                    dia = '0'+dia;
                }
                if(mes < 10){
                    mes = '0'+mes;
                }
                $modal.find('form:reset');
                dt_inicio = dia+'/'+mes+'/'+start.getFullYear();
                hora_inicio = '20:00';
                
                $modal.find('#dt_inicio').val(dt_inicio);
                $modal.find('#hr_inicio').val(hora_inicio);
            },
            eventClick: function (calEvent) {
                $modal.modal({
                    backdrop: 'static'
                });
                Calendar.limpaForm();

                $.get(urlValida, {valida: 'pesquisa_tarefa', co_tarefa: calEvent.id}, function(retorno) {
                    var agenda = jQuery.parseJSON(retorno);
                    
                    $modal.find('#dt_inicio').val(agenda.dt_inicio);
                    $modal.find('#hr_inicio').val(agenda.hr_inicio);
                    $modal.find('#dt_fim').val(agenda.dt_fim);
                    $modal.find('#hr_fim').val(agenda.hr_fim);
                    
                    $modal.find('#ds_titulo').val(agenda.ds_titulo);
                    $modal.find('#co_agenda').val(agenda.co_agenda);
                    $modal.find('#ds_descricao').val(agenda.ds_descricao);
                    $modal.find('#co_evento').val(agenda.co_evento);
                    
                    $modal.find("#co_categoria").val(agenda.co_categoria).attr('selected',true);
                    
                    
                    $modal.find('#st_status').val(agenda.st_status);
                    $modal.find('#dt_cadastro').val(agenda.dt_cadastro);
                    
                });
            },
        });
    };
    return {
        init: function () {
            runCalendar();
        },
        limpaForm: function () {
            var $modal = $('#event-management');
            
            $modal.find('#dt_inicio').val('');
            $modal.find('#hr_inicio').val('');
            $modal.find('#dt_fim').val('');
            $modal.find('#hr_fim').val('');

            $modal.find('#ds_titulo').val('');
            $modal.find('#co_agenda').val('');
            $modal.find('#ds_descricao').val('');
            $modal.find('#co_evento').val('');

          //  $modal.find("#co_categoria").val(agenda.co_categoria).attr('selected',true);


            $modal.find('#st_status').val('');
            $modal.find('#dt_cadastro').val('');
                    
        },
    };
}();