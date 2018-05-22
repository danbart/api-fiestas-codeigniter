<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . '/libraries/REST_Controller.php';


class Fiestas extends REST_Controller {

    public function __construct($config = 'rest')
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, OPTIONS");
        parent::__construct();
        $this->load->model('fiestas_model');
    }

    //obtener los datos de la tabla Fiestas
    public function index_get()
    {
        //se llama al modelo fiestas
        $fiestas = $this->fiestas_model->get();

        // se valida si el resultado no es null de la respuesta
        if (!is_null($fiestas)){
            $this->response($fiestas,200);
        }else{
            $this->response(array('error'=> 'No hay fiestas en la base de datos...'), 400);
        }



    }

    public function find_get($id)
    {
        if (!$id){
            $this->response(null,400);
        }
        $fiestas = $this->fiestas_model->get($id);

        if (!is_null($fiestas)){
            $this->response($fiestas,200);

        }else{
            $this->response(array('error'=>'Fiesta o despartamento no encontrado...'),400);
        }
    }

    public function index_post(){
        if (!$this->post('fiesta')){
            $this
                ->response(null,400);
        }
        $id = $this->fiestas_model->save($this->post('fiesta'));
        if (!is_null($id)){
            $this->response(array('response' => $id),200);

        }else{
            $this->response(array('error', 'Algo ha fallao con el servidor'),400);
        }
    }

    public function index_put($id){
        if (!$this->post('fiesta' || !$id)){
            $this->response(null,400);
        }

        $update=$this->fiestas_model->update($id, $this->post('fiesta'));

        if (!is_null($update)){
            $this->response(array('response' => 'Fiesta editada correctamente'),200);
        }else{
            $this->response(array('error','Algo ha fallado en el servidor'),400);
        }
    }

    public function index_delete($id){
       if ($id){
           $this->response(null,400);
       }
       $delete = $this->fiestas_model->delete($id);
       if (!is_null($delete)){
           $this->response(array('response' => 'Fiesta eliminada correcaamente'),200);

       }else{
           $this->response(array('error', 'Algo ha fallado en el servidor'),400);
       }

    }



    //obtener fiestas
    public function Fiestas_get($id){
        //se valida la funcion get
        if(!$id){
            $this->response(null, 400);
            $fiesta = $this->fiestas_model->getFiestas($id);
            if($fiesta){
                header('Content-Type: application/json; charset=UTF-8');
                header('Access-Control-Allow-Origin: *');
                //echo json_encode($proventas,JSON_PRETTY_PRINT);
                $this->response( array('fiesta'=>$fiesta), 200);
            }
            else{
                $this->response(null, 404);
            }

        }
    }
}
