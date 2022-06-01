<?php

require_once 'conexion.php';


class ModelGet
{
    //PETICIONES SIN FILTRO
    static public function getData($tabla, $select, $order, $mode, $start, $end)
    {

        //VALIDAR EXISTENCIA DE LA TABLA Y LAS COLUMNAS
        $selectArray = explode(",", $select);
        if (empty(Conexion::getColumnsData($tabla, $selectArray))) {

            return null;
        }
        //Secuencia sin ordenar y sin limites
        $sql = "SELECT $select FROM $tabla";

        //Secuencia ordenada y sin limites
        if ($order != null && $mode != null && $start == null && $end == null) {
            $sql = "SELECT $select FROM $tabla ORDER BY $order $mode";
        }

        //Secuencia ordenada y con limites
        if ($order != null && $mode != null && $start != null && $end != null) {
            $sql = "SELECT $select FROM $tabla ORDER BY $order $mode LIMIT $start, $end";
        }

        //Secuencia sin ordenar y con limites
        if ($order == null && $mode == null && $start != null && $end != null) {
            $sql = "SELECT $select FROM $tabla LIMIT $start, $end";
        }


        $stmt = Conexion::conectar()->prepare($sql);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            return null;
        }

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    //PETICIONES CON FILTRO
    static public function getDataFilter($tabla, $select, $linkto, $equalto, $order, $mode, $start, $end)
    {
        //VALIDAR EXISTENCIA DE LA TABLA Y LAS COLUMNAS
        $linktoArray = explode(",", $linkto);
        $selectArray = explode(",", $select);

        foreach ($linktoArray as $key => $value) {
            array_push($selectArray, $value);
        }

        //NO REPETIR 
        $selectArray = array_unique($selectArray);

        if (empty(Conexion::getColumnsData($tabla, $selectArray))) {

            return null;
        }

        $equaltoArray = explode(",", $equalto);
        //Otra manera de separar si la descripcion tiene ",".
        // $equaltoArray = explode("_", $equalto);
        $linkToText = "";

        if (count($linktoArray) > 1) {
            foreach ($linktoArray as $key => $value) {
                if ($key > 0) {
                    $linkToText .= "AND " . $value . " = :" . $value . " ";
                }
            }
        }

        //Secuencia sin ordenar y sin limites
        $sql = "SELECT $select FROM $tabla WHERE $linktoArray[0] = :$linktoArray[0] $linkToText";

        //Secuencia ordenada y sin limites
        if ($order != null && $mode != null && $start == null && $end == null) {
            $sql = "SELECT $select FROM $tabla WHERE $linktoArray[0] = :$linktoArray[0] $linkToText ORDER BY $order $mode";
        }
        //Secuencia ordenada y con limites
        if ($order != null && $mode != null && $start != null && $end != null) {
            $sql = "SELECT $select FROM $tabla WHERE $linktoArray[0] = :$linktoArray[0] $linkToText ORDER BY $order $mode LIMIT $start, $end";
        }
        //Secuencia sin ordenar y con limites
        if ($order != null && $mode != null && $start == null && $end == null) {
            $sql = "SELECT $select FROM $tabla WHERE $linktoArray[0] = :$linktoArray[0] $linkToText LIMIT $start, $end";
        }


        $stmt = Conexion::conectar()->prepare($sql);

        foreach ($linktoArray as $key => $value) {

            $stmt->bindParam(":" . $value, $equaltoArray[$key], PDO::PARAM_STR);
        }

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            return null;
        }

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    //PETICIONES GET SIN FILTRO ENTRE TABLAS RELACIONADAS
    static public function getRelData($rel, $type, $select, $order, $mode, $start, $end)
    {
         //Organizamos las relaciones
        $relArray = explode(",", $rel);
        $typeArray = explode(",", $type);

        $innerJoinText = "";

        if (count($relArray) > 1) {
            foreach ($relArray as $key => $value) {
                //VALIDAR EXISTENCIA DE LA TABLA
                if (empty(Conexion::getColumnsData($value, ["*"]))) {

                    return null;
                }

                if ($key > 0) {
                    $innerJoinText .= "INNER JOIN " . $value . " ON " . $relArray[0] . "." . $typeArray[0] . " = " . $value . "." . $typeArray[$key] . " ";
                }
            }

            //Secuencia sin ordenar y sin limites
            $sql = "SELECT $select FROM $relArray[0] $innerJoinText";

            //Secuencia ordenada y sin limites
            if ($order != null && $mode != null && $start == null && $end == null) {
                $sql = "SELECT $select FROM $relArray[0] $innerJoinText ORDER BY $order $mode";
            }

            //Secuencia ordenada y con limites
            if ($order != null && $mode != null && $start != null && $end != null) {
                $sql = "SELECT $select FROM $relArray[0] $innerJoinText ORDER BY $order $mode LIMIT $start, $end";
            }

            //Secuencia sin ordenar y con limites
            if ($order == null && $mode == null && $start != null && $end != null) {
                $sql = "SELECT $select FROM $relArray[0] $innerJoinText LIMIT $start, $end";
            }


            $stmt = Conexion::conectar()->prepare($sql);

            try {
                $stmt->execute();
            } catch (PDOException $e) {
                return null;
            }

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } else {
            return null;
        }
    }

