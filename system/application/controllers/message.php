<?php

class Message extends Controller {

	function Message()
	{
		parent::Controller();	
		$this->load->model('message_m');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		if(!$this->auth->is_logged_in())
		{
			redirect('');
		}
	}
	
	function index()
	{
		$data['messages'] = $this->message_m->get_all_messages();
		render_view('message','index',$data);
	}
	
	function create()
	{
		$this->form_validation->set_rules('message_content', 'Message', 'required|xss_clean');
		
		if ($this->form_validation->run() == FALSE)
		{
			set_red_notification('Oow.. make sure you write the message.');
			redirect('message');
		}
		else
		{
			$content = $this->input->post('message_content');
			$username = $this->auth->get_current_user();
			$message = array(
	           	'content' => $content,
	            'username' => $username,
	            'created_at' => date("Y-m-d H:i:s", time())
				);
			$this->message_m->create($message);
			redirect('message');
		}
	}
	
	function read($message_id=0)
	{
		$data['message'] = $this->message_m->get_message($message_id);
		if($data['message'])
		{
			render_view('message','read',$data);
		}
		else
		{
			render_view('message','message_not_found');
		}
	}
	
	function update($message_id=0)
	{
		$message = $this->message_m->get_message($message_id);
		if($message)
		{
			$username = $this->auth->get_current_user();
			if($message['username'] == $username)
			{
				$data['message'] = $message;
				render_view('message','update',$data);
			}
			else
			{
				echo 'forbidden access';
			}
		}
		else
		{
			echo 'forbidden access';
		}
	}
	
	function update_process()
	{
		$message_id = $this->input->post('id');
		$content = $this->input->post('message_content');
		$message = $this->message_m->get_message($message_id);
		if($message['username'] == $this->auth->get_current_user())
		{	
			$messagedata = array(
	           	'content' => $content
				);
			$this->message_m->update($messagedata,$message_id);
			set_green_notification('update success');
			redirect('message/read/'.$message_id);
		}
		else
		{
			echo 'forbiden access';
		}
		
	}
	
	function delete($message_id=0)
	{
		$message = $this->message_m->get_message($message_id);
		if($message)
		{
			$username = $this->auth->get_current_user();
			if($message['username'] == $username)
			{
				$this->message_m->delete($message_id);
				redirect('message');
			}
			else
			{
				echo 'forbidden access';
			}
		}
		else
		{
			echo 'forbidden access';
		}
	}
}

/* End of file message.php */
/* Location: ./system/application/controllers/message.php */