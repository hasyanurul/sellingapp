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
    public function range($keyword){
        $data['first_date'] = $this->input->get('first_date');
        $data['second_date'] = $this->input->get('second_date');

		$data['search_result'] = $this->item_model->range($data['first_date'], $data['second_date']);
		
		$this->load->view('admin/search_list.php', $data);
    }
}