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
            $query = $this->db->query("select * from Comunidades cm inner join Fiestas ft on cm.idComunidades=ft.Comunidades_idComunidades where  cm.idComunidades=$id");

            if ($query->num_rows()>0){
                return $query->result_array();
            }
            return false;
        }

        $query = $this->db->query('select * from Comunidades cm inner join Fiestas ft on cm.idComunidades=ft.Comunidades_idComunidades');

        if($query->num_rows()>0){
          return $query->result_array();

        }
        return false;
    }

    public function deparFiestas($id = null){
        if (!is_null($id)){
            $query = $this->db->query("select * from departamentos dp inner join Comunidades cm on dp.idDepartamentos=cm.departamentos_idDepartamentos inner join Fiestas ft on cm.idComunidades=ft.Comunidades_idComunidades where  dp.idDepartamentos=$id");

            if ($query->num_rows()>0){
                return $query->result_array();
            }
            return false;
        }

        $query = $this->db->query('select * from departamentos dp inner join Comunidades cm on dp.idDepartamentos=cm.departamentos_idDepartamentos inner join Fiestas ft on cm.idComunidades=ft.Comunidades_idComunidades');

        if($query->num_rows()>0){
          return $query->result_array();

        }
        return false;
    }

    public function getFiesta($id = null){
        if (!is_null($id)){
            $query = $this->db->select('*')->from('fiestas')->where('Comunidades_idComunidades',$id)->get();

            if ($query->num_rows()=== 1){
                return $query->row_array();
            }elseif ($query->num_rows()> 1) {
              return $query->result_array();
            }
            return false;
        }

        $query = $this->db->select('*')->from('fiestas')->get();
        if($query->num_rows()>0){
          return $query->result_array();

        }
        return false;
    }

    public function getSemanaSanta($id = null){
        if (!is_null($id)){
            $query = $this->db->select('*')->from('semanasanta')->where('_idComunidades',$id)->get();

            if ($query->num_rows()=== 1){
                return $query->row_array();
            }elseif ($query->num_rows()> 1) {
              return $query->result_array();
            }
            return false;
        }

        $query = $this->db->select('*')->from('semanasanta')->get();
        if($query->num_rows()>0){
          return $query->result_array();

        }
        return false;
    }

}
