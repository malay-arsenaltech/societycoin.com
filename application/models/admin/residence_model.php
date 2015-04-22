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

    function all_residence($start, $limit) {
        $subadmiid = $this->session->userdata('admin_id');
        $where = '';
        if (isset($_GET['search_text']) && $_GET['search_text'] != '') {
            $s = trim($this->input->get_post('search_text'));
            $where = "(u.fname='$s' OR u.lname='$s' OR u.mobile='$s' OR u.email='$s' OR u.city='$s') ";
        }

        $query = $this->db->query("select distinct id  from ci_society where society_user_id='$subadmiid'");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $soid[] = $row->id;
            }
            $alls = implode(',', $soid);
        }
        //   $all_society_u = $this->db->query("SELECT u.* FROM ci_users u inner join ci_transaction tr on tr.userid=u.id WHERE u.utype = 3 and  tr.society_id in ($alls) $where group by u.id limit  $limit,$start");
        $this->db->select("u.*");
        $this->db->join("ci_userpropertys up", " up.userid = u.id", "left");
        $this->db->where("u.utype", "3");
        $this->db->where("up.societyid IN($alls)");
        if (!empty($where))
            $this->db->where($where);
        $this->db->group_by("u.id");
        $this->db->limit($start, $limit);
        $all_society_u = $this->db->get("ci_users u");
        if ($all_society_u->num_rows() > 0) {
            return $all_society_u->result_array();
        }
        return array();
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

}