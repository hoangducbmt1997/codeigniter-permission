<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();

        $language = $this->session->userdata('language');
        if ($language) {
			$this->load_language_data($language);
            $this->load_app_language($language);
        } else {
			$this->load_language_data('english');
            $this->load_app_language('english');
        }
    }


    protected function load_app_language($language)
    {
        $this->lang->is_loaded = array();

        if ($language && in_array($language, ['vietnamese', 'english'])) {
            $file_path = APPPATH . 'language/' . $language . '/app_lang.php';
            $this->lang->load('app', $language);
        } else {
            $file_path = APPPATH . 'language/english/app_lang.php';
            $this->lang->load('app', 'english');
        }

        if (file_exists($file_path)) {
            $lang_data = include($file_path);
            if (is_array($lang_data)) {
                $this->session->set_userdata('language_data', $lang_data);
            }
        }
    }

	protected function load_language_data($langue)
	{
		if($langue == 'vietnamese'){
			$query = $this->db->get_where('language', ['lang_code' => 'vi']);
		}else{
			$query = $this->db->get_where('language', ['lang_code' => 'eng']);
		}
		$lang_data = $query->result_array();
	
		$file_content = '<?php' . PHP_EOL . PHP_EOL;
	
		foreach ($lang_data as $data) {
			$file_content .= '$lang[\'' . $data['key_name'] . '\'] = \'' . $data['value'] . '\';' . PHP_EOL;
		}
	
		$file_path = APPPATH . 'language/' . $langue . '/app_lang.php';
	
		file_put_contents($file_path, $file_content);
	}
	


    private function check_login()
    {
        if (!$this->session->userdata('user_logged')) {
            redirect('login');
        }
    }
}
