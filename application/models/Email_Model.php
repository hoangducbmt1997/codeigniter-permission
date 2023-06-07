<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Email_Model extends CI_Model
{
	public function get_emails()
	{
		return $this->db->get('emails')->result();
	}

	public function get_email($email_id)
	{
		return $this->db->get_where('emails', ['id' => $email_id])->row();
	}

	public function create_email($data)
	{
		$this->db->insert('emails', $data);
		return $this->db->insert_id();
	}

	public function delete_email($email_id)
	{
		$this->db->where('id', $email_id);
		$this->db->delete('emails');
	}
	public function search_emails_by_time($startTime, $endTime)
	{
		$this->db->select('*');
		$this->db->from('emails');

		$this->db->where('created_at >=', $startTime);
		$this->db->where('created_at <=', $endTime);
		$query = $this->db->get();

		return $query->result();
	}

}
