<?php

/*
 * Modelos de Autos, depende marca
 */
class Modelos_model extends CI_Model {
    var $table_name;
        
    function __construct() 
    {
        $this->load->database();
        $this->table_name = 'Modelos';
    }    
    
    
    function all() 
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name. " ORDER BY nombre_modelos ASC");
        return $query->result_array(); 
    }
    
    
    function filter($condition)  
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE ".$condition." ORDER BY nombre_modelos ASC");
        return $query->result_array();        
    }
     
    
    function get($id) 
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE id_modelos=".$id);
        return $query->row_array();              
    }
    
     /**
      * undocumented function
      *
      * @return void
      * @author Me
      **/
    function insert($data) 
    {
        $this->db->insert($this->table_name, $data);
    }
    
    function update($keys, $values)
    {        
    }


    /*
     * Retorna el numero de modelos que existen y corresponden a una marca
     * en particula
     *
     * @argv $id id de la marca corresponde al campo fk_id_marcas
     * @return integer
     *  
     */
    public function total_por_marca($id)
    {
        $this->db->from($this->table_name);
        $this->db->where('fk_id_marcas', $id);
        return $this->db->count_all_results();
    }

    
    /*
     * Consulta si existe un elemento
     */  
    public function exist($id_marca, $name)
    {
        
    }
    
}
