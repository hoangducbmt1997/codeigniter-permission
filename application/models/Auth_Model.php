<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
class Auth_Model extends CI_Model
{

	public function login($usernameOrEmail, $password)
	{
		$this->db->where('password', $password);
		$this->db->group_start();
		$this->db->where('username', $usernameOrEmail);
		$this->db->or_where('email', $usernameOrEmail);
		$this->db->group_end();
		$query = $this->db->get('users');

		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function remember_login($user_id)
	{
		// Generate login mnemonic token and save to cookie and database
		$token = md5(uniqid(rand(), true));

		// Save token and user_id information in cookie
		$this->input->set_cookie('remember_token', $token, 3600 * 24 * 7); // Cookie lifetime: 1 week

		// Save token and user_id information in database
		$data = array(
			'user_id' => $user_id,
			'token' => $token
		);
		$this->db->insert('remember_login', $data);
	}


	public function remove_remember_token($remember_token)
	{
		$this->db->where('token', $remember_token);
		$this->db->delete('remember_login');
	}


	public function get_user_by_remember_token($remember_token)
	{
		$this->db->where('token', $remember_token);
		$query = $this->db->get('remember_login');

		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
	}
}
