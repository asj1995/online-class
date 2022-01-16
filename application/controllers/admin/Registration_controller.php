<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration_controller extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		// if ($this->session->userdata('logged_in') == ''){ redirect('/');};
		$this->load->model('admin/registration/Admin_Registration');
	}
	
	public function RegistrationPageView()
	{
		if ($this->session->userdata('logged_in') != ''){ redirect('Dashboard');};

		$this->load->view('admin/registration');
	}
    

    //add registration data
    public function Add_Registration_Data(){

        $this->form_validation->set_rules('name', 'User Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_user.u_email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('c_password', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_error_delimiters('<div class="" style="color:red; margin-top: -17px; margin-bottom: 12px;">', '</div>');
        if ($this->form_validation->run() == FALSE){
            $this->load->view('admin/registration');
        }else{
            $data = array(
                'u_name' => $_POST['name'],
                'u_email' => $_POST['email'],
                'password' => md5($_POST['password']),
            );
            $query = $this->Admin_Registration->add_data_user($data);
            if($query){
                $this->session->set_flashdata('success','User Register <strong>Successfully !</strong>');
                redirect(base_url('/'));
            }else{
                $this->session->set_flashdata('error','Somthing wrong please try ?');
                redirect(base_url('/'));

            }
        }
    }
}
