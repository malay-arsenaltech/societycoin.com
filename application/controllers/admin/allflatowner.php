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
            $duplicate_data = array();
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
                if ($post_data[0] != "" &&  $post_data[2] != "" && ($post_data[1] == "" || ($post_data[1] != "" && valid_email($post_data[1]))) && !in_array($post_data[1] . '|' . $post_data[0], $validate_email) && !$this->is_owner_exist($post_data[0], $post_data[1])) {
                    if ($this->is_email_exist($post_data[1])) {
                        $duplicate_data[] = array("address" => $post_data[0], "email_address" => $post_data[1], "name" => $post_data[2]);
                    } else {
                        $success_record[] = array("address" => $post_data[0], "email_address" => $post_data[1], "name" => $post_data[2]);
                    }
                    $validate_email[$post_data[1]] = $post_data[1] . '|' . $post_data[0];
                } else {
                    $failure_data[] = array("address" => $post_data[0], "email_address" => $post_data[1], "name" => $post_data[2]);
                }
            }
            if (!empty($validate_email)) {
                $response = $this->flat_model->get_existing_email($validate_email);
                if (!empty($response)) {
                    foreach ($success_record as $key => $val) {
                        if (in_array($val['email_address'] . "|" . $val['address'], $response)) {
                            $failure_data[] = $val;
                            unset($success_record[$key]);
                        }
                    }
                }
            }
            $data['success_record'] = $success_record;
            $data['failure_data'] = $failure_data;
            $data['duplicate_data'] = $duplicate_data;
            $this->load->view('admin/uploadedflat', $data);
        }
    }

    function chargehead() {
        if ($this->input->post('success_record') || $this->input->post('duplicate_data')) {
            $data['success_record'] = $this->input->post("success_record");
            if ($this->input->post('duplicate_data')) {
                $duplicate_data = $this->input->post('duplicate_data');
                foreach ($duplicate_data as $val) {
                    $data['duplicate_data'][] = json_decode($val);
                }
                $data['duplicate_data'] = json_encode($data['duplicate_data']);
            }

            $society_data = $this->db->select("id")->where("society_user_id", $this->session->userdata('admin_id'))->get("ci_society")->result();
            $society_id = $society_data[0]->id;
            $data['charge_head'] = $this->chargehead_model->get_selected_data($society_id);
            $this->load->view('admin/flat_chargehead', $data);
        } else {
            redirect(base_url() . "admin/allflatowner/addflatowner");
        }
    }

    function process() {
        if ($this->input->post('success_record')) {
            $success_record = json_decode($this->input->post("success_record"));
            $duplicate_data = json_decode($this->input->post("duplicate_data"));
            if (empty($duplicate_data)) {
                $duplicate_data = array();
            }
            $charge_head = $this->input->post("charge_head");
            $society_data = $this->db->select("ci_society.*,ci_country.countryname,ci_states.state,ci_city.cityname")->join("ci_country", "ci_country.id = ci_society.countryid")->join("ci_states", "ci_states.id = ci_society.stateid")->join("ci_city", "ci_city.id = ci_society.cityid")->where("society_user_id", $this->session->userdata('admin_id'))->get("ci_society")->result();
            $society_id = $society_data[0]->id;
            $sent_email = array();
            $need_to_insert = array_merge($success_record, $duplicate_data);
            foreach ($need_to_insert as $val) {
                $name = explode(" ", $val->name);
                $insert_flat_owner = array(
                    "email_address" => $val->email_address,
                    "first_name" => $name[0],
                    "last_name" => isset($name[1]) ? $name[1] : "",
                    "created_date" => date("Y-m-d H:i:s"),
                    "ip" => $this->input->post('ip'),
                );
                $success = $this->db->insert("ci_flatowner", $insert_flat_owner);
                $flat_owner_id = $this->db->insert_id();
                if (!in_array($val->email_address, $sent_email)) {
                    $sent_email[] = $val->email_address;
                    $this->send_mail($val->email_address);
                }

                $success = $this->insert_property($society_data, $val, $flat_owner_id);
                if (!$success)
                    break;
            }
            if (!$success) {
                $this->session->set_flashdata('msg_error_red', "Flat Owner Data Not Added Successfully");
            } else {
                $this->session->set_flashdata('msg_error', "Flat Owner Data Added Successfully");
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
            if (!empty($insert_batch_charge_head)) {
                $this->db->insert_batch("ci_society_chargehead", $insert_batch_charge_head);
            }
            $this->db->where("society_id", $society_id)->where_not_in("chargehead_id", $active_data)->update("ci_society_chargehead", array("status" => "0"));

            redirect(base_url() . "admin/allresidence");
        }
    }

    function insert_property($society_data, $val, $flatowner_id) {
        $insert_flat_property = array(
            "countryid" => $society_data[0]->countryid,
            "stateid" => $society_data[0]->stateid,
            "cityid" => $society_data[0]->cityid,
            "areaid" => $society_data[0]->areaid,
            "societyid" => $society_data[0]->id,
            "address" => $val->address,
            "status" => "1",
            "ip" => $this->input->post('ip'),
            "timestamp" => date("Y-m-d H:i:s"),
            "flatowner_id" => $flatowner_id
        );
        $success = $this->db->insert("ci_propertys", $insert_flat_property);
        $address_id = $this->db->insert_id();
        return $success;
    }

    function send_mail($email) {
        $this->load->library('email');

        $this->email->from("no-reply@societycoin.com", "societycoin.com");
        $this->email->to($email);
        $html = $this->load->view("admin/flat_owner_detail_email", "", true);

//        $html = 'Hello ' . $name . ',  <br><br>Welcome to societycoin.com! <br><br>Please find below the login details of the site as a Role of "Flat Owner" <br> <br>---------------------------<br><br><b>User ID:</b> ' . $username . '  <br><b> Password:</b> ' . $password . ' <br> <br> <a href="' . base_url() . '" >Click to login</a> <br><br>---------------------------<br><br>Best regards,
//		<br>The SocietyCoin.com team.
//		<br>www.societycoin.com
//		<br>support@societycoin.com';
        $this->email->subject('Welcome to Society Coin');
        $this->email->message($html);
        $this->email->set_mailtype("html");
        $this->email->send();
    }

    function downloadcsv() {
        $data = array();
        $data[0] = array("Flat Address", "Email Address", "Name");
        $this->load->helper('csv');
        echo array_to_csv($data, "flatowner_sample.csv");
    }

    function is_email_exist($email) {
        $data = $this->db->select("id")->where("email", $email)->get("ci_users")->result();
        return (!empty($data)) ? true : false;
    }

    function is_owner_exist($address, $email) {
        $this->db->select("f.id");
        $this->db->join("ci_propertys p", "f.id = p.flatowner_id");
        $data = $this->db->where("email_address", $email)->where("address", $address)->get("ci_flatowner f")->result();
        return (!empty($data)) ? true : false;
    }

}