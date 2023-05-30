<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class User_Role_Model extends CI_Model {

	public function get_roles_by_user_id($user_id) {
        $this->db->select('roles.*');
        $this->db->from('roles');
        $this->db->join('user_roles', 'user_roles.role_id = roles.id');
        $this->db->where('user_roles.user_id', $user_id);

        $query = $this->db->get();
        return $query->result();
    }

	public function update_role_for_user($user_id, $selected_role) {

		// Delete current role of user in user_roles table
		$this->db->where('user_id', $user_id);
		$this->db->delete('user_roles');
	
		// Add new role for user in user_roles table
		if (!empty($selected_role)) {
			$data = array(
				'user_id' => $user_id,
				'role_id' => $selected_role
			);
			$this->db->insert('user_roles', $data);
		}
	}
}
?>
