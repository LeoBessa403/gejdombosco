<?php

$mes = date("m");
$ano = date("Y");
echo json_encode(array(
	
		array(
			'id' => 111,
			'title' => "08:00 a 10:30 Event1",
			'start' => "$ano-$mes-10",
                        'className' => 'label-teal teste'
		),
		
		array(
			'id' => 222,
			'title' => "Event2",
			'start' => "$ano-$mes-20",
			'end' => "$ano-$mes-22",
                        'className' => 'label-green'
		),
    
		array(
			'id' => 333,
			'title' => "08:00 a 10:30 Event3",
			'start' => "$ano-$mes-15",
			'end' => "$ano-$mes-27",
                        'className' => 'label-default'
		)
    
	
));