<?php
class Fiestas_model extends CI_model{
   // constructor de la clase
    function __construct()
    {
        parent::__construct();
    }

    //funcion para seleccionar los datos de la tabla Fiestas

    public function get($id = null){
        if (!is_null($id)){
            $query = $this->db->select('*')->from('Fiestas')->where('id',$id)->get();

            if ($query->num_rows()=== 1){
                return $query->row_array();
            }
            return false;
        }

        $query = $this->db->select('*')->from('Fiestas')->get();

        if($query->num_rows()>0){
          return $query->result_array();

        }
        return false;
    }


    public function save($fiesta){
        $this->db->set($this->_setCity($fiesta))->insert('fiesta');

        if($this->db->affected_rows() ===1){
            return $this->db->insert_id();
        }
        return false;
    }

    public function update($id,$fiesta){
        $this->db->set($this->_setCity($fiesta))->where('id',$id)->update('fiesta');

        if($this->db->affected_rows() ===1){
            return true;
        }
        return false;

    }

    public function delete($id){
        $this->db->where('id',$id)->delete('Fiestas');

        if($this->db->affected_rows() ===1){
            return true;
        }
        return false;
    }

    private function _setFiesta($fiesta){
        return array(
            'id'=> $fiesta['id'],
            'name' => $fiesta['name']
        );
    }


}
