<?php

class Http_response extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('images_model');
    }
    
    
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
        
        
        
        $target_path = $this->config->item('upload_path'); 
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
            
            #main 350x350
            $size1_folder = $this->config->item('main_thumb_path'); 
            $size1 = $this->config->item('main_thumb_size');
            if(!my_resize_image($img_name, $size1_folder, $size1))
            {
                echo "Error -> size 1 ".$img_name; 
                   
            }
            
            #sub 80x80
            $size2_folder = $this->config->item('sub_thumb_path'); 
            $size2 = $this->config->item('sub_thumb_size');
            if(!my_resize_image($img_name, $size2_folder, $size2))
            {
                echo "Error -> size 2 ".$img_name;    
            }
            
            #search 180x180
            $size3_folder = $this->config->item('search_thumb_path'); 
            $size3 = $this->config->item('search_thumb_size');
            if(!my_resize_image($img_name, $size3_folder, $size3))
            {
                echo "Error -> size 3 ".$img_name;    
            }
        }  
    }


    public function list_of_images($id)
    {
        
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
