<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . '/libraries/REST_Controller.php';


class Fotografia extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Fotografia_Model');
    }

    public function index_get()
    {
      //se llama al modelo fotografias
      $fotografia = $this->Fotografia_Model->get();

      // se valida si el resultado no es null de la respuesta
      if (!is_null($fotografia)){
          $this->response($fotografia,200);
      }else{
          $this->response(array('error'=> 'No hay datos en la base de datos...'), 400);
      }
    }

    public function find_get($id)
    {
      if (!$id){
          $this->response(null,400);
      }
      $fotografia = $this->Fotografia_Model->get($id);

      if (!is_null($fotografia)){
          $this->response($fotografi,200);

      }else{
          $this->response(array('error'=>'Fiesta o despartamento no encontrado...'),400);
      }
    }

    public function index_post(){}

    public function index_put(){}

    public function index_delete(){}

}
