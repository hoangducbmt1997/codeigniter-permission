<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;


class UserController extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('User_Model');
		$this->load->model('User_Role_Model');
		$this->load->model('Role_Model');

		$config['upload_path'] = './uploads/admin/users';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = 2048;
		$this->load->library('upload', $config);
	}

	// View list user
	public function index()
	{

		if (!check_access('user_list')) {
			redirect(base_url('403'));
		}

		if ($this->session->flashdata('sweet_alert')) {
			$this->data['sweet_alert'] = $this->session->flashdata('sweet_alert');
			$this->session->unset_userdata('sweet_alert');
		}

		$users = $this->User_Model->get_all_users();
		$this->data['users'] = $users;
		$this->data['content'] = 'admin/users/index';
		$this->data['js'] = 'admin/users/js';
		$this->load->view('admin_layout/layout', $this->data);
	}

	// View create user
	public function create()
	{

		if (!check_access('user_add')) {
			redirect(base_url('403'));
		}

		$this->data['content'] = 'admin/users/create';
		$this->load->view('admin_layout/layout', $this->data);
	}

	// Function add user
	public function store()
	{
		$this->form_validation->set_rules('username', 'username', 'required|min_length[3]');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'password', 'required|min_length[6]');
		$this->form_validation->set_rules('re_password', 'confirm password', 'required|matches[password]');
		$this->form_validation->set_rules('image', 'Image', 'callback_validate_image');

		if ($this->form_validation->run() == true) {

			if ($this->upload->do_upload('image')) {

				// Get data file uploaded
				$upload_data = $this->upload->data();
				$image_name = $upload_data['file_name'];

				$user_data = array(
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					'password' => md5($this->input->post('password')),
					'image' => $image_name,
				);

				// Save data
				$user_id = $this->User_Model->create_user($user_data);

				$this->session->set_flashdata(
					'sweet_alert',
					array(
						'title' => 'Success',
						'text' => 'User added successfully!',
						'type' => 'success'
					)
				);

				return redirect(base_url('users'));
			} else {
				// Handling when an error occurs during file upload
				echo $error = $this->upload->display_errors();
				// Error handling or navigation to another page
			}

		} else {
			$this->create();
		}
	}

	// View edit user
	public function edit($user_id)
	{

		if (!check_access('user_edit')) {
			redirect(base_url('403'));
		}

		$user = $this->User_Model->get_user_by_id($user_id);
		$this->data['user'] = $user;
		$this->data['content'] = 'admin/users/edit';
		$this->load->view('admin_layout/layout', $this->data);
	}

	// Function update user

	public function update($user_id)
	{
		$this->form_validation->set_rules('username', 'Username', 'min_length[3]');
		$this->form_validation->set_rules('email', 'Email', 'valid_email');
		$this->form_validation->set_rules('password', 'Password', 'min_length[6]');
		$this->form_validation->set_rules('re_password', 'Confirm Password', 'matches[password]');
		$this->form_validation->set_rules('image', 'Image', 'callback_validate_image');

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			if ($this->form_validation->run() == true) {
				// Get data
				$user_data = [
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
				];

				// Check if a new file has been uploaded
				if (!empty($_FILES['image']['name'])) {
					// Get info user
					$user = $this->User_Model->get_user_by_id($user_id);

					if (!empty($user->image)) {
						// Delete old image
						$old_image_path = './uploads/admin/users/' . $user->image;
						if (file_exists($old_image_path)) {
							unlink($old_image_path);
						}
					}

					// Start uploading new photos
					if ($this->upload->do_upload('image')) {
						// Save new image file name
						$upload_data = $this->upload->data();
						$image_name = $upload_data['file_name'];
						$user_data['image'] = $image_name;
					} else {
						//  Display error
						$error = $this->upload->display_errors();

						$this->session->set_flashdata(
							'sweet_alert',
							array(
								'title' => 'Error',
								'text' => $error,
								'type' => 'error'
							)
						);
						redirect(base_url('users/edit'));
					}
				}

				// Check entered a new password
				if (!empty($this->input->post('password'))) {
					$user_data['password'] = md5($this->input->post('password'));
				}

				// Update data
				$this->User_Model->update_user($user_id, $user_data);

				$this->session->set_flashdata(
					'sweet_alert',
					array(
						'title' => 'Success',
						'text' => 'User updated successfully!',
						'type' => 'success'
					)
				);

				// Redirect to success page
				return redirect(base_url('users'));
			} else {
				// Display an error message and redirect to the old page
				return redirect(base_url('users/edit/' . $user_id));
			}
		} else {
			// Redirect to success different page if request not is POST
			return redirect(base_url('dashboard'));
		}
	}

	// Function delete user

	public function delete($user_id)
	{
		if (!check_access('user_delete')) {
			redirect(base_url('403'));
		}

		// Get data user
		$user = $this->User_Model->get_user_by_id($user_id);

		// Check if user is logged in and has "super_admin" role
		$logged_in_user_id = $this->session->userdata('user_logged')['id'];

		$logged_in_user_role = $this->User_Model->get_user_role($logged_in_user_id);

		if ($logged_in_user_id == $user_id && $logged_in_user_role == 'super_admin') {
			$this->session->set_flashdata(
				'sweet_alert',
				array(
					'title' => 'Error',
					'text' => 'You cannot delete your own account!',
					'type' => 'error'
				)
			);
			return redirect(base_url('users/list'));
		}

		// Delete user
		$this->User_Model->soft_delete_user($user_id);

		$this->session->set_flashdata(
			'sweet_alert',
			array(
				'title' => 'Success',
				'text' => 'User deleted successfully!',
				'type' => 'success'
			)
		);

		return redirect(base_url('users'));
	}


	// Function import excel

	public function import()
	{
		// Check if the file has been uploaded or not
		if (!empty($_FILES['excel_file']['name'])) {
			// The path to save the temp file
			$tempFile = $_FILES['excel_file']['tmp_name'];

			try {
				// Load file Excel
				$spreadsheet = IOFactory::load($tempFile);
				$worksheet = $spreadsheet->getActiveSheet();

				// Get data from cells in Excel file (remove column headers)

				$data = [];
				$startRow = 2; // Starting from 2nd line
				$endRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);

				for ($row = $startRow; $row <= $endRow; $row++) {
					$rowData = [];
					for ($col = 1; $col <= $highestColumnIndex; $col++) {
						$cell = $worksheet->getCellByColumnAndRow($col, $row);
						$rowData[] = $cell->getValue();
					}
					$data[] = $rowData;
				}

				// Process data and save to database
				if (!empty($data)) {

					foreach ($data as $row) {
						$id = $row[0];
						$username = $row[1];
						$password = $row[2];
						$email = $row[3];
						$is_deleted = $row[4];
						$created_at = $row[5];
						$updated_at = $row[6];

						$this->db->insert('users', [
							'id' => $id,
							'username' => $username,
							'password' => $password,
							'email' => $email,
							'is_deleted' => $is_deleted,
							'created_at' => $created_at,
							'updated_at' => $updated_at
						]);
					}

					$this->session->set_flashdata(
						'sweet_alert',
						array(
							'title' => 'Success',
							'text' => 'Import users successfully!',
							'type' => 'success'
						)
					);

					// Data imported successfully
					redirect(base_url('users/list'));

				} else {
					// No data
					$this->session->set_flashdata(
						'sweet_alert',
						array(
							'title' => 'Error',
							'text' => 'No data found in the Excel file.!',
							'type' => 'error'
						)
					);
					redirect(base_url('users/list'));
				}
			} catch (Exception $e) {
				echo 'Error loading file: ' . $e->getMessage();
			}
		} else {
			//No file uploaded.
			$this->session->set_flashdata(
				'sweet_alert',
				array(
					'title' => 'Error',
					'text' => 'No file uploaded!',
					'type' => 'error'
				)
			);
			redirect(base_url('users/list'));

		}
	}

	// Function export excel

	public function export()
	{

		$users = $this->User_Model->get_full_users();

		// Create new object Spreadsheet
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		// Naming columns in Excel files
		$sheet->setCellValue('A1', 'ID');
		$sheet->setCellValue('B1', 'Username');
		$sheet->setCellValue('C1', 'Password');
		$sheet->setCellValue('D1', 'Email');
		$sheet->setCellValue('E1', 'Is Deleted');
		$sheet->setCellValue('F1', 'Created At');
		$sheet->setCellValue('G1', 'Updated At');

		// Set data into cells
		$row = 2;
		foreach ($users as $user) {
			$sheet->setCellValue('A' . $row, $user->id);
			$sheet->setCellValue('B' . $row, $user->username);
			$sheet->setCellValue('C' . $row, $user->password);
			$sheet->setCellValue('D' . $row, $user->email);
			$sheet->setCellValue('E' . $row, $user->is_deleted);
			$sheet->setCellValue('F' . $row, $user->created_at);
			$sheet->setCellValue('G' . $row, $user->updated_at);
			$row++;
		}

		// Create Writer object and export Excel file
		$writer = new Xlsx($spreadsheet);
		$filename = 'user_data.xlsx'; // Output Excel file name

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . '"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	public function validate_image($image)
	{
		if ($_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
			// Check type file
			if ($_FILES['image']['type'] == 'image/jpeg' || $_FILES['image']['type'] == 'image/png' || $_FILES['image']['type'] == 'image/jpg') {
				// Check file size
				if ($_FILES['image']['size'] <= 2097152) { // 2MB
					return true;
				} else {
					$this->form_validation->set_message('validate_image', 'The image size should not exceed 2MB.');
					return false;
				}
			} else {
				$this->form_validation->set_message('validate_image', 'Invalid image format. Only JPEG/JPG and PNG formats are allowed.');
				return false;
			}
		} else {
			return true;
		}
	}


	public function edit_role_user($user_id)
	{

		if (!check_access('user_role')) {
			redirect(base_url('403'));
		}

		// Get data user
		$user = $this->User_Model->get_user_by_id($user_id);

		// Get lits roles of user
		$assigned_roles = $this->User_Role_Model->get_roles_by_user_id($user_id);

		// Get list roles
		$all_roles = $this->Role_Model->get_roles();

		// Data to view
		$this->data['user'] = $user;
		$this->data['assigned_roles'] = $assigned_roles;
		$this->data['all_roles'] = $all_roles;

		// View edit roles cho user
		$this->data['content'] = 'admin/users/edit_role';
		$this->load->view('admin_layout/layout', $this->data);
	}

	public function update_role_user()
	{

		// Get data
		$user_id = $this->input->post('user_id');
		$selected_role = $this->input->post('selected_role');

		if ($selected_role != 0) {
			// Update roles for user 
			$this->User_Role_Model->update_role_for_user($user_id, $selected_role);
		}
		$this->session->set_flashdata(
			'sweet_alert',
			array(
				'title' => 'Success',
				'text' => 'Role update successful!',
				'type' => 'success'
			)
		);

		redirect(base_url('/users'));
	}
	public function search_user_by_time()
	{
		$startTime = $this->input->post('start_time');
		$endTime = $this->input->post('end_time');


		$startTime = date('Y-m-d', strtotime($startTime));
		$endTime = date('Y-m-d', strtotime($endTime));


		$users = $this->user_model->search_users_by_time($startTime, $endTime);
		$this->data['users'] = $users;
		$this->data['content'] = 'admin/users/index';
		$this->data['js'] = 'admin/users/js';
		$this->load->view('admin_layout/layout', $this->data);
	}

}
