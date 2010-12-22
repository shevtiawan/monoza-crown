<?php

class About extends Controller {

	function About()
	{
		parent::Controller();	
	}
	
	function index()
	{
		if(!$this->auth->is_logged_in())
		{
			//$data['helloworld'] = 'Bolania - Hello world!';
			//render_view('home','index',$data);
			//echo "ga login";
			redirect('login');
		}
		else
		{
			render_view('about','index');
		}		
	}
	
}

/* End of file home.php */
/* Location: ./system/application/controllers/home.php */