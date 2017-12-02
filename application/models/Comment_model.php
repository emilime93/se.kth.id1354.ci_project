<?php
class Comment_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_comments($recipe) {
        $query = $this->db->get_where('comment', array(
            'recipe' => $recipe
        ));
        return $query->result();
    }

    public function delete_comment($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('comment');
        /*
        $query = $this->db->get_where('comment', array(
            'id' => $id
        ));
        $result = $query->result();*/
        if ($result->num_rows() == 1) {
            if ($result->row(0)->user == $this->session->userdata['username']) {
                //Delete the comment
                $this->db->where('id', $id);
                $result = $this->db->delete('comment');
                return $result;
            }
        } else {
            // Comment couldn't be deleted
            return false;
        }
    }

    public function create_comment($user, $comment, $recipe) {
        return $this->db->insert('comment', array(
            'id' => null,
            'user' => $user,
            'comment' => $comment,
            'recipe' => $recipe
        ));
    }
}