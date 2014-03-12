<?php

class Http_response extends CI_Controller {
    
    /*
     * Devuele todos los modelos correspondientes a una Marca 
     */
    function modelos_por_marca() 
    {
        $this->load->model('modelos_model');
        
        if (isset($_POST['id'])) { $id = $this->input->post('id'); }
        else { $id = 1; }
       
        $data = $this->modelos_model->filter('fk_id_marcas='.$id);
        $format = '<option value="%d">%s</option>'."\n";
        foreach ($data as $row) {
            echo sprintf($format, $row['id_modelos'], $row['nombre_modelos']);
        }
    }   

    /* 
     * Tabla con el listado correspondiente 
     */
    public function listado_modelos_por_marca()
    {
        $this->load->model('modelos_model');
        
        if (isset($_POST['id'])) { $id = $this->input->post('id'); }
        else { $id = 1; }
        
        $count = $this->modelos_model->total_por_marca($id);
        if ($count == 0)
        {
            echo $count;
            echo "<p>No Hay Resultados</p>";
        }
        else
        {        
            $data['modelos'] = $this->modelos_model->filter('fk_id_marcas='.$id);
            $this->load->view('backend/modelos/registrar-tbl', $data);
        }
    }
    

    /*
        Funcion de prueba para controlar que funcione la peticion AJAX
    */
    function test() 
    {
        echo "<option value=1>Valor 1</option>";
        echo "<option value=2>Valor 2</option>";
        echo "<option value=3>Valor 3</option>";
    }
}
