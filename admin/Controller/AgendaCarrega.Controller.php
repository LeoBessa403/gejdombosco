<?php
// CARREGA A AGENDA INICIALMENTE
include_once "../../library/Config.inc.php";
        
$result = AgendaModel::PesquisaAgendas();

$eventos = array();
foreach ($result as $value) {
     $evento = array(
                        'id' => (int) $value["co_agenda"],
                        'title' => strtoupper($value["no_categoria"])." - ".$value["ds_titulo"],
                        'start' => $value["dt_inicio"],
                        'end' => $value["dt_fim"],
                        'className' => $value["ds_cor"],
                        'allDay' => ($value["st_dia_todo"] == "N" ? FALSE : TRUE)
                );
    $eventos[] = $evento;
}

echo json_encode($eventos);
    
?>
   