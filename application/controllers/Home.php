<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_wisata');
		$this->load->model('m_json');
	}

	public function index()
	{
		$data = array(
			'title' => 'Pemetaan',
			'wisata' => $this->m_wisata->get_all_data(),
			'kategori' => $this->m_wisata->get_all_kategori(),
			'isi'	=> 'v_home'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function mapjson()
	{
		$data = array(
			'title' => 'Map JSON',
			'json' => $this->m_json->get_json(),
			'isi'	=> 'v_mapjson'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function lokasi()
	{
		$data = array(
			'title' => 'List Tempat ',
			'wisata' => $this->m_wisata->get_all_data(),
			'isi'	=> 'v_wisata'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function detail($id_wisata)
	{
		$wisata = $this->m_wisata->detail($id_wisata);
		$data = array(
			'wisata' => $wisata,
			'title' =>  $wisata->nama_tempat,
			'galery' => $this->m_wisata->get_galery_per_lokasi($id_wisata),
			'isi'	=> 'v_detail'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}


	public function about()
	{
		$data = array(
			'title' => 'About',
			'isi'	=> 'v_About'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function pencarian()
	{
		$data = array(
			'title' => 'Pemetaan Pencarian',
			// 'wisata' => $this->m_wisata->get_all_data_by_kategori($aa),
			'kategori' => $this->m_wisata->get_all_kategori(),
			//'statusa' => $this->m_wisata->status(),
			'statusa1' => $this->m_wisata->status(),
			'key_1' => $this->input->post('key_1'),
			'isi'	=> 'v_home_cari'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}
}
