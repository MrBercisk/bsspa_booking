<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class Login extends ResourceController
{
	protected $encrypter;
	protected $form_validation;
	protected $user;
	protected $session;


	public function __construct()
	{
		$this->encrypter = \Config\Services::encrypter();
		$this->form_validation =  \Config\Services::validation();
		$this->session = \Config\Services::session();
		$this->user = new UserModel();
	}

	public function index()
	{
		$data['title'] = "BSpa | Login";
		return view('v_login/index', $data);
	}

	public function create()
	{
		$validation = \Config\Services::validation();

		// Jalankan validasi
		if (!$this->validate('login')) {
			$this->session->setFlashdata('sweet_alert', json_encode(['error' => true, 'message' => 'Gagal Login']));
			return redirect()->to(base_url('login'))->withInput()->with('validation', $validation);
		}
		/* Jika valid */
		$email = $this->request->getVar('email');
		$password = $this->request->getVar('password');

		// Ambil data pengguna dari database berdasarkan email
		$user = $this->user->where('email', $email)->first();

		if ($user) {
			// Verifikasi password menggunakan password_verify
			if (password_verify($password, $user['password'])) {
				// Password benar, buat sesi login
				$data = [
					'id' => $user['id'],
					'role_id' => $user['role_id'],
					'nama' => $user['nama'],
					'email' => $user['email']
				];

				$this->session->set($data);

				if (isset($user['role_id'])) {
					if ($user['role_id'] == 1) {
						$this->session->setFlashdata('sweet_alert', json_encode(['success' => true, 'message' => 'Selamat Datang, ' . $user['nama']]));
						return redirect()->to(base_url('dashboard'));
					} elseif ($user['role_id'] == 2) {
						$this->session->setFlashdata('sweet_alert', json_encode(['success' => true, 'message' => 'Selamat Datang, ' . $user['nama']]));
						return redirect()->to(base_url('member'));
					} else {
						return $this->respondCreated(['message' => 'Login successful', 'data' => $data]);
					}
				}
			} else {
				// Password salah
				$this->session->setFlashdata('sweet_alert', json_encode(['error' => true, 'message' => 'Password Salah']));
				return redirect()->to(base_url('login'));
			}
		}
		$this->session->setFlashdata('sweet_alert', json_encode(['error' => true, 'message' => 'Email tidak terdaftar']));
		return redirect()->to(base_url('login'));
	}


	public function logout()
	{
		$this->session->destroy();
		return redirect()->to('login');
	}
}
