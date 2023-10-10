<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_wisata extends CI_Model
{

	public function get_all_data()
	{
		$this->db->select('*');
		$this->db->from('tbl_wisata');
		$this->db->join('tbl_icon', 'tbl_icon.nama_icon = tbl_wisata.kategori', 'left');

		$this->db->order_by('id_wisata', 'desc');
		return $this->db->get()->result();
	}

	public function get_all_data_by_kategori($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_wisata');
		$this->db->join('tbl_icon', 'tbl_icon.nama_icon = tbl_wisata.kategori', 'left');
		$this->db->where('kategori', $id);
		$this->db->order_by('id_wisata', 'desc');
		return $this->db->get()->result();
	}

	public function get_all_kategori()
	{
		$this->db->select('*');
		$this->db->from('tbl_icon');
		//$this->db->join('tbl_icon', 'tbl_icon.id_icon = tbl_wisata.id_icon', 'left');

		$this->db->order_by('nama_icon', 'ASC');
		return $this->db->get()->result();
	}

	public function add($data)
	{
		$this->db->insert('tbl_wisata', $data);
	}

	public function add_galery($data)
	{
		$this->db->insert('tbl_galery', $data);
	}

	public function get_galery_per_lokasi($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_galery');
		$this->db->where('id_wisata', $id);
		//$this->db->join('tbl_icon', 'tbl_icon.id_icon = tbl_wisata.id_icon', 'left');

		$this->db->order_by('id_galery', 'ASC');
		return $this->db->get()->result();
	}

	public function detail($id_wisata)
	{
		$this->db->select('*');
		$this->db->from('tbl_wisata');
		$this->db->join('tbl_icon', 'tbl_icon.nama_icon = tbl_wisata.kategori', 'left');
		$this->db->where('id_wisata', $id_wisata);
		return $this->db->get()->row();
	}

	public function edit($data)
	{
		$this->db->where('id_wisata', $data['id_wisata']);
		$this->db->update('tbl_wisata', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_wisata', $data['id_wisata']);
		$this->db->delete('tbl_wisata');
		// $this->db->delete('tbl_wisata', $data);
	}

	public function delete_galery($data)
	{
		$this->db->where('id_galery', $data['id_galery']);
		$this->db->delete('tbl_galery');
	}
}

/* End of file M_wisata.php */
