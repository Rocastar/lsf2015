<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_resultado extends CI_Controller {
    function crear(){
        $this->load->view('resultado/v_crearresultado');
    }
}
?>