<?php

require_once 'models/conexion.php';
require_once 'models/get.model.php';
require_once 'models/put.model.php';
require_once 'vendor/autoload.php';

use Firebase\JWT\JWT;

class ControllerPost
{


    //PETICIÓN POST PARA CREAR DATOS
    static public function postData($table, $data)
    {
        $response = ModelPost::postData($table, $data);

        $return = new ControllerPost();
        $return->fncResponse($response, null);
    }


    //PETICIÓN POST PARA REGISTER
    static public function postRegister($table, $data, $suffix)
    {

        if (isset($data['password']) && $data['password'] != null) {
            $response = ModelGet::getDataFilter($table, "*", "email", $data['email'], null, null, null, null);
            if (!empty($response)) {
                $response = null;
                $return = new ControllerPost();
                $return->fncResponse($response, "Email exists");
            } else {
                $crypt = crypt($data['password'], '$2y$05$2ihDv8vVf7QZ9BsaRrKyqs2tkn55Yq');
                $data['password'] = $crypt;

                //COLOCAR FECHA
                foreach ($data as $key => $value) {

                    if ($data[$key] == 'date') {
                        $data[$key] = date('Y-m-d');
                    }
                }

                $response = ModelPost::postData($table, $data);

                $return = new ControllerPost();
                $return->fncResponse($response, null);
            }
        } else {

            //REGISTRO DE USUARIOS APP EXTERNAS
            $response = ModelPost::postData($table, $data);
            if (isset($response['comments']) && $response['comments'] == 'The processs was succesful') {
                //VALIDAR SI EL USUARIO EXISTE EN LA BD
                $response = ModelGet::getDataFilter($table, "*", "email", $data['email'], null, null, null, null);
                if (!empty($response)) {
                    $token = Conexion::jwt($response[0]->{'id_cliente'}, $response[0]->{'email'});
                    $key = "iIoV^@ibmTDI";
                    $jwt = JWT::encode($token, $key, 'HS256');
                    //ACTUALIZAMOS EL TOKEN DE USUARIOS DE APP EXTERNAS
                    $data = array(
                        "token" => $jwt,
                        "token_expired" => $token["exp"]
                    );

                    $update = ModelPut::putData($table, $data, $response[0]->{'id_cliente'}, "id_cliente");


                    if (isset($update['comments']) && $update['comments'] == 'The processs was succesful') {

                        $response[0]->{'token'} = $jwt;
                        $response[0]->{'token_expired'} = $token["exp"];

                        $return = new ControllerPost();
                        $return->fncResponse($response, null);
                    }
                }
            }
        }
    }

    //PETICIÓN POST LOGIN
    static public function postLogin($table, $data, $suffix)
    {

        //VALIDAR SI EL USUARIO EXISTE EN LA BD
        $response = ModelGet::getDataFilter($table, "*", "email", $data['email'], null, null, null, null);
        if (!empty($response)) {

            $key = "iIoV^@ibmTDI";

            if (!empty($response[0]->{'password'})) {

                if (!empty($data["password"])) {
                    $crypt = crypt($data['password'], '$2y$05$2ihDv8vVf7QZ9BsaRrKyqs2tkn55Yq');
                    //ENCRIPTAMOS LA CONTRASEÑA
                    if ($response[0]->{'password'} == $crypt) {
                        $token = Conexion::jwt($response[0]->{'id_cliente'}, $response[0]->{'email'});
                        $jwt = JWT::encode($token, $key, 'HS256');
                        //ACTUALIZAMOS EL TOKEN
                        $data = array(
                            "token" => $jwt,
                            "token_expired" => $token["exp"]
                        );

                        $update = ModelPut::putData($table, $data, $response[0]->{'id_cliente'}, "id_cliente");


                        if (isset($update['comments']) && $update['comments'] == 'The processs was succesful') {

                            $response[0]->{'token'} = $jwt;
                            $response[0]->{'token_expired'} = $token["exp"];

                            $return = new ControllerPost();
                            $return->fncResponse($response, null);
                        }
                    } else {
                        $response = null;
                        $return = new ControllerPost();
                        $return->fncResponse($response, "Wrong password");
                    }
                } else {
                    $response = null;
                    $return = new ControllerPost();
                    $return->fncResponse($response, "Enter Password");
                }
            } else {

                $token = Conexion::jwt($response[0]->{'id_cliente'}, $response[0]->{'email'});
                $jwt = JWT::encode($token, $key, 'HS256');
                //ACTUALIZAMOS EL TOKEN DE USUARIOS DE APP EXTERNAS
                $data = array(
                    "token" => $jwt,
                    "token_expired" => $token["exp"]
                );

                $update = ModelPut::putData($table, $data, $response[0]->{'id_cliente'}, "id_cliente");


                if (isset($update['comments']) && $update['comments'] == 'The processs was succesful') {

                    $response[0]->{'token'} = $jwt;
                    $response[0]->{'token_expired'} = $token["exp"];

                    $return = new ControllerPost();
                    $return->fncResponse($response, null);
                }
            }
        } else {
            $response = null;
            $return = new ControllerPost();
            $return->fncResponse($response, "Wrong email");
        }
    }



    //RESPUESTA DE CONTROLADORES
    public function fncResponse($response, $error)
    {

        if (isset($response[0]->{"password"})) {
            unset($response[0]->{"password"});
        }

        if (!empty($response)) {
            $json = array(
                'status' => 200,
                'results' => $response
            );
        } else {

            if ($error != null) {
                $json = array(
                    'status' => 404,
                    'results' => $error
                );
            } else {

                $json = array(
                    'status' => 404,
                    'results' => 'Not Found',
                    'method' => 'post'
                );
            }
        }

        echo json_encode($json, http_response_code($json['status']));
    }
}
