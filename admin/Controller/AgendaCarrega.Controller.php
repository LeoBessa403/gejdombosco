<?php
// CARREGA A AGENDA INICIALMENTE
include_once "../../library/Config.inc.php";
        
$result = AgendaModel::PesquisaAgendas();
$i = 0;
foreach ($result as $value) {
    $result[$i]["co_perfil"] = AgendaModel::PesquisaPerfilAgenda($value["co_agenda"]);
    $i++;
}
$result2 = FuncoesSistema::ValidaAgenda($result);

$eventos = array();
foreach ($result2 as $value) {
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
   