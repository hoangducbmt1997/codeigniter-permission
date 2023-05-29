<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Role_Permissions_Model extends CI_Model {

	public function get_permissions_by_role_id($role_id) {
        $this->db->select('permissions.*');
        $this->db->from('role_permissions');
        $this->db->join('permissions', 'role_permissions.permission_id = permissions.id');
        $this->db->where('role_permissions.role_id', $role_id);

        $query = $this->db->get();
        return $query->result();
    }

	public function update_permissions_for_role($role_id, $selected_permissions) {
       
		// Delete old records for roles
        $this->db->where('role_id', $role_id);
        $this->db->delete('role_permissions');

        // Add new records for the role
        if (!empty($selected_permissions)) {
            $data = array();
            foreach ($selected_permissions as $permission_id) {
                $data[] = array(
                    'role_id' => $role_id,
                    'permission_id' => $permission_id
                );
            }
            $this->db->insert_batch('role_permissions', $data);
        }
    }
}
?>
