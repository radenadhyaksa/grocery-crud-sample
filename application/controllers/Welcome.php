<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
 
	function __construct()
	{
	    parent::__construct();
	 
		$this->load->database();
		$this->load->library('Grocery_CRUD');
	 
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function test()
	{
		/*
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
		  */
		$crud = new grocery_CRUD();
 
		$crud->set_theme('datatables');
		$crud->set_table('employees');
		$crud->set_relation('emp_no','titles','title');
		$crud->limit(25,0);
		$output = $crud->render();
		$this->load->view('test.html',$output);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */