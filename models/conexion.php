<?php

class Conexion{

    static public function infoDB(){

        $infoDB = array(
            "db" => "nineras",
            "user" => "root",
            "pass" => ""
        );

        return $infoDB;
    }

    static public function conectar(){

        try {
           $link = new PDO(
               "mysql:host=localhost;dbname=".Conexion::infoDB()['db'],
               Conexion::infoDB()['user'],
               Conexion::infoDB()['pass']
           );

           $link->exec("set names utf8");
        } catch (PDOException $e) {
            die("Error: ".$e->getMessage());
        }

        return $link;
    }
}