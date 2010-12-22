<?php

class Authentication extends Controller {

	function Authentication()
	{
		parent::Controller();	
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('user_m');
	}
	
	function index()
	{
		redirect('');
	}
		
	function register()
	{
		if($this->auth->is_logged_in())
		{
			redirect('');
		}
		
		$this->form_validation->set_error_delimiters('<div class="red-notification">', '</div>');
		$this->form_validation->set_rules('fullname', 'Nama lengkap', 'required|min_length[3]|max_length[30]|xss_clean');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|max_length[20]|alpha_dash|callback_username_check|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');	

		if ($this->form_validation->run() == FALSE)
		{
			render_view('authentication','register');
		}
		else
		{
			$fullname = $this->input->post('fullname');
			$username = $this->input->post('username');
			$email = $this->input->post('email');

			$user = array(
	           	'fullname' => $fullname,
	            'username' => $username,
				'email' => $email,
				'created_at' => date("Y-m-d H:i:s", time()),
	            'password' => md5($password)
	            );
			$this->user_m->create($user);
	        
			/*
				TODO 
				kirim email berisi password
				$this->emailnotif->register_confirmation($email,$fullname,$username,$password);
			*/
	        set_green_notification('Selamat. Anda telah terdaftar. Cek email anda untuk mendapatkan password untuk login.');
			redirect('');
		}
	}
	
	
	function login()
	{
		if($this->auth->is_logged_in())
		{
			redirect('');
		}
		
		$this->form_validation->set_rules('username', 'Username', 'required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean');	

		if ($this->form_validation->run() == FALSE)
		{
			render_view('authentication','login');
		}
		else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			if($this->auth->is_verified($username,$password))
	        {
	        	$this->auth->authenticate($username,'user');
				set_green_notification('Login berhasil. Selamat datang.');
	            //redirect('');	
				$output = '{ "success": "yes", "welcome": "Welcome" }';
	        }
	        else
	        {
				set_red_notification('Login gagal. Username atau password salah. Silakan ulangi lagi.');
				//redirect('authentication/login');
				$output = '{ "success": "no", "message": "Username or password is incorrect" }';
	        }
	
			$output = str_replace("\r", "", $output);
	        $output = str_replace("\n", "", $output);
        	echo $output;
	        
			/*
				TODO 
				catat setiap kali ada percobaan login. (gagal login)
			*/
		}
	}
	
	function login_process()
	{
		if($this->auth->is_logged_in())
		{
			redirect('');
		}
		
		$this->form_validation->set_rules('username', 'Username', 'required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean');	

		if ($this->form_validation->run())
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			if($this->auth->is_verified($username,$password))
	        {
	        	$this->auth->authenticate($username,'user');
				set_green_notification('Login berhasil. Selamat datang.');
	            //redirect('');	
				$output = '{ "success": "yes", "welcome": "Welcome" }';
	        }
	        else
	        {
				set_red_notification('Login gagal. Username atau password salah. Silakan ulangi lagi.');
				//redirect('authentication/login');
				$output = '{ "success": "no", "message": "This is not working" }';
	        }
	
			$output = str_replace("\r", "", $output);
	        $output = str_replace("\n", "", $output);
        	echo $output;
	        
			/*
				TODO 
				catat setiap kali ada percobaan login. (gagal login)
			*/
		}
	}
	
	function logout()
	{
		if(!$this->auth->is_logged_in())
		{
			//$this->auth->unauthenticate();
			$this->session->sess_destroy();
			redirect('');
		}
		else
		{	
			//$this->auth->unauthenticate();
			$this->session->sess_destroy();
			//set_green_notification('Berhasil logout.');
			redirect('');
		}
	}
	
	/*
	------------------------------------------------------------------------------------------------------
	Callback function
	------------------------------------------------------------------------------------------------------	
	*/
	function username_check($username)
	{
		if ($this->user_m->get_user_by_username($username))
		{
			$this->form_validation->set_message('username_check', 'The username '.$username.' has been taken. Pilih username lain.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	function email_check($email)
	{
		if ($this->user_m->get_user_by_email($email))
		{
			$this->form_validation->set_message('email_check', 'The email '.$username.' sudah pernah terdaftar. Satu email hanya bisa mempunyai satu account.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	
}

/* End of file authentication.php */
/* Location: ./system/application/controllers/authentication.php */