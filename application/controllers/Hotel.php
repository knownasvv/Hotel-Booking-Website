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

	public function booking($id_hotel) {
		if($_SESSION['salt'] == 'admin') redirect(base_url());
		else if($_SESSION['salt'] == 'user') {
			$data['header'] = $this->_header("Reservasi");
			$data['footer'] = $this->_footer();
	
			$data['hotel'] = $this->hotel_model->get_hotel($id_hotel);
			$data['fasilitas'] = $this->hotel_model->get_fasilitas_hotel($id_hotel);

			$this->load->view('pages/reservasi.php', $data);
		} else redirect(base_url('index.php/Login'));
	}

	public function validate_booking($id_hotel) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error" style="color: red">', '</div>');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'required|numeric|max_length[12]|min_length[11]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$jumlah_kamar = $this->hotel_model->get_hotel($id_hotel)[0]['jumlah_kamar'];
		$this->form_validation->set_rules('jumlah_kamar', 'Jumlah Kamar', 'required|less_than_equal_to['.$jumlah_kamar.']|greater_than_equal_to[1]');
		$this->form_validation->set_rules('tgl_check_in', 'Tanggal Check-in', 'required|callback_compare_date');
		$this->form_validation->set_rules('tgl_check_out', 'Tanggal Check-out', 'required');
		
		if($this->form_validation->run() == FALSE) {
			$this->booking($id_hotel);
		} else { 
			// $buku['title'] 		= $this->input->post('title');
			// $buku['year'] 		= $this->input->post('year');
			// $buku['author'] 	= $this->input->post('author');
			// $buku['publisher'] 	= $this->input->post('publisher');
			// $buku['poster'] 	= $this->upload->data()['file_name'];

			$this->buku->addData($buku);
			redirect(base_url());
		}
		// o Nama Lengkap Tamu
		// o Nomor Telepon Tamu (validasi input berupa angka)
		// o Email Tamu (validasi input berupa email)
		// o Jumlah Kamar (tidak bisa melebihi jumlah kamar yang tersedia, dan tidak bisa <1)
		// o Tanggal Check-in & Check-out (tanggal check-in tidak boleh lebih besar dari tanggal check-out)
		// o Harga (berubah seiring jumlah kamar yang dipesan dan durasi)
	}

	public function compare_date($tgl_check_in){
		$tgl_check_in = strtotime($tgl_check_in);
		$tgl_check_out = strtotime($_POST['tgl_check_out']);
		if ($tgl_check_in < $tgl_check_out) return True;
		else {
			$this->form_validation->set_message('compare_date', '%s should be less than Tanggal Check-out.');
			return False;
		}
	}
}
