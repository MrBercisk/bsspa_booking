<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\MassageModel;
use App\Models\UserModel;
use Config\Services;

class Massage extends ResourceController
{
    protected $massage;
    protected $user;
    protected $session;
    protected $request;
    protected $format    = 'json';

    public function __construct()
    {
        $this->massage = new MassageModel();
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
        $massage = $this->massage->findAll();
        $data = [
            'nama' => $this->session->get('nama'),
            'email' => $this->session->get('email'),
            'title' => "BSpa | Massage List",
            'massage' => $massage
        ];

        return view('massage-list/index', $data);
    }
    public function create()
    {
        $validation = \Config\Services::validation();

        // Jalankan validasi
        if (!$this->validate('massage')) {
            $this->session->setFlashdata('sweet_alert', json_encode(['error' => true, 'message' => 'Gagal tambah data']));
            return redirect()->to(base_url('massage'))->withInput()->with('validation', $validation);
        }
        $data = [
            'jenis_massage' => $this->request->getVar('jenis_massage'),
            'harga' => $this->request->getVar('harga')
        ];

        $massage = $this->massage->insert($data);
        if ($massage) {
            $m['id'] = $massage;
            $this->session->setFlashdata('sweet_alert', json_encode(['success' => true, 'message' => 'Tambah Data berhasil!']));
            return redirect()->to(base_url('massage'));
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

        $massage = $this->massage->find($id);
        // Mengecek apakah data ditemukan
        if ($massage === null) {
            return $this->failNotFound('User not found', 404);
        }

        // Pass the data to the view
        $data['massage'] = $massage;
        $data['title'] = "BSpa | Edit Massage";

        // Mengembalikan data dalam format JSON
        return view('massage-list/edit', $data);
    }

    public function update($id = null)
    {
        $massage = $this->massage->find($id);

        if ($massage) {

            // Mengambil data dari request
            $data = [
                'id' => $id,
                'jenis_massage' => $this->request->getVar('jenis_massage'),
                'harga' => $this->request->getVar('harga')
            ];
            /*   dd($data); */
            // Melakukan update data
            $massage = $this->massage->save($data);

            if ($massage) {
                // Data berhasil ditambahkan
                $this->session->setFlashdata('sweet_alert', json_encode(['success' => true, 'message' => 'Update data berhasil!']));

                // Redirect ke halaman login
                return redirect()->to(base_url('massage'));
            }

            return $this->fail('Sorry! not updated');
        }
    }

    public function delete($id = null)
    {
        // Fetch the user by ID
        $massage = $this->massage->find($id);

        // Check if the user exists
        if (!$massage) {
            return $this->failNotFound('Maaf data tidak ada', 404);
        }

        // Delete the user from the database
        if ($this->massage->delete($id)) {
            // Data berhasil dihapus
            $this->session->setFlashdata('sweet_alert', json_encode(['success' => true, 'message' => 'Hapus Data berhasil!']));

            return redirect()->to(base_url('massage'));
        } else {
            $this->session->setFlashdata('sweet_alert', json_encode(['error' => true, 'message' => 'Gagal Menghapus Data']));

            // Redirect ke halaman login
            return redirect()->to(base_url('massage'));
        }
    }
}
