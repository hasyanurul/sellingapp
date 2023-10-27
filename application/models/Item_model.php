<?php

class Item_model extends CI_Model
{

	public $_table = 'item';

	public function get()
	{
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function get_published($limit = null, $offset = null)
	{
		if (!$limit && $offset) {
			$query = $this->db
				->get_where($this->_table, ['draft' => 'FALSE']);
		} else {
			$query =  $this->db
				->get_where($this->_table, ['draft' => 'FALSE'], $limit, $offset);
		}
		return $query->result();
	}

	public function find_by_slug($slug)
	{
		if (!$slug) {
			return;
		}
		$query = $this->db->get_where($this->_table, ['slug' => $slug]);
		return $query->row();
	}

	public function find($item_id)
	{
		if (!$item_id) {
			return;
		}

		$query = $this->db->get_where($this->_table, array('item_id' => $item_id));
		return $query->row();
	}

	public function insert($item)
	{
		return $this->db->insert($this->_table, $item);
	}

	public function update($item)
	{
		if (!isset($item['item_id'])) {
			return;
		}

		return $this->db->update($this->_table, $item, ['item_id' => $item['item_id']]);
	}

	public function delete($item_id)
	{
		if (!$item_id) {
			return;
		}

		return $this->db->delete($this->_table, ['item_id' => $item_id]);
	}

	public function search($keyword)
	{
		if(!$keyword){
			return null;
		}
		$this->db->like('type', $keyword);
		$this->db->order_by('name', 'ASC');
		$this->db->order_by('date', 'ASC');
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function best(){
		$data = $this->db->select('*')
                 ->from('item,SUM(quantity_sold) as total')
                 ->order_by('date','desc')
                 ->group_by('type')
                 ->get()->result_array();
		return $data;
	}

	public function range($first_date,$second_date)
	{
		$this->db->select("*");
		$this->db->from('details');
		$this->db->where("DATE_FORMAT(date,'%Y-%m-%d') >='$first_date'");
		$this->db->where("DATE_FORMAT(date,'%Y-%m-%d') <='$second_date'");
		$query = $this->db->get();
		return $query->result();
	}
}