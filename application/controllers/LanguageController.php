<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class LanguageController extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Language_Model');
	}

	public function index()
	{
		if ($this->session->flashdata('sweet_alert')) {
			$this->data['sweet_alert'] = $this->session->flashdata('sweet_alert');
			$this->session->unset_userdata('sweet_alert');
		}

		$languages = $this->Language_Model->get_languages();
		$this->data['languages'] = $languages;
		$this->data['content'] = 'admin/languages/index';
		$this->data['js'] = 'admin/languages/js';
		$this->load->view('admin_layout/layout', $this->data);
	}

	public function create()
	{
		$this->data['content'] = 'admin/languages/create';
		$this->load->view('admin_layout/layout', $this->data);
	}


	public function store()
	{
		$this->form_validation->set_rules('key', 'key', 'required|min_length[3]');
		$this->form_validation->set_rules('value', 'value', 'required|min_length[3]');
		$this->form_validation->set_rules('selected_code', 'lang code', 'required|min_length[2]');

		if ($this->form_validation->run() == true) {

			$lang_data = array(
				'key_name' => $this->input->post('key'),
				'value' => $this->input->post('value'),
				'lang_code' => $this->input->post('selected_code'),
			);
			// Save data
			$language_id = $this->Language_Model->create_language($lang_data);

			$this->session->set_flashdata(
				'sweet_alert',
				array(
					'title' => 'Success',
					'text' => 'Language added successfully!',
					'type' => 'success'
				)
			);

			return redirect(base_url('language'));

		} else {
			$this->create();
		}
	}

	public function edit($id)
	{
		$language = $this->Language_Model->get_language($id);
		$this->data['language'] = $language;
		$this->data['content'] = 'admin/languages/edit';
		$this->load->view('admin_layout/layout', $this->data);
	}

	public function update($id)
	{
		$this->form_validation->set_rules('key', 'key', 'required|min_length[2]');
		$this->form_validation->set_rules('value', 'value', 'required|min_length[2]');
		$this->form_validation->set_rules('selected_code', 'lang code', 'required|min_length[2]');


		if ($this->form_validation->run() == true) {

			$lang_data = array(
				'key_name' => $this->input->post('key'),
				'value' => $this->input->post('value'),
				'lang_code' => $this->input->post('selected_code'),
			);

			$this->Language_Model->update_language($id, $lang_data);

			$this->session->set_flashdata(
				'sweet_alert',
				array(
					'title' => 'Success',
					'text' => 'Language updated successfully!',
					'type' => 'success'
				)
			);

			return redirect(base_url('language'));
		} else {
			$this->edit($id);
		}
	}

	public function delete($id)
	{

		$this->session->set_flashdata(
			'sweet_alert',
			array(
				'title' => 'Success',
				'text' => 'Language deleted successfully!',
				'type' => 'success'
			)
		);
		
		$this->Language_Model->delete_language($id);
		redirect('language');
	}


	public function search_language_by_time(){

		$start_time = $this->input->post('start_date');
		$end_time = $this->input->post('end_date');

		$start_time = date('Y-m-d H:i:s', strtotime($start_time));
		$end_time = date('Y-m-d H:i:s', strtotime($end_time));



		$languages = $this->Language_Model->search_languages_by_time($start_time, $end_time);

		$data['search_result'] = $languages;
		$this->load->view('admin/languages/search_result', $data);
	}


	public function change_language($lang)
	{
		$this->session->set_userdata('language', $lang);
		redirect($_SERVER['HTTP_REFERER']);
	}
}
?>
