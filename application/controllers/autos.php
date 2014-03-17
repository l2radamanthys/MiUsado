<?php 

class Autos extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        $this->load->model('autos_model');
    }

    
    public function registrar() 
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
                #$data['marcas']= $this->marcas_model->all();

                $form_data = array(
                   #'fk_id_marcas' =>  $this->input->post('fk_id_marcas'),
                   'fk_id_modelos' =>  $this->input->post('fk_id_modelos'),
                   'version_autos' =>  $this->input->post('version_autos'),
                   'year_autos' =>  $this->input->post('year_autos'),
                   'km_autos' =>  $this->input->post('km_autos'),
                   'fuel_autos' =>  $this->input->post('fuel_autos'),
                   'motor_cv_autos' =>  $this->input->post('motor_cv_autos'),
                   'motor_cilindrada_autos' =>  $this->input->post('motor_cilindrada_autos'),
                   'segmento_autos' =>  $this->input->post('segmento_autos'),
                   'direccion_autos' =>  $this->input->post('direccion_autos'),
                   'puertas_autos' =>  $this->input->post('puertas_autos'),
                   'precio_autos' =>  $this->input->post('precio_autos'),
                   'titulo_autos' =>  $this->input->post('titulo_autos'),
                   'descripcion_autos' =>  $this->input->post('descripcion_autos'),
                   'fk_username_users' =>  $this->auth->is_logged(),
                   
                );

                #print_r($form_data);
                $this->autos_model->insert($form_data);

                #$this->load->view('backend/header');        
                #$this->load->view('backend/autos/registrar-exito');        
                #$this->load->view('backend/footer');        
                #$id_autos = 1;
                #redirect('autos/seleccionar_confort/'.$id_autos.'/1');
            }

        }
        else
        {
            redirect('/session/login');
        }
    }


    /*
     * Selecion de Elementos Adicionales del Formulario
     *
     */
    public function seleccionar_confort($id_autos, $new=0)
    {
        if ($this->auth->is_logged()) 
        {
            
            $this->load->model('marcas_model');
            $this->load->model('confort_model');
            
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            # como no hay campos para validar ya que todos son opcionales
            # no funciona el metodo tradicional de CI de validacion de form
            #if ($this->form_validation->run() == FALSE)
            if ($this->input->post('q') == FALSE)
            {
                $data['confort'] = $this->confort_model->all();
                $data['id_autos'] = $id_autos;
                $data['new'] = $new; 

                $this->load->view('backend/header');
                $this->load->view('backend/confort/seleccionar-confort', $data);
                $this->load->view('backend/footer');
            }
            else 
            {

                $confort = $this->confort_model->all();
                echo "<h1>Conforts Seleccionados</h1>";

                #elimina todas las especificaciones confort de un auto
                $this->confort_model->del_all_from_car($id_autos);

                foreach ($confort as $row) {
                    if ($this->input->post('conf_'.$row['id_confort']))
                    {
                        echo $row['nombre_confort']."<br>";
                        $row_data = array(
                            'fk_id_autos' => $id_autos, 
                            'fk_id_confort' => $row['id_confort'], 
                        );
                        
                        $this->confort_model->insert_fron_car($row_data);
                    }
                }
            }
        }
        else 
        {
            show_404();
        }          
    }    


    public function subir_imagen($id=NULL)
    {
        if ($this->auth->is_logged()) 
        {
            
            $this->load->model('modelos_model');
            $this->load->model('marcas_model');
            
            $data['js_include'] = $this->load->view('backend/imagenes/upload-js', '', TRUE);
            $data['auto'] = $this->autos_model->get($id);
            $modelo = $this->modelos_model->get($data['auto']['fk_id_modelos']);
            $marca = $this->marcas_model->get('id_marcas='.$modelo['fk_id_marcas']);
            $data['auto']['nombre_modelos'] = $modelo['nombre_modelos'];
            $data['auto']['nombre_marcas'] = $marca['nombre_marcas'];   
            
            $this->load->view('backend/header', $data);
            $this->load->view('backend/imagenes/upload', $data);
            $this->load->view('backend/footer');
        }
        else 
        {
            show_404();
        }
    }

}

