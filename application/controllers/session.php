<?php

class Session extends CI_Controller  {
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
    }
    
    
    function index() {
        if ($this->auth->is_logged()) 
        {
            echo "login ".$this->auth->is_logged(); 
        }
        else 
        {
            echo "not login";
        }
    }
           
           
    function login() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        #configuracion de formulario
        $this->form_validation->set_rules('username', 'Usuario', 'required');
        $this->form_validation->set_rules('password', 'Contraseña', 'required');
        
        $data['page_title'] = "Panel de Administracion - Iniciar Session";
        
        if ($this->form_validation->run() === FALSE) 
        { 
            $this->load->view('session/header', $data);
            $this->load->view('session/login');
            $this->load->view('session/footer');
        }   
            
        else 
        { #form submit
            $user = $this->input->post('username');
            $pswr = $this->input->post('password');
            $result = $this->auth->login_user($user, $pswr);               
            if ($result === TRUE) 
            {
                redirect('/backend/');
            }   
            
            elseif ($result == 2) 
            { #usuario ya logueado
                redirect('/backned/'); #depues veo que hago
            }
            
            else 
            { #login error
                $this->load->view('session/header', $data);
                $this->load->view('session/login', $data);
                $this->load->view('session/footer', $data);                 
            }
        }   
    }
    
    function logout()
    {
        $this->auth->logout_user();
        redirect('/session/login');
   
    }
    
}
