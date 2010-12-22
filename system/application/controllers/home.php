<?php

class Home extends Controller {

	function Home()
	{
		parent::Controller();	
		$this->load->model('message_m');
		$this->load->helper('form');
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
			//$data['posts'] = $this->post_m->get_all_posts();
			render_view('home','index_logged_in');
		}		
	}
	
}

/* End of file home.php */
/* Location: ./system/application/controllers/home.php */