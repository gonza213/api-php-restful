<?php

require_once 'conexion.php';

class ModelPost
{

    static public function postData($table, $data)
    {
      
        $columns = "";
        $params = "";

        foreach ($data as $key => $value) {
            $columns .= $key . ",";
            $params .= ":" . $key . ",";
        }

        $columns = substr($columns, 0, -1);
        $params = substr($params, 0, -1);

        $sql = "INSERT INTO $table ($columns) VALUES ($params)";
        $link = Conexion::conectar();
        $stmt = $link->prepare($sql);
        
        foreach ($data as $key => $value) {
            
            $stmt->bindParam(":".$key, $data[$key], PDO::PARAM_STR);
        }

        if($stmt->execute()){

            $response = array(
                'comments' => 'The processs was succesful'
            );

            return $response;
        }else{
            return $link->errorInfo();
        }
    }
}
