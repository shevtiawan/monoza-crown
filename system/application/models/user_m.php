<?

class User_m extends Model {

    
    function User_m()
    {
        // Call the Model constructor
        parent::Model();
		$this->load->database();
    }
    
    function get_all_users()
    {
        $query = $this->db->get('users');
        return ($query->num_rows()>0) ? $query->result_array() : false;
		//return $query->result_array();
    }
    
    function get_last_ten_entries()
    {
        $query = $this->db->get('users', 10);
        return ($query->num_rows()>0) ? $query->result_array() : false;
		//return $query->result_array();
    }
    
    function get_user_by_username($username)
    {
    	$this->db->where('username',$username);
    	$query = $this->db->get('users');
		return ($query->num_rows()>0) ? $query->row_array() : false;
    }

	function get_user_by_email($email)
	{
		$this->db->where('email',$email);
    	$query = $this->db->get('users');
		return ($query->num_rows()>0) ? $query->row_array() : false;
	}
    
    function create($data_insert)
    {
        $this->db->insert('users', $data_insert);
    }
    
    function update($data_update,$username)
    {
        $this->db->where('username', $username);
		$this->db->update('users', $data_update);
    }
	
	
	/*
	function get_perusahaan_by_kategori($nama_kategori)
    {
    	$this->db->select('*');
    	$this->db->where('kategori.kategori',$nama_kategori);
		$this->db->from('perusahaan');
		$this->db->join('kategori', 'perusahaan.id_kategori = kategori.id');

		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array() : false;
		
    }
    
    function get_perusahaan_by_tag($nama_tag)
    {
    	$this->db->select('*');
    	$this->db->where('tag.tag',$nama_tag);
		$this->db->from('perusahaan');
		$this->db->join('tag_perusahaan', 'perusahaan.id = tag_perusahaan.id_perusahaan');
		$this->db->join('tag', 'tag.id = tag_perusahaan.id_tag');

		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array() : false;
    }
    */
    	
}

?>