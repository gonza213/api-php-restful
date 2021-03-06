<?php

require_once 'models/conexion.php';
require_once 'models/put.model.php';
require_once 'controllers/put.controller.php';


if (isset($_GET['id']) && isset($_GET['id_name'])) {


    //CAPTURAMOS LOS DATOS DEL FORMULARIO
    $data = array();
    parse_str(file_get_contents('php://input'), $data);

    // echo '<pre>'; print_r(fopen('php://input', 'r')); echo '</pre>';
    // return;

    //SEPARAR PROPIEDADES DE UN ARREGLO
    $columns = array();
    foreach (array_keys($data) as $key => $value) {
        array_push($columns, $value);
    }

    array_push($columns, $_GET['id_name']);
    $columns = array_unique($columns);


    // VALIDAR LAS TABLAS Y LAS COLUMNAS
    if (empty(Conexion::getColumnsData($table, $columns))) {

        $json = array(
            'status' => 404,
            'result' => 'Error: Fields in the forms do not match the database'
        );

        echo json_encode($json, http_response_code($json['status']));

        return;
    }




    if (isset($_GET['token'])) {

        if ($_GET['token'] && isset($_GET['except'])) {

            $columns = array($_GET['except']);

            //VALIDAR LAS TABLAS Y LAS COLUMNAS
            if (empty(Conexion::getColumnsData($table, $columns))) {

                $json = array(
                    'status' => 404,
                    'result' => 'Error: Fields in the forms do not match the database'
                );

                echo json_encode($json, http_response_code($json['status']));

                return;
            }


            //SOLICITAMOS RESPUESTA DEL CONTROLADOR PARA EDITAR DATOS EN CUALQUIER TABLA 
            $response = new ControllerPut();
            $response->putData($table, $data, $_GET['id'], $_GET['id_name']);
        } else {

                //PETICIÓN PARA USUARIOS AUTORIZADOS
            $tableToken = $_GET['table'] ?? 'users';


            $validate = Conexion::tokenValidate($_GET['token'], $tableToken);


            if ($validate == "ok") {

                //SOLICITAMOS RESPUESTA DEL CONTROLADOR PARA EDITAR DATOS EN CUALQUIER TABLA 
                $response = new ControllerPut();
                $response->putData($table, $data, $_GET['id'], $_GET['id_name']);

                //ERROR: TOKEN EXPIRADO
            } else if ($validate == "expired") {

                $json = array(
                    'status' => 303,
                    'result' => 'Error: The token has expired'
                );

                echo json_encode($json, http_response_code($json['status']));

                return;

                //ERROR: TOKEN NO AUTORIZADO
            } else if ($validate == "no-auth") {

                $json = array(
                    'status' => 400,
                    'result' => 'Error: The user is not authorized'
                );

                echo json_encode($json, http_response_code($json['status']));

                return;
            }
        }
    } else {


        $json = array(
            'status' => 400,
            'result' => 'Error: Authorized required'
        );

        echo json_encode($json, http_response_code($json['status']));

        return;
    }
}
