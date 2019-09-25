<?php

class Controller_Add extends Controller
{
	public $model;
	public $view;

	function __construct()
	{
		$this->model = new Model_Add();
		$this->view = new View();
	}

//В переменную data записывается массив, возвращаемый методом get_data
	function action_index()
	{
		$data = $this->model->get_data();
		$this->view->generate('add_view.php', 'template_view.php', $data);
	}


	public function createNote ()
	{
		return $this -> $model($_POST);
	}
}

$createNote = new Controller();
$create = $comment->$_POST[$arr_table];

$deleteNote = new Controller();
$id_delete = $_GET['id'];


 ?>