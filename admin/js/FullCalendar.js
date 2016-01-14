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

        var home    = dados['HOME'];
        var urlValida = home + 'Admin/Controller/AgendaCarrega.Controller.php';
        
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
            events: urlValida,
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            selectable: true,
            selectHelper: true,
            select: function (start, end, allDay) {  alert(start);
                $modal.modal({
                    backdrop: 'static'
                });
                // CRIA O EVENTO
                $modal.find('form').on('submit', function () { 
                    title = $(this).find("input[name='ds_descricao']").val();
                   
                    $categoryClass = form.find("select[name='category'] option:checked").val();
                    if (title !== null) {
                        
//                        var dados = {
//                            titulo          : form.find("input[name='title']").val(),
//                            start           : form.find("input[name='title']").val(),
//                            end             : form.find("input[name='title']").val(),                                        
//                            allDay          : form.find("input[name='title']").val(),                                        
//                            descricao       : form.find("input[name='title']").val(),                                        
//                            categoria       : form.find("input[name='title']").val(),                                        
//                            participantes   : form.find("input[name='title']").val()                                        
//                        };
                        
                        
                        
                        calendar.fullCalendar('renderEvent', {
                                title: title,
                                start: start,
                                end: end,
                                allDay: allDay,
                                className: $categoryClass
                            }, true // make the event "stick"
                        );
                    }
                    $modal.modal('hide');
                    return false;
                });
                calendar.fullCalendar('unselect');
            },
            eventClick: function (calEvent, jsEvent, view) {
                $modal.modal({
                    backdrop: 'static'
                });
               
//                // EXCLUSÃO DO EVENTO
//                $modal.unbind('click').click(function () {
//                    exclusao(calEvent);
//                    $modal.modal('hide');
//                });
//                // ATUALIZA O EVENTO
//                $modal.find('form').on('submit', function () {
//                    calEvent.title = form.find("input[type=text]").val();
//                    calendar.fullCalendar('updateEvent', calEvent);
//                    $modal.modal('hide');
//                    return false;
//                });
            },
        });
    };
    return {
        init: function () {
            runCalendar();
        }
    };
}();