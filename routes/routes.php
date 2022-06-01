<?php

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
        $json = array(
            'status' => 200,
            'result' => 'Solicitud PUT'
        );

        echo json_encode($json, http_response_code($json['status']));
    }

    //PETICION DELETE
    if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        $json = array(
            'status' => 200,
            'result' => 'Solicitud DELETE'
        );

        echo json_encode($json, http_response_code($json['status']));
    }
}
