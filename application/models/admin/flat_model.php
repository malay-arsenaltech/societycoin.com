<?php

class Flat_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_existing_email($validate_email) {
        $response = $this->db->select("group_concat(email) as email_address")->where_in("email", $validate_email)->get("ci_users")->result();
        return $response[0];
    }
}