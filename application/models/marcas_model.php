<?

class Marcas_model extends CI_Model {
    var $table_name;
        
    function __construct() 
    {
        #super::__construct();
        $this->load->database();
        $this->table_name = 'Marcas';
    }
    
    
    function all() 
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name. " ORDER BY nombre_marcas ASC");
        return $query->result_array(); 
    }
    
    
    function filter($condition)  
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE ".$condition. " ORDER BY nombre_marcas ASC");
        return $query->result_array();        
    }
    
    
    function get($condition) 
    {      
        $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE ".$condition);
        return $query->row_array();        
    }
    
    
    function insert($data) 
    {
        $this->db->insert($this->table_name, $data);
    }
    

    function update($key, $condition, $data)
    {        
        $this->db->where($key, $condition);
        $this->db->update($this->table_name, $data);
    }
}
