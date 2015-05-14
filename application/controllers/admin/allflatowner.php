<?php

class Allflatowner extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/master_model');
        $this->load->model('admin/flat_model');
        $this->load->model('admin/chargehead_model');
        check_in();
    }

    public function addflatowner() {
        $this->load->view('admin/addflatowner');
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

                if ($i < 1) {
                    $i++;
                    continue;
                }

                if ($post_data[0] == "" && $post_data[1] == "" && $post_data[2] == "") {
                    continue;
                }
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

            $society_data = $this->db->select("id")->where("society_user_id", $this->session->userdata('admin_id'))->get("ci_society")->result();
            $society_id = $society_data[0]->id;
            $data['charge_head'] = $this->chargehead_model->get_selected_data($society_id);
            $this->load->view('admin/flat_chargehead', $data);
        } else {
            redirect("admin/allflats/addflatowner");
        }
    }

    function process() {
        if ($this->input->post('success_record')) {
            $success_record = json_decode($this->input->post("success_record"));
            $charge_head = $this->input->post("charge_head");
            $society_data = $this->db->select("ci_society.*,ci_country.countryname,ci_states.state,ci_city.cityname")->join("ci_country", "ci_country.id = ci_society.countryid")->join("ci_states", "ci_states.id = ci_society.stateid")->join("ci_city", "ci_city.id = ci_society.cityid")->where("society_user_id", $this->session->userdata('admin_id'))->get("ci_society")->result();
            $society_id = $society_data[0]->id;
            foreach ($success_record as $val) {
                $name = explode(" ", $val->name);
                $password = $name[0] . "123";
                //$username = $name[0] . ".";
                $username = $val->email_address;
                $insert_flat_owner = array(
                    "utype" => 3,
                    "email" => $val->email_address,
                    "fname" => $name[0],
                    "lname" => isset($name[1]) ? $name[1] : "",
                    "password" => md5($password),
                    "address" => $val->address,
                    "country" => $society_data[0]->countryname,
                    "state" => $society_data[0]->state,
                    "city" => $society_data[0]->cityname,
                    "ip" => $this->input->post('ip'),
                    "status" => "1",
                    "username" => $username
                );
                $success = $this->db->insert("ci_users", $insert_flat_owner);
                $user_id = $this->db->insert_id();
                $this->send_mail($username, $password,$val->email_address,$val->name);

                $insert_flat_property = array(
                    "countryid" => $society_data[0]->countryid,
                    "stateid" => $society_data[0]->stateid,
                    "cityid" => $society_data[0]->cityid,
                    "areaid" => $society_data[0]->areaid,
                    "societyid" => $society_data[0]->id,
                    "address" => $val->address,
                    "status" => "1",
                    "ip" => $this->input->post('ip'),
                    "timestamp" => date("Y-m-d H:i:s")
                );
                $success = $this->db->insert("ci_propertys", $insert_flat_property);
                $address_id = $this->db->insert_id();

                $insert_user_flat_property = array(
                    "userid" => $user_id,
                    "countryid" => $society_data[0]->countryid,
                    "stateid" => $society_data[0]->stateid,
                    "cityid" => $society_data[0]->cityid,
                    "areaid" => $society_data[0]->areaid,
                    "societyid" => $society_data[0]->id,
                    "addressid" => $address_id,
                    "status" => "1",
                    "sadminid" => $this->session->userdata('admin_id')
                );
                $success = $this->db->insert("ci_userpropertys", $insert_user_flat_property);
                if (!$success)
                    break;
            }
            if (!$success) {
                $this->session->set_flashdata('msg_error_red', "Flat owner data not added successflly.");
            } else {
                $this->session->set_flashdata('msg_error', "Flat owner data added successflly.");
            }
            $insert_batch_charge_head = array();
            $current_charge_head = $this->chargehead_model->get_current_charge_head($society_id);
            $active_data = array();
            foreach ($charge_head as $val) {
                $active_data[] = $val;
                if (!in_array($val, $current_charge_head)) {

                    $insert_batch_charge_head[] = array(
                        "society_id" => $society_id,
                        "chargehead_id" => $val,
                        "added_on" => date("Y-m-d H:i:s")
                    );
                }
            }
            $this->db->insert_batch("ci_society_chargehead", $insert_batch_charge_head);
            $this->db->where("society_id", $society_id)->where_not_in("chargehead_id", $active_data)->update("ci_society_chargehead", array("status" => "0"));

            redirect("admin/allresidence");
        }
    }

    function send_mail($username, $password,$email,$name) {
        $this->load->library('email');

        $this->email->from("no-reply@societycoin.com", "societycoin.com");
        $this->email->to($email);
        
        $html = 'Hello ' . $name . ',  <br><br>Welcome to societycoin.com! <br><br>Please find below the login details of the site as a Role of "Flat Owner" <br> <br>---------------------------<br><br><b>User ID:</b> ' . $username . '  <br><b> Password:</b> ' . $password . ' <br> <br> <a href="' . base_url() . '" >Click to login</a> <br><br>---------------------------<br><br>Best regards,
		<br>The SocietyCoin.com team.
		<br>www.societycoin.com
		<br>support@societycoin.com';

        $this->email->subject('Account Created for Society Coin');
        $this->email->message($html);
        $this->email->set_mailtype("html");
        $this->email->send();
    }

}