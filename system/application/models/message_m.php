<?

class Message_m extends Model {

    
    function Message_m()
    {
        // Call the Model constructor
        parent::Model();
		$this->load->database();
    }
    
    function get_all_messages()
    {
        $this->db->where('is_deleted',false);
		$this->db->order_by("created_at", "desc");
		$query = $this->db->get('messages');
        return ($query->num_rows()>0) ? $query->result_array() : false;
    }
    
    function get_last_ten_messages()
    {
        $this->db->where('is_deleted',false);
		$this->db->order_by("created_at", "desc");
		$query = $this->db->get('messages', 10);
        return ($query->num_rows()>0) ? $query->result_array() : false;
    }
    
    function get_message($message_id)
    {
    	$this->db->where('id',$message_id);
		$this->db->where('is_deleted',false);
    	$query = $this->db->get('messages');
		return ($query->num_rows()>0) ? $query->row_array() : false;
    }
	
	function get_messages_by_username($username)
    {
    	$this->db->where('username',$username);
		$this->db->where('is_deleted',false);
		$this->db->order_by("created_at", "desc");
    	$query = $this->db->get('messages');
		return ($query->num_rows()>0) ? $query->result_array() : false;
    }
    
    function create($data_insert)
    {
        $this->db->insert('messages', $data_insert);
    }
    
    function update($data_update,$message_id)
    {
        $this->db->where('id', $message_id);
		$this->db->update('messages', $data_update);
    }

	function delete($message_id)
	{
		$datamessage = $this->message_m->get_message($message_id);
		$datamessage['is_deleted'] = 1;
		$this->db->where('id', $message_id);
		$this->db->update('messages', $datamessage);
	}
	    	
}

?>