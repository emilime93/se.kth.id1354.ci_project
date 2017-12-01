<?php

class Users extends CI_Controller {

    public function register() {
        $data['title'] = 'Sign Up';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passwordRepeat', 'Repeated Password', 'required', 'matches[password]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('users/register', $data);
            $this->load->view('templates/footer');
        } else {
            // Encrypt the password
            $encrypted_password = md5($this->input->post('password'));
            $this->user_model->register($encrypted_password);

            // Set session message
            $this->session->set_flashdata('user_registered', 'You are now registered and can log in');

            redirect('home');
        }
    }

}