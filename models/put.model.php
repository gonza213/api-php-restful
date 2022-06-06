<?php

require_once 'conexion.php';
require_once 'models/get.model.php';


class ModelPut
{

    static public function putData($table, $data, $id, $id_name)
    {

        // VALIDAR ID SI EXISTE
        $response = ModelGet::getDataFilter($table, $id_name, $id_name, $id, null, null, null, null);
        if (empty($response)) {

            return null;
        }

        $set = "";

        foreach ($data as $key => $value) {

            $set .= $key . " = :" . $key . ",";
        }

        $set = substr($set, 0, -1);

        $sql = "UPDATE $table SET $set WHERE $id_name = :$id_name";

        $link = Conexion::conectar();
        $stmt = $link->prepare($sql);


        foreach ($data as $key => $value) {

            $stmt->bindParam(":" . $key, $data[$key], PDO::PARAM_STR);
        }
        $stmt->bindParam(":" . $id_name, $id, PDO::PARAM_INT);


        if ($stmt->execute()) {

            $response = array(
                'comments' => 'The processs was succesful'
            );

            return $response;
        } else {
            return $link->errorInfo();
        }
    }
}
