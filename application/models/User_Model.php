<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends MY_Model {

	public function __construct() {
		parent::__construct();
	}

	public function user_check($username, $password) {
		$where = "(`username` = '$username' OR `user_email` = '$username' OR `user_mobile` = '$username' OR `user_id` = '$username') AND `password` = '$password'";
		$query = $this->db->select('*')
				 ->where($where)
				 ->get('shop_all_users');
		if($query->num_rows() == 1)
			return $query->row();
		return FALSE;
	}

}
