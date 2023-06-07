<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Language_Model extends CI_Model
{
    public function get_languages()
    {
        return $this->db->get('language')->result();
    }

	public function get_language($id)
    {
		return $this->db->get_where('language', ['id' => $id])->row();
    }

    public function create_language($data)
    {
        $this->db->insert('language', $data);
		return $this->db->insert_id();
    }

    public function update_language($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('language', $data);
    }

    public function delete_language($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('language');
    }


	public function search_languages_by_time($start_time, $end_time)
	{
		$this->db->select('*');
		$this->db->from('language');

		$this->db->where('created_at >=', $start_time);
		$this->db->where('created_at <=', $end_time);
		$query = $this->db->get();

		return $query->result();
	}
}
