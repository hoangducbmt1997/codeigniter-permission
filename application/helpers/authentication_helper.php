<?php
defined('BASEPATH') or exit('No direct script access allowed');


if (!function_exists('check_login')) {
	function check_login()
	{
		$CI = &get_instance();
		if (!$CI->session->userdata('user_logged')) {
			redirect(base_url('/login'));
		}
	}
}


if (!function_exists('check_access')) {
	function check_access($permission_action)
	{
		$CI = &get_instance();

		$user_id = $CI->session->userdata('user_logged')['id'];

        $CI->load->model('User_Model');

        // Check if user is "super_admin"
        $user_role = $CI->User_Model->get_user_role($user_id);

        if ($user_role == 'super_admin') {
            return true; // Allow access for "super_admin"
        }

		// Check access based on user_id
		$CI->db->select('permissions.action');
		$CI->db->from('user_roles');
		$CI->db->join('role_permissions', 'user_roles.role_id = role_permissions.role_id');
		$CI->db->join('permissions', 'role_permissions.permission_id = permissions.id');
		$CI->db->where('user_roles.user_id', $user_id);
		$CI->db->where('permissions.action', $permission_action);
		$query = $CI->db->get();

		if ($query->num_rows() > 0) {
			return true; // Having permission to access
		}

		return false; // No Access
	}
}


?>
