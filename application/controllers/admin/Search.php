<?php

class Search extends CI_Controller
{
	public function index()
	{
		$this->load->view('admin/search_list.php');
	}
}