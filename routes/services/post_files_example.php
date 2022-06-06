<?php

require_once 'models/conexion.php';
require_once 'models/post.model.php';
require_once 'controllers/post.controller.php';


if (isset($_POST)) {

        $columns = array();

        foreach (array_keys($_POST) as $key => $value) {

                array_push($columns, $value);
        }

        //SI CARGAN UN ARCHIVO
        if (isset($_FILES)) {

                foreach (array_keys($_FILES) as $key => $value) {

                        array_push($columns, $value);
                }
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

        //SE GUARDA EL ARCHIVO
        if (isset($_FILES)) {

                $data = array();
                $aleatorio = mt_rand(100, 1000);

                foreach ($_POST as $key => $value) {
                        array_push($data, $value);
                }

                foreach ($_FILES as $key => $value) {


                        $ruta = 'files/' . $table;

                        if (!file_exists($ruta)) {
                                mkdir($ruta, 0777, true);
                        }


                        $name = $value['name'];
                        $fuente = $value['tmp_name'];
                        $newFilename =  $aleatorio . "_" . $name;
                        move_uploaded_file($fuente, $ruta . '/' . $newFilename);
                        $imagen = $ruta . '/' . $newFilename;

                        array_push($data, $imagen);
                }

                function combinarArrays($keyArray, $valueArray)
                {
                        if (is_array($keyArray)) {
                                foreach ($keyArray as $key => $value) {
                                        $filledArray[$value] = $valueArray[$key];
                                }
                        }
                        return $filledArray;
                }

                $datos = combinarArrays($columns, $data);
        }

        $response = new ControllerPost();

        //PETICIÓN POST PARA REGISTRAR USUARIO
        if (isset($_GET['register']) && $_GET['register'] == true) {
                $suffix = $_GET['suffix'] ?? "user";
                $response -> postRegister($table, $_POST, $suffix);

        } else {
                //SOLICITAMOS RESPUESTA DEL CONTROLADOR PARA CREAR DATOS EN CUALQUIER TABLA 
               
                if (isset($_FILES)) {

                        $response->postData($table, $datos);
                } else {
                        $response->postData($table, $_POST);
                }
        }
}
