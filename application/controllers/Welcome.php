<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	// Construct akan dieksekusi pertama kali
	public function __construct()
	{
		parent::__construct();

		echo '__construct<br>';

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('Grocery_CRUD');
	}

	public function index()
	{
		echo 'run index';
		$this->load->view('welcome_message');
	}

	public function test()
	{
		// run command using: http://localhost/grocery-crud-sample/index.php/welcome/test
		echo 'run test';
		$con = mysqli_connect("localhost","root","","employees");

		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  } 
		  $data = mysqli_query($con,"SELECT * FROM employees LIMIT 10");

		  while ($row = mysqli_fetch_array($data,MYSQLI_NUM)){
		  	print_r($row);
		  }

		$crud = new Grocery_CRUD();
		$crud->set_table("departments");
		$output = $this->grocery_crud->render();
	}
}
