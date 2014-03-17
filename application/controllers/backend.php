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
    public function index() 
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
    
    
    public  function nueva_publicacion()
    {
        $this->load->view('backend/header');
        $this->load->view('backend/nueva-publicacion');        
        $this->load->view('backend/footer');
    }


    public function publicaciones_activas() {
        $this->load->view('backend/header');
        $this->load->view('backend/publicaciones-activas');        
        $this->load->view('backend/footer');
    }
    
    public function publicaciones_finalizadas() {
        $this->load->view('backend/header');
        $this->load->view('backend/publicaciones-finalizadas');
        $this->load->view('backend/footer');
    }

    public function span()
    {
        echo $_SERVER['DOCUMENT_ROOT'];
    }
    
    
}
