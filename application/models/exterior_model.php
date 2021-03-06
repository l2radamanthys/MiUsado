<?php 

class Exterior_model extends CI_Model {
    var $table_name;
    var $table_relation;
        
    function __construct() 
    {
        #super::__construct();
        $this->load->database();
        $this->table_name = 'Exterior';
        $this->table_relation = "ExteriorAutos"; #Tabla para el M:M
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
        $query = $this->db->query("SELECT * FROM ".$this->table_name." AS E INNER JOIN ".$this->table_relation." AS EA ON E.id_exterior = EA.fk_id_exterior WHERE ".$condition);
        return $query->result_array();
    }
}
