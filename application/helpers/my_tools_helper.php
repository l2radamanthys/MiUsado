<?php 



function my_resize_image($img_name, $width=100, $height=100)
{
    $ci =& get_instance();
    $ci->load->library('image_lib');
    
    $target_path = $ci->config->item('image_path');
    $thumb_path = $ci->config->item('thumb_path');
    
    $config['source_image'] = $target_path . $img_name;
    $config['new_image'] = $thumb_path . $img_name;
    $config['width'] = $width;
    $config['height'] = $height;
        
    $ci->image_lib->initialize($config);
    if (!$ci->image_lib->resize())
    {
        return FALSE;
    }
    else
    {
        return TRUE;
    }
}


/*
 * Funcion Humanizadora en ves de Mostrar 1 por True mostrara "Activa"
 * y "Inactiva" en el caso de False o 1"
 */
function humanize_status($val)
{
    if ($val)
    {
        return "Activa";
    }
    else 
    {
        return "Inactiva";
    }
}


function humanize_date($val)
{
    if ($val == NULL)
    {
        return "--/--/---";
    }
    else 
    {
        return $val;    
    }
     
}

