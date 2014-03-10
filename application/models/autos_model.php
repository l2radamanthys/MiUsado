<?php

class Autos_model extends CI_Model {
    var $table_name;
        
    function __construct() 
    {
        $this->load->database();
        $this->table_name = 'Autos';
    }


    function all() 
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name);
        return $query->result_array(); 
    }


    function get($id)
    {
    }


    function filter($condition)
    {
    }

    
    function insert($data)
    {
    }
}


