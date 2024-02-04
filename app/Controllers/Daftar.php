<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class Daftar extends ResourceController
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
        $data['title'] = "BSpa | Daftar Member";
        return view('v_login/daftar', $data);
    }

    public function create()
    {
        $validation = \Config\Services::validation();

        // Jalankan validasi
        if (!$this->validate('daftar')) {
            $this->session->setFlashdata('sweet_alert', json_encode(['error' => true, 'message' => 'Gagal tambah data']));
            return redirect()->to(base_url('daftar'))->withInput()->with('validation', $validation);
        }
    
        /* Jika valid */
        $password = $this->request->getVar('password');
    
        // Hash password menggunakan password_hash
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        $data = [
            'role_id' => 2,
            'status' => 'Aktif',
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'password' => $hashedPassword
        ];
    
        $user = $this->user->insert($data);
    
        if ($user) {
            $this->session->setFlashdata('sweet_alert', json_encode(['success' => true, 'message' => 'Pendaftaran berhasil!']));
            return redirect()->to(base_url('login'));
        } else {
            // Data berhasil dibuat
            return $this->respondCreated($data);
        }
    }
    
}

?>