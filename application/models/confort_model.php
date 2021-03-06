<?php 

class Confort_model extends CI_Model {
    var $table_name;
    var $table_relation;
        
    function __construct() 
    {
        #super::__construct();
        $this->load->database();
        $this->table_name = 'Confort';
        $this->table_relation = "ConfortAutos"; #Tabla para el M:M
    }


    /*
     * Devueleve todos los elementos de confort
     */
     public function all()
     {
         $query = $this->db->query("SELECT * FROM ".$this->table_name);
         return $query->result_array();
     }


    /*
     * Elimina todas las entradas correspondiente a Confort de un auto
     * Para la tabla ConfortAutos
     *
     */ 
    public function del_all_from_car($id_autos)
    {
        $data = array('fk_id_autos' => $id_autos);
        $this->db->delete($this->table_relation, $data);
    }

    
    public function insert_fron_car($data)
    {
        $this->db->insert($this->table_relation, $data);
    }


    /*
     * Hace una consulta sobre el JOIN de las tablas
     */
    public function join_filter($condition)
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name." AS C INNER JOIN ".$this->table_relation." AS CA ON C.id_confort = CA.fk_id_confort WHERE ".$condition);
        return $query->result_array();
    }
}
        
