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

    public function login($username, $password) {
        //Validate
        $this->db->where('username', $username);

        $result = $this->db->get('user');

        if ($result->num_rows() == 1) {
            if (password_verify($password, $result->row(0)->password)) {
                return $result->row(0)->username;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function check_username_exists($username) {
        $query = $this->db->get_where('user', array(
            'username' => $username
        ));
        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }

}