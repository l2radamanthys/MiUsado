<?php

class Marcas extends CI_Controller {

    function __construct() 
    {
        parent::__construct();
        $this->load->library('auth'); 
    }

    
    function registrar()
    { 
        if ($this->auth->is_admin()) 
        {
            $this->load->model('marcas_model');
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            $data['marcas'] = $this->marcas_model->all(); 
            if ($this->form_validation->run('marcas_registrar') === FALSE)
            {
                $this->load->view('backend/header', $data);        
                $this->load->view('backend/marcas/registrar', $data);        
                $this->load->view('backend/footer', $data);        
            }
            else 
            {
                $form_data['nombre_marcas'] = $this->input->post('nombre_marcas');
                $this->marcas_model->insert($form_data);
                
                #$data['marcas'] = $this->marcas_model->all(); 
                
                $this->load->view('backend/header');        
                $this->load->view('backend/marcas/registrar-exito');        
                $this->load->view('backend/footer');        
            }

        }
        else
        {
         redirect('page_404');
        }

    }



}
