<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 


    function getNameTipo($id)
    {   
        $this->db->where('cod_tipo',$id);        
        $query = $this->db->get('tipo_analisis');
        return $query->result();
        
    }
