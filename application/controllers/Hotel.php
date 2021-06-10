<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel extends CI_Controller{
	public function __construct() {
		parent::__construct();
		$this->load->model('hotel_model');
	}

	public function index() {
		$data['header'] = $this->_header("Home");
		$data['footer'] = $this->_footer();

		$data['fasilitas'] = $this->hotel_model->get_fasilitas_hotel();
		if($this->input->post('cari')==null&&$this->input->post('harga')==null&&$this->input->post('lokasi')==null&&$this->input->post('bintang')==null){
			$data['hotel'] = $this->hotel_model->get_hotel();
		}else if($this->input->post('cari')!=null){
			$cari = $this->input->post('cari');
			$data['hotel'] = $this->hotel_model->get_pilihan($cari);
		}else {
			$harga1 = $this->input->post('harga1');
			$harga2 = $this->input->post('harga2');
			$lokasi = $this->input->post('lokasi');
			$bintang = $this->input->post('bintang');
			$data['hotel'] = $this->hotel_model->get_filter($harga1,$harga2,$lokasi,$bintang);
		}

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
			$invoice = $this->hotel_model->get_invoice();
			$data_invoice['id_hotel'] 				= $id_hotel;
			$data_invoice['id_user'] 				= $_SESSION['id_user'];
			$data_invoice['nama_lengkap_tamu'] 		= $this->input->post('nama_lengkap');
			$data_invoice['notelp_tamu'] 			= $this->input->post('nomor_telepon');
			$data_invoice['email_tamu'] 			= $this->input->post('email');
			$data_invoice['jumlah_kamar'] 			= $this->input->post('jumlah_kamar');
			$data_invoice['tanggal_check-in'] 		= $this->input->post('tgl_check_in');
			$data_invoice['tanggal_check-out'] 		= $this->input->post('tgl_check_out');
			$data_invoice['harga'] 					= preg_replace('/([,\.])/', "", $this->input->post('harga'));
			$data_invoice['jam_dan_tanggal_booking'] = date('Y-m-d H:i:s');
			if(count($invoice) <= 0) {
				$new_id_invoice = 'INV'. sprintf("%03d", 1);
				$data_invoice['id_invoice'] = $new_id_invoice;
				$this->hotel_model->add_invoice($data_invoice);
			} else {
				$last_id_invoice = (int)substr(end($invoice)['id_invoice'], 3);
				print_r(end($invoice)['id_invoice']);
				$new_id_invoice = 'INV'. sprintf("%03d", $last_id_invoice+1);
				$data_invoice['id_invoice'] = $new_id_invoice;
				$this->hotel_model->add_invoice($data_invoice);
			}

			redirect(base_url());
		}
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

	public function invoice() {
		if($_SESSION['salt'] == 'admin') redirect(base_url());
		else if($_SESSION['salt'] == 'user') {
			$data['header'] = $this->_header("Invoices");
			$data['footer'] = $this->_footer();
	
			$data['invoice'] = $this->hotel_model->get_invoice($_SESSION['id_user']);
			$data['hotel'] = $this->hotel_model->get_hotel();

			$this->load->view('pages/invoice.php', $data);
		} else redirect(base_url('index.php/Login'));
	}
}
