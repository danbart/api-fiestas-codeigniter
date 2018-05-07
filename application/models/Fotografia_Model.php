<?php


class Fotografia_Model extends CI_model
{
    function  __construct()
    {
        parent::__construct();
    }

    public function get($id = null){
        if (!is_null($id)){
            $query = $this->db->select('*')->from('Fotografia')->where('idFotografia',$id)->get();

            if ($query->num_rows()=== 1){
                return $query->row_array();
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
