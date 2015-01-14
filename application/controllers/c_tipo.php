<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_tipo extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_tipo');
        $this->load->library(array('session','form_validation'));
	$this->load->helper(array('url','form'));
	$this->load->database('default');
    }

    function index(){
        //$data['contenido'] = 'tipos/index';       
        $this->load->view('template');
    }
    function bienvenidos(){
        //$data['tipos'] = $this->m_tipo->getAllTipos();
        $this->load->view('tipos/v_bienvenidos');
    }
    function create(){
         $this->load->view('tipos/v_createtipo');
    }
    function createtipo(){
        
        $this->form_validation->set_rules('nombre', 'Ingrese usuario', 'required|trim|min_length[2]|max_length[150]|xss_clean');
            
 
            //lanzamos mensajes de error si es que los hay
            $this->form_validation->set_message('required', 'El %s es requerido');
            $this->form_validation->set_message('min_length', 'El %s debe tener al menos %s carácteres');
            $this->form_validation->set_message('max_length', 'El %s debe tener al menos %s carácteres');
			if($this->form_validation->run() == FALSE)
			{
				$this->create();
			}else{
                                $nombre = $this->input->post('nombre');
                                $descripcion = $this->input->post('descripcion');
                                $this->m_tipo->createTipo($nombre,$descripcion);
        
                                $this->load->view('tipos/v_createtipo');
                                
                        }
    }
    function lista(){    
        $data['tipos'] = $this->m_tipo->getAllTipos();
        $this->load->view('tipos/v_listatipo', $data);
    }
    
    function edittipo(){
        $id = $this->input->post('id');
        $data['tipos'] = $this->m_tipo->getTipo($id);
        $this->load->view('tipos/v_editartipo', $data);
    }
    function updatetipo(){
        $id = $this->input->post('id_tipo');
        $nombre = $this->input->post('nombre');
        $descripcion = $this->input->post('descripcion');
        
        $this->m_tipo->updateTipo($id, $nombre,$descripcion);
    }
    
    function eliminarTipo(){
        $id = $this->input->post('id');
        $data['tipos'] = $this->m_tipo->getTipo($id);
        $this->load->view('tipos/v_eliminartipo', $data);
    }
    
    function deletetipo(){
         $id = $this->input->post('id_tipo');
         $this->m_tipo->deleteTipo($id);
    }
    
    
}
?>
