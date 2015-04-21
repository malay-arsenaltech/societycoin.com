<?php
class Master_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    function addcity()
    {
        $data['stateid']  = $_POST['stateid'];
        $data['cityname'] = $_POST['cityname'];
        $data['status']   = $_POST['status'];
        $this->db->insert('ci_city', $data);
        return $this->db->insert_id();
    }
    public function getCityCount($table = "")
    {
        $sql = "select * from $table ";
        $sql = mysql_query($sql);
        return mysql_num_rows($sql);
    }
    public function allcitylist($start, $limit)
    {
        $this->db->select('ci_city.*,ci_states.state');
        $this->db->from('ci_city');
        $this->db->join('ci_states', 'ci_city.stateid=ci_states.id');
		
		if($this->input->get_post('search_text')){
		$s = trim($this->input->get_post('search_text'));
		 $this->db->LIKE( 'ci_city.cityname',  $s );
		  $this->db->OR_LIKE( 'ci_states.state',  $s );
	}
		
        $this->db->order_by('ci_city.id', 'desc');
        $this->db->limit($start, $limit);
        $query = $this->db->get();
		
        return $query->result_array();
    }
    public function allarealist($start, $limit)
    {
        $this->db->select('ci_area.*,ci_city.cityname');
        $this->db->from('ci_area');
        $this->db->join('ci_city', 'ci_city.id=ci_area.cityid');
		
		if($this->input->get_post('search_text')){
		$s = trim($this->input->get_post('search_text'));
		 $this->db->LIKE( 'ci_city.cityname',  $s );
		  $this->db->OR_LIKE( 'ci_area.areaname',  $s );
	}
		
        $this->db->order_by('ci_area.id', 'desc');
        $this->db->limit($start, $limit);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function allcountry($id = FALSE)
    {
        if ($id === FALSE) {
            $query = $this->db->get('ci_country');
            return $query->result_array();
        }
        $query = $this->db->get_where('ci_country', array(
            'id' => $id
        ));
        return $query->result_array();
    }
    public function allstate($id = FALSE)
    {
        if ($id === FALSE) {
            $this->db->select('*');
            $this->db->from('ci_states');
            $this->db->where('id', 29);
            $query = $this->db->get();
            return $query->result_array();
        }
        $this->db->select('*');
        $this->db->from('ci_states');
        $this->db->where('countryid', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function allcity($id = FALSE)
    {
        if ($id === FALSE) {
            $this->db->select('*');
            $this->db->from('ci_city');
            $this->db->where('status', '1');
            $query = $this->db->get();
            return $query->result_array();
        }
        $this->db->select('*');
        $this->db->from('ci_city');
        $this->db->where('status', '1');
        $this->db->where('stateid', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function allarea($id = FALSE)
    {
        if ($id === FALSE) {
            $this->db->select('*');
            $this->db->from('ci_area');
            $this->db->where('status', '1');
            $query = $this->db->get();
            return $query->result_array();
        }
        $this->db->select('*');
        $this->db->from('ci_area');
        $this->db->where('status', '1');
        $this->db->where('cityid', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function allsociety($id = FALSE)
    {
        if ($id === FALSE) {
            $this->db->select('*');
            $this->db->from('ci_society');
            $this->db->where('status', '1');
            $query = $this->db->get();
            return $query->result_array();
        }
        $this->db->select('*');
        $this->db->from('ci_society');
        $this->db->where('status', '1');
        $this->db->where('areaid', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function allsocietysubadmin($id = FALSE)
    {
        if ($id === FALSE) {
            $this->db->select('*');
            $this->db->from('ci_society');
            $this->db->where('status', '1');
            $this->db->where(' `id` NOT IN (SELECT societyid from `ci_assign_society` )', NULL, FALSE);
            $query = $this->db->get();
            return $query->result_array();
        }
        $this->db->select('*');
        $this->db->from('ci_society');
        $this->db->where('status', '1');
        $this->db->where('areaid', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getsocietyassingsubadmin($id = FALSE)
    {
        $this->db->select('a.id,a.society_title,b.userid,a.chargehead_id,b.id as assid');
        $this->db->from('ci_society as a');
        $this->db->join('ci_assign_society as b', 'a.id=b.societyid');
        $this->db->where('b.userid', $id);
        $query = $this->db->get();
        //echo '<pre>'; 	  print_r($query->result_array());exit();
        return $query->result_array();
    }
    public function getassingproperty($id)
    {
        $this->db->select('a.*,b.userid,c.society_title,b.id as assid');
        $this->db->from('ci_propertys as a');
        $this->db->join('ci_userpropertys as b', 'a.id=b.addressid');
        $this->db->join('ci_society as c', 'c.id=b.societyid');
        $this->db->where('b.userid', $id);
        $this->db->where('b.status', 1);
        $query = $this->db->get();
        //echo '<pre>'; 	  print_r($query->result_array());exit();
        return $query->result_array();
    }
    public function getchargeheadassignonsociety($id = FALSE)
    {
        $this->db->select('*');
        $this->db->from('ci_bill');
        $this->db->where('status', 1);
        $query = $this->db->get();
        //echo '<pre>';	 print_r($query->result_array());	  exit();
        return $query->result_array();
    }
    public function allpropertys($id = FALSE)
    {
        if ($id === FALSE) {
            $this->db->select('*');
            $this->db->from('ci_propertys');
            $this->db->where('status', '1');
            $query = $this->db->get();
            return $query->result_array();
        }
        $this->db->select('*');
        $this->db->from('ci_propertys');
        $this->db->where('status', '1');
        $this->db->where('societyid', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getstate($data)
    {
        $id = $data['id'];
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('ci_states');
        $this->db->where('countryid', $id);
        $this->db->where('id', 29);
        $this->db->order_by('state', 'ASC');
        $query  = $this->db->get();
        $states = $query->result_array();
        $html   = '<select id="stateid" name="stateid" onblur="getcity()" ><option>Select State</option>';
        foreach ($states as $states) {
            $html .= '<option value="' . $states['id'] . '" >' . $states['state'] . '</option>';
        }
        $html .= '</select>';
        echo $html;
    }
    public function getcity($data)
    {
        $id = $data['id'];
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('ci_city');
        $this->db->where('stateid', $id);
        $this->db->order_by('cityname', 'ASC');
        $query  = $this->db->get();
        $states = $query->result_array();
        $html   = '<select id="cityid" name="cityid"   ><option>Select City</option>';
        foreach ($states as $states) {
            $html .= '<option value="' . $states['id'] . '" >' . $states['cityname'] . '</option>';
        }
        $html .= '</select>';
        echo $html;
    }
    public function getarea($data)
    {
        $id = $data['id'];
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('ci_area');
        $this->db->where('cityid', $id);
        $this->db->order_by('areaname', 'ASC');
        $query  = $this->db->get();
        $states = $query->result_array();
        $html   = '<select id="areaid" name="areaid"    ><option>Select Area / Sector</option>';
        foreach ($states as $states) {
            $html .= '<option value="' . $states['id'] . '" >' . $states['areaname'] . '</option>';
        }
        $html .= '</select>';
        echo $html;
    }
    public function getsociety($data)
    {
        $id = $data['id'];
        if ($this->session->userdata('utype') == 2) {
            $this->db->distinct();
            $this->db->select('a.id,a.society_title');
            $this->db->from('ci_society as a');
            $this->db->join('ci_assign_society as b', 'a.id=b.societyid');
            $this->db->where('b.userid', $this->session->userdata('admin_id'));
            $this->db->where('areaid', $id);
            $this->db->order_by('society_title', 'ASC');
            $query = $this->db->get();
        } else if ($this->session->userdata('utype') == 4) {
            $this->db->distinct();
            $this->db->select('a.id,a.society_title');
            $this->db->from('ci_society as a');
            $this->db->join('ci_assign_society as b', 'a.id=b.societyid');
            $this->db->where('b.userid', $this->session->userdata('admin_id'));
            $this->db->where('areaid', $id);
            $this->db->order_by('society_title', 'ASC');
            $query = $this->db->get();
        } else {
            $this->db->distinct();
            $this->db->select('*');
            $this->db->from('ci_society');
            $this->db->where('areaid', $id);
            $this->db->order_by('society_title', 'ASC');
            $query = $this->db->get();
        }
        $states = $query->result_array();
        $html   = '<select id="societyid" name="societyid"   ><option>Select your Society</option>';
        foreach ($states as $states) {
            $html .= '<option value="' . $states['id'] . '" >' . $states['society_title'] . '</option>';
        }
        $html .= '</select>';
        echo $html;
    }
    public function getaddress($data)
    {
        $id = $data['id'];
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('ci_propertys');
        $this->db->where('societyid', $id);
        $this->db->where('`id` NOT IN (Select addressid from ci_userpropertys where status=1)', NULL, FALSE);
        $this->db->order_by('address', 'ASC');
        $query  = $this->db->get();
        $states = $query->result_array();
        $html   = '<select id="addressid" name="addressid" onblur="getaddress()"   ><option>Select your address</option>';
        foreach ($states as $states) {
            $html .= '<option value="' . $states['id'] . '" >' . $states['address'] . '</option>';
        }
        $html .= '</select>';
        echo $html;
    }
    public function getaddress1($data)
    {
        $id = $data['id'];
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('ci_propertys');
        $this->db->where('societyid', $id);
        //	  $this->db->where('`id` NOT IN (Select addressid from ci_userpropertys where status=1)',NULL,FALSE);
        $this->db->order_by('address', 'ASC');
        $query   = $this->db->get();
        $states  = $query->result_array();
        $address = '';
        //$html='<select id="addressid" name="addressid" onblur="getaddress()"   ><option>Select your address</option>';
        foreach ($states as $itemp) {
            $address .= '"' . $itemp['address'] . '",';
        }
        //$html .='</select>';	  
        echo $address;
    }
    function propertystatus($data)
    {
        $id = $data['id'];
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('ci_userpropertys');
        $this->db->where('addressid', $id);
        $this->db->where('status', 1);
        //  $this->db->order_by('address','ASC');
        $query  = $this->db->get();
        $states = $query->row_array();
        if (@$states['id'] != NULL && @$states['status'] == 1) {
            //			echo '<div >This Property Assign to another user. if you wants to changed the property registration on site so please fill the Property Modification form and clicked on send button.</div>';
            echo $response = '{ "sid":"' . $states['id'] . '"}';
        } else {
            echo $response = '{ "sid":"0"}';
        }
        // echo '<pre>'; 	  print_r($states); exit();
    }
    public function getaddressforguest($data)
    {
        $id = $data['id'];
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('ci_propertys');
        $this->db->where('societyid', $id);
        $this->db->order_by('address', 'ASC');
        $query  = $this->db->get();
        $states = $query->result_array();
        //echo '<pre>';  print_r($states); exit();
        $html   = '<select id="addressid" name="addressid" onblur="getaddress()"   ><option>Select your address</option>';
        foreach ($states as $states) {
            $html .= '<option value="' . $states['id'] . '" >' . $states['address'] . '</option>';
        }
        $html .= '</select>';
        echo $html;
    }
    public function getaddressbyid($data)
    {
        $id = $data['id'];
        $this->db->select('*');
        $this->db->from('ci_propertys');
        $this->db->where('societyid', $id);
        $this->db->order_by('address', 'ASC');
        $query  = $this->db->get();
        $states = $query->result_array();
        if ($data['action'] == "chargehead") {
            $html = '<select id="addressid" name="addressid" onblur="getchargehead()"  ><option>Select your address</option>';
            foreach ($states as $states) {
                $html .= '<option value="' . $states['id'] . '" >' . $states['address'] . '</option>';
            }
            $html .= '</select>';
            echo $html;
        } else {
            $html = '<select id="addressid" name="addressid"   ><option>Select your address</option>';
            foreach ($states as $states) {
                $html .= '<option value="' . $states['id'] . '" >' . $states['address'] . '</option>';
            }
            $html .= '</select>';
            echo $html;
        }
    }
    function getchargehead($data)
    {
        $id = $data['id'];
        $this->db->select('chargehead_id as cid');
        $this->db->from('ci_society');
        $this->db->where('id', $id);
        $query  = $this->db->get();
        $states = $query->row_array();
        echo $states['cid'];
        $this->db->select('*');
        $this->db->from('ci_bill');
        $this->db->where('`id` IN (' . $states['cid'] . ')', NULL, FALSE);
        $query   = $this->db->get();
        $states1 = $query->result_array();
        $html    = '<select id="addressid" name="addressid" onblur="getaddress()"   ><option>Select your address</option>';
        foreach ($states1 as $states) {
            $html .= '<option value="' . $states['id'] . '" >' . $states['bill_name'] . '</option>';
        }
        $html .= '</select>';
        echo $html;
    }
    public function getbill($data)
    {
        $id = $data['id'];
        $this->db->distinct();
        $this->db->select('a.*,b.bill_name');
        $this->db->from('ci_bill_charge as a');
        $this->db->join('ci_bill as b', 'a.bill_id=b.id');
        $this->db->where('a.id NOT IN (Select bill_id from ci_transaction)', NULL, FALSE);
        $this->db->where('a.property_id', $id);
        $query  = $this->db->get();
        $states = $query->result_array();
        $html   = '<select id="billid" name="billid"   ><option>Pay for bill</option>';
        foreach ($states as $states) {
            $html .= '<option value="' . $states['id'] . '" >' . $states['bill_name'] . '</option>';
        }
        $html .= '</select>';
        echo $html;
    }
    public function getbillamountguest($data)
    {
        $id = $data['id'];
        $this->db->select('a.id');
        $this->db->from('ci_propertys as a');
        $this->db->where('a.address', $id);
        $this->db->where('a.societyid', $this->session->userdata('so_id'));
        $query = $this->db->get();
        $proid = $query->row_array();
        //echo $proid['id']; exit();
        $id    = @$proid['id'];
        $this->db->distinct();
        $this->db->select_sum('totalamount');
        $this->db->from('ci_bill_charge as a');
        $this->db->where('a.property_id', $id);
        $query     = $this->db->get();
        $total_amt = $query->row_array();
        $id        = @$proid['id'];
        $this->db->distinct();
        $this->db->select_sum('amount');
        $this->db->from('ci_transaction as a');
        $this->db->where('a.propertyid', $id);
        $this->db->where('a.status', 'success');
        $query    = $this->db->get();
        $tans_amt = $query->row_array();
        // echo '<pre>'; print_r($stamount);
        // echo '<pre>'; print_r($tamount);
        //  echo  '<br>Total Amt'; exit();
        $tansamt  = @$tans_amt['amount'];
        $totalamt = @$total_amt['totalamount'];
        $ramt     = (int) $totalamt - (int) $tansamt;
        if ($ramt > 0) {
            if ($this->session->userdata('admin_id') != NULL) {
                echo '<div id="payrep"><input type="text" id="amount" name="amount" value="' . $ramt . '" /><input type="hidden" id="udf1" name="udf1" value="' . $proid['id'] . '" /></div>';
            } else {
                echo '<div id="payrep"><input type="text" id="amount" name="amount" value="" /><input type="hidden" id="udf1" name="udf1" value="' . $proid['id'] . '" /></div>';
            }
        } else {
            echo '<div id="payrep"><input type="text" id="amount" name="amount" value="" /><input type="hidden" id="udf1" name="udf1" value="' . $proid['id'] . '" /></div>';
        }
    }
    public function autocompleteaddress($data)
    {
        //echo '<pre>'; 	 print_r($data); exit();
        $id = $data['id'];
        $this->db->select('*');
        $this->db->from('ci_propertys as a');
        $this->db->where('a.address', $data['id']);
        $this->db->where('a.societyid', $data['cid']);
        $query = $this->db->get();
        $proid = $query->row_array();
        $this->db->select('*');
        $this->db->from('ci_userpropertys');
        $this->db->where('addressid', $proid['id']);
        $this->db->where('status', 1);
        $query1      = $this->db->get();
        $statusproid = $query1->row_array();
        //    echo '<pre>'; print_r($statusproid); exit();
        if (@$statusproid['status'] == 1) {
            echo '<div id="payrep"><p id="payrep">This property belong to another user. So Please select another property otherwise <a target="_blank" href=' . base_url() . 'user/modifyform?pid=' . $proid['id'] . '&soid=' . $proid['societyid'] . '>click here</a> request  for property modification.</p></div>';
        } else {
            echo '<div id="payrep"><input type="hidden" id="countryid" name="countryid" value="' . @$proid['countryid'] . '" /><input type="hidden" id="stateid" name="stateid" value="' . @$proid['stateid'] . '" /><input type="hidden" id="cityid" name="cityid" value="' . @$proid['cityid'] . '" /><input type="hidden" id="areaid" name="areaid" value="' . @$proid['areaid'] . '" /><input type="hidden" id="societyid" name="societyid" value="' . @$proid['societyid'] . '" /><input type="hidden" id="udf1" name="udf1" value="' . @$proid['id'] . '" /><input id="addprobtn" name="add" type="submit"  style="margin-bottom:10px;" value="Add"></div>';
        }
    }
    public function submitarea()
    {
        $data['stateid']  = $_POST['stateid'];
        $data['cityid']   = $_POST['cityid'];
        $data['areaname'] = $_POST['areaname'];
        $data['status']   = $_POST['status'];
        $this->db->insert('ci_area', $data);
        return $this->db->insert_id();
    }
    function updatesocity()
    {
        $data['userid']        = $_POST['userid'];
        $data['society_title'] = $_POST['society_title'];
        $data['address']       = $_POST['address'];
        $data['city']          = $_POST['city'];
        $data['state']         = $_POST['state'];
        $data['country']       = $_POST['country'];
        $data['ip']            = $_POST['ip'];
        $data['zipcode']       = $_POST['zipcode'];
        $data['status']        = $_POST['status'];
        $id                    = $_POST['id'];
        $this->db->where('id', $id);
        $this->db->update('ci_socity', $data);
        return true;
    }
    function updatesocityStatus()
    {
        $data['status'] = 0;
        $id             = $_REQUEST['said'];
        $this->db->where('id', $id);
        $this->db->update('ci_socity', $data);
        return true;
    }
    function pupdatesocityStatus()
    {
        $data['status'] = 1;
        $id             = $_REQUEST['said'];
        $this->db->where('id', $id);
        $this->db->update('ci_socity', $data);
        return true;
    }
    function newbill()
    {
        $data          = array(
            'bill_name' => $_POST['bill_name'],
            'status' => $_POST['status']
        );
        $reuslt        = $this->db->insert('ci_bill', $data);
        $id            = $this->db->insert_id();
        $chargeid      = $_REQUEST['chargeid'] . ',' . $id;
        $chargehead_id = array(
            'chargehead_id' => $chargeid
        );
        $this->db->where('id', $_REQUEST['societyid']);
        $this->db->update('ci_society', $chargehead_id);
        return $id;
    }
    function allbill($id = FALSE)
    {
        if ($id === FALSE) {
            $query = $this->db->get('ci_bill');
            return $query->result_array();
        }
        $query = $this->db->get_where('ci_bill', array(
            'id' => $id
        ));
        return $query->row_array();
    }
    function updatebill()
    {
        $data = array(
            'bill_name' => $_POST['bill_name'],
            'bill_payment' => $_POST['bill_payment'],
            'status' => $_POST['status']
        );
        $id   = $_POST['id'];
        $this->db->where('id', $id);
        $reuslt = $this->db->update('ci_bill', $data);
        return true;
    }
    function publishedbill()
    {
        $data['status'] = 0;
        $id             = $_REQUEST['bid'];
        $this->db->where('id', $id);
        $this->db->update('ci_bill', $data);
        return true;
    }
    function unpublishedbill()
    {
        $data['status'] = 1;
        $id             = $_REQUEST['bid'];
        $this->db->where('id', $id);
        $this->db->update('ci_bill', $data);
        return true;
    }
    function getchargeheadlist()
    {
        $query = $this->db->get_where('ci_bill', array(
            'status' => 1
        ));
        return $query->result_array();
    }
	
	
	
function is_unique_area($cityid='',$areaname='')
    {
          $this->db->select('*');
		 $this->db->from('ci_area');
        $this->db->where('areaname', "$areaname");
		 $this->db->where('cityid', "$cityid");
        $res = $this->db->get();
		
       if( $res->num_rows() > 0)
		return false;
		else
		return true;
		
    }
	
	
	function is_unique_city($stateid='',$cityname='')
    {
          $this->db->select('*');
		 $this->db->from('ci_city');
        $this->db->where('stateid', "$stateid");
		 $this->db->where('cityname', "$cityname");
        $res = $this->db->get();
		
       if( $res->num_rows() > 0)
		return false;
		else
		return true;
		
    }
	
	function get_city_by_id($cid)
    {
          $this->db->select('*');
		 $this->db->from('ci_city');
        $this->db->where('id', "$cid");
		
        $res = $this->db->get();
		 if($res->num_rows() > 0)
		 return $res->row();
		 else
		 return array();
     
		
    }
	
	function get_area_by_id($cid){
	 $this->db->select('*');
		 $this->db->from('ci_area');
        $this->db->where('id', "$cid");
		
        $res = $this->db->get();
		 if($res->num_rows() > 0)
		 return $res->row();
		 else
		 return array();
	
	
	}
	
	
	function update_city($upd=array(),$cid=''){
	
	
	$this->db->where('id', $cid);
	$this->db->update('ci_city', $upd); 
	
	return true;
	}
	
	function update_area($upd=array(),$aid=''){
	
	
	$this->db->where('id', $aid);
	$this->db->update('ci_area', $upd); 
	
	return true;
	}
	
	
	
	
	
	
	
	
	
}