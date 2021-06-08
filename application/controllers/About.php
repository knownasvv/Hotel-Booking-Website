<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class About extends CI_Controller {

    public function __construct() {
		parent::__construct();
	}

	private function _header($title, $data = null) {
		$header['title']  = $title;
		$header['style']  = $this->load->view('include/style', $data,TRUE);
    	$result =  $this->load->view('template/header', $header,TRUE);
		return $result;
	}

	private function _footer() {
        $footer['script'] = $this->load->view('include/script', NULL,TRUE);
		$result = $this->load->view('template/footer', $footer,TRUE);
		return $result;
	}


    public function index(){
        $data['header'] = $this->_header("About Us");
		$data['footer'] = $this->_footer();

        $this->load->view('pages/aboutus', $data);
    }
}