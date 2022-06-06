<?php

//Mostrar Errores
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', 'C:/xampp/htdocs/api-rest-php/php_error_log.php');

//CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Content-Type: application/json; charset=utf-8');


//REQUERIMIENTOS
require_once 'controllers/routes.controller.php';

$index = new ControllerRoutes();
$index->index();


?>