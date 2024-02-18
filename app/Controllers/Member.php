<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;
use App\Models\TransaksiModel;


class Member extends ResourceController
{
    protected $encrypter;
    protected $form_validation;
    protected $user;
    protected $transaksi;
    protected $session;


    public function __construct()
    {
        $this->encrypter = \Config\Services::encrypter();
        $this->form_validation =  \Config\Services::validation();
        $this->user = new UserModel();
        $this->transaksi = new TransaksiModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        // Cek apakah session 'nama' dan 'email' sudah ada
        if (!$this->session->has('nama') || !$this->session->has('email')) {
            // Jika tidak ada, mungkin arahkan ke halaman login atau lakukan tindakan lain
            return redirect()->to(base_url('login'));
        }
        $user_id = $this->session->get('id');

        $data = [
            'nama' => $this->session->get('nama'),
            'email' =>  $this->session->get('email'),
            'page' => "member",
            'title' =>"BSpa | Member" ,
            'user' => $this->user->getByUserId($user_id),
            'transaksi' => $this->transaksi->getByUserId($user_id)
        ];

        $transaksiBaru = $this->transaksi->getTransaksiBaru($user_id);

        if($transaksiBaru > 0) {
            $data['notifikasi'] = '<span   id="notificationBadge" class="badge badge-danger">' . $transaksiBaru . ' Transaksi</span>';
        }
    

        return view('v_member/index', $data);
    }

    public function updatePassword()
    {
        $validation = \Config\Services::validation();

        // Jalankan validasi
        if (!$this->validate('updatePassword')) {
            $this->session->setFlashdata('sweet_alert', json_encode(['error' => true, 'message' => 'Gagal update password']));
            return redirect()->to(base_url('member'))->withInput()->with('validation', $validation);
        }

        /* Jika valid */
        $user_id = $this->session->get('id'); // Ambil ID pengguna dari sesi

        $passwordLama = $this->request->getVar('password_lama');
        $passwordBaru = $this->request->getVar('password_baru');

        // Ambil data pengguna dari database berdasarkan ID
        $userData = $this->user->find($user_id);

        // Verifikasi password saat ini
        if (password_verify($passwordLama, $userData['password'])) {
            // Hash password baru menggunakan password_hash
            $hashedPassword = password_hash($passwordBaru, PASSWORD_DEFAULT);

            // Update password di database
            $updateData = [
                'password' => $hashedPassword
            ];

            $this->user->update($user_id, $updateData);

            $this->session->setFlashdata('sweet_alert', json_encode(['success' => true, 'message' => 'Password berhasil diupdate!']));
            return redirect()->to(base_url('member'));
        } else {
            // Password saat ini tidak cocok
            $this->session->setFlashdata('sweet_alert', json_encode(['error' => true, 'message' => 'Password saat ini tidak cocok']));
            return redirect()->to(base_url('member'))->withInput()->with('validation', $validation);
        }
    }
}
