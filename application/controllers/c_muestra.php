<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_muestra extends CI_Controller {
    
    function crear(){
        $this->load->view('muestra/v_crearmuestra');
    }
}
?>