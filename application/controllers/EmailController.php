<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
class EmailController extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Email_Model');
	}

	public function index()
	{
		if ($this->session->flashdata('sweet_alert')) {
			$this->data['sweet_alert'] = $this->session->flashdata('sweet_alert');
			$this->session->unset_userdata('sweet_alert');
		}

		$emails = $this->Email_Model->get_emails();
		$this->data['emails'] = $emails;
		$this->data['content'] = 'admin/emails/index';
		$this->data['js'] = 'admin/emails/js';
		$this->load->view('admin_layout/layout', $this->data);
	}

	public function create()
	{
		$this->data['content'] = 'admin/emails/create';
		$this->load->view('admin_layout/layout', $this->data);
	}

	public function send_email()
	{


		$this->form_validation->set_rules('recipient', 'recipient', 'required|valid_email|min_length[3]');
		$this->form_validation->set_rules('subject', 'subject', 'required|min_length[3]');
		$this->form_validation->set_rules('message', 'message', 'required|min_length[2]');

		if ($this->form_validation->run() == true) {
			$recipient = $this->input->post('recipient');
			$subject = $this->input->post('subject');
			$message = $this->input->post('message');

			$this->email->from('hoangduc1997@gmail.com', 'Nguyễn Hoàng Đức');
			$this->email->to($recipient);
			$this->email->subject($subject);
			$this->email->message($message);

			if ($this->email->send()) {


				$email_data = array(
					'send_to' => $recipient,
					'subject' => $subject,
					'content' => $message,
				);

				$email_id = $this->Email_Model->create_email($email_data);

				$this->session->set_flashdata(
					'sweet_alert',
					array(
						'title' => 'Success',
						'text' => 'Email send successfully!',
						'type' => 'success'
					)
				);
				redirect(base_url('email'));

			} else {
				$this->session->set_flashdata(
					'sweet_alert',
					array(
						'title' => 'Error',
						'text' => 'Email send fail!' . $this->email->print_debugger(),
						'type' => 'error'
					)
				);
				redirect(base_url('email'));
			}
		} else {
			$this->create();

		}
	}

	public function resend_email($id)
	{

		$email = $this->Email_Model->get_email($id);

		$this->email->from('hoangduc1997@gmail.com', 'Nguyễn Hoàng Đức');
		$this->email->to($email->send_to);
		$this->email->subject($email->subject);
		$this->email->message($email->content);

		if ($this->email->send()) {
			$this->session->set_flashdata(
				'sweet_alert',
				array(
					'title' => 'Success',
					'text' => 'Email re-send successfully!',
					'type' => 'success'
				)
			);
			redirect(base_url('email'));
		} else {
			$this->session->set_flashdata(
				'sweet_alert',
				array(
					'title' => 'Error',
					'text' => 'Email re-send fail!' . $this->email->print_debugger(),
					'type' => 'error'
				)
			);
			redirect(base_url('email'));
		}
	}





}


?>
