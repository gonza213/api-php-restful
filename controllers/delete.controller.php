<?php


class ControllerDelete
{


    //PETICIÓN DELETE PARA BORRAR DATOS
    static public function deleteData($table, $id, $id_name)
    {

        $response = ModelDelete::deleteData($table, $id, $id_name);

        $return = new ControllerDelete();
        $return->fncResponse($response);
    }


    //RESPUESTA DE CONTROLADORES
    public function fncResponse($response)
    {

        if (!empty($response)) {
            $json = array(
                'status' => 200,
                'results' => $response
            );
        } else {
            $json = array(
                'status' => 404,
                'results' => 'Not Found',
                'method' => 'delete'
            );
        }

        echo json_encode($json, http_response_code($json['status']));
    }
}
