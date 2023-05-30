<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class User_Model extends CI_Model
{

	public function get_all_users()
	{
		$this->db->where('is_deleted', '0');
		$query = $this->db->get('users');
		return $query->result();
	}

	public function get_full_users()
	{
		$query = $this->db->get('users');
		return $query->result();
	}

	public function create_user($user_data)
	{
		$this->db->insert('users', $user_data);
		return $this->db->insert_id();
	}


	public function get_image_user($user_id)
	{
		$this->db->select('image');
		$this->db->where('is_deleted', '0');
		$this->db->where('id', $user_id);
		$query = $this->db->get('users');
		return $query->result();
	}


	// Soft delete
	public function soft_delete_user($user_id)
	{
		$data = array(
			'is_deleted' => TRUE
		);
		$this->db->where('id', $user_id);
		$this->db->update('users', $data);
	}

	// Hard delete
	public function delete_user($user_id)
	{
		$this->db->where('id', $user_id);
		$this->db->delete('users');
	}

	public function update_user($user_id, $user_data)
	{
		$this->db->where('id', $user_id);
		$this->db->update('users', $user_data);
	}

	public function get_user_by_id($user_id)
	{
		$this->db->where('id', $user_id);
		$query = $this->db->get('users');

		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return null;
		}
	}

	public function get_user_name_by_id($user_id)
	{
		$this->db->select('username');
		$this->db->where('id', $user_id);
		return $this->db->get('users');
	}


	public function get_user_role($user_id)
	{
		$this->db->select('r.name');
		$this->db->from('user_roles ur');
		$this->db->join('roles r', 'ur.role_id = r.id');
		$this->db->where('ur.user_id', $user_id);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$row = $query->row();
			return $row->name;
		} else {
			return null;
		}
	}
	public function search_users_by_time($startTime, $endTime)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('created_at >=', $startTime);
		$this->db->where('created_at <=', $endTime);
		$query = $this->db->get();

		return $query->result();
	}


}