    //PETICIONES GET CON FILTRO ENTRE TABLAS RELACIONADAS
    static public function getRelDataFilter($rel, $type, $select, $linkto, $equalto, $order, $mode, $start, $end)
    {

        //Organizamos las relaciones
        $relArray = explode(",", $rel);
        $typeArray = explode(",", $type);

        $innerJoinText = "";

        if (count($relArray) > 1) {
            foreach ($relArray as $key => $value) {
                //VALIDAR EXISTENCIA DE LA TABLA
                if (empty(Conexion::getColumnsData($value,["*"]))) {

                    return null;
                }

                if ($key > 0) {
                    $innerJoinText .= "INNER JOIN " . $value . " ON " . $relArray[0] . "." . $typeArray[0] . " = " . $value . "." . $typeArray[$key] . " ";
                }
            }

            //Organizamos los filtros
            $linktoArray = explode(",", $linkto);
            $equaltoArray = explode(",", $equalto);
            $linkToText = "";

            if (count($linktoArray) > 1) {
                foreach ($linktoArray as $key => $value) {

                    if ($key > 0) {
                        $linkToText .= "AND " . $value . " = :" . $value . " ";
                    }
                }
            }


            //Secuencia sin ordenar y sin limites
            $sql = "SELECT $select FROM $relArray[0] $innerJoinText WHERE $linktoArray[0] = :$linktoArray[0] $linkToText";

            //Secuencia ordenada y sin limites
            if ($order != null && $mode != null && $start == null && $end == null) {
                $sql = "SELECT $select FROM $relArray[0] $innerJoinText WHERE $linktoArray[0] = :$linktoArray[0] $linkToText ORDER BY $order $mode";
            }

            //Secuencia ordenada y con limites
            if ($order != null && $mode != null && $start != null && $end != null) {
                $sql = "SELECT $select FROM $relArray[0] $innerJoinText WHERE $linktoArray[0] = :$linktoArray[0] $linkToText ORDER BY $order $mode LIMIT $start, $end";
            }

            //Secuencia sin ordenar y con limites
            if ($order == null && $mode == null && $start != null && $end != null) {
                $sql = "SELECT $select FROM $relArray[0] $innerJoinText WHERE $linktoArray[0] = :$linktoArray[0] $linkToText LIMIT $start, $end";
            }


            $stmt = Conexion::conectar()->prepare($sql);

            foreach ($linktoArray as $key => $value) {

                $stmt->bindParam(":" . $value, $equaltoArray[$key], PDO::PARAM_STR);
            }


            try {
                $stmt->execute();
            } catch (PDOException $e) {
                return null;
            }

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } else {
            return null;
        }
    }


