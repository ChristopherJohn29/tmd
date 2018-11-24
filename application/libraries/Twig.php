<?php

require_once 'vendor/autoload.php';

class Twig {
	private $loader = null;
	private $environment = null;
	private $config = array(
		'debug' => false,
		'strict_variables' => true,
		'autoescape' => 'html'
	);

	public function __construct()
	{
		$this->loader = new Twig_Loader_Filesystem(APPPATH . 'views');
		$this->environment = new Twig_Environment($this->loader, $this->config);
	}

	public function view(string $filename, array $page_data)
	{
		echo $this->environment->render($filename . '.html', $page_data);
	}
}