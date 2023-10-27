<?php

class Search extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('item_model');
	}
    public function index()
	{
        $data['keyword'] = $this->input->get('keyword');

		$data['search_result'] = $this->item_model->search($data['keyword']);
		$this->load->view('admin/search_list.php', $data);
	}
    // public function search($keyword){
    //     $data['keyword'] = $this->input->get('keyword');

	// 	$data['search_result'] = $this->item_model->search($data['keyword']);
		
	// 	$this->load->view('admin/search_list.php', $data);
    // }
}