<?

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
        $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE ".$condition. " ORDER BY nombre_modelos ASC");
        return $query->result_array();        
    }
    
    
    function get($keys, $value) 
    {      
    }
    
    
    function insert() 
    {
    }
    
    function update($keys, $values)
    {        
    }
}
