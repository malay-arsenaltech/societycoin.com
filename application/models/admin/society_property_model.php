<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Society_Property_Model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function allpropertylist($start = 0, $limit = 25)
    {
        $this->db->select('a.*,s.society_title');
        $this->db->from('ci_propertys as a');
        $this->db->join('ci_society as s', 'a.societyid= s.id');
       
	   if($this->input->get_post('search_text')){
	    $this->db->like('a.address', trim($this->input->get_post('search_text')));
	   }
	   

	   $this->db->where('s.society_user_id', $this->session->userdata('admin_id'));
        $this->db->order_by('a.id', 'DESC');
        $this->db->limit($start, $limit);
        $query = $this->db->get();
        return $query->result_array();
    }
    function getCount()
    {
        $this->db->select('a.*');
        $this->db->from('ci_propertys as a');
        $this->db->join('ci_society as s', 'a.societyid= s.id');
		 if($this->input->post('search_text')){
	    $this->db->like('a.address', trim($this->input->post('search_text')));
	   }
        $this->db->where('s.society_user_id', $this->session->userdata('admin_id'));
        $counts = $this->db->get();
        return $counts->num_rows();
    }
    public function propertyByid($id)
    {
        $query = $this->db->get_where('ci_propertys', array(
            'id' => $id
        ));
        return $query->row_array();
    }
   public  function addproperty()
    {
         $societyid = $_POST['societyid'];
 
		 $state= $this->getSociety_details($societyid,'stateid');
		 $city= $this->getSociety_details($societyid,'cityid');
		 $area= $this->getSociety_details($societyid,'areaid');
		$data=array( 
				'countryid'=>1,  
				'stateid'  =>$state,	
				'cityid'   =>$city,	
				'areaid'    =>$area,
				'societyid'    => $societyid,	
				'address'  =>$_POST['address'],
				'status' =>'1', 
				'ip'    =>$_POST['ip']
			);
        $this->db->insert('ci_propertys', $data);
        return $this->db->insert_id();
    }
	
	
	 public function getSociety_details($sid='',$column=''){
		 
		 
		 $this->db->from('ci_society');
		 $this->db->where('id',$sid);
		 $res=$this->db->get()->row()->$column;
		 return $res;
		 }
	
	
	public function getsociety(){
	
		$this->db->select('p.*');
		$this->db->from('ci_society as p');	 
		$this->db->where('p.society_user_id',$this->session->userdata('admin_id'));
		$query = $this->db->get();
		return $query->result_array();	
	
	}
	
	
   public  function updateproperty()
    {
    $societyid = $_POST['societyid'];
 
 $state= $this->getSociety_details($societyid,'stateid');
 $city= $this->getSociety_details($societyid,'cityid');
 $area= $this->getSociety_details($societyid,'areaid');
$data=array( 
 'countryid'=>1,  'stateid'  =>$state,	  'cityid'   =>$city,	  'areaid'    =>$area,	  'societyid'    => $societyid,	  'address'  =>$_POST['address'],

	 'status' =>'1',  'ip'    =>$_POST['ip']  );

	 
		$id=$_POST['pid'];

    	$this->db->where('id', $id);

        $this->db->update('ci_propertys', $data); 
        return true;
    }
   public function updateuserStatus($id)
    {
        $data['status'] = 0;        
        $this->db->where('id', $id);
        $this->db->update('ci_propertys', $data);
        return true;
    }
    public function pupdateuserStatus($id)
    {
        $data['status'] = 1;        
        $this->db->where('id', $id);
        $this->db->update('ci_propertys', $data);
        return true;
    }
   public function allpropertys($id = FALSE)
    {
        if ($id === FALSE) {
            $query = $this->db->get('ci_proeprtys');
            return $query->result_array();
        }
        $query = $this->db->get_where('ci_propertys', array(
            'id' => $id
        ));
        return $query->row_array();
    }
	
	
	function is_unique_property($sid='',$address='')
    {
          $this->db->select('*');
		 $this->db->from('ci_propertys');
        $this->db->where('societyid', "$sid");
		 $this->db->where('address', "$address");
        $res = $this->db->get();
		
       if( $res->num_rows() > 0)
		return false;
		else
		return true;
		
    }
	
	
	
	
}