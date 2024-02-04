<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\BookingModel;
use App\Models\UserModel;
use App\Models\MassageModel;
use Config\Services;


class Booking extends ResourceController
{
    use ResponseTrait;
    protected $booking;
    protected $user;
    protected $massage;
    protected $session;
    protected $request;
    protected $form_validation;
    protected $format    = 'json';

    public function __construct()
    {
        $this->booking = new BookingModel();
        $this->user = new UserModel();
        $this->massage = new MassageModel();
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

        // Mengambil data booking berdasarkan ID yang login saat itu
        $user_id = $this->session->get('id'); // Sesuaikan dengan nama session atau kolom yang menyimpan user_id
        $data_booking = $this->booking
            ->join('massage_list', 'massage_list.id = booking.massage_id')
            ->select('booking.*, massage_list.jenis_massage, massage_list.harga')
            ->where('user_id', $user_id)->findAll();
        $data['data_booking'] = $data_booking;

        /* Massage list */

        $data['massage_list'] = $this->massage->findAll();

        /* Semua tanggal yang telah tersedia */
        $jadwal = $this->booking->findAll();
        $data['jadwal'] = $jadwal;

        $user = $this->user
            ->join('user_role', 'user_role.id = user.role_id')
            ->select('user.*, user_role.role')
            ->where('user.id', $user_id)
            ->findAll();

        $data['user'] = $user;

        $data['title'] = "BSpa | Booking";

        return view('v_member/booking', $data);
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

        // Mengambil data booking berdasarkan ID yang login saat itu
        $user_id = $this->session->get('id');

        $confirm = $this->booking->find($id);
        $data['konfirmasi'] = $confirm;


        if ($confirm) {
            $massage_id = $confirm['massage_id'];

            // Mengambil data massage berdasarkan massage_id dari data booking
            $massage = $this->massage->where('id', $massage_id)->first();

            // Memasukkan data ke dalam array $data
            $data['konfirmasi']    = $confirm;
            $data['jenis_massage']  = $massage['jenis_massage'];
            $data['harga']          = $massage['harga'];
        } else {
            // Handle jika data booking tidak ditemukan untuk user_id tertentu
            $data['konfirmasi']    = null;
            $data['jenis_massage']  = null;
            $data['harga']          = null;
        }

        $cekUser = $this->user->where('id', $user_id)->first();
        $data['user'] = $cekUser;

        /* Massage list */

        $data['massage_list'] = $this->massage->findAll();

        /* Semua tanggal yang telah tersedia */
        $jadwal = $this->booking->findAll();
        $data['jadwal'] = $jadwal;

        $data['title'] = "BSpa | Booking";

        return view('v_member/konfirmasi', $data);
    }


    public function cekStatusPendaftaran()
    {
        $user_id = $this->session->get('id');

        // Cek boking berdasarkan user_id
        $cekStatus = $this->booking->where('user_id', $user_id)->first();

        // Jika status booking selesai
        if ($cekStatus['status_pendaftaran'] == "Selesai") {
            return redirect()->to('/booking');
        }

        // Jika status booking pending
        if ($cekStatus['status_pendaftaran'] == "Pending") {
            return redirect()->to('/booking/konfirmasi');
        }
    }


    public function create()
    {
        //Cek Nomor Pendaftaran
        $maxBooking = $this->booking->selectMax('nomor_booking')->first();
        if ($maxBooking['nomor_booking'] == "") {
            $nomor_booking = 202401001;
        } else {
            $nomor_booking = $maxBooking['nomor_booking'] + 1;
        }

        // Ambil data dari input user
        $alamat = $this->request->getPost('alamat');
        $no_hp = $this->request->getPost('no_hp');
        $tanggal_booking = $this->request->getPost('tanggal_booking');
        $massage = $this->request->getPost('massage_id');

        // Ambil user_id dari sesi pengguna
        $user_id = session()->get('id'); // Sesuaikan dengan nama key sesi Anda

        $bookingModel = new BookingModel();
        // Cek apakah masih ada data dengan status_booking = 'Pending'
        $pendingBooking = $bookingModel
            ->where('user_id', $user_id)
            ->where('status_booking', 'Pending')
            ->first();

        if ($pendingBooking) {
            // Tampilkan pesan bahwa booking masih dalam status 'Pending'
            $this->session->setFlashdata('sweet_alert', json_encode(['info' => true, 'message' => 'Silahkan konfirmasi bookingan Anda terlebih dahulu.']));

            // Redirect ke halaman konfirmasi atau halaman lain yang diinginkan
            return redirect()->to(base_url('booking'));
        }

        if ($bookingModel->isTanggalAvailable($tanggal_booking)) {
            // Tambahkan booking ke database bersama dengan user_id
            $data = [
                'user_id' => $user_id,
                'massage_id' => $massage,
                'alamat' => $alamat,
                'no_hp' => $no_hp,
                'tanggal_booking' => $tanggal_booking,
                'nomor_booking' => $nomor_booking,
                'status_booking' => "Pending"
            ];


            $bookingModel->insert($data);
            $this->session->setFlashdata('sweet_alert', json_encode(['success' => true, 'message' => 'Tambah Data berhasil!']));

            return redirect()->to(base_url('booking/show/$1'));
        } else {
            $this->session->setFlashdata('sweet_alert', json_encode(['error' => true, 'message' => 'Tanggal booking tidak tersedia']));

            // Redirect ke halaman login
            return redirect()->to(base_url('booking'));
        }
    }


    /* fitur belum done */
    public function update($id = null)
    {
        $booking = $this->booking->find($id);
        if ($booking) {

            // Mengambil data dari request
            $data = [
                'id' => $id,
                'status_booking' => "Selesai"
            ];
            /*   dd($data); */
            // Melakukan update data
            $booking = $this->booking->save($data);

            if ($booking) {
                // Data berhasil ditambahkan
                $this->session->setFlashdata('sweet_alert', json_encode(['success' => true, 'message' => 'Berhasil Booking!']));

                // Redirect ke halaman login
                return redirect()->to(base_url('booking'));
            }

            return $this->fail('Sorry! not updated');
        }

        return $this->failNotFound('Sorry! no user found');
    }

    public function delete($id = null)
    {
        $booking = $this->booking->find($id);

        if (!$booking) {
            return $this->failNotFound('Maaf data tidak ada', 404);
        }

        if ($this->booking->delete($id)) {
            $this->session->setFlashdata('sweet_alert', json_encode(['success' => true, 'message' => 'Booking Dibatalkan!']));
            return redirect()->to(base_url('booking'));
        }
    }
}
