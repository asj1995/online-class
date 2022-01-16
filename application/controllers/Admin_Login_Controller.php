<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Login_Controller extends CI_Controller {
	function __construct(){
		parent::__construct();
		// if ($this->session->userdata('logged_in') == '') redirect('/');
		$this->load->model('admin/login/Admin_Login_Modal');
	}

	public function index()
	{
		$this->load->view('admin/Login');
		// $this->load->view('admin/templete/sidebar');
		// $this->load->view('admin/dashboard/dashboard');
		// $this->load->view('admin/templete/footer');
	}

	//login form submit
	public function Login_Submit(){
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_error_delimiters('<div class="" style="color:red; margin-top: -17px; margin-bottom: 12px;">', '</div>');
        if ($this->form_validation->run() == FALSE){
            $this->load->view('/');
        }else{
            $data = array(
                'u_email' => $_POST['email'],
                'password' => md5($_POST['password']),
            );
            $query = $this->Admin_Login_Modal->Check_Admin_Data($data);
            if(!empty($query)){
				$set_data = array(
					'username' => $query->u_name,
					'u_email' => $query->u_email,
					'user_type' => $query->user_type,
					'u_img' => $query->u_img,
					'logged_in' => TRUE,
				);
				$set_data_in_session = $this->session->set_userdata($set_data);
				if($this->session->userdata('logged_in') == TRUE){
					$this->session->set_flashdata('Login-in','User Login <strong>Successfully !</strong>');
					redirect(base_url('Dashboard'));
				}else{
					echo 'hlo';
					die;
					$this->session->set_flashdata('error','Somthing wrong please try ?');
                	redirect(base_url('/'));
				}
			}else{
				$this->session->set_flashdata('error','Somthing wrong please try ?');
                redirect(base_url('/'));
			}
        }
	}

	//Admin Logout 
	public function Admin_Logout(){
		$this->session->sess_destroy();
		redirect(base_url('/'));
		
	}

	//page 404
	public function page404(){
		$this->load->view('admin/404.php');

	}
}
