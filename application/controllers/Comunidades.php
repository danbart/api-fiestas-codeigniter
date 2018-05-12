<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . '/libraries/REST_Controller.php';


class Comunidades extends REST_Controller {

    public function __construct()
    {
      header('Access-Control-Allow-Origin: *');
  		header('Access-Control-Allow-Methods: *');
        parent::__construct();
        $this->load->model('Comunidades_Model');
    }

    public function index_get()
    {
      header('Content-Type: application/json; charset=UTF-8');
      header('Access-Control-Allow-Origin: *');
      //se llama al modelo Comunidades
      $comunidad = $this->Comunidades_Model->get();

      // se valida si el resultado no es null de la respuesta
      if (!is_null($comunidad)){
        header('Content-Type: application/json; charset=UTF-8');
        header('Access-Control-Allow-Origin: *');

$this->response( array('comunidad'=>$comunidad), 200);
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
      $comunidad = $this->Comunidades_Model->get($id);

      if (!is_null($comunidad)){
        header('Content-Type: application/json; charset=UTF-8');
        header('Access-Control-Allow-Origin: *');

$this->response( array('comunidad'=>$comunidad), 200);

      }else{
          $this->response(array('error'=>'Fiesta o despartamento no encontrado...'),400);
      }
    }

    public function index_comunFiesta()
    {
      //se llama al modelo Comunidades
      $comunidad = $this->Comunidades_Model->comunFiestas();

      // se valida si el resultado no es null de la respuesta
      if (!is_null($comunidad)){
          $this->response($comunidad,200);
      }else{
          $this->response(array('error'=> 'No hay fotografias en la base de datos...'), 400);
      }
    }

    public function index_post(){}

    public function index_put(){}

    public function index_delete(){}

}
