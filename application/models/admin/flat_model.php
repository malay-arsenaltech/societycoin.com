<?php

class Flat_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_existing_email($validate_email) {
        $response = $this->db->select("email,CONCAT(email,'|', address) AS 'composite_column'",false,false)
                ->where_in("composite_column", $validate_email)->get("ci_users");
        $return_array = array();
        if(!empty($response)){
            foreach($response as $val){
                $return_array[$val->email] = $val->composite_column;
            }
        }
        return $return_array;
    }
}