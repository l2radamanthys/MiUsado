<?php


class Views extends CI_Controller {
 
    public function index() 
    {
        $data['title'] = "Mi Usado"; 
        
        $this->load->view("frontend/header", $data);
        $this->load->view("frontend/footer", $data);
    }

    public function page_404()
    {
        echo "<h2> www.mi-auto-usado.com.ar </h2>";
        echo "<p>Error 404 - Page no Found</p>";
    }


}

