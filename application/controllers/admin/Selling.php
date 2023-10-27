<?php

class Selling extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('item_model');
	}
    public function index()
	{
		$data['search_result'] = $this->item_model->best();
		$this->load->view('admin/selling_list.php', $data);
	}
    
}