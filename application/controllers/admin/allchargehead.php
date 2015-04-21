<?php

class Allchargehead extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/chargehead_model');
        $this->load->library('pagination');
        check_in();
    }

    public function addchargehead() {
        $name = $this->input->post("charge_head_name");
        $data = array("charge_head_name"=>$name,"added_on"=>date("Y-m-d H:i:s"));
        echo ($this->db->insert("ci_chargehead",$data)) ? json_encode(array("name"=>$name,"id"=>$this->db->insert_id())) : json_encode(array("name"=>"","id"=>0));
       
    }
}