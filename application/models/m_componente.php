<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_componente extends CI_Model {
    public function __construct() {
		parent::__construct();
	}    
    
    public function getAllComponente(){
        $query = $this->db->get('componente_analisis');
        return $query->result_array();
    }
    
    function getData(){
        
        $this->db->select('*');
        $this->db->from('componente_analisis as ca');
        $this->db->join('tipo_analisis as ta', 'ca.cod_tipo = ta.cod_tipo', 'INNER');
        $query = $this->db->get();

        if ($query->num_rows() > 0){
            return $query->result();
        }else{
            return 'no hay datos';
        }
    }
    
    function creareComponente($tipo, $nombre, $descripcion, $precio){
        $data=array(
            'cod_tipo'=>$tipo,
            'nombre_componente' =>$nombre,        
            'precio'=>$precio,
            'descripcion_componente'=>$descripcion
        );
        return $this->db->insert('componente_analisis', $data);
    }


}
?>