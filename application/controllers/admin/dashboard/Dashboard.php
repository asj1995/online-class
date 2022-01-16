<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('logged_in')) redirect('/');
	}

	public function dashboard_view(){
		$this->load->view('admin/templete/header');
        $this->load->view('admin/templete/sidebar');
		$this->load->view('admin/dashboard/dashboard');
		$this->load->view('admin/templete/footer');
	}

}
