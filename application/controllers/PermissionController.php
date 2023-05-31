<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
use Carbon\Carbon;

class PermissionController extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Permission_Model');
	}

	// View list permission
	public function index()
	{
		if (!check_access('permission_list')) {
			redirect(base_url('403'));
		}

		if ($this->session->flashdata('sweet_alert')) {
			$this->data['sweet_alert'] = $this->session->flashdata('sweet_alert');
			$this->session->unset_userdata('sweet_alert');
		}

		$permissions = $this->Permission_Model->get_permissions();
		$this->data['permissions'] = $permissions;
		$this->data['content'] = 'admin/permissions/index';
		$this->data['js'] = 'admin/permissions/js';
		$this->load->view('admin_layout/layout', $this->data);
	}

	// View create permission
	public function create()
	{
		if (!check_access('permission_add')) {
			redirect(base_url('403'));
		}
		$this->data['content'] = 'admin/permissions/create';
		$this->load->view('admin_layout/layout', $this->data);
	}

	// Function add permission
	public function store()
	{

		$this->form_validation->set_rules('action', 'permission', 'required|min_length[3]|callback_validate_action');

		if ($this->form_validation->run() == true) {

			$user_data = array(
				'action' => $this->input->post('action'),
			);
			// Save data
			$permission_id = $this->Permission_Model->create_permission($user_data);

			$this->session->set_flashdata('sweet_alert', array(
				'title' => 'Success',
				'text' => 'Permission added successfully!',
				'type' => 'success'
			)
			);

			return redirect(base_url('permissions'));

		} else {
			$this->create();
		}
	}

	// View edit permission
	public function edit($permission_id)
	{

		if (!check_access('permission_edit')) {
			redirect(base_url('403'));
		}

		$permission = $this->Permission_Model->get_permission($permission_id);
		$this->data['permission'] = $permission;
		$this->data['content'] = 'admin/permissions/edit';
		$this->load->view('admin_layout/layout', $this->data);
	}

	// Function update permission

	public function update($permission_id)
	{
		$this->form_validation->set_rules('action', 'action permission', 'required|min_length[3]|callback_validate_action');

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			if ($this->form_validation->run() == true) {
				// Get data
				$permission_data = [
					'action' => $this->input->post('action'),
				];

				// Update data
				$this->Permission_Model->update_permission($permission_id, $permission_data);

				$this->session->set_flashdata('sweet_alert', array(
					'title' => 'Success',
					'text' => 'Permission updated successfully!',
					'type' => 'success'
				)
				);

				// Redirect to success permission
				return redirect(base_url('permissions'));
			} else {
				// Display an error message and redirect to the old permission
				$this->edit($permission_id);
			}
		} else {
			// Redirect to success different permission if request not is POST
			return redirect(base_url('dashboard'));
		}
	}

	// Function delete permission

	public function delete($permission_id)
	{

		if (!check_access('permission_delete')) {
			redirect(base_url('403'));
		}

		// Delete permission
		$this->Permission_Model->delete_permission($permission_id);

		$this->session->set_flashdata('sweet_alert', array(
			'title' => 'Success',
			'text' => 'Permission deleted successfully!',
			'type' => 'success'
		)
		);

		return redirect(base_url('permissions'));
	}


	// Function validate action

	public function validate_action($action)
	{
		if (preg_match('/^[a-zA-Z_]+(?:_[a-zA-Z_]+)*[a-zA-Z]+$/', $action) && !preg_match('/\d/', $action)) {
			return true;
		} else {
			$this->form_validation->set_message('validate_action', 'The {field} field must be a valid action format (no spaces, no trailing underscore, alphanumeric with optional underscores, no numbers, no underscore at the end)');
			return false;
		}
	}

	public function search_permission_by_time(){

		$start_time = $this->input->post('start_date');
		$end_time = $this->input->post('end_date');

		$start_time = date('Y-m-d H:i:s', strtotime($start_time));
		$end_time = date('Y-m-d H:i:s', strtotime($end_time));


		
		$permissions = $this->Permission_Model->search_permissions_by_time($start_time, $end_time);

		$data['search_result'] = $permissions;
		$this->load->view('admin/permissions/search_result', $data);
	}


}
