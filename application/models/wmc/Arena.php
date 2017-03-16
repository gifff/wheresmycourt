<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Arena extends CI_Model
{
	private $table_name	= 'arena';
	
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
	function get_arena_by_id($id)
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
	function create_arena($data)
	{
		// $data['created'] = date('Y-m-d H:i:s');
		// $data['activated'] = $activated ? 1 : 0;

		if ($this->db->insert($this->table_name, $data)) {
			$arena_id = $this->db->insert_id();
			return array('arena_id' => $arena_id);
		}
		return NULL;
	}

	/**
	 * Delete user record
	 *
	 * @param	int
	 * @return	bool
	 */
	function delete_arena($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table_name);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * Set new password key for user.
	 * This key can be used for authentication when resetting user's password.
	 *
	 * @param	int
	 * @param	string
	 * @return	bool
	 */
	function set_nama($arena_id, $nama)
	{
		$this->db->set('nama', $nama);
		$this->db->where('id', $arena_id);

		$this->db->update($this->table_name);
		return $this->db->affected_rows() > 0;
	}

	function set_harga($arena_id, $harga)
	{
		$this->db->set('harga_per_jam', $harga);
		$this->db->where('id', $arena_id);

		$this->db->update($this->table_name);
		return $this->db->affected_rows() > 0;
	}

	function set_link_foto($arena_id, $link_foto)
	{
		$this->db->set('link_foto', $link_foto);
		$this->db->where('id', $arena_id);

		$this->db->update($this->table_name);
		return $this->db->affected_rows() > 0;
	}

	function set_lapangan_id($arena_id, $lapangan_id)
	{
		$this->db->set('lapangan_id', $lapangan_id);
		$this->db->where('id', $arena_id);

		$this->db->update($this->table_name);
		return $this->db->affected_rows() > 0;
	}
}

// /* End of file Arena.php */
// /* Location: ./application/models/wmc/Arena.php */