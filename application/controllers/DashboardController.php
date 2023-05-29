<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class DashboardController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['content'] = 'admin/index';
        $this->load->view('admin_layout/layout', $this->data);
    }

	public function access_denied()
    {
        $this->load->view('403');
    }
}
