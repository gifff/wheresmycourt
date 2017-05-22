<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superuser extends CI_Controller {

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
	private $arrayValidationComparator = array();
	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper(array('form', 'url', 'security', 'force_ssl'));
		$this->load->library('form_validation');
		$this->load->library('tank_auth');
		$this->load->model(array('wmc/lapangan', 'wmc/arena'));
		if($this->tank_auth->get_user_level() != WMC_ROLE_PROVIDER)
			redirect('/customer/pilihLapangan');
		if(null !== $this->session->flashdata('message'))
			$this->load->vars('message',  $this->session->flashdata('message'));
		
	}
	public function index()
	{
		$this->load->view('superuser/head');
		$this->load->view('superuser/welcome');
	}
	public function listUsers()
	{
		$users = $this->users->get_users();
		$newu = array();
		foreach ($users as $user) {
			$profile = $this->users->get_profile($user->id);
			$user = (array)$user;
			if(!is_null($profile)){
				$user['name'] = $profile->name;
				$user['phone'] = !is_null($profile->phone) ? $profile->phone : '';
			} else
				$user['name'] = $user['phone'] = '';
			$newu[] = (object)$user;
		}
		$data['users'] = (object)$newu;
		$this->load->view('superuser/head');
		$this->load->view('superuser/list_user', $data);
	}
	public function listLapangan()
	{
		$data = array();
		$data['lapangan'] = $this->lapangan->get_all();
		$this->load->view('superuser/head');
		$this->load->view('superuser/list_lapangan', $data);
	}
	public function changeLapangan()
	{
		$data = array();
		// $data['users'] = $users = $this->users->get_users_by_level(WMC_ROLE_PROVIDER);
		
		// $daftarPemilik = array();
		// foreach ($users as $user) {
		// 	$daftarPemilik[$user->id] = $user->username;
		// }
		// $data['daftarPemilik'] = $this->arrayValidationComparator['pemilik'] = $daftarPemilik;

		$this->form_validation->set_rules('nama', 'Nama',"trim|max_length[32]");
		$this->form_validation->set_rules('telp', 'Telp','trim|required|max_length[16]');
		$this->form_validation->set_rules('alamat', 'Alamat','trim|required|max_length[64]');
		$this->form_validation->set_message('_array_match', "The page was hacked or had an error, but we already fix it automatically!<br>If the error keep appearing, feel free to report it to: me@gdf.my.id!");
		
		if($this->form_validation->run())
		{
			$dbdata = array(
				'nama' => $this->form_validation->set_value('nama'), 
				'alamat' => $this->form_validation->set_value('alamat'), 
				'telp' => $this->form_validation->set_value('telp'), 

				);
			if(!is_null($this->lapangan->ubah_lapangan($dbdata)))
				$this->_send_message("lapangan telah ditambahkan");
			else
				$this->_send_message("operasi gagal", "/superuser/addLapangan");
		}
		$this->load->view('superuser/head');
		$this->load->view('superuser/add_lapangan', $data);		
		// $this->load->view('foot');
	}


	public function listArena()
	{
		$data = array();
		$data['arena'] = $this->arena->get_all();
		$this->load->view('superuser/head');
		$this->load->view('superuser/list_arena', $data);
	}

	public function addArena()
	{
		$data = array();
		$lapangan = $this->lapangan->get_all();
		$daftarLapangan = array();
		foreach ($lapangan as $lapangan) {
			$daftarLapangan[$lapangan->id] = $lapangan->nama;
		}
		$data['daftarLapangan'] = $this->arrayValidationComparator['lapangan'] = $daftarLapangan;

		$this->form_validation->set_rules('nama', 'Nama',"trim|max_length[80]");
		$this->form_validation->set_rules('harga_per_jam', 'Harga per Jam','trim|required|numeric|max_length[16]');
		$this->form_validation->set_rules('lapangan_id', 'Lapangan',"trim|required|xss_clean|callback__array_match[lapangan]");
		$this->form_validation->set_message('_array_match', "The page was hacked or had an error, but we already fix it automatically!<br>If the error keep appearing, feel free to report it to: me@gdf.my.id!");
		
		if($this->form_validation->run())
		{
			$dbdata = array(
				'nama' => $this->form_validation->set_value('nama'), 
				'harga_per_jam' => $this->form_validation->set_value('harga_per_jam'), 
				'lapangan_id' => $this->form_validation->set_value('lapangan_id'), 
				);
			if(!is_null($this->arena->create_arena($dbdata)))
				$this->_send_message("arena telah ditambahkan");
			else
				$this->_send_message("operasi gagal", "/superuser/addArena");
		}
		$this->load->view('superuser/head');
		$this->load->view('superuser/add_arena', $data);
		// $this->load->view('foot');
	}

	function _array_match($input, $arrayName)
	{
		// $ekohort_constant = (object)$this->config->item('ekohort_constant', 'tank_auth');
		$arr = $this->arrayValidationComparator[$arrayName];
		if(isset($arr[$input]))
			return TRUE;

		return FALSE;
	}
	private function _send_message($message, $redirect = NULL)
	{
		if($message !== NULL)
			$this->session->set_flashdata('message', $message);
		if($redirect !== NULL)
			redirect($redirect);
		else {
			redirect('/superuser/');
		}
	}
}
