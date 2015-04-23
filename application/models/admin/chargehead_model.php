<?php

class Chargehead_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_data() {
        $data = $this->db->from("ci_bill")->get();
        return $data->result();
    }

    public function get_selected_data($society_id) {

        $data = $this->db->select("ci_society_chargehead.*,ci_bill.bill_name as charge_head_name,ci_bill.id as charge_head_id")->join("ci_society_chargehead", "ci_society_chargehead.chargehead_id = ci_bill.id")->where("society_id", $society_id)->where("ci_society_chargehead.status", "1")->from("ci_bill")->get();
        return $data->result();
    }

    public function get_current_charge_head($society_id) {

        $data = $this->db->select("group_concat(chargehead_id) as chargehead_id")->where("society_id", $society_id)->where("status", "1")->from("ci_society_chargehead")->get()->result();
        return isset($data[0]) ? explode(",", $data[0]->chargehead_id) : array();
    }

}