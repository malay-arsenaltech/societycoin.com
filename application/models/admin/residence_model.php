<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Residence_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    function getCountsocietycustomer() {
        $sql = "select * from ci_users  where utype in(3)";
        $sql = mysql_query($sql);
        return mysql_num_rows($sql);
    }

    function all_residence($start = 0, $limit = 0) {
        $subadmiid = $this->session->userdata('admin_id');
        $where = '';
        if (isset($_GET['search_text']) && $_GET['search_text'] != '') {
            $s = trim($this->input->get_post('search_text'));
            $where = "(f.first_name='$s' OR f.last_name='$s' OR f.email_address='$s' OR c.cityname='$s' OR s.state='$s' OR p.address like '%$s%') ";
        }

        $query = $this->db->query("select distinct id  from ci_society where society_user_id='$subadmiid'");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $soid[] = $row->id;
            }
            $alls = implode(',', $soid);
        }
        $this->db->select("SQL_CALC_FOUND_ROWS f.*,p.flatowner_id,p.address as flat_address,p.id as property_id, c.cityname city,s.state", false);
        $this->db->join("ci_flatowner f", " f.id = p.flatowner_id");
        $this->db->join("ci_states s", "s.id = p.stateid", "left");
        $this->db->join("ci_city c", "c.id = p.cityid", "left");
        $this->db->where("p.societyid IN($alls)");
        if (!empty($where))
            $this->db->where($where);
