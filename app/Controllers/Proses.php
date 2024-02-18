<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\BookingModel;
use App\Models\UserModel;
use App\Models\MassageModel;
use App\Models\TerapisModel;
use App\Models\TransaksiModel;
use Config\Services;


class Proses extends ResourceController
{
    use ResponseTrait;
    protected $booking;
    protected $user;
    protected $massage;
    protected $transaksi;
    protected $terapis;
    protected $session;
    protected $request;
    protected $form_validation;
    protected $format    = 'json';

    public function __construct()
    {
        $this->booking = new BookingModel();
        $this->user = new UserModel();
        $this->massage = new MassageModel();
        $this->transaksi = new TransaksiModel();
        $this->terapis = new TerapisModel();
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

        $user_id = $this->session->get('id');

        $data = [
            'nama' => $this->session->get('nama'),
            'email' => $this->session->get('email'),
            'title' => "BSpa | Proses Transaksi",
            'transaksi' => $this->transaksi->getByUserId($user_id),
            'user' => $this->user->getByUserId($user_id),
            'massage_list' => $this->massage->findAll()
        ];

        return view('v_member/proses', $data);
    }


    public function show($id = null)
    {
        // Cek apakah session 'nama' dan 'email' sudah ada
        if (!$this->session->has('nama') || !$this->session->has('email')) {
            // Jika tidak ada, mungkin arahkan ke halaman login atau lakukan tindakan lain
            return redirect()->to(base_url('login'));
        }
        $user_id = $this->session->get('id');

        $data = [
            'nama' => $this->session->get('nama'),
            'email' => $this->session->get('email'),
            'title' => "BSpa | Detail Transaksi",
            'transaksi' => $this->transaksi->getTransaksiIdProses($id),
            'terapis' => $this->terapis->findAll()
        ];
        /* dd($data); */


        return view('v_member/bayar', $data);
    }
}
