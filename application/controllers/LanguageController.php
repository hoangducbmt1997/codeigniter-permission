<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class LanguageController extends CI_Controller {
    public function change_language($lang) {
        $this->session->set_userdata('language', $lang);
        redirect($_SERVER['HTTP_REFERER']);
    }
}
?>
