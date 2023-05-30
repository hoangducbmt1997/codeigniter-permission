<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Permission_Model extends CI_Model
{
	public function get_permissions()
	{
		return $this->db->get('permissions')->result();
	}

	public function get_permission($permission_id)
	{
		return $this->db->get_where('permissions', ['id' => $permission_id])->row();
	}

	public function get_url_permission($permission_id)
	{
		$this->db->select('url');
		$this->db->from('permissions');
		$this->db->where('id', $permission_id);

		$query = $this->db->get();
		$result = $query->row();

		if ($result) {
			return $result->name;
		}

		return null;
	}


	public function create_permission($data)
	{
		$this->db->insert('permissions', $data);
		return $this->db->insert_id();
	}

	public function update_permission($permission_id, $data)
	{
		$this->db->where('id', $permission_id);
		$this->db->update('permissions', $data);
	}

	public function delete_permission($permission_id)
	{
		$this->db->where('id', $permission_id);
		$this->db->delete('permissions');
	}
	public function search_permissions_by_time($startTime, $endTime)
	{
		$this->db->select('*');
		$this->db->from('permissions');

		$this->db->where('created_at >=', $startTime);
		$this->db->where('created_at <=', $endTime);
		$query = $this->db->get();

		return $query->result();
	}

}
