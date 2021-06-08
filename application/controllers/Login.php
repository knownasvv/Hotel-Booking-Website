<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('captcha');
        if (!isset($_SESSION)) session_start();
    }

    public function index()
    {

        $vals = array(
            //'word'          => 'Random word',
            'img_path'      => './assets/captcha/',
            'img_url'       => base_url() . 'assets/captcha/',
            'font_path'     => './path/to/fonts/texb.ttf',
            'img_width'     => '180',
            'img_height'    => 30,
            'expiration'    => 20,
            'word_length'   => 5,
            'font_size'     => 16,
            'img_id'        => 'Imageid',
            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            // White background and border, black text and red grid
            'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );

        // $cap = create_captcha($vals);
        // var_dump($vals); 
        // var_dump($cap);
        // $image = $cap['image'];
        // $words = $cap['word'];
        // $data['image'] = $image;
        // $data['words'] = $words;
        // $_SESSION['captcha'] = $words;
        $data['loginStyle'] = $this->load->view('include/loginStyle', NULL, TRUE);
        $data['loginScript'] = $this->load->view('include/loginScript', NULL, TRUE);

        $this->load->view('pages/login', $data);
    }

    public function validate()
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            // $captcha = $_POST['captcha'];

            $salt = $this->user_model->get_salt($email);
            //cek User
            if (count($salt) != 0) {
                $salt = $salt[0]['salt'];
                $password = md5($password . $salt);
                $cekUser = $this->user_model->get_user($email, $password);
                if ($cekUser) {
                    // if (strtolower($_SESSION['captcha']) == strtolower($captcha)) {
                        if ($salt == "user") {
                            $_SESSION['id_user'] = $cekUser[0]['id_user'];
                            $_SESSION['name'] = $cekUser[0]['nama'];
                            $_SESSION['salt'] = "user";
                            redirect(base_url());
                        } else if ($salt == "admin") {
                            $_SESSION['id_admin'] = $cekUser[0]['id_user'];
                            $_SESSION['name'] = $cekUser[0]['nama'];
                            $_SESSION['salt'] = "admin";
                            redirect(base_url('index.php/admin_hotel/daftar_hotel'));
                        }
                    // } else {
                    //     redirect(base_url('index.php/login?captcha=false'));
                    // }
                } else {
                    redirect(base_url('index.php/login?pass=false'));
                }
            } else {
                redirect(base_url('index.php/login?login=false'));
            }
            //selesai cek User

        }
    }

    public function logout()
    {
        session_destroy();
        redirect(base_url());
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

    public function profile(){
        $data['header'] = $this->_header("Home");
		$data['footer'] = $this->_footer();
        $data['email'] = $this->user_model->get_email($_SESSION['id_user']);

        $this->load->view('pages/profile_user',$data);
    }
}
