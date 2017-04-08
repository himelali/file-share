<?php

defined('BASEPATH') OR exit('No direct script access allowed');

abstract class MY_Controller extends MX_Controller {

    protected $data   = [];
    protected $method = FALSE;

	public function __construct() {
		parent::__construct();		
        $this->form_validation->CI =& $this;

		$this->data['error']        = $this->session->flashdata('error');
        $this->data['exception']    = $this->session->flashdata('exception');
        $this->data['success']      = $this->session->flashdata('success');
        $this->data['warning']      = $this->session->flashdata('warning');
        $this->data['notification'] = $this->session->flashdata('notification');

        $this->data['uri'] = [
            'segment1' => strtolower($this->uri->segment(1)),
            'segment2' => strtolower($this->uri->segment(2)),
            'segment3' => strtolower($this->uri->segment(3)),
            'segment4' => strtolower($this->uri->segment(4)),
            'segment5' => strtolower($this->uri->segment(5))
        ];

        $this->method = (string) strtolower($_SERVER['REQUEST_METHOD']);
	}

    protected function do_upload($size = 20480, $type = 'image') {
        $config['upload_path'] = 'assets/files/';
        if($type == 'image') {
            $config['allowed_types'] = 'gif|jpg|png';
        } else {
            $config['allowed_types'] = 'txt|gif|jpg|png|doc|docx|pdf|ppt|pptx|xls|xlsx|zip';
        }
        $config['file_name'] = strtolower('FILE-'.uniqid()).rand(10000, 99999).'.'.pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
        $config['overwrite'] = false;
        $config['max_size']	= $size;
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload())
            return $this->upload->display_errors();
        return $this->upload->data();
    }

    protected function signOut() {
	    try {
            $this->session->set_userdata('isLogged', NULL);
            $this->session->set_userdata('isAdminLogged', NULL);
            $this->session->set_userdata('userId', NULL);
            $this->session->unset_userdata('userId');
            $this->session->unset_userdata('isLogged');
            $this->session->unset_userdata('isAdminLogged');
            $this->session->set_flashdata('success', 'Thank you for logout.');
        } catch (Exception $e) {
            $this->session->sess_destroy();
            $this->session->set_flashdata('exception', $e->getMessage());
        }
        redirect(site_url('login'));
    }

    protected function isLogged($key) {
        if(isset($this->session->userdata[$key]) && $this->session->userdata[$key] === TRUE)
            return TRUE;
        return FALSE;
    }
	
    public function valid_mobile($value) {
        $first3char = substr($value, 0, 3);
        if(strlen($value) != 11) {
            $this->form_validation->set_message('valid_mobile', '{field} is invalid');
            return FALSE;
        } elseif($first3char == '011') {
            $this->form_validation->set_message('valid_mobile', 'Citycell mobile number not allow.');
            return FALSE;
        } elseif ($first3char == '015' || $first3char == '016' || $first3char == '017' || $first3char == '018' || $first3char == '019') {
            return TRUE;
        }
        $this->form_validation->set_message('valid_mobile', '{field} is invalid');
        return FALSE;
    }

}