<? if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CodeIgniter Notification Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Andri Setiawan
 * @link		https://github.com/rouninja
 */

// ------------------------------------------------------------------------


if ( !function_exists('set_red_notification'))
{
	function set_red_notification($message="")
	{
		$CI =& get_instance();
		$CI->session->set_flashdata('notification', true);
		$CI->session->set_flashdata('red-notification', $message);
	}
}

if ( !function_exists('set_blue_notification'))
{
	function set_blue_notification($message="")
	{
		$CI =& get_instance();
		$CI->session->set_flashdata('notification', true);
		$CI->session->set_flashdata('blue-notification', $message);
	}
}

if ( !function_exists('set_green_notification'))
{
	function set_green_notification($message="")
	{
		$CI =& get_instance();
		$CI->session->set_flashdata('notification', true);
		$CI->session->set_flashdata('green-notification', $message);
	}
}

if ( !function_exists('print_notification'))
{
	function print_notification()
	{
		$CI =& get_instance();
		$hasil = '';
		if($CI->session->flashdata('notification')) {
			$hasil = '<div id="notification">';
			if($CI->session->flashdata('red-notification')) { 
				$hasil = $hasil.'<div class="red-notification">'.$CI->session->flashdata('red-notification').'</div>';
			};
			if($CI->session->flashdata('blue-notification')) { 
				$hasil = $hasil.'<div class="blue-notification">'.$CI->session->flashdata('blue-notification').'</div>';
			};
			if($CI->session->flashdata('green-notification')) { 
				$hasil = $hasil.'<div class="green-notification">'.$CI->session->flashdata('green-notification').'</div>';
			};
			
			$hasil = $hasil.'</div>';
		}
		return $hasil;
	}
}

if ( !function_exists('print_red_notification'))
{
	function print_red_notification()
	{
		$CI =& get_instance();
		$hasil = '';			
		if($CI->session->flashdata('red-notification')) { 
			$hasil = '<div id="notification"><div class="red-notification">'.$CI->session->flashdata('red-notification').'</div></div>';
		}		
		return $hasil;
	}
}

if ( !function_exists('print_blue_notification'))
{
	function print_blue_notification()
	{
		$CI =& get_instance();
		$hasil = '';			
		if($CI->session->flashdata('blue-notification')) { 
			$hasil = '<div id="notification"><div class="blue-notification">'.$CI->session->flashdata('blue-notification').'</div></div>';
		}		
		return $hasil;
	}
}

if ( !function_exists('print_green_notification'))
{
	function print_green_notification()
	{
		$CI =& get_instance();
		$hasil = '';			
		if($CI->session->flashdata('green-notification')) { 
			$hasil = '<div id="notification"><div class="green-notification">'.$CI->session->flashdata('green-notification').'</div></div>';
		}		
		return $hasil;
	}
}

?>