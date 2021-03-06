<?php
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . '/libraries/REST_Controller.php';


class Search extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Busquedafiesta_Model');
    }

    public function index_get()
    {
      //se llama al modelo Comunidades
      $comunidad = $this->Busquedafiesta_Model->busqueda();

      // se valida si el resultado no es null de la respuesta
      if (!is_null($comunidad)){
          $this->response($comunidad,200);
      }else{
          $this->response(array('error'=> 'No hay datos en la base de datos...'), 400);
      }
    }

    public function find_get($id)
    {
      if (!$id){
          $this->response(null,400);
      }
      $comunidad = $this->Busquedafiesta_Model->busqueda($id);

      if (!is_null($comunidad)){
          $this->response($comunidad,200);

      }else{
          $this->response(array('error'=>'dato no encontrado...'),400);
      }
    }

    public function index_post(){}

    public function index_put(){}

    public function index_delete(){}

}
