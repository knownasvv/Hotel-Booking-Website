<?php defined('BASEPATH') OR exit('No direct script access allowed !');

class User_model extends CI_Model {
    //PERHATIAN !! GUNAKAN CAMEL CASE DEMI MENJAGA KERAPIHAN
    //ex : getModel()
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function getUser($email = null, $password = null){
		if($email == null && $password == null) $query = $this->db->get('users');
		else $query = $this->db->get_where('users', array('email' => $email, 'password' => $password));
        return $query->result_array();
    }
}