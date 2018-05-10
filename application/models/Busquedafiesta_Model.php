<?php

class Busquedafiesta_Model extends CI_model{
   // constructor de la clase
    function __construct()
    {
        parent::__construct();
    }

    //funcion para seleccionar los datos de la tabla Fiestas

    public function busqueda($id = null){
        if (!is_null($id)){
          $array = array();
          for($i=0;$i<strlen($id);$i++){
            $caracter = $id[$i];
            if($caracter==='%'){
              $i +=2;
              $caracter = ' ';
            }
            array_push($array, $caracter);
          }
          $cadena = implode($array);
            $depart = $this->db->query("select * from Departamentos where Nombre_Deptos like '%$cadena%'");
            $municip = $this->db->query("select * from Comunidades where Nombre_Comunidad like '%$cadena%'");
            $search = array();
            if ($depart->num_rows() > 0){
                $departamento = $depart->result_array();
                array_push($search, $departamento);
            }
            if ($municip->num_rows() > 0){
                $municipio = $municip->result_array();
                array_push($search, $municipio);
            }

            if(!empty($search)){
              return $search;
            }

            return false;
        }
        return false;
        }

}
