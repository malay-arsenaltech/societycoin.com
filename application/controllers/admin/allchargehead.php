<?php

class Allchargehead extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/chargehead_model');
        $this->load->library('pagination');
        check_in();
    }

    public function index() {
        $society_data = $this->db->select("id")->where("society_user_id", $this->session->userdata('admin_id'))->get("ci_society")->result();
        $society_id = $society_data[0]->id;

        $data = array();
        $data['charge_head'] = $this->chargehead_model->get_selected_data($society_id);
        $this->load->view('admin/allchargehead', $data);
    }

    public function addchargehead() {
        if ($this->input->post("is_ajax")) {
            $name = trim($this->input->post("charge_head_name"));
            $data = array("bill_name" => $name, "status" => "1");
            echo ($this->db->insert("ci_bill", $data)) ? json_encode(array("name" => $name, "id" => $this->db->insert_id())) : json_encode(array("name" => "", "id" => 0));
        } else {
            $this->load->view("admin/addchargehead");
        }
    }

    public function process() {
        $name = trim($this->input->post("charge_head_name"));

        $data = array("bill_name" => $name, "status" => "1");
        if ($this->db->insert("ci_bill", $data)) {
            $insert_id = $this->db->insert_id();
            $society_data = $this->db->select("id")->where("society_user_id", $this->session->userdata('admin_id'))->get("ci_society")->result();
            $society_id = $society_data[0]->id;
            $this->db->insert("ci_society_chargehead", array("society_id" => $society_id, "chargehead_id" => $insert_id, "added_on" => date("Y-m-d H:i:s")));
            $this->session->set_flashdata('msg_error', "charge Head added successfully.");
        }
        else
            $this->session->set_flashdata('msg_error_red', "charge Head not added successfully.");
        redirect(base_url()."admin/allchargehead");
    }

    public function editchargehead($id) {
        $name = trim($this->input->post("charge_head_name"));
        if ($this->db->where("id", $id)->update("ci_bill", array("bill_name" => $name)))
            echo $name;
        else
            echo "";
    }

    public function deletechargehead($id) {
        if ($this->db->where("id", $id)->delete("ci_bill"))
            $this->session->set_flashdata('msg_error', "charge Head deleted successfully.");
        else
            $this->session->set_flashdata('msg_error_red', "charge Head not deleted successfully.");
        redirect(base_url()."admin/allchargehead");
    }

    public function check_charge_head() {
        $society_data = $this->db->select("id")->where("society_user_id", $this->session->userdata('admin_id'))->get("ci_society")->result();
        $society_id = $society_data[0]->id;
        $name = trim($this->input->post("charge_head_name"));
        $data = $this->db->where("bill_name", $name)->join("ci_society_chargehead", "ci_society_chargehead.chargehead_id = ci_bill.id")->where("society_id",$society_id)->get("ci_bill")->result();
        echo !empty($data) ? "false" : "true";
    }

}