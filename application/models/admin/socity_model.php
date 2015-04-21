<?php

class Socity_model extends CI_Model {



	public function __construct()

	{

		$this->load->database();

	}

	

	 public function allsocietylist($start,$limit)

	  { 

	  

	  

	  if(@$_POST['task']=="")

	    {

	  

	  $this->db->select('a.id,a.society_title,a.so_name,b.areaname,c.cityname,a.address,a.so_email as email,a.status,a.so_mobile,a.so_name,a.chargehead_id');

      $this->db->from('ci_society as a');

	  $this->db->join('ci_area as b', 'b.id=a.areaid');	

	  $this->db->join('ci_city as c','c.id=a.cityid');

		}else

{
			

	  $this->db->select('a.id,a.society_title,a.so_name,b.areaname,c.cityname,a.address,a.so_email as email,a.status,a.so_mobile,a.so_name');

      $this->db->from('ci_society as a');

	  $this->db->join('ci_area as b', 'b.id=a.areaid');	

	  $this->db->join('ci_city as c','c.id=a.cityid');
	   

if(isset($_POST['cityid']) && $_POST['cityid']!=''){
		 $this->db->where('a.cityid',$_POST['cityid']);
		}
		
		if(isset($_POST['areaid']) && $_POST['areaid']!=''){
		 $this->db->where('a.areaid',$_POST['areaid']);
		}
		if(isset($_POST['societyid']) && $_POST['societyid']!=''){
		  $this->db->where('a.id',$_POST['societyid']);
		}

	   
		//$this->db->where('a.id',$_POST['societyid']);
	 // $this->db->where('a.cityid',$_POST['cityid']);

	  //$this->db->where('a.areaid',$_POST['areaid']); 		
	
	}
	$this->db->order_by('a.id','desc');
	$this->db->limit($start,$limit); 	 

      $query = $this->db->get();

      return $query->result_array();

    }

	function getCount(){
	

		$sql="select * from ci_society ";
	
		$sql=mysql_query($sql);
		return mysql_num_rows($sql);
	
	
	
	
	}

	 public function subadminSociety($start,$limit)

	  { 

		$this->db->distinct();

	  $this->db->select('a.id,a.society_title,a.so_name,b.areaname,c.cityname,a.address,a.so_email as email,a.status,a.so_mobile,a.chargehead_id');

      $this->db->from('ci_society as a');

	  $this->db->join('ci_area as b', 'b.id=a.areaid');	

	  $this->db->join('ci_city as c','c.id=a.cityid');

      $this->db->join('ci_assign_society as d','a.id=d.societyid');

	 $this->db->where('d.userid',$this->session->userdata('admin_id'));

	  if(@$_POST['task']=="search")

	   {
	   	   	 
	
if(isset($_POST['cityid']) && $_POST['cityid']!=''){
		 $this->db->where('a.cityid',$_POST['cityid']);
		}
		
		if(isset($_POST['areaid']) && $_POST['areaid']!=''){
		 $this->db->where('a.areaid',$_POST['areaid']);
		}
		if(isset($_POST['societyid']) && $_POST['societyid']!=''){
		  $this->db->where('a.id',$_POST['societyid']);
		}

		   }
$this->db->order_by('a.id','desc');
	$this->db->limit($start,$limit); 	 

      $query = $this->db->get();

      return $query->result_array();

    }

	
function subadminSocietyCount(){
$this->db->distinct();

	  $this->db->select('a.id,a.society_title,a.so_name,b.areaname,c.cityname,a.address,a.so_email as email,a.status,a.so_mobile,a.chargehead_id');

      $this->db->from('ci_society as a');

	  $this->db->join('ci_area as b', 'b.id=a.areaid');	

	  $this->db->join('ci_city as c','c.id=a.cityid');

      $this->db->join('ci_assign_society as d','a.id=d.societyid');

	 $this->db->where('d.userid',$this->session->userdata('admin_id'));

	  if(@$_POST['task']=="search")

	   {
	   	   	 
	
if(isset($_POST['cityid']) && $_POST['cityid']!=''){
		 $this->db->where('a.cityid',$_POST['cityid']);
		}
		
		if(isset($_POST['areaid']) && $_POST['areaid']!=''){
		 $this->db->where('a.areaid',$_POST['areaid']);
		}
		if(isset($_POST['societyid']) && $_POST['societyid']!=''){
		  $this->db->where('a.id',$_POST['societyid']);
		}

		   }

      $query = $this->db->get();
if( $query ->num_rows() >0 )
      return $query ->num_rows();
	  else return 0;


}
	

 public function allchargebysubadmin()

