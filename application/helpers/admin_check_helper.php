<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
function logged_in()
{
    $CI =& get_instance();
    if( $CI->session->userdata('userid')==NULL)
		  {
			redirect(base_url().'home');
		  }  
   
}
function filter_search(){
	 $CI =& get_instance();
	$total_seg=$CI->uri->total_segments();
	if(isset($_REQUEST['search'])){
	$CI->session->set_userdata('search',trim($_REQUEST['search']));
	
	}
	elseif($total_seg >=3 && $CI->session->userdata('search') !=''){
	
	
	
	}
	elseif( $CI->session->userdata('search') !='' && $CI->uri->segment(2)=='index'){
	
	
	
	}
	else
	$CI->session->unset_userdata('search');
	
	
	}


function getproperty_name_id($id){

	$CI =& get_instance();
    $CI->db->select('address');
    $CI->db->from('ci_propertys');
    $CI->db->where('id',$id);
    $CI->db->where('status', 1);
    
    $result = $CI->db->get();
  if ($result->num_rows() > 0)
{

 
    
    return $result->row()->address;
	}
	else
	return ;
    
}



function get_user_details($id){

	$CI =& get_instance();
    $CI->db->select('*');
    $CI->db->from('ci_users');
    $CI->db->where('id',$id);
    $CI->db->where('status', 1);
    
    $result = $CI->db->get();
  if ($result->num_rows() > 0)
{
 
    
    return $result->row();
	}
	else
	return array() ;
    
}



function getsociety_name_id($id){


$CI =& get_instance();
    $CI->db->select('society_title');
    $CI->db->from('ci_society');
    $CI->db->where('id',$id);
    $CI->db->where('status', 1);
    
    $result = $CI->db->get();
  if ($result->num_rows() > 0)
{
    
    return $result->row()->society_title;
	}
	else
	return ;
}

function getsociety_name_user_id($id){


$CI =& get_instance();
    $CI->db->select('society_title');
    $CI->db->from('ci_society');
    $CI->db->where('society_user_id',$id);
    $CI->db->where('status', 1);
    
    $result = $CI->db->get();
  if ($result->num_rows() > 0)
{
    
    return $result->row()->society_title;
	}
	else
	return ;
}



function check_in()
{
    $CI =& get_instance();
    
    if (($CI->session->userdata('utype') == 1 || $CI->session->userdata('utype') == 2 || $CI->session->userdata('utype') == 4) && $CI->session->userdata('admin_id')!=NULL) {
        return TRUE;
    } else {
        //$data['msg']="Please Login to Continue!";
        //$CI->session->set_userdata('msg', $data['msg']);
        $url = $CI->config->item('base_url') . "admin/login";
        @header("Location:" . $url);
        
    }
    
    return FALSE;
}


?>