<?php 

class Autos extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
    }
    
    
    function registrar() 
    {
        if ($this->auth->is_logged()) 
        {
            $this->load->model('autos_model');
            $this->load->model('marcas_model');
            $this->load->library('form_validation');
            $this->load->helper('form');

            
            #cambiar delimitadores
            $this->form_validation->set_error_delimiters('<div class="field-error">','</div>');

            if ($this->form_validation->run('autos_registrar') === FALSE)
            #if ($this->form_validation->run() === FALSE)
            {
                #codigo js de la vista necesario
                $data['js_include'] = $this->load->view('backend/autos/registrar-js', '', TRUE);
                $data['marcas']= $this->marcas_model->all();
                
                $this->load->view('backend/header', $data);        
                $this->load->view('backend/autos/registrar', $data);        
                $this->load->view('backend/footer', $data);        
            }
            
            #se enviaron datos del formulario y son correctos
            else
            {
                $data['marcas']= $this->marcas_model->all();
                
                $this->load->view('backend/header', $data);        
                $this->load->view('backend/autos/registrar-exito', $data);        
                $this->load->view('backend/footer', $data);        
            }

        }
        else
        {
            redirect('/session/login');
        }
    }

}

