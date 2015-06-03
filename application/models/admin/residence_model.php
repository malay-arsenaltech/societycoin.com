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
            $where = "(u.fname='$s' OR u.lname='$s' OR u.mobile='$s' OR u.email='$s' OR u.city='$s' OR u.state='$s' OR u.address like '%$s%') ";
        }

        $query = $this->db->query("select distinct id  from ci_society where society_user_id='$subadmiid'");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $soid[] = $row->id;
            }
            $alls = implode(',', $soid);
        }
        //   $all_society_u = $this->db->query("SELECT u.* FROM ci_users u inner join ci_transaction tr on tr.userid=u.id WHERE u.utype = 3 and  tr.society_id in ($alls) $where group by u.id limit  $limit,$start");
        $this->db->select("SQL_CALC_FOUND_ROWS u.*,p.address as flat_address,p.id as property_id", false);
        $this->db->join("ci_userpropertys up", " up.userid = u.id", "left");
        $this->db->join("ci_propertys p", "up.addressid = p.id", "left");
        $this->db->where("u.utype", "3");
        $this->db->where("up.societyid IN($alls)");
        if (!empty($where))
            $this->db->where($where);
//        $this->db->group_by("u.id");
        $this->db->group_by("up.id");
        if ($start != 0 || $limit != 0) {
            $this->db->limit($start, $limit);
        }
        $all_society_u = $this->db->get("ci_users u");
        $return_data = array();
        if ($all_society_u->num_rows() > 0) {
            $return_data['rows'] = $all_society_u->result_array();
        }
        $query = $this->db->query('SELECT FOUND_ROWS() AS `Count`');
        $return_data['num_rows'] = $query->row()->Count;
        return $return_data;
    }

    public function residence_by_id($id,$property_id) {
        $this->db->select("u.*,p.address as flat_address,p.id as property_id", false);
        $this->db->join("ci_userpropertys up", " up.userid = u.id", "left");
        $this->db->join("ci_propertys p", "up.addressid = p.id", "left");
        $this->db->where("u.id", "$id")->where("p.id", $property_id);
        $query = $this->db->get("ci_users u");
        return $query->row_array();
    }

    function update_residence() {
        if (isset($_POST['newpassword']) && $_POST['newpassword'] != '') {
            $password = md5($_POST['newpassword']);
            $data['password'] = $password;
        }
        $data['lname'] = $_POST['name'];
        $update_email = $this->session->userdata('update_email');
        $em = $_POST['email'];

        if ($update_email != $em) {
            $data['email'] = $_POST['email'];
        }
        $data['fname'] = $_POST['username'];
        $data['mobile'] = $_POST['mobile'];
        $data['city'] = $_POST['city'];
        $data['state'] = $_POST['state'];
        $data['country'] = $_POST['country'];
        $data['ip'] = $_POST['ip'];
        $data['status'] = $_POST['status'];
        $id = $_POST['id'];

        $this->db->where('id', $id);
        $this->db->update('ci_users', $data);
        $data = array();
        $data['address'] = $_POST['address'];
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
        $property_data = $this->db->select("ci_propertys.id")->join("ci_userpropertys", "ci_userpropertys.userid = ci_users.id")->join("ci_propertys", "ci_propertys.id = ci_userpropertys.addressid");
        $property_data = $this->db->where("ci_users.email", $email)->where("ci_propertys.societyid", $society_id)->like("ci_propertys.address", "$address")->get("ci_users")->result();
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

            $this->db->where("(c.address like  '$s%' OR u.fname like '$s%'  OR u.lname like '$s%' OR u.email like '$s'  OR a.sdate like '$s%'  OR a.edate like '$s%' OR a.totalamount like '$s%' OR s.fname like '$s%' OR s.lname like '$s%'  OR sd.society_title like '$s%') ");
        }
        $this->db->select('SQL_CALC_FOUND_ROWS a.id as billid,a.related_id as related_id,c.address as flat,u.id as userid,u.fname as fname, u.lname as lname,u.email as email,a.sdate,a.edate,a.totalamount as total,concat(s.fname," ",s.lname) as society_admin,sd.society_title', false);
        $this->db->from('ci_bill_charge  as a');
        $this->db->join('ci_bill as b', 'a.bill_id=b.id');
        $this->db->join('ci_propertys as c', 'a.property_id=c.id');
        $this->db->join('ci_userpropertys as up', 'c.id = up.addressid');
        $this->db->join('ci_users as u', 'up.userid = u.id');
        $this->db->join('ci_users as s', 'a.addbyid = s.id');
        $this->db->join('ci_society as sd', 'sd.id = up.societyid');
        $this->db->where("a.related_id IS NOT NULL");
        $this->db->group_by("a.related_id");
        $this->db->order_by("a.id", "desc");
        if ($society_admin_id > 0)
            $this->db->where('a.addbyid', $this->session->userdata('admin_id'));
        $this->db->limit($start, $limit);
        $query = $this->db->get(); //echo $this->db->last_query();exit;
        $return_data = array();
        $return_data['rows'] = $query->result_array();
        $query = $this->db->query('SELECT FOUND_ROWS() AS `Count`');
        $return_data['num_rows'] = $query->row()->Count;
        return $return_data;
    }

    function billdetailbyid($id) {
        $this->db->select('SQL_CALC_FOUND_ROWS a.id as billid,c.address as flat,u.id as userid,u.fname as fname, u.lname as lname,u.email as email,a.sdate,a.edate,a.totalamount as total,concat(s.fname," ",s.lname) as society_admin,sd.society_title,group_concat(b.bill_name) as bill_name,group_concat(a.amount) as amount,a.taxamount as tax', false);
        $this->db->from('ci_bill_charge  as a');
        $this->db->join('ci_bill as b', 'a.bill_id=b.id', "left");
        $this->db->join('ci_propertys as c', 'a.property_id=c.id', "left");
        $this->db->join('ci_userpropertys as up', 'c.id = up.addressid', "left");
        $this->db->join('ci_users as u', 'up.userid = u.id');
        $this->db->join('ci_users as s', 'a.addbyid = s.id', "left");
        $this->db->join('ci_society as sd', 'sd.id = up.societyid', "left");
        $this->db->where("a.related_id", $id);
        $query = $this->db->group_by("a.related_id")->get();
        return $query->result_array();
    }

    public function print_all_residents($s = '') {

        $subadmiid = $this->session->userdata('admin_id');
        $where = '';
        if ($s != "") {
            $where = "(u.fname='$s' OR u.lname='$s' OR u.mobile='$s' OR u.email='$s' OR u.city='$s' OR u.state='$s' OR u.address like '%$s%') ";
        }

        $query = $this->db->query("select distinct id  from ci_society where society_user_id='$subadmiid'");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $soid[] = $row->id;
            }
            $alls = implode(',', $soid);
        }
        //   $all_society_u = $this->db->query("SELECT u.* FROM ci_users u inner join ci_transaction tr on tr.userid=u.id WHERE u.utype = 3 and  tr.society_id in ($alls) $where group by u.id limit  $limit,$start");
        $this->db->select("u.*", false);
        $this->db->join("ci_userpropertys up", " up.userid = u.id", "left");
        $this->db->where("u.utype", "3");
        $this->db->where("up.societyid IN($alls)");
        if (!empty($where))
            $this->db->where($where);
        $this->db->group_by("u.id");
        $all_society_u = $this->db->get("ci_users u");
        return $all_society_u->result();
    }

    function print_all_bills($s = '', $society_admin_id = 0) {
        if ($s != "") {
            $this->db->where("(c.address like  '$s%' OR u.fname like '$s%'  OR u.lname like '$s%' OR u.email like '$s'  OR a.sdate like '$s%'  OR a.edate like '$s%' OR a.totalamount like '$s%' OR s.fname like '$s%' OR s.lname like '$s%'  OR sd.society_title like '$s%') ");
        }
        $this->db->select('a.id as billid,c.address as flat,u.id as userid,u.fname as fname, u.lname as lname,u.email as email,a.sdate,a.edate,a.totalamount as total,concat(s.fname," ",s.lname) as society_admin,sd.society_title', false);
        $this->db->from('ci_bill_charge  as a');
        $this->db->join('ci_bill as b', 'a.bill_id=b.id');
        $this->db->join('ci_propertys as c', 'a.property_id=c.id');
        $this->db->join('ci_userpropertys as up', 'c.id = up.addressid');
        $this->db->join('ci_users as u', 'up.userid = u.id');
        $this->db->join('ci_users as s', 'a.addbyid = s.id');
        $this->db->join('ci_society as sd', 'sd.id = up.societyid');
        $this->db->where("a.related_id IS NOT NULL");
        $this->db->group_by("a.related_id");
        $this->db->order_by("a.id", "desc");
        if ($society_admin_id > 0)
            $this->db->where('a.addbyid', $this->session->userdata('admin_id'));
        $query = $this->db->get();

        return $query->result();
    }

}