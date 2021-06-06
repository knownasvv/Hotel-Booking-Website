<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel extends CI_Controller{
	public function __construct() {
		parent::__construct();
		$this->load->model('hotel_model');
	}

	public function index() {
		$data['header'] = $this->_header("Home");
		$data['footer'] = $this->_footer();

		$data['hotel'] = $this->hotel_model->get_hotel();
		$data['fasilitas'] = $this->hotel_model->get_fasilitas_hotel();

		$this->load->view('pages/home.php', $data);
	}

	private function _header($title) {
		$header['title']  = $title;
		$header['style']  = $this->load->view('include/style', NULL,TRUE);
       	$result =  $this->load->view('template/header', $header,TRUE);
		return $result;
	}

	private function _footer() {
        $footer['script'] = $this->load->view('include/script', NULL,TRUE);
		$result = $this->load->view('template/footer', $footer,TRUE);
		return $result;
	}

	public function detail($id_hotel) {
		$data['header'] = $this->_header("Detail");
		$data['footer'] = $this->_footer();

		$data['hotel'] = $this->hotel_model->get_hotel($id_hotel);
		$data['fasilitas'] = $this->hotel_model->get_fasilitas_hotel($id_hotel);

		$this->load->view('pages/detail.php', $data);
	}
}
