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
            $query = $this->db->select('*')->from('Comunidades')->where('Departamentos_idDepartamentos',$id)->get();

            if ($query->num_rows() > 0){
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
        if(!is_null($id)){
          $query = $this->db->query("SELECT * from fiestas INNER JOIN comunidades on fiestas.Comunidades_idComunidades = comunidades.idComunidades INNER JOIN departamentos on departamentos.idDepartamentos = comunidades.Departamentos_idDepartamentos WHERE departamentos.idDepartamentos = '$id' ");

          if ($query->num_rows() >= 0){
              return $query->result_array();
          }
          else{
            return null;
          }
        }

        $query = $this->db->query("select * from Departamentos");

        if ($query->num_rows() >= 0){
            return $query->result_array();
        }
        else{
          return null;
        }
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

    public function getFiestasHoy($date = null){

          if (!is_null($date)){
            $date = date('Y-m-d',strtotime($date));
              $query = $this->db->query("select * from fiestas inner join comunidades on fiestas.Comunidades_idComunidades = comunidades.idComunidades where fiestas.Fecha_Inico =  '$date'");
              $datos = $query->result_array();
              if($query->num_rows()>0){
                  		return $query->result_array();
                }
              else{
              return false;
              }


    }
}
    public function getFiestasMes($date = null){
      date_default_timezone_set('America/Guatemala');
      $today = new \DateTime("now");
      $fiestas = array();

          if (!is_null($date)){
            $date = date('Y-m-d',strtotime($date));
              $query = $this->db->query("select * from Fiestas where (month(Fecha_Inico) = month('$date')) or (month(Fecha_Fin) = month('$date'))");
              $datos = $query->result_array();
              if($query->num_rows()>0){
                foreach($datos as $key1 => $value1) {
                  $temp1 = $value1['Comunidades_idComunidades'];
                  $temp1 = $temp1+0;
                  $fiesta = $this->comunFiestas($temp1);
                  array_push($fiestas, $fiesta);
                }
                return $fiestas;
              }
              return false;
          }
          $date= $today->format('Y-m-d');
          $query = $this->db->query("select * from Fiestas where (month(Fecha_Inico) = month('$date'))  or (month(Fecha_Fin) = month('$date'))");
          $datos = $query->result_array();
          if($query->num_rows()>0){
            foreach($datos as $key1 => $value1) {
              $temp1 = $value1['Comunidades_idComunidades'];
              $temp1 = $temp1+0;
              $fiesta = $this->comunFiestas($temp1);
              array_push($fiestas, $fiesta);
            }
            return $fiestas;
          }
          return false;

    }

}
