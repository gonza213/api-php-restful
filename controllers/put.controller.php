<?php


class ControllerPut
{


    //PETICIÓN PUT PARA EDITAR DATOS
    static public function putData($table, $data, $id, $id_name)
    {

        $response = ModelPut::putData($table, $data, $id, $id_name);

        $return = new ControllerPut();
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
                'method' => 'put'
            );
        }

        echo json_encode($json, http_response_code($json['status']));
    }
}
