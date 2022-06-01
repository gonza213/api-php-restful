<?php



class ControllerGet
{
    //PETICIONES SIN FILTRO
    static public function getData($tabla, $select, $order, $mode, $start, $end)
    {

        $response = ModelGet::getData($tabla, $select, $order, $mode, $start, $end);

        $return = new ControllerGet();
        $return->fncResponse($response);
    }

    //PETICIONES CON FILTRO
    static public function getDataFilter($tabla, $select, $linkTo, $equalTo, $order, $mode, $start, $end)
    {

        $response = ModelGet::getDataFilter($tabla, $select, $linkTo, $equalTo, $order, $mode, $start, $end);

        $return = new ControllerGet();
        $return->fncResponse($response);
    }


    //PETICIONES GET SIN FILTRO ENTRE TABLAS RELACIONADAS
    static public function getRelData($rel, $type,  $select, $order, $mode, $start, $end)
    {

        $response = ModelGet::getRelData($rel, $type, $select, $order, $mode, $start, $end);

        $return = new ControllerGet();
        $return->fncResponse($response);
    }


    //PETICIONES GET CON FILTRO ENTRE TABLAS RELACIONADAS
    static public function getRelDataFilter($rel, $type, $select, $linkTo, $equalTo, $order, $mode, $start, $end)
    {

        $response = ModelGet::getRelDataFilter($rel, $type, $select, $linkTo, $equalTo, $order, $mode, $start, $end);

        $return = new ControllerGet();
        $return->fncResponse($response);
    }

    //PETICIONES GET PARA BUSCADOR SIN RELACIONES CON FILTRO
    static public function getDataSearch($tabla, $select, $linkTo, $search, $order, $mode, $start, $end)
    {

        $response = ModelGet::getDataSearch($tabla, $select, $linkTo, $search, $order, $mode, $start, $end);

        $return = new ControllerGet();
        $return->fncResponse($response);
    }

    //PETICIONES GET PARA BUSCADOR CON RELACIONES CON FILTRO
    static public function getRelDataSearch($rel, $type, $select, $linkTo, $search, $order, $mode, $start, $end)
    {

        $response = ModelGet::getRelDataSearch($rel, $type, $select, $linkTo, $search, $order, $mode, $start, $end);

        $return = new ControllerGet();
        $return->fncResponse($response);
    }




    //RESPUESTA DE CONTROLADORES
    public function fncResponse($response)
    {

        if (!empty($response)) {
            $json = array(
                'status' => 200,
                'total' => count($response),
                'results' => $response
            );
        } else {
            $json = array(
                'status' => 404,
                'results' => 'Not Found',
                'method' => 'get'
            );
        }

        echo json_encode($json, http_response_code($json['status']));
    }
}
