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


class Transaksi extends ResourceController
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

        $data['nama']  = $this->session->get('nama');
        $data['email'] = $this->session->get('email');

        $booking = $this->booking
            ->join('user', 'user.id = booking.user_id')
            ->join('massage_list', 'massage_list.id = booking.massage_id')
            ->select('booking.*, user.nama, user.jenis_kelamin, massage_list.jenis_massage, massage_list.harga')
            ->join('transaksi', 'transaksi.booking_id = booking.id', 'left') // Gunakan 'left' untuk LEFT JOIN
            ->where('transaksi.booking_id IS NULL', null, false) // Eksklusikan catatan di mana booking_id sudah ada di transaksi
            ->findAll();

        // Kirimkan data ke view
        $data['booking'] = $booking;

        $transaksi = $this->transaksi
            ->join('booking', 'booking.id = transaksi.booking_id')
            ->join('user', 'user.id = booking.user_id')
            ->join('massage_list', 'massage_list.id = booking.massage_id')
            ->join('terapis', 'terapis.id = transaksi.terapis_id')
            ->select('transaksi.*, booking.nomor_booking, booking.tanggal_booking, user.nama, user.jenis_kelamin, massage_list.jenis_massage, massage_list.harga, terapis.nama_terapis, terapis.no_hp')
            ->where('status_booking', 'Selesai')
            ->findAll();
        /* Massage list */
        $data['transaksi'] = $transaksi;

        $data['massage_list'] = $this->massage->findAll();


        $data['title'] = "BSpa | Transaksi";

        return view('v_admin/transaksi', $data);
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

        // Menggunakan $id sebagai nilai booking_id
        $transaksi = $this->transaksi
            ->join('booking', 'booking.id = transaksi.booking_id')
            ->join('user', 'user.id = booking.user_id')
            ->join('massage_list', 'massage_list.id = booking.massage_id')
            ->join('terapis', 'terapis.id = transaksi.terapis_id')
            ->select('transaksi.*, booking.nomor_booking, booking.tanggal_booking, user.nama, user.jenis_kelamin, massage_list.jenis_massage, massage_list.harga, terapis.nama_terapis, terapis.no_hp')
            ->where('status_booking', 'Selesai')
            ->where('booking.id', $id) // Menambahkan kondisi where untuk booking_id
            ->findAll();

        $data['transaksi'] = $transaksi;

        $confirm = $this->booking->find($id);
        /* dd($confirm); */
        $data['konfirmasi'] = $confirm;
        if ($confirm) {
            $massage_id = $confirm['massage_id'];
            $booking_id = $confirm['id'];

            // Mengambil data massage berdasarkan massage_id dari data booking
            $massage = $this->massage->where('id', $massage_id)->first();
            $booking = $this->booking->where('id', $booking_id)->first();

            // Memasukkan data ke dalam array $data
            $data['konfirmasi']    = $confirm;
            $data['jenis_massage']  = $massage['jenis_massage'];
            $data['harga']          = $massage['harga'];
            $data['id']          = $booking['id'];
            $diskon     = $massage['diskon'];
            $diskon_persen = $diskon * 100 / 100;
            $data['diskon'] = number_format($diskon_persen) . '%';
        } else {
            // Handle jika data booking tidak ditemukan untuk user_id tertentu
            $data['konfirmasi']    = null;
            $data['jenis_massage']  = null;
            $data['harga']          = null;
            $data['diskon']          = null;
        }
        $data['terapis'] = $this->terapis->findAll();

        $data['title'] = "BSpa | Proses Transaksi";

        // Mengembalikan data dalam format JSON
        return view('v_admin/prosestransaksi', $data);
    }

    public function create()
    {

        $tanggal_transaksi = $this->request->getVar('tanggal_transaksi');
        $keterangan = $this->request->getVar('keterangan');
        $booking = $this->request->getVar('booking_id');
        $terapis = $this->request->getVar('terapis_id');
        $total_bayar = $this->request->getVar('total_bayar');

        $data = [
            'tanggal_transaksi' => $tanggal_transaksi,
            'keterangan' => $keterangan,
            'booking_id' => $booking,
            'terapis_id' => $terapis,
            'total_bayar' => $total_bayar,
            'status_transaksi' => 'Pending',
        ];
        /*  dd($data); */

        $transaksi = $this->transaksi->insert($data);

        if ($transaksi) {
            // Data berhasil ditambahkan
            $this->session->setFlashdata('sweet_alert', json_encode(['success' => true, 'message' => 'Tambah Data berhasil!']));

            // Redirect ke halaman login
            return redirect()->to(base_url('transaksi'));
        } else {
            // Gagal menambahkan data
            $this->session->setFlashdata('sweet_alert', json_encode(['error' => true, 'message' => 'Gagal tambah data']));
        }
    }
}
