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
		$this->load->helper('url');
		$this->load->library('Grocery_CRUD');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function test()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('departments');
		$crud->limit(10,0);
		$output = $crud->render();
		$this->load->view('sidebar.html');
		$this->load->view('test.php',$output);
	
	}

	public function employees()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('employees');
		$crud->set_relation('emp_no','titles','title');
		$output = $crud->render();
		$this->load->view('sidebar.html');
		$this->load->view('test.php',$output);
	}
	
	public function salary()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('salaries');
		$output = $crud->render();
		$this->load->view('sidebar.html');
		$this->load->view('test.php',$output);
	}

	public function titles()
	{
		$crud = new grocery_CRUD();
		
		$crud->set_table('titles');
		$crud->set_relation('emp_no','titles','title');
		$output = $crud->render();
		$this->load->view('sidebar.html');
		$this->load->view('test.php',$output);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */