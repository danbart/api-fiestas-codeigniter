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
            $depart = $this->db->query("select dp.Nombre_Deptos as Departamento, cm.Nombre_Comunidad as Comunidad, ft.Descripcion_Fiesta as Descripcion, ft.Fecha_Inico as Fiesta, fot.Nombre_Fotografia as img from Departamentos dp, Comunidades cm, Fiestas ft, Fotografia fot
where dp.idDepartamentos=cm.Departamentos_idDepartamentos and cm.idComunidades=ft.Comunidades_idComunidades and ft.idFiestas=fot._idFiestas and (cm.Nombre_Comunidad like '%$cadena%' or  dp.Nombre_Deptos like '%$cadena%')");
            if($depart->num_rows()>0){
              return $depart->result_object();

            }
            return null;
        }
        return null;
        }

}
