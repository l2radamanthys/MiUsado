<?php

class Backend extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
    }
    
    /*
     * Panel de usuario
    */
    function index() 
    {
       if ($this->auth->is_logged()) 
       {
           $username = $this->auth->is_logged(); 
           $user_info = $this->users_model->get($username);

            
           $data['coins'] = $user_info['credits_users']; #monedas disponibles
           $data['active_pub'] = 0;
           $data['end_pub'] = 0;
           
           
           $this->load->view('backend/header');
           $this->load->view('backend/panel', $data);
           $this->load->view('backend/footer');
       }
       
       else   
       {
           redirect('/session/login');
       }       
    }
    

    function publicaciones_activas() {
        $this->load->view('backend/header');
        $this->load->view('backend/publicaciones-activas');        
        $this->load->view('backend/footer');
    }
    
    function publicaciones_finalizadas() {
        $this->load->view('backend/header');
        $this->load->view('backend/publicaciones-finalizadas');
        $this->load->view('backend/footer');
    }    
}
