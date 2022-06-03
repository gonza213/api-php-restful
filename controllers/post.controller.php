<?php


class ControllerPost
{


    //PETICIÓN POST PARA CREAR DATOS
    static public function postData($table, $data)
    {

        $response = ModelPost::postData($table, $data);

        $return = new ControllerPost();
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
                'method' => 'post'
            );
        }

        echo json_encode($json, http_response_code($json['status']));
    }
}
