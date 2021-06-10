<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_hotel extends CI_Controller{
	public function __construct() {
		parent::__construct();
		$this->load->model('hotel_model');
	}
	
	public function daftar_hotel() {
		$this->load->library('grocery_CRUD');
		$crud=new grocery_CRUD();

        $crud->set_table('hotel')
			->set_theme('tablestrap4')
			->set_subject('Hotel')
			->set_relation_n_n('fasilitas', 'fasilitas_hotel', 'fasilitas', 'id_hotel', 'id_fasilitas', 'nama_fasilitas')
			->columns('id_hotel','nama', 'fasilitas', 'gambar','jumlah_kamar','rating','harga','alamat','kota')
			->callback_column('gambar', array($this, 'img_size'))
			->callback_column('harga', array($this, 'harga_format'))
			->fields('id_hotel','nama','fasilitas','gambar','jumlah_kamar','rating','harga','alamat','kota')
			->required_fields('id_hotel','nama','jumlah_kamar','harga','alamat','kota')
			->set_field_upload('gambar','assets/images/hotel')
			->unset_clone();
		
		$crud->display_as('id_hotel','ID Hotel')
			->display_as('nama', 'Nama Hotel');
			
        $output = $crud->render();
        $data['crud'] = get_object_vars($output);

		$data['header'] = $this->_header("Home", $data);
		$data['footer'] = $this->_footer();

		$this->load->view('pages/admin_hotel', $data);
	}

	function img_size($value){
        return "<img src='". base_url('/assets/images/hotel/'.$value) ."' width='100px' height='100px'> </img>";
    }

	function harga_format($harga) {
		return "Rp ". number_format($harga, 2);
	}

	public function daftar_pemesan() {
		$this->load->library('grocery_CRUD');
		$crud=new grocery_CRUD();

        $crud->set_table('invoice_booking_hotel')
			->set_theme('tablestrap4')
			->set_subject('Invoice Booking Hotel')
			->columns('id_invoice','id_hotel','id_user','nama_lengkap_tamu','notelp_tamu', 'email_tamu','jumlah_kamar','tanggal_check-in','tanggal_check-out','harga','jam_dan_tanggal_booking')
			->callback_column('gambar', array($this, 'img_size'))
			->callback_column('harga', array($this, 'harga_format'))
			->fields('id_invoice','id_hotel','id_user','nama_lengkap_tamu','notelp_tamu', 'email_tamu','jumlah_kamar','tanggal_check-in','tanggal_check-out','harga','jam_dan_tanggal_booking')
			->required_fields('id_hotel','nama','jumlah_kamar','harga','alamat','kota')
			->set_field_upload('gambar','assets/images/hotel')
			->unset_clone();
		
		$crud->display_as('id_hotel','ID Hotel')
			->display_as('id_invoice','ID Invoice')
			->display_as('notelp_tamu','Nomor Telepon')
			->display_as('id_user','ID User');
			
			
        $output = $crud->render();
        $data['crud'] = get_object_vars($output);

		$data['header'] = $this->_header("Home", $data);
		$data['footer'] = $this->_footer();

		$this->load->view('pages/admin_pemesanan', $data);
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



}
