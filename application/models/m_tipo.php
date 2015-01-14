<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_tipo extends CI_Model {
    public function __construct() {
		parent::__construct();
	}
    public function createTipo($nombre, $descripcion){
        
        $data = array(
		'nombre_tipo' => $nombre,		
		'descripcion' => $descripcion                
	);
        return $this->db->insert('tipo_analisis', $data);
    }
    
    public function getAllTipos(){
        $query = $this->db->get('tipo_analisis');
        return $query->result_array();
    }
    
    public function getTipo($id){
        $query = $this->db->get_where('tipo_analisis',array('cod_tipo' => $id));
        if($query->num_rows() > 0 )
        {            
            return $query->row();
        }
    }
    public function updateTipo($id, $nombre,$descripcion){
        $data = array(            
            'nombre_tipo' =>$nombre,
            'descripcion' =>$descripcion
        );
        
        $this->db->where('cod_tipo', $id);
        $this->db->update('tipo_analisis', $data);
    }
    
    public function deleteTipo($id)
    {
        $this->db->delete('tipo_analisis', array('cod_tipo' => $id));
    }
}
?>