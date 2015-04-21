<?php

class Chargehead_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_data() {
        $data = $this->db->from("ci_chargehead")->get();
        return $data->result();
    }

}