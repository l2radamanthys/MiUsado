<?php

class Promociones extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        $this->load->model('promociones_model');
    }


    public function canjear()
    {
        if ($this->auth->is_logged())
        {
            $this->load->library('form_validation');
            $this->load->helper('form');

            $data['message'] = NULL; 

            if ($this->form_validation->run('promocion_canjear') === FALSE)
            {

            }
            else 
            {
                $code = $this->input->post('codigo_promotions');
                $user = $this->auth->is_logged();
                $today = NULL; #fecha de hoy para comparar si se encuentra entre las fechas

                $promo = $this->promociones_model->get("codigo_promotions='".$code."'");
                
                
                $data['message'] = 'commit';
                 
                $form_data = array(
                    'fk_codigo_promotions' => $code,
                    'fk_username_users' => $user
                );
                #this->promociones_model->ref_insert($form_data);
            }
                
            $this->load->view('backend/header');
            $this->load->view('backend/promotions/canjear', $data);
            $this->load->view('backend/footer');
        }
        else
        {
            redirect('session/login/');
        }
    }


}

