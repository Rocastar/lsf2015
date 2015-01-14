<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_cotizacion extends CI_Controller {
    function crear(){        
        $this->load->view('cotizacion/v_crearcotizacion');
    }    
}
?>
