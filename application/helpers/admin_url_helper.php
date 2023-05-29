<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('admin_upload_url')) {
    function admin_upload_url($url)
    {
        return $_SERVER['DOCUMENT_ROOT'] . '/GCE-WD/uploads/'.$url;
    }
}
