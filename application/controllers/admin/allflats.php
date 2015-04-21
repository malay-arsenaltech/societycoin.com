<?php

class Allflats extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/master_model');
        $this->load->model('admin/flat_model');
        $this->load->model('admin/chargehead_model');
        $this->load->library('pagination');
        check_in();
    }

    public function addflat() {
        $this->load->view('admin/addflat', $data);
    }

    public function upload() {
        
        $success = 0;
        $total = 0;
        $this->load->helper('email');
        if ($_FILES) {
            $society_id = $this->input->post("societyid");
            $file = $_FILES['flat_data']['tmp_name'];
            $handle = fopen($file, "r");
            $success_record = array();
            $failure_data = array();
            $validate_email = array();

            //loop through the csv file and insert into database 
            $i = 0;

            while ($post_data = fgetcsv($handle, 1000, ",", "'")) {
                $post_data = array_map("trim", $post_data);
//                if ($i <= 2)
//                    continue;
                if ($post_data[0] != "" && $post_data[1] != "" && $post_data[2] != "" && valid_email($post_data[1]) && !in_array($post_data[1], $validate_email)) {
                    $success_record[] = array("address" => $post_data[0], "email_address" => $post_data[1], "name" => $post_data[2]);
                    $validate_email[] = $post_data[1];
                } else {
                    $failure_data[] = array("address" => $post_data[0], "email_address" => $post_data[1], "name" => $post_data[2]);
                }
            }
            if (!empty($validate_email)) {
                $response = $this->flat_model->get_existing_email($validate_email);
                if (!empty($response->email_address)) {
                    $response = explode(",", $response->email_address);
                    foreach ($success_record as $key => $val) {
                        if (in_array($val['email_address'], $response)) {
                            $failure_data[] = $val;
                            unset($success_record[$key]);
                        }
                    }
                }
            }
            $data['success_record'] = $success_record;
            $data['failure_data'] = $failure_data;
            $this->load->view('admin/uploadedflat', $data);
        }
    }

    function chargehead() {
        if ($this->input->post('success_record')) {
            $data['success_record'] = $this->input->post("success_record");
            $data['charge_head'] = $this->chargehead_model->get_data();
            $this->load->view('admin/flat_chargehead', $data);
        } else {
            redirect("admin/allflats/addflat");
        }
    }

    function process() {
        if ($this->input->post('success_record')) {
            $success_record = json_decode($this->input->post("success_record"));
            $charge_head = $this->input->post("charge_head");
            $society_data = $this->db->where("society_user_id",$this->session->userdata('admin_id'))->get("ci_society")->result();
            $society_id = $society_data[0]->id;
            $insert_batch_flat_owner = array();
            
            foreach($success_record as $val){
                $name=explode(" ",$val->name);
                $password =$name[0]."123";
                $username = $name[0].".";
                $username .= isset($name[1]) ? $name[1]:"";
                $insert_batch_flat_owner[] = array(
                    "utype" => 3,
                    "email" =>$val->email_address,
                    "fname"=> $name[0],
                    "lname"=>isset($name[1]) ? $name[1] : "",
                    "password"=>md5($password),
                    "status"=>"1",
                    "username"=>$username
                );
            }
            $this->db->insert_batch("ci_users",$insert_batch_flat_owner);
            
            $insert_batch_charge_head = array(); 
            foreach($charge_head as $val){
                $insert_batch_charge_head[] = array(
                    "society_id" => $society_id,
                    "chargehead_id" =>$val,
                    "added_on"=> date("Y-m-d H:i:s")
                );
            }
            $this->db->insert_batch("ci_society_chargehead",$insert_batch_charge_head);
            
        }
    }

}