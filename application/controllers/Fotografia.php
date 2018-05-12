<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . '/libraries/REST_Controller.php';


class Fotografia extends REST_Controller {

    public function __construct()
    {
      header('Access-Control-Allow-Origin: *');
      header('Access-Control-Allow-Methods: *');
        parent::__construct();
        $this->load->model('Fotografia_Model');
    }

    public function index_get()
    {
      header('Content-Type: application/json; charset=UTF-8');
      header('Access-Control-Allow-Origin: *');


      //se llama al modelo fotografias
      $fotografia = $this->Fotografia_Model->get();

      // se valida si el resultado no es null de la respuesta
      if (!is_null($fotografia)){
echo json_encode($fotografia, JSON_PRETTY_PRINT);
      }else{
          $this->response(array('error'=> 'No hay fotografias en la base de datos...'), 400);
      }
    }

    public function find_get($id)
    {
      if (!$id){
        header('Content-Type: application/json; charset=UTF-8');
        header('Access-Control-Allow-Origin: *');

          $this->response(null,400);
      }
      $fotografia = $this->Fotografia_Model->get($id);

      if (!is_null($fotografia)){
        header('Content-Type: application/json; charset=UTF-8');
        header('Access-Control-Allow-Origin: *');
        
          $this->response($fotografi,200);

      }else{
          $this->response(array('error'=>'Fiesta o despartamento no encontrado...'),400);
      }
    }

    public function index_post(){}

    public function index_put(){}

    public function index_delete(){}

}
