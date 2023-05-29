<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class LoginController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_Model');
    }

    public function index()
    {
        // Check if the user is logged in or not
        if (!$this->session->userdata('user_logged')) {
            // User is not logged in, perform automatic login if there is a login remember cookie
            $this->auto_login();
        }

        // Check again after automatic login
        if ($this->session->userdata('user_logged')) {
            // User logged in, redirects to dashboard
            redirect(base_url('dashboard'));
        }

        // User is still not logged-> Display login page
        return $this->load->view('admin/login/index');
    }

    public function login()
    {
        // Validate username and password
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        // Validate reCAPTCHA
        $this->form_validation->set_rules('g-recaptcha-response', 'reCAPTCHA', 'required');

        if ($this->form_validation->run() == true) {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $remember = $this->input->post('remember');
            $recaptcha_response = $this->input->post('g-recaptcha-response');

            // Verify reCAPTCHA
            $recaptcha_result = $this->recaptcha->verifyResponse($recaptcha_response);

            if ($recaptcha_result['success']) {
                // reCAPTCHA valid, continue processing login

				$user = $this->Auth_Model->login($username, $password);

                // Handling on successful login
                if ($user) {
                    // Save user information in session
                    $user_data = [
                        'id' => $user->id,
                        'name' => $user->username,
                        'image' => $user->image,
                    ];

                    $this->session->set_userdata('user_logged', $user_data);

                    if ($remember) {
                        $this->Auth_Model->remember_login($user->id);
                    }

                    // Redirect to dashboard
                    $this->session->unset_userdata('error');

                    redirect(base_url('dashboard'));
                } else {
                    // Handling login failed
                    $this->session->set_flashdata('error', 'Invalid username or password!');
                    redirect(base_url('login'));
                }
            } else {
                // reCAPTCHA invalid
                $this->session->set_flashdata('error', 'Invalid reCAPTCHA!');
                redirect(base_url('login'));
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('login'));
        }
    }

    public function auto_login()
    {
        // Check if there is a login memory cookie
        $remember_token = $this->input->cookie('remember_token');

        if ($remember_token) {
            $user = $this->Auth_Model->get_user_by_remember_token($remember_token);

            if ($user) {
                $user_data = [
                    'id' => $user->id,
                    'email' => $user->username,
                ];
                $this->session->set_userdata('user_logged', $user_data);
                redirect(base_url('dashboard'));
            }

            if ($remember_token && !$user) {
                $this->input->set_cookie('remember_token', '', 0);
                redirect(base_url('login'));
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_logged');
        $this->session->unset_userdata('error');

        // Delete the token in the memory_login table
        $remember_token = $this->input->cookie('remember_token');

        if ($remember_token) {
            $this->Auth_Model->remove_remember_token($remember_token);
        }

        $this->session->set_flashdata('success', 'Logged out successfully.');

        redirect(base_url('login'));
    }
}
