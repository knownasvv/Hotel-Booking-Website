<?php defined('BASEPATH') OR exit('No direct script access allowed !');

class User_model extends CI_Model {
    //PERHATIAN !! GUNAKAN sSNAKE CASE DEMI MENJAGA KERAPIHAN
    //ex : get_model()
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function get_user($email = null, $password = null){
		if($email == null && $password == null) $query = $this->db->get('users');
		else $query = $this->db->get_where('users', array('email' => $email, 'password' => $password));
        return $query->result_array();
    }

    function get_salt($email){
        $this->db->select('salt');
		$this->db->from('users');
		$this->db->where('email', $email);
        $query = $this->db->get();
        // $query = $this->db->query("SELECT salt FROM users WHERE email = $email");
        return $query->result_array();
    }

    
    public function add_user($id, $email,  $pass, $nama, $notelp,$tgl,$foto){
		$data = array(
			'id_user' => $id,
			'email' => $email,
			'password' => $pass,
			'nama' => $nama,
			'notelp' => $notelp,
            'tanggal_lahir'=>$tgl,
            'foto'=>$foto,
			'salt' => 'user'
		);
		$this->db->insert('users', $data);
	}

    public function edit_user($id,$nama,$notelp,$tanggal,$foto){
        $data = array(
            'nama' => $nama,
            'notelp' => $notelp,
            'tanggal_lahir' => $tanggal,
            'foto' => $foto
        );
        
        $this->db->update('users', $data, array('id_user' => $id));
    }

    
    public function get_last_id(){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by('id_user', 'DESC');
		$this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }


    function get_profile($id){
        $this->db->select('email,nama,tanggal_lahir,notelp,salt,foto');
		$this->db->from('users');
		$this->db->where('id_user', $id);
        $query = $this->db->get();
        return $query->result_array();
    }


}