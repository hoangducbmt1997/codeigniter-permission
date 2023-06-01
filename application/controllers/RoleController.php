<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
use Carbon\Carbon;

class RoleController extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Role_Model');
		$this->load->model('Permission_Model');
		$this->load->model('Role_Permissions_Model');

	}

	// View list role
	public function index()
	{
		if (!check_access('role_list')) {
			redirect(base_url('403'));
		}

		if ($this->session->flashdata('sweet_alert')) {
			$this->data['sweet_alert'] = $this->session->flashdata('sweet_alert');
			$this->session->unset_userdata('sweet_alert');
		}

		$roles = $this->Role_Model->get_roles();
		$this->data['title'] = $this->lang->line('sidebar_role');
		$this->data['roles'] = $roles;
		$this->data['content'] = 'admin/roles/index';
		$this->data['js'] = 'admin/roles/js';
		$this->load->view('admin_layout/layout', $this->data);
	}

	// View create role
	public function create()
	{

		if (!check_access('role_add')) {
			redirect(base_url('403'));
		}

		$this->data['content'] = 'admin/roles/create';
		$this->load->view('admin_layout/layout', $this->data);
	}

	// Function add role
	public function store()
	{
		$this->form_validation->set_rules('name', 'Name Role', 'required|min_length[3]|callback_validate_role');

		if ($this->form_validation->run() == true) {

			$user_data = array(
				'name' => $this->input->post('name'),
			);
			// Save data
			$role_id = $this->Role_Model->create_role($user_data);

			$this->session->set_flashdata(
				'sweet_alert',
				array(
					'title' => 'Success',
					'text' => 'Role added successfully!',
					'type' => 'success'
				)
			);

			return redirect(base_url('roles'));

		} else {
			$this->create();
		}
	}

	// View edit role
	public function edit($role_id)
	{

		if (!check_access('role_edit')) {
			redirect(base_url('403'));
		}

		$role = $this->Role_Model->get_role($role_id);
		$this->data['role'] = $role;
		$this->data['content'] = 'admin/roles/edit';
		$this->load->view('admin_layout/layout', $this->data);
	}

	// Function update role

	public function update($role_id)
	{
		$this->form_validation->set_rules('name', 'Name Role', 'min_length[3]|callback_validate_role');

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			if ($this->form_validation->run() == true) {
				// Get data
				$role_data = [
					'name' => $this->input->post('name'),
				];

				// Update data
				$this->Role_Model->update_role($role_id, $role_data);

				$this->session->set_flashdata(
					'sweet_alert',
					array(
						'title' => 'Success',
						'text' => 'Role updated successfully!',
						'type' => 'success'
					)
				);

				// Redirect to success page
				return redirect(base_url('roles'));
			} else {
				// Display an error message and redirect to the old page
				return redirect(base_url('roles/edit/' . $role_id));
			}
		} else {
			// Redirect to success different page if request not is POST
			return redirect(base_url('dashboard'));
		}
	}

	// Function delete role

	public function delete($role_id)
	{

		if (!check_access('role_delete')) {
			redirect(base_url('403'));
		}

		// Delete role
		$this->Role_Model->delete_role($role_id);

		$this->session->set_flashdata(
			'sweet_alert',
			array(
				'title' => 'Success',
				'text' => 'Role deleted successfully!',
				'type' => 'success'
			)
		);

		return redirect(base_url('roles'));
	}

	public function edit_role_permissions($role_id)
	{
		if (!check_access('role_permissions')) {
			redirect(base_url('403'));
		}

		// Get data role
		$role = $this->Role_Model->get_role($role_id);

		// Get list roles of user
		$assigned_permissions = $this->Role_Permissions_Model->get_permissions_by_role_id($role_id);

		// Get list permissions
		$all_permissions = $this->Permission_Model->get_permissions();

		// View edit roles cho user
		$this->data = array(
			'role_action' => array(),
			'user_action' => array(),
			'permissions_action' => array(),
		);

		foreach ($all_permissions as $permission) {
			$action = $permission->action;
			$permission_id = $permission->id;
			if (strpos($action, 'role_') === 0 && $action !== 'role_') {
				$this->data['role_action'][] = [
					'action' => $action,
					'permission_id' => $permission_id
				];
			} elseif (strpos($action, 'user_') === 0 && $action !== 'user_') {
				$this->data['user_action'][] = [
					'action' => $action,
					'permission_id' => $permission_id
				];
			} elseif (strpos($action, 'permission_') === 0 && $action !== 'permission_') {
				$this->data['permissions_action'][] = [
					'action' => $action,
					'permission_id' => $permission_id
				];
			}
		}
		

		// Data to view
		// View edit roles cho user
		$this->data['role'] = $role;
		// View edit roles cho user
		$this->data['assigned_permissions'] = $assigned_permissions;
		// View edit roles cho user
		$this->data['all_permissions'] = $all_permissions;

		// View edit roles cho user
		$this->data['content'] = 'admin/roles/edit_permissions';
		$this->load->view('admin_layout/layout', $this->data);
	}

	public function update_permissions_role()
	{

		// Get data
		$role_id = $this->input->post('role_id');
		$selected_permissions = $this->input->post('selected_permissions');

		if ($selected_permissions != 0) {
			// Update permissions for role 
			$this->Role_Permissions_Model->update_permissions_for_role($role_id, $selected_permissions);
		}
		$this->session->set_flashdata(
			'sweet_alert',
			array(
				'title' => 'Success',
				'text' => 'Action permissions update successful!',
				'type' => 'success'
			)
		);
		redirect(base_url('/roles'));
	}

	// Function validate role
	public function validate_role($role)
	{
		if (preg_match('/^[a-zA-Z_]+(?:_[a-zA-Z_]+)*[a-zA-Z]+$/', $role) && !preg_match('/\d/', $role)) {
			return true;
		} else {
			$this->form_validation->set_message('validate_role', 'The {field} field must be a valid role format (no spaces, no trailing underscore, alphanumeric with optional underscores, no numbers, no underscore at the end)');
			return false;
		}
	}

	public function search_role_by_time(){

		$start_time = $this->input->post('start_date');
		$end_time = $this->input->post('end_date');


		$start_time = date('Y-m-d H:i:s', strtotime($start_time));
		$end_time = date('Y-m-d H:i:s', strtotime($end_time));
		
		$roles = $this->Role_Model->search_roles_by_time($start_time, $end_time);

		$data['search_result'] = $roles;
		$this->load->view('admin/roles/search_result', $data);
	}


}