//        $this->db->group_by("u.id");
        $this->db->group_by("p.id");
        if ($start != 0 || $limit != 0) {
            $this->db->limit($start, $limit);
        }
        $all_society_u = $this->db->get("ci_propertys p");
        $return_data = array();
        if ($all_society_u->num_rows() > 0) {
            $return_data['rows'] = $all_society_u->result_array();
        }
        $query = $this->db->query('SELECT FOUND_ROWS() AS `Count`');
        $return_data['num_rows'] = $query->row()->Count;
        return $return_data;
    }

    public function residence_by_id($property_id) {
        $this->db->select("SQL_CALC_FOUND_ROWS f.*,p.flatowner_id,p.address as flat_address,p.id as property_id, c.cityname city,s.state", false);
        $this->db->join("ci_flatowner f", " f.id = p.flatowner_id");
        $this->db->join("ci_states s", "s.id = p.stateid", "left");
        $this->db->join("ci_city c", "c.id = p.cityid", "left");
        $this->db->where("p.id", $property_id);
        $query = $this->db->get("ci_propertys p");
        return $query->row_array();
    }

    function update_residence() {

        $data['first_name'] = $_POST['username'];
        $data['last_name'] = $_POST['name'];
        $data['ip'] = $_POST['ip'];
        $data['email_address'] = $_POST['email'];
        $data['updated_date'] = date("Y-m-d H:i:s");
        $this->db->where('id', $_POST['flatowner_id']);
        $this->db->update('ci_flatowner', $data);
        $data = array();
        $data['address'] = $_POST['address'];
        $data['ip'] = $_POST['ip'];
        $this->db->where('id', $_POST['property_id']);
        $this->db->update('ci_propertys', $data);

        $eero = $this->db->_error_number();
        if ($eero === 1062) {
            return $eero;
        }
        else
            return true;
    }

    function activity($act) {
        $data = array(
            'userid' => $this->session->userdata('admin_id'),
            'username' => $this->session->userdata('admin_fname'),
            'utype' => $this->session->userdata('utype'),
            'activity' => $act,
            'status' => '1'
        );
        $query = $this->db->insert('ci_logs', $data);
    }

    function get_property_id($society_id, $address, $email) {
        $this->db->select("p.id")->join("ci_flatowner f", "f.id = p.flatowner_id");
        $property_data = $this->db->like("p.address", $address)->where("email_address", $email)->get("ci_propertys p")->result();
        return !empty($property_data) ? $property_data[0]->id : "";
    }

    public function send_mail($data) {

        $this->load->library('email');
        $this->load->helper('email');

        foreach ($data as $val) {
            $html = $this->load->view("admin/bill_detail_email", $val, true);
            $this->email->from("no-reply@societycoin.com", "societycoin.com");
            $this->email->subject("Your latest Bill is Now Available");
            $this->email->message($html);
            $this->email->set_mailtype("html");
            $this->email->to(array($val['email']));
            $this->email->send();
        }
    }

    function billdata($start = 0, $limit = 0, $society_admin_id = 0) {

        if ($this->input->get_post('search_text')) {
            $s = trim($this->input->get_post('search_text'));

            $this->db->where("(p.address like  '$s%' OR f.first_name like '$s%'  OR f.last_name like '$s%' OR f.email_address like '$s'  OR bc.sdate like '$s%'  OR bc.edate like '$s%' OR bc.totalamount like '$s%' OR s.fname like '$s%' OR s.lname like '$s%'  OR sd.society_title like '$s%') ");
        }
        $this->db->select('SQL_CALC_FOUND_ROWS bc.id AS billid,bc.related_id AS related_id,p.address AS flat,p.id AS property_id,f.first_name AS fname,f.last_name AS lname,f.email_address AS email,bc.sdate,bc.edate,bc.totalamount as total,CONCAT(s.fname, " ", s.lname) AS society_admin,sd.society_title ', false);
        $this->db->from('ci_bill_charge  as bc');
        $this->db->join('ci_bill as b', 'bc.bill_id=b.id', "left");
        $this->db->join('ci_propertys as p', 'bc.property_id=p.id', "left");
        $this->db->join('ci_flatowner as f', 'f.id = p.flatowner_id');
        $this->db->join('ci_users as s', 'bc.addbyid = s.id', "left");
        $this->db->join('ci_society as sd', 'sd.id = p.societyid', "left");
        $this->db->where("bc.related_id IS NOT NULL");
        $this->db->group_by("bc.related_id");
        $this->db->order_by("bc.id", "desc");
        if ($society_admin_id > 0)
            $this->db->where('bc.addbyid', $this->session->userdata('admin_id'));
        $this->db->limit($start, $limit);
        $query = $this->db->get();
        $return_data = array();
        $return_data['rows'] = $query->result_array();
        $query = $this->db->query('SELECT FOUND_ROWS() AS `Count`');
        $return_data['num_rows'] = $query->row()->Count;
        return $return_data;
    }

    function billdetailbyid($id) {
        $this->db->select('SQL_CALC_FOUND_ROWS bc.id AS billid,bc.related_id AS related_id,p.address AS flat,p.id AS property_id,f.first_name AS fname,f.last_name AS lname,f.email_address AS email,bc.sdate,bc.edate,bc.totalamount as total,CONCAT(s.fname, " ", s.lname) AS society_admin,sd.society_title,group_concat(b.bill_name) as bill_name,group_concat(bc.amount) as amount,bc.taxamount as tax', false);
        $this->db->from('ci_bill_charge  as bc');
        $this->db->join('ci_bill as b', 'bc.bill_id=b.id', "left");
        $this->db->join('ci_propertys as p', 'bc.property_id=p.id', "left");
        $this->db->join('ci_flatowner as f', 'f.id = p.flatowner_id');
        $this->db->join('ci_users as s', 'bc.addbyid = s.id', "left");
        $this->db->join('ci_society as sd', 'sd.id = p.societyid', "left");

        $this->db->where("bc.related_id", $id);
        $query = $this->db->group_by("bc.related_id")->get();
        return $query->result_array();
    }

    public function print_all_residents($s = '') {

        $subadmiid = $this->session->userdata('admin_id');
        $where = '';
        if ($s != "") {
            $where = "(f.first_name='$s' OR f.last_name='$s' OR f.email_address='$s' OR c.cityname='$s' OR s.state='$s' OR p.address like '%$s%') ";
        }

        $query = $this->db->query("select distinct id  from ci_society where society_user_id='$subadmiid'");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $soid[] = $row->id;
            }
            $alls = implode(',', $soid);
        }
        //   $all_society_u = $this->db->query("SELECT u.* FROM ci_users u inner join ci_transaction tr on tr.userid=u.id WHERE u.utype = 3 and  tr.society_id in ($alls) $where group by u.id limit  $limit,$start");
        $this->db->select("f.*,p.address as flat_address,p.id as property_id, c.cityname city,s.state", false);
        $this->db->join("ci_flatowner f", " f.id = p.flatowner_id");
        $this->db->join("ci_states s", "s.id = p.stateid", "left");
        $this->db->join("ci_city c", "c.id = p.cityid", "left");
        $this->db->where("p.societyid IN($alls)");

        if (!empty($where))
            $this->db->where($where);
        $this->db->group_by("p.id");
        $all_society_u = $this->db->get("ci_propertys p");
        return $all_society_u->result();
    }

    function print_all_bills($s = '', $society_admin_id = 0) {
        if ($s != "") {
            $this->db->where("(p.address like  '$s%' OR f.first_name like '$s%'  OR f.last_name like '$s%' OR f.email_address like '$s'  OR bc.sdate like '$s%'  OR bc.edate like '$s%' OR bc.totalamount like '$s%' OR s.fname like '$s%' OR s.lname like '$s%'  OR sd.society_title like '$s%') ");
        }
        $this->db->select('SQL_CALC_FOUND_ROWS bc.id AS billid,bc.related_id AS related_id,p.address AS flat,p.id AS property_id,f.first_name AS fname,f.last_name AS lname,f.email_address AS email,bc.sdate,bc.edate,bc.totalamount as total,CONCAT(s.fname, " ", s.lname) AS society_admin,sd.society_title ', false);
        $this->db->from('ci_bill_charge  as bc');
        $this->db->join('ci_bill as b', 'bc.bill_id=b.id', "left");
        $this->db->join('ci_propertys as p', 'bc.property_id=p.id', "left");
        $this->db->join('ci_flatowner as f', 'f.id = p.flatowner_id');
        $this->db->join('ci_users as s', 'bc.addbyid = s.id', "left");
        $this->db->join('ci_society as sd', 'sd.id = p.societyid', "left");
        $this->db->where("bc.related_id IS NOT NULL");
        $this->db->group_by("bc.related_id");
        $this->db->order_by("bc.id", "desc");
        if ($society_admin_id > 0)
            $this->db->where('bc.addbyid', $this->session->userdata('admin_id'));
        $query = $this->db->get();

        return $query->result();
    }

}