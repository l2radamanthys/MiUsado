<?php

class Images_model extends CI_Model {
    var $table_name;
        
    function __construct() 
    {
        $this->load->database();
        $this->table_name = 'ImagenesAuto';
    }


    function all() 
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name);
        return $query->result_array(); 
    }


    function get($id)
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE id_imagenesauto=".$id);
        return $query->row_array();
    }


    function filter($condition)
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE ".$condition);
        return $query->result_array();
    }


    function filter_get($condition)
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE ".$condition);
        return $query->row_array();
    }

    
    function insert($data)
    {
        $this->db->insert($this->table_name, $data);
    }
    
    
    function count($condition=NULL)
    {
        if ($condition != NULL)
        {
            $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE ".$condition);        
        }
        else 
        {
            $query = $this->db->query("SELECT * FROM ".$this->table_name);                
        }
        return $query->num_rows();
        
    }
    
    
    
    function count($condition=NULL)
    {
        if ($condition != NULL)
        {
            $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE ".$condition);        
        }
        else 
        {
            $query = $this->db->query("SELECT * FROM ".$this->table_name);                
        }
        return $query->num_rows();
        
    }
}