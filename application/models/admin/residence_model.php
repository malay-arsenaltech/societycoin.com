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
        $this->db->select("SQL_CALC_FOUND_ROWS u.*", false);
        $this->db->join("ci_userpropertys up", " up.userid = u.id", "left");
        $this->db->where("u.utype", "3");
        $this->db->where("up.societyid IN($alls)");
        if (!empty($where))
            $this->db->where($where);
        $this->db->group_by("u.id");
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

    public function residence_by_id($id) {
        $query = $this->db->get_where('ci_users', array(
            'id' => "$id"
        ));
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
        $data['address'] = $_POST['address'];
        $data['city'] = $_POST['city'];
        $data['state'] = $_POST['state'];
        $data['country'] = $_POST['country'];
        $data['ip'] = $_POST['ip'];
        $data['status'] = $_POST['status'];
        $id = $_POST['id'];

        $this->db->where('id', $id);
        $this->db->update('ci_users', $data);
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

    function get_property_id($society_id, $address) {
        $property_data = $this->db->select("id")->where("societyid", $society_id)->like("address", "$address")->get("ci_propertys")->result();
        return !empty($property_data) ? $property_data[0]->id : "";
    }

    public function send_mail($data) {

        $this->load->library('email');
        $this->load->helper('email');

        foreach ($data as $val) {
            $html = "<style>table.bill_data {border-collapse: collapse;}table.bill_data, table.bill_data th,table.bill_data td {border: 1px solid black;}</style>
                Hi {$val['name']}, <br> <br>
                Your bill detail for {$val['sdate']} to {$val['edate']} is as follows:<br><br>
                <table class='bill_data' cellpadding='10px'>
                <tr><td><b>Bill</b></td><td><b>Amount</b></td>";
            foreach ($val['charge_head'] as $_k => $_v) {
                $html .= "<tr><td>{$_k}</td><td>$_v</td></tr>";
            }
            $html .="</table>
                <br><br>Best regards,
		<br>The SocietyCoin.com team.
		<br>www.societycoin.com
		<br>support@societycoin.com";
            $this->email->from("no-reply@societycoin.com", "societycoin.com");
            $this->email->subject("Bill Information for {$val['sdate']} to {$val['edate']}");
            $this->email->message($html);
            $this->email->set_mailtype("html");
            $this->email->to(array($val['email']));
           // $this->email->send();
        }
    }

}