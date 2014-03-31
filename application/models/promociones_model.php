<?php 

class Promociones_model extends CI_Model {
    var $table_name;
	var $table_reference;

    function __construct()
    {
        #super::__construct();
        $this->table_name = 'Promotions';
        $this->table_reference = "PromocionesCanjeadas";        
    }


    public function all()
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name);
        $query->result_array();
    }


	public function exist($code)
	{
		#nose  si implementar
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
    
    /*
     * Inserta un campo en la tabla de referencia
     * @param $data array asociatiavo campo->valor con los datos a registrarç
     * @return NULL
     */ 
    public function ref_insert($data)
    {
        $this->db->insert($this->table_name, $data);
    }


    public function update($key, $value, $data)
    {
        $this->db->where($key,$value);
        $this->db->update($this->table_name, $data);        
    }
    
    /*
     * Consulta si la promocion ya fue utilizada por el
     * usuario, retorna 1 o 0
     * 
     * @param $codigo codigo de promocion
     * @param $user nombre de usuario  
     */ 
	public function is_canjeada($codigo, $user)
	{
		$condition = "fk_codigo_promotions='".$codigo."' AND fk_username_users='".$user."'";
		$query = $this->db->query('SELECT * FROM '.$this->table_reference." WHERE ".$condition);
		$result = count($query->result_array());
		return $result;
	}

}


