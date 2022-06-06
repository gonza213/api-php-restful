<?php

require_once "models/conexion.php";

$routesArray = explode('/', $_SERVER['REQUEST_URI']);
$routesArray = array_filter($routesArray);

//CUANDO NO SE REALIZA NINGUNA PETICION LA LA API
//Dominio produccion
// if (count($routesArray) == 0) {}
//Dominio Desarrollo
if (count($routesArray) < 2) {

    $json = array(
        'status' => 404,
        'result' => 'Not found'
    );

    echo json_encode($json, http_response_code($json['status']));

    return;
}

//CUANDO SE REALIZA UNA PETICION A LA API
//Dominio produccion
// if(count($routesArray) == 1 && isset($_SERVER['REQUEST_METHOD'])) {}
//Dominio Desarrollo
if (count($routesArray) == 2 && isset($_SERVER['REQUEST_METHOD'])) {

    //Dominio produccion
    // $table = explode("?", $routesArray[1])[0];
    //Dominio desarrollo
    $table = explode("?", $routesArray[2])[0];

    //VALIDAR LLAVE SECRETA
    if (!isset(getallheaders()["Authorization"]) || getallheaders()["Authorization"] != Conexion::apiKey()) {


        $json = array(
            'status' => 404,
            'result' => 'You are not authorized to make this request'
        );

        echo json_encode($json, http_response_code($json['status']));

        return;
    }

    //PETICION GET
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        include 'services/get.php';
    }

    //PETICION POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        include 'services/post.php';
    }

    //PETICION PUT
    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {

        include 'services/put.php';
    }

    //PETICION DELETE
    if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

        include 'services/delete.php';
    }
}
