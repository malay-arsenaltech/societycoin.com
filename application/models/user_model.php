<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class User_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function get_user($id = FALSE)
    {
        $id = $this->session->userdata('userid');
        if ($id === FALSE) {
            $query = $this->db->get('ci_users');
            return $query->result_array();
        }
        $query = $this->db->get_where('ci_users', array(
            'id' => $id
        ));
        return $query->row_array();
    }
    public function update()
    {
        $data = array(
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'address' => $this->input->post('address'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'country' => $this->input->post('country'),
            'mobile' => $this->input->post('mobile')
        );
        $id   = $this->session->userdata('userid');
        $this->db->where('id', $id);
        $query = $this->db->update('ci_users', $data);
        if (!empty($query)) {
            return true;
        } else {
            return false;
        }
    }
	
	    public function update_email()
    {
          $id = $this->session->userdata('userid');
            $opassword = md5($this->input->post('opassword'));
            $query     = $this->db->get_where('ci_users', array(
                'id' => $id,
                'password' => "$opassword"

            ));
      if( $query->num_rows() > 0){
       $data = array(           
            'email' => $this->input->post('email')
        );
		  $this->db->where('id', $id);
	   $query = $this->db->update('ci_users', $data);
       
            return true;
		}
         else {
            return false;
        }
    }
	
	
	
    public function setting()
    {
        if ($this->input->post('password') != NULL) {
            $id        = $this->session->userdata('userid');
            $opassword = md5($this->input->post('opassword'));
            $query     = $this->db->get_where('ci_users', array(
                'id' => $id,
                'password' => $opassword
            ));
            $clen      = count($query->result_array());
            if ($clen != 1) {
                return 14;
            }
            $password = md5(trim($this->input->post('password')));
            $data     = array(                
                'password' => $password
            );
        } else {
            $data = array(
                'email' => $this->input->post('email')
            );
        }
        $id = $this->session->userdata('userid');
        $this->db->where('id', $id);
        $query = $this->db->update('ci_users', $data);
        if (!empty($query)) {
            return true;
        } else {
            return false;
        }
    }
    public function add()
    {
        $password = md5(trim($this->input->post('password')));
        $data     = array(
            'email' => $this->input->post('email'),
            'password' => $password,
            'activation_key' => random_string('alnum', 20),
            'status' => 0
        );
        $query    = $this->db->insert('ci_users', $data);
        return $this->db->insert_id();
    }
    public function get_cart($id = FALSE)
    {
        $userid = $this->session->userdata('userid');
        if ($id === FALSE) {
            $this->db->select();
            $this->db->from('ci_cart');
            $this->db->where('userid', $userid);
            $query = $this->db->get();
            return $query->result_array();
        } else {
            $this->db->select();
            $this->db->from('ci_cart');
            $this->db->where('userid', $userid);
            $this->db->where('id', $id);
            $query = $this->db->get();
            return $query->row_array();
        }
    }
    Public function getcity()
    {
        $this->db->select('*');
        $this->db->from('ci_city');
        $this->db->where('status', '1');
        $query = $this->db->get();
        return $query->result_array();
    }
    Public function getstate()
    {
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('ci_states');
        $this->db->order_by('state', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    function updatecart()
    {
        $id = $this->input->post('id');
        if (@$id != NULL) {
            $data = array(
                'carttype' => $this->input->post('carttype'),
                'cardprocessor1' => $this->input->post('cardprocessor1'),
                'cardissuingbank' => $this->input->post('cardissuingbank'),
                'nameoncard' => $this->input->post('nameoncard'),
                'validthru' => $this->input->post('validthru'),
                'cartno' => $this->input->post('cartno')
            );
            $this->db->where('id', $id);
            $query = $this->db->update('ci_cart', $data);
            if (!empty($query)) {
                return true;
            } else {
                return false;
            }
        } else {
            $data  = array(
                'userid' => $this->session->userdata('userid'),
                'carttype' => $this->input->post('carttype'),
                'cardprocessor1' => $this->input->post('cardprocessor1'),
                'cardissuingbank' => $this->input->post('cardissuingbank'),
                'nameoncard' => $this->input->post('nameoncard'),
                'validthru' => $this->input->post('validthru'),
                'cartno' => $this->input->post('cartno')
            );
            $query = $this->db->insert('ci_cart', $data);
            return $this->db->insert_id();
        }
    }
    function deletecart($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('ci_cart');
    }
    function activity($act)
    {
        $data  = array(
            'userid' => $this->session->userdata('userid'),
            'username' => $this->session->userdata('fname'),
            'utype' => $this->session->userdata('utype'),
            'activity' => $act,
            'status' => '1'
        );
        $query = $this->db->insert('ci_logs', $data);
    }
    function grapthdata()
    {
        $userid = $this->session->userdata('userid');
        $this->db->select('a.id,a.sdate,a.totalamount,c.bill_name,d.address as uaddress,c.id as billid');
        $this->db->from('ci_userpropertys as b');
        $this->db->join('ci_bill_charge as a', 'a.property_id=b.addressid');
        $this->db->join('ci_bill as c', 'a.bill_id=c.id');
        $this->db->join('ci_propertys as d', 'd.id=b.addressid');
        $this->db->where('b.userid', $userid);
        $this->db->where('b.status', 1);
        if (@$_REQUEST['billid'] != NULL) {
            $this->db->where('c.id', @$_REQUEST['billid']);
        }
        if (@$_REQUEST['addid'] != NULL) {
            $this->db->where('d.id', @$_REQUEST['addid']);
        }
        if (@$_REQUEST['soid'] != NULL) {
            $this->db->where('d.societyid', @$_REQUEST['soid']);
        }
        if (@$_REQUEST['df'] == "DF") {
            $cdate = date('d/m/Y');
            if (@$_REQUEST['m'] == "3M") {
                $end_date = date('d/m/Y', strtotime('-3 month'));
            } elseif (@$_REQUEST['m'] == "6M") {
                $end_date = date('d/m/Y', strtotime('-6 month'));
            } elseif (@$_REQUEST['m'] == "12M") {
                $end_date = date('d/m/Y', strtotime('-12 month'));
            }
            list($day, $month, $year) = explode('/', $cdate);
            list($days, $months, $years) = explode('/', $end_date);
            $sdate = mktime(0, 0, 0, $month, $day, $year);
            $edate = mktime(0, 0, 0, $months, $days, $years);
            $this->db->where('a.sdate >=', $edate);
            $this->db->where('a.sdate <=', $sdate);
        }
        $this->db->order_by("a.sdate", "ASC");
        $query = $this->db->get();
        return $query->result_array();
        //echo '<pre>'; print_r($query->result_array());  exit();
    }
    function billforgrapth($proid)
    {
        $this->db->distinct();
        $this->db->select('b.bill_name,b.id');
        $this->db->from('ci_bill_charge as a');
        $this->db->join('ci_bill as b', 'a.bill_id=b.id');
        if ($proid != NULL) {
            $this->db->where('a.property_id', $proid);
        }
        if (@$_REQUEST['soid'] != NULL) {
            $this->db->where('a.society_id', @$_REQUEST['soid']);
        }
        $this->db->order_by("b.bill_name", "ASC");
        $query = $this->db->get();
        return $query->result_array();
        //       echo '<pre>'; print_r($query->result_array());   exit();
    }
    function add_payment_request()
    {
        $addressid = $this->input->post('addressid');
        $societyid = $this->input->post('societyid');
        $user_id   = $this->session->userdata('userid');
        $name      = $this->input->post('name');
        $amount    = $this->input->post('amount');
        $email     = $this->input->post('email');
        $data      = array(
            'society_id' => "$societyid",
            'property_id' => "$addressid",
            'customer_id' => "$user_id",
            'name' => "$name",
            'amount' => "$amount",
            'email' => "$email",
            'status' => 'sent'
        );
        $this->db->insert('ci_payment_request', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
}