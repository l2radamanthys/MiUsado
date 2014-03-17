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
     * Permite subir imagenes 
     *
     */
    public function upload_image()
    {
        $this->load->helper('my_tools');
        
        $target_path = $this->config->item('image_path');
        $upload_config['upload_path'] = $target_path;
        $upload_config['allowed_types'] = 'gif|jpg|png';         
        $upload_config['max_size'] = '5120'; 
        $upload_config['encrypt_name']  = TRUE;            
        $this->load->library('upload', $upload_config);
        $result = $this->upload->do_upload('Filedata');
        
        if (!$result) {
            #Error de subida
            echo 1;             
        }
        else #la imagen se subio con exito
        {
            $imageData  = $this->upload->data();
            $img_name = $imageData['file_name'];
            if(my_resize_image($img_name))
            {
                echo $img_name;
            }
            else 
            {
                echo "Error -> ".$img_name;    
            }
        }
            
    }


    /*
     * Elimina una imagen
     */
    public function delete_image()
    {
        
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
