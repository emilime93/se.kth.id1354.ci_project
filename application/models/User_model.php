<?php
class User_model extends CI_Model {

    public function register($encrypted_password) {
        // User data array
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $encrypted_password
        );

        //Insert user into database

        return $this->db->insert('user', $data);
    }

}