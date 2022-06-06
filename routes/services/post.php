<?php

require_once 'models/conexion.php';
require_once 'models/post.model.php';
require_once 'controllers/post.controller.php';


if (isset($_POST)) {

        $columns = array();

        foreach (array_keys($_POST) as $key => $value) {

                array_push($columns, $value);
        }


        //VALIDAR LAS TABLAS Y LAS COLUMNAS
        if (empty(Conexion::getColumnsData($table, $columns))) {

                $json = array(
                        'status' => 404,
                        'result' => 'Error: Fields in the forms do not match the database'
                );

                echo json_encode($json, http_response_code($json['status']));

                return;
        }



        $response = new ControllerPost();

        //PETICIÓN POST PARA REGISTRAR USUARIO
        if (isset($_GET['register']) && $_GET['register'] == true) {
                $suffix = $_GET['suffix'] ?? "user";
                $response->postRegister($table, $_POST, $suffix);
                //PETICIÓN POST PARA LOGEAR USUARIO
        } else if (isset($_GET['login']) && $_GET['login'] == true) {
                $suffix = $_GET['suffix'] ?? "user";
                $response->postLogin($table, $_POST, $suffix);
        } else {
           
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

                                //SOLICITAMOS RESPUESTA DEL CONTROLADOR PARA CREAR DATOS EN CUALQUIER TABLA 
                                $response->postData($table, $_POST);
                        } else {

                                //PETICIÓN PARA USUARIOS AUTORIZADOS

                                $tableToken = $_GET['table'] ?? 'users';

                                $validate = Conexion::tokenValidate($_GET['token'], $tableToken);

                                //TOKEN CORRECTO
                                if ($validate == "ok") {

                                        //SOLICITAMOS RESPUESTA DEL CONTROLADOR PARA CREAR DATOS EN CUALQUIER TABLA 
                                        $response->postData($table, $_POST);

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
}
