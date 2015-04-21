<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	
class User_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function all_customers($start, $limit)
    {
        $this->db->select('*');
        $this->db->From('ci_users');
        if (isset($_GET['search_text']) && $_GET['search_text'] != '') {
            $s     = trim($this->input->get_post('search_text'));
            $where = " utype='3' AND  (fname='$s' OR lname='$s' OR mobile='$s' OR email='$s' OR city='$s') ";
            $this->db->where($where, false, false);
        } else
            $this->db->where('utype', '3');
        $this->db->order_by('id', 'desc');
        $this->db->limit($start, $limit);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function all_subadmin_customers($start, $limit)
    {
	
	$alls= '';
      $where='';
        if (isset($_GET['search_text']) && $_GET['search_text'] != '') {
            $s     = trim($this->input->get_post('search_text'));
            $where = "  AND  (u.fname='$s' OR u.lname='$s' OR u.mobile='$s' OR u.email='$s' OR u.city='$s') ";
          
        } 
		
        $subadmiid = $this->session->userdata('admin_id');
        $query     = $this->db->query("select distinct societyid  from ci_assign_society where userid='$subadmiid'");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $soid[] = $row->societyid;
            }
            $alls = implode(',', $soid);
        }
		if($alls !=''){
        $all_society_u = $this->db->query("SELECT u.*,tr.societyname FROM ci_users u inner join ci_transaction tr on tr.userid=u.id WHERE u.utype = 3 and  tr.society_id in ($alls)  $where group by u.id limit  $limit,$start");
        if ($all_society_u->num_rows() > 0) {
		
            return $all_society_u->result_array();
        }
		}
        return array();
    }
    function getCountsocietycustomer()
    {
        $sql = "select * from ci_users  where utype in(3)";
        $sql = mysql_query($sql);
        return mysql_num_rows($sql);
    }
    function all_societyadmin_customers($start, $limit)
    {
        $subadmiid = $this->session->userdata('admin_id');
		 $where='';
        if (isset($_GET['search_text']) && $_GET['search_text'] != '') {
            $s     = trim($this->input->get_post('search_text'));
            $where = "  AND  (u.fname='$s' OR u.lname='$s' OR u.mobile='$s' OR u.email='$s' OR u.city='$s') ";
          
        } 
		
        $query     = $this->db->query("select distinct id  from ci_society where society_user_id='$subadmiid'");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $soid[] = $row->id;
            }
            $alls = implode(',', $soid);
        }
        $all_society_u = $this->db->query("SELECT u.* FROM ci_users u inner join ci_transaction tr on tr.userid=u.id WHERE u.utype = 3 and  tr.society_id in ($alls) $where group by u.id limit  $limit,$start");
        if ($all_society_u->num_rows() > 0) {
            return $all_society_u->result_array();
        }
        return array();
    }
    public function getCountcustomer()
    {
        $sql = "select * from ci_users  where utype in(3)";
        $sql = mysql_query($sql);
        return mysql_num_rows($sql);
    }
    public function alluserlist1($start, $limit)
    {
       

	$sql = "SELECT * FROM (`ci_users`) WHERE `utype` =  '2'"; 
	
	if($this->input->get_post('search_text')){
	$s = trim($this->input->get_post('search_text'));
		$sql .= " AND ( `fname`  LIKE '%$s%'
		OR  `lname`  LIKE '%$s%'
		OR  `email`  LIKE '%$s%' OR city='$s' 
		OR  `mobile`  LIKE '%$s%')";
	}

