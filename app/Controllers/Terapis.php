<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\TerapisModel;
use App\Models\UserModel;
use Config\Services;

class Terapis extends ResourceController
{
    protected $encrypter;
    protected $form_validation;
    protected $terapis;
    protected $user;
    protected $session;
    protected $request;

    public function __construct()
    {
        $this->encrypter = \Config\Services::encrypter();
        $this->form_validation =  \Config\Services::validation();
        $this->terapis = new TerapisModel();
        $this->user = new UserModel();
        $this->session = \Config\Services::session();
        $this->request = Services::request();
    }

    public function index()
    {
        // Cek apakah session 'nama' dan 'email' sudah ada
        if (!$this->session->has('nama') || !$this->session->has('email')) {
            // Jika tidak ada, mungkin arahkan ke halaman login atau lakukan tindakan lain
            return redirect()->to(base_url('login'));
        }
        $terapis = $this->terapis->findAll();

        $data = [
            'nama' =>  $this->session->get('nama'),
            'email' => $this->session->get('email'),
            'title' => "BSpa | Data Terapis",
            'terapis' => $terapis,
        ];

        return view('v_admin/dataterapis', $data);
    }
    public function create()
    {

        $validation = \Config\Services::validation();

        // Jalankan validasi
        if (!$this->validate('terapis')) {
            $this->session->setFlashdata('sweet_alert', json_encode(['error' => true, 'message' => 'Gagal tambah data']));
            return redirect()->to(base_url('terapis'))->withInput()->with('validation', $validation);
        }

        $data = [
            'nama_terapis' => $this->request->getVar('nama_terapis'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'status_pernikahan' => $this->request->getVar('status_pernikahan'),
            'alamat' => $this->request->getVar('alamat'),
            'no_hp' => $this->request->getVar('no_hp'),
        ];

        $terapis = $this->terapis->insert($data);
        if ($terapis) {
            $t['id'] = $terapis;
            $this->session->setFlashdata('sweet_alert', json_encode(['success' => true, 'message' => 'Tambah Data berhasil!']));
            return redirect()->to(base_url('terapis'));
        }
        return $this->failNotFound('Maaf data tidak ada', 404);
    }

    public function show($id = null)
    {
        // Cek apakah session 'nama' dan 'email' sudah ada
        if (!$this->session->has('nama') || !$this->session->has('email')) {
            // Jika tidak ada, mungkin arahkan ke halaman login atau lakukan tindakan lain
            return redirect()->to(base_url('login'));
        }

        $data['nama']  = $this->session->get('nama');
        $data['email'] = $this->session->get('email');

        $terapis = $this->terapis->find($id);

        // Mengecek apakah data ditemukan
        if ($terapis === null) {
            return $this->failNotFound('Data not found', 404);
        }

        // Pass the data to the view
        $data['terapis'] = $terapis;
        $data['title'] = "BSpa | Edit Terapis";

        // Mengembalikan data dalam format JSON
        return view('v_admin/editterapis', $data);
    }

    public function update($id = null)
    {
        // Mencari data user berdasarkan ID
        $terapis = $this->terapis->find($id);

        if ($terapis) {

            // Mengambil data dari request
            $data = [
                'id' => $id,
                'nama_terapis' => $this->request->getVar('nama_terapis'),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                'tempat_lahir' => $this->request->getVar('tempat_lahir'),
                'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
                'status_pernikahan' => $this->request->getVar('status_pernikahan'),
                'alamat' => $this->request->getVar('alamat'),
                'no_hp' => $this->request->getVar('no_hp'),
            ];

            // Melakukan update data
            $terapis = $this->terapis->save($data);

            if ($terapis) {
                // Data berhasil ditambahkan
                $this->session->setFlashdata('sweet_alert', json_encode(['success' => true, 'message' => 'Update data berhasil!']));

                // Redirect ke halaman login
                return redirect()->to(base_url('terapis'));
            }

            return $this->fail('Sorry! not updated');
        }

        return $this->failNotFound('Sorry! no user found');
    }


    public function delete($id = null)
    {
        // Fetch the user by ID
        $terapis = $this->terapis->find($id);

        // Check if the user exists
        if (!$terapis) {
            return $this->failNotFound('Maaf data tidak ada', 404);
        }

        // Delete the user from the database
        if ($this->terapis->delete($id)) {
            // Data berhasil ditambahkan
            $this->session->setFlashdata('sweet_alert', json_encode(['success' => true, 'message' => 'Hapus Data berhasil!']));

            // Redirect ke halaman login
            return redirect()->to(base_url('terapis'));
        } else {
            // Gagal menambahkan data
            $this->session->setFlashdata('sweet_alert', json_encode(['error' => true, 'message' => 'Gagal Menghapus Data']));

            // Redirect ke halaman login
            return redirect()->to(base_url('terapis'));
        }
    }
}
