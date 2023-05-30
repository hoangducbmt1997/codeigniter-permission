<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Role_Model extends CI_Model
{
	public function get_roles()
	{
		return $this->db->get('roles')->result();
	}

	public function get_role($role_id)
	{
		return $this->db->get_where('roles', ['id' => $role_id])->row();
	}

	public function get_name_role($role_id)
	{
		$this->db->select('name');
		$this->db->from('roles');
		$this->db->where('id', $role_id);

		$query = $this->db->get();
		$result = $query->row();

		if ($result) {
			return $result->name;
		}

		return null;
	}


	public function create_role($data)
	{
		$this->db->insert('roles', $data);
		return $this->db->insert_id();
	}

	public function update_role($role_id, $data)
	{
		$this->db->where('id', $role_id);
		$this->db->update('roles', $data);
	}

	public function delete_role($role_id)
	{
		$this->db->where('id', $role_id);
		$this->db->delete('roles');
	}

	public function search_roles_by_time($startTime, $endTime)
	{
		$this->db->select('*');
		$this->db->from('roles');

		$this->db->where('created_at >=', $startTime);
		$this->db->where('created_at <=', $endTime);
		$query = $this->db->get();

		return $query->result();
	}
}
