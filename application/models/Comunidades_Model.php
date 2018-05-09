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

            $array = array($comunidad, $fiestas, $semanasanta);

            return $array;
        }
        $array = array();
        $comunidad =$this->get();
        //RECORREMOS EL ARREGLO DE COMUNIDADES Y LE AGREGAMOS LAS FIESTAS CORRESPONDIENTES
        foreach($comunidad as $key => $value) {
          $temp = $value['idComunidades'];
          $temp = $temp +0;
              $fiestas = $this->getFiesta($temp);
              $semanasanta = $this->getSemanaSanta($temp);
              array_push($array, $value, $fiestas, $semanasanta);

        }
        return $array;
    }

    public function deparFiestas($id = null){
        if (!is_null($id)){
          $array = array();
          //LLAMAMOS FUNCIONES DEFINIDAS DENTRO DE LA CLASE
            $departamentos = $this->getDepartamento($id);
            var_dump($departamentos);
            foreach($departamentos as $key => $value) {
              $temp1 = $value['idDepartamentos'];
              $temp1 = $temp1+0;
              var_dump($temp1);
                  $comunidad =$this->getComunidad($temp);
                  // $fiestas = $this->comunFiestas($id);
                  array_push($array, $value, $comunidad);

            }

            // $array = array($comunidad, $fiestas);

            return $array;
        }

        $query = $this->db->query('select * from Departamentos dp inner join Comunidades cm on dp.idDepartamentos=cm.departamentos_idDepartamentos inner join Fiestas ft on cm.idComunidades=ft.Comunidades_idComunidades');

        if($query->num_rows()>0){
          return $query->result_array();

        }
        return false;
    }

    public function getFiesta($id = null){
        if (!is_null($id)){
            $query = $this->db->select('*')->from('Fiestas')->where('Comunidades_idComunidades',$id)->get();

            if ($query->num_rows()=== 1){
                return $query->row_array();
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
                return $query->row_array();
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
                return $query->row_array();
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
