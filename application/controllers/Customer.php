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
	private $arrayValidationComparator = array();
	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper(array('form', 'url', 'security', 'force_ssl'));
		$this->load->library('form_validation');
		$this->load->library('tank_auth');
		if(!$this->tank_auth->is_logged_in())
			redirect('/auth/login');

		$this->load->vars(array(
			'fields_photo_path' => $this->config->item('fields_photo_path', 'tank_auth')
			));
		$this->load->model(array('wmc/lapangan', 'wmc/arena'));
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function loginok()
	{
		echo "Login: OK. You're Customer.";
	}
	public function pilihLapangan($lapangan = NULL)
	{
		
		$this->load->view('head');
		$data = array();
		switch (strtolower($lapangan)) {
				case 'futsal':
					$fields = $this->lapangan->get_lapangan_by_type(WMC_FIELD_FUTSAL);
					if(!is_null($fields))
					{
						foreach ($fields as $field) {
							$field->price = $this->arena->get_lowest_price($field->id);
						}
					}
					$data['fields'] = $fields;
					$data['field_type'] = "Futsal";
					$this->load->view('customer/field_list', $data);

					break;

				case 'basket':
					$fields = $this->lapangan->get_lapangan_by_type(WMC_FIELD_BASKET);
					if(!is_null($fields))
					{
						foreach ($fields as $field) {
							$field->price = $this->arena->get_lowest_price($field->id);
						}
					}
					$data['fields'] = $fields;
					$data['field_type'] = "Basket";
					$this->load->view('customer/field_list', $data);

					break;
				
				case 'badminton':
					$fields = $this->lapangan->get_lapangan_by_type(WMC_FIELD_BADMINTON);
					if(!is_null($fields))
					{
						foreach ($fields as $field) {
							$field->price = $this->arena->get_lowest_price($field->id);
						}
					}
					$data['fields'] = $fields;
					$data['field_type'] = "Badminton";
					$this->load->view('customer/field_list', $data);

					break;
				
				default:
					$this->load->view('customer/pilih_lapangan');
					break;
			}	
		$this->load->view('foot');
	}

	function lapangan($id)
	{
		$field = $this->lapangan->get_lapangan_by_id($id);
		if(!is_null($field))
		{
			$field->type_name = $this->_field_type(TRUE)[$field->type];
			$data = array('field' => $field);
			$this->load->view('head');
			$this->load->view('customer/field', $data);
			$this->load->view('foot');
		} else
			redirect('/customer/pilihLapangan');
	}

	function book($field_id)
	{
		$field = $this->lapangan->get_lapangan_by_id($field_id);
		if(!is_null($field))
		{
			$arena = $this->arena->get_all_by_id($field_id);
			$arenaOpt = array();
			foreach ($arena as $arr) {
				$arenaOpt[$arr->id] = $arr->nama . " -- Rp" . $arr->harga_per_jam;
			}
			$data = array('field' => $field, 'arenaOpt' => $arenaOpt, 'field_id' => $field_id);

			$jamOpt = array(
			    '00.00','01.00','02.00','03.00','04.00','05.00','06.00','07.00','08.00','09.00','10.00','11.00','12.00',
			    '13.00','14.00','15.00','16.00','17.00','18.00','19.00','20.00','21.00','22.00','23.00'
			    );
			$durasiOpt = array('1', '2', '3', '4', '5');

			$this->arrayValidationComparator['arena'] = $arenaOpt;
			$this->arrayValidationComparator['jam'] = $jamOpt;
			$this->arrayValidationComparator['durasi'] = $durasiOpt;


			$this->form_validation->set_rules('nama', 'Nama',"trim|max_length[32]");
			$this->form_validation->set_rules('jam', 'Jam',"trim|required|xss_clean|callback__array_match[jam]");
			$this->form_validation->set_rules('durasi', 'Durasi',"trim|required|xss_clean|callback__array_match[durasi]");
			$this->form_validation->set_rules('arena', 'Arena',"trim|required|xss_clean|callback__array_match[arena]");
			$this->form_validation->set_message('_array_match', "The page was hacked or had an error, but we already fix it automatically!<br>If the error keep appearing, feel free to report it to: me@gdf.my.id!");

			$this->load->view('head');
			$this->load->view('customer/book_form', $data);
			$this->load->view('foot');
		} else
			redirect('/customer/pilihLapangan');
	}

	function _field_type($lowerCase = false)
	{
		if($lowerCase)
		{
			$arr = array(
				WMC_FIELD_FUTSAL => 'futsal',
				WMC_FIELD_BASKET => 'basket',
				WMC_FIELD_BADMINTON => 'badminton'
				);
		} else {
			$arr = array(
				WMC_FIELD_FUTSAL => 'Futsal',
				WMC_FIELD_BASKET => 'Basket',
				WMC_FIELD_BADMINTON => 'Badminton'
				);
		}
		return $arr;
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
