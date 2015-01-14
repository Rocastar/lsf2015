<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_elemento extends CI_Model {
    public function __construct() {
		parent::__construct();
	}
    function getAllComponente(){
        $query = $this->db->get('componente_analisis');
        return $query->result();
    }
    
    function createElemento($conponente, $nombre){
        $data = array(
            	'cod_componente' =>$conponente,
                'nombre_elemento' =>$nombre
        );
         $this->db->insert('elementos_analisis', $data);
        return $this->db->insert_id(); 
    }
    
    public function createValores($codelemento, $tipovalor, $rango, $unidadrango, $muestraanalisis){
        $data = array(
            'cod_elemento'  =>$codelemento,
            'tipo_valor'    =>$tipovalor,
            'unidad_rango'  =>$unidadrango,
            'muestra_analisis' =>$muestraanalisis
        );
        return $this->db->insert('valores_referencia', $data);
    }
    public function GetAllElemento(){
        $query = $this->db->get('tipo_analisis');
        
        $this->db->select('*');
        $this->db->from('elementos_analisis as e');
        $this->db->join('valores_referencia as v', 'e.cod_elemento = v.cod_elemento', 'INNER');
        $this->db->join('componente_analisis as c', 'c.cod_componente = e.cod_componente ', 'INNER');
        $query = $this->db->get();
        
        if ($query->num_rows() > 0){
            return $query->result();
        }else{
            return 'no hay datos';
        }
    }
}