	  { 

	  

	  $this->db->select('a.id,a.status,c.address,b.bill_name,a.amount,a.taxamount,a.totalamount');

      $this->db->from('ci_bill_charge  as a');

	  $this->db->join('ci_bill as b','a.bill_id=b.id');

	  $this->db->join('ci_propertys as c','a.property_id=c.id');

	  $this->db->where('a.addbyid',$this->session->userdata('userid'));

      $query = $this->db->get();

      return $query->result_array();

    }





	

	

	public function societyByid($id)

	 {

		


	$query = $this->db->get_where('ci_society', array('id' => $id));

   	return $query->row_array();

		 }

		 

    public function getallsociety()

	 {

	

	if($this->session->userdata('utype')==1)

	  { 

	$query = $this->db->get('ci_socity');

	  

   	return $query->result_array();

	  }else

	     {

 		 $uerid=$this->session->userdata('userid');

	 	$query = $this->db->get_where('ci_socity', array('userid' => $uerid));

	   	return $query->result_array();

 		 }

	

		 }

	

		 

	public function condata($id)

	 {

		 



	$query = $this->db->get_where('ci_convenience', array('societyid' => $id));

   	return $query->row_array();

		 }	 

		 

	

	

	function addsocity()

	 {}

		 

		 

		 

		 

		 function billaddprocess()

		   {

			   

  //      echo $_POST['sdate'];

        list($day, $month, $year) = explode('/',$_POST['sdate']);

        list($days, $months, $years) = explode('/',$_POST['edate']);

		

		 $sdate=mktime(0, 0, 0, $month, $day, $year);

		 $edate=mktime(0, 0, 0, $months, $days, $years);		 



//        echo $today = date("Y/m/d",$date);                 

			   

        $total=$_POST['amount'];

	    $data['society_id']=$_POST['societyid'];

        $data['property_id']=$_POST['propertyid'];

	    $data['sdate']=$sdate;

	    $data['edate']=$edate;

	    $data['bill_id']=$_POST['chargehead'];

        $data['description']=$_POST['description'];

		$data['amount']=$_POST['amount'];

		$data['totalamount']=$total;

		$data['addbyid']  =$this->session->userdata['userid'];

		

//echo '<pre>'; 			   print_r($data);			   exit();



        $this->db->insert('ci_bill_charge', $data);

		

          return  $this->db->insert_id();



	   

			   }

		 

		 

 function updatesocity()

	 {

		 

		 if(isset($_POST['so_newpassword']) && $_POST['so_newpassword']!=NULL)

		   {

			   $password=md5($_POST['so_newpassword']);

			   $chargehead=implode(",",$_POST['chargehead']);

			   

		  $data=array(

					  'countryid'=>$_POST['countryid'],

					  'stateid'  =>$_POST['stateid'],

					  'cityid'   =>$_POST['cityid'],

					  'areaid'    =>$_POST['areaid'],

					  'address'  =>trim($_POST['address']),

					  'society_title' =>trim($_POST['society_title']),

					  'so_name' =>trim($_POST['so_name']),

					    'chargehead_id'=>$chargehead,

					  'so_email'  =>trim($_POST['so_email']),

					  'so_password' =>$password,

					  'so_mobile' =>trim($_POST['so_mobile']),

					  'status' =>'1'

					  );
					  
					
					  

		   }else

		     {

				 $chargehead=implode(",",$_POST['chargehead']); 

		  $data=array(

					  'countryid'=>$_POST['countryid'],

					  'stateid'  =>$_POST['stateid'],

					  'cityid'   =>$_POST['cityid'],

					  'areaid'    =>$_POST['areaid'],

					  'address'  =>$_POST['address'],

					  'society_title' =>$_POST['society_title'],

					    'chargehead_id'=>$chargehead,

					  'so_name' =>$_POST['so_name'],

					  'so_email'  =>$_POST['so_email'],

					  'so_mobile' =>$_POST['so_mobile'],

					  'status' =>'1'

					  );

				 if($_POST['billing_cycle_date']!='')  {
			$data['billing_cycle_date']=	$_POST['billing_cycle_date'];	
					
					}

				 }



        $id=$_POST['id'];
        
	if($this->session->userdata('utype')==1)
       {
		$cdata=array(

				 'debit_fa'=>$_POST['dccamt'],

				 'debit_pa'=>$_POST['dccamtp'],

				 'credit_fa'=>$_POST['cccamt'],

				 'credit_pa'=>$_POST['cccamtp'],

				 'netbanking_fa'=>$_POST['nbcamt'],

				 'netbanking_pa'=>$_POST['nbamtp'],

				 'emi_fa'=>$_POST['emicamt'],

				 'emi_pa'=>$_POST['emicamtp'],

				 'cashcard_fa'=>$_POST['caccamt'],

				 'cashcard_pa'=>$_POST['caccamtp'],

				 'status'=>1

				 );

	
	$this->db->where('societyid', $id);
    $this->db->update('ci_convenience', $cdata);
	
	   }

	$this->db->where('id', $id);

    $this->db->update('ci_society', $data); 



return true;

		 }

		 

		 

