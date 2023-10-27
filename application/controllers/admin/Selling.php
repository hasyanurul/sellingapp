<?php

class Selling extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaction_model');
	}
    public function index()
	{
		$data['transaction'] = $this->transaction_model->get();
		$this->load->view('admin/post_list.php', $data);
	}
    public function new_transaction()
	{
		if ($this->input->method() === 'post') {
			// TODO: Lakukan validasi sebelum menyimpan ke model

			// generate unique id and slug
			$transaction_id = uniqid('', true);

			$transaction = [
				'transaction_id' => $transaction_id,
				'name' => $this->input->post('name'),
				'stock' => $this->input->post('quantity_sold'),
				'type' => $this->input->post('date')
			];

			$saved = $this->transaction_model->insert($transaction);

			if ($saved) {
				$this->session->set_flashdata('message', 'transaction was inputed');
				return redirect('admin/post');
			}
		}

		$this->load->view('admin/post_new_transaction.php');
	}
}