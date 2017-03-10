<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper(array('form', 'url', 'security', 'force_ssl'));
		$this->load->library('form_validation');
		$this->load->library('tank_auth');
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function loginok()
	{
		echo "Login: OK. You're Customer.";
	}
	public function pilihLapangan()
	{
		$this->load->view('head');
		$this->load->view('pilih_lapangan');
		$this->load->view('foot');
	}
}
