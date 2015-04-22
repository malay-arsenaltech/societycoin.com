<?php

class Allresidence extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/residence_model');
        $this->load->library('pagination');
        check_in();
    }

    public function index() {
        if ($this->input->get_post('search_text')) {
            $search_str = "&search_text=" . $this->input->get_post('search_text');
        }
        else
            $search_str = '';


        $config = array();
        $config["base_url"] = base_url() . "admin/allresidence/index/?";
        $config["total_rows"] = $this->residence_model->getCountsocietycustomer();
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config['full_tag_open'] = '<td>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = '&gt;';
        $config['prev_link'] = '&lt;';
        $config['cur_tag_open'] = '<b>';
        $config['cur_tag_close'] = '</b>';
        $config['full_tag_close'] = '</td>';
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $page = (isset($_GET['per_page']) && $_GET['per_page'] != '' ) ? $_GET['per_page'] : 0;
        $data['data'] = $this->residence_model->all_residence($config["per_page"], $page);
        //   $data['allcountry'] = $this->master_model->allsociety();
        $this->load->view('admin/allresidence', $data);
    }

    public function editresidence($id = '') {

        $result = $this->residence_model->residence_by_id($id);

        if (count($result) > 0) {
            $data['data'] = $result;
            $udatemail = (isset($result['email'])) ? $result['email'] : "";
            $this->session->set_userdata('update_email', $udatemail);
            $this->load->view('admin/editresidence', $data);
        } else {
            $msg = "Invalid residence id";
            $this->session->set_flashdata('msg_error_red', $msg);
            redirect(base_url() . 'admin/allresidence');
        }
    }

    public function update() {
        $result = $this->residence_model->update_residence();

        if ($result === 1062) {
            $msg = "This email is already used by another user.";

            $this->session->set_flashdata('msg_error_red', $msg);
            redirect(base_url() . 'admin/allresidence');
        }


        $this->residence_model->activity("Update Profile");
        if ($result == true) {
            $this->session->set_flashdata('msg_error', "Residence Updated successfully.");
            redirect(base_url() . 'admin/allresidence');
        } else {
            $this->session->set_flashdata('msg_error_red', "Residence not Updated successfully.");
            redirect(base_url() . 'admin/allresidence');
        }
    }
    public function delete($id) {
        $this->db->where("id", $id)->delete("ci_userpropertys");
        if ($this->db->where("id", $id)->delete("ci_users"))
            $this->session->set_flashdata('msg_error', "Residence deleted successfully.");
        else
            $this->session->set_flashdata('msg_error_red', "Residence not deleted successfully.");
        redirect("admin/allresidence");
    }

}