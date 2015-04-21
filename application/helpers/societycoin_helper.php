<?php


class Societycoin

{


	public function msg($msgid)

	{


		if ($msgid == 1) {


			return 'Successful';

		} else if ($msgid == 2) {

			return 'Error';

		} else if ($msgid == 4) {

			return '<p>Thank you for connecting with us. We will update you later</p>';

		} else if ($msgid == 5) {

			return '<p>Your request has been sent successfully.</p>';

		} else if ($msgid == 7) {

			return '<p>Your Payment is successfully.</p>';

		} else if ($msgid == 8) {

			return '<p>Thanks ! We will see you soon.</p>';

		} else if ($msgid == 9) {

			return '<p>Thanks ! We will see you soon.</p>';

		} else if ($msgid == 10) {

			return '<p>An email has been sent to your email address. The email contains a new password, Please login with new password and reset your password.</p>';

		} else if ($msgid == 11) {

			return '<p>Reset password failed: Invalid email address</p>';

		} else if ($msgid == 12) {

			return '<p>The email address you entered is already in use or invalid. Please enter another email address.</p>';

		} else if ($msgid == 13) {

			return '<p>An Email has been sent to your email address for verification- Please click on link below if email has not arrived</p>';

		} elseif ($msgid == 14) {

			return '<p>Please Enter Valid Old Password</p>';

		} else {

			return '';

		}


	}


}


function user_has_society($uid = 0)
{

	$CI =& get_instance();
	$CI->db->select('a.id,a.society_title,b.userid,a.chargehead_id,b.id as assid');
	$CI->db->from('ci_society as a');

	$CI->db->join('ci_assign_society as b', 'a.id=b.societyid');
	$CI->db->where('b.userid', $uid);
	$query = $CI->db->get();

	return $query->num_rows();


}


?>