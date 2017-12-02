<?php

class Users extends CI_Controller {

    // Register a user
    public function register() {
        $data['title'] = 'Sign Up';

        $this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean|callback_check_username_exists');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean');
        $this->form_validation->set_rules('passwordRepeat', 'Repeated Password', 'required|trim|xss_clean|matches[password]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('users/register', $data);
            $this->load->view('templates/footer');
        } else {
            // Encrypt the password
            $encrypted_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $this->user_model->register($encrypted_password);

            // Set session message
            $this->session->set_flashdata('user_registered', 'You are now registered and can log in');

            redirect('home');
        }
    }

    // Log user out
    public function logout() {
        // Unset user-data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('username');

        // Set message
        $this->session->set_flashdata('user_logged_out', 'You are now logged out');

        redirect('home');
    }

    // Log in a user
    public function login() {
        $data['title'] = 'Log In';

        $this->form_validation->set_rules('username', 'Username', 'required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('users/login', $data);
            $this->load->view('templates/footer');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user_id = $this->user_model->login($username, $password);
            if ($user_id) {
                // Create a session
                $user_data = array(
                    'username' => $user_id,
                    'logged_in' => true
                );
                $this->session->set_userdata($user_data);

                // Set message
                $this->session->set_flashdata('user_logged_in', 'You are now logged in');

                redirect('home');
            } else {
                // Set message
                $this->session->set_flashdata('login_failed', 'Incorrect credentials, try again');

                redirect('users/login');
            }
        }
    }

    // Check if username exists
    function check_username_exists($username) {
        $this->form_validation->set_message('check_username_exists', 'That username is already taken. Please choose another one');
        if ($this->user_model->check_username_exists($username)) {
            return true;
        } else {
            return false;
        }
    }

}