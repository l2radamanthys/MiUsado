<?php

class Users_model extends CI_Model {
    var $table_name;
        
    function __construct() 
    {
        $this->load->database();
        $this->table_name = 'Users';
    }
    
    
        /*
     * Comprueba si existe el usuario $user en caso de que si retornara un array 
     * con los datos correspondiente a la fila, en caso contrario retornara FALSE.
     * 
     * @param string $user
     * 
     * @return array or boolean
     */ 
    public function user_exist($user)
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE username_users='".$user."';");
        if ($query->num_rows() != 0) {
            return $query->row_array();   
        }
        else {
            return FALSE;
        }
    }

    /*
     * obitiene los datos del usuario
     */
    public function get($user)
    {
        #$query = $this->db->query("SELECT * FROM ".$this->table_name)
        return $this->user_exist($user);
    }

    
    public function update($key, $value, $data)
    {
        $this->db->where($key,$value);
        $this->db->update($this->table_name, $data);        
    }
    
    
    public function add_credits($user, $amount)
    {
        $userd = $this->user_exist($user);           
        $data = array('credits_users' => ($userd['credits_users'] + $amount));
        $this->update('username_users', $user, $data);
            
    }
    

}
