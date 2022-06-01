<?php

require_once 'controllers/get.controller.php';
require_once 'models/get.model.php';


//Dominio produccion
// $table = explode("?", $routesArray[1])[0];
//Dominio desarrollo
$table = explode("?", $routesArray[2])[0];

//SELECT
$select = $_GET['select'] ?? "*";
//Order by
$order = $_GET['order'] ?? null;
$mode = $_GET['mode'] ?? null;
//Limit
$start = $_GET['start'] ?? null;
$end = $_GET['end'] ?? null;

$response = new ControllerGet();

//PETICIONES GET CON FILTRO
if(isset($_GET['column']) && isset($_GET['value']) && !isset($_GET['rel']) && !isset($_GET['type']) ){
    $response->getDataFilter($table, $select, $_GET['column'], $_GET['value'], $order, $mode, $start, $end);

    //PETICIONES GET SIN FILTRO ENTRE TABLAS RELACIONADAS
}else if(isset($_GET['rel']) && isset($_GET['type']) && $table == 'relations' && !isset($_GET['column']) && !isset($_GET['value'])){

    $response->getRelData($_GET['rel'], $_GET['type'], $select, $order, $mode, $start, $end);

    //PETICIONES GET CON FILTRO ENTRE TABLAS RELACIONADAS
}else if(isset($_GET['rel']) && isset($_GET['type']) && $table == 'relations' && isset($_GET['column']) && isset($_GET['value'])){

    $response->getRelDataFilter($_GET['rel'], $_GET['type'], $select, $_GET['column'], $_GET['value'], $order, $mode, $start, $end);

    //PETICIONES GET PARA EL BUSCADOR CON FILTRO O SIN FILTRO Y SIN RELACIONES
}else if(isset($_GET['column']) && isset($_GET['search']) && !isset($_GET['rel']) && !isset($_GET['type'])){
    $response->getDataSearch($table, $select, $_GET['column'], $_GET['search'], $order, $mode, $start, $end);
    
    //PETICIONES GET PARA EL BUSCADOR CON FILTRO Y CON RELACIONES
}else if(isset($_GET['column']) && isset($_GET['search']) && isset($_GET['rel']) && isset($_GET['type']) && $table == 'relations'){
    $response->getRelDataSearch($_GET['rel'], $_GET['type'], $select, $_GET['column'], $_GET['search'], $order, $mode, $start, $end);
}else{
//PETICIONES GET SIN FILTRO
    $response->getData($table, $select, $order, $mode, $start, $end);
}
