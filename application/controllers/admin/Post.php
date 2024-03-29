<?php

class Post extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('item_model');
	}
    public function index()
	{
		$data['items'] = $this->item_model->get();
		$this->load->view('admin/post_list.php', $data);
	}

    public function new_item()
	{
		if ($this->input->method() === 'post') {
            if ($this->db->like('name', $this->input->post('name'))){
                // generate unique id and slug
                $item_id = rand();

                $item = [
                    'item_id' => $item_id,
                    'name' => $this->input->post('name'),
                    'stock' => $this->input->post('stock'),
                    'type' => $this->input->post('type'),
                    'quantity_sold' => $this->input->post('quantity_sold'),
                    'date' => $this->input->post('date')
                ];

                $saved = $this->item_model->insert($item);

                if ($saved) {
                    $this->session->set_flashdata('message', 'Item was inputed');
                    return redirect('admin/post');
                }
            } else {
                $this->session->set_flashdata('message', 'Item was added, you only can update the item!');
            }
			
		}

		$this->load->view('admin/post_new_form.php');
	}


    public function edit($item_id = null)
	{
		$data['item'] = $this->item_model->find($item_id);

		if (!$data['item'] || !$item_id) {
			show_404();
		}

		if ($this->input->method() === 'post') {
			$item = [
				'item_id' => $item_id,
				'name' => $this->input->post('name'),
				'stock' => $this->input->post('stock'),
				'type' => $this->input->post('type'),
                'quantity_sold' => $this->input->post('quantity_sold'),
                'date' => $this->input->post('date')
			];
			$updated = $this->item_model->update($item);
			if ($updated) {
				$this->session->set_flashdata('message', 'Item was updated');
				redirect('admin/post');
			}
		}

		$this->load->view('admin/post_edit_form.php', $data);
	}

    public function delete($item_id = null)
	{
		if (!$item_id) {
			show_404();
		}

		$deleted = $this->item_model->delete($item_id);
		if ($deleted) {
			$this->session->set_flashdata('message', 'Item was deleted');
			redirect('admin/post');
		}
	}
}