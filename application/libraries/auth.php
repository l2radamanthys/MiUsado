<?php

class Auth {
    
    protected $ci;
    
    function __construct() 
    {
        $this->ci =& get_instance();
        $this->ci->load->library('session');
        $this->ci->load->model('users_model');
    }
    
    /*
     * Iniciar Session
     * 
     * 
     * 0 - Usuario o contraseña invalidos
     * 1 - Login Correcto
     * 2 - Ya Existe una Session Abierta 
     */
    function login_user($username, $password)
    {
         if (!$this->is_logged())  
         { 
            $this->ci->session->sess_destroy();    
            $this->ci->session->sess_create();
         
            $user = $this->ci->users_model->user_exist($username);
            if ($user !== FALSE) 
            {
                if ($password == $user['password_users']) 
                {
                    if ($user['is_super_users'] == 1) 
                    {
                        $is_admin = TRUE;
                    }
                    else
                    {
                        $is_admin = FALSE;
                    }
                    $this->ci->session->set_userdata('login_user', $user['username_users']); 
                    $this->ci->session->set_userdata('is_super', $is_admin); 
                    return TRUE;
                }
                else 
                {
                    return FALSE;        
                }
            }
            else 
            {
                return FALSE;
            }
            
         }
         else 
         { #hay una session iniciadad
            return 2;
                     
         }
    }
    
    
    /*
     * Devuelve el nombre del Usuario que Haya Iniciado 
     * Session, caso contrario devuelve False.
     * 
     */
    public function is_logged() 
    {
        $usr = $this->ci->session->userdata('login_user');
        if ($usr !== FALSE)
        {
            return $usr;
        }
        else 
        {
            return FALSE;
        }
    }
 
    /*
        Devuelve si el usuario es admin
    */
    public function is_admin()
    {
        $is_admin = $this->ci->session->userdata('is_super');
        if ($is_admin !== FALSE)
        {
            return $is_admin;
        }
        else 
        {
            return FALSE;
        }
    }


    public function change_password($old, $new) 
    {
        
    }
 
 
    public function logout_user() 
    {
        $this->ci->session->unset_userdata('login_user');
        $this->ci->session->sess_destroy();    
        $this->ci->session->sess_create(); 
    }     
}
