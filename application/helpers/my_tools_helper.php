<?php 



function my_resize_image($img_name, $folder=NULL, $size=array('width'=>100, 'height'=>100))
{
    $ci =& get_instance();
    $ci->load->library('image_lib');
    
    if ($folder == NULL)
    {
        $thumb_path = $ci->config->item('main_thumb_path');    
    }
    else
    {
        $thumb_path = $folder;
    }

    $target_path = $ci->config->item('upload_path');    
    
    $config['source_image'] = $target_path . $img_name;     
    $config['new_image'] = $thumb_path . $img_name;
    #$config['create_thumb'] = FALSE;
    #$config['maintain_ratio'] = TRUE;
    $config['width'] = $size['width'];
    $config['height'] = $size['height'];
        
    $ci->image_lib->initialize($config);
    if ($ci->image_lib->resize())
    {
        return TRUE;
    }
    else
    {
        return FALSE;
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


function alink($url)
{
    return '<p><a href="'.base_url().$url.'">'.$url.'</a></p>';    
}

