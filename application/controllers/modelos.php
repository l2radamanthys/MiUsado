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
            
            $data['marcas'] = $this->marcas_model->all(); 
            if ($this->form_validation->run('modelos_registrar') === FALSE)
            {
            
            }
            
            else
            {
            }

    }

    else
    {
        redirect('page_404');
    }
}

