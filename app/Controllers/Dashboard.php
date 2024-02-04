<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;
use App\Models\BookingModel;
use App\Models\TerapisModel;
use Config\Services;

class Dashboard extends BaseController
{
    protected $encrypter;
    protected $form_validation;
    protected $user;
    protected $booking;
    protected $terapis;
    protected $session;
    protected $request;

    public function __construct()
    {
        $this->encrypter = \Config\Services::encrypter();
        $this->form_validation =  \Config\Services::validation();
        $this->user = new UserModel();
        $this->booking = new BookingModel();
        $this->terapis = new TerapisModel();
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
        $booking = $this->booking
            ->join('user', 'user.id = booking.user_id')
            ->join('massage_list', 'massage_list.id = booking.massage_id')
            ->select('booking.*, user.nama, user.jenis_kelamin, massage_list.jenis_massage, massage_list.harga')
            ->findAll();

        $terapis = $this->terapis->findAll();
        $user = $this->user->where('role_id', 2)->findAll();


        $genderData = [];
        foreach ($user as $book) {
            $gender = $book['jenis_kelamin'];
            if (!isset($genderData[$gender])) {
                $genderData[$gender] = 1;
            } else {
                $genderData[$gender]++;
            }
        }
        $data['genderData'] = $genderData;
        $data['booking'] = $booking;
        $data['terapis'] = $terapis;

        $data['nama']  = $this->session->get('nama');
        $data['email'] = $this->session->get('email');
        $data['title'] = "BSpa | Admin";
        return view('v_admin/index', $data);
    }
}
