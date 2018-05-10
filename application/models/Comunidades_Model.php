<?php
/**
 * Created by PhpStorm.
 * User: byron
 * Date: 23/04/18
 * Time: 11:48 AM
 */

class Comunidades_Model extends CI_model
{
    function  __construct()
    {
        parent::__construct();
    }

    public function get($id = null){
        if (!is_null($id)){
            $query = $this->db->select('*')->from('Comunidades')->where('idComunidades',$id)->get();

            if ($query->num_rows()=== 1){
                return $query->row_array();
            }
            return false;
        }

        $query = $this->db->select('*')->from('Comunidades')->get();
        if($query->num_rows()>0){
          return $query->result_array();

        }
        return false;
    }

    public function comunFiestas($id = null){
        if (!is_null($id)){
          //LLAMAMOS FUNCIONES DEFINIDAS DENTRO DE LA CLASE
            $fiestas = $this->getFiesta($id);
            $comunidad =$this->get($id);
            $semanasanta = $this->getSemanaSanta($id);
            $array = array($comunidad);
          if($fiestas!=false){
            foreach($fiestas as $key1 => $value1) {
              $temp1 = $value1['idFiestas'];
              $temp1 = $temp1+0;
              $fotofiesta = $this->getFotografiaFiesta($temp1);
              if($fotofiesta!=false){
                $fotoFies = array($value1, $fotofiesta);
                array_push($array, $fotoFies);
              }else{
                  array_push($array, $value1);
              }
            }
          }

          if($semanasanta!=false){
            foreach($semanasanta as $key2 => $value2) {
              $temp2 = $value2['idSemanaSanta'];
              $temp2 = $temp2+0;
              $fotofiesta = $this->getFotografiaSemanaSanta($temp2);
              if($fotofiesta != false){
                $fotoFies = array($value2, $fotofiesta);
                array_push($array, $fotoFies);
              }else{
                array_push($array, $value2);

              }
            }
          }
            return $array;
        }

        $array = array();
        $comunidad =$this->get();
        //RECORREMOS EL ARREGLO DE COMUNIDADES Y LE AGREGAMOS LAS FIESTAS CORRESPONDIENTES
        foreach($comunidad as $key => $value) {
          $temp = $value['idComunidades'];
          $temp = $temp +0;
          $comunidad = array($value);
            // array_push($array, $value);
              $fiestas = $this->getFiesta($temp);
              $semanasanta = $this->getSemanaSanta($temp);
              //buscamos las fotos por fiesta
              if($fiestas!=false){
              foreach($fiestas as $key1 => $value1) {
                $temp1 = $value1['idFiestas'];
                $temp1 = $temp1+0;
                $fotofiesta = $this->getFotografiaFiesta($temp1);
                if($fotofiesta != false){
                $fotoFies = array($value1, $fotofiesta);
                array_push($comunidad, $fotoFies);
              }else{
                array_push($comunidad, $value1);
              }
              }
            }
              //buscamos las fotos por fiesta de Semana Santa
              if($semanasanta!=false){
                foreach($semanasanta as $key2 => $value2) {
                  $temp2 = $value2['idSemanaSanta'];
                  $temp2 = $temp2+0;
                  $fotofiesta = $this->getFotografiaSemanaSanta($temp2);
                  if($fotofiesta != false){
                  $fotoFies = array($value2, $fotofiesta);
                  array_push($comunidad, $fotoFies);
                }else{
                  array_push($comunidad, $value2);
                }
                }

              }
              array_push($array, $comunidad);
        }
        return $array;
    }

    public function deparFiestas($id = null){
        if (!is_null($id)){
          $array = array();
          //LLAMAMOS FUNCIONES DEFINIDAS DENTRO DE LA CLASE
            $departamentos = $this->getDepartamento($id);
            //agregamos el departamento al arreglo
              array_push($array, $departamentos);
              $temp = $departamentos['idDepartamentos'];
              $temp = $temp+0;
                  $comunidad =$this->getComunidad($temp);
                  //buscamos la comunidad y sus fiestas
                    foreach($comunidad as $key => $value) {
                      if($value!=false){
                        $temporal = $value['idComunidades'];
                        $temporal = $temporal +0;
                        $fiestas = $this->comunFiestas($temporal);
                       array_push($array,  $fiestas);
                    }
                  }
            return $array;
        }

        $array = array();
        //LLAMAMOS FUNCIONES DEFINIDAS DENTRO DE LA CLASE
          $departamentos = $this->getDepartamento();
          //agregamos el departamento al arreglo
            foreach($departamentos as $llave => $valor) {
              array_push($array, $valor);
              $temp = $valor['idDepartamentos'];
              $temp = $temp+0;
              $comunidad =$this->getComunidad($temp);
              //buscamos la comunidad y sus fiestas
                if($comunidad!=false){
                  foreach($comunidad as $key => $value) {
                    $temp = $value['idComunidades'];
                    $temp = $temp +0;  var_dump($temp);
                    $fiestas = $this->comunFiestas($temp);
                    array_push($array,  $fiestas);
                  }
                  $comunidad = null;
                }
            }
          return $array;
    }

