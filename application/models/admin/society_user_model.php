<?php

class society_user_model extends CI_Model {



	public function __construct()

	{

		$this->load->database();

	}

	

	 public function all_society_user($start,$limit)

	  { 

		$this->db->select('*');
		$this->db->From('ci_users');	
		
		
		if(isset($_GET['search_text']) && $_GET['search_text'] !=''){
		$s = $_GET['search_text'];

		$where = " utype='4' AND  (fname='$s' OR lname='$s' OR mobile='$s' OR email='$s' OR city='$s') ";

		$this->db->where($where,false,false);
		}
		else
		$this->db->where('utype','4');		
		
		$this->db->order_by('id','desc');
		
		$this->db->limit($start,$limit);	
		
     	$query = $this->db->get();

         return  $query->result_array();

		 

    }

	public function getCount(){
	
	
	
		$sql="select * from ci_users  where utype in(4)";
	
		$sql=mysql_query($sql);
		return mysql_num_rows($sql);
	
	
	}

		




	 function updateuserStatus($id,$status)

	 {
 	 

 		$data['status']=$status;
       
	    $this->db->where('id', $id);

        $this->db->update('ci_users', $data); 



		return true;

	 }


	

	

	public function userByid($id)

	 {



	$query = $this->db->get_where('ci_users', array('id' => $id));

   	return $query->row_array();

		 }

		 

	

function adduser()

{
		
		
		$password=md5($_POST['password']);		
		
		$data['lname']=$_POST['name'];
		
		$data['email']=$_POST['email'];
		
		$data['fname']=$_POST['username'];
		
		$data['password']=$password;
		
		$data['mobile']=$_POST['mobile'];
		
		$data['address']=$_POST['address'];
		
		$data['city']=$_POST['city'];
		
		$data['state']=$_POST['state'];
		
		$data['country']=$_POST['country'];
		
		$data['ip'] = $_SERVER['REMOTE_ADDR'];
		
		$data['status']=1;		
		$data['utype']=4;		
		
			
		
		
		$this->db->insert('ci_users', $data);
		
		
		
		return  $this->db->insert_id();
		
		
		
		
		
		}

		 

 public function update()

 {

	  		 $password=$this->input->post('password', TRUE);
		
		 if($password !=''){
			$password = md5($password);
			$data['password'] = $password;
		 }	 

			$data['lname']=$_POST['name'];

			$data['email']=$_POST['email'];

			$data['fname']=$_POST['username'];		

			$data['mobile']=$_POST['mobile'];

			$data['address']=$_POST['address'];

			$data['city']=$_POST['city'];

			$data['state']=$_POST['state'];

			$data['country']=$_POST['country'];

			$data['ip']=$_SERVER['REMOTE_ADDR'];

			//$data['status']=$_POST['status'];

			$id=$_POST['id'];


	$this->db->where('id', $id);

    $this->db->update('ci_users', $data); 





return true;

		 }

		 

	


	 

	   

	    

	  

		   

		   

		   

		   

		function logout()

		 {

  		$data1['logout_time']=date('Y-m-d H:i:s');

		$this->db->where('id', $this->session->userdata('userid'));

        $this->db->update('ci_users', $data1);

		$this->session->sess_destroy();

  		 }

		 

		 		   

		function activity($act)

		 {



			$data=array(

			'userid'=>$this->session->userdata('admin_id'),

			'username'=>$this->session->userdata('fname'),

			'utype'=>$this->session->userdata('utype'),

			'activity'=>$act,

			'status'=>'1'

			);

			

			$query=$this->db->insert('ci_logs',$data);  

			 

			 

  		 }

		 

		 function fgetactivity()

		  {

			  $start=0;

   			  $limit=25; 

			 if(@$_REQUEST['start']!=NULL && @$_REQUEST['act']=='act')

			   {

				    $start=$_REQUEST['start'];

	  			  $limit=25; 

				   }

				   



			  

			 $this->db->select('a.*,b.fname'); 

			 $this->db->from('ci_flogs as a'); 

			 $this->db->join('ci_users as b','a.userid=b.id');

             $this->db->order_by("a.id", "desc");

             $this->db->limit($limit, $start);



              $query = $this->db->get();

              return  $query->result_array();

	 }

          function agetactivity()

		  {

			  

  			  $limit=25; $start=0;

			  

			 if(@$_REQUEST['start']!=NULL && @$_REQUEST['act']=='sact')

			   {

				    $start=$_REQUEST['start'];

	  			  $limit=25; 

				   }

			  

			 $this->db->select('a.*,b.fname'); 

			 $this->db->from('ci_logs as a'); 

			  $this->db->join('ci_users as b','a.userid=b.id');

             $this->db->order_by("a.id", "desc");

             $this->db->limit($limit, $start);



              $query = $this->db->get();

              return  $query->result_array();

			  

		 }

		  function tranactionlog()

		  {

   			  $limit=25; $start=0;

			  

			 if(@$_REQUEST['start']!=NULL && @$_REQUEST['act']=='tact')

			   {

				    $start=$_REQUEST['start'];

	  			  $limit=25; 

				   }



			  $this->db->select('a.*,b.address as proaddress');

			  $this->db->from('ci_transaction as a');

			  $this->db->join('ci_propertys as b','a.propertyid=b.id');

              $this->db->order_by("a.id", "desc");

              $this->db->limit($limit, $start);



              $query = $this->db->get();

              return  $query->result_array();

			  

		 }

		 

		 public function get_transaction($id = FALSE)

		{

		

			

			$this->db->select('a.*,b.address as baddress');

			$this->db->from('ci_transaction as a');

			$this->db->join('ci_propertys as b','a.propertyid=b.id');

			$this->db->where('a.id',$id);

			$query=$this->db->get();

			return $query->row_array();

		}

		 

				 



	

}