	 function updatesocityStatus($id=1)

	 {

 		$data['status']=0;

	    $this->db->where('id', $id);

        $this->db->update('ci_society', $data); 



    return true;

	 }



	 function pupdatesocityStatus($id=1)

	 {

 		$data['status']=1;		

	    $this->db->where('id', $id);

        $this->db->update('ci_society', $data); 



    return true;

	 }

	 
	 function AddSocietyUser($data=array()){
	 
	 $desired_length = rand(8, 12); 

	$password1=NULL;
	$length = 8;
	
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
	$password1 = strtolower(substr( str_shuffle( $chars ), 0, $length ));

 $password=md5($password1);  
 
 
 $myvalue = strtolower(trim($_POST['society_title'])) ;
$arr = explode(' ',trim($myvalue));
 $user = $arr[0]; 
		
		$result = mysql_query("SHOW TABLE STATUS LIKE 'ci_users'");
		$row = mysql_fetch_array($result);
		$nextId = $row['Auto_increment']; 
	  $user =  $user.'.'.$nextId;
		
		$data1['username']= "$user";
		
		$data1['fname']=$data['so_name'];
		
		$data1['email']=$data['so_email'];			
		
		$data1['password']= "$password";
		
		$data1['mobile']=$data['so_mobile'];
		
		$data1['address']=$data['address'];		
		
		$data1['ip'] = $_SERVER['REMOTE_ADDR'];
		
		$data1['status']=1;		
		$data1['utype']=4;	
					
					
		 $this->load->library('email');
		  
		$this->email->from("no-reply@societycoin.com","societycoin.com"); 		  
		 $this->email->to($this->input->post('so_email'));	
		  $name = $_POST['so_name'];

		$html ='Hello '. $name.',  <br><br>Welcome to societycoin.com! <br><br>Please find below the login details of the site as a Role of "Society Admin" <br> <br>---------------------------<br><br><b>User ID:</b> '.$user .'  <br><b> Password:</b> '.$password1.' <br> <br> <a href="'.base_url().'admin" >Click to login</a> <br><br>---------------------------<br><br>Best regards,
		<br>The SocietyCoin.com team.
		<br>www.societycoin.com
		<br>support@societycoin.com';
		
		$this->email->subject('Account Created for Society Coin');
		$this->email->message($html);
		$this->email->set_mailtype("html");
		$this->email->send();	
										
					
					
					
		$this->db->insert('ci_users', $data1);
				
		return $this->db->insert_id();
		
	 
	 }


	 

 public function NewSocietyADD()
 {			
 

		  
		  $data=array(

					
					  'stateid'  =>$_POST['stateid'],

					  'cityid'   =>$_POST['cityid'],

					  'areaid'    =>$_POST['areaid'],

					  'address'  => trim($_POST['address']),

					  'society_title' => trim($_POST['society_title']),	
					  'so_name' => trim($_POST['so_name']),
					  'so_password' =>'',
					  'so_email'  => trim($_POST['so_email']),					  

					  'so_mobile' =>$_POST['so_mobile'],

					  'status' =>'1'

					  );
 if($_POST['billing_cycle_date']!='')  {
			$data['billing_cycle_date']=	$_POST['billing_cycle_date'];	
					
					}
		  		$societyuser_id = $this->AddSocietyUser($data);
				$data['society_user_id'] = $societyuser_id;
				$this->db->insert('ci_society', $data);		
		 
				$societyid=  $this->db->insert_id();		  

		  $cdata=array(

				 'societyid'=> $societyid,

				 'debit_fa'=>$_POST['dccamt'],

				 'debit_pa'=>$_POST['dccamtp'],

				 'credit_fa'=>$_POST['cccamt'],

				 'credit_pa'=>$_POST['cccamtp'],

				 'netbanking_fa'=>$_POST['nbcamt'],

				 'netbanking_pa'=>$_POST['nbamtp'],

				 'emi_fa'=>$_POST['emicamt'],

				 'emi_pa'=>$_POST['emicamtp'],

				 'cashcard_fa'=>$_POST['caccamt'],

				 'cashcard_pa'=>$_POST['caccamtp'],

				 'status'=>1

				 

				 

				 );

		   $this->db->insert('ci_convenience', $cdata);

		 

		  return  $societyid;

		  

		  

		  }

		  

