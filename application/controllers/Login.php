  <?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Login extends CI_Controller {
    function __construct(){
  		parent::__construct();
      $this->load->helper('form','url');
      $this->load->model('m_login');

  	}

    function index(){
      $this->load->view('v_login');
    }

    public function action_check(){
      if($this->input->post('submit')){
        if($this->m_login->cek_login()){
          $this->m_login->set_login();
          ?>
          <script language="javascript">alert("Login Success");</script>
          <script>document.location.href='<?php echo base_url().'index'?>';</script>
          <?php
        }else{?>
         <?php
         $error = array('error' => "Username atau Password Salah");
          $this->load->view('v_login', $error);
        }
      }
    }

  public function welcome(){
    $this->load->model('m_ptp');
    $this->load->view('welcome_message');
  }

  public function logout(){
      $this->session->sess_destroy();
      redirect(base_url('login'));
    }
  }
