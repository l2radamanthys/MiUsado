<?php 

class Multimedia_model extends CI_Model {
    var $table_name;
    var $table_relation;
        
    function __construct() 
    {
        #super::__construct();
        $this->load->database();
        $this->table_name = 'Multimedia';
        $this->table_relation = "MultimediaAutos"; #Tabla para el M:M
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
        $query = $this->db->query("SELECT * FROM ".$this->table_name." AS M INNER JOIN ".$this->table_relation." AS MA ON M.id_multimedia = MA.fk_id_multimedia WHERE ".$condition);
        return $query->result_array();
    }
}
