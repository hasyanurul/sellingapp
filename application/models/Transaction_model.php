<?php
class Transaction_model extends CI_Model
{

	public $_table = 'transaction';

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

	public function find($transaction_id)
	{
		if (!$transaction_id) {
			return;
		}

		$query = $this->db->get_where($this->_table, array('transaction_id' => $transaction_id));
		return $query->row();
	}

	public function insert($transaction)
	{
		return $this->db->insert($this->_table, $transaction);
	}

	public function update($transaction)
	{
		if (!isset($transaction['transaction_id'])) {
			return;
		}

		return $this->db->update($this->_table, $transaction, ['transaction_id' => $transaction['transaction_id']]);
	}

	public function delete($transaction_id)
	{
		if (!$transaction_id) {
			return;
		}

		return $this->db->delete($this->_table, ['transaction_id' => $transaction_id]);
	}

	public function search($keyword)
	{
		if(!$keyword){
			return null;
		}
		$this->db->like('name', $keyword);
		$query = $this->db->get($this->_table);
		return $query->result();
	}
}