<?php
class Pages extends CI_Controller {

    public function view($page = 'home') {
        $data['title'] = ucfirst($page);

        if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
            // The page doesn't exist
            show_404();
        }

        // Capitalizes the first letter
        $data['title'] = ucfirst($page);
        // $data['comments'] = $this->comment_model->get_comments($page);

        $this->load->view('templates/header', $data); //Load the data here to be able to set the html Title to the page title
        $this->load->view('pages/'.$page,     $data);
        $this->load->view('templates/footer');
    }
}