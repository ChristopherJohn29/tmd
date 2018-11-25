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
		'form_open'
	];

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
	}

	public function view(string $filename, array $page_data = [])
	{
		$page_data['base_url'] = base_url();

		echo $this->environment->render($filename . '.php', $page_data);
	}
}