    //PETICIONES GET PARA BUSCAR SIN RELACIONES Y CON FILTRO
    static public function getDataSearch($tabla, $select, $linkto, $search, $order, $mode, $start, $end)
    {

        //VALIDAR EXISTENCIA DE LA TABLA Y LAS COLUMNAS
        $linktoArray = explode(",", $linkto);
        $selectArray = explode(",", $select);

        foreach ($linktoArray as $key => $value) {
            array_push($selectArray, $value);
        }

        //NO REPETIR 
        $selectArray = array_unique($selectArray);
        if (empty(Conexion::getColumnsData($tabla, $selectArray))) {

            return null;
        }

        $searchArray = explode("_", $search);
        $linkToText = "";

        if (count($linktoArray) > 1) {
            foreach ($linktoArray as $key => $value) {
                if ($key > 0) {
                    $linkToText .= "AND " . $value . " = :" . $value . " ";
                }
            }
        }


        //Secuencia sin ordenar y sin limites
        $sql = "SELECT $select FROM $tabla WHERE $linktoArray[0] LIKE '%$searchArray[0]%' $linkToText ";

        //Secuencia ordenada y sin limites
        if ($order != null && $mode != null && $start == null && $end == null) {
            $sql = "SELECT $select FROM $tabla WHERE $linktoArray[0] LIKE '%$searchArray[0]%' $linkToText ORDER BY $order $mode";
        }

        //Secuencia ordenada y con limites
        if ($order != null && $mode != null && $start != null && $end != null) {
            $sql = "SELECT $select FROM $tabla WHERE $linktoArray[0] LIKE '%$searchArray[0]%' $linkToText ORDER BY $order $mode LIMIT $start, $end";
        }

        //Secuencia sin ordenar y con limites
        if ($order == null && $mode == null && $start != null && $end != null) {
            $sql = "SELECT $select FROM $tabla WHERE $linktoArray[0] LIKE '%$searchArray[0]%' $linkToText LIMIT $start, $end";
        }


        $stmt = Conexion::conectar()->prepare($sql);

        foreach ($linktoArray as $key => $value) {
            if ($key > 0) {
                $stmt->bindParam(":" . $value, $searchArray[$key], PDO::PARAM_STR);
            }
        }


        try {
            $stmt->execute();
        } catch (PDOException $e) {
            return null;
        }

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    //PETICIONES GET PARA BUSCAR CON RELACIONES Y CON FILTRO
    static public function getRelDataSearch($rel, $type, $select, $linkto, $search, $order, $mode, $start, $end)
    {

        //Organizamos las relaciones
        $relArray = explode(",", $rel);
        $typeArray = explode(",", $type);

        $innerJoinText = "";

        if (count($relArray) > 1) {
            foreach ($relArray as $key => $value) {

                //VALIDAR EXISTENCIA DE LA TABLA
                if (empty(Conexion::getColumnsData($value, ["*"]))) {

                    return null;
                }

                if ($key > 0) {
                    $innerJoinText .= "INNER JOIN " . $value . " ON " . $relArray[0] . "." . $typeArray[0] . " = " . $value . "." . $typeArray[$key] . " ";
                }
            }

            //Organizamos los filtros
            $linktoArray = explode(",", $linkto);
            $searchArray = explode("_", $search);
            $linkToText = "";

            if (count($linktoArray) > 1) {
                foreach ($linktoArray as $key => $value) {


                    if ($key > 0) {
                        $linkToText .= "AND " . $value . " = :" . $value . " ";
                    }
                }
            }


            //Secuencia sin ordenar y sin limites
            $sql = "SELECT $select FROM $relArray[0] $innerJoinText WHERE $linktoArray[0] LIKE '%$searchArray[0]%' $linkToText";

            //Secuencia ordenada y sin limites
            if ($order != null && $mode != null && $start == null && $end == null) {
                $sql = "SELECT $select FROM $relArray[0] $innerJoinText WHERE $linktoArray[0] LIKE '%$searchArray[0]%' $linkToText ORDER BY $order $mode";
            }

            //Secuencia ordenada y con limites
            if ($order != null && $mode != null && $start != null && $end != null) {
                $sql = "SELECT $select FROM $relArray[0] $innerJoinText WHERE $linktoArray[0] LIKE '%$searchArray[0]%' $linkToText ORDER BY $order $mode LIMIT $start, $end";
            }

            //Secuencia sin ordenar y con limites
            if ($order == null && $mode == null && $start != null && $end != null) {
                $sql = "SELECT $select FROM $relArray[0] $innerJoinText WHERE $linktoArray[0] LIKE '%$searchArray[0]%' $linkToText LIMIT $start, $end";
            }


            $stmt = Conexion::conectar()->prepare($sql);


            foreach ($linktoArray as $key => $value) {
                if ($key > 0) {
                    $stmt->bindParam(":" . $value, $searchArray[$key], PDO::PARAM_STR);
                }
            }

            try {
                $stmt->execute();
            } catch (PDOException $e) {
                return null;
            }

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } else {
            return null;
        }
    }
}
