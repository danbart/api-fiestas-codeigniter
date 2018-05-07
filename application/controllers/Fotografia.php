<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . '/libraries/REST_Controller.php';


class Fotografia extends REST_Controller {

    public function index_get()
    {
        echo 'Fotografias';
    }

    public function find_get($id)
    {
        echo 'Fotografia numero '. $id;
    }

    public function index_post(){}

    public function index_put(){}

    public function index_delete(){}

}