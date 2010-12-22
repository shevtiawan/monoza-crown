<? if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CodeIgniter Render View Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Andri Setiawan
 * @link		https://github.com/shevtiawan
 */

// ------------------------------------------------------------------------


if ( !function_exists('render_view'))
{
	function render_view($layout,$view,$data='')
	{
		$CI =& get_instance();
		$viewdata['view'] = $layout.'/'.$view;
		$viewdata['data'] = $data;
		$CI->load->view('layout/'.$layout, $viewdata);
	}
}


?>