<?php

class Pages extends CI_Controller {

    public function view($page = 'home') {
        $data['title'] = ucfirst($page);

        if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
            // The page doesn't exists
            show_404();
        }

        // Capitalizes the first letter
        $data['title'] = ucfirst($page);

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page,     $data);
        $this->load->view('templates/footer', $data);
    }
}