 function billupdatesocityStatus()

	 {

		 



 		$data['status']=0;

       	$id=$_GET['pid'];

	    $this->db->where('id', $id);

        $this->db->update('ci_bill_charge', $data); 



    return true;

	 }



	 function billpupdatesocityStatus()

	 {

 		$data['status']=1;

	$id=$_GET['pid'];



	    $this->db->where('id', $id);

        $this->db->update('ci_bill_charge', $data); 



    return true;

	 }	

	 

	 function excel($soid)

	  {

	  $sql="SELECT Distinct  a.society_title as SocietyName,a.id as society_id ,b.address as PropertyAddress,b.id as property_id,d.bill_name as billname,d.id as bill_id FROM ci_society as a JOIN ci_propertys as b JOIN ci_userpropertys as c JOIN ci_bill as d ON a.id=b.societyid And b.id=c.addressid  where a.id=".$soid." ORDER BY property_id ASC";   



		  $query = $this->db->query($sql);

		    return $query->result_array();

		   

//echo'<pre>';		   print_r($row); exit();

		  }


	 function excelpro($soid)

	  {

	  $sql="SELECT * FROM ci_society as a  where a.id=".$soid." ORDER BY a.id ASC";   



		  $query = $this->db->query($sql);

		    return $query->result_array();

		   

//echo'<pre>';		   print_r($query->result_array()); exit();

		  }

		  

		  

		 function  uploadexcel()

		  {

           

		   @$filename=$_FILES['file']['name'];			  
	    @$filepath="/home/karve/public_html/bupload/bills/".$filename;   

       if (!copy($_FILES['file']['tmp_name'], $filepath)) 
			  {
		        echo "failed to copy $file...\n";
				}
			

			

			

$row = 1;



if (($handle = fopen($filepath, "r")) !== FALSE) {



    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

        $num = count($data); 

        

        $row++;

			

        @list($day, $month, $year) = explode('/',$data[2]);

        @list($days, $months, $years) = explode('/',$data[3]);

		

		 @$sdate=mktime(0, 0, 0, $month, $day, $year);

		 @$edate=mktime(0, 0, 0, $months, $days, $years);







@$v1=$data[0]; @$v4=$data[4];@$v5=$data[5]; @$v6=$data[6];@$v7=$data[7]; @$v8=$data[8];



 $sql="INSERT INTO `ci_bill_charge` (`society_id`, `property_id`, `sdate`, `edate`, `bill_id`,`amount`,`totalamount`,`addbyid`, `status`)   VALUES(

		   $v1,

	      $data[1],

   		   $sdate,

		   $edate,

		   $v4,

		   '$v5',

		   '$v6',

		   '$v7',

		   '$v8'

		   )";



		@mysql_query($sql);

	

  }



    @fclose($handle);

	 return true;

 }



 

  }

		 

function  uploadexcelpro()

{
		   $filename=@$_FILES['file']['name'];			  
           @$filepath="/home/karve/public_html/bupload/property/".$filename;   
			if (!copy($_FILES['file']['tmp_name'], $filepath)) 
			  {
		        echo "failed to copy $file...\n";
				}
 $row = 1;

if (($handle = fopen($filepath, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data); 
        $row++;
@$v0=$data[0];
@$v1=$data[1];
@$v2=$data[2];
@$v3=$data[3];
@$v4=$data[4];
@$v5=$data[5];
@$v6=$data[6]; 



$sql="INSERT INTO `ci_propertys` (`countryid`, `stateid`, `cityid`, `areaid`, `societyid`, `address`, `status`)   VALUES(
		   $v0,$v1,$v2,$v3,$v4,'".$v5."',$v6)";
		@mysql_query($sql); 
		

  }

 @fclose($handle);
	 return true;

 }



 

  return true;}

public function deleteRow($id)

{


			$this->db->where_in('id', $id);

            $this->db->delete('ci_society'); 		
			

        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;

	}	 


function is_unique_society($sid='',$areaid='')
    {
          $this->db->select('*');
		 $this->db->from('ci_society');
        $this->db->where('society_title', "$sid");
		 $this->db->where('areaid', "$areaid");
        $res = $this->db->get();
		
       if( $res->num_rows() > 0)
		return false;
		else
		return true;
		
    }
	
	function get_unique_society($subadmin_id=''){
	
	
	 $sql = "SELECT DISTINCT `s`.* FROM `ci_society` s  WHERE  s.id not in (select societyid from ci_assign_society where userid='$subadmin_id') and s.status='1'";


		$res = $this->db->query($sql);
       
		if( $res->num_rows() > 0){
		return  $res->result();
		}
		else return array();
	
	}

}