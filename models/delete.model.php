<?php

require_once 'conexion.php';
require_once 'models/get.model.php';


class ModelDelete
{

    static public function deleteData($table, $id, $id_name)
    {

        // VALIDAR ID SI EXISTE
        $response = ModelGet::getDataFilter($table, $id_name, $id_name, $id, null, null, null, null);
        if (empty($response)) {

            return null;
        }


        $sql = "DELETE FROM $table WHERE $id_name = :$id_name";

        $link = Conexion::conectar();
        $stmt = $link->prepare($sql);

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
