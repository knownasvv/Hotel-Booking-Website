<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller {

    public function __construct() {
		parent::__construct();
	}

    public function index(){
        $data['title'] = "Home";
		$title['title'] = $data['title'];

		$data['style'] = $this->load->view('include/style', NULL, TRUE);
		$data['script'] = $this->load->view('include/script', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar', $title, TRUE);
		$data['footer'] = $this->load->view('template/footer', NULL, TRUE);

        $this->load->view('pages/home', $data);

    }
}