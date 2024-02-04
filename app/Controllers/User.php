<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use Config\Services;


class User extends ResourceController
{
    use ResponseTrait;
    protected $user;
    protected $session;
    protected $request;
    protected $form_validation;
    protected $format    = 'json';

    public function __construct()
    {
        $this->user = new UserModel();
        $this->session = \Config\Services::session();
        $this->request = Services::request();
        $this->form_validation =  \Config\Services::validation();
    }

    public function index()
    {
        // Cek apakah session 'nama' dan 'email' sudah ada
        if (!$this->session->has('nama') || !$this->session->has('email')) {
            // Jika tidak ada, mungkin arahkan ke halaman login atau lakukan tindakan lain
            return redirect()->to(base_url('login'));
        }

        $data['nama']  = $this->session->get('nama');
        $data['email'] = $this->session->get('email');
        // Fetch users with role_id = 2
        $users = $this->user->where('role_id', 2)->findAll();

        // Pass the data to the view
        $data['users'] = $users;
        $data['title'] = "BSpa | Data Member";
        return view('v_admin/datamember', $data);
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
    
        // Mengambil data dari UserModel berdasarkan ID
        $users = $this->user->where('role_id', 2)->find($id);
    
        // Mengecek apakah data ditemukan
        if ($users === null) {
            return $this->failNotFound('User not found', 404);
        }
    
        // Pass the data to the view
        $data['users'] = $users;
        $data['title'] = "BSpa | Edit Member";
    
        // Mengembalikan data dalam format JSON
        return view('v_admin/editmember', $data);
    }
    
    public function create()
    {
        $validation = \Config\Services::validation();

        // Jalankan validasi
        if (!$this->validate('daftar')) {
            $this->session->setFlashdata('sweet_alert', json_encode(['error' => true, 'message' => 'Gagal tambah data']));
            return redirect()->to(base_url('user'))->withInput()->with('validation', $validation);       
        }
        /* Jika valid */
        $password = $this->request->getVar('password');

        // Hash password menggunakan password_hash
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'role_id' => 2,
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'password' => $hashedPassword
        ];

        $user = $this->user->insert($data);

        if ($user) {
            // Data berhasil ditambahkan
            $this->session->setFlashdata('sweet_alert', json_encode(['success' => true, 'message' => 'Tambah Data berhasil!']));

            // Redirect ke halaman login
            return redirect()->to(base_url('user'));
        } else {
            // Gagal menambahkan data
            $this->session->setFlashdata('sweet_alert', json_encode(['error' => true, 'message' => 'Gagal tambah data']));
            return redirect()->to(base_url('user'))->withInput()->with('validation', $validation);       
        }
    }


    public function update($id = null)
    {
        // Mencari data user berdasarkan ID
        $user = $this->user->find($id);

        if ($user) {

            // Mengambil data dari request
            $data = [
                'id' => $id,
                'status' => $this->request->getVar('status'),
            ];
            /*   dd($data); */
            // Melakukan update data
            $user = $this->user->save($data);

            if ($user) {
                // Data berhasil ditambahkan
                $this->session->setFlashdata('sweet_alert', json_encode(['success' => true, 'message' => 'Update data berhasil!']));

                // Redirect ke halaman login
                return redirect()->to(base_url('user'));
            }

            return $this->fail('Sorry! not updated');
        }

        return $this->failNotFound('Sorry! no user found');
    }



    public function delete($id = null)
    {
        // Mengecek apakah ID diberikan
        if ($id === null) {
            return $this->fail('Invalid ID', 400);
        }

        // Mengambil data dari UserModel berdasarkan ID
        $user = $this->user->find($id);

        // Mengecek apakah data ditemukan
        if ($user === null) {
            return $this->fail('User not found', 404);
        }

        $user = $this->user->delete($id);

        if ($user) {
            // Data berhasil ditambahkan
            $this->session->setFlashdata('sweet_alert', json_encode(['success' => true, 'message' => 'Hapus Data berhasil!']));

            // Redirect ke halaman login
            return redirect()->to(base_url('user'));
        } else {
            // Gagal menambahkan data
            $this->session->setFlashdata('sweet_alert', json_encode(['error' => true, 'message' => 'Gagal Menghapus Data']));

            // Redirect ke halaman login
            return redirect()->to(base_url('user'));
        }
    }
}