    public function getFiesta($id = null){
        if (!is_null($id)){
            $query = $this->db->select('*')->from('Fiestas')->where('Comunidades_idComunidades',$id)->get();

            if ($query->num_rows()=== 1){
                return $query->result_array();
            }elseif ($query->num_rows()> 1) {
              return $query->result_array();
            }
            return false;
        }

        $query = $this->db->select('*')->from('Fiestas')->get();
        if($query->num_rows()>0){
          return $query->result_array();

        }
        return false;
    }

    public function getSemanaSanta($id = null){
        if (!is_null($id)){
            $query = $this->db->select('*')->from('SemanaSanta')->where('_idComunidades',$id)->get();

            if ($query->num_rows()=== 1){
                return $query->result_array();
            }elseif ($query->num_rows()> 1) {
              return $query->result_array();
            }
            return false;
        }

        $query = $this->db->select('*')->from('SemanaSanta')->get();
        if($query->num_rows()>0){
          return $query->result_array();

        }
        return false;
    }

    public function getDepartamento($id = null){
        if (!is_null($id)){
            $query = $this->db->select('*')->from('Departamentos')->where('idDepartamentos',$id)->get();

            if ($query->num_rows()=== 1){
                return $query->row_array();
            }elseif ($query->num_rows()> 1) {
              return $query->result_array();
            }
            return false;
        }

        $query = $this->db->select('*')->from('Departamentos')->get();
        if($query->num_rows()>0){
          return $query->result_array();

        }
        return false;
    }

    public function getComunidad($id = null){
        if (!is_null($id)){
            $query = $this->db->select('*')->from('Comunidades')->where('departamentos_idDepartamentos',$id)->get();

            if ($query->num_rows()=== 1){
                return $query->result_array();
            }elseif ($query->num_rows()> 1) {
              return $query->result_array();
            }
            return false;
        }

        $query = $this->db->select('*')->from('Comunidades')->get();
        if($query->num_rows()>0){
          return $query->result_array();

        }
        return false;
    }

    public function getFotografiaFiesta($id = null){
        if (!is_null($id)){
            $query = $this->db->select('*')->from('Fotografia')->where('_idFiestas',$id)->get();
            // $query = $this->db->query('SELECT * FROM fotografia where fiesta_idFiestas='.$id);
            if ($query->num_rows()=== 1){
                return $query->row_array();
            }elseif ($query->num_rows()> 1) {
              return $query->result_array();
            }
            return false;
        }

        $query = $this->db->select('*')->from('Fotografia')->get();
        if($query->num_rows()>0){
          return $query->result_array();

        }
        return false;
    }

    public function getFotografiaSemanaSanta($id = null){
        if (!is_null($id)){
            $query = $this->db->select('*')->from('Fotografia')->where('_idSemanaSanta',$id)->get();

            if ($query->num_rows()=== 1){
                return $query->row_array();
            }elseif ($query->num_rows()> 1) {
              return $query->result_array();
            }
            return false;
        }

        $query = $this->db->select('*')->from('Fotografia')->get();
        if($query->num_rows()>0){
          return $query->result_array();

        }
        return false;
    }

    public function getFotograFestaNacional($id = null){
        if (!is_null($id)){
            $query = $this->db->select('*')->from('Fotografia')->where('Fiestas_Nacionales_idFinac',$id)->get();

            if ($query->num_rows()=== 1){
                return $query->row_array();
            }elseif ($query->num_rows()> 1) {
              return $query->result_array();
            }
            return false;
        }

        $query = $this->db->select('*')->from('Fotografia')->get();
        if($query->num_rows()>0){
          return $query->result_array();

        }
        return false;
    }
}
