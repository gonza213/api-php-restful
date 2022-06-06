<?php

require_once 'models/conexion.php';
require_once 'models/delete.model.php';
require_once 'controllers/delete.controller.php';


if (isset($_GET['id']) && isset($_GET['id_name'])) {


    $columns = array($_GET['id_name']);

    //VALIDAR LAS TABLAS Y LAS COLUMNAS
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


            //SOLICITAMOS RESPUESTA DEL CONTROLADOR PARA ELIMINAR DATOS EN CUALQUIER TABLA 
            $response = new ControllerDelete();
            $response->deleteData($table, $_GET['id'], $_GET['id_name']);
        } else {

               //PETICIÓN PARA USUARIOS AUTORIZADOS
            $tableToken = $_GET['table'] ?? 'users';

            $validate = Conexion::tokenValidate($_GET['token'], $tableToken);


            //TOKEN CORRECTO
            if ($validate == "ok") {

                //SOLICITAMOS RESPUESTA DEL CONTROLADOR PARA ELIMINAR DATOS EN CUALQUIER TABLA 
                $response = new ControllerDelete();
                $response->deleteData($table, $_GET['id'], $_GET['id_name']);

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
