<?php

//Mostrar Errores
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', 'C:/xampp/htdocs/api-rest-php/php_error_log.php');


//REQUERIMIENTOS
require_once 'controllers/routes.controller.php';

$index = new ControllerRoutes();
$index->index();


?>