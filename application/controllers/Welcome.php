<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->model('User_model');
		$this->load->library('session');
    }
	public function index()
	{
		$this->load->view('templates/frontend/header');
		$this->load->view('templates/frontend/navbar');
		$this->load->view('pages/welcome/welcome');
		$this->load->view('templates/frontend/footer');
	}
}
