<?php

require_once 'vendor/autoload.php';

class Twig {
	
	private $loader = null;

	private $environment = null;
	
	private $config = array(
		'debug' => true,
		'strict_variables' => true,
		'autoescape' => 'html'
	);

	private $safe_functions = [
		'form_open',
		'site_url'
	];

	private $CI = null;

	public function __construct()
	{
		$this->loader = new Twig_Loader_Filesystem(APPPATH . 'views');
		$this->environment = new Twig_Environment($this->loader, $this->config);

		foreach ($this->safe_functions as $safe_function) 
		{
			if (function_exists($safe_function))
			{
				$new_function = new Twig_SimpleFunction(
					$safe_function, 
					$safe_function,
					['is_safe' => ['html']]
				);

				$this->environment->addFunction($new_function);
			}
		}

		$this->CI =& get_instance();
		$this->CI->load->library('session');
	}

	public function view(string $filename, array $page_data = [])
	{


		$user_fullname = $this->CI->session->userdata('user_firstname') . ' ';
		$user_fullname .= $this->CI->session->userdata('user_lastname');

		$page_data['base_url'] = base_url();
		$page_data['user_fullname'] = $user_fullname;

		echo $this->environment->render($filename . '.php', $page_data);
	}
}
