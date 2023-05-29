<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
    }
    private function check_login()
    {
		// Check if the user is logged in or not
        if (!$this->session->userdata('user_logged')) {
            redirect('login');
        }
    }
}
