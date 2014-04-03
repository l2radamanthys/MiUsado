<?php


class Modelos extends CI_Controller {
    function __construct() 
    {
        parent::__construct();
        $this->load->library('auth'); 
    }

    
    public function registrar()
    { 
        if ($this->auth->is_admin()) 
        {
            $this->load->model('marcas_model');
            $this->load->model('modelos_model');
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            if ($this->form_validation->run('modelos_registrar') === FALSE)
            {
                $data['marcas'] = $this->marcas_model->all(); 
                
                $this->load->view('backend/header');
                $this->load->view('backend/modelos/registrar-js', $data);
                $this->load->view('backend/modelos/registrar', $data);
                $this->load->view('backend/footer');
            }
            
            else
            {
                $form_data['fk_id_marcas'] = $this->input->post('fk_id_marcas');
                $form_data['nombre_modelos'] = $this->input->post('nombre_modelos');
                $this->modelos_model->insert($form_data);

                $this->load->view('backend/header');
                $this->load->view('backend/modelos/registrar-exito');
                $this->load->view('backend/footer');

            }

        }

        else
        {
            redirect('page_404');
        }
    }
}

