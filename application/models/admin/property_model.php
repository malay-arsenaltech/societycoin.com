<?php
class Property_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function allpropertylist($start = 0, $limit = 25)
    {
        if (@$_POST['task'] == "search") {
            $this->db->distinct();
            $this->db->select('a.address,b.society_title,c.cityname,a.status,a.id');
            $this->db->from('ci_propertys as a');
            $this->db->join('ci_society as b', 'a.societyid= b.id');
            $this->db->join('ci_city as c', 'a.cityid=c.id');
            if (isset($_POST['cityid']) && $_POST['cityid'] != '') {
                $this->db->where('a.cityid', $_POST['cityid']);
            }
            if (isset($_POST['areaid']) && $_POST['areaid'] != '') {
                $this->db->where('a.areaid', $_POST['areaid']);
            }
            if (isset($_POST['societyid']) && $_POST['societyid'] != '') {
                $this->db->where('a.societyid', $_POST['societyid']);
            }
        } else {
            $this->db->distinct();
            $this->db->select('a.address,b.society_title,c.cityname,a.status,a.id');
            $this->db->from('ci_propertys as a');
            $this->db->join('ci_society as b', 'a.societyid= b.id');
            $this->db->join('ci_city as c', 'a.cityid=c.id');
        }
        $this->db->order_by('a.id', 'desc');
        $this->db->limit($start, $limit);
        $query = $this->db->get();
        return $query->result_array();
    }
    function getCount()
    {
        /* 	$where='';
        if(isset($_POST['cityid']) && $_POST['cityid']!=''){
        $c=$_POST['cityid'];
        $where = " where a.cityid=$c";
        }
        
        if(isset($_POST['areaid']) && $_POST['areaid']!=''){
        $a=$_POST['areaid'];
        $where = " where a.areaid=$a";
        }
        if(isset($_POST['societyid']) && $_POST['societyid']!=''){
        $s= $_POST['societyid'];
        $where = " where a.societyid=$s";
        }
        */
        $this->db->select('a.id');
        $this->db->from('ci_propertys as a');
        if (isset($_POST['cityid']) && $_POST['cityid'] != '') {
            $this->db->where('a.cityid', $_POST['cityid']);
        }
        if (isset($_POST['areaid']) && $_POST['areaid'] != '') {
            $this->db->where('a.areaid', $_POST['areaid']);
        }
        if (isset($_POST['societyid']) && $_POST['societyid'] != '') {
            $this->db->where('a.societyid', $_POST['societyid']);
        }
        //$sql="select * from ci_propertys a  $where";
        //$sql=mysql_query($sql);
        $counts = $this->db->get();
        //echo $counts->num_rows();
        return $counts->num_rows();
    }
    function getCountsub()
    {
        $this->db->distinct();
        $this->db->select('a.address,b.society_title,c.cityname,a.status,a.id,d.userid');
        $this->db->from('ci_propertys as a');
        $this->db->join('ci_society as b', 'a.societyid= b.id');
        $this->db->join('ci_city as c', 'a.cityid=c.id');
        $this->db->join('ci_assign_society d', 'b.id=d.societyid');
        if (isset($_POST['cityid']) && $_POST['cityid'] != '') {
            $this->db->where('a.cityid', $_POST['cityid']);
        }
        if (isset($_POST['areaid']) && $_POST['areaid'] != '') {
            $this->db->where('a.areaid', $_POST['areaid']);
        }
        if (isset($_POST['societyid']) && $_POST['societyid'] != '') {
            $this->db->where('a.societyid', $_POST['societyid']);
        }
        $this->db->where('d.userid', $this->session->userdata('admin_id'));
        $counts = $this->db->get();
        return $counts->num_rows();
    }
    public function allsubamdinpropertylist($start = 0, $limit = 25)
    {
        //echo $this->session->userdata('userid');
        $this->db->distinct();
        $this->db->select('a.address,b.society_title,c.cityname,a.status,a.id,d.userid');
        $this->db->from('ci_propertys as a');
        $this->db->join('ci_society as b', 'a.societyid= b.id');
        $this->db->join('ci_city as c', 'a.cityid=c.id');
        $this->db->join('ci_assign_society d', 'b.id=d.societyid');
        $this->db->where('d.userid', $this->session->userdata('admin_id'));
        if (isset($_POST['cityid']) && $_POST['cityid'] != '') {
            $this->db->where('a.cityid', $_POST['cityid']);
        }
        if (isset($_POST['areaid']) && $_POST['areaid'] != '') {
            $this->db->where('a.areaid', $_POST['areaid']);
        }
        if (isset($_POST['societyid']) && $_POST['societyid'] != '') {
            $this->db->where('a.societyid', $_POST['societyid']);
        }
        if (@$_POST['task'] == 'search') {
            //  $this->db->where('a.societyid',$_POST['societyid']);
        }
        $this->db->order_by('a.id', 'desc');
        $this->db->limit($start, $limit);
        $query = $this->db->get();
        //echo '<pre>';	  print_r($query->result_array()); exit();
        return $query->result_array();
    }
    public function propertyByid($id)
    {
        $query = $this->db->get_where('ci_propertys', array(
            'id' => $id
        ));
        return $query->row_array();
    }
    public function subadminSociety()
    {
        $this->db->select('a.id,a.society_title,a.so_name,b.areaname,c.cityname,a.address,a.so_email as email,a.status,a.so_mobile,a.chargehead_id');
        $this->db->from('ci_society as a');
        $this->db->join('ci_area as b', 'b.id=a.areaid');
        $this->db->join('ci_city as c', 'c.id=a.cityid');
        $this->db->join('ci_assign_society as d', 'a.id=d.societyid');
        $this->db->where('d.userid', $this->session->userdata('admin_id'));
        $query = $this->db->get();
        return $query->result_array();
    }
    function addproperty()
    {
        if ($this->session->userdata('utype') == 1) {
            $data = array(
                'countryid' => $_POST['countryid'],
                'stateid' => $_POST['stateid'],
                'cityid' => $_POST['cityid'],
                'areaid' => $_POST['areaid'],
                'societyid' => $_POST['societyid'],
                'address' => trim($_POST['address']),
                'status' => '1',
                'ip' => $_POST['ip']
            );
        } else {
            $societyid = $_POST['societyid'];
            $state     = $this->getSociety_details($societyid, 'stateid');
            $city      = $this->getSociety_details($societyid, 'cityid');
            $area      = $this->getSociety_details($societyid, 'areaid');
            $data      = array(
                'countryid' => 1,
                'stateid' => $state,
                'cityid' => $city,
                'areaid' => $area,
                'societyid' => $societyid,
                'address' => $_POST['address'],
                'status' => '1',
                'ip' => $_POST['ip']
            );
        }
        $this->db->insert('ci_propertys', $data);
        return $this->db->insert_id();
    }
    public function getSociety_details($sid = '', $column = '')
    {
        $this->db->from('ci_society');
        $this->db->where('id', $sid);
        $res = $this->db->get()->row()->$column;
        return $res;
    }
    function updateproperty()
    {
        $data = array(
            'countryid' => $_POST['countryid'],
            'stateid' => $_POST['stateid'],
            'cityid' => $_POST['cityid'],
            'areaid' => $_POST['areaid'],
            'societyid' => $_POST['societyid'],
            'address' => $_POST['address'],
            'status' => '1'
        );
        $id   = $_POST['id'];
        $this->db->where('id', $id);
        $this->db->update('ci_propertys', $data);
        return true;
    }
    function subadmin_property_update()
    {
        $societyid = $_POST['societyid'];
        $state     = $this->getSociety_details($societyid, 'stateid');
        $city      = $this->getSociety_details($societyid, 'cityid');
        $area      = $this->getSociety_details($societyid, 'areaid');
        $data      = array(
            'countryid' => 1,
            'stateid' => $state,
            'cityid' => $city,
            'areaid' => $area,
            'societyid' => $societyid,
            'address' => $_POST['address'],
            'status' => '1',
            'ip' => $_POST['ip']
        );
        $id        = $_POST['pid'];
        $this->db->where('id', $id);
        $this->db->update('ci_propertys', $data);
    }
    function updateuserStatus($id)
    {
        $data['status'] = 0;
        $this->db->where('id', $id);
        $this->db->update('ci_propertys', $data);
        return true;
    }
    function pupdateuserStatus($id)
    {
        $data['status'] = 1;
        $this->db->where('id', $id);
        $this->db->update('ci_propertys', $data);
        return true;
    }
    function allpropertys($id = FALSE)
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