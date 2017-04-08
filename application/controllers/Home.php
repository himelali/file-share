<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index() {
		$this->load->view('index');
	}

	public function signin($ref = FALSE) {
	    if($this->method == 'post') {

        } elseif($ref) {

        } else {

        }
    }

    public function signup($ref = FALSE) {
        if($this->method == 'post') {

        } elseif($ref) {

        } else {

        }
    }

    public function upload() {
	    if($this->session->userdata('isLogged')) {
            if($this->method == 'post') {

            } else {

            }
        } else {
	        $this->session->set_flashdata('error', 'Sorry! Invalid request.');
	        redirect(site_url());
        }
    }
}
