<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Pagination extends CI_Pagination
{
	// $cur_page is a 'page number' which is like to use_page_numbers-enabled condition, not an 'offset'.
	
	public $current;
	protected $_links_buffered = '';
	public function __construct($params = array())
	{
		$this->CI =& get_instance();
		$this->CI->load->language('pagination');
		foreach (array('first_link', 'next_link', 'prev_link', 'last_link') as $key)
		{
			if (($val = $this->CI->lang->line('pagination_'.$key)) !== FALSE)
			{
				$this->$key = $val;
			}
		}

		$this->initialize($params);
		log_message('info', 'Extended Pagination Class Initialized');
		// I copy it from the original class bcs I want the constructor use this extended class's modified initialize method.
		// parent::__construct($params);
	}
	
	// overload the parent function
	public function initialize(array $params = array())
	{
		parent::initialize($params);
		$this->_links_buffered = parent::create_links();
		// Why do I do this? it is bcs the range_min and range_max methods won't work
		//	if the base's create_links haven't triggered before. so we have to trigger
		//	it right after the class is initialized. and I believe that the create_links
		//	method is only required to be triggered once right after initialization.
	}
	public function create_links()
	{
		return $this->_links_buffered;
	}
	public function current()
	{
		return $this->cur_page;
	}
	public function per_page()
	{
		return $this->per_page;
	}
	public function total_rows()
	{
		return $this->total_rows();
	}
	// bottom offset
	public function range_min()
	{
		if(($this->cur_page-1) < 0)
			return 0;
		return ($this->cur_page-1) * $this->per_page;
	}
	// upper offset
	public function range_max()
	{
		if($this->cur_page * $this->per_page > $this->total_rows)
			return $this->total_rows;
		return $this->cur_page * $this->per_page;
	}
}