<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class HomeController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
		if (!check_access('home')) {
            redirect(base_url('403'));
        }else{
			$this->load->view('home/index');
		}
    }


	public function about()
    {
		if (!check_access('about')) {
            redirect(base_url('403'));
        }else{
			$this->load->view('home/about');
		}
    }

	public function post()
    {
		if (!check_access('post')) {
			redirect(base_url('403'));
        }else{
			$this->load->view('home/post');
		}
    }
}
