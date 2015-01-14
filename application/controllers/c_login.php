<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_login');
	$this->load->library(array('session','form_validation'));
	$this->load->helper(array('url','form'));
	$this->load->database('default');
    }
    
    function index(){
        
        switch ($this->session->userdata('perfil')) {
			case '':
				$data['token'] = $this->token();
				$data['titulo'] = 'Login con roles de usuario en codeigniter';
				$this->load->view('login/v_indexlogin',$data);
				break;
			case 'Administrador':
				redirect(base_url().'index.php/c_tipo');
				break;			
			default:
                                $data['token'] = $this->token();
				$data['titulo'] = 'Login con roles de usuario en codeigniter';
				$this->load->view('login/v_indexlogin',$data);
				break;		
		}
              
    }
    
    function validausuario(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
	{
            $this->form_validation->set_rules('usuario', 'Ingrese usuario', 'required|trim|min_length[2]|max_length[150]|xss_clean');
            $this->form_validation->set_rules('contrasena', 'Ingrese contraseña', 'required|trim|min_length[4]|max_length[150]|xss_clean');
 
            //lanzamos mensajes de error si es que los hay
            $this->form_validation->set_message('required', 'El %s es requerido');
            $this->form_validation->set_message('min_length', 'El %s debe tener al menos %s carácteres');
            $this->form_validation->set_message('max_length', 'El %s debe tener al menos %s carácteres');
			if($this->form_validation->run() == FALSE)
			{
				$this->index();
			}else{
				$username = $this->input->post('usuario');
				$password = sha1($this->input->post('contrasena'));
				$check_user = $this->m_login->login_user($username,$password);
				if($check_user == TRUE)
				{
                                    $data = array(
                                        'is_logued_in' 	=> 		TRUE,
                                        'id_usuario' 	=> 		$check_user->Id,
                                        'perfil'		=>		$check_user->Perfil,
                                        'username' 		=> 		$check_user->Usuario,
                                        'email' 		=> 		$check_user->Email
                                    );		
					$this->session->set_userdata($data);
					$this->index();
                                }
			}
	}
        else{
            redirect(base_url().'index.php/c_login');
	}
    }
    
    public function token(){
	$token = md5(uniqid(rand(),true));
	$this->session->set_userdata('token',$token);
	return $token;
    }
    
    public function salir(){
        
        $data = array(
                                        'is_logued_in' 	=> FALSE,
                                        'id_usuario' 	=> '',
                                        'perfil'	=> '',
                                        'username' 	=> '',
                                        'email'         => ''
                                    );		
					$this->session->set_userdata($data);
					$this->index();
        $this->index();
    }
    
}
?>