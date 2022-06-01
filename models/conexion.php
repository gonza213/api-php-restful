<?php

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
        }else{

            if($columns[0] == '*'){
                array_shift($columns);
            }

            $sum = 0;

            foreach ($validation as $key => $value) {
                
                $sum += in_array($value->item, $columns);
            }

            return $sum == count($columns) ? $validation : null;

        }
    }
}
