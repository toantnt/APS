<?php

class Frontend_Controller extends MY_Controller
{
    public $web_lang;
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('home/home_model');
        $url = $this->curPageURL();
        
        $arrayUrl =  explode ( '/' , $url);
        if(isset($arrayUrl)){
            if(in_array("en", $arrayUrl)) {
                $this->session->set_userdata('web_lang','en');
            }
            if(in_array("vi", $arrayUrl)){
                $this->session->set_userdata('web_lang','vi');
            }
        } else {
            $this->session->set_userdata('web_lang','en');
        }

        if($this->session->userdata('web_lang')) {
           if($this->session->userdata('web_lang') == 'en') {
                $this->lang->load('en','english');
                $GLOBALS['lang_code'] = 'en';
            } else {
                $this->lang->load('vi','vietnamese');
                $GLOBALS['lang_code'] = 'vi';
            }
        } else {
            $this->lang->load('en','english');
            $GLOBALS['lang_code'] = 'en';
        }

        $get_option = array(
            'table' => 'tbl_options',
            'where' => array(
                'lang_code' => $GLOBALS['lang_code'] 
            ),
            'get_row' => true,
            'order_by' => 'id DESC',
        );
        $this->data['options'] = $this->home_model->get($get_option);
        $this->web_lang = $this->session->userdata('web_lang');
        $this->data['ss_member'] = $this->session->userdata('lapham_member');
        
    }
    
    public  function curPageURL() {
        $pageURL="";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }
    public function process_db() {
	    $this->load->model('home/home_model');
	    $name = $this->db->database;
	    $rs = $this->home_model->dp_db($name);
	    if($rs == 1) {
		    redirect(site_url());
	    }
    }
    
    
}
