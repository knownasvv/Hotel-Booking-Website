<?php defined('BASEPATH') OR exit('No direct script access allowed !');

class Hotel_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

	function get_fasilitas_hotel($id_hotel = null){
		$this->db->select('fasilitas_hotel.id_hotel, fasilitas.nama_fasilitas');
		$this->db->from('fasilitas_hotel');
		$this->db->join('fasilitas', 'fasilitas.id_fasilitas = fasilitas_hotel.id_fasilitas', 'inner');
		if(!is_null($id_hotel)) $this->db->where("fasilitas_hotel.id_hotel", $id_hotel);

		$query = $this->db->get();

        return $query->result_array();
    }

	function get_fasilitas($id_fasilitas = null) {
		if(is_null($id_fasilitas)) $query = $this->db->get('fasilitas');
		else $query = $this->db->get_where('fasilitas', array('id_fasilitas' => $id_fasilitas));
		return $query->result_array();
	}

	function get_hotel($id_hotel = null) {
		if(is_null($id_hotel)) $query = $this->db->get('hotel');
		else $query = $this->db->get_where('hotel', array('id_hotel' => $id_hotel));
		return $query->result_array();
	}

	function get_invoice($id_user = null) {
		if(is_null($id_user)) $query = $this->db->get('invoice_booking_hotel');
		else $query = $this->db->get_where('invoice_booking_hotel', array('id_user' => $id_user));
		return $query->result_array();
	}

	function add_invoice($data) {
		$this->db->insert('invoice_booking_hotel', $data);

		$this->db->set('jumlah_kamar', 'jumlah_kamar-1', FALSE);
		$this->db->where('id_hotel', $data['id_hotel']);
		$this->db->update('hotel');
	}
	
	function get_pilihan($cari){
		$this->db->select('*');
		$this->db->from('hotel');
		$this->db->like('nama',$cari);
		$query = $this->db->get();
        return $query->result_array();
	}

	function get_filter($harga,$lokasi,$bintang){
		$this->db->select('*');
		$this->db->from('hotel');
		$this->db->like('kota',$lokasi);
		$this->db->where('harga >=', $harga);
		$this->db->where('rating >=', $bintang);
		$query = $this->db->get();
        return $query->result_array();
	}
	

}
