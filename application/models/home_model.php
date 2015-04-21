<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Home_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function get_cms($id = FALSE)
    {
        if ($id === FALSE) {
            $query = $this->db->get('ci_cms');
            return $query->result_array();
        }
        $query = $this->db->get_where('ci_cms', array(
            'id' => $id
        ));
        return $query->row_array();
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
    public function validate()
    {
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password1'));
        $password = md5($password);
        $this->db->where('email', $username);
        $this->db->where('password', $password);
        $this->db->where('utype', 3);
        $this->db->where('status', 1);
        // Run the query
        $query = $this->db->get('ci_users');
        // Let's check if there are any results
        if ($query->num_rows == 1) {
            // If there is a user, then create session data
            $row  = $query->row();
            $data = array(
                'userid' => $row->id,
                'fname' => $row->fname,
                'lname' => $row->lname,
                'email' => $row->email,
                'full_name' => $row->fname . ' ' . $row->lname,
                'utype' => $row->utype,
                'phone' => $row->mobile,
                'city' => $row->city,
                'state' => $row->state,
                'country' => $row->country,
                'validated' => true
            );
            $this->session->set_userdata($data);
            return 1;
        } else {
            return 0;
        }
    }
    public function pvalidate()
    {
        //	echo '<pre>'; print_r($_POST); exit();
        $username = $this->security->xss_clean($this->input->post('pusername'));
        $password = $this->security->xss_clean($this->input->post('ppassword1'));
        $password = md5($password);
        $this->db->where('email', $username);
        $this->db->where('password', $password);
        $this->db->where('utype', 3);
        $this->db->where('status', 1);
        // Run the query
        $query = $this->db->get('ci_users');
        // Let's check if there are any results
        if ($query->num_rows == 1) {
            $row  = $query->row();
            // If there is a user, then create session data
            $data = array(
                'userid' => $row->id,
                'fname' => $row->fname,
                'lname' => $row->lname,
                'email' => $row->email,
                'utype' => $row->utype,
                'phone' => $row->mobile,
                'city' => $row->city,
                'state' => $row->state,
                'country' => $row->country,
                'validated' => true
            );
            $this->session->set_userdata($data);
            return true;
        }
		else return 0;
    }
    public function validemail($username)
    {
        $this->db->where('email', $username);
        $query = $this->db->get('ci_users');
        if ($query->num_rows == 1) {
            return 1;
        } else {
            return 0;
        }
    }
    public function forgotpass()
    {
        $password1 = rand(99999, 9999999);
        $username  = $this->security->xss_clean($this->input->post('usernameemail'));
        $password  = md5($password1);
        $data      = array(
            'password' => $password
        );
        $this->db->where('email', $username);
        $query   = $this->db->update('ci_users', $data);
        /***************************************************************/
        $to      = $username;
        $subject = "Welcome to Societycoin.com";
        $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forget Password</title>
</head>

<body>
<table width="600" align="center" border="0" cellspacing="5" cellpadding="0" style="font-family:Arial, Helvetica, sans-serif">
  <tr>
    <td><img src="' . frontThemeUrl . 'email/forget_password.jpg" alt="" width="600" height="109" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td></tr>  
  <tr>
    <td><p>Hello! ' . $username . '</p>
      <p>It seems you forgot your login details. A request to find below the your User Name and Password</p>
     <p>User Name: <strong>' . $username . '</strong> </p>
     <p>Password:<strong> ' . $password1 . ' </strong></p>
      <p>Please use the URL below Login In Site</p>
      <p><a href="' . base_url() . '">Clicked here for Login</a></p>
    <p>This link will expire in 24 hours from request</p>
    <p>If you did not initiate this password request, please ignore the message. It\'\s often a good security measure to change your password often and avoid using the same password on several accounts.</p>
    <p>Why you received this notification? It\'\s possible another user entered your email address or username by mistake.</p>
    <p><strong>We hope this Helps!</strong></p>
    <p><strong>The SocietyCoin.com Team</strong></p>
    <p style="color:#060"><a href="http://www.societycoin.com" target="_blank" style="color:#060;">www.societycoin.com</a></p>
    <p><strong>Email: Support@societycoin.com</strong></p>
    <p><strong>( customer service Phone number)</strong><br />
    <span  style="font-size:12px; color:#666; font-style:italic">Copyright &copy; 2013 societycoin, All rights reserved. </span>       </p></td>
  </tr>
  <td><img src="' . frontThemeUrl . 'email/SocietyCoin-logo.png" align="left" width="150" height="128" alt="" title="www.societycoin.com" /></td></tr>
  
</table>
</body>
</html>';
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // More headers
        $headers .= 'From: <admin@societycoin.com>' . "\r\n";
        $headers .= 'Bcc: support@societycoin.com' . "\r\n";
        $headers .= 'Bcc: easydev09@gmail.com' . "\r\n";
        @mail($to, $subject, $message, $headers);
        /*****************************************/
        /***************************************************************/
        return true;
    }
    function activity($act)
    {
        $data  = array(
            'userid' => $this->session->userdata('userid'),
            'username' => $this->session->userdata('fname'),
            'utype' => $this->session->userdata('utype'),
            'activity' => $act,
            'status' => '1'
        );
        $query = $this->db->insert('ci_flogs', $data);
    }
}