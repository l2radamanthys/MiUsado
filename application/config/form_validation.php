<?php


$config = array(
    #restricciones para registrar un autos model
    "autos_registrar" => array(
        array('field' => 'year_autos', 'label' => '', 'rules' => 'required'),
        array('field' => 'km_autos', 'label' => '', 'rules' => 'required'),
        array('field' => 'motor_cv_autos', 'label' => 'Motor Caballos de Fuerza', 'rules' => 'required'),
        array('field' => 'motor_cilindrada_autos', 'label' => 'Motor Cilindradas', 'rules' => 'required'),
        array('field' => 'puertas_autos', 'label' => 'Numero de Puertas', 'rules' => 'required'),
        array('field' => 'precio_autos', 'label' => 'Precio', 'rules' => 'required'),
        array('field' => 'titulo_autos', 'label' => 'Titulo de la Publicacion', 'rules' => 'required'),
        array('field' => 'descripcion_autos', 'label' => 'Descripcion', 'rules' => 'required'),
        #array('field' => '', 'label' => '', 'rules' => 'required'),
        #array('field' => '', 'label' => '', 'rules' => 'required'),
        #array('field' => '', 'label' => '', 'rules' => 'required'),
    ),
    "marcas_registrar" => array(
        array('field' => 'nombre_marcas', 'label' => 'Nombre Marca', 'rules' => 'required'),
    ),

    "modelos_registrar" => array( 
        array('field' => 'nombre_modelos', 'label' => 'Nombre Modelos', 'rules' => 'required'),

    ),
    
);
