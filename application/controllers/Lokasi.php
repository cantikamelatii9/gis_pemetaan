<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('m_wisata');
        $this->load->model('m_icon');
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Data',
            'wisata'    => $this->m_wisata->get_all_data(),

            'isi'    => 'wisata/v_index'
        );
        $this->load->view('layout2/v_wrapper', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $this->form_validation->set_rules('nama_tempat', 'Nama Tempat', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('kategori', 'kategori', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));

        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']          = './gambar/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'title' => 'Input Data',
                    'icon'    => $this->m_icon->get_all_data(),

                    'error_upload' => $this->upload->display_errors(),
                    'isi'    => 'wisata/v_add'
                );
                $this->load->view('layout2/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(

                    'kode_asset' => $this->input->post('kode_asset'),
                    'nama_tempat' => $this->input->post('nama_tempat'),
                    'kepemilikan' => $this->input->post('kepemilikan'),
                    'kategori' => $this->input->post('kategori'),
                    'kondisi' => $this->input->post('kondisi'),
                    'tahun_pembuatan' => $this->input->post('tahun_pembuatan'),
                    'operator' => $this->input->post('operator'),
                    'status' => $this->input->post('status'),

                    'deskripsi' => $this->input->post('deskripsi'),
                    'latitude' => $this->input->post('latitude'),
                    'longitude' => $this->input->post('longitude'),
                    //'id_icon' => $this->input->post('kategori'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->m_wisata->add($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan !!!');
                redirect('lokasi');
            }
        } else {

            $data = array(
                'title' => 'Input Data',
                'icon'    => $this->m_icon->get_all_data(),
                'kategorix'    => $this->m_wisata->get_all_kategori(),
                'isi'    => 'wisata/v_add'
            );
            $this->load->view('layout2/v_wrapper', $data, FALSE);
        }
    }

    public function edit($id_wisata)
    {
        $this->form_validation->set_rules('nama_tempat', 'Nama Tempat', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('kategori', 'kategori', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));

        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']          = './gambar/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'title' => 'Edit Data Lokasi',
                    'icon'    => $this->m_icon->get_all_data(),
                    'wisata' => $this->m_wisata->detail($id_wisata),
                    'error_upload' => $this->upload->display_errors(),
                    'isi'    => 'wisata/v_edit'
                );
                $this->load->view('layout2/v_wrapper', $data, FALSE);
            } else {
                // jika ada pergantian diganti
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_wisata'    => $id_wisata,
                    'nama_tempat' => $this->input->post('nama_tempat'),
                    'kategori' => $this->input->post('kategori'),

                    'deskripsi' => $this->input->post('deskripsi'),
                    'latitude' => $this->input->post('latitude'),
                    'longitude' => $this->input->post('longitude'),
                    // 'id_icon' => $this->input->post('id_icon'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->m_wisata->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
                redirect('lokasi');
            }
            // jika foto tidak diganti
            $data = array(
                'id_wisata'    => $id_wisata,
                'nama_tempat' => $this->input->post('nama_tempat'),
                'kategori' => $this->input->post('kategori'),

                'deskripsi' => $this->input->post('deskripsi'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                // 'id_icon' => $this->input->post('id_icon'),
            );
            $this->m_wisata->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
            redirect('lokasi');
        }
        $data = array(
            'title' => 'Edit Data Lokasi',
            'wisata' => $this->m_wisata->detail($id_wisata),
            'kategorix'    => $this->m_wisata->get_all_kategori(),
            'isi'    => 'wisata/v_edit'
        );
        $this->load->view('layout2/v_wrapper', $data, FALSE);
    }

    //Delete one item
    public function delete($id_wisata)
    {
        $data = array('id_wisata' => $id_wisata);
        $this->m_wisata->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!!');
        redirect('lokasi');
    }

    // public function galery()
    // {
    //     $data = array(
    //         'title' => 'Galery Asset',
    //         'wisata'    => $this->m_wisata->get_all_data(),

    //         'isi'    => 'wisata/v_galery'
    //     );
    //     $this->load->view('layout2/v_wrapper', $data, FALSE);
    // }

    public function galery($id)
    {


        $this->form_validation->set_rules('id_lokasi', 'Lokasi', 'required', array(
            'required' => '%s ID Galery tidak ditemukan !!!'
        ));
      

        if ($this->form_validation->run() == TRUE) {

            $data = [];
            $count = count($_FILES['files']['name']);

            for ($i = 0; $i < $count; $i++) {
                if (!empty($_FILES['files']['name'][$i])) {

                    $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['files']['size'][$i];


                    $config['upload_path'] = './lampiran/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = '5000';
                    // $config['file_name'] = $_FILES['files']['name'][$i];
                    $config['file_name'] = round(microtime(true) . ($_FILES['files']['name'][$i]));




                    $this->upload->initialize($config);
                    // $this->load->library('upload', $config);




                    if ($this->upload->do_upload('file')) {




                        $uploadData = $this->upload->data();
                        $filename = $uploadData['file_name'];
                        // $data['totalFiles'][] = $filename;


                        // compress image start
                        // $config2['image_library'] = 'gd2';
                        // $config2['source_image']  = './lampiran/' . round(microtime(true) . ($_FILES['files']['name'][$i]));
                        // $config2['create_thumb']  = false;
                        // $config2['maintain_ratio'] = false;
                        // $config2['quality']       = '60%';
                        // $config2['width']         = 150;
                        // $config2['height']        = 150;
                        // $config2['new_image']     = './gambar_rapi/' . round(microtime(true) . ($_FILES['files']['name'][$i]));
                        // $this->load->library('image_lib', $config2);
                        // $this->image_lib->resize();



                        $data = array(
                            'id_wisata' => $id,
                            'foto' => $filename
                        );

                        $this->m_wisata->add_galery($data);





                        // $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan !!!');
                        // redirect('lokasi/galery/' . $id);
                    } else {
                        $data = array(
                            'title' => 'Galery Asset error upload',
                            'wisata' => $this->m_wisata->detail($id),
                        'galery' => $this->m_wisata->get_galery_per_lokasi($id),
                            'error_upload' => $this->upload->display_errors(),
                            'isi'    => 'wisata/v_galery'
                        );
                        $this->load->view('layout2/v_wrapper', $data, FALSE);
                    }
                }
            }
        
         $data = array(
                            'title' => 'Galery Asset Sukses ',
                            'wisata' => $this->m_wisata->detail($id),
                            'galery' => $this->m_wisata->get_galery_per_lokasi($id),
                            //'error_upload' => $this->upload->display_errors(),
                            'isi'    => 'wisata/v_galery'
                        );
                        $this->load->view('layout2/v_wrapper', $data, FALSE);
         
            //redirect('lokasi/galery/' . $id, $data, FALSE);
        } else {

            $data = array(
                'title' => 'Galery Asset',
                'wisata' => $this->m_wisata->detail($id),
                'galery' => $this->m_wisata->get_galery_per_lokasi($id),
                'isi'    => 'wisata/v_galery'
            );
            $this->load->view('layout2/v_wrapper', $data, FALSE);
        }



        // redirect('lokasi/galery');
        // $data = array(
        //     'title' => 'Input Data',
        //     'icon'    => $this->m_icon->get_all_data(),
        //     'kategorix'    => $this->m_wisata->get_all_kategori(),
        //     'isi'    => 'wisata/v_add'
        // );
        // $this->load->view('layout2/v_wrapper', $data, FALSE);
    }

    public function delete_galery($nama, $id_lokasi, $id_galery)
    {
        $data = array('id_galery' => $id_galery);

        $this->db->trans_start();
        $this->m_wisata->delete_galery($data);
        unlink("lampiran/" . $nama);
        $this->db->trans_complete();


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
            $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!!');
            redirect('lokasi/galery/' . $id_lokasi);
        }
    }
}

/* End of file Controllername.php */
