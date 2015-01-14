<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_elemento extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->model('m_elemento');        
        $this->load->library(array('session','form_validation'));
	$this->load->helper(array('url','form'));
	$this->load->database('default');
    }
    function crear(){
        $data['componente'] = $this->m_elemento->getAllComponente();
        $this->load->view('elemento/v_crearelemento', $data); 
    }
    
    function creatElemento(){        
        $componente = $this->input->post('componente');
        $nombreelemento = $this->input->post('nombreelemento');
        $tipovalor = $this->input->post('tipovalor');
        $rango = $this->input->post('rango');
        $unidadrango = $this->input->post('unidadrango');
        $muestra = $this->input->post('muestra');
        
        $elemento = $this->m_elemento->createElemento($componente, $nombreelemento);
        
        $tipo = $this->m_elemento->createValores($elemento, $tipovalor, $rango, $unidadrango, $muestra);
        
        $this->crear();
    }
    
    function lista(){
        $data['componente'] = $this->m_elemento->GetAllElemento();
        $this->load->view('elemento/v_listaelementos', $data); 
    }
}
?>
    