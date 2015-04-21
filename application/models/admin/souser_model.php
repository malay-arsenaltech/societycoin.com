<?php

class Souser_model extends CI_Model {



	public function __construct()

	{

		$this->load->database();

	}

	

	 public function alluserlist1()

	  { 

       	$query = $this->db->get_where('ci_users', array('utype' => '1'));

//       	$query = $this->db->get('ci_users');

         return  $query->result_array();

		 

    }

	public function propertyBysoid($id)

	 {



	$query = $this->db->get_where('ci_propertys', array('societyid' => $id));

   	return $query->result_array();

		 }

		 public function alluserlist2()

	  { 

       	$query = $this->db->get_where('ci_users', array('utype' => '2'));

//       	$query = $this->db->get('ci_users');

         return  $query->result_array();

		 

    }

	

		 public function alluserlist3()

	  { 

	  

	  if($this->session->userdata('utype')==1)

	    {

      	$query = $this->db->get_where('ci_users', array('utype' => '3'));

       	$query = $this->db->get('ci_users');

        return  $query->result_array();

		}else

	  {

      $id=$this->session->userdata('userid');

	  $this->db->select('a.id,c.userid as Soadminid,a.fname,lname,a.email,a.address,a.city,a.state,a.country,a.status');

      $this->db->from('ci_users as a');

	  $this->db->join('ci_property as b', 'a.id=b.userid');	

  	  $this->db->join('ci_socity as c', 'c.id= b.societyid');	

      $where = '(c.userid ='.$id.')';

	  $this->db->where($where);

	  

      $query = $this->db->get();

      return  $query->result_array();

		  }



 

 

		 

    }





	

	

	

	public function userByid($id)

	 {



	$query = $this->db->get_where('ci_users', array('id' => $id));

   	return $query->row_array();

		 }

		 

	public function soadmin()

	 {



	$query = $this->db->get_where('ci_users', array('utype' =>'2' ));

   	return $query->result_array();

		 }

		 

		 

	public function soregister()

	 {



	$query = $this->db->get_where('ci_users', array('utype' =>'3' ));

   	return $query->result_array();

		 }	 

		 

		 

	

	

	function adduser()

	 {

		 

		$desired_length = rand(8, 12); 

$password1=NULL;

  for($length = 0; $length < $desired_length; $length++) {

    //Append a random ASCII character (including symbols)

    $password2 .= chr(rand(32, 126));

  }



 $password=md5($password2); 

		 

	    $data['lname']=$_POST['name'];

        $data['email']=$_POST['email'];

	  $data['fname']=$_POST['username'];

	    $data['password']=$password;

        $data['mobile']=$_POST['mobile'];

	    $data['address']=$_POST['address'];

        $data['city']=$_POST['city'];

	    $data['state']=$_POST['state'];

        $data['country']=$_POST['country'];

		$data['ip']=$_POST['ip'];

		$data['status']=$_POST['status'];

		$data['utype']=$_POST['utype'];

		

	

		



        $this->db->insert('ci_users', $data);

		

		$this->load->library('email');

    	$this->email->from('mahesh.prasad@pageupmedia.com','Admin');

		

		$this->email->to($this->input->post('email'));



		

		$html ='Dear user, please find below the login details of the site as a Rool of "Sub Admin"  User Name: '.$this->input->post('email').' And passwored:'.$password2.' and site url <a href="'.base_url().'" >www.societycoin.co.in</a>';

		

		$this->email->subject($this->input->post('subject'));

		$this->email->message($html);

		

		$this->email->send();

		

		

          return  $this->db->insert_id();





		 }

		 

		 	 function updateuser()

	 {

		 

		 if(@$_POST['password']!=NULL)

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

			$data['ip']=$_POST['ip'];

			$data['status']=$_POST['status'];

			$id=$_POST['id'];

		  }else

		     {

			$data['lname']=$_POST['name'];

			$data['email']=$_POST['email'];

			$data['fname']=$_POST['username'];

			$data['mobile']=$_POST['mobile'];

			$data['address']=$_POST['address'];

			$data['city']=$_POST['city'];

			$data['state']=$_POST['state'];

			$data['country']=$_POST['country'];

			$data['ip']=$_POST['ip'];

			$data['status']=$_POST['status'];

			$id=$_POST['id'];

			 }

	

	

	$this->db->where('id', $id);

    $this->db->update('ci_users', $data); 





return true;

		 }

		 

		 

	 function updateuserStatus()

	 {

		 

		 

 		$data['status']=0;

       	$id=$_REQUEST['uid'];

	



	    $this->db->where('id', $id);

        $this->db->update('ci_users', $data); 



    return true;

	 }



	 function pupdateuserStatus()

	 {

 		$data['status']=1;

		$id=$_REQUEST['uid'];

	    $this->db->where('id', $id);

        $this->db->update('ci_users', $data); 



    return true;

	 }

	 

	 

	   

	    

public function assign()

  {





 for($i=0; $i<count($_POST['societyid']); $i++)

    {

	  

$data=array('userid'=>$this->input->post('userid'),	'societyid'=>$_POST['societyid'][$i],	'status'=>'1'	);



$query=$this->db->insert('ci_assign_society', $data);  





	}



return  $this->db->insert_id();	

	

	  }

	  

	  function removeassign($id)

	   {



       $this->db->where('id', $id);

       $this->db->delete('ci_assign_society'); 

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

			'userid'=>$this->session->userdata('userid'),

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

   			  $limit=10; 

			 if(@$_REQUEST['start']!=0 && @$_REQUEST['act']=='act')

			   {

			    $start=$_REQUEST['start'];

	  			  $limit=10; 

				   }

				   



			  

			 $this->db->select('a.*,b.fname'); 

			 $this->db->from('ci_flogs as a'); 

			 $this->db->join('ci_users as b','a.userid=b.id');

 			 $this->db->join('ci_userpropertys as c','c.userid=b.id');

			 $this->db->where('c.societyid',$this->session->userdata('so_id'));

			 

             $this->db->order_by("a.id", "desc");

             $this->db->limit($limit, $start);



              $query = $this->db->get();

//echo '<pre>'; 			  print_r($query->result_array()); exit();

              return  $query->result_array();

	 }

          function agetactivity()

		  {

			  

  			  $limit=10; $start=0;

			  

			 if(@$_REQUEST['start']!=NULL && @$_REQUEST['act']=='sact')

			   {

				    $start=$_REQUEST['start'];

	  			  $limit=10; 

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

   			  $limit=10; $start=0;

			  

			 if(@$_REQUEST['start']!=NULL && @$_REQUEST['act']=='tact')

			   {

				    $start=$_REQUEST['start'];

	  			  $limit=10; 

				   }



			  $this->db->select('a.*,b.address as proaddress');

			  $this->db->from('ci_transaction as a');

			  $this->db->join('ci_propertys as b','a.propertyid=b.id');

			  $this->db->where('b.societyid',$this->session->userdata('so_id'));

			  

			  

			  

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