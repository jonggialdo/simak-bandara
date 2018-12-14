  <?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Login extends CI_Controller {
    function __construct(){
  		parent::__construct();
      $this->load->helper('form','url');
      $this->load->model('m_login');
  	}

    function index(){
      $this->load->view('login/index');
    }

    public function login_action(){
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $where = array(
        'username' => $username,
        'password' => md5($password)
      );
      $check = $this->m_login->loginCheck("user", $where)->num_rows();
      
      if($check>0) {
        $data_session = array(
          'username' => $username,
          'status' => 'login'
        );
        $this->session->set_userdata($data_session);
				// echo 'sukses';
				$this->load->model('m_transaksi');
		    $data['trx'] = $this->m_transaksi->getTransaksi();
				$this->load->view('v_transaksi/index', $data);
        //redirect(base_url());
      }
      else {
        $error = array('error' => "Username atau Password Salah");
        echo $error['error'];
        //$this->load-view('v_login', $error);
      }
      // if($this->input->post('submit')){
      //   if($this->m_login->cek_login()){
      //     $this->m_login->set_login();
      //     redirect(base_url().'login/welcome');
      //   }else
      //     $error = array('error' => "Username atau Password Salah");
      //     $this->load->view('v_login', $error);
      //   }
      // }
    }

    public function welcome(){
      $this->load->model('m_ptp');
      $this->load->view(base_url());
    }

    public function logout(){
      $this->session->sess_destroy();
      redirect(base_url('login'));
    }
  }
?>
