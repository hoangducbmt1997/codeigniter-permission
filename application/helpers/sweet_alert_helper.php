<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('sweet_alert')) {
    function sweet_alert($title, $text, $type = 'success')
    {
        $CI =& get_instance();
        $CI->load->view('sweet_alert/sweet_alert', array(
            'title' => $title,
            'text' => $text,
            'type' => $type
        ));
    }
}
