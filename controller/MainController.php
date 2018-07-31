<?php

namespace controller;

/**
 * Main controller to manage the other controller
 */
class MainController {
	
	/**
	 * The path of the view folder
	 * @var string
	 */
	private $pathView;

	public function __construct() {
		$path = dirname(__DIR__) . "/view/";
		$this->pathView = str_replace('\\', '/', $path);
	}

	/**
	 * Method to display the view in the layout layout.php
	 * @param  string $page name of the view
	 * @param  array  $var  variable needed for the view
	 */
	public function render($page, $var=array()) {
		extract($var);
		ob_start();
		require ($this->pathView . $page . '.php');
		$content = ob_get_clean();
		require $this->pathView . 'layout.php';
	}
}