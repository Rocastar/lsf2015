<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pruebacodigo extends CI_Controller {

  function __construct(){
    parent::__construct();
  }

  public function index()
  {
    $this->load->view('pruebacodigo/bienvenido');
  }
}
