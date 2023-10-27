<?php

class Selling extends CI_Controller
{
	public function index()
	{
		$this->load->view('admin/selling_list.php');
	}
}