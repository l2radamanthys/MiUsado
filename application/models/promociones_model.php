<?php 

class Promociones_model extends CI_Model {
    var $table_name;

    function __construct()
    {
        super::__construct();
        $this->table_name = 'Promociones';
        
    }


    public function all()
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name);
        $query->result_array();
    }


    public function get($condition) 
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE ".$condition);
        $query->row_array();        
    }


    public function filter($condition)
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE ".$condition);
        $query->result_array();        
    }


    public function insert($data)
    {
        $this->db->insert($this->table_name, $data);
    }


    public function update($key,$value,$data)
    {
        $this->db->where($key,$value);
        $this->db->update($this->table_name, $data);        
    }
    


}


