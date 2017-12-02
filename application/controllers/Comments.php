<?php
class Comments extends CI_Controller {

    // Create a comment
    public function create($recipe) {
        // Anti XXS
        $comment = $this->security->xss_clean($this->input->post('comment'));
        $comment = htmlspecialchars($comment);
        $user = $this->session->userdata('username');
        $data['title'] = ucfirst($recipe);

        $this->form_validation->set_rules('comment', 'Comment', 'required|trim|xss_clean');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$recipe, $data);
            $this->load->view('templates/footer');
        } else {
            $this->comment_model->create_comment($user, $comment, $recipe);
            $data['comments'] = $this->comment_model->get_comments($recipe);

            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$recipe, $data);
            $this->load->view('templates/footer');
        }
    }

    public function delete_comment() {
        $comment_id = $this->input->post('id');

        // Input filtering
        if (!ctype_digit($comment_id)) {
            $this->session->set_flashdata('comment_delete_fail', 'Comment couldn\'t be deleted');
        }

        // Try to delete the comment
        if ($this->comment_model->delete_comment($comment_id)) {
            $this->session->set_flashdata('comment_deleted', 'Comment successfully deleted!');
        } else {
            $this->session->set_flashdata('comment_delete_fail', 'Comment couldn\'t be deleted');
        }
        redirect($this->input->post('recipe'));
    }
}