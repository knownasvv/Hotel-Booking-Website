<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Register extends CI_Controller
{

  public function __construct() {
		parent::__construct();
        $this->load->model("user_model");
    }

  public function index()
  {
    $data['loginStyle'] = $this->load->view('include/loginStyle', NULL, TRUE);
    $data['loginScript'] = $this->load->view('include/loginScript', NULL, TRUE);
    

    $this->load->view('pages/register', $data);
  }


  public function validate()
  {
    if (isset($_POST['submit'])) {
      $data['loginStyle'] = $this->load->view('include/loginStyle', NULL, TRUE);
      $data['loginScript'] = $this->load->view('include/loginScript', NULL, TRUE);
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');

      $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[users.email]');
      $this->form_validation->set_rules('password', 'password', 'required|min_length[8]');
      $this->form_validation->set_rules('nama', 'nama', 'required');
      $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required');
      $this->form_validation->set_rules('notelp', 'notelp', 'required|integer|min_length[11]');
      $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
      $config['upload_path'] = './assets/customer/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['overwrite'] = TRUE;
        $config['max_size'] = '2048';

        $this->upload->initialize($config);

        if($this->upload->do_upload('foto')){ //kalo upload foto berhasil
            $foto = $this->upload->data('file_name');
        } else {                              //kalo ga upload
            $foto = 'default.jpg';
        }

      if ($this->form_validation->run() == false) {
        $this->load->view('pages/register', $data);
      } else {
        $lastId = $this->user_model->get_last_id();
        $lastId = $lastId[0]['id_user'];
        $this->user_model->add_user($lastId + 1, $_POST['email'], md5($_POST['password'] . "user"), $_POST['nama'], $_POST['notelp'], $_POST['tanggal_lahir'], $foto);
        redirect(base_url('index.php/login'));
      }
    }
  }
}
