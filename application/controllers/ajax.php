<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class ajax extends CI_Controller
{
    
    
    
    public function __construct()
    {
        
        parent::__construct();
        
        $this->load->model('ajax_model');
        
    }
    
    
    
    function index()
    {
        
        
    }
    
    
    
    
    function getPropertiesBySocietyId($society_id ='')
    {
	
	
        
        if ($society_id !='') {
            
            $properties = $this->ajax_model->getPropertiesBySocietyId($society_id);
                        
        }
        
        else {
            $properties = array();
            
        }
        
        $html=' <option value="">Select Address</option>';
        
        foreach ($properties as $property) {
            
            $html .= '<option value="' . $property['id'] . '" >' . $property['address'] . '</option>';
            
        }
        
       
        
        
        
        print $html;
        
    }
    
    
    
       function getSociety($society_id = 0)
    {
        
        
		 $society = $this->ajax_model->getSociety();
		$html = '';
		if(count( $society) > 0){
	
		$html .= '{"query": "Unit",  "suggestions": [';
		foreach($society AS $v){
		
		
   
    
   
       $html .= '{ "value": "'.$v['society_title'].'", "data": "'.$v['id'].'" },';
        
   
}
		  $html .= '{ "value": "", "data": "" }';
		
		$html .=' ]}';
		}
		
		echo $html;
    }
    
    
    
    
    
       function getcity($state = '')
    {
        $state = $this->input->post('state');
        
		 $citylist = $this->ajax_model->getcity( $state);
		$html = '';
		if(count( $citylist) > 0){
	
		  $html=' <option value="">Select City</option>';
		foreach($citylist AS $c){
		   
        
      
            
            $html .= '<option value="' . $c['cityname'] . '" >' . $c['cityname'] . '</option>';
            
      }
        
		}
		
		echo $html;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}