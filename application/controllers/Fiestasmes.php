<?php
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . '/libraries/REST_Controller.php';


class FiestasMes extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Comunidades_Model');
      //  $fiesta=$this->load->model('fiestas_model');
    }

    public function index_get()
    {
      //se llama al modelo Comunidades
      $comunidad = $this->Comunidades_Model->getFiestasMes();

      // se valida si el resultado no es null de la respuesta
      if (!is_null($comunidad)){
          $this->response($comunidad,200);
      }else{
          $this->response(array('error'=> 'No hay fotografias en la base de datos...'), 400);
      }
    }

    public function find_get($date)
    {
      if (!$date){
          $this->response(null,400);
      }
      $comunidad = $this->Comunidades_Model->getFiestasMes($date);

      if (!is_null($comunidad)){
          $this->response($comunidad,200);

      }else{
          $this->response(array('error'=>'Fiesta o despartamento no encontrado...'),400);
      }
    }

    public function index_post(){}

    public function index_put(){}

    public function index_delete(){}

}
