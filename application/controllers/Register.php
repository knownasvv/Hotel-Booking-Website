<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Register extends CI_Controller
{

  public function index()
  {
    $data['loginStyle'] = $this->load->view('include/loginStyle', NULL, TRUE);
    $data['loginScript'] = $this->load->view('include/loginScript', NULL, TRUE);
    $this->load->view('pages/register.php',$data);
  }
}
