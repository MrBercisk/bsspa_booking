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
        $data['nama']  = $this->session->get('nama');
        $data['email'] = $this->session->get('email');

        $transaksi = $this->transaksi
            ->join('booking', 'booking.id = transaksi.booking_id')
            ->join('user', 'user.id = booking.user_id')
            ->join('massage_list', 'massage_list.id = booking.massage_id')
            ->join('terapis', 'terapis.id = transaksi.terapis_id')
            ->select('transaksi.*, booking.nomor_booking, booking.tanggal_booking,  user.nama, user.jenis_kelamin, massage_list.jenis_massage, massage_list.harga, terapis.nama_terapis, terapis.no_hp')
            ->where('user.id', $user_id) 
            ->where('status_booking', 'Selesai')
            ->findAll();

        /* Massage list */
        $data['transaksi'] = $transaksi;
        $user = $this->user
            ->join('user_role', 'user_role.id = user.role_id')
            ->select('user.*, user_role.role')
            ->where('user.id', $user_id)
            ->findAll();

        $data['user'] = $user;

        $data['massage_list'] = $this->massage->findAll();

        $data['title'] = "BSpa | Proses Transaksi";

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
        $data['nama']  = $this->session->get('nama');
        $data['email'] = $this->session->get('email');

        $transaksi = $this->transaksi
        ->join('booking', 'booking.id = transaksi.booking_id')
        ->join('user', 'user.id = booking.user_id')
        ->join('massage_list', 'massage_list.id = booking.massage_id')
        ->join('terapis', 'terapis.id = transaksi.terapis_id')
        ->select('transaksi.*, booking.nomor_booking, booking.tanggal_booking, massage_list.diskon, user.nama, user.jenis_kelamin, massage_list.jenis_massage, massage_list.harga, terapis.nama_terapis, terapis.no_hp')
        ->where('user.id', $user_id) // Menambahkan kondisi where untuk user_id saat itu saja
        ->where('status_booking', 'Selesai')
        ->findAll();
        

        $data['transaksi'] = $transaksi;

        $data['terapis'] = $this->terapis->findAll();

        $data['title'] = "BSpa | Proses Transaksi";

        // Mengembalikan data dalam format JSON
        return view('v_member/bayar', $data);
    }
}
