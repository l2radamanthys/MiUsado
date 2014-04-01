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
            $this->load->model('users_model');
            $this->load->library('form_validation');
            $this->load->helper('form');

            $data['message'] = NULL; 

            if ($this->form_validation->run('promocion_canjear') === FALSE)
            {
                #no hacer nada
            }
            else 
            {
                $code = $this->input->post('codigo_promotions');
                $user = $this->auth->is_logged();

                if($this->promociones_model->exist($code)) 
                {
                    $result = $this->promociones_model->is_exchanged($code, $user);
                    if ($result == 0)
                    {
                        $promo = $this->promociones_model->get_by_key($code);
                        
                        $today = strtotime(Date("Y-m-d")); #fecha de hoy para comparar si se encuentra entre las fechas
                        $ini = strtotime($promo['init_date_promotions']);
                        $end = strtotime($promo['end_date_promotions']);
                        #si la fecha esta dentro del rango
                        #$indate = $today >= $ini AND $today <= $end;
                        $indate = $today <= $end;
                        #si hay promociones disponibles
                        $disp = $promo['avaibles_promotions'];
                            
                        if ($indate AND $disp > 0)
                        {
                            $form_data = array(
                                'fk_codigo_promotions' => $code,
                                'fk_username_users' => $user
                            );
                            
                            $this->users_model->add_credits($user, $promo['amount_promotions']);
                            $this->promociones_model->decreace_avaible($code);
                            $this->promociones_model->ref_insert($form_data);
                            
                            $data['message'] = 'Promocion Acreditada Exitosamente';
                        }
                        else
                        {
                            $data['message'] = 'La promocion solicitada ha Expirado';
                        }
                    }
                    else #la promocion ya fue cangeada
                    {
                        $data['message'] = "El codigo de Promocion solicitado ya ha sido utilizado";
                    }
                }
                else
                {
                    $data['message'] = "Error codigo Invalido de Promocion";
                }

                 
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

