<?php
class Property_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function get_state_for_add($id = FALSE)
    {
        if ($id === FALSE) {
            $query = $this->db->get('ci_states');
            return $query->result_array();
        }
        $query = $this->db->get_where('ci_states', array(
            'countryid' => $id
        ));
        return $query->row_array();
    }
    public function get_city($id = FALSE)
    {
        if ($id === FALSE) {
            $query = $this->db->get('ci_city');
            return $query->result_array();
        }
        $query = $this->db->get_where('ci_city', array(
            'stateid' => $id,
            'status' => '1'
        ));
        return $query->result_array();
    }
    public function get_area($id = FALSE)
    {
        if ($id === FALSE) {
            $query = $this->db->get('ci_area');
            return $query->result_array();
        }
        $query = $this->db->get_where('ci_area', array(
            'cityid' => $id,
            'status' => '1'
        ));
        return $query->result_array();
    }
    public function get_society_for_add($id = FALSE)
    {
        if ($id === FALSE) {
            $query = $this->db->get('ci_society');
            return $query->result_array();
        }
        $query = $this->db->get_where('ci_society', array(
            'areaid' => $id,
            'status' => '1'
        ));
        return $query->result_array();
    }
    public function get_society($id = FALSE)
    {
        if ($id === FALSE) {
			/* $this->db->where('status',1);
            $query = $this->db->get('ci_society'); */
			
			$this->db->select('s.*,a.areaname');
		$this->db->from('ci_society as s');
		
		 $this->db->join('ci_area as a', 's.areaid=a.id');
        $this->db->where('s.status','1' );
		$this->db->order_by('a.areaname','ASC' );
			$query= $this->db->get();
            return $query->result_array();
        }
        $query = $this->db->get_where('ci_society', array(
            'id' => $id,
            'status' => '1'
        ));
        return $query->row_array();
    }
    public function get_property($id = FALSE)
    {
        if ($id === FALSE) {
		
            $query = $this->db->get('ci_propertys');
            return $query->result_array();
        }
        $query = $this->db->get_where('ci_propertys', array(
            'id' => $id,
            'status' => '1'
        ));
        return $query->row_array();
    }
    public function get_propertyid($id)
    {
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('ci_propertys');
        $this->db->where('societyid', $id);
        $this->db->order_by('address', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
        //echo '<pre>';  print_r($states); exit();
    }
    public function get_propertymodyfy($id)
    {
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('ci_propertys');
        $this->db->where('id', $id);
        $this->db->order_by('address', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
        //echo '<pre>';  print_r($states); exit();
    }
    public function allpropertylist()
    {
        $id = $this->session->userdata('userid');
        $this->db->distinct();
        $this->db->select('b.address,c.society_title,b.status,a.id');
        $this->db->from('ci_userpropertys as a');
        $this->db->join('ci_propertys as b', 'a.addressid= b.id');
        $this->db->join('ci_society as c', 'a.societyid= c.id');
        $this->db->where('a.userid', $id);
       
        $this->db->where('a.status', '1');
        $query = $this->db->get();
       
        return $query->result_array();
    }
    public function allsocietyforg()
    {
        $id = $this->session->userdata('userid');
        $this->db->distinct();
        $this->db->select('c.society_title,c.id');
        $this->db->from('ci_userpropertys as a');
        $this->db->join('ci_propertys as b', 'a.addressid= b.id');
        $this->db->join('ci_society as c', 'a.societyid= c.id');
        $this->db->where('a.userid', $id);
        $this->db->where('a.status', '1');
        $query = $this->db->get();
        //echo '<pre>'; print_r($query->result_array()); exit();
        return $query->result_array();
    }
    public function update()
    {
        $data = array(
            'userid' => $this->session->userdata('userid'),
            'countryid' => $this->input->post('countryid'),
            'stateid' => $this->input->post('stateid'),
            'cityid' => $this->input->post('cityid'),
            'areaid' => $this->input->post('areaid'),
            'societyid' => $this->input->post('societyid'),
            'addressid' => $this->input->post('addressid'),
            'status' => '1'
        );
        $id   = $this->input->post('id');
        $this->db->where('id', $id);
        $query = $this->db->update('ci_userpropertys', $data);
        if (!empty($query)) {
            return true;
        } else {
            return false;
        }
    }
    public function add()
    {
       
        $data     = array(
            'userid' => $this->session->userdata('userid'),
            'countryid' =>1,
            'stateid' => $this->input->post('stateid'),
            'cityid' => $this->input->post('cityid'),
            'areaid' => $this->input->post('areaid'),
            'societyid' => $this->input->post('societyid'),
            'addressid' => $this->input->post('addressid'),
            //'sadminid'=>$data_new['sadminid'],			
            'status' => '1'
        );
        //echo '<pre>'; print_r($data); exit();
        $query    = $this->db->insert('ci_userpropertys', $data);
        return $this->db->insert_id();
    }
    public function addpropertypayment($data)
    {
        //	 print_r($data); exit();
        $query    = $this->db->get_where('ci_userpropertys', array(
            'addressid' => $data['proid'],
            'status' => '1'
        ));
        $rowcount = $query->num_rows();
        if ($rowcount == 1) {
            echo 'This Property already assign to another user ';
        } else {
            //   echo $data['proid']; exit();
            $id = $this->session->userdata('userid');
            $this->db->distinct();
            $this->db->select('a.*,b.userid as sadminid');
            $this->db->from('ci_propertys as a');
            $this->db->join('ci_assign_society as b', 'a.societyid= b.societyid');
            $this->db->where('a.id', $data['proid']);
            $this->db->where('a.status', 1);
            $query1          = $this->db->get();
            $data_new        = $query1->row_array();
            $data_new_insert = array(
                'userid' => $this->session->userdata('userid'),
                'countryid' => $data_new['countryid'],
                'stateid' => $data_new['stateid'],
                'cityid' => $data_new['cityid'],
                'areaid' => $data_new['areaid'],
                'societyid' => $data_new['societyid'],
                'addressid' => $data_new['id'],
                'sadminid' => $data_new['sadminid'],
                'status' => '1'
            );
            $query           = $this->db->insert('ci_userpropertys', $data_new_insert);
            echo "Successful assign property";
            //	  print_r($data_new_insert);  exit();
        }
    }
    public function set_news()
    {
        $this->load->helper('url');
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text')
        );
        return $this->db->insert('news', $data);
    }
    public function pupdateuserStatus()
    {
        $data['status'] = 0;
        $id             = $_REQUEST['pid'];
        $this->db->where('addressid', $id);
        $this->db->update('ci_userpropertys', $data);
        return true;
    }
    public function getuserproperty($id = FALSE)
    {
        if ($id === FALSE) {
            $query = $this->db->get_where('ci_userpropertys', array(
                'status' => '1'
            ));
            return $query->result_array();
        }
        $query = $this->db->get_where('ci_userpropertys', array(
            'id' => $id,
            'status' => '1'
        ));
        return $query->row_array();
    }
    public function getuserpropertybill($id = FALSE)
    {
        $this->db->select('a.id,a.totalamount,b.id as proid,b.address,c.id as billid,c.bill_name');
        $this->db->from('ci_bill_charge as a');
        $this->db->join('ci_propertys  as b', 'a.property_id=b.id');
        $this->db->join('ci_bill  as c', 'a.bill_id=c.id');
        $this->db->where('a.id NOT IN (SELECT `bill_id` FROM `ci_transaction`)', NULL, FALSE);
        $this->db->where('b.id', $id);
        $query = $this->db->get();
        //		  echo '<pre>';  print_r($query->result_array()); exit();
        return $query->result_array();
    }
    function getbillamount($data)
    {
        $id = $_POST['id'];
        $this->db->select('a.totalamount');
        $this->db->from('ci_bill_charge as a');
        $this->db->where('a.id', $id);
        $query = $this->db->get();
        $data  = $query->row_array();
        echo '<input type="text" id="amount" name="amount" value="' . @$data['totalamount'] . '" />';
    }
    function successfulpayment()
    {
	
        
        $userid   = '';
        $payUtype = 3;
			if($this->session->userdata('userid')!=NULL)
				$userid_request = $this->session->userdata('userid') ;
				elseif($this->session->userdata('userid_request')!=NULL)
				$userid_request = $this->session->userdata('userid_request');
				else
				$userid_request = '';
	   
        $data     = array(
            'userid' => $userid_request,
			'society_id'=>$this->session->userdata('societyid'),
            'propertyid' => $this->input->post('udf1'),
            'bill_id' => $this->input->post('udf3'),
            'billname' => $this->input->post('udf4'),
            'societyname' => $this->input->post('udf5'),
            'propertyname' => $this->input->post('udf2'),
            'usertype' => $payUtype,
            'status' => $this->input->post('status'),
            'mihpayid' => $this->input->post('mihpayid'),
            'mode' => $this->input->post('mode'),
            'keyvalue' => $this->input->post('key'),
            'txnid' => $this->input->post('txnid'),
            'totalamount' => $this->input->post('amount'),
            'amount' => $this->session->userdata('amount'),
            'addedon' => $this->input->post('addedon'),
            'productinfo' => $this->input->post('productinfo'),
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'address1' => $this->input->post('address1'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'country' => $this->input->post('country'),
            'zipcode' => $this->input->post('zipcode'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'PG_TYPE' => $this->input->post('PG_TYPE'),
            'bank_ref_num' => $this->input->post('bank_ref_num'),
            'bankcode' => $this->input->post('bankcode'),
            'error' => $this->input->post('error'),
            'error_Message' => $this->input->post('error_Message'),
            'name_on_card' => $this->input->post('name_on_card'),
            'cardnum' => $this->input->post('cardnum'),
            'cardhash' => $this->input->post('cardhash'),
			'custom_note'=> $this->session->userdata('payment_desc'),
			
        );
        
        $query    = $this->db->insert('ci_transaction', $data);
        
       
        //return $this->input->post('txnid');
         return  $this->db->insert_id();
    }
    public function get_transaction($id = FALSE)
    {
        $userid = $this->session->userdata('userid');
        if ($id === FALSE) {
            $this->db->select('a.billname,a.societyname,b.address,a.totalamount as amount,a.status,a.id,a.addedon');
            $this->db->from('ci_transaction as a');
            $this->db->join('ci_propertys as b', 'a.propertyid=b.id');
            $this->db->where('a.userid', $userid);
            $query = $this->db->get();
            return $query->result_array();
        }
        $this->db->select('a.*,b.address as baddress');
        $this->db->from('ci_transaction as a');
        $this->db->join('ci_propertys as b', 'a.propertyid=b.id');
        $this->db->where('a.userid', $userid);
        $this->db->where('md5(a.id)', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    function Convenience($data)
    {
        //echo '<pre>'; 			 print_r($data);exit();
        if ($data['action'] == 'debitcard') {
            $this->db->select('a.debit_fa,a.debit_pa');
        } elseif ($data['action'] == 'creditcard') {
            $this->db->select('a.credit_fa,a.credit_pa');
        } elseif ($data['action'] == 'netbanking') {
            $this->db->select('a.netbanking_fa,a.netbanking_pa');
        } elseif ($data['action'] == 'emi') {
            $this->db->select('a.emi_fa,a.emi_pa');
        } elseif ($data['action'] == 'cashcart') {
            $this->db->select('a.cashcard_fa,a.cashcard_pa');
        }
        $this->db->from('ci_convenience as a');
        $this->db->where('a.societyid', $data['cid']);
        $query   = $this->db->get();
        $amtdata = $query->row_array();
        $fa      = 0;
        $pa      = 0;
        if ($data['action'] == 'debitcard') {
            $fa = $amtdata['debit_fa'];
            $pa = $amtdata['debit_pa'];
        } elseif ($data['action'] == 'creditcard') {
            $fa = $amtdata['credit_fa'];
            $pa = $amtdata['credit_pa'];
        } elseif ($data['action'] == 'netbanking') {
            $fa = $amtdata['netbanking_fa'];
            $pa = $amtdata['netbanking_pa'];
        } elseif ($data['action'] == 'emi') {
            $fa = $amtdata['emi_fa'];
            $pa = $amtdata['emi_pa'];
        } elseif ($data['action'] == 'cashcart') {
            $fa = $amtdata['cashcard_fa'];
            $pa = $amtdata['cashcard_pa'];
        }
        $con_amt     = $fa + ($data['amount'] * $pa/ 100) ;
        $toalamt     = $data['amount'] + $con_amt;
        $autocondata = array(
            'fpamount' => $toalamt,
            'fpcon_amt' => $con_amt,
            'carttypepay' => $data['action'],
            'carttype' => $data['action']
        );
        $this->session->set_userdata($autocondata);
        echo $response = '{    "con":"' . $con_amt . '",  "totalamt":"' . $toalamt . '","carttypepay":"' . $data['action'] . '"  }';
    }
    function autocon()
    {
        $amount = $this->session->userdata('amount');
        $cid    = $this->session->userdata('cid');
        $this->db->select('a.debit_fa,a.debit_pa');
        $this->db->from('ci_convenience as a');
        $this->db->where('a.societyid', $cid);
        $query       = $this->db->get();
        $amtdata     = $query->row_array();
        $fa          = $amtdata['debit_fa'];
        $pa          = $amtdata['debit_pa'];
        $con_amt     = $fa + ($amount * $pa / 100);
        $totalamt    = $amount + $con_amt;
        $autocondata = array(
            'fpamount' => $totalamt,
            'fpcon_amt' => $con_amt
        );
        $this->session->set_userdata($autocondata);
    }
	
	 

	public function getcity($id)
	 { 

	  $this->db->distinct();

 	  $this->db->select('*');

      $this->db->from('ci_city');		

	  $this->db->where('stateid',$id);
 $this->db->where('status',1);
	  $this->db->order_by('cityname','ASC');

      $query = $this->db->get();

 $states=$query->result_array();

  $html='<option value="">Select Your City</option>';

 foreach($states as $states)

  {

	  $html .='<option value="'.$states['id'].'" >'.$states['cityname'].'</option>';

	  }

$html .='';	

return  $html;

 }

		 

		 

		 

	 public function getarea($id)

	 { 

		 
	  $this->db->distinct();

 	  $this->db->select('*');

      $this->db->from('ci_area');		

	  $this->db->where('cityid',$id);
 $this->db->where('status',1);
	  $this->db->order_by('areaname','ASC');

      $query = $this->db->get();	  

 $states=$query->result_array();

 $html='<option value="">Select Your Area/Sector</option>';

 foreach($states as $states)

  {

	  $html .='<option value="'.$states['id'].'" >'.$states['areaname'].'</option>';

	  }

$html .='';	  


return  $html;
	 

	 }

	 

	 public function getsociety($id)

	 { 		

	  $this->db->distinct();

 	  $this->db->select('*');

      $this->db->from('ci_society');		

	  $this->db->where('areaid',$id);
 $this->db->where('status',1);
	  $this->db->order_by('society_title','ASC');

      $query = $this->db->get();

		
 $states=$query->result_array();

 $html='<option value="">Select Your Society</option>';

 foreach($states as $states)

  {

	  $html .='<option value="'.$states['id'].'" >'.$states['society_title'].'</option>';

	  }

$html .='';	  



return  $html;





		 

		 }



	 

	 public function getaddress($id)

	 { 
   

	  $this->db->distinct();

 	  $this->db->select('*');

      $this->db->from('ci_propertys');		

	  $this->db->where('societyid',$id);	 
 $this->db->where('status',1);
	  $this->db->order_by('address','ASC');

      $query = $this->db->get();  

 $states=$query->result_array();

 $html=' <option value="">Select Your Property</option>';

 foreach($states as $states)

  {

	  $html .='<option value="'.$states['id'].'" >'.$states['address'].'</option>';

	  }

$html .='';	  

return  $html;



		 }

	
	function getrequest_details($request_id){
	
	
	
 	  $this->db->select('*');

      $this->db->from('ci_payment_request');		

	  $this->db->where('md5(id)',"$request_id");
		$this->db->where('status','sent');
      $query = $this->db->get();
		
		
		if( $query->num_rows() > 0)		
		return $query->row();
	
	else return array();
	
	
	
	}
	
	
	
	
	
	
	
	
	
	
}