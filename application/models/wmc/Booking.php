<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends CI_Model
{
	private $table_name	= 'booking';
	
	function __construct()
	{
		parent::__construct();

		$ci =& get_instance();
		$this->table_name			= $ci->config->item('db_table_prefix', 'tank_auth').$this->table_name;
	}

	/**
	 * Get user record by Id
	 *
	 * @param	int
	 * @param	bool
	 * @return	object
	 */
	function get_booking_by_id($id)
	{
		$this->db->where('id', $id);

		$query = $this->db->get($this->table_name);
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}

	function get_all()
	{
		$query = $this->db->get($this->table_name);
		if ($query->num_rows() > 0) return $query->result();
		return NULL;
	}

	/**
	 * Create new user record
	 *
	 * @param	array
	 * @param	bool
	 * @return	array
	 */
	function create_booking($data)
	{
		// $data['created'] = date('Y-m-d H:i:s');
		// $data['activated'] = $activated ? 1 : 0;

		if ($this->db->insert($this->table_name, $data)) {
			$booking_id = $this->db->insert_id();
			return array('booking_id' => $booking_id);
		}
		return NULL;
	}

	/**
	 * Delete user record
	 *
	 * @param	int
	 * @return	bool
	 */
	function delete_booking($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table_name);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}
		return FALSE;
	}

}

// /* End of file Arena.php */
// /* Location: ./application/models/wmc/Arena.php */