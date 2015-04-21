<?php

class Login_model extends CI_Model {



	public function __construct()

	{

		$this->load->database();

	}
		function check_first_login(){

		$this->db->where('id',$this->session->userdata('admin_id'));

        $query = $this->db->get('ci_users');


        if($query->num_rows == 1){
		 $ltime =  $query->row()->logout_time;
		if($ltime == '') return true;
		
		else return false;
		
		}
		return false;

		}
	

	 public function validate(){

		 

		 

        // grab user input

         $username = $this->security->xss_clean($this->input->post('username'));

         $password = $this->security->xss_clean($this->input->post('password'));

         $password=md5($password);

        // Prep the query

        $this->db->where('username', $username);

        $this->db->where('password', $password);

		$this->db->where('status', '1');

  //  	$this->db->where('utype', '2');

		$where = '(utype=1 or utype=2 or utype=4)';

		$this->db->where($where);

		

        // Run the query

        $query = $this->db->get('ci_users');

		

        // Let's check if there are any results

        if($query->num_rows == 1)

        {

            // If there is a user, then create session data

            $row = $query->row();

            $data = array(

                    'admin_id' => $row->id,

                    'admin_fname' => $row->fname,

                    'email' => $row->email,

					'admin_lname'  =>$row->lname,

					'utype'  =>$row->utype,					

                    'validated' => true

                    );

            $this->session->set_userdata($data);





 		//$data1['login_time']=date('Y-m-d H:i:s');
		$this->db->set('login_time','NOW()', FALSE);
		$this->db->where('id', $this->session->userdata('admin_id'));

        $this->db->update('ci_users');

		





          return true;

        }

        // If the previous process did not validate

        // then return false.

        return false;

    }

	

			

	

	 public function sovalidate()

	 {

		 

		 

        // grab user input

         $username = $this->security->xss_clean($this->input->post('username'));

         $password = $this->security->xss_clean($this->input->post('password'));

         $password=md5($password);

        // Prep the query

        $this->db->where('so_email', $username);

        $this->db->where('so_password', $password);

        $this->db->where('status', 1);

	

        // Run the query

        $query = $this->db->get('ci_society');

		

        // Let's check if there are any results

        if($query->num_rows == 1)

        {

            // If there is a user, then create session data

            $row = $query->row();

            $data = array( 

                    'so_id' => $row->id,

                    'society_title' => $row->society_title,

                    'so_name' => $row->so_name,

					'so_email'  =>$row->so_email,

					'so_mobile'  =>$row->so_mobile					

                    );

            $this->session->set_userdata($data);

			

//          	print_r($this->session->all_userdata()); exit();



          return true;

        }

        // If the previous process did not validate

        // then return false.

        return false;

    }

	



	

}