$sql .= " ORDER BY `id` desc LIMIT $start, $limit";

        $result = $this->db->query($sql );
		
        return  $result->result_array();
    }
    function getCount()
    {
       $sql = "SELECT * FROM (`ci_users`) WHERE `utype` =  '2'"; 
	
	if($this->input->get_post('search_text')){
	$s = trim($this->input->get_post('search_text'));
		$sql .= " AND ( `fname`  LIKE '%$s%'
		OR  `lname`  LIKE '%$s%'
		OR  `email`  LIKE '%$s%' OR city='%$s%'
		OR  `mobile`  LIKE '%$s%')";
	}


        $result = $this->db->query($sql );
		  return   $result->num_rows();
      
    }
    public function alluserlist2()
    {
        $query = $this->db->get_where('ci_users', array(
            'utype' => '2'
        ));
        //       	$query = $this->db->get('ci_users');
        return $query->result_array();
    }
    public function alluserlist3()
    {
        if ($this->session->userdata('utype') == 1) {
            $query = $this->db->get_where('ci_users', array(
                'utype' => '3'
            ));
            $query = $this->db->get('ci_users');
            return $query->result_array();
        } else {
            $id = $this->session->userdata('admin_id');
            $this->db->distinct();
            $this->db->select('a.*');
            $this->db->from('ci_users as a');
            $this->db->join('ci_userpropertys as c', 'c.userid=a.id');
            $where = '(c.sadminid =' . $id . ' && c.status=1)';
            $this->db->where($where);
            $query = $this->db->get();
            return $alluser = $query->result_array();
            //       print_r($alluser);exit();
        }
    }
    public function userByid($id)
    {
        $query = $this->db->get_where('ci_users', array(
            'id' => "$id"
        ));
        return $query->row_array();
    }
    public function soadmin()
    {
        $query = $this->db->get_where('ci_users', array(
            'utype' => '2'
        ));
        return $query->result_array();
    }
    public function soregister()
    {
        $query = $this->db->get_where('ci_users', array(
            'utype' => '3'
        ));
        return $query->result_array();
    }
    function adduser()
    {
        $query         = $this->db->get_where('ci_users', array(
            'email' => @$_POST['email']
        ));
        $emailvalidate = $query->row_array();
        $ecount        = count($emailvalidate);
        if ($ecount >= 1) {
            return 0;
        }
        //echo '<pre>'; 		print_r($emailvalidate);print_r($_POST); exit();
        $desired_length   = rand(8, 12);
        $password         = md5( trim($_POST['password']));
		 $data['username']    = trim($_POST['login_id']);
		
        $data['lname']    =  trim($_POST['name']);
        $data['email']    =  trim($_POST['email']);
        $data['fname']    =  trim($_POST['username']);
        $data['password'] = $password;
        $data['mobile']   = $_POST['mobile'];
        $data['address']  =  trim($_POST['address']);
        $data['city']     =  trim($_POST['city']);
        $data['state']    =  trim($_POST['state']);
        $data['country']  = $_POST['country'];
        $data['ip']       = $_POST['ip'];
        $data['status']   = $_POST['status'];
        $data['utype']    = $_POST['utype'];
        $this->db->insert('ci_users', $data);
        $this->load->library('email');
       
        $this->email->to($this->input->post('email'));
      		  
		$this->email->from("no-reply@societycoin.com","societycoin.com"); 		  
			
		  $name = $_POST['username'];

		$html ='Hello '. $name.',  <br><br>Welcome to societycoin.com! <br><br>Please find below the login details of the site as a Role of "Sub Admin" <br> <br>---------------------------<br><br><b>User ID:</b> '.$_POST['login_id'] .'  <br><b> Password:</b> '.$_POST['password'].' <br> <br> <a href="'.base_url().'admin" >Click to login</a> <br><br>---------------------------<br><br>Best regards,
		<br>The SocietyCoin.com team.
		<br>www.societycoin.com
		<br>support@societycoin.com';	
        
		$this->email->set_mailtype("html");
		$this->email->subject("Account for sub admin");
        $this->email->message($html);
        $this->email->send();
        return $this->db->insert_id();
    }
    function updateuser()
    {
        if (isset($_POST['newpassword']) && $_POST['newpassword']!='') {
            $password         = md5($_POST['newpassword']);
            $data['lname']    = $_POST['name'];
         $update_email =  $this->session->userdata('update_email');
			$em =  $_POST['email'];
			
			if($update_email!= $em){
			 $data['email']   = $_POST['email'];
			}
            $data['fname']    = $_POST['username'];
            $data['password'] = $password;
            $data['mobile']   = $_POST['mobile'];
            $data['address']  = $_POST['address'];
            $data['city']     = $_POST['city'];
            $data['state']    = $_POST['state'];
            $data['country']  = $_POST['country'];
            $data['ip']       = $_POST['ip'];
            $data['status']   = $_POST['status'];
            $id               = $_POST['id'];
        } else {
            $data['lname']   = $_POST['name'];
			$update_email =  $this->session->userdata('update_email');
			$em =  $_POST['email'];
			
			if($update_email!= $em){
			 $data['email']   = $_POST['email'];
			}
            $data['fname']   = $_POST['username'];
            $data['mobile']  = $_POST['mobile'];
            $data['address'] = $_POST['address'];
            $data['city']    = $_POST['city'];
            $data['state']   = $_POST['state'];
            $data['country'] = $_POST['country'];
            $data['ip']      = $_POST['ip'];
            $data['status']  = $_POST['status'];
            $id              = $_POST['id'];
        }
		
        $this->db->where('id', $id);
        $this->db->update('ci_users', $data);
		$eero = $this->db->_error_number();
		if($eero === 1062){ 
		return $eero;
		}
		else      return true;
    }
    function updateuserStatus( $id )
    {
        $data['status'] = 0;       
        $this->db->where('id', $id);
        $this->db->update('ci_users', $data);
        return true;
    }
    function pupdateuserStatus( $id )
    {
        $data['status'] = 1;       
        $this->db->where('id', $id);
        $this->db->update('ci_users', $data);
        return true;
    }
    public function assign()
    {
        for ($i = 0; $i < count($_POST['societyid']); $i++) {
            $data  = array(
                'userid' => $this->input->post('userid'),
                'societyid' => $_POST['societyid'][$i],
                'status' => '1'
            );
            $query = $this->db->insert('ci_assign_society', $data);
        }
        return $this->db->insert_id();
    }
    function removeassign($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('ci_assign_society');
        return true;
    }
    function removeassignproperty($id)
    {
        $data1 = array(
            'status' => 0
        );
        $this->db->where('id', $id);
        $this->db->update('ci_userpropertys', $data1);
        return true;
    }
    function logout()
    {
        $data1['logout_time'] = date('Y-m-d H:i:s');
        $this->db->where('id', $this->session->userdata('admin_id'));
        $this->db->update('ci_users', $data1);
        $this->session->sess_destroy();
    }
    function activity($act)
    {
        $data  = array(
            'userid' => $this->session->userdata('admin_id'),
            'username' => $this->session->userdata('admin_fname'),
            'utype' => $this->session->userdata('utype'),
            'activity' => $act,
            'status' => '1'
        );
        $query = $this->db->insert('ci_logs', $data);
    }
    function getCountlog()
    {
        if (isset($_GET['utype']) && $_GET['utype'] != '') {
            $this->db->select('a.*,b.fname');
            $this->db->from('ci_logs as a');
            $this->db->join('ci_users as b', 'a.userid=b.id');
            $this->db->where('b.utype', $_GET['utype']);
        } else {
            $this->db->select('a.*,b.fname');
            $this->db->from('ci_logs as a');
            $this->db->join('ci_users as b', 'a.userid=b.id');
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    function fgetactivity($start, $limit)
    {
        $this->db->select('a.*,b.fname');
        $this->db->from('ci_logs as a');
        $this->db->join('ci_users as b', 'a.userid=b.id');
        if (isset($_GET['utype']) && $_GET['utype'] != '') {
            $this->db->where('b.utype', $_GET['utype']);
        }
        $this->db->order_by("a.id", "desc");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }
    function agetactivity($start, $limit)
    {
        $this->db->select('a.*,b.fname');
        $this->db->from('ci_logs as a');
        $this->db->join('ci_users as b', 'a.userid=b.id');
        $this->db->order_by("a.id", "desc");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }
    function tranactionlogcount()
    {
        $this->db->select('a.*,b.address as proaddress');
        $this->db->from('ci_transaction as a');
        $this->db->join('ci_propertys as b', 'a.propertyid=b.id');
		if($this->input->get_post('search_text')){
		$s = trim($this->input->get_post('search_text'));
		 $this->db->LIKE ( 'a.societyname'  , $s);
		  $this->db->OR_LIKE ( 'a.firstname' ,  $s);
		    $this->db->OR_LIKE ( 'a.lastname' ,  $s);
			 $this->db->OR_LIKE ( 'a.amount' ,  $s);
			  $this->db->OR_LIKE ( 'a.status'  , $s);
			  	  $this->db->OR_LIKE ( 'a.email',   $s);
				   $this->db->OR_LIKE ( 'a.propertyname'  , $s);
				  
	}

        $query = $this->db->get();
        return $query->num_rows();
    }
    function tranactionlog($start, $limit)
    {
        $this->db->select('a.*,b.address as proaddress');
        $this->db->from('ci_transaction as a');
        $this->db->join('ci_propertys as b', 'a.propertyid=b.id');
		
			if($this->input->get_post('search_text')){
		$s = trim($this->input->get_post('search_text'));
		 $this->db->LIKE ( 'a.societyname'  , $s);
		  $this->db->OR_LIKE ( 'a.firstname' ,  $s);
		    $this->db->OR_LIKE ( 'a.lastname' ,  $s);
			 $this->db->OR_LIKE ( 'a.amount' ,  $s);
			  $this->db->OR_LIKE ( 'a.status'  , $s);
			  	  $this->db->OR_LIKE ( 'a.email',   $s);
				   $this->db->OR_LIKE ( 'a.propertyname'  , $s);
				  
	}

		
        $this->db->order_by("a.id", "desc");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_transaction($id = FALSE)
    {
        $this->db->select('a.*,b.address as baddress');
        $this->db->from('ci_transaction as a');
        $this->db->join('ci_propertys as b', 'a.propertyid=b.id');
        $this->db->where('a.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function subadmin_customer_transaction_count()
    {
	  $alls= '';
        $subadmiid = $this->session->userdata('admin_id');
        if ($this->session->userdata('utype') == 4) {
            $query = $this->db->query("select distinct id  from ci_society where society_user_id='$subadmiid'");
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $soid[] = $row->id;
                }
                $alls = implode(',', $soid);
            }
        } else {
            $query = $this->db->query("select distinct societyid  from ci_assign_society where userid='$subadmiid'");
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $soid[] = $row->societyid;
                }
                $alls = implode(',', $soid);
            }
        }
		if($alls !=''){
		$w = '';
				if($this->input->get_post('search_text')){
		$s = trim($this->input->get_post('search_text'));
		
		$w =  " AND (tr.societyname like  '$s%' OR tr.firstname like '$s%'  OR tr.lastname like '$s%' OR tr.amount like '$s'  OR tr.status like '$s%'  OR tr.email like '$s%' OR tr.propertyname like '$s%' ) "  ;
		  
				  
	}
	
	
		
        $all_society_u = $this->db->query("SELECT tr.* FROM  ci_transaction tr  WHERE  tr.society_id in ($alls) $w ");
        if ($all_society_u->num_rows() > 0) {
            return $all_society_u->num_rows();
        }
		
		}
		
		else return 0;
		
    }
    public function subadmin_customer_transaction($start, $limit)
    {
	$alls= '';
        $subadmiid = $this->session->userdata('admin_id');
        if ($this->session->userdata('utype') == 4) {
            $query = $this->db->query("select distinct id  from ci_society where society_user_id='$subadmiid'");
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $soid[] = $row->id;
                }
                $alls = implode(',', $soid);
            }
        } else {
            $query = $this->db->query("select distinct societyid  from ci_assign_society where userid='$subadmiid'");
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $soid[] = $row->societyid;
                }
                $alls = implode(',', $soid);
            }
        }
		if($alls !=''){
		$w = '';
				if($this->input->get_post('search_text')){
		$s = trim($this->input->get_post('search_text'));
		
		$w =  " AND (tr.societyname like  '$s%' OR tr.firstname like '$s%'  OR tr.lastname like '$s%' OR tr.amount like '$s'  OR tr.status like '$s%'  OR tr.email like '$s%' OR tr.propertyname like '$s%' ) "  ;
		  
				  
	}
	
	
		
        $all_society_u = $this->db->query("SELECT tr.* FROM  ci_transaction tr  WHERE  tr.society_id in ($alls) $w  limit  $limit,$start");
		
        if ($all_society_u->num_rows() > 0) {
            return $all_society_u->result_array();
        }
		}
		else     return array();
    }
	
	
	  public function subadmin_customer_transaction_printall($s='')
    {
	$alls= '';
        $subadmiid = $this->session->userdata('admin_id');
        if ($this->session->userdata('utype') == 4) {
            $query = $this->db->query("select distinct id  from ci_society where society_user_id='$subadmiid'");
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $soid[] = $row->id;
                }
                $alls = implode(',', $soid);
            }
        } else {
            $query = $this->db->query("select distinct societyid  from ci_assign_society where userid='$subadmiid'");
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $soid[] = $row->societyid;
                }
                $alls = implode(',', $soid);
            }
        }
		if($alls !=''){
		$w = '';
				if($s!=''){
				$s = rawurldecode($s);
		
		$w =  " AND (tr.societyname like  '$s%' OR tr.firstname like '$s%'  OR tr.lastname like '$s%' OR tr.amount like '$s'  OR tr.status like '$s%'  OR tr.email like '$s%' OR tr.propertyname like '$s%' ) "  ;
		  
				  
	}
	
	
		
        $all_society_u = $this->db->query("SELECT tr.* FROM  ci_transaction tr  WHERE  tr.society_id in ($alls) $w ");
		
        if ($all_society_u->num_rows() > 0) {
            return $all_society_u->result();
        }
		}
		else     return array();
    }
	
	
	
	
	
	
	
	
	
    public function getUser($id = 0)
    {
        $this->db->select('*');
        $this->db->from('ci_users');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
	
	
	
	
	public function print_all_transaction($s=''){
	
	
	 $this->db->select('a.*,b.address as proaddress');
        $this->db->from('ci_transaction as a');
        $this->db->join('ci_propertys as b', 'a.propertyid=b.id');
		
		if($s!=''){
		$s = rawurldecode($s);
		
		 $this->db->LIKE ( 'a.societyname'  , $s);
		  $this->db->OR_LIKE ( 'a.firstname' ,  $s);
		   $this->db->OR_LIKE ( 'a.lastname' ,  $s);
			$this->db->OR_LIKE ( 'a.amount' ,  $s);
			 $this->db->OR_LIKE ( 'a.status'  , $s);
			  $this->db->OR_LIKE ( 'a.email',   $s);
			$this->db->OR_LIKE ( 'a.propertyname'  , $s);
				  
		}
		
        $this->db->order_by("a.id", "desc");
 
        $query = $this->db->get();       
        return $query->result();
	
	}
	
	
public function deleteRow($id)

{


			$this->db->where_in('id', $id);

            $this->db->delete('ci_users'); 		
			

        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;

	}	 

	public function  delete_trans($id){
	
	
			$this->db->where_in('id', $id);

            $this->db->delete('ci_transaction'); 		
			

        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	
	}
	
	
}