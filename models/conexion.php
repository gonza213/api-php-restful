<?php

require_once 'models/get.model.php';

class Conexion
{

    static public function infoDB()
    {

        $infoDB = array(
            "db" => "nineras",
            "user" => "root",
            "pass" => ""
        );

        return $infoDB;
    }

    //CONEXION  A LA BD
    static public function conectar()
    {

        try {
            $link = new PDO(
                "mysql:host=localhost;dbname=" . Conexion::infoDB()['db'],
                Conexion::infoDB()['user'],
                Conexion::infoDB()['pass']
            );

            $link->exec("set names utf8");
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }

        return $link;
    }

    //VALIDAR A LA BASE DE DATOS
    static public function getColumnsData($table, $columns)
    {

        $db = Conexion::infoDB()['db'];

        $validation = Conexion::conectar()
            ->query("SELECT COLUMN_NAME AS item FROM information_schema.columns WHERE table_schema = '$db' AND table_name = '$table'")
            ->fetchAll(PDO::FETCH_OBJ);

        if (empty($validation)) {
            return null;
        } else {

            if ($columns[0] == '*') {
                array_shift($columns);
            }

            $sum = 0;

            foreach ($validation as $key => $value) {

                $sum += in_array($value->item, $columns);
            }

            return $sum == count($columns) ? $validation : null;
        }
    }

    //GENERAR TOKEN DE AUTENTICACIÓN
    static public function jwt($id, $email)
    {

        $time = time();
        $token = array(
            "iat" => $time, //Tiempo que inicia el token
            "exp" => $time * (60 * 60 * 24), //Tiempo que expira el token (1 día)
            "data" => [
                "id" => $id,
                "email" => $email
            ]
        );

        return $token;
    }

    //VALIDAR EL TOKEN DE SEGURIDAD
    static public function tokenValidate($token, $table){
        //TRAEMOS AL USUARIO DE ACUERDO AL TOKEN
        $user = ModelGet::getDataFilter($table, "token_expired", "token", $token, null, null, null, null);

        if(!empty($user)){
            //VALIDAMOS SI EL TOKEN HA EXPIRADO
            $time = time();

            if($time < $user[0]->{'token_expired'}){

                return "ok";
            }else{

                return "expired";
            }
        }else{

            return "no-auth";
        }
   
        // echo '<pre>';
        // print_r($user);
        // echo '</pre>';
        // return;

        
    }

    //APIKEY
    static public function apiKey(){

        return "k8kc2DfU6EB2yUUa7gGBZuih2VuUiZ";
